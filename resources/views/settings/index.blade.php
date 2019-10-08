@extends('layouts.master')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-6">

            @include('includes.modals.party_modal')

            @include('includes.modals.state_modal')

            @include('includes.modals.district_modal')

            @include('includes.modals.position')

        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-6">

            @include('includes.modals.constituency_modal')

            @include('includes.modals.lga_modal')

            @include('includes.modals.ward_modal')

        </div>
        <!-- /.col-md-6 -->
    </div>




@endsection


@section('scripts')

@endsection