@extends('Admin.layouts.master')

@section('title', 'Admin Tags')
@section('header', 'Edit Tag')

@section('content')


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">


            <style>
                /* @media screen and (min-width: 1200px) { */
                .class_offers {
                    display: contents;
                }

                .search_offers {
                    float: right;
                    /* background: red !important; */

                }

                /* } */
                @media screen and (max-width: 454px) {
                    .search_offers {
                        width: 100%;
                    }
                }
            </style>


            <div class="col-xl-6 col-lg-12">
                <div class="card">

                    @if (session('success'))
                    <div style="    text-align: -webkit-center; margin-top:2rem;">
                        <div class="alert alert-success" style="width:60%">
                            <strong>Message: </strong> {{ session('success') }}
                        </div>
                    </div>
                    @endif

                    @if(Session::has('alert'))
                    <div style="    text-align: -webkit-center; margin-top:2rem;">
                        <div class="alert alert-danger" style="width:60%">
                            <strong>Message: </strong> {{ session('alert') }}
                        </div>
                    </div>
                    @endif


                    <div class="card-header">
                        <h4 class="card-title">Edit Tag

                            {{-- {{print_r($category)}} --}}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('AdminTagUpdate',['id'=>$tag['data']['id']])}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Tag Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$tag['data']['name']}}"
                                            placeholder="Category Name">
                                    </div>
                                </div>

                                <div style="    text-align: center;">
                                    <button type="submit" class="btn btn-primary">Edit Tag</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
@endsection