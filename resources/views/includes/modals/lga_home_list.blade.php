
    <table class="table table-striped table-valign-middle">
        <thead>
            <tr>
                <th>Name</th>
                <th>Designation</th>
                <th>Party</th>
                <th>Ward</th>
            </tr>
        </thead>
        <tbody>

            @if($loop->count >0)
                @foreach($lga->officials as $official)
                    @if($official->designation->name == "Area Council Chairman" || $official->designation->name == "Area Council Vice Chairman" || $official->designation->name == "Ward Councillor"  )
                    <tr>
                        <td><a href="#" data-toggle="modal" data-target="#profile-{{ $official->id }}">{{ $official->name }}</a></td>
                        <td>{{ $official->designation->name }}</td>
                        <td>{{ $official->party->abbrv }}</td>
                        <td>{{ $official->ward->name }}</td>
                        @include('includes.modals.officials_list_fp_modal')
                    </tr>
                    @endif
                @endforeach
            @endif



        </tbody>
    </table>

