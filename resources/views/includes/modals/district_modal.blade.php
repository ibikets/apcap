@if(count($states) != 0)
<div class="card">
    <div class="card-header border-0">
        <h3 class="card-title">Senatorial Districts</h3>
        <div class="card-tools">
        {{--<a href="#" class="btn btn-tool btn-sm">--}}
        {{--<i class="fas fa-download"></i>--}}
        {{--</a>--}}
        {{--<a href="#" class="btn btn-tool btn-sm">--}}
        {{--<i class="fas fa-bars"></i>--}}
        {{--</a>--}}
        <!-- Button trigger modal -->
            @if(count($states) > 0 & count($districts) > 0)
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#district">
                    Add
                </button>
            @endif
        </div>
    </div>
    @if(count($districts) != 0)
        <div class="card-body p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>State</th>
                    @if(auth()->user()->role_id != 3)
                        <th class="pull-right">Manage</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($districts as $district)
                    <tr>
                        <td>{{ $district->name }}</td>
                        <td>{{ $district->state->abbrv }}</td>
                        @if(auth()->user()->role_id != 3)
                            <td><a href="{{ route('settings.deleteDistrict', $district->id) }}" class="btn btn-danger btn-sm pull-right"><i class="fas fa-trash"></i></a></td>
                        @endif


                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        <div class=text-right>{{ $districts->links() }}</div>
    @else
        <div class="card-body p-0">
            <div class="text-center">
                <h4>You have no senatorial districts in your database</h4>
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#district">
                    Add Senatorial District
                </button>
            </div>
        </div>
    @endif


</div>
@endif
<!-- /.card -->

<!-- Modal -->
<div class="modal fade" id="district" tabindex="-1" role="dialog" aria-labelledby="districtLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="districtLabel">Add New District</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('settings.addDistrict') }}" method="POST">
                    @csrf

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="name">State</label>
                        <select name="state_id" id="state_id" class="form-control">
                            @foreach($states as $state)
                                <option value="{{$state->id}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-success" type="submit">Add District</button>
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