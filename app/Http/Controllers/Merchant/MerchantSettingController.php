<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MerchantSettingController extends Controller
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

    // public function MobileChatLogin()
    // {
    //     $type = 2;
    //     return view('Merchant.MobileChatLogin',compact('type'));
    // }
    // public function MobileChatLoginConfirm(Request $request)
    // {
    //     try{
    //         // dd($request);
    //         $url = ''.config('path.path.WebPath').'api/login';
    //         $data = [
    //             'email' => $request->email,
    //             'password' => $request->password,
    //         ];
    //         $response = Http::post($url,$data);
    //         $message = $response->json();
    //         // dd($message);
    //         //If Error Occurs
    //         if (array_key_exists("error",$message))
    //         {
    //             if($message['error'] == 'Your account is not verified. Please verify your account')
    //             {
    //                 // dd('Your account is not verified. Please verify your account');
    //                 return redirect('login/merchant')->with('alert','Please verify your account.');
    //             }
    //             // dd('Some Error Happened');
    //             return redirect('login/merchant')->with('alert','Something Happened!');
    //         }
    //         // Set Session
    //         // session()->forget('MyToken');
    //         session()->forget('Authenticated_user_data');
    //         session()->put('Authenticated_user_data',$response->json()['data']);
    //         return redirect('/MobileChat');
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'Success' => 'False',
    //             'Error' => $e->getMessage(),
    //         ]);
    //     }
    // }

    // public function MobileChat()
    // {
    //     $id = session('Authenticated_user_data')['id'];
    //     $token = session('Authenticated_user_data')['token'];
    //     $response = Http::withToken($token);
    //     $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
    //     $conversations = $response->json()['data'];

    //     echo "<script>";
    //     echo "var bearer_token = `". $token ."` ;";
    //     echo "var id = `". $id ."` ;";
    //     echo "var fromMob = true ;";
    //     echo "</script>";

    //     return view('Merchant.MobileChat',compact('id','conversations'));
    // }

    public function UpdatePassword(Request $request)
    {
        try
        {
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->post(''.config('path.path.WebPath').'api/merchant/updatePassword', $request->all());
            $response = $response->json();
            // dd($response);

            if (array_key_exists("error",$response))
            {
                return redirect()->back()->with('alert',$response['error']);
            }

            
            if($response['message'] == "success")
            {
                return redirect()->back()->with('success', 'Password Updated!');
            }
            throw new \ErrorException('Error found');
        } catch (\Exception $e) {
            if (array_key_exists("error",$response))
            {
                return redirect()->back()->with('alert',$response['error']);
            }
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
                'Message' => $response['error'],
            ]);
        }
    }

    public function MerchantProfileUpdate(Request $request)
    {
        // try 
        // {
            // dd();
            if(session('Authenticated_user_data')['date_of_birth'] == null)
            {
                $dob = '00/00/00';
            }
            else
            {
                $dob = session('Authenticated_user_data')['date_of_birth'];
            }
            $token = session('Authenticated_user_data')['token'];
            // dd($token);
            $response = Http::withToken($token);
            if($request->hasFile('profile_picture'))
            {
                $response = $response->attach('profile_picture', file_get_contents($request->profile_picture), 'dP.png');
            }

            if($request->hasFile('documents')){
                foreach ($request->files->get('documents') as $key => $img) {
                    $file = $request->file('documents')[$key];
                    $response = $response->attach('documents['.$key.']', $file->get(), $file->getClientOriginalName());
                }
            }
            
            // dd($request);

            // $response = $response->post(''.config('path.path.WebPath').'api/merchant/updateProfile', $request->all());
            $response = $response->post(''.config('path.path.WebPath').'api/merchant/updateProfile', [
                'name' => $request->name,
                'phone_no' => $request->phone_no,
                'address' => $request->address,
                'registration_number' => $request->registration_number,
                'patent_number' => $request->patent_number,
                'opening_time' => $request->opening_time,
                'closing_time' => $request->closing_time,
                'operation_days' => json_encode($request->operation_days),
                'date_of_birth' => $dob,
            ]);
            // dd($response);
            $response = $response->json();


            if (array_key_exists("error",$response))
            {
                return redirect()->back()->with('alert',$response['error']);
            }

            // To Update Session, I made a $data array.
            $data['userData'] = $response['data'];
            $data['userData']['token'] = $token;
            if($response['message'] == "success")
            {
                session(['Authenticated_user_data' => $data['userData']]);
            }
            // dd($data);
            return redirect()->back()->with('success', 'Profile Updated!');
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'Success' => 'False',
        //         'Error' => $e->getMessage(),
        //         // 'Message' => $response->json()['error'],
        //     ]);
        // }
    }
    public function MerchantSettings()
    {
        try{
            $id = session('Authenticated_user_data')['id'];
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];

            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getProfile');
            $profile = $response->json()['data'];
            // dd($profile);
            // dd($profile['businessDetails'][0]['operating_days']);
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            // dd($notifications);
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";

            return view('Merchant.settings', compact('id','conversations','notifications','profile'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }
}
