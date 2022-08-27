@extends('Admin.layouts.master')

@section('title', 'Manage Customers')
@section('header', 'Manage Customers')

@section('content')


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Discount Requests</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example4" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Deal#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Discount on Price % </th>
                                        <th>Double Discount % </th>
                                        <th>Time Limit </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- @foreach($users as $key => $user) --}}
                                        
                                    <tr>
                                        <td>1</td>
                                        <td><a href="#">Pizza in ABC Restaurant</a></td>
                                        {{-- <td> {{Carbon\Carbon::parse($user['created_at'])->format('d F Y')}}</td> --}}
                                        <td>5000</td>
                                        <td>50%</td>
                                        <td>70%</td>
                                        <td>10-20-2022</td>
                                        <td> <button class="btn btn-sm btn-success">Approve</button> 
                                            <button class="btn btn-sm btn-danger">Decline</button>
                                        </td>
                                    </tr>

                                    {{-- @endforeach --}}


                                    

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