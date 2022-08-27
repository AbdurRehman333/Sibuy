@extends('Admin.layouts.master')

@section('title', 'Admin Categories')
@section('header', 'Add Category')

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

                        {{-- <p class="alert alert-danger" style="    text-align-last: center;
                        ">{{ Session::get('alert') }}</p> --}}
                    @endif

                    <div class="card-header">
                        <h4 class="card-title">Add Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('AdminAddCategory')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Parent Category</label>
                                        {{-- <input type="text" class="form-control" placeholder="Branch Name"> --}}

                                        <select name="parent_id" class="form-control" id="">
                                            <option value="0"> No Category </option>
                                            @foreach($categories['data'] as $cat)
                                            <option value="{{$cat['id']}}">{{$cat['name']}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Category Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Category Name">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Category Image - Required </label>
                                        <input type="file" name="image" required class="form-control"
                                            placeholder="Branch Name">
                                    </div>
                                </div>

                                {{-- <div class="form-group" style="border: 2px solid #645d5d;
                                        border-radius: 16px;
                                        background: white;
                                        padding: 8px;
                                        text-align: center;">

                                    <label for="inputTag1" style="margin-top: 9px;">
                                        Category Image
                                        <input id="inputTag1" name="profile_picture" type="file" />
                                    </label>

                                    <style>
                                        #inputTag1 {
                                            display: none;
                                        }

                                        label {
                                            cursor: pointer;
                                        }
                                    </style>
                                </div> --}}

                                <div style="    text-align: center;">
                                    <button type="submit" class="btn btn-primary">Add Category</button>
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