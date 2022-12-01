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

    public function AdminMerchantReviews($id)
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/admin/getMerchant/'.$id.'');
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
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
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
            $response = $response->get(''.config('path.path.WebPath').'api/admin/getMerchant/'.$id.'');
            $merchant = $response->json()['data'];
            // dd($merchant);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
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
            $response = $response->post(''.config('path.path.WebPath').'api/admin/editMerchant/'.$request->id.'', $data);

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

    public function SetMerchantCommission(Request $request)
    {
        // dd($request);
        // try{
            // $data = $request->all();
            $data = [
                'monthly_charges' => $request->monthly_charges,
                'admin_after_redeem_percentage' => (float)$request->admin_after_redeem_percentage,
                'merchant_after_redeem_percentage' =>  100 - (float)$request->admin_after_redeem_percentage,
                'admin_before_redeem_percentage' => (float)$request->admin_before_redeem_percentage,
                'merchant_before_redeem_percentage' =>  100 - (float)$request->admin_before_redeem_percentage
            ];
            // dd($data);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            // if($request->hasFile('profile_picture'))
            // {
            //     $response = $response->attach('profile_picture', file_get_contents($request->profile_picture), 'dP.png');
            // }
            $response = $response->post(''.config('path.path.WebPath').'api/admin/editMerchant/'.$request->id.'', $data);
            dd($response);

            if (array_key_exists("error",$response->json()))
            {
                return redirect()->back()->with('alert',$response->json()['error']);
            }

            $response = $response->json();
            // dd($response);
            return redirect()->back();
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'Success' => 'False',
        //         'Error' => $e->getMessage(),
        //     ]);
        // }
    }

    public function AcceptAndSetMerchantCommission(Request $request)
    {
        // dd($request);
        // try{
            // $data = $request->all();
            $data = [
                'monthly_charges' => $request->monthly_charges,
                'admin_after_redeem_percentage' => (float)$request->admin_after_redeem_percentage,
                'merchant_after_redeem_percentage' =>  100 - (float)$request->admin_after_redeem_percentage,
                'admin_before_redeem_percentage' => (float)$request->admin_before_redeem_percentage,
                'merchant_before_redeem_percentage' =>  100 - (float)$request->admin_before_redeem_percentage,
                'status' => 1,
            ];
            // dd($data);
            $token = session('Authenticated_user_data')['token'];
            // $response = Http::withToken($token);
            // $response = $response->post(''.config('path.path.WebPath').'api/admin/editMerchant/'.$request->id.'', $data);

            $response = Http::withToken($token);
            $response = $response->post(''.config('path.path.WebPath').'api/admin/changeStatusOfMerchant/'.$request->merchant_id.'', $data);
            dd($response);

            if (array_key_exists("error",$response->json()))
            {
                return redirect()->back()->with('alert',$response->json()['error']);
            }

            $response = $response->json();
            // dd($response);
            return redirect()->back();
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'Success' => 'False',
        //         'Error' => $e->getMessage(),
        //     ]);
        // }
    }

    public function InactiveMerchant($id)
    {
        // dd($request);
        // try{
            // dd($id);
            $token = session('Authenticated_user_data')['token'];
            $data = ['status' => 0];
            $response = Http::withToken($token);
            $response = $response->post(''.config('path.path.WebPath').'api/admin/changeStatusOfMerchant/'.$id.'', $data);
            // dd($response);

            if (array_key_exists("error",$response->json()))
            {
                return redirect()->back()->with('alert',$response->json()['error']);
            }

            $response = $response->json();
            // dd($response);
            return redirect()->back()->with('success','Successfully Disabled!');
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'Success' => 'False',
        //         'Error' => $e->getMessage(),
        //     ]);
        // }
    }

    public function ActiveMerchant($id)
    {
        // dd($request);
        // try{
            // dd($id);
            $token = session('Authenticated_user_data')['token'];
            $data = ['status' => 1];
            $response = Http::withToken($token);
            $response = $response->post(''.config('path.path.WebPath').'api/admin/changeStatusOfMerchant/'.$id.'', $data);
            // dd($response);

            if (array_key_exists("error",$response->json()))
            {
                return redirect()->back()->with('alert',$response->json()['error']);
            }

            $response = $response->json();
            // dd($response);
            return redirect()->back()->with('success','Successfully Disabled!');
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'Success' => 'False',
        //         'Error' => $e->getMessage(),
        //     ]);
        // }
    }
}
