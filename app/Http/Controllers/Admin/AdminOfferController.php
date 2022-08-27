<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminOfferController extends Controller
{
    public function getNotifications($token)
    {
        $response = Http::withToken($token);
        $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
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
                $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
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

    public function takeActionOnDealActivation($id)
    {
        // dd($id);
        // dd($id);
        $token = session('Authenticated_user_data')['token'];
        // dd($token);
        $url = "gigiapi.zanforthstaging.com/api/admin/takeActionOnDealActivation/".$id."";
        $response = Http::withToken($token)->post($url, [
            'status' => 1,  //approve
            // 'reject_reason' => 'Request Accepted',
        ]);
        // dd($response->json());
        return redirect()->back();
    }
    public function takeActionOnDealActivationReject($id, Request $request)
    {
        // dd($request);
        // dd($id);
        $token = session('Authenticated_user_data')['token'];
        $url = "gigiapi.zanforthstaging.com/api/admin/takeActionOnDealActivation/".$id."";
        $response = Http::withToken($token)->post($url, [
            'status' => 0,  //Reject
            'reject_reason' => $request->reject_reason,
        ]);
        // dd($response->json());
        return redirect()->back();
    }

    public function AdminDiscountRequests()
    {
        try{
            // $response = Http::get('gigiapi.zanforthstaging.com/api/tagsAutoComplete');
            // $tags = $response->json()['data'];

            // $token = session('Authenticated_user_data')['token'];
            // $response = Http::withToken($token);
            // $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getDeal/'.$id.'');
            // $offer = $response->json();
            // $response = Http::withToken($token);
            // $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getMerchant/'.$offer['data']['merchant_id'].'');
            // $merchant = $response->json()['data'];
            // $offer['data']['merchant_branches'] = $merchant['branches'];
            // $categories = Http::get('gigiapi.zanforthstaging.com/api/categoryAutoComplete')->json()['data'];
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            $conversations = $response->json()['data'];
            $id = session('Authenticated_user_data')['id'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Admin.DiscountRequests',compact('conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminEditOffer($id)
    {
        try{
            $response = Http::get('gigiapi.zanforthstaging.com/api/tagsAutoComplete');

            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::get('gigiapi.zanforthstaging.com/api/tagsAutoComplete');
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

            $tags = $response->json()['data'];

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getDeal/'.$id.'');

            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getDeal/'.$id.'');
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

            $offer = $response->json();
            // dd($offer);
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getMerchant/'.$offer['data']['merchant_id'].'');

            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getMerchant/'.$offer['data']['merchant_id'].'');
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

            $merchant = $response->json()['data'];


            $offer['data']['merchant_branches'] = $merchant['branches'];
            // $categories = Http::get('gigiapi.zanforthstaging.com/api/categoryAutoComplete')->json()['data'];
            $response = Http::get('gigiapi.zanforthstaging.com/api/categoryAutoComplete');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::get('gigiapi.zanforthstaging.com/api/categoryAutoComplete');
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
            
            $categories = $response->json()['data'];

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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

            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
                    // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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

            $conversations = $response->json()['data'];
            $id = session('Authenticated_user_data')['id'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Admin.EditOffer',compact('offer','categories','tags','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminEditOfferConfirm(Request $request, $id)
    {
        try
        {

            if($request->discount_on_price < 0 || $request->discount_on_price > 100)
            {
                return redirect('/AdminEditOffer/'.$id.'')->with('success', 'Invalid Discount Percentage!');
            }
           


            $token = session('Authenticated_user_data')['token'];
            // dd($request);
            // $token = session('Authenticated_user_data')['token'];
            // $response = Http::withToken($token);
            $url = 'gigiapi.zanforthstaging.com/api/admin/editDeal/'.$id.'';

            // if($request->hasFile('images'))
            // {
            //     //WITH IMAGE
            //     foreach ($request->files->get('images') as $key => $img) {
            //         $file = $request->file('images')[$key];
            //         $response->attach(
            //             'images['.$key.']', $file->get(), $file->getClientOriginalName());
            //     }

            //     $data = [
            //         'name' =>  $request->name,
            //         'discount' => $request->discount,
            //         'type' => $request->type,
            //         'category' => $request->category,
            //         'actual_price' => $request->actual_price,
            //         'discount_on_price' => $request->discount_on_price,
            //         'price' => $request->price,
            //         'after_discount' => $request->after_discount,
            //         'expiry' => $request->expiry,
            //         'description' => $request->description,
            //     ];
        
            //     $branches = $request->input('branches');
            //     $tags = $request->input('tags');
            //     if ($branches){
            //         if (!is_array($branches))
            //             $branches = (array) $branches;
        
            //         foreach ($branches as $key => $branch){
            //             $data['branches[' . $key . ']'] = $branch;
            //         }
            //     }
        
            //     if ($tags){
            //         if (!is_array($tags))
            //             $tags = (array) $tags;
        
            //         foreach ($tags as $key => $tag){
            //             $data['tags[' . $key . ']'] = $tag;
            //         }
            //     }
            //     // dd($url);
            //     $response = $response->post($url, $data);
            //     // dd($response->json());
            //     // return redirect()->back('success', 'Deal Updated Successfully!');
            //     // return redirect('/home/dashboard');
            //     return redirect('/AdminEditOffer/'.$id.'')->with('success', 'Deal Updated Successfully!');

            // }
            // //WITHOUT IMAGE
            // $data = $request->all();
            // // dd($data);
            // $branches = $request->input('branches');
            // $tags = $request->input('tags');
            // if ($branches){
            //     if (!is_array($branches))
            //         $branches = (array) $branches;

            //     foreach ($branches as $key => $branch){
            //         $data['branches[' . $key . ']'] = $branch;
            //     }
            // }
            // if ($tags){
            //     if (!is_array($tags))
            //         $tags = (array) $tags;

            //     foreach ($tags as $key => $tag){
            //         $data['tags[' . $key . ']'] = $tag;
            //     }
            // }
            // $response = $response->post($url, $data);



            //COPIED FROM MERCHANT EDIT OFFER

            if($request->hasFile('images'))
            {
                //WITH IMAGE
                $response = Http::withToken($token);
                foreach ($request->files->get('images') as $key => $img) {
                    $file = $request->file('images')[$key];
                    $response->attach(
                        'images['.$key.']', $file->get(), $file->getClientOriginalName());
                }

                if($request->type == 'Entire Menu')
                {
                    // dd(1);
                    $data = [
                        'name' =>  $request->name,
                        'discount' => $request->discount_on_price,
                        'type' => $request->type,
                        'category' => $request->category,
                        'price' => 0,
                        'after_discount' => 0,
                        'discount_on_price' => $request->discount_on_price,
                        'discount' => $request->discount_on_price,
                        'expiry' => $request->expiry,
                        'description' => $request->description,
                        'limit' => $request->limit,
                    ];
                }
                else
                {
                    $after_discount = $request['price'] - ($request['price'] * ($request['discount_on_price']/100) );

                    $data = [
                        'name' =>  $request->name,
                        'discount' => $request->discount_on_price,
                        'type' => $request->type,
                        'category' => $request->category,
                        'price' => $request->price,
                        'discount_on_price' => $request->discount_on_price,
                        'discount' => $request->discount_on_price,
                        'after_discount' => $after_discount,
                        'expiry' => $request->expiry,
                        'description' => $request->description,
                        'limit' => $request->limit,
                    ];
                }
                // $data = [
                //     'name' =>  $request->name,
                //     'discount' => $request->discount,
                //     'type' => $request->type,
                //     'category' => $request->category,
                //     'actual_price' => $request->actual_price,
                //     'discount_on_price' => $request->discount_on_price,
                //     'price' => $request->price,
                //     'after_discount' => $request->after_discount,
                //     'expiry' => $request->expiry,
                //     'description' => $request->description,
                // ];
        
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
                $response = $response->post($url, $data);
                // dd($response->json());
                return redirect('AdminEditOffer/'.$id.'')->with('success', 'Offer Updated Successfully!');


            }



            // $response = Http::withToken($token)->post($url, [
            //     'name' =>  $request->name,
            //     'discount' => $request->discount_on_price,
            //     'type' => $request->type,
            //     'category' => $request->category,
            //     'price' => 0,
            //     'after_discount' => 0,
            //     'discount_on_price' => $request->discount_on_price,
            //     'discount' => $request->discount_on_price,
            //     'expiry' => $request->expiry,
            //     'description' => $request->description,
            //     'branches[0]' => 86,
            //     'tags[0]' => 'Pizza'
            // ]);

            try
            {

                if($request->type == 'Entire Menu')
                {
                    $data = [
                        'name' =>  $request->name,
                        'discount' => $request->discount_on_price,
                        'type' => $request->type,
                        'category' => $request->category,
                        'price' => 0,
                        'after_discount' => 0,
                        'discount_on_price' => $request->discount_on_price,
                        'discount' => $request->discount_on_price,
                        'expiry' => $request->expiry,
                        'description' => $request->description,
                        'branches' => $request->branches,
                        'tags'=> $request->tags,
                        'limit' => $request->limit,
                    ];
                }
                else
                {
                    $after_discount = $request['price'] - ($request['price'] * ($request['discount_on_price']/100) );

                    $data = [
                        'name' =>  $request->name,
                        'discount' => $request->discount_on_price,
                        'type' => $request->type,
                        'category' => $request->category,
                        'price' => $request->price,
                        'discount_on_price' => $request->discount_on_price,
                        'discount' => $request->discount_on_price,
                        'after_discount' => $after_discount,
                        'expiry' => $request->expiry,
                        'description' => $request->description,
                        'branches' => $request->branches,
                        'tags'=> $request->tags,
                        'limit' => $request->limit,
                    ];
                }

                $response = Http::withToken($token)->post($url, $data);

                // $response = Http::withToken($token)->post($url, [
                //     'name' =>  $request->name,
                //     'discount' => $request->discount_on_price,
                //     'type' => $request->type,
                //     'category' => $request->category,
                //     'price' => 0,
                //     'after_discount' => 0,
                //     'discount_on_price' => $request->discount_on_price,
                //     'discount' => $request->discount_on_price,
                //     'expiry' => $request->expiry,
                //     'description' => $request->description,
                //     // 'branches[0]' => 86,
                //     // 'tags[0]' => 'Pizza',
                //     'branches' => $request->branches,
                //     'tags' => $request->tags,
                // ]);
                
            } catch (\Exception $e) {
                return response()->json([
                    'Success' => 'False',
                    'Error' => $e->getMessage(),
                ]);
            }
            // dd($response);
            return redirect('/AdminEditOffer/'.$id.'')->with('success', 'Deal Updated Successfully!');

        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminAcceptDeal($id)
    {
        try{
            // dd($id);
            $token = session('Authenticated_user_data')['token'];
            $url = "gigiapi.zanforthstaging.com/api/admin/takeActionOnDeal/".$id."";
            $response = Http::withToken($token)->post($url, [
                'status' => 1,
            ]);
            // dd($response->json());
            return redirect()->back()->with('success', 'Deal Accepted Successfully!');;
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminRejectDeal(Request $request, $id)
    {
        try{
            // dd($id);
            $token = session('Authenticated_user_data')['token'];
            $url = "gigiapi.zanforthstaging.com/api/admin/takeActionOnDeal/".$id."";
            $response = Http::withToken($token)->post($url, [
                'status' => 2,
                'reject_reason' => $request->reject_reason
            ]);
            // dd($response->json());

            if (array_key_exists("error",$response->json()))
            {
                return redirect()->back()->with('alert',$response->json()['error']);
            }


            return redirect()->back()->with('success', 'Deal Stopped/Rejected Successfully!');;;
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminOfferRequests()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getDeals' , [
                'limit' => 10,
                'page' => 1,
                'returnType' => 'customPagination',
                'status' => 0,
                'active' => 1,
                'orderBy' => 'desc'
            ]);

            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getDeals' , [
                        'limit' => 10,
                        'page' => 1,
                        'returnType' => 'customPagination',
                        'status' => 0,
                        'active' => 1,
                        'orderBy' => 'desc'
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

            $deals = $response->json()['data'];
            // dd($deals);zz
            $deals = $this->paginate_for_requests_coupons($deals);

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            $conversations = $response->json()['data'];
            $id = session('Authenticated_user_data')['id'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Admin.OfferRequests',compact('deals','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminOfferActivationReactivationRequest()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getDeals' , [
                'limit' => 10,
                'page' => 1,
                'returnType' => 'customPagination',
                // 'status' => 0,
                // 'active' => 1,
                'activation' => 1,
                'orderBy' => 'desc'
            ]);
            $deals = $response->json()['data'];
            // dd($deals);
            $deals = $this->paginate_for_requests_coupons($deals);

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            $conversations = $response->json()['data'];
            $id = session('Authenticated_user_data')['id'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Admin.OfferRequestsActiveReactive',compact('deals','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function paginate_for_requests_coupons($items, $perPage = 12, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => Paginator::resolveCurrentPath()] );
    }

    public function OfferDetails($id)
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getDeal/'.$id.'');
            $deal = $response->json()['data'];

            $response = Http::get('gigiapi.zanforthstaging.com/api/user/getMerchant/'.$deal['merchant_id'].'');
            $merchant = $response->json()['data'];
            // dd($deal);

            $deal['merchant_name'] = $merchant['name'];
            // dd($deal);
            // dd($deal);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            $conversations = $response->json()['data'];
            $id = session('Authenticated_user_data')['id'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Admin.DealDetails',compact('deal','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }
}
