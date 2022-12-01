<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
class UserMerchantAuthController extends Controller
{

    public function merchant_registration(Request $request)
    {
        try{
            $response = Http::post(''.config('path.path.WebPath').'api/merchantRegister', [
                'name' =>  $request->name,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'date_of_birth' => $request->date_of_birth,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation
            ]);
            return view('user.user_login');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function user_registration(Request $request)
    {
        try{
            // dd($request);
            $length = Str::length($request->date_of_birth);

            // if($length !== 10 || $request->date_of_birth[2] !== '/' || $request->date_of_birth[5] !== '/')
            // {
            //     return redirect()->back()->with('alert', 'Message : Wrong Date Of Birth!');
            // }

            $response = Http::post(''.config('path.path.WebPath').'api/userRegister', [
                'name' =>  $request->name,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'country' => $request->country,
                'city' => $request->city,
                'Ccode' => $request->Ccode,
                'language' => $request->language,
                'reference_code' => $request->reference_code,
            ]);

            // dd($response);

            if (array_key_exists("error", $response->json()))
            {
                return redirect('register')->with('alert',''.$response['error'].'');
            }

            return redirect('login')->with('success','Successfully Registered!');
            // return view('user.user_login');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function user_login(Request $request)
    {
        try {
            try {
                $request->session()->forget('Authenticated_user_data');
            }
            catch (\Exception $e) {
                return response()->json([
                    'Success' => 'False',
                    'Error' => $e->getMessage(),
                    'Message' => $response->json()['error'],
                ]);
            }
            // dd($request);
            $response = Http::post(''.config('path.path.WebPath').'api/login', [
                'phone_no' => $request->cell_no,
                'email' => $request->cell_no,
                'password' => $request->password,
            ]);
            // dd(''.config('path.path.WebPath').'api/login');
            // dd($response->json());
            if (array_key_exists("error",$response->json()))
            {
                if($response->json()['error'] == 'Your account is not verified. Please verify your account')
                {
                    // return redirect('login')->with('alert','Your account is not verified. Please verify your account.');
                    return redirect('AccVerify')->with('alert','Your account is not verified. Please verify your account.');
                }
    
                if($response->json()['error'] == 'Incorrect Password')
                {
                    return redirect('login')->with('alert','Incorrect Password.');
                }
    
                if($response->json()['error'] == 'User not found')
                {
                    return redirect('login')->with('alert','User not found.');
                }
            }
            
            dd($response->json());
            
            session(['Authenticated_user_data' => $response->json()['data']]);
            // dd(session()->get('Authenticated_user_data'));
            if(session('Authenticated_user_data')['type'] == 3)
            {
                return redirect('/AdminDashboard');
            }
            elseif(session('Authenticated_user_data')['type'] == 2)
            {
                return redirect('/MerchantDashboard');
            }

            // $token = session()->get('Authenticated_user_data')['token'];
            // $Usercities = [];
            // $locations = Http::withToken($token)->get(''.config('path.path.WebPath').'api/user/getUserLocations')->json()['data'];
            // //Resetting the session
            // $userData = session()->get('Authenticated_user_data');
            // $userData['location'] = [
            //     'address' => 'N/A',
            //     'city' => $request->city[0],
            //     'country' => $request->country,
            // ];
            // // dd($userData);
            // session()->forget('Authenticated_user_data');
            // Session::put('Authenticated_user_data', $userData);

            return redirect('/home');

          
        } catch (\Exception $e) {

            if (array_key_exists("error",$response->json()))
            {
                if($response->json()['error'] == 'Your account is not verified. Please verify your account')
                {
                    // return redirect('login')->with('alert','Your account is not verified. Please verify your account.');
                    return redirect('AccVerify')->with('alert','Your account is not verified. Please verify your account.');
                }

                if($response->json()['error'] == 'Incorrect Password')
                {
                    return redirect('login')->with('alert','Incorrect Password.');
                }

                if($response->json()['error'] == 'User not found')
                {
                    return redirect('login')->with('alert','User not found.');
                }
            }

            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
                // 'Message' => $response->json()['error'],
            ]);

        }
        
    }

    public function user_logout()
    {
        // dd('u');
        try{
            $token = session()->get('Authenticated_user_data')['token'];
            $response = Http::withToken($token)->post(''.config('path.path.WebPath').'api/logout');
            session()->flush();
            return redirect('/home');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }
}
