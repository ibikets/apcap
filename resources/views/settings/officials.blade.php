@extends('layouts.master')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">
            @include('includes.modals.appointees_modal')
        </div>
        <!-- /.col-md-6 -->
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">

            @include('includes.modals.positionlist')

        </div>
    </div>


@endsection


@section('scripts')

@endsection