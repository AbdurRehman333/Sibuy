@extends('Admin.layouts.master')

@section('title', 'Admin Management')
@section('header', 'Home Page Management')

@section('content')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
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

<style>
    .dt-button {
        display: inline-block;
        color: #fff;
        margin-top: 1.5em;
        margin-right: 0.5em;
        text-align: center;
        padding: 0.7em;
        border: none;
        border-radius: 4px;
        box-shadow: 2px 2px 4px rgb(0 0 0 / 40%);
        text-decoration: none !important;
        cursor: pointer;
        font-size: 1em;
        border-radius: 11px;
        padding: 6px;
        background: #a8a8cf;
    }

    dataTables_wrapper .dataTables_paginate .paginate_button.current {
        color: #fff !important;
        background: #ccc !important;
    }

    .paginate_button {
        background: #ccc !important;
    }
</style>


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        {{-- <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Home Page Management</h4> --}}
                    </div>


                    <style>
                        * {
                            box-sizing: border-box;
                            -webkit-box-sizing: border-box;
                            -moz-box-sizing: border-box;
                        }

                        /* body{
                            font-family: Helvetica;
                            -webkit-font-smoothing: antialiased;
                            background: rgba( 71, 147, 227, 1);
                        } */
                        h2 {
                            text-align: center;
                            font-size: 18px;
                            text-transform: uppercase;
                            letter-spacing: 1px;
                            color: rgb(0, 0, 0);
                            padding: 30px 0;
                        }

                        /* Table Styles */

                        .table-wrapper {
                            margin: 10px 70px 70px;
                            box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
                        }

                        .fl-table {
                            border-radius: 5px;
                            font-size: 16px;
                            font-weight: normal;
                            border: none;
                            border-collapse: collapse;
                            width: 100%;
                            max-width: 100%;
                            white-space: nowrap;
                            background-color: white;
                        }

                        .fl-table td,
                        .fl-table th {
                            text-align: center;
                            padding: 8px;
                        }

                        .fl-table td {
                            border-right: 1px solid #f8f8f8;
                            font-size: 16px;
                        }

                        .fl-table thead th {
                            color: #ffffff;
                            /* background: #4FC3A1; */
                            background: #458aad;
                        }


                        .fl-table thead th:nth-child(odd) {
                            color: #ffffff;
                            /* background: #324960; */
                            background: #458aad;
                        }

                        .fl-table tr:nth-child(even) {
                            background: #F8F8F8;
                        }

                        /* Responsive */

                        @media (max-width: 767px) {
                            .fl-table {
                                display: block;
                                width: 100%;
                            }

                            .table-wrapper:before {
                                content: "Scroll horizontally >";
                                display: block;
                                text-align: right;
                                font-size: 11px;
                                color: white;
                                padding: 0 0 10px;
                            }

                            .fl-table thead,
                            .fl-table tbody,
                            .fl-table thead th {
                                display: block;
                            }

                            .fl-table thead th:last-child {
                                border-bottom: none;
                            }

                            .fl-table thead {
                                float: left;
                            }

                            .fl-table tbody {
                                width: auto;
                                position: relative;
                                overflow-x: auto;
                            }

                            .fl-table td,
                            .fl-table th {
                                padding: 20px .625em .625em .625em;
                                height: 60px;
                                vertical-align: middle;
                                box-sizing: border-box;
                                overflow-x: hidden;
                                overflow-y: auto;
                                width: 120px;
                                font-size: 13px;
                                text-overflow: ellipsis;
                            }

                            .fl-table thead th {
                                text-align: left;
                                border-bottom: 1px solid #f7f7f9;
                            }

                            .fl-table tbody tr {
                                display: table-cell;
                            }

                            .fl-table tbody tr:nth-child(odd) {
                                background: none;
                            }

                            .fl-table tr:nth-child(even) {
                                background: transparent;
                            }

                            .fl-table tr td:nth-child(odd) {
                                background: #F8F8F8;
                                border-right: 1px solid #E6E4E4;
                            }

                            .fl-table tr td:nth-child(even) {
                                border-right: 1px solid #E6E4E4;
                            }

                            .fl-table tbody td {
                                display: block;
                                text-align: center;
                            }
                        }
                    </style>

                    <h2>Browse Our Category Section</h2>
                    <div class="table-wrapper">
                        <table class="fl-table">
                            <thead>
                                <tr>
                                    <th>Heading</th>
                                    <th>Lower Text</th>
                                    <th>Link</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($crousel['data'] as $key => $box)
                                <tr>
                                    <td>{{$box['head_text']}}</td>
                                    <td>{{$box['lower_text']}}</td>
                                    <td>{{$box['link']}}</td>
                                    <td> <img
                                        src="{{''.config('path.path.WebPath').''.$box['imagePath'].'/'.$box['image'].''}}"
                                            width="50px" alt=""> </td>
                                    <td> <a href="{{url('EditBanner/'.$box['id'])}}">  <button class="btn btn-info">Edit</button>  </a> 
                                        <a href="{{url('DeleteBanner/'.$box['id'])}}">  <button class="btn btn-danger">Delete</button>  </a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            <tbody>
                        </table>
                    </div>

                    <div style="    text-align-last: center;
                    ">
                        <a href="{{url('AddBanner')}}">  <button class="btn btn-primary">Add New Banner</button>  </a> 
                    </div>

                    {{-- <h2>Category Exhibition # 1</h2>
                    <div class="table-wrapper">
                        <table class="fl-table">
                            <thead>
                                <tr>
                                    <th>Box#</th>
                                    <th>Text</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($upperImageSection['data'] as $key => $box)
                                <tr>
                                    <td>{{$box['sequence']}}</td>
                                    <td>{{$box['text']}}</td>
                                    <td>{{$box['category_name']}}</td>
                                    <td> <img
                                            src="{{''.config('path.path.WebPath').''.config('path.path.HomeSectionsPath').'/'.$box['image'].''}}"
                                            width="50px" alt=""> </td>
                                    <td> <a href="{{url('AdminHomeSectionEdit/'.$box['id'])}}">  <button class="btn btn-info">Edit</button>  </a> </td>
                                </tr>
                                @endforeach
                            <tbody>
                        </table>
                    </div> --}}


                    {{-- <h2>Category Exhibition # 2</h2>
                    <div class="table-wrapper">
                        <table class="fl-table">
                            <thead>
                                <tr>
                                    <th>Box#</th>
                                    <th>Text</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lowerImageSection['data'] as $key => $box)
                                <tr>
                                    <td>{{$box['sequence']}}</td>
                                    <td>{{$box['text']}}</td>
                                    <td>{{$box['category_name']}}</td>
                                    <td> <img
                                        src="{{''.config('path.path.WebPath').''.config('path.path.HomeSectionsPath').'/'.$box['image'].''}}"
                                            width="50px" alt=""> </td>
                                    <td> <a href="{{url('AdminHomeSectionEdit/'.$box['id'])}}">  <button class="btn btn-info">Edit</button>  </a> </td>
                                </tr>
                                @endforeach
                            <tbody>
                        </table>
                    </div> --}}

                    {{-- <h2>Category Exhibition # 3</h2>
                    <div class="table-wrapper">
                        <table class="fl-table">
                            <thead>
                                <tr>
                                    <th>Box#</th>
                                    <th>Text</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($footerImageSection['data'] as $key => $box)
                                <tr>
                                    <td>{{$box['sequence']}}</td>
                                    <td>{{$box['text']}}</td>
                                    <td>{{$box['category_name']}}</td>
                                    <td> 
                                        
                                        <img
                                            src="{{''.config('path.path.WebPath').''.config('path.path.HomeSectionsPath').'/'.$box['image'].''}}"
                                            width="50px" alt=""> 
                                       
                                        
                                        </td>
                                    <td> <a href="{{url('AdminHomeSectionEdit/'.$box['id'])}}">  <button class="btn btn-info">Edit</button>  </a> </td>
                                </tr>
                                @endforeach
                            <tbody>
                        </table>
                    </div> --}}

                    {{-- <h2>Category Block Sections</h2>
                    <div class="table-wrapper">
                        <table class="fl-table">
                            <thead>
                                <tr>
                                    <th>Box#</th>
                                    <th>Text</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($CatBlockSection['data'] as $key => $box)
                                <tr>
                                    <td>{{$box['sequence']}}</td>
                                    <td>{{$box['text']}}</td>
                                    <td>{{$box['category_name']}}</td>
                             
                                    <td> <a href="{{url('AdminHomeSectionEdit/'.$box['id'])}}">  <button class="btn btn-info">Edit</button>  </a> </td>
                                </tr>
                                @endforeach
                            <tbody>
                        </table>
                    </div> --}}
                    {{--
                </div>
            </div>
        </div> --}}
    </div>
</div>


@endsection

@section('scripts')
<script src="{{asset('assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/datatables.init.js')}}"></script>
@endsection