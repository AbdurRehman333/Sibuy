<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CommonAuthController extends Controller
{
    public function Login()
    {
        try{
            $type = 2;
            return view('Login',compact('type'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }
    
    public function registerMerchant()
    {
        try{
            session()->forget('Authenticated_user_data');
            $type = 2;

            $url = 'gigiapi.zanforthstaging.com/api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];

            return view('Registration',compact('type','categories'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function admin_logout()
    {
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

    public function merchant_logout()
    {
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

    public function merchant_login(Request $request)
    {
        try{
            $url = 'gigiapi.zanforthstaging.com/api/login';
            $data = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            $response = Http::post($url,$data);
            $message = $response->json();
            // dd($message);
            //If Error Occurs
            if (array_key_exists("error",$message))
            {
                if($message['error'] == 'Your account is not verified. Please verify your account')
                {
                    // dd('Your account is not verified. Please verify your account');
                    return redirect('login/merchant')->with('alert','Please verify your account.');
                }
                // dd('Some Error Happened');
                return redirect('login/merchant')->with('alert','Something Happened!');
            }
            // Set Session
            // session()->forget('MyToken');
            session()->forget('Authenticated_user_data');
            session()->put('Authenticated_user_data',$response->json()['data']);
            return redirect('/MerchantDashboard');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }

    }
    public function register_merchant(Request $request)
    {
        try{
            // dd($request);

            $url = 'gigiapi.zanforthstaging.com/api/merchantRegister';
            $intialized = false;
            if($request->hasFile('profile_picture'))
            {
                $file = $request->file('profile_picture');
                $response = Http::attach('profile_picture', $file->get(), $file->getClientOriginalName());
                $intialized = true;
            }

            if($request->hasFile('logo'))
            {
                $file = $request->file('logo');
                if($intialized)
                {
                    $response = $response->attach('logo', $file->get(), $file->getClientOriginalName());
                }
                else
                {
                    $response = Http::attach('logo', $file->get(), $file->getClientOriginalName());
                }
                $intialized = true;
            }
            $data = [
                'name' => $request->name,
                'website' => $request->website,
                'email' => $request->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
                'branch_name' => $request->branch_name,
                'address' => $request->address,
                'country' => $request->country,
                'city' => $request->city,
                'lat' => $request->lat,
                'long' => $request->long,
                'description' => $request->description,
                'phone_no' => $request->phone_no,
                'date_of_birth' => $request->date_of_birth,
                'type' => 2,
            ];

            // dd($data);
            // WHENEVER YOU HAVE TO PASS ARRAY AND IMAGE AT SAME TIME.
            if($intialized) // IF PAYLOAD INCLUDES IMAGES .. PASS CATEGORIES ARRAY LIKE THIS
            {
                // $data['categories'];
                if ($request->has('cats')) {
                    foreach ($request->cats as $key => $cat){
                        $data['categories[' . $key . ']'] = $cat;
                    }
                }
                $response = $response->post($url, $data)->json();
            }
            else    // IF PAYLOAD DOESN'T INCLUDE IMAGES.. PASS CATEGORIES ARRAY LIKE THIS
            {
                if ($request->has('cats')) {
                    foreach ($request->cats as $key => $cat){
                        $categories[] = $cat;
                    }
                    $data['categories'] = $categories;
                }
                // dd($data);
                $response = Http::post($url, $data)->json();
            }
            // dd($response);

            if (array_key_exists("error", $response))
            {
                return redirect('login')->with('alert',''.$response['error'].'');
            }

            

            return redirect('login')->with('success','Your account has registered successfully.');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }
    
}
