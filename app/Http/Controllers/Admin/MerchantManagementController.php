<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MerchantManagementController extends Controller
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

    public function AdminMerchantReviews($id)
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getMerchant/'.$id.'');
            $merchant = $response->json()['data'];
            // dd($merchant);
            // $reviews = $merchant['reviews'];
            foreach($merchant['reviews'] as &$r)
            {
                $r['reply_id'] = 0;
                $r['replied'] = false;
                foreach($merchant['reviews'] as &$reply)
                {
                    $reply['replied_to_someone'] = false;
                    if($r['id'] ==  $reply['parent_id'])
                    {
                        $r['reply_id'] = $reply['id'];
                        $r['replied'] = true;
                        $r['reply_notes'] = $reply['notes'];
                        $r['merchant_name'] = $reply['name'];

                        $reply['deal_id'] = $r['deal_id'];
                        $reply['deal_name'] = $r['deal_name'];
                        $reply['replied_to_someone'] = true;
                        $reply['replied_to'] = $r['name'];
                    }
                }
            }

            // dd($merchant);


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
            return view('Admin.AdminMerchantReviews',compact('merchant','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminEditMerchant($id)
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getMerchant/'.$id.'');
            $merchant = $response->json()['data'];
            // dd($merchant);
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
            return view('Admin.AdminEditMerchant',compact('merchant','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminMerchantProfileUpdate(Request $request)
    {
        // dd($request);
        try{
            $data = $request->all();
            // dd($data);
            

            // dd($data);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            if($request->hasFile('profile_picture'))
            {
                $response = $response->attach('profile_picture', file_get_contents($request->profile_picture), 'dP.png');
            }
            // dd($response);
            $response = $response->post('gigiapi.zanforthstaging.com/api/admin/editMerchant/'.$request->id.'', $data);

            if (array_key_exists("error",$response->json()))
            {
                return redirect()->back()->with('alert',$response->json()['error']);
            }

            $response = $response->json();
            // dd($response);
            return redirect()->back();
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }
}
