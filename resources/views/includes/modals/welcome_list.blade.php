
{{--@if($designation)--}}
    {{--<table class="table table-striped table-valign-middle">--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<th>Name</th>--}}
    {{--<th>Designation</th>--}}
    {{--<th>LGA</th>--}}
    {{--<th>Ward</th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
    {{--<tr>--}}
    {{--@if($loop->count >0)--}}
    {{--@foreach($designation->officials as $official)--}}
    {{--<tr>--}}
    {{--<td><a href="#" data-toggle="modal" data-target="#profile-{{ $official->id }}">{{ $official->name }}</a></td>--}}
    {{--<td>{{ $official->designation->name }}</td>--}}
    {{--<td>{{ $official->lga->name }}</td>--}}
    {{--<td>{{ $official->ward->name }}</td>--}}
    {{--@include('includes.modals.officials_list_fp_modal')--}}
    {{--</tr>--}}

    {{--@endforeach--}}
    {{--@endif--}}

    {{--</tr>--}}

    {{--</tbody>--}}
    {{--</table>--}}

    <div class="row py-4 pb-5">
        {{--@if($loop->count >0)--}}
        @if($designation->name == 'FCT Minister' || $designation->name == 'Minister of State')
            @foreach($designation->ministers as $official)
                <div class="col-sm-6 mx-auto">
                    <a href="#" data-toggle="modal" data-target="#profile-{{ $official->id }}"><img class="mx-auto rounded-circle d-block" src="{{ asset($official->photo) }}" height="250" alt=""></a>
                    <h4 class="text-center">{{ $official->name }}</h4>
                    <p class="text-muted text-center">{{ $official->designation->name }} ({{ $official->party->abbrv }})</p>

                    @include('includes.modals.officials_list_fp_modal')
                </div>
            @endforeach
        @elseif($designation->name == 'Senator' || $designation->name == 'House of Rep')
            @foreach($designation->officials as $official)
                <div class="col-sm-6 mx-auto">
                    <a href="#" data-toggle="modal" data-target="#profile-{{ $official->id }}"><img class="mx-auto rounded-circle d-block" src="{{ asset($official->photo) }}" alt=""></a>
                    <h4 class="text-center">{{ $official->name }}</h4>
                    <p class="text-muted text-center">{{ $official->designation->name }} ({{ $official->party->abbrv }})</p>

                    @include('includes.modals.officials_list_fp_modal')
                </div>
            @endforeach
        @endif
        {{--@endif--}}
    </div>

{{--@else--}}
    {{--<h3>No Official registered for {{ $designation->name }}</h3>--}}
{{--@endif--}}
