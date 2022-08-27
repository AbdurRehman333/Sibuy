@extends('Admin.layouts.master')

@section('title', 'Admin Categories')
@section('header', 'All Categories')

@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Profile Datatable</h4>
                    </div>
                    <div class="card-body">

                        @if(Session::has('success'))
                        <p class="alert alert-success" style="    text-align-last: center;
                        ">{{ Session::get('success') }}</p>
                        @endif

                        @if(Session::has('alert'))
                        <p class="alert alert-danger" style="    text-align-last: center;
                        ">{{ Session::get('alert') }}</p>
                        @endif
                        
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Parent Category</th>
                                        {{-- <th>Coupons</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($categories['data'] as $key => $cat)
                                        
                                    <tr>
                                        <td>{{$key+1}}</td>
                                       
                                        <td>{{$cat['name']}}</td>

                                        @if($cat['parent_id'] == 0)
                                        <td>No Parent</td>
                                        @else
                                        <td>{{$cat['parent_name']}}</td>
                                        @endif
                                       
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{url('AdminEditCategory/'.$cat['id'])}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="{{url('AdminDeleteCategory/'.$cat['id'])}}" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>

                                    </tr>

                                    @endforeach
                             
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




@endsection

@section('scripts')
<script src="{{asset('assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/datatables.init.js')}}"></script>
@endsection