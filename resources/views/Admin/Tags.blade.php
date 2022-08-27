@extends('Admin.layouts.master')

@section('title', 'Admin Tags')
@section('header', 'All Tags')

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

                    @if(Session::has('success'))
                    <p class="alert alert-success" style="    text-align-last: center;
                    ">{{ Session::get('success') }}</p>
                    @endif

                    @if(Session::has('alert'))
                    <p class="alert alert-danger" style="    text-align-last: center;
                    ">{{ Session::get('alert') }}</p>
                    @endif
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($tags['data'] as $key => $tag)
                                        
                                    <tr>
                                        <td>{{$key+1}}</td>
                                       
                                        <td>{{$tag['name']}}</td>
                                       
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{url('AdminEditTag/'.$tag['id'])}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="{{url('AdminDeleteTag/'.$tag['id'])}}" class="btn btn-danger shadow btn-xs sharp"><i
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