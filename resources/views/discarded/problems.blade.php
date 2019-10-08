<div class="row col-lg-12 col-md-12 align-content-center">
    <div id="accordion">
        <div class="card">
            @foreach($designations as $count => $designation)
                <div class="card-header col-lg-12 col-md-12" id="{{$designation->id}}" >
                    <h5 class="mb-0">

                        <button class="btn btn-link" data-toggle="collapse" data-target="#{{str_replace(' ','',strtolower($designation->name))}}" aria-expanded="false" aria-controls="{{str_replace(' ','',strtolower($designation->name))}}">
                            {{ $designation->name }}
                        </button>

                    </h5>
                </div>

                <div id="{{str_replace(' ','',strtolower($designation->name))}}" class="collapse @if($count==0) show @endif" aria-labelledby="{{$designation->id}}" data-parent="#accordion">
                    <div class="card-body">
                        {{--@foreach($designation->officials as $official)--}}
                        {{--test--}}
                        {{--@endforeach--}}
                        {{--@include('includes.modals.welcome_list')--}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{--<div class="row">--}}
{{--<nav>--}}
{{--<div class="nav nav-tabs" id="nav-tab" role="tablist">--}}
{{--@foreach($designations as $count => $designation)--}}
{{--<a class="nav-item nav-link @if($count==0) active @endif" id="{{str_replace(' ','',strtolower($designation->name))}}-tab" data-toggle="tab" href="#{{str_replace(' ','',strtolower($designation->name))}}" role="tab" aria-controls="{{str_replace(' ','',strtolower($designation->name))}}" aria-selected="@if($count==0) true @endif">{{ $designation->name }}</a>--}}
{{--@endforeach--}}
{{--</div>--}}
{{--</nav>--}}
{{--<div class="tab-content" id="nav-tabContent">--}}
{{--@foreach($designations as $count => $designation)--}}
{{--<div class="tab-pane fade @if($count==0)show active @endif" id="{{str_replace(' ','',strtolower($designation->name))}}" role="tabpanel" aria-labelledby="{{str_replace(' ','',strtolower($designation->name))}}-tab">--}}
{{--@include('includes.modals.welcome_list')--}}
{{--</div>--}}
{{--@endforeach--}}
{{--</div>--}}
{{--</div>--}}