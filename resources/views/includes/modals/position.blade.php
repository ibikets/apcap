{{--@if(count($designations) != 0)--}}
<div class="card">
    <div class="card-header border-0">
        <h3 class="card-title">Office</h3>
        <div class="card-tools">
            @if(count($designations) > 0)
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#designation">
                    Add
                </button>
            @endif
        </div>
    </div>
    @if(count($designations) != 0)
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
                @foreach($designations as $designation)
                    <tr>
                        <td>{{ $designation->name }}</td>
                        @if(auth()->user()->role_id != 3)
                            <td><a href="{{ route('settings.deleteDesignation', $designation->id) }}" class="btn btn-danger btn-sm pull-right"><i class="fas fa-trash"></i></a></td>
                        @endif


                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        {{--<div class=text-right>{{ $designations->links() }}</div>--}}
    @else
        <div class="card-body p-0">
            <div class="text-center">
                <h4>You have no Offices in your database</h4>
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#designation">
                    Add Office
                </button>
            </div>
        </div>
    @endif


</div>
{{--@endif--}}
<!-- /.card -->

<!-- Modal -->
<div class="modal fade" id="designation" tabindex="-1" role="dialog" aria-labelledby="designationLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="designationLabel">Add New Office</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('settings.addDesignation') }}" method="POST">
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