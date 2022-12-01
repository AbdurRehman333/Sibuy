<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Psr7;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class OfferController extends Controller
{

    public function getNotifications($token)
    {
        $response = Http::withToken($token);
        $response = $response->get(''.config('path.path.WebPath').'api/getNotifications',[
            'limit' => 50,
            'page' => 1,
            'timeSort' => 'desc',
        ]);

        // NEW CODE -- START
        if($response->json() == null)
        {
            // dd('yess');
            $right = false;
            while($right == false)
            {
                $response = Http::withToken($token);
                $response = $response->get(''.config('path.path.WebPath').'api/getNotifications',[
                    'limit' => 50,
                    'page' => 1,
                    'timeSort' => 'desc',
                ]);
                if($response->json() == null)
                {

                }
                else
                {
                    // dd('yes');
                    break;
                }
            }
        }
        // NEW CODE --END

        return $response->json();
    }

    public function merchantReplyToComment(Request $request)
    {
        try{
            // dd($request);
            $token = session('Authenticated_user_data')['token'];
            // dd($token);
            $response = Http::withToken($token);
            $response = $response->post(''.config('path.path.WebPath').'api/merchant/addReview',[
                'notes' => $request->reply, 
                'parent_id' => $request->review_id
            ]);
            $response = $response->json();
            // dd($response);
            
            return redirect()->back()->with('success','Reply Submitted!');
            // dd($reviews);

            // $response = Http::withToken($token);
            // $response = $response->get(''.config('path.path.WebPath').'api/admin/getMerchants' , [
            //     'limit' => 100,
            //     'page' => 1,
            //     'returnType' => 'customPagination',
            //     'status' => 1,
            // ]);
            // $merchants = $response->json()['data'];
            // dd($merchants);

            // $token = session('Authenticated_user_data')['token'];
            // $response = Http::withToken($token);
            // $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            // $conversations = $response->json()['data'];

            // $id = session('Authenticated_user_data')['id'];
            // echo "<script>";
            // echo "var bearer_token = `". $token ."` ;";
            // echo "var id = `". $id ."` ;";
            // echo "</script>";
            // return view('Merchant.UserReviews', compact('reviews','conversations'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function MerchantOfferReviewsFilter(Request $request)
    {
        try{
            // dd($request);
            

            $token = session('Authenticated_user_data')['token'];
            // dd($token);
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getReviews',[
                'limit'=> 1000000,
                'page' => 1,
                'returnType' => 'customPagination',
                'sort' => 'desc'
            ]);
            $reviews = $response->json()['data'];

            $min_date = Carbon::parse($request->min_date)->format('Y-m-d');
            $max_date  = Carbon::parse($request->max_date)->format('Y-m-d');
            
            // dd($reviews[0]['created_at']);

            // foreach($reviews as &$r)
            // {
            //     $r['reply_id'] = 0;
            //     $r['replied'] = false;
            //     foreach($reviews as &$reply)
            //     {
            //         if($r['id'] ==  $reply['parent_id'])
            //         {
            //             // dd(1);
            //             $r['reply_id'] = $reply['id'];
            //             $r['replied'] = true;
            //             // dd($reply);
            //             $r['reply_notes'] = $reply['notes'];
            //             $reply['deal_name'] = $r['deal_name'];
            //         }
            //     }
            // }

            $from_filter = 1;
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Merchant.UserReviews', compact('reviews','conversations','min_date','max_date','from_filter','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function MerchantOfferReviews()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            // dd($token);
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getReviews',[
                'limit'=> 1000000,
                'page' => 1,
                'returnType' => 'customPagination',
                'sort' => 'desc'
            ]);
            $reviews = $response->json()['data'];

            $min_date = null;
            $max_date  = null;

            foreach($reviews as &$r)
            {
                $r['reply_id'] = 0;
                $r['replied'] = false;
                foreach($reviews as &$reply)
                {
                    if($r['id'] ==  $reply['parent_id'])
                    {
                        // dd(1);
                        $r['reply_id'] = $reply['id'];
                        $r['replied'] = true;
                        // dd($reply);
                        $r['reply_notes'] = $reply['notes'];
                        $reply['deal_name'] = $r['deal_name'];
                    }
                }
            }
            // dd(2);

            // dd($reviews);

            // $response = Http::withToken($token);
            // $response = $response->get(''.config('path.path.WebPath').'api/admin/getMerchants' , [
            //     'limit' => 100,
            //     'page' => 1,
            //     'returnType' => 'customPagination',
            //     'status' => 1,
            // ]);
            // $merchants = $response->json()['data'];
            // dd($merchants);
            $from_filter = 0;
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Merchant.UserReviews', compact('reviews','conversations','min_date','max_date','from_filter','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function Offer($id)
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            // dd($token);
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getDeal/'.$id.'');
            $deal = $response->json()['data'];

            $response = Http::get(''.config('path.path.WebPath').'api/user/getMerchant/'.$deal['merchant_id'].'');
            $merchant = $response->json()['data'];
            // dd($deal);

            $deal['merchant_name'] = $merchant['name'];
            // dd($deal);
            // dd($deal);

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";

            return view('Merchant.DealDetails',compact('deal','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function SetAdditionalDiscount(Request $request)
    {
        try
        {
            // dd($request);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->post(''.config('path.path.WebPath').'api/merchant/addAdditionalDiscount/'.$request->deal_id.'' , [
                'additional_discount' => $request->double_discount,
                'additional_discount_date' => $request->double_discount_expiry_date,
            ]);
            $response = $response->json();


            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getDeals' , [
                'returnType' => 'customPagination',
                // 'returnType' => 'dataTable',
                'status' => 'all',
                'active' => '1',
                'orderBy' => 'desc'
            ]);
            $deals = $response->json();

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];

            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";

            // return view('Merchant.MerchantAdditionalDiscount',compact('deals','conversations'))->with('success', 'Submitted For Approval.');
            return redirect('MerchantAdditionalDiscount')->with('success', 'Submitted For Approval.');
            // return redirect()->back()->with('success','Submitted For Approval!');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function MerchantAdditionalDiscount()
    {
        try
        {
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getDeals' , [
                'returnType' => 'customPagination',
                // 'returnType' => 'dataTable',
                'status' => 'all',
                'active' => '1',
                'orderBy' => 'desc'
            ]);
            $deals = $response->json();
            // dd($deals);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            // $response = Http::get(''.config('path.path.WebPath').'api/tagsAutoComplete');
            // $tags = $response->json()['data'];
            // $categories = Http::get(''.config('path.path.WebPath').'api/categoryAutoComplete')->json()['data'];

            // dd($categories);
            return view('Merchant.MerchantAdditionalDiscount',compact('deals','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function MerchantActivateOffer($id)
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $url = "".config('path.path.WebPath')."api/merchant/changeStatus/".$id."";
            $response = Http::withToken($token);
            $response = $response->post($url , ['status' => 1]);
            $response = $response->json();

            // dd($response->json());
            return redirect()->back()->with('success', 'Activated Request Submitted!');   
        } catch (\Exception $e) {

            if (array_key_exists("error",$response))
            {
                return redirect()->back()->with('alert',$response['error']);
            }

            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
        ]);
        }
    }

    public function MerchantInActiveOffer($id)
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $url = "".config('path.path.WebPath')."api/merchant/changeStatus/".$id."";
            $response = Http::withToken($token);
            $response = $response->post($url , ['status' => 0]);
            $response = $response->json();
            // dd($response->json());
       
            return redirect()->back()->with('success', 'InActivated Request Submitted!');   
        } catch (\Exception $e) {

            // if (array_key_exists("error",$response))
            // {
            //     return redirect()->back()->with('alert',$response['error']);
            // }

            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
        ]);
        }
    }

    public function MerchantDeleteOffer($id)
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $url = "".config('path.path.WebPath')."api/merchant/deleteDeal/".$id."";
            $response = Http::withToken($token);
            $response = $response->post($url);
            // dd($response->json());
            return redirect()->back()->with('success', 'Offer Deleted Sucessfully!');   
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
        ]);
        }
    }

    public function MerchantAddOffer()
    {
        try
        {
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/branchAutoComplete');
            $branches = $response->json();

            $response = Http::get(''.config('path.path.WebPath').'api/tagsAutoComplete');
            $tags = $response->json()['data'];
            
            $response = Http::get(''.config('path.path.WebPath').'api/getAllLanguages');
            $languages = $response->json()['data'];

            $categories = Http::withToken($token)->get(''.config('path.path.WebPath').'api/merchant/getMerchantCategories')->json()['data'];
            // dd($categories);

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";

            return view('Merchant.AddOffer',compact('branches','categories','tags','conversations','notifications','languages'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function MerchantEditOffer($id)
    {
        try
        {
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getDeal/'.$id.'');
            // dd($response->json());
            $offer = $response->json();
            // dd($offer);

            $response = Http::get(''.config('path.path.WebPath').'api/tagsAutoComplete');
            $tags = $response->json()['data'];
            // dd($tags);
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/branchAutoComplete');
            $branches = $response->json();

            $response = Http::get(''.config('path.path.WebPath').'api/getAllLanguages');
            $languages = $response->json()['data'];

            $categories = Http::withToken($token)->get(''.config('path.path.WebPath').'api/merchant/getMerchantCategories')->json()['data'];

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Merchant.EditOffer',compact('offer','languages','branches','categories','tags','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function MerchantOffers()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            // dd($token);
            $client = new \GuzzleHttp\Client();
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getDeals' , [
                'returnType' => 'customPagination',
                // 'returnType' => 'dataTable',
                'status' => 'all',
                'active' => 1,
                'timeSort' => 'desc',
                // 'searchText' => 'food'
            ]);
            $offers = $response->json();
            // dd($offers);
            $offers = $this->paginate($offers['data']);
            $is_Inactive = 0;

            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getTopCategories');
            $topCats = $response->json();

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Merchant.offers',compact('offers','is_Inactive','topCats','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }
    public function ShowInactiveOffers()
    {
        try
        {
            $token = session('Authenticated_user_data')['token'];
            // dd($token);
            $client = new \GuzzleHttp\Client();
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getDeals' , [
                'returnType' => 'customPagination',
                'status' => 'all',
                'active' => 0,
                'timeSort' => 'desc',
            ]);
            $offers = $response->json();
            // dd($offers);
            $offers = $this->paginate($offers['data']);
            $is_Inactive = 1;

            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getTopCategories');
            $topCats = $response->json();

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Merchant.offers',compact('offers','is_Inactive','topCats','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function ShowRejectedOffers()
    {
        try
        {
            $token = session('Authenticated_user_data')['token'];
            // dd($token);
            $client = new \GuzzleHttp\Client();
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getDeals' , [
                'returnType' => 'customPagination',
                'status' => 'all',
                'activation' => 0,
                'timeSort' => 'desc',
            ]);
            $offers = $response->json();
            // dd($offers);
            $offers = $this->paginate($offers['data']);
            $is_Inactive = 1;

            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getTopCategories');
            $topCats = $response->json();

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Merchant.offers',compact('offers','is_Inactive','topCats','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }



    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => Paginator::resolveCurrentPath()] );
    }



    public function AddOffer(Request $request)
    {   
        // try
        // {
            // if($request->discount_on_price < 0 || $request->discount_on_price > 100)
            // {
            //     return redirect('MerchantAddOffer')->with('alert', 'Invalid Discount Percentage!');
            // }

            // dd($request);

            // $products = array();
            // foreach($request->product_name as $key => $name){
            //     if($name !== '' || $name !== null || $name !== ' '){
            //         if($request->product_price[$key] !== '' || $request->product_price[$key] !== null || $request->product_price[$key] !== ' ' ){
            //             $products[] = ['product_name' => $name, 'product_price' => $request->product_price[$key] ];
            //         }   
            //     }
            // }

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $url = ''.config('path.path.WebPath').'api/merchant/createDeal';

            foreach ($request->files->get('images') as $key => $img) {
                $file = $request->file('images')[$key];
                $response->attach(
                    'images['.$key.']', $file->get(), $file->getClientOriginalName());
            }

            if($request->hasFile('videos'))
            {

                foreach ($request->files->get('videos') as $key => $img) {
                    $file = $request->file('videos')[$key];
                    $response->attach(
                        'videos['.$key.']', $file->get(), $file->getClientOriginalName());
                }

                // $file = $request->file('videos')[$key];
                // $response->attach(
                //     'videos['.$key.']', $file->get(), $file->getClientOriginalName());
            }

            // if($request->type == 'Entire Menu')
            // {
                // dd(1);
                $data = [
                    'name' =>  $request->name,
                    'price' => $request->price,
                    'discount' => $request->discount,
                    'redeem_expiry' => $request->redeem_expiry,
                    'expiry' => $request->expiry,
                    'type' => 'Specific Product',
                    'category' => $request->category,
                    'after_discount' => 0,
                    'discount_on_price' => 0,
                    'expiry' => $request->expiry,
                    'description' => $request->description,
                    'limit' => $request->limit,
                    'is_sponsored' => $request->is_sponsored,
                    'language' => $request->language,
                    // 'products' => json_encode($products),
                    'product_name' => $request->product_name,
                    'product_price' => $request->product_price,
                    // 'unique_code' => 'EAK',
                ];
            // }
            // else
            // {
            //     $after_discount = $request['price'] - ($request['price'] * ($request['discount_on_price']/100) );

            //     $data = [
            //         'name' =>  $request->name,
            //         'discount' => $request->discount_on_price,
            //         'type' => $request->type,
            //         'category' => $request->category,
            //         'price' => $request->price,
            //         'discount_on_price' => $request->discount_on_price,
            //         'discount' => $request->discount_on_price,
            //         'after_discount' => $after_discount,
            //         'expiry' => $request->expiry,
            //         'description' => $request->description,
            //         'limit' => $request->limit,
            //     ];
            // }
            // dd($data);

            //Calculating After Discount
            
            // dd($after_discount);
            // dd($data);
            

            // $data = [
            //     'name' =>  $request->name,
            //     'discount' => $request->discount,
            //     'type' => $request->type,
            //     'category' => $request->category,
            //     'actual_price' => $request->actual_price,
            //     'price' => $request->price,
            //     'after_discount' => $after_discount,
            //     'discount_on_price' => $request->discount_on_price,
            //     'expiry' => $request->expiry,
            //     'description' => $request->description,
            // ];

            // dd($data);

            $branches = $request->input('branches');
            $tags = $request->input('tags');
            if ($branches){
                if (!is_array($branches))
                    $branches = (array) $branches;

                foreach ($branches as $key => $branch){
                    $data['branches[' . $key . ']'] = $branch;
                }
            }

            if ($tags){
                if (!is_array($tags))
                    $tags = (array) $tags;

                foreach ($tags as $key => $tag){
                    $data['tags[' . $key . ']'] = $tag;
                }
            }
            // dd($data);
            $response = $response->post(''.config('path.path.WebPath').'api/merchant/createDeal', $data);
            // dd($response->json());

            if (array_key_exists("error",$response->json()))
            {
                return redirect()->back()->with('alert',$response->json()['error']);
            }
            
            // dd($response->json());

            return redirect('MerchantAddOffer')->with('success', 'Offer Submitted for Approval!');
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'Success' => 'False',
        //         'Error' => $e->getMessage(),
        //     ]);
        // }
    }

    public function EditOffer(Request $request,$id)
    {
        // try
        // {
            // if($request->discount_on_price < 0 || $request->discount_on_price > 100)
            // {
            //     return redirect('MerchantAddOffer')->with('alert', 'Invalid Discount Percentage!');
            // }

            // dd($request);

            // $products = array();
            // foreach($request->product_name as $key => $name){
            //     if($name !== '' || $name !== null || $name !== ' '){
            //         if($request->product_price[$key] !== '' || $request->product_price[$key] !== null || $request->product_price[$key] !== ' ' ){
            //             $products[] = ['product_name' => $name, 'product_price' => $request->product_price[$key] ];
            //         }   
            //     }
            // }

            // dd($request);

            $took_images = false;

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $url = ''.config('path.path.WebPath').'api/merchant/updateDeal/'.$id.'';

            if($request->hasFile('images'))
            {
                foreach ($request->files->get('images') as $key => $img) {
                    $file = $request->file('images')[$key];
                    $response->attach(
                        'images['.$key.']', $file->get(), $file->getClientOriginalName());
                }
                $took_images = true;
            }

            if($request->hasFile('videos')){
                foreach ($request->files->get('videos') as $key => $img) {
                    $file = $request->file('videos')[$key];
                    $response->attach(
                        'videos['.$key.']', $file->get(), $file->getClientOriginalName());
                }              
            }

            $data = [
                'name' =>  $request->name,
                'price' => $request->price,
                'discount' => $request->discount,
                'redeem_expiry' => $request->redeem_expiry,
                'expiry' => $request->expiry,
                'type' => 'Specific Product',
                'category' => $request->category,
                'after_discount' => 0,
                'discount_on_price' => 0,
                'expiry' => $request->expiry,
                'description' => $request->description,
                'limit' => $request->limit,
                'is_sponsored' => $request->is_sponsored,
                'language' => $request->language,
                'product_name' => $request->product_name,
                'product_price' => $request->product_price,
            ];
            
            // $branches = $request->input('branches');
            // $tags = $request->input('tags');
            // if ($branches){
            //     if (!is_array($branches))
            //         $branches = (array) $branches;

            //     foreach ($branches as $key => $branch){
            //         $data['branches[' . $key . ']'] = $branch;
            //     }

            //     $data['branches'] = $request->branches;
            // }
            $tags = $request->tags;
            if ($tags){
                if (!is_array($tags))
                    $tags = (array) $tags;

                foreach ($tags as $key => $tag){
                    $data['tags[' . $key . ']'] = $tag;
                }

                // $data['tags'] = $request->tags;
            }

            // dd($data);
            $response = $response->post($url, $data);
            // dd($response->json());

            if (array_key_exists("error",$response->json()))
            {
                return redirect()->back()->with('alert',$response->json()['error']);
            }

            // $response = $response->post($url, $request->all());
            return redirect('MerchantEditOffer/'.$id.'')->with('success', 'Offer Updated Successfully!');
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'Success' => 'False',
        //         'Error' => $e->getMessage(),
        //     ]);
        // }
    }
    
    // public function P_EditOffer(Request $request,$id)
    // {
    //     // dd($request);
    //     try
    //     {

    //         if($request->discount_on_price < 0 || $request->discount_on_price > 100)
    //         {
    //             return redirect('MerchantEditOffer/'.$id.'')->with('success', 'Invalid Discount Percentage!');
    //         }



    //         $token = session('Authenticated_user_data')['token'];
    //         $response = Http::withToken($token);
    //         $url = ''.config('path.path.WebPath').'api/merchant/updateDeal/'.$id.'';

    //         // $data = $request->all();

    //         if($request->hasFile('images'))
    //         {
    //             //WITH IMAGE
    //             foreach ($request->files->get('images') as $key => $img) {
    //                 $file = $request->file('images')[$key];
    //                 $response->attach(
    //                     'images['.$key.']', $file->get(), $file->getClientOriginalName());
    //             }

    //             if($request->type == 'Entire Menu')
    //             {
    //                 // dd(1);
    //                 $data = [
    //                     'name' =>  $request->name,
    //                     'discount' => $request->discount_on_price,
    //                     'type' => $request->type,
    //                     'category' => $request->category,
    //                     'price' => 0,
    //                     'after_discount' => 0,
    //                     'discount_on_price' => $request->discount_on_price,
    //                     'discount' => $request->discount_on_price,
    //                     'expiry' => $request->expiry,
    //                     'description' => $request->description,
    //                     'limit' => $request->limit,
    //                 ];
    //             }
    //             else
    //             {
    //                 $after_discount = $request['price'] - ($request['price'] * ($request['discount_on_price']/100) );

    //                 $data = [
    //                     'name' =>  $request->name,
    //                     'discount' => $request->discount_on_price,
    //                     'type' => $request->type,
    //                     'category' => $request->category,
    //                     'price' => $request->price,
    //                     'discount_on_price' => $request->discount_on_price,
    //                     'discount' => $request->discount_on_price,
    //                     'after_discount' => $after_discount,
    //                     'expiry' => $request->expiry,
    //                     'description' => $request->description,
    //                     'limit' => $request->limit,
    //                 ];
    //             }
    //             // $data = [
    //             //     'name' =>  $request->name,
    //             //     'discount' => $request->discount,
    //             //     'type' => $request->type,
    //             //     'category' => $request->category,
    //             //     'actual_price' => $request->actual_price,
    //             //     'discount_on_price' => $request->discount_on_price,
    //             //     'price' => $request->price,
    //             //     'after_discount' => $request->after_discount,
    //             //     'expiry' => $request->expiry,
    //             //     'description' => $request->description,
    //             // ];
        
    //             $branches = $request->input('branches');
    //             $tags = $request->input('tags');
    //             if ($branches){
    //                 if (!is_array($branches))
    //                     $branches = (array) $branches;
        
    //                 foreach ($branches as $key => $branch){
    //                     $data['branches[' . $key . ']'] = $branch;
    //                 }
    //             }
        
    //             if ($tags){
    //                 if (!is_array($tags))
    //                     $tags = (array) $tags;
        
    //                 foreach ($tags as $key => $tag){
    //                     $data['tags[' . $key . ']'] = $tag;
    //                 }
    //             }
    //             // dd($data);
    //             $response = $response->post($url, $data);

    //             if (array_key_exists("error",$response->json()))
    //             {
    //                 return redirect()->back()->with('alert',$response->json()['error']);
    //             }

    //             // dd($response->json());
    //             return redirect('MerchantEditOffer/'.$id.'')->with('success', 'Offer Updated Successfully!');


    //         }



    //         // $response = Http::withToken($token)->post($url, [
    //         //     'name' =>  $request->name,
    //         //     'discount' => $request->discount_on_price,
    //         //     'type' => $request->type,
    //         //     'category' => $request->category,
    //         //     'price' => 0,
    //         //     'after_discount' => 0,
    //         //     'discount_on_price' => $request->discount_on_price,
    //         //     'discount' => $request->discount_on_price,
    //         //     'expiry' => $request->expiry,
    //         //     'description' => $request->description,
    //         //     'branches[0]' => 86,
    //         //     'tags[0]' => 'Pizza'
    //         // ]);

    //         try
    //         {

    //             if($request->type == 'Entire Menu')
    //             {
    //                 $data = [
    //                     'name' =>  $request->name,
    //                     'discount' => $request->discount_on_price,
    //                     'type' => $request->type,
    //                     'category' => $request->category,
    //                     'price' => 0,
    //                     'after_discount' => 0,
    //                     'discount_on_price' => $request->discount_on_price,
    //                     'discount' => $request->discount_on_price,
    //                     'expiry' => $request->expiry,
    //                     'description' => $request->description,
    //                     'branches' => $request->branches,
    //                     'tags'=> $request->tags,
    //                     'limit' => $request->limit,
    //                 ];
    //             }
    //             else
    //             {
    //                 $after_discount = $request['price'] - ($request['price'] * ($request['discount_on_price']/100) );

    //                 $data = [
    //                     'name' =>  $request->name,
    //                     'discount' => $request->discount_on_price,
    //                     'type' => $request->type,
    //                     'category' => $request->category,
    //                     'price' => $request->price,
    //                     'discount_on_price' => $request->discount_on_price,
    //                     'discount' => $request->discount_on_price,
    //                     'after_discount' => $after_discount,
    //                     'expiry' => $request->expiry,
    //                     'description' => $request->description,
    //                     'branches' => $request->branches,
    //                     'tags'=> $request->tags,
    //                     'limit' => $request->limit,
    //                 ];
    //             }

    //             $response = Http::withToken($token)->post($url, $data);

    //             if (array_key_exists("error",$response->json()))
    //             {
    //                 return redirect()->back()->with('alert',$response->json()['error']);
    //             }

    //             // $response = Http::withToken($token)->post($url, [
    //             //     'name' =>  $request->name,
    //             //     'discount' => $request->discount_on_price,
    //             //     'type' => $request->type,
    //             //     'category' => $request->category,
    //             //     'price' => 0,
    //             //     'after_discount' => 0,
    //             //     'discount_on_price' => $request->discount_on_price,
    //             //     'discount' => $request->discount_on_price,
    //             //     'expiry' => $request->expiry,
    //             //     'description' => $request->description,
    //             //     // 'branches[0]' => 86,
    //             //     // 'tags[0]' => 'Pizza',
    //             //     'branches' => $request->branches,
    //             //     'tags' => $request->tags,
    //             // ]);
                
    //         } catch (\Exception $e) {
    //             return response()->json([
    //                 'Success' => 'False',
    //                 'Error' => $e->getMessage(),
    //             ]);
    //         }
    //         // dd($response);



    //         //WITHOUT IMAGE
    //         // dd($token);
    //         // $data = $request->all();
    //         // dd($data);
    //         // if($request->type == 'Entire Menu')
    //         // {
    //         //     $data['price'] = 0;
    //         //     $data['after_discount'] = 0;
    //         //     // dd(1);
    //         //     $data = [
    //         //         'name' =>  $request->name,
    //         //         'discount' => $request->discount_on_price,
    //         //         'type' => $request->type,
    //         //         'category' => $request->category,
    //         //         'price' => 0,
    //         //         'after_discount' => 0,
    //         //         'discount_on_price' => $request->discount_on_price,
    //         //         'discount' => $request->discount_on_price,
    //         //         'expiry' => $request->expiry,
    //         //         'description' => $request->description,
    //         //     ];
    //         // }
    //         // else
    //         // {
    //         //     $after_discount = $request['price'] - ($request['price'] * ($request['discount_on_price']/100) );

    //         //     $data = [
    //         //         'name' =>  $request->name,
    //         //         'discount' => $request->discount_on_price,
    //         //         'type' => $request->type,
    //         //         'category' => $request->category,
    //         //         'price' => $request->price,
    //         //         'discount_on_price' => $request->discount_on_price,
    //         //         'discount' => $request->discount_on_price,
    //         //         'after_discount' => $after_discount,
    //         //         'expiry' => $request->expiry,
    //         //         'description' => $request->description,
    //         //     ];
    //         // }
    //         // dd($data);
    //         // $branches = $request->input('branches');
    //         // $tags = $request->input('tags');
    //         // if ($branches){
    //         //     if (!is_array($branches))
    //         //         $branches = (array) $branches;

    //         //     foreach ($branches as $key => $branch){
    //         //         $data['branches[' . $key . ']'] = $branch;
    //         //     }
    //         // }
    //         // if ($tags){
    //         //     if (!is_array($tags))
    //         //         $tags = (array) $tags;

    //         //     foreach ($tags as $key => $tag){
    //         //         $data['tags[' . $key . ']'] = $tag;
    //         //     }
    //         // }
    //         // $response = $response->post($url, $request->all());
    //         // dd($data);
    //         // dd($request->all());
    //         // $response = $response->post($url, $request->all());
    //         // $response = $response->post($url, $data);
    //         // dd($response);
    //         return redirect('MerchantEditOffer/'.$id.'')->with('success', 'Offer Updated Successfully!');

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'Success' => 'False',
    //             'Error' => $e->getMessage(),
    //         ]);
    //     }
    // }

}
