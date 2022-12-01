@extends('Merchant.layouts.master')

@section('title', 'Merchant Offers')
@section('header', 'Add Offers')

@section('content')



{{-- <script>
  $( function() {
      $( "#datepicker" ).datepicker({
        // dateFormat: 'mm:dd:yyyy',
        changeYear:true,
        yearRange: "1960:2020"
      });  
    } );
</script> --}}


<script>
  $( function() {
          $( "#datepicker" ).datepicker({
            // dateFormat: 'mm:dd:yyyy',
            // changeYear:true,
            // yearRange: "1960:2020"
          });  
        } );
</script>
<script>
  $( function() {
          $( "#datepicker1" ).datepicker({
            // dateFormat: 'mm:dd:yyyy',
            // changeYear:true,
            // yearRange: "1960:2020"
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
            <h4 class="card-title">Add Offer</h4>
          </div>
          <div class="card-body">
            <div class="basic-form">
              <form class="form_to_submit" enctype="multipart/form-data" method="post" action="{{route('AddOffer')}}">
                @csrf

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Offer Name</label>
                    <input type="text" required name="name" id="name" class="form-control" placeholder="Offer Name">
                  </div>

                  {{-- <div class="form-group col-md-6">
                    <label>Offer Discount</label>
                    <input type="text" required name="discount" class="form-control" placeholder="Discount (AMOUNT)...">
                  </div> --}}

                  <style>
                    .thing_to_hide_on_entire_menu {
                      display: none;
                    }

                    .thing_to_hide_on_specific_product {
                      display: none;
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


                  {{-- <div class="form-group col-md-6">
                    <label>Offer Type</label>
                    <select class="form-control" id='type' name="type" onchange="myFunction(this)">
                      <option value="{{NULL}}">Select An Option</option>
                      <option value="Entire Menu">Entire Menu</option>
                      <option value="Specific Product">Specific Product</option>
                    </select>
                  </div> --}}

                  {{-- <script>
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
                  </script> --}}


                  <div class="form-group col-md-6">
                    <label>Offer Category</label>
                    <select class="form-control" id='category' name="category">
                      <option value="">Select An Option</option>
                      @foreach($categories as $cat)
                      <option value="{{$cat['category_id']}}">{{$cat['category_name']}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Upload Images - Multiple</label>
                    <input type="file" class="form-control" id="files" name="images[]" placeholder="files" multiple
                      required>
                  </div>

                  <div class="form-group col-md-6">
                    <div id="vid_err"> BIG FILE </div>
                    <label>Upload Video ( MAX SIZE - 5MB )</label>
                    <input type="file" class="form-control" id="files" name="videos[]" placeholder="files">
                  </div>
                  <style>
                    #vid_err {
                      display: none;
                    }
                  </style>
                  <script>
                    var uploadField = document.getElementById("video");
                    uploadField.onchange = function() {
                        if(this.files[0].size > 5242880){
                          alert("File is too big!");
                          this.value = "";
                        };
                    };
                  </script>

                  <div class="form-group col-md-6">
                    <label>Deal Sale Expiry</label>
                    <input style="    text-align-last: center; color:#827591;" class="form-control"
                      aria-describedby="emailHelp" name="expiry" placeholder="Expiry: MM/DD/YYYY" type="date"
                      id="datepicker">
                  </div>

                  <div class="form-group col-md-6">
                    <label>Deal Redemption Expiry</label>
                    <input style="    text-align-last: center; color:#827591;" class="form-control"
                      aria-describedby="emailHelp" name="redeem_expiry" placeholder="Expiry: MM/DD/YYYY" type="date"
                      id="datepicker1">
                  </div>

                  <div class="form-group col-md-6">
                    <label>Limit</label>
                    <input type="text" required name="limit" id="limit" class="form-control" placeholder="Offer Limit">
                  </div>

                  {{-- <div class="form-group col-md-6">
                    <label>Branch / Outlet</label>
                    <select class="form-control" id='branches' name="branches[]" multiple>
                      <option value="">Select An Option</option>
                      @foreach($branches['data'] as $b)
                      <option value="{{$b['id']}}"> {{$b['name']}} </option>
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

                  <div class="form-group col-md-6">
                    <label>Tags</label>
                    <select class="form-control" id='myselect' name="tags[]" multiple>
                      <option value="">Select An Option</option>
                      @foreach ($tags as $tag)
                      <option value="{{$tag['name']}}">{{$tag['name']}}</option>
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

                  <div class="form-group col-md-6 ">
                    <label> Actual Price</label>
                    <input type="text" name="price" class="form-control" placeholder="Actual Price">
                  </div>

                  <div class="form-group col-md-6 ">
                    <label> Voucher Price</label>
                    <input type="text" name="discount" class="form-control" placeholder="Voucher Price">
                  </div>

                  <div class="form-group col-md-6">
                    <label>Language</label>
                    <select class="form-control" id='myselect' name="language" style="color: rgb(37, 37, 37);">
                      {{-- <option value="">Select Language</option>
                      <option value="">Chinese</option>
                      <option value="">English</option>
                      <option value="">Khmer</option> --}}
                      @foreach($languages as $key => $lang)
                      <option value="{{$lang['id']}}">{{$lang['name']}}</option>
                      @endforeach
                    </select>
                  </div>

                  {{-- <div class="form-group col-md-6 thing_to_hide_on_entire_menu">
                    <label> Price</label>
                    <input type="text" name="price" class="form-control" placeholder="Price">
                  </div> --}}

                  {{-- <div class="form-group col-md-6">
                    <label>Discount on Price (%)</label>
                    <input type="text" required name="discount_on_price" class="form-control" placeholder="1% to 100%">
                  </div> --}}

                  {{-- <div class="form-group col-md-6">
                    <label>Actual Price</label>
                    <input type="text" required name="actual_price" class="form-control" placeholder="Actual Price">
                  </div> --}}

                  {{-- <div class="form-group col-md-6 thing_to_hide_on_entire_menu">
                    <label>After Discount</label>
                    <input type="text" required name="after_discount" class="form-control" placeholder="After Discount">
                  </div> --}}

                  <div class="form-group col-md-6">
                    <label>Mark as Sponsored Deal</label>
                    <select class="form-control" id='myselect' required name="is_sponsored" style="color: rgb(37, 37, 37);">
                      {{-- <option value="">Select Language</option> --}}
                      <option value="1">Yes</option>
                      <option value="0" selected>No</option>
                    </select>
                  </div>

                  {{-- <div class="form-group col-md-6 ">
                    <label> Unique Code </label>
                    <input type="text" name="price" class="form-control" placeholder="Voucher Price">
                  </div> --}}

                  <div class="form-group col-md-6 ">
                    <label> Product Name</label>
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name">
                  </div>

                  <div class="form-group col-md-6 ">
                    <label> Product Price</label>
                    <input type="text" name="product_price" class="form-control" placeholder="Product Price">
                  </div>

                  <div class="form-group col-md-12">
                    <label>Description (Optional) </label>
                    <textarea style="width:100%;" id="" name="description" cols="5" rows="5"></textarea>
                  </div>




                  {{-- <h3> Products </h3> --}}


                  {{-- <script src="https://code.jquery.com/jquery-3.2.1.js"></script> --}}

                  {{-- <div class="text-center">
                    <h1>Products List</h1>
                  </div>
                  <hr> --}}

                  {{-- <div class="container">
                    <div class="row clearfix">
                      <div class="col-md-12 column">
                        <table class="table table-bordered table-hover" id="tab_logic">
                          <thead>
                            <tr>
                              <th class="text-center">
                                Product Name
                              </th>
                              <th class="text-center">
                                Product Price
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr id='addr0'>
                              <td>
                                <input type="text" name='product_name[]' placeholder='Product Name'
                                  class="form-control" />
                              </td>
                              <td>
                                <input type="text" name='product_price[]' placeholder='Product Price'
                                  class="form-control" />
                              </td>
                            </tr>
                            <tr id='addr1'></tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <button id="add_row" type="button" class="btn btn-primary btn-lg pull-left">Add Product</button>
                  </div> --}}


                  {{-- <script>
                    $(document).ready(function() {
                      var i = 1;
                      $("#add_row").click(function() {
                      // $('tr').find('input').prop('disabled',true)
                      $('tr').find('input').prop('disabled',false)

                        $('#addr' + i).html("<td><input type='text' name='product_name[]'  placeholder='User ID' class='form-control input-md'/></td><td><input type='text' name='product_price[]' placeholder='Name' class='form-control input-md'/></td>");

                        $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
                        i++;
                      });
                    });
                  </script> --}}

                </div>

                <div style="text-align: center;">
                  <button type="submit" class="submit_form btn btn-primary">Submit For Approval</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <style>
        .productList {
          display: none;
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

        .select2-selection {
          text-align-last: center !important;

        }

        .select2-selection--multiple {
          padding: 9px !important;
          border: 1px solid #f0f1f5 !important;
          border-radius: 17px !important;
        }

        .select2-container .select2-search--inline .select2-search__field {
          height: 24px !important;
        }
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