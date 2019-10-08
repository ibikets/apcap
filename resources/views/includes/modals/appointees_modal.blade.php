@if(count($ministers) > 0)
    <div class="card">
        <div class="card-header border-0">
            <h3 class="card-title">Appointed Officials</h3>
            <div class="card-tools">
                @if(count($ministers) > 0)
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#minister">
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
                @foreach($ministers as $minister)
                    <tr>
                        <td>{{ $minister->name }}</td>
                        <td>{{ $minister->mobile }}</td>
                        <td>{{ $minister->designation->name }}</td>
                        @if(auth()->user()->role_id != 3)
                            <td><a href="{{ route('settings.deleteMinister', $minister->id) }}" class="btn btn-danger btn-sm pull-right"><i class="fas fa-trash"></i></a></td>
                        @endif


                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        <div class=text-right>{{ $ministers->links() }}</div>
    </div>
@else
    <div class="card-body p-0">
        <div class="text-center">
            <h4>No Ministers present in the Database</h4>
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#minister">
                Add Appointed Officials
            </button>
            {{--<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#designation">--}}
            {{--Add Designation--}}
            {{--</button>--}}
        </div>
    </div>
@endif

<!-- /.card -->



<!-- Modal -->
<div class="modal fade" id="minister" tabindex="-1" role="dialog" aria-labelledby="ministerLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ministerLabel">Add New Official</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('settings.addMinister') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <label for="dob">DOB</label>
                            <input type="date" name="dob" id="dob" class="form-control">
                        </div>

                        {{--<div class="form-group col-sm-6 col-md-6 col-lg-6">--}}
                        {{--<label for="name">Secondary Mobile</label>--}}
                        {{--<input type="number" name="phone" id="phone" class="form-control">--}}
                        {{--</div>--}}

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
                            <select name="designation_id" id="designation_id" class="form-control">
                                @foreach($designations as $designation)
                                    <option value="{{ $designation->id }}">{{$designation->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                            <label for="name">Picture</label>
                            <input type="file" name="photo" id="photo" class="form-control">
                        </div>
                    </div>

                    {{--<div class="form-group col-sm-12 col-md-12 col-lg-12">--}}
                    {{--<label for="name">Profile</label>--}}
                    {{--<textarea class="form-control" name="profile" id="profile" cols="30" rows="5"></textarea>--}}
                    {{--</div>--}}

                    <div class="form-group text-center">
                        <button class="btn btn-success" type="submit">Add Appointee</button>
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