@if(count($officials) > 0)
    <div class="card">
        <div class="card-header border-0">
            <h3 class="card-title">Officials</h3>
            <div class="card-tools">
                @if(count($officials) > 0)
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#official">
                        Add
                    </button>
                @endif
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Designation</th>
                    @if(auth()->user()->role_id != 3)
                        <th class="pull-right">Manage</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($officials as $official)
                    <tr>
                        <td>{{ $official->name }}</td>
                        <td>{{ $official->mobile }}</td>
                        <td>{{ $official->position->name }}</td>
                        @if(auth()->user()->role_id != 3)
                            <td><a href="{{ route('settings.deleteOfficial', $official->id) }}" class="btn btn-danger btn-sm pull-right"><i class="fas fa-trash"></i></a></td>
                        @endif


                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        <div class=text-right>{{ $officials->links() }}</div>
    </div>
@else
    <div class="card-body p-0">
        <div class="text-center">
            <h4>Please setup the general configuration first before adding officials</h4>
            <a href="{{ route('settings') }}" class="btn btn-info">Go To General Configuration</a>
            {{--<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#position">--}}
            {{--Add Designation--}}
            {{--</button>--}}
        </div>
    </div>
@endif

<!-- /.card -->



<!-- Modal -->
<div class="modal fade" id="official" tabindex="-1" role="dialog" aria-labelledby="officialLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="officialLabel">Add New Official</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('settings.addOfficial') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                            <label for="name">Primary Mobile</label>
                            <input type="number" name="mobile" id="mobile" class="form-control">
                        </div>

                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                            <label for="name">Secondary Mobile</label>
                            <input type="number" name="phone" id="phone" class="form-control">
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                            <label for="name">State</label>
                            <select name="state_id" id="state_id" class="form-control">
                                @foreach($states as $state)
                                    <option value="{{ $state->id }}">{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                            <label for="name">District</label>
                            <select name="district_id" id="district_id" class="form-control">
                                @foreach($districts as $district)
                                    <option value="{{$district->id}}">{{$district->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                            <label for="name">Constituency</label>
                            <select name="constituency_id" id="constituency_id" class="form-control">
                                @foreach($constituencies as $constituency)
                                    <option value="{{$constituency->id}}">{{$constituency->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                            <label for="name">LGA</label>
                            <select name="lga_id" id="lga_id" class="form-control">
                                @foreach($lgas as $lga)
                                    <option value="{{ $lga->id }}">{{$lga->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                            <label for="name">Ward</label>
                            <select name="ward_id" id="ward_id" class="form-control">
                                @foreach($wards as $ward)
                                    <option value="{{$ward->id}}">{{$ward->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                            <label for="name">Party</label>
                            <select name="party_id" id="party_id" class="form-control">
                                @foreach($parties as $party)
                                    <option value="{{ $party->id }}">{{$party->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                            <label for="name">Party Card No.</label>
                            <input type="text" name="party_card_no" id="party_card_no" class="form-control">
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                            <label for="name">Designation</label>
                            <select name="position_id" id="position_id" class="form-control">
                                @foreach($positions as $position)
                                    <option value="{{ $position->id }}">{{$position->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                            <label for="name">Picture</label>
                            <input type="file" name="photo" id="photo" class="form-control">
                        </div>
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="name">Profile</label>
                        <textarea class="form-control" name="profile" id="profile" cols="30" rows="5"></textarea>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-success" type="submit">Add Official</button>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
            </div>
        </div>
    </div>
</div>