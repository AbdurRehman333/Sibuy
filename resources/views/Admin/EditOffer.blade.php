@extends('Admin.layouts.master')

@section('title', 'Admin Deals')
@section('header', 'Edit Deal')

@section('content')

<script>
  $( function() {
          $( "#datepicker" ).datepicker({
          });  
        } );
</script>

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



      <script>
        // $(document).ready(function(e){
        //             $("#prospects_form").submit(function(e) {

        //               e.preventDefault();
   
        //               console.log(1);
        //               // var name = $("input[name=name]").val();
        //               // var password = $("input[name=password]").val();
        //               // var email = $("input[name=email]").val();

        //               // let branches = document.getElementById('name').innerHTML();
        //               var str = $("#branches").val();
        //               var str = $("#images").val();
        //               console.log(str);

        //             });
        //           });
      </script>

      <script type="text/javascript">
        // $(document).ready(function (e) {

        //   $.ajaxSetup({
        //     headers: {
        //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // $('#prospects_form').submit(function(e) {

        // e.preventDefault();

        // var formData = new FormData(this);
        // let TotalFiles = $('#files')[0].files.length; //Total files
        // let files = $('#files')[0];
        // for (let i = 0; i < TotalFiles; i++) {
        //   formData.append('files' + i, files.files[i]);
        // }
        // formData.append('TotalFiles', TotalFiles);

        // console.log(formData);
        // console.log(TotalFiles);
        // console.log(files);
        // // $.ajax({
        // //   type:'POST',
        // //   url: "{{ url('store-multi-file-ajax')}}",
        // //   data: formData,
        // //   cache:false,
        // //   contentType: false,
        // //   processData: false,
        // //   dataType: 'json',
        // //   success: (data) => {
        // //   this.reset();
        // //   alert('Files has been uploaded using jQuery ajax');
        // //   },
        // //   error: function(data){
        // //   alert(data.responseJSON.errors.files[0]);
        // //   console.log(data.responseJSON.errors);
        // //   }
        // // });

        // });
        // });
      </script>


      <div class="col-xl-8 col-lg-12">
        <div class="card">

          @if (session('alert'))
          <div style="    text-align: -webkit-center; margin-top:2rem;">
            <div class="alert alert-danger" style="width:60%">
              <strong>Message: </strong> {{ session('alert') }}
            </div>
          </div>
          @endif

          @if (session('success'))
          <div class="alert alert-success alert-dismissible alert-alt fade show" style="margin-top:2rem;">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                  class="mdi mdi-close"></i></span>
            </button>
            <strong>Success!</strong> {{ session('success') }}
          </div>
          @endif

          <div class="card-header">
            <h4 class="card-title">Edit Deal</h4>
          </div>
          <div class="card-body">
            <div class="basic-form">
              <form class="form_to_submit" enctype="multipart/form-data" method="post" action="{{ route("AdminEditOfferConfirm", ["id" => $offer['data']['id']]) }}">
                  @csrf

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Offer Name</label>
                      <input type="text" name="name" id="name" class="form-control" placeholder="Offer Name" value="{{$offer['data']['name']}}">
                    </div>

                    {{-- <div class="form-group col-md-6">
                      <label>Offer Discount</label>
                      <input type="text" name="discount" class="form-control" placeholder="Discount (AMOUNT)...">
                    </div> --}}
                    @if($offer['data']['type'] == 'Specific Product')
                    <style>
                      .thing_to_hide_on_entire_menu{
                        display:block;
                      }
                    </style>
                    @else
                    <style>
                      .thing_to_hide_on_entire_menu{
                        display:none;
                      }
                    </style>
                    @endif
                    

                    <style>
                      
                      .thing_to_hide_on_specific_product{
                        display:none;
                      }
                    </style>

                    <script>
                      function myFunction(arg)
                      {
                        if( arg.value == 'Entire Menu')
                        {
                          $('.thing_to_hide_on_entire_menu').css('display','none');
                          $('.thing_to_hide_on_specific_product').css('display','none');
                          
                        }
                        else
                        {
                          $('.thing_to_hide_on_specific_product').css('display','block');
                          $('.thing_to_hide_on_entire_menu').css('display','block');
                         
                        }
                      }
                    </script>


                    <div class="form-group col-md-6">
                      <label>Offer Type</label>
                      <select class="form-control" id='type' name="type" onchange="myFunction(this)">
                        @if($offer['data']['type'] == 'Entire Menu')
                        <option value="Entire Menu" selected>Entire Menu</option>
                        <option value="Specific Product">Specific Product</option>
                        @elseif(($offer['data']['type'] == 'Specific Product'))
                        <option value="Specific Product" selected>Specific Product</option>
                        <option value="Entire Menu">Entire Menu</option>
                        @endif

                      </select>
                    </div>

                    {{-- <div class="form-group col-md-6 thing_to_hide_on_specific_product" >
                      <label> Products List</label>
                      <input id="product_list" type="text" name="Product Lists" class="form-control" placeholder="Products List. (Seperated by 'CTRL' Key)">
                    </div> --}}
                    {{-- <input id="product_list_array" type="hidden" name="productLists" class="form-control" placeholder="Products List"> --}}

                    <script>
                      var string = '';
                      var textInput = document.querySelector('#product_list');
                      textInput.addEventListener('keyup',function(event){
                        if(event.keyCode === 17){
                          console.log('Catched');
                          value = document.getElementById('product_list').value;
                          // original = value;
                          // value = value.substring(0 , value.length-1);

                          console.log(value.length);
                          if(value.length < 3)
                          {
                            console.log('less than 2');
                            return;
                          }
                          else
                          {
                            console.log(value);
                            document.getElementById('product_list').value = '';
                            // Value must be single now.

                            manipulate = value;
                            manipulate = manipulate.concat('<>');

                            string = string + manipulate; 
                            console.log('string');
                            console.log(string);

                            document.getElementById('product_list_array').value = '';
                            document.getElementById('product_list_array').value = string;

                            $(`
                              <h4> - ${value} </h4>
                            `).insertAfter(".insertAfterThis");
              
                          }
                          

                        }
                      })
                    </script>


                    <div class="form-group col-md-6">
                      <label>Offer Category</label>
                      <select class="form-control" id='category' name="category">
                        @foreach($categories as $cat)
                          @if($offer['data']['category_id'] == $cat['id'] )
                          <option value="{{$cat['id']}}" selected>{{$cat['name']}}</option>
                          @else 
                          <option value="{{$cat['id']}}">{{$cat['name']}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Upload Images</label>
                      <input type="file" class="form-control" id="files" name="images[]" placeholder="files" multiple
                        >
                    </div>

                    <div class="form-group col-md-6">
                      <label>Expiry</label>
                      <input style="    text-align-last: center; color:#827591;" class="form-control"
                        aria-describedby="emailHelp" name="expiry" placeholder="Expiry: MM/DD/YYYY" type="text" value="{{$offer['data']['expiry']}}"
                        id="datepicker">
                    </div>

                    <div class="form-group col-md-6">
                      <label>Limit</label>
                      <input type="text" required name="limit" id="limit" value="{{$offer['data']['limit']}}" class="form-control" placeholder="Offer Limit">
                    </div>

                    <div>
                      {{-- {{print_r($offer['data']['branches'])}} --}}
                      @php
                      $merchant_branches_array = (array) null;
                      foreach($offer['data']['branches'] as $b)
                      {
                      $merchant_branches_array[] = $b['id'];
                      }
                      @endphp

                      {{-- {{print_r($offer_branches_array)}} --}}

                    </div>

                    <div class="form-group col-md-6">
                      <label>Branch / Outlet</label>
                      <select class="form-control" id='branches' name="branches[]" multiple>
                        <option value="">Select An Option</option>


                        @foreach($offer['data']['merchant_branches'] as $b)


                        @if(in_array($b['id'], $merchant_branches_array))
                        <option value="{{$b['id']}}" selected> {{$b['name']}} </option>
                        @else
                        <option value="{{$b['id']}}"> {{$b['name']}} </option>
                        @endif

                        
                        @endforeach



                      </select>
                    </div>

                    {{-- <div class="form-group col-md-6">
                      <label>Branch / Outlet</label>
                      <select class="form-control" id='branches' name="branches[]" multiple>
                        <option value="">Select An Option</option>
                        @foreach($branches['data'] as $b)
                        @if(in_array($b['id'], $offer_branches_array))
                        <option value="{{$b['id']}}" selected> {{$b['name']}} </option>
                        @else
                        <option value="{{$b['id']}}"> {{$b['name']}} </option>
                        @endif
                        @endforeach
                      </select>
                    </div> --}}

                    <script>
                      $('#branches').select2({
                        width: '100%',
                        placeholder: "Select an Option",
                        allowClear: true
                      });
                    </script>

                    <div>
                      @php
                      $offer_tags = [0,1,2];
                      foreach($offer['data']['tags'] as $t)
                      {
                      $offer_tags[] = $t['tag'];
                      }
                      @endphp
                      {{-- {{print_r($tags)}} --}}
                    </div>


                    <div class="form-group col-md-6">
                      <label>Tags</label>
                      <select class="form-control" id='myselect' name="tags[]" multiple>
                        <option value="">Select An Option</option>
                        @foreach($tags as $tag)
                        
                        {{-- <option value="">{{print_r($tag)}}</option> --}}
                        @if(in_array($tag['name'], $offer_tags))
                        <option value="{{$tag['name']}}" selected>{{$tag['name']}}</option>
                        @else
                        <option value="{{$tag['name']}}">{{$tag['name']}}</option>
                        @endif

                        @endforeach
                      </select>
                    </div>


                    <script>
                      $('#myselect').select2({
                        width: '100%',
                        placeholder: "Select an Option",
                        allowClear: true
                      });
                    </script>

                    <div class="form-group col-md-6 thing_to_hide_on_entire_menu" >
                      <label> Price</label>
                      <input type="text" name="price" class="form-control" placeholder="Price" value="{{$offer['data']['price']}}">
                    </div>

                    <div class="form-group col-md-6">
                      <label>Discount on Price (%)</label>
                      <input type="text" name="discount_on_price" class="form-control" placeholder="1% to 100%" value="{{$offer['data']['discount_on_price']}}">
                    </div>

                    {{-- <div class="form-group col-md-6">
                      <label>Actual Price</label>
                      <input type="text" name="actual_price" class="form-control" placeholder="Actual Price">
                    </div> --}}

                    {{-- <div class="form-group col-md-6 thing_to_hide_on_entire_menu" >
                      <label>After Discount</label>
                      <input type="text" name="after_discount" class="form-control" placeholder="After Discount">
                    </div> --}}


                    <div class="form-group col-md-12">
                      <label>Description</label>
                      <textarea style="width:100%;" id="" value="{{$offer['data']['description']}}" name="description" cols="5" rows="5">{{$offer['data']['description']}}</textarea>
                    </div>
                  </div>

                  <div style="text-align: center;">
                    <button type="submit" class="submit_form btn btn-primary">Update</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>

      <style>
        .productList{
          display:none;
        }
      </style>

      <style>
                                                          
        .this_product_list::-webkit-scrollbar {
            width: 0.2em;
            }
            
        .this_product_list::-webkit-scrollbar-track {
            box-shadow: inset 0 0 2 px rgba(0, 0, 0, 0.3);
            }
            
        .this_product_list::-webkit-scrollbar-thumb {
        background-color: darkgrey;
        outline: 1px solid slategrey;
        }

            .select2-selection{
                text-align-last: center !important;
                
            }

            .select2-selection--multiple{
                padding: 9px !important;
                border: 1px solid #f0f1f5 !important;
                border-radius: 17px !important;
            }

            .select2-container .select2-search--inline .select2-search__field {height: 24px !important;}
      </style>

      {{-- <div class="col-xl-4 col-lg-12 thing_to_hide_on_entire_menu productList">
        <div class="card this_product_list" style="max-height: 500px;overflow: scroll;overflow-x: hidden;">


          <div class="card-header" style="text-align : center;">
            <h4 class="card-title">Product List</h4>
          </div>
          <div class="card-body">
            
            <div class="insertAfterThis">

            </div>
            
        

          </div>
        </div>
      </div> --}}


    </div>


  </div>
</div>




</div>





@endsection

@section('scripts')
<script src="{{asset('assets/vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/sparkline-init.js')}}"></script>
@endsection