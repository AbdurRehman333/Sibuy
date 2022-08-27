@extends('Admin.layouts.master')

@section('title', 'Manage Reviews')
@section('header', 'Merchant Reviews')

@section('content')


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Reviews</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example4" class="display min-w850">
                                <thead>
                                    <tr>
                                        {{-- <th>Sr.No</th> --}}
                                        <th>User Name</th>
                                        <th>Rating</th>
                                        <th>Notes </th>
                                        <th>Reply / Replied To </th>
                                        <th>Deal </th>
                                        <th>Merchant </th>
                                        <th>Date </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($merchant['reviews'] as $key => $review)
                                    
                                    <tr>
                                        {{-- <td>{{$key+1}}</td> --}}
                                        <td>{{$review['name']}}</td>
                                        {{-- <td>{{$user['created_at']}}</td> --}}
                                        
                                        @if($review['parent_id'] == 0)
                                        <td>{{$review['rating']}}/5</td>
                                        @else
                                        <td>N/A</td>
                                        @endif
                                        

                                        <td>{{$review['notes']}}</td>

                                        {{--  --}}

                                        @if($review['replied'] == true)
                                                <td><div>
                                                    {{$review['reply_notes']}}
                                                </div>
                                                <div style="font-weight: bold;">
                                                    {{-- Replied To : {{$review['name']}} --}}
                                                    Replied By : {{$review['merchant_name']}}
                                                </div>
                                                
                                                
                                            </td>
                                        @else

                                            @if($review['replied_to_someone'] == true)
                                                <td>
                                                <div style="font-weight: bold;">
                                                    {{-- Replied To : {{$review['replied_to']}} --}}
                                                    Replied By : {{$review['merchant_name']}}
                                                </div>
                                            </td>
                                            @else
                                                @if($review['parent_id'] == 0)
                                                <td style="color: gray;">NOT YET REPLIED</td>
                                                @else
                                                <td style="">
                                                    <div style="font-weight: bold;">
                                                        Replied to {{$review['replied_to']}} </td>
                                                    </div>
                                                @endif
                                            {{-- <td style="color: gray;">{{print_r($review)}}</td> --}}
                                            @endif
                                            
                                        @endif




                                        @if($review['deal_name'])
                                            <td> <a href="{{url('OfferDetails/'.$review['deal_id'])}}">{{$review['deal_name']}}</a> </td>
                                        @else
                                            <td>N/A</td>
                                        @endif
                                        
                                        <td> <a href="{{url('AdminMerchantProfile/'.$merchant['id'])}}">{{$merchant['name']}}</a> </td>
                                        <td> {{Carbon\Carbon::parse($review['created_at'])->format('d F Y')}}</td>
                                        
                                        @if($review['deal_name'])
                                        {{-- <td>{{$review['deal_name']}}</td> --}}
                                        <td> <a class="btn btn-sm btn-primary" style="color: #f5f5f5 !important;" href="{{url('AdminEditReview/'.$review['id'])}}"  >Edit</a> </td>

                                        @else
                                        <td><a class="btn btn-sm btn-danger" style="color: #f5f5f5 !important;" href="#">N/A</a></td>
                                        @endif
                                        
                                    </tr>

                                    @endforeach


                                  

                            

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        



        
        {{-- <div class="row">
                <div class="col-xl-4 col-xxl-8">




                </div>
    
        </div> --}}

    </div>





</div>






@endsection

@section('scripts')
<script src="{{asset('assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/datatables.init.js')}}"></script>
@endsection