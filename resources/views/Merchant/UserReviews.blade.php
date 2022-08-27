@extends('Merchant.layouts.master')

@section('title', 'Reviews')
@section('header', 'Merchant Reviews')

@section('content')


{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css"></script> --}}
    
<script>
    $( function() {
      $( "#datepicker" ).datepicker();
    } );
    $( function() {
      $( "#datepicker1" ).datepicker();
    } );
    </script>


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

                            @if(Session::has('success'))
                            <p class="alert alert-success" style="    text-align-last: center;
                            ">{{ Session::get('success') }}</p>
                            @endif
    
                            @if(Session::has('alert'))
                            <p class="alert alert-danger" style="    text-align-last: center;
                            ">{{ Session::get('alert') }}</p>
                            @endif

                            <div style="margin-top: 10px;">
                                <h4 style="display: table-cell;">Date Filter:</h4>
                                <form action="{{url('MerchantOfferReviewsFilter')}}" method="GET" style="display: table-cell;">
                                    <span style="    margin-left: 14px;">From:</span> 
                                    <input id="datepicker" name="min_date" type="text">

                                    <span>To:</span> 
                                    <input type="text" name="max_date" id="datepicker1">
                                    <button class="btn btn-sm btn-info" type="submit">Search</button>
                                </form>
                            </div>


                            <table id="example4" class="display min-w850">
                                <thead>
                                    <tr>
                                        {{-- <th>Sr.No</th> --}}
                                        {{-- <th>Review ID</th> --}}
                                        <th>User Name</th>
                                        <th>Deal Name</th>
                                        <th>Rating</th>
                                        <th>Notes</th>
                                        <th>Your Reply</th>
                                        <th>Review</th>
                                        <th>Action</th>
                                        {{-- <th>Rating</th>
                                        <th>Notes </th>
                                        <th>Deal </th>
                                        <th>Merchant </th>
                                        <th>Date </th>
                                        <th></th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $count = count($reviews);
                                    @endphp

                                    @if($from_filter == 0)

                                        @for($i = 0; $i < $count; $i++)
                                            @if($reviews[$i]['parent_id'] == 0)
                                            <tr>
                                                {{-- <td>{{$reviews[$i]['id']}}</td> --}}
                                                <td>{{$reviews[$i]['name']}}</td>
                                                
                                                <td>{{$reviews[$i]['deal_name']}}</td>
                                                {{-- @else
                                                <td> Reply To Review # {{$reviews[$i]['parent_id']}} </td>
                                                @endif --}}

                                                <td>{{$reviews[$i]['rating']}}/5</td>
                                                <td>{{$reviews[$i]['notes']}}</td>


                                                @if($reviews[$i]['replied']== true)
                                                    <td>{{$reviews[$i]['reply_notes']}}</td>
                                                @else
                                                    <td>NOT YET</td>
                                                @endif

                                                {{-- <td>{{$reviews[$i]['notes']}}</td> --}}


                                                <td> {{Carbon\Carbon::parse($reviews[$i]['created_at'])->format('d F Y')}}</td>

                                                {{-- @php
                                                    $found = false;
                                                    $id = $reviews[$i]['id'];
                                                @endphp
                                                @foreach($reviews as $key => $r)

                                                    @if( $id == $r['parent_id'] )
                                                        @php
                                                            $found = true;
                                                        @endphp
                                                    @else
                                                        @php
                                                            $found = false;
                                                        @endphp
                                                    @endif

                                                @endforeach --}}
                                                
                                                @if($reviews[$i]['replied']== true)
                                                    <td> <a data-id="{{$reviews[$i]['id']}}" data-replied="1" type="button"
                                                        class="btn btn-sm btn-info mb-2 this_is_id" data-toggle="modal"
                                                        data-target="#basicModal" style="color: #f5f5f5 !important;">Replied</a>
                                                    </td>
                                                @else
                                                    <td> <a data-id="{{$reviews[$i]['id']}}" type="button" data-replied="0"
                                                        class="btn btn-sm btn-primary mb-2 this_is_id" data-toggle="modal"
                                                        data-target="#basicModal" style="color: #f5f5f5 !important;">Reply</a>
                                                    </td>
                                                @endif


                                            </tr>
                                            @endif 
                                        @endfor
                                    @else

                                        

                                        @for($i = 0; $i < $count; $i++)



                                            @php
                                            $enter = false;
                                            @endphp
                                            @php
                                            $review_date = Carbon\Carbon::parse($reviews[$i]['created_at'])->format('Y-m-d');
                                            $enter = false;
                                            if($min_date <= $review_date && $max_date >= $review_date)
                                            {
                                                // dd('yes');
                                                $enter = true;
                                            }
                                            else
                                            {
                                                $enter = false;
                                            }
                                            @endphp

                                            @if($enter)

                                                @if($reviews[$i]['parent_id'] == 0)
                                                <tr>
                                                    {{-- <td>{{$reviews[$i]['id']}}</td> --}}
                                                    <td>{{$reviews[$i]['name']}}</td>
                                                    
                                                    <td>{{$reviews[$i]['deal_name']}}</td>
                                                    {{-- @else
                                                    <td> Reply To Review # {{$reviews[$i]['parent_id']}} </td>
                                                    @endif --}}

                                                    <td>{{$reviews[$i]['rating']}}/5</td>
                                                    <td>{{$reviews[$i]['notes']}}</td>


                                                    @if($reviews[$i]['replied']== true)
                                                        <td>{{$reviews[$i]['reply_notes']}}</td>
                                                    @else
                                                        <td>NOT YET</td>
                                                    @endif

                                                    {{-- <td>{{$reviews[$i]['notes']}}</td> --}}


                                                    <td> {{Carbon\Carbon::parse($reviews[$i]['created_at'])->format('d F Y')}}</td>

                                                    {{-- @php
                                                        $found = false;
                                                        $id = $reviews[$i]['id'];
                                                    @endphp
                                                    @foreach($reviews as $key => $r)

                                                        @if( $id == $r['parent_id'] )
                                                            @php
                                                                $found = true;
                                                            @endphp
                                                        @else
                                                            @php
                                                                $found = false;
                                                            @endphp
                                                        @endif

                                                    @endforeach --}}
                                                    
                                                    @if($reviews[$i]['replied']== true)
                                                        <td> <a data-id="{{$reviews[$i]['id']}}" data-replied="1" type="button"
                                                            class="btn btn-sm btn-info mb-2 this_is_id" data-toggle="modal"
                                                            data-target="#basicModal" style="color: #f5f5f5 !important;">Replied</a>
                                                        </td>
                                                    @else
                                                        <td> <a data-id="{{$reviews[$i]['id']}}" type="button" data-replied="0"
                                                            class="btn btn-sm btn-primary mb-2 this_is_id" data-toggle="modal"
                                                            data-target="#basicModal" style="color: #f5f5f5 !important;">Reply</a>
                                                        </td>
                                                    @endif


                                                </tr>
                                                @endif 
                                            @endif 
                                        @endfor

                                    @endif

                                    {{-- @foreach($reviews as $review)
                                    @if($review['parent_id'] == 0)
                                    <tr>
                                        <td>{{$review['id']}}</td>
                                        <td>{{$review['name']}}</td>
                                        
                                        <td>{{$review['deal_name']}}</td>
                                     

                                        <td>{{$review['rating']}}/5</td>
                                        <td>{{$review['notes']}}</td>
                                        <td> {{Carbon\Carbon::parse($review['created_at'])->format('d F Y')}}</td>
                                        <td> <a data-id="{{$review['id']}}" type="button"
                                                class="btn btn-primary mb-2 this_is_id" data-toggle="modal"
                                                data-target="#basicModal" style="color: #f5f5f5 !important;">Reply</a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach --}}


                                    {{-- <button>Basic modal</button> --}}
                                    <!-- Modal -->
                                    <div class="modal fade" id="basicModal">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Reply</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="{{url('merchantReplyToComment')}}" method="POST">
                                                        <div class="form-row">
                                                            @csrf
                                                            
                                                            <div class="form-group col-md-12">
                                                                <label>Write A Reply: <span id="ifReplied"></span></label>
                                                                <input type="hidden" name="review_id" id="review_id">
                                                                <input type="text" name="reply" class="form-control"
                                                                    placeholder="Reply....">
                                                            </div>
                                                           
                                                        </div>
                                                        
                                                        <button type="submit" class="btn btn-sm btn-primary">Reply</button>
                                                    </form>

                                                </div>
                                                {{-- <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        $(".this_is_id").click(function(){
                                            // alert("The paragraph was clicked.");
                                            id = $(this).attr("data-id");
                                            replied = $(this).attr("data-replied");

                                            if(parseInt(replied) == 1)
                                            {
                                                document.getElementById('ifReplied').innerHTML =  ` <span> ( You can re-submit your reply )</span> `;
                                            }
                                            else
                                            {
                                                document.getElementById('ifReplied').innerHTML =  ``;
                                            }

                                            // alert(replied);
                                            document.getElementById('review_id').value = id;

                                        });
                                    </script>


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