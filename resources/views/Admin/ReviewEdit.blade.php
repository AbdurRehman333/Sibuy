@extends('Admin.layouts.master')

@section('title', 'Admin Reviews')
@section('header', 'Edit Review')

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


                    <div class="card-header">
                        <h4 class="card-title">Edit Review

                            {{-- {{print_r($category)}} --}}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('AdminReviewUpdate')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="review_id" value="{{$review['id']}}">
                                <input type="hidden" name="deal_id" value="{{$review['deal_id']}}">
                                {{-- <input type="hidden" name="deal_id" value="{{$review['deal_id']}}"> --}}
                                <input type="hidden" name="rating_old" value="{{$review['rating']}}">

                                @if($review['parent_id'] == 0)

                                <div id="old_rating" style="
                                    padding: 15px;   display: -webkit-inline-box;  margin-bottom: 19px;">

                                    <div class="rating" style="margin-bottom: 7px;    padding: 6px;
                                    ">
                                    @for($i = 1; $i < 6; $i++)
                                        @if($review['rating'] >= $i)
                                        <span class="star_statis_class fa-lg fa fa-star checked"></span>
                                        @else
                                        <span class="star_statis_class fa-lg fa fa-star "></span>
                                        @endif
                                    @endfor
                                    </div>
                                    
                                    <button style="margin-left: 10px;" id="my-button" type="button" class="btn btn-sm btn-info"> Edit Rating </button>

                                </div>

                                

                                
                                

                                <div class="form-row" id="new_rating">
                                    <div class="form-group col-md-12">
                                        {{-- <label>Review Statement</label> --}}
                                        {{-- <h3 style="place-self: center;">Rating : </h3> --}}
                                        <div class="rate" style="    margin-bottom: 6px;">
                                        <input type="radio" id="star5" name="rating" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rating" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rating" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rating" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rating" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                    </div>
                                </div>


                                <style>
                                    #new_rating{
                                        display: none;
                                    }
                                </style>

                                <script>
                                    $("#my-button").click(function(e){
                                        var old_rating = document.getElementById('old_rating');
                                        $(old_rating).css("display","none");
                                        var new_rating = document.getElementById('new_rating');  
                                        $(new_rating).css("display","flex");

                                    });
                                </script>

                                @endif

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Review Statement</label>
                                        <textarea name="notes" class="form-control" name="statement" id="" cols="20"
                                            rows="10"> {{$review['notes']}} </textarea>
                                    </div>
                                </div>


                                <div style="    text-align: center;">
                                    <button type="submit" class="btn btn-primary">Edit Review</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




            <style>
                .fa-star:before {
                    content: '★' !important;
                }

                .checked {
                    color: #c59b08;
                }
            </style>
            <style>
                * {
                    margin: 0;
                    padding: 0;
                }

                .rate {
                    float: left;
                    height: 46px;
                    padding: 0 10px;
                }

                .rate:not(:checked)>input {
                    position: absolute;
                    /* top: -9999px; */
                    clip: rect(0, 0, 0, 0);
                }

                .rate:not(:checked)>label {
                    float: right;
                    width: 1em;
                    overflow: hidden;
                    white-space: nowrap;
                    cursor: pointer;
                    font-size: 30px;
                    color: #ccc;
                }

                .rate:not(:checked)>label:before {
                    content: '★ ';
                }

                .rate>input:checked~label {
                    color: #ffc700;
                }

                .rate:not(:checked)>label:hover,
                .rate:not(:checked)>label:hover~label {
                    color: #deb217;
                }

                .rate>input:checked+label:hover,
                .rate>input:checked+label:hover~label,
                .rate>input:checked~label:hover,
                .rate>input:checked~label:hover~label,
                .rate>label:hover~input:checked~label {
                    color: #c59b08;
                }

                .rate>input {
                    position: absolute;
                    /* top:-9999px; */
                    clip: rect(0, 0, 0, 0);
                }

                /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
            </style>

        </div>


    </div>
</div>




</div>





@endsection

@section('scripts')
<script src="{{asset('assets/vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/sparkline-init.js')}}"></script>
@endsection