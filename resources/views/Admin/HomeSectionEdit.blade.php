@extends('Admin.layouts.master')

@section('title', 'Admin Management')
@section('header', 'Home Page Management')

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
                            <strong> Message: </strong> {{ session('success') }}
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
                        <h4 class="card-title">Update Box</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            @if($section['data']['section'] == 'crousel')

                            <form action="{{url('UpdateSectionBox')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Head Text</label>

                                        <input type="text" name="heading" value="{{$section['data']['text']}}"
                                            class="form-control" placeholder="Heading on Crousel...">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Lower Text</label>

                                        <input type="text" name="text" value="{{$section['data']['text']}}"
                                            class="form-control" placeholder="Some Text...">

                                        <input type="hidden" name="section_id" value="{{$section['data']['id']}}"
                                            class="form-control" placeholder="Some Text...">
                                        <input type="hidden" name="section" value="{{$section['data']['section']}}"
                                            class="form-control" placeholder="Some Text...">
                                        <input type="hidden" name="sequence" value="{{$section['data']['sequence']}}"
                                            class="form-control" placeholder="Some Text...">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Link to Redirect</label>
                                        <input type="text" name="link" value="{{$section['data']['text']}}"
                                            class="form-control" placeholder="Heading on Crousel...">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Banner Image </label>
                                        <input type="file" name="image" class="form-control" placeholder="Branch Name">
                                    </div>
                                </div>

                                {{-- <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Category</label>
                                        <select name="category" class="form-control" id="">
                                            <option value="0"> No Category </option>

                                            @foreach($categories['data'] as $cat)
                                            @if($cat['parent_id'] == 0)
                                            @if($section['data']['data_id'] == $cat['id'])
                                            <option value="{{$cat['id']}}" selected>{{$cat['name']}}</option>
                                            @else
                                            <option value="{{$cat['id']}}">{{$cat['name']}}</option>s
                                            @endif
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                {{-- @if($section['data']['section'] == 'CatBlockSection')
                                @else
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Box Image </label>
                                        <input type="file" name="image" class="form-control" placeholder="Branch Name">
                                    </div>
                                </div>
                                @endif --}}


                                <div style="    text-align: center;">
                                    <button type="submit" class="btn btn-primary">Update Box</button>
                                </div>
                            </form>


                            @else

                            <form action="{{url('UpdateSectionBox')}}" method="POST" enctype="multipart/form-data">
                                @csrf



                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Box Text</label>

                                        <input type="text" name="text" value="{{$section['data']['text']}}"
                                            class="form-control" placeholder="Some Text...">

                                        <input type="hidden" name="section_id" value="{{$section['data']['id']}}"
                                            class="form-control" placeholder="Some Text...">
                                        <input type="hidden" name="section" value="{{$section['data']['section']}}"
                                            class="form-control" placeholder="Some Text...">
                                        <input type="hidden" name="sequence" value="{{$section['data']['sequence']}}"
                                            class="form-control" placeholder="Some Text...">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Category</label>
                                        <select name="category" class="form-control" id="">
                                            <option value="0"> No Category </option>

                                            @foreach($categories['data'] as $cat)
                                            @if($cat['parent_id'] == 0)
                                            @if($section['data']['data_id'] == $cat['id'])
                                            <option value="{{$cat['id']}}" selected>{{$cat['name']}}</option>
                                            @else
                                            <option value="{{$cat['id']}}">{{$cat['name']}}</option>s
                                            @endif
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                @if($section['data']['section'] == 'CatBlockSection')
                                @else
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Box Image </label>
                                        <input type="file" name="image" class="form-control" placeholder="Branch Name">
                                    </div>
                                </div>
                                @endif


                                <div style="    text-align: center;">
                                    <button type="submit" class="btn btn-primary">Update Box</button>
                                </div>
                            </form>

                            @endif









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