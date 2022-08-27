@extends('Merchant.layouts.master')

@section('title', 'Merchant Chat')
@section('header', 'Merchant Chat')


@section('content')


<script>
    console.log(document.getElementById('main_chatbox'));
    document.getElementById('main_chatbox').classList.add("active");
</script>
<style>
    .chatbox.active .chatbox-close {
    width: 0px;}
    #main_chatbox{
        width: 100%;
    }
    .type_msg{
        margin-bottom: 18px !important;
    }
</style>


<div class="content-body">
   

</div>






@endsection

@section('scripts')
<script src="{{asset('assets/vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/sparkline-init.js')}}"></script>
@endsection