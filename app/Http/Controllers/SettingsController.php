<?php

namespace App\Http\Controllers;

use App\Constituency;
use App\District;
use App\Lga;
use App\Minister;
use App\Official;
use App\Party;
use App\Designation;
use App\State;
use App\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('settings.index')
            ->withDistricts(District::orderBy('name', 'asc')->paginate(4))
            ->withConstituencies(Constituency::orderBy('name', 'asc')->paginate(4))
            ->withParties(Party::orderBy('name', 'asc')->paginate(4))
            ->withLgas(Lga::orderBy('name', 'asc')->paginate(4))
            ->withWards(Ward::orderBy('name', 'asc')->paginate(4))
            ->withStates(State::orderBy('name', 'asc')->paginate(4))
            ->withDesignations(Designation::orderBy('name','asc')->paginate(4));
    }

    public function officials()
    {
        return view('settings.officials')
            ->with('designations', Designation::orderBy('name', 'asc')->get())
            ->withOfficials(Official::orderBy('state_id', 'asc')->paginate(3))
            ->withParties(Party::all())
            ->withStates(State::all())
            ->withDistricts(District::all())
            ->withConstituencies(Constituency::all())
            ->withLgas(Lga::all())
            ->withWards(Ward::all())
            ->withMinisters(Minister::orderBy('designation_id', 'asc')->paginate(4));
    }

    public function addDistrict(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:150|min:3'
        ]);

        $district = District::create([
            'name' => $request->name,
            'state_id' => $request->state_id
        ]);

        if ($district){
            Session::flash('success', 'You have added a new District : '.  $district->name  );

            return redirect()->back();

        }
//        dd($request);
    }

    public function deleteDistrict(District $district)
    {
        if ($district->delete()){
            Session::flash('error', 'District Deleted');
            return redirect()->back();
        }

    }

    public function addConstituency(Request $request)
    {

        $this->validate($request, [
           'name' => 'required|max:150|min:3'
        ]);

        $constituency = Constituency::create([
            'name' => $request->name,
            'district_id' => $request->district_id
        ]);

        if ($constituency){
            Session::flash('success', 'You have added a new Constituency : '.  $constituency->name  );

            return redirect()->back();

        }

    }

    public function deleteConstituency(Constituency $constituency)
    {
        if ($constituency->delete()){
            Session::flash('error', 'Constituency Deleted');
            return redirect()->back();
        }

    }


    public function addParty(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:150|min:3',
            'abbrv' => 'required|min:2|max:6'
        ]);

        $party = Party::create([
            'name' => $request->name,
            'abbrv' => $request->abbrv
        ]);

        if ($party){
            Session::flash('success', 'You have added a new Party : '.  $party->name  );

            return redirect()->back();

        }

    }

    public function deleteParty(Party $party)
    {
        if ($party->delete()){
            Session::flash('error', 'Party Deleted');
            return redirect()->back();
        }

    }

    public function addLga(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:150|min:3',
            'constituency_id' => 'required',
            'state_id' => 'required'
        ]);

        $lga = Lga::create([
            'name' => $request->name,
            'constituency_id' => $request->constituency_id,
            'state_id' => $request->state_id
        ]);

        if ($lga){
            Session::flash('success', 'You have added a new LGA : '.  $lga->name  );

            return redirect()->back();

        }

    }

    public function deleteLga(Lga $lga)
    {
        if ($lga->delete()){
            Session::flash('success', 'LGA Deleted');
            return redirect()->back();
        }

    }

    public function addState(Request $request)
{

    $this->validate($request, [
        'name' => 'required|max:150|min:3',
        'abbrv' => 'required|min:2|max:6',
    ]);

    $state = State::create([
        'name' => $request->name,
        'abbrv' => $request->abbrv
    ]);

    if ($state){
        Session::flash('success', 'You have added a new State : '.  $state->name  );

        return redirect()->back();

    }

}

    public function deleteState(State $state)
    {
        if ($state->delete()){
            Session::flash('success', 'State Deleted');
            return redirect()->back();
        }

    }

    public function addWard(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:150|min:3',
            'lga_id' => 'required',
        ]);

        $ward = Ward::create([
            'name' => $request->name,
            'lga_id' => $request->lga_id
        ]);

        if ($ward){
            Session::flash('success', 'You have added a new Ward : '.  $ward->name  );

            return redirect()->back();

        }

    }

    public function deleteWard(Ward $ward)
    {
        if ($ward->delete()){
            Session::flash('success', 'Ward Deleted');
            return redirect()->back();
        }

    }

    public function addDesignation(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:150|min:3',
        ]);

        $designation = Designation::create([
            'name' => $request->name,
        ]);

        if ($designation){
            Session::flash('success', 'You have added a new Designation : '.  $designation->name  );

            return redirect()->back();

        }

    }

    public function deleteDesignation(Designation $designation)
    {
        if ($designation->delete()){
            Session::flash('error', 'Designation Deleted');
            return redirect()->back();
        }

    }

    public function addOfficial(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:150|min:3',
        ]);

        if (isset($request->photo)) {
            $picture = $request->photo;
            $picture_name = time() . $picture->getClientOriginalName();
            $picture->move('uploads/officials', $picture_name);
        }else{
            $picture_name = 'img/avatar.png';
        }

        $official = Official::create([
            'name' => $request->name,
//            'mobile' => $request->mobile,
//            'phone' => $request->phone,
            'dob' => $request->dob,
            'photo' => 'uploads/officials/'.$picture_name,
            'constituency_id' => $request->constituency_id,
            'state_id' => $request->state_id,
            'district_id' => $request->district_id,
            'lga_id' => $request->lga_id,
            'ward_id' => $request->ward_id,
            'party_id' => $request->party_id,
            'party_card_no' => $request->party_card_no,
            'designation_id' => $request->designation_id,
        ]);

        if ($official){
            Session::flash('success', 'You have added a new Official : '.  $official->name  );

            return redirect()->back();

        }

    }

    public function deleteOfficial(Official $official)
    {
        if ($official->delete()){
            Session::flash('error', 'Official Deleted');
            return redirect()->back();
        }

    }

    public function addMinister(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:150|min:3',
        ]);

        if (isset($request->photo)){
            $picture = $request->photo;
            $picture_name = time().$picture->getClientOriginalName();
            $picture->move('uploads/ministers',$picture_name);
        }

        $minister = Minister::create([
            'name' => $request->name,
//            'mobile' => $request->mobile,
//            'phone' => $request->phone,
            'dob' => $request->dob,
            'photo' => 'uploads/ministers/'.$picture_name,
            'party_id' => $request->party_id,
            'party_card_no' => $request->party_card_no,
            'designation_id' => $request->designation_id,
        ]);

        if ($minister){
            Session::flash('success', 'You have added a new Official : '.  $minister->name  );

            return redirect()->back();

        }

    }

    public function deleteMinister(Minister $minister)
    {
        if ($minister->delete()){
            Session::flash('error', 'Minister Deleted');
            return redirect()->back();
        }

    }

}
