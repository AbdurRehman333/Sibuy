@extends('Admin.layouts.master')

@section('title', 'MALE STATS')
@section('header', 'Dashboard')

@section('content')

<link href="{{asset('/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Map</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">jqvmap</a></li>
            </ol>
        </div>
        <!-- row -->

        <script>
            text = 123123;
        </script>

        <!-- Vectormap -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">World Map</h4>
                    </div>
                    <div class="card-body">
                        <div id="world-map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('assets/vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/sparkline-init.js')}}"></script>

<script src="./vendor/chart.js/Chart.bundle.min.js"></script>
<script src="./js/plugins-init/chartjs-init.js"></script>

  <!-- Vectormap -->
  <script src="{{asset('/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('/vendor/jqvmap/js/jquery.vmap.world.js')}}"></script>
  <script src="{{asset('/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>


  <!-- All init script -->
  <script src="{{asset('/js/plugins-init/jqvmap-init.js')}}"></script>
@endsection