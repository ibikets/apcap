{{--@if(count($positions) != 0)--}}
<div class="card">
    <div class="card-header border-0">
        <h3 class="card-title">Designation</h3>
        <div class="card-tools">
            @if(count($positions) > 0)
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#position">
                    Add
                </button>
            @endif
        </div>
    </div>
    @if(count($positions) != 0)
        <div class="card-body p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                    <th>Name</th>
                    @if(auth()->user()->role_id != 3)
                        <th class="pull-right">Manage</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($positions as $position)
                    <tr>
                        <td>{{ $position->name }}</td>
                        @if(auth()->user()->role_id != 3)
                            <td><a href="{{ route('settings.deletePosition', $position->id) }}" class="btn btn-danger btn-sm pull-right"><i class="fas fa-trash"></i></a></td>
                        @endif


                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        <div class=text-right>{{ $positions->links() }}</div>
    @else
        <div class="card-body p-0">
            <div class="text-center">
                <h4>You have no designations in your database</h4>
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#position">
                    Add Designation
                </button>
            </div>
        </div>
    @endif


</div>
{{--@endif--}}
<!-- /.card -->

<!-- Modal -->
<div class="modal fade" id="position" tabindex="-1" role="dialog" aria-labelledby="positionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="positionLabel">Add New Designation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('settings.addPosition') }}" method="POST">
                    @csrf

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-success" type="submit">Add Designation</button>
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