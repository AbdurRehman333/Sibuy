<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserMerchantAuthController extends Controller
{

    public function merchant_registration(Request $request)
    {
        try{
            $response = Http::post('gigiapi.zanforthstaging.com/api/merchantRegister', [
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
            
            if($request->lat == null || $request->long == null || $request->address == null)
            {
                return redirect()->back()->with('alert', 'Message : Fetch Your Location First!');
            }

            // dd($request);

            $response = Http::post('gigiapi.zanforthstaging.com/api/userRegister', [
                'name' =>  $request->name,
                'email' => $request->email,

                'lat' => $request->lat,
                'long' => $request->long,
                'city' => $request->city,
                'country' => $request->country,
                'address' => $request->address,

                'phone_no' => $request->phone_no,
                'date_of_birth' => $request->date_of_birth,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
                'gender' => $request->gender
            ]);

            if (array_key_exists("error", $response->json()))
            {
                return redirect('register')->with('alert',''.$response['error'].'');
            }

            return view('user.user_login');
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

            $response = Http::post('gigiapi.zanforthstaging.com/api/login', [
                'email' => $request->email,
                'password' => $request->password,
            ]);
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
            
            // dd($response->json());
            session(['Authenticated_user_data' => $response->json()['data']]);
            // dd($response->json()['data']);
            // dd(session('Authenticated_user_data'));
            if(session('Authenticated_user_data')['type'] == 3)
            {
                return redirect('/AdminDashboard');
            }
            elseif(session('Authenticated_user_data')['type'] == 2)
            {
                return redirect('/MerchantDashboard');
            }


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
            $response = Http::withToken($token)->post('gigiapi.zanforthstaging.com/api/logout');
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
