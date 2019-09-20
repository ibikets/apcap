@if(count($districts) != 0)
<div class="card">
    <div class="card-header border-0">
        <h3 class="card-title">Constituencies</h3>
        <div class="card-tools">
            @if(count($districts) > 0 & count($constituencies) >0)
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#constituency">
                    Add
                </button>
            @endif
        </div>
    </div>
    @if(count($constituencies) != 0)
        <div class="card-body p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>District</th>
                    @if(auth()->user()->role_id != 3)
                        <th class="pull-right">Manage</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($constituencies as $constituency)
                    <tr>
                        <td>{{ $constituency->name }}</td>
                        <td>{{ $constituency->district->name }}</td>
                        @if(auth()->user()->role_id != 3)
                            <td><a href="{{ route('settings.deleteConstituency', $constituency->id) }}" class="btn btn-danger btn-sm pull-right"><i class="fas fa-trash"></i></a></td>
                        @endif


                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        <div class=text-right>{{ $constituencies->links() }}</div>
    @else
        <div class="card-body p-0">
            <div class="text-center">
                <h4>You have no constituencies in your database</h4>
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#constituency">
                    Add Constituency
                </button>
            </div>
        </div>
    @endif

</div>
@endif
<!-- /.card -->

<!-- Modal -->
<div class="modal fade" id="constituency" tabindex="-1" role="dialog" aria-labelledby="constituencyLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="constituencyLabel">Add New Constituency</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('settings.addConstituency') }}" method="POST">
                    @csrf

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" required class="form-control">
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="name">District</label>
                        <select name="district_id" id="district_id" class="form-control">
                            @foreach($districts as $district)
                                <option value="{{$district->id}}">{{$district->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-success" type="submit">Add Constituency</button>
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