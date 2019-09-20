<div class="card">
    <div class="card-header border-0">
        <h3 class="card-title">State</h3>
        <div class="card-tools">
            @if(count($states) >0)
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#state">
                    Add
                </button>
            @endif
        </div>
    </div>
    @if(count($states)!=0)
        <div class="card-body p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Abbrv.</th>
                    @if(auth()->user()->role_id != 3)
                        <th class="pull-right">Manage</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($states as $state)
                    <tr>
                        <td>{{ $state->name }}</td>
                        <td>{{ $state->abbrv }}</td>
                        @if(auth()->user()->role_id != 3)
                            <td><a href="{{ route('settings.deleteState', $state->id) }}" class="btn btn-danger btn-sm pull-right"><i class="fas fa-trash"></i></a></td>
                        @endif


                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        <div class=text-right>{{ $states->links() }}</div>
    @else
        <div class="card-body p-0">
            <div class="text-center">
                <h4>You have no states in your database</h4>
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#state">
                    Add State
                </button>
            </div>
        </div>
    @endif

</div>
<!-- /.card -->

<!-- Modal -->
<div class="modal fade" id="state" tabindex="-1" role="dialog" aria-labelledby="stateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stateLabel">Add New State</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('settings.addState') }}" method="POST">
                    @csrf

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" required class="form-control">
                    </div>

                    <div class="form-group offset-3 col-sm-6 col-md-6 col-lg-6">
                        <label for="abbrv">Abbreviation</label>
                        <input type="text" name="abbrv" id="abbrv" required class="form-control">
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-success" type="submit">Add State</button>
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