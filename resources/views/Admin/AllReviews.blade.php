@extends('Admin.layouts.master')

@section('title', 'Manage Reviews')
@section('header', 'Admin Reviews')

@section('content')


{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js">
</script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
</script>
<script type="text/javascript" charset="utf8"
    src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js">
</script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css"></script>
--}}
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

                            <div style="margin-top: 10px;">
                                <h4 style="display: table-cell;">Date Filter:</h4>
                                <form action="{{url('AdminAllReviewsFilterUsers')}}" method="GET"
                                    style="display: table-cell;">
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

                                        <th>User Name</th>
                                        <th>Rating</th>
                                        <th>Notes </th>
                                        <th>Status </th>
                                        <th>Date </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- @php
                                    $count = count($reviews);

                                    @endphp --}}

                                    @foreach($reviews as $key => $review)

                                    <tr>
                                        <td>{{$review['name']}}</td>

                                        <td>{{$review['rating']}}/5</td>
                                
                                        <td>{{$review['notes']}}</td>

                                        <td>{{$review['status']}}</td>

                                        <td> {{Carbon\Carbon::parse($review['created_at'])->format('d F Y')}}</td>

                                        <td> <a class="btn btn-sm btn-primary" style="color: #f5f5f5 !important;"
                                            href="{{url('AdminEditReview/'.$review['id'])}}">Edit</a> </td>

                                    </tr>
                                    @endforeach




                                </tbody>
                            </table>

                            {{-- <table id="example4" class="display min-w850">
                                <thead>
                                    <tr>

                                        <th>User Name</th>
                                        <th>Rating</th>
                                        <th>Notes </th>
                                        <th>Reply / Replied To </th>
                                        <th>Deal </th>
                                        <th>Deal Merchant </th>
                                        <th>Date </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                    $count = count($reviews);

                                    @endphp

                                    @if($from_filter == 0)

                                    @for($i = $count-1; $i >= 0; $i--)



                                    @php




                                    @endphp


                                    <tr>
                                        <td>{{$reviews[$i]['name']}}</td>

                                        @if($reviews[$i]['parent_id'] == 0)
                                        <td>{{$reviews[$i]['rating']}}/5</td>
                                        @else
                                        <td>N/A</td>
                                        @endif
                                        <td>{{$reviews[$i]['notes']}}</td>
                                        @if($reviews[$i]['replied'] == true)
                                        <td>
                                            <div>
                                                {{$reviews[$i]['reply_notes']}}
                                            </div>
                                            <div style="font-weight: bold;">
                                                Replied By : {{$reviews[$i]['merchant_name']}}
                                            </div>


                                        </td>
                                        @else

                                        @if($reviews[$i]['replied_to_someone'] == true)
                                        <td>
                                            <div style="font-weight: bold;">
                                                Replied By : {{$reviews[$i]['merchant_name']}}
                                            </div>
                                        </td>
                                        @else
                                        @if($reviews[$i]['parent_id'] == 0)
                                        <td style="color: gray;">NOT YET REPLIED</td>
                                        @else
                                        <td style="">
                                            <div style="font-weight: bold;">
                                                Replied to {{$reviews[$i]['replied_to']}}
                                        </td>
                        </div>
                        @endif
                        @endif

                        @endif


                        @if($reviews[$i]['deal_name'])
                        <td> <a
                                href="{{url('OfferDetails/'.$reviews[$i]['deal_id'])}}">{{$reviews[$i]['deal_name']}}</a>
                        </td>
                        @else
                        <td>N/A</td>
                        @endif

                        <td> <a
                                href="{{url('AdminMerchantProfile/'.$reviews[$i]['merchant_name'])}}">{{$reviews[$i]['merchant_name']}}</a>
                        </td>
                        <td> {{Carbon\Carbon::parse($reviews[$i]['created_at'])->format('d F Y')}}</td>

                        @if($reviews[$i]['deal_name'])
                        <td> <a class="btn btn-sm btn-primary" style="color: #f5f5f5 !important;"
                                href="{{url('AdminEditReview/'.$reviews[$i]['id'])}}">Edit</a> </td>

                        @else
                        <td><a class="btn btn-sm btn-danger" style="color: #f5f5f5 !important;" href="#">N/A</a></td>
                        @endif

                        </tr>

                        @endfor

                        @else
                        @php
                        $enter = false;
                        @endphp

                        @for($i = $count-1; $i >= 0; $i--)



                        @php
                        $review_date = Carbon\Carbon::parse($reviews[$i]['created_at'])->format('Y-m-d');
                        $enter = false;
                        if($min_date <= $review_date && $max_date>= $review_date)
                            {

                            $enter = true;
                            }
                            else
                            {
                            $enter = false;
                            }
                            @endphp


                            @if($enter)
                            <tr>
                                <td>{{$reviews[$i]['name']}}</td>

                                @if($reviews[$i]['parent_id'] == 0)
                                <td>{{$reviews[$i]['rating']}}/5</td>
                                @else
                                <td>N/A</td>
                                @endif
                                <td>{{$reviews[$i]['notes']}}</td>
                                @if($reviews[$i]['replied'] == true)
                                <td>
                                    <div>
                                        {{$reviews[$i]['reply_notes']}}
                                    </div>
                                    <div style="font-weight: bold;">
                                        Replied By : {{$reviews[$i]['merchant_name']}}
                                    </div>


                                </td>
                                @else

                                @if($reviews[$i]['replied_to_someone'] == true)
                                <td>
                                    <div style="font-weight: bold;">
                                        Replied By : {{$reviews[$i]['merchant_name']}}
                                    </div>
                                </td>
                                @else
                                @if($reviews[$i]['parent_id'] == 0)
                                <td style="color: gray;">NOT YET REPLIED</td>
                                @else
                                <td style="">
                                    <div style="font-weight: bold;">
                                        Replied to {{$reviews[$i]['replied_to']}}
                                </td>
                    </div>
                    @endif
                    @endif

                    @endif


                    @if($reviews[$i]['deal_name'])
                    <td> <a href="{{url('OfferDetails/'.$reviews[$i]['deal_id'])}}">{{$reviews[$i]['deal_name']}}</a>
                    </td>
                    @else
                    <td>N/A</td>
                    @endif

                    <td> <a
                            href="{{url('AdminMerchantProfile/'.$reviews[$i]['merchant_name'])}}">{{$reviews[$i]['merchant_name']}}</a>
                    </td>
                    <td> {{Carbon\Carbon::parse($reviews[$i]['created_at'])->format('d F Y')}}</td>

                    @if($reviews[$i]['deal_name'])
                    <td> <a class="btn btn-sm btn-primary" style="color: #f5f5f5 !important;"
                            href="{{url('AdminEditReview/'.$reviews[$i]['id'])}}">Edit</a> </td>

                    @else
                    <td><a class="btn btn-sm btn-danger" style="color: #f5f5f5 !important;" href="#">N/A</a></td>
                    @endif

                    </tr>
                    @endif

                    @php
                    $enter = false;
                    @endphp
                    @endfor

                    @endif

                    </tbody>
                    </table> --}}
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