<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
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
    
    public function ContactNumberAlreadyTaken(Request $request)
    {
        $url = ''.config('path.path.WebPath').'api/isPhoneExist';
        $data = [
            'phone_no' => $request->phone_no,
        ];
        $response = Http::post($url,$data)->json();

        return $response;
    }

    public function getCities(Request $request)
    {
        // echo $request->country_id;
        $url = ''.config('path.path.WebPath').'api/getCityByCountryID?id='.$request->country_id;'';
        $cities = Http::get($url)->json()['data'];

        $html = '<select class="form-control" id="city" name="city" style="width: 50%;text-align: center;"> ';

        foreach($cities as $city)
        {
            $html .= '<option value="'.$city['id'].'"> '.$city['name'].' </option>';
        }
        

        $html .= ' </select> ';


        return $html;
    }

    public function registerMerchant()
    {
        try{
            session()->forget('Authenticated_user_data');
            $type = 2;

            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];

            $url = ''.config('path.path.WebPath').'api/getAllLanguages';
            $languages = Http::get($url)->json()['data'];

            $url = ''.config('path.path.WebPath').'api/getCountries';
            $countries = Http::get($url)->json()['data'];

            // dd($countries);
            return view('Registration',compact('type','categories','languages','countries'));
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

    public function merchant_logout()
    {
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

    public function merchant_login(Request $request)
    {
        try{
            $url = ''.config('path.path.WebPath').'api/login';
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
        // try{
            // dd($request);

            // dd(json_encode($request->operation_days));

            $url = ''.config('path.path.WebPath').'api/merchantRegister';
            $intialized = false;

            // Documents
            if($request->is_registered_with_ministry_of_commerce == 1)
            {
                foreach ($request->files->get('documents') as $key => $img) {
                    $file = $request->file('documents')[$key];
                    // $response->attach(
                    $response = Http::attach('documents['.$key.']', $file->get(), $file->getClientOriginalName());
                }
                $intialized = true;
            }

            // if($request->hasFile('profile_picture'))
            // {
            //     $file = $request->file('profile_picture');
            //     $response = Http::attach('profile_picture', $file->get(), $file->getClientOriginalName());
            //     $intialized = true;
            // }

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
            
            //operation_days 

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
                'website' => $request->website,
                // 'branch_name' => $request->branch_name,
                'address' => $request->address,
                'country' => $request->country,
                'city' => $request->city,
                'language' => $request->language,
                'phone_no' => $request->phone_no,
                'operation_days' => json_encode($request->operation_days),
                'opnening_time' => $request->opnening_time,
                'closing_time' => $request->closing_time,
                'is_registered_with_ministry_of_commerce' => $request->is_registered_with_ministry_of_commerce,
                'date_of_birth' => '1997/02/17',   // OPTIONAL
                'type' => 2,
            ];

            if($request->is_registered_with_ministry_of_commerce == 1){
                $data['registration_number'] = $request->registration_number;
                $data['patent_number'] = $request->patent_number;
            }else{
                $data['registration_number'] = null;
                $data['patent_number'] = null;
            }

            // dd($data);
            // WHENEVER YOU HAVE TO PASS ARRAY AND IMAGE AT SAME TIME.
            if($intialized) // IF PAYLOAD INCLUDES IMAGES .. PASS CATEGORIES ARRAY LIKE THIS
            {
                // $data['categories'];
                if ($request->has('categories')) {
                    foreach ($request->categories as $key => $cat){
                        $data['categories[' . $key . ']'] = $cat;
                    }
                }
                // if ($request->has('categories')) {
                //     foreach ($request->categories as $key => $cat){
                //         $categories[] = $cat;
                //     }
                //     $data['categories'] = $categories;
                // }
                // dd($data);
                $response = $response->post($url, $data)->json();
            }
            else    // IF PAYLOAD DOESN'T INCLUDE IMAGES.. PASS CATEGORIES ARRAY LIKE THIS
            {
                if ($request->has('categories')) {
                    foreach ($request->categories as $key => $cat){
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


            return redirect('login')->with('success','Sign Up Success! Our SiBuy365 team will call you shortly within 3 business days.');

        // } catch (\Exception $e) {
        //     return response()->json([
        //         'Success' => 'False',
        //         'Error' => $e->getMessage(),
        //     ]);
        // }
    }
    
}
