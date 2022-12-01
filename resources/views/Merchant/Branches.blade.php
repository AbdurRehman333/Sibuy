@extends('Merchant.layouts.master')

@section('title', 'Merchant Branches')
@section('header', 'Branches')

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

            @if (session('success'))
            <div class="alert alert-success alert-dismissible alert-alt fade show">
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                            class="mdi mdi-close"></i></span>
                </button>
                <strong>Success!</strong> {{ session('success') }}
            </div>
            @endif

            @if (session('alert'))
            <div class="alert alert-danger alert-dismissible alert-alt fade show">
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                            class="mdi mdi-close"></i></span>
                </button>
                <strong>Message!</strong> {{ session('alert') }}
            </div>
            @endif

            <div class="col-xl-12 col-xxl-8">
                <div>
                    <h1 class="class_offers">All Branches</h1>
                </div>

                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius!</p>

                @foreach($branches as $branch)

                <div class="media border-bottom mb-3 pb-3 d-lg-flex d-block menu-list" style="margin-top: 2rem;">
                    <a href="#">
                   
                        <img class="rounded mr-3 mb-md-0 mb-3"
                            src="{{''.config('path.path.WebPath').''.$branch['logoPath'].'/'.$branch['logo'].''}}" alt="" width="120">

                        {{-- <img class="rounded mr-3 mb-md-0 mb-3" src="images/menus/5.png"
                            alt="" width="120"> --}}
                        
                        </a>
                    <div class="media-body col-lg-8 pl-0">
                        <h6 class="fs-16 font-w600"><a href="#" class="text-black">
                                {{$branch['name']}}
                            </a></h6>
                        <p class="fs-14">{{$branch['description']}}</p>
                        <div class="">

                            {{-- <div style="    text-align: -webkit-center;
                                                margin-top: 10px;">
                                <button class="btn btn-primary"> <span>Edit</span>
                                </button>
                            </div> --}}

                            <a style="text-decoration: none;" href="{{ URL('MerchantEditbranch/'.$branch['id'])}}">

                                <button class="btn btn-primary">
                                    <span style="color:#efe8e8">Edit</span>
                                </button>
                            </a>

                            <a style="text-decoration: none;" href="{{ URL('MerchantDeletebranch/'.$branch['id'])}}">

                                <button class="btn btn-danger">
                                    <span style="color:#efe8e8">Delete</span>
                                </button>
                            </a>

                        </div>
                    </div>
                </div>

                @endforeach

                <style>
                    .flex-1 {
                        display: none;
                    }

                    /* .text-sm{
                                   display: none;
                                } */
                    .w-5 {
                        width: 24px;
                    }
                </style>

                <div style="margin-bottom: 20px;    text-align: center;">{{$branches->links()}}</div>

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