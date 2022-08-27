@extends('Admin.layouts.master')

@section('title', 'Admin Categories')
@section('header', 'Edit Category')

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
                        <h4 class="card-title">Edit Category

                            {{-- {{print_r($category)}} --}}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('AdminCategoryUpdate',['id'=>$category['data']['id']])}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Parent Category</label>

                                        <select name="parent_id" class="form-control" id="">
                                            <option value="0"> No Category </option>
                                            @foreach($categories['data'] as $cat)

                                            @if($category['data']['id'] != $cat['id'])

                                            @if($cat['id'] == $category['data']['parent_id'])
                                            <option value="{{$cat['id']}}" selected>{{$cat['name']}}</option>
                                            @else
                                            <option value="{{$cat['id']}}">{{$cat['name']}}</option>
                                            @endif

                                            @endif

                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Category Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$category['data']['name']}}"
                                            placeholder="Category Name">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Category Image </label>
                                        <input type="file" name="image" class="form-control" placeholder="Branch Name">
                                    </div>
                                </div>

                                <div style="    text-align: center;">
                                    <button type="submit" class="btn btn-primary">Edit Category</button>
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