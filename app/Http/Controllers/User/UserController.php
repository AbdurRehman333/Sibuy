<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Factory;
use Illuminate\Pagination;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Events\SendMessage;

class UserController extends Controller
{
    public function getNotifications($token)
    {
        $response = Http::withToken($token);
        $response = $response->get(''.config('path.path.WebPath').'api/getNotifications',[
            'limit' => 20,
            'page' => 1,
            'timeSort' => 'desc',
        ]);
        return $response->json();
        // dd($response->json()); 
    }

    public function ReferralCode()
    {
        // dd(1);
        try{
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];
            $notifications = null;
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
            }
            // dd($cat_array['couples']);
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
            return view('user.ReferralCode',compact('notifications','categories','AuthUserCities'));

        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }

        
    }

    public function UserSelectedCity($city)
    {
        // dd($city);
        // $userData = session()->get('Authenticated_user_data');
        // session()->forget('Authenticated_user_data');
        // Session::put('Authenticated_user_data', $userData);
        // dd(session()->get('AuthenticatedUserSelectedCities'));
        // session()->forget('AuthenticatedUserSelectedCities');

        // if(!session()->has('AuthenticatedUserSelectedCities'))
        // {
        //     // $AuthenticatedUserSelectedCities[] = $city;
        //     Session::put('AuthenticatedUserSelectedCities', $AuthenticatedUserSelectedCities);
        // }
        // else
        // {
        //     // dd(1);
        //     // $sessioncities = session()->get('AuthenticatedUserSelectedCities');
        //     // // dd($sessioncities);
        //     // // dd($)
            
        //     // foreach($sessioncities as $c)
        //     // {
        //     //     // dd($sessioncities[0]);
        //     //     // dD($c);
        //     //     $AuthenticatedUserSelectedCities[] = $c;
        //     // } 
        //     // $AuthenticatedUserSelectedCities[] = $city;
        //     // dd($AuthenticatedUserSelectedCities);
        //     Session::put('AuthenticatedUserSelectedCities', $AuthenticatedUserSelectedCities);
        // }

        Session::put('AuthenticatedUserSelectedCities', $city);
        return redirect()->back();
        // dd(session()->get('AuthenticatedUserSelectedCities'));
    }



    public function SelectingCity($city)
    {
        try
        {

            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }


            $already_selected = ['city' => $city,
            'country' => session()->get('unAuthUserLocations')['country'], 
            'lat' => session()->get('unAuthUserLocations')['lat'], 
            'long' => session()->get('unAuthUserLocations')['long'], ];

            session()->forget('unAuthUserLocations');
            Session::put('unAuthUserLocations', $already_selected);
            // dd(session()->get('unAuthUserLocations'));

            //SETTING CITIES FOR UN AUTH
            $cities[] = 0;
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('unAuthUserLocations')['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                'country' => session()->get('unAuthUserLocations')['country'],
            ]);
            $cities = $response->json();


            $category_section = Http::get(''.config('path.path.WebPath').'api/user/getHomePageSections',['section' => 'category']);
            $categorySection = $category_section->json()['data'];

            $upperImage_Section = Http::get(''.config('path.path.WebPath').'api/user/getHomePageSections',['section' => 'upperImageSection']);
            $upperImageSection = $upperImage_Section->json()['data'];

            $lowerImage_Section = Http::get(''.config('path.path.WebPath').'api/user/getHomePageSections',['section' => 'lowerImageSection']);
            $lowerImageSection = $lowerImage_Section->json()['data'];

            $footerImage_Section = Http::get(''.config('path.path.WebPath').'api/user/getHomePageSections',['section' => 'footerImageSection']);
            $footerImageSection = $footerImage_Section->json()['data'];

            $CatBlock_Section = Http::get(''.config('path.path.WebPath').'api/user/getHomePageSections',['section' => 'CatBlockSection']);
            $CatBlockSection = $CatBlock_Section->json()['data'];

            $category_to_show_on_block = $CatBlockSection[0]['data_id'];






            // NEW------s
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',[
                    'limit' => 4,
                    'page' => 1,
                    'category' => $category_to_show_on_block,
                    'returnType' => 'customPagination',
                    'timeSort' => 'desc',
                    'lat' => session()->get('unAuthUserLocations')['lat'],
                    'long' =>session()->get('unAuthUserLocations')['long'],
                    'cities[0]' =>session()->get('unAuthUserLocations')['city'],
                    'country' =>session()->get('unAuthUserLocations')['country'],
                ])->json();
                // dd($response);
                // NEW CODE -- START
                if($response == null)
                {
                    // dd('yess');
                    $right = false;
                    while($right == false)
                    {
                        $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',[
                            'limit' => 4,
                            'page' => 1,
                            'category' => $category_to_show_on_block,
                            'returnType' => 'customPagination',
                            'timeSort' => 'desc',
                            'lat' => session()->get('unAuthUserLocations')['lat'],
                            'long' =>session()->get('unAuthUserLocations')['long'],
                            'cities[0]' =>session()->get('unAuthUserLocations')['city'],
                            'country' =>session()->get('unAuthUserLocations')['country'],
                        ])->json();
                        // dd($response);
                        if($response == null)
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

                if($response['status'] == true)
                {
                    $data = $response['data'];
                    foreach($data as $key => &$datum)
                    {
                        //NearBy Deal
                        $datum['nearby'] = 0;
                        $datum['nearbyBranch'] = 0;
                        $distances = [];
                        $firstDistanceArray = reset($datum['distance']);
                        foreach($datum['distance'] as $i => &$d)
                        {
                        
                            $datum['nearby'] = $firstDistanceArray['distance_in_km'];
                            $datum['nearbyBranch'] = $firstDistanceArray['branch_name'];

                            if($d['distance_in_km'] < $datum['nearby'])
                            {
                                $datum['nearby'] = $d['distance_in_km'];
                                $datum['nearbyBranch'] = $d['branch_name'];
                            }
                        }
                    }
                    // foreach($data as $key => &$datum)
                    // {
                    //     $datum['nearby'] = 0;
                    //     $datum['nearbyBranch'] = 0;
                    //     // dd($datum);
                    //     // dd($datum['distance'][$key]);

                    //     foreach($datum['distance'] as &$d)
                    //     {
                    //         // dd($d);
                    //         $datum['nearby'] = $d['distance_in_km'];
                    //         $datum['nearbyBranch'] = $d['branch_name'];
                    //         if($d['distance_in_km'] <= $datum['nearby'])
                    //         {
                    //             $datum['nearby'] = $d['distance_in_km'];
                    //             $datum['nearbyBranch'] = $d['branch_name'];
                    //         }
                    //     }
                    // }
                }
                // dd($data);
                
                

                $cats_in_block = $data;
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $lat = (float)session()->get('Authenticated_user_data')['userLocations'][0]['lat'];
                $long = (float)session()->get('Authenticated_user_data')['userLocations'][0]['long'];

                if(session()->has('AuthenticatedUserSelectedCities'))
                {
                    $city = session()->get('AuthenticatedUserSelectedCities');
                }
                else
                {
                    $city = session()->get('Authenticated_user_data')['userLocations'][0]['city'];
                }
          



                $country = session()->get('Authenticated_user_data')['userLocations'][0]['country'];

                $token = session()->get('Authenticated_user_data')['token'];
                $response = Http::withToken($token);
                $response = $response->get(''.config('path.path.WebPath').'api/user/getUserLocations');
                $userCities = $response->json()['data'];
                $data = ['limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',
                'lat' => $lat ,
                'long' => $long,
                'country' =>$country,
                'category' => $category_to_show_on_block,
                ];



                if(session()->has('AuthenticatedUserSelectedCities'))
                {
                    $data['cities[0]'] = session()->get('AuthenticatedUserSelectedCities');
                }
                else
                {
                    foreach($userCities as $key => $c)
                    {
                        $data['cities['.$key.']'] = $c['city'];
                    }
                }

                // foreach($userCities as $key => $c)
                // {
                //     $data['cities['.$key.']'] = $c['city'];
                // }
                $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',$data);

                // NEW CODE -- START
                if($response->json() == null)
                {
                    // dd('yess');
                    $right = false;
                    while($right == false)
                    {
                        $response = Http::withToken($token);
                        $response = $response->get(''.config('path.path.WebPath').'api/user/getUserLocations');
                        $userCities = $response->json()['data'];
                        $data = ['limit' => 10000,
                        'page' => 1,
                        'returnType' => 'customPagination',
                        'lat' => $lat ,
                        'long' => $long,
                        'country' =>$country,
                        'category' => $category_to_show_on_block,
                        ];
                        
                        if(session()->has('AuthenticatedUserSelectedCities'))
                        {
                            $data['cities[0]'] = session()->get('AuthenticatedUserSelectedCities');
                        }
                        else
                        {
                            foreach($userCities as $key => $c)
                            {
                                $data['cities['.$key.']'] = $c['city'];
                            }
                        }
                        // foreach($userCities as $key => $c)
                        // {
                        //     $data['cities['.$key.']'] = $c['city'];
                        // }
                        $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',$data);
                        if($response == null)
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

                // dd($response->json());
                $response = $response->json();
                if($response['status'] == true)
                {
                    $data = $response['data'];
                    foreach($data as $key => &$datum)
                    {
                        //NearBy Deal
                        $datum['nearby'] = 0;
                        $datum['nearbyBranch'] = 0;
                        $distances = [];
                        $firstDistanceArray = reset($datum['distance']);
                        foreach($datum['distance'] as $i => &$d)
                        {
                        
                            $datum['nearby'] = $firstDistanceArray['distance_in_km'];
                            $datum['nearbyBranch'] = $firstDistanceArray['branch_name'];

                            if($d['distance_in_km'] < $datum['nearby'])
                            {
                                $datum['nearby'] = $d['distance_in_km'];
                                $datum['nearbyBranch'] = $d['branch_name'];
                            }
                        }
                    }
                    // foreach($data as $key => &$datum)
                    // {
                    //     $datum['nearby'] = 0;
                    //     $datum['nearbyBranch'] = 0;
                    //     // dd($datum);
                    //     // dd($datum['distance'][$key]);

                    //     foreach($datum['distance'] as &$d)
                    //     {
                    //         // dd($d);
                    //         $datum['nearby'] = $d['distance_in_km'];
                    //         $datum['nearbyBranch'] = $d['branch_name'];
                    //         if($d['distance_in_km'] <= $datum['nearby'])
                    //         {
                    //             $datum['nearby'] = $d['distance_in_km'];
                    //             $datum['nearbyBranch'] = $d['branch_name'];
                    //         }
                    //     }
                    // }
                }
                // dd($data);
                
                $cats_in_block = $data;
            }
            else
            {
                $cats_in_block = Http::get(''.config('path.path.WebPath').'api/user/getDeals',[
                    'limit' => 4,
                    'page' => 1,
                    'category' => $category_to_show_on_block,
                    'returnType' => 'customPagination',
                    'timeSort' => 'desc',
                ])->json();
                // NEW CODE -- START
                if($cats_in_block == null)
                {
                    // dd('yess');
                    $right = false;
                    while($right == false)
                    {
                        $cats_in_block = Http::get(''.config('path.path.WebPath').'api/user/getDeals',[
                            'limit' => 4,
                            'page' => 1,
                            'category' => $category_to_show_on_block,
                            'returnType' => 'customPagination',
                            'timeSort' => 'desc',
                        ])->json();
                        if($cats_in_block == null)
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
                // dd($cats_in_block);
                $cats_in_block = $cats_in_block['data'];
            }
            // NEW------e



            // RENDER HOME PAGE NOW
            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];
            //Trending Deals
            $response = Http::get(''.config('path.path.WebPath').'api/user/getTrendingDeals',[
                'limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',
                'cities[0]' => $city,
                'country' => session()->get('unAuthUserLocations')['country'],
                'lat' => session()->get('unAuthUserLocations')['lat'],
                'long' => session()->get('unAuthUserLocations')['long'],
            ]);
            $trendingDeals = $response->json()['data'];
            foreach($trendingDeals as $key => &$datum)
            {
                //NearBy Deal
                $datum['nearby'] = 0;
                $datum['nearbyBranch'] = 0;
                $distances = [];
                $firstDistanceArray = reset($datum['distance']);
                foreach($datum['distance'] as $i => &$d)
                {
                
                    $datum['nearby'] = $firstDistanceArray['distance_in_km'];
                    $datum['nearbyBranch'] = $firstDistanceArray['branch_name'];

                    if($d['distance_in_km'] < $datum['nearby'])
                    {
                        $datum['nearby'] = $d['distance_in_km'];
                        $datum['nearbyBranch'] = $d['branch_name'];
                    }
                }
            }
            // foreach($trendingDeals as $key => &$datum)
            //     {
            //         $datum['nearby'] = 0;
            //         $datum['nearbyBranch'] = 0;
            //         // dd(2);
            //         // dd($datum['distance'][$key]);

            //         foreach($datum['distance'] as &$d)
            //         {
            //             // dd($d);
            //             $datum['nearby'] = $d['distance_in_km'];
            //             $datum['nearbyBranch'] = $d['branch_name'];
            //             if($d['distance_in_km'] <= $datum['nearby'])
            //             {
            //                 $datum['nearby'] = $d['distance_in_km'];
            //                 $datum['nearbyBranch'] = $d['branch_name'];
            //             }
            //         }
            //     }

                
            $TopSellers = $trendingDeals;
            // dd($trendingDeals);
            // dd($trendingDeals);
            //Array for data to show
            $cat_array = 
            [
                'couples' => 39,
                'men' => 1,
                'women' => 2,
                'kids' => 3,
                'family' => 40,
                'travel' => 41,
                'automobile' => 4,
                'cleaning' => 6,
            ];
            $notifications = null;
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
            }
            // dd($cat_array['couples']);
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
            return view('user.index',compact('AuthUserCities','categories','CatBlockSection','cats_in_block','trendingDeals','cat_array','cities','categorySection',
            'upperImageSection','lowerImageSection','footerImageSection','TopSellers','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
                // 'Message' => $response->json()['error'],
            ]);
        }
    }
    
    public function UnAuthUserLocationFetched(Request $request)
    {
        try
        {
            if(!$request->has('lat'))
            {
                // dd('no');
                return redirect('home');
            }
            // dd($request);

            //SETTING CITIES FOR UN AUTH
            $cities[] = 0;
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('unAuthUserLocations')['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }

            $already_selected = ['city' => $request->city, 'country' => $request->country, 'lat' => $request->lat, 'long' => $request->long];
            // dd($already_selected);
            $session_data = session()->get('unAuthUserLocations');
            if($session_data) // Yes Already Session Variable
            {
                Session::put('unAuthUserLocations', $already_selected);
            }
            else    // No Session Variable
            {
                Session::put('unAuthUserLocations', $already_selected);
            }
            
            $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                'country' => $request->country,
            ]);
            // dd($request->country);
            $cities = $response->json();

            
            // dd($request);
            if(!$request->has('lat'))
            {
                // dd('no');
                return redirect('home');
            }
            // dd('yes');
            $category_section = Http::get(''.config('path.path.WebPath').'api/user/getHomePageSections',['section' => 'category']);
            $categorySection = $category_section->json()['data'];

            $upperImage_Section = Http::get(''.config('path.path.WebPath').'api/user/getHomePageSections',['section' => 'upperImageSection']);
            $upperImageSection = $upperImage_Section->json()['data'];

            $lowerImage_Section = Http::get(''.config('path.path.WebPath').'api/user/getHomePageSections',['section' => 'lowerImageSection']);
            $lowerImageSection = $lowerImage_Section->json()['data'];

            $footerImage_Section = Http::get(''.config('path.path.WebPath').'api/user/getHomePageSections',['section' => 'footerImageSection']);
            $footerImageSection = $footerImage_Section->json()['data'];

            $CatBlock_Section = Http::get(''.config('path.path.WebPath').'api/user/getHomePageSections',['section' => 'CatBlockSection']);
            $CatBlockSection = $CatBlock_Section->json()['data'];

            $category_to_show_on_block = $CatBlockSection[0]['data_id'];
            





            // NEW------s
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',[
                    'limit' => 4,
                    'page' => 1,
                    'category' => $category_to_show_on_block,
                    'returnType' => 'customPagination',
                    'timeSort' => 'desc',
                    'lat' => session()->get('unAuthUserLocations')['lat'],
                    'long' =>session()->get('unAuthUserLocations')['long'],
                    'cities[0]' =>session()->get('unAuthUserLocations')['city'],
                    'country' =>session()->get('unAuthUserLocations')['country'],
                ])->json();

                // NEW CODE -- START
                if($response == null)
                {
                    // dd('yess');
                    $right = false;
                    while($right == false)
                    {
                        $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',[
                            'limit' => 4,
                            'page' => 1,
                            'category' => $category_to_show_on_block,
                            'returnType' => 'customPagination',
                            'timeSort' => 'desc',
                            'lat' => session()->get('unAuthUserLocations')['lat'],
                            'long' =>session()->get('unAuthUserLocations')['long'],
                            'cities[0]' =>session()->get('unAuthUserLocations')['city'],
                            'country' =>session()->get('unAuthUserLocations')['country'],
                        ])->json();
                        if($response == null)
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

                if($response['status'] == true)
                {
                    $data = $response['data'];
                    foreach($data as $key => &$datum)
                    {
                        //NearBy Deal
                        $datum['nearby'] = 0;
                        $datum['nearbyBranch'] = 0;
                        $distances = [];
                        $firstDistanceArray = reset($datum['distance']);
                        foreach($datum['distance'] as $i => &$d)
                        {
                        
                            $datum['nearby'] = $firstDistanceArray['distance_in_km'];
                            $datum['nearbyBranch'] = $firstDistanceArray['branch_name'];

                            if($d['distance_in_km'] < $datum['nearby'])
                            {
                                $datum['nearby'] = $d['distance_in_km'];
                                $datum['nearbyBranch'] = $d['branch_name'];
                            }
                        }
                    }
                    // foreach($data as $key => &$datum)
                    // {
                    //     $datum['nearby'] = 0;
                    //     $datum['nearbyBranch'] = 0;
                    //     // dd($datum);
                    //     // dd($datum['distance'][$key]);

                    //     foreach($datum['distance'] as &$d)
                    //     {
                    //         // dd($d);
                    //         $datum['nearby'] = $d['distance_in_km'];
                    //         $datum['nearbyBranch'] = $d['branch_name'];
                    //         if($d['distance_in_km'] <= $datum['nearby'])
                    //         {
                    //             $datum['nearby'] = $d['distance_in_km'];
                    //             $datum['nearbyBranch'] = $d['branch_name'];
                    //         }
                    //     }
                    // }
                }
                // dd($data);  
                
                

                $cats_in_block = $data;
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $lat = (float)session()->get('Authenticated_user_data')['userLocations'][0]['lat'];
                $long = (float)session()->get('Authenticated_user_data')['userLocations'][0]['long'];

                if(session()->has('AuthenticatedUserSelectedCities'))
                {
                    $city = session()->get('AuthenticatedUserSelectedCities');
                }
                else
                {
                    $city = session()->get('Authenticated_user_data')['userLocations'][0]['city'];
                }

                // $city = session()->get('Authenticated_user_data')['userLocations'][0]['city'];
                $country = session()->get('Authenticated_user_data')['userLocations'][0]['country'];

                $token = session()->get('Authenticated_user_data')['token'];
                $response = Http::withToken($token);
                $response = $response->get(''.config('path.path.WebPath').'api/user/getUserLocations');
                $userCities = $response->json()['data'];
                $data = ['limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',
                'lat' => $lat ,
                'long' => $long,
                'country' =>$country,
                'category' => $category_to_show_on_block,
                ];

                //DROP DOWN CHANGE CODE
                if(session()->has('AuthenticatedUserSelectedCities'))
                {
                        $data['cities[0]'] = session()->get('AuthenticatedUserSelectedCities');    
                }
                else
                {
                    foreach($userCities as $key => $c)
                    {
                        $data['cities['.$key.']'] = $c['city'];
                    }
                }

                // foreach($userCities as $key => $c)
                // {
                //     $data['cities['.$key.']'] = $c['city'];
                // }
                $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',$data);

                // NEW CODE -- START
                if($response->json() == null)
                {
                    // dd('yess');
                    $right = false;
                    while($right == false)
                    {
                        $response = Http::withToken($token);
                        $response = $response->get(''.config('path.path.WebPath').'api/user/getUserLocations');
                        $userCities = $response->json()['data'];
                        $data = ['limit' => 10000,
                        'page' => 1,
                        'returnType' => 'customPagination',
                        'lat' => $lat ,
                        'long' => $long,
                        'country' =>$country,
                        'category' => $category_to_show_on_block,
                        ];

                        //DROP DOWN CHANGE CODE
                        if(session()->has('AuthenticatedUserSelectedCities'))
                        {
                                $data['cities[0]'] = session()->get('AuthenticatedUserSelectedCities');    
                        }
                        else
                        {
                            foreach($userCities as $key => $c)
                            {
                                $data['cities['.$key.']'] = $c['city'];
                            }
                        }
                        // foreach($userCities as $key => $c)
                        // {
                        //     $data['cities['.$key.']'] = $c['city'];
                        // }
                        $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',$data);
                        if($response == null)
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

                // dd($response->json());
                $response = $response->json();
                if($response['status'] == true)
                {
                    $data = $response['data'];
                    foreach($data as $key => &$datum)
                    {
                        //NearBy Deal
                        $datum['nearby'] = 0;
                        $datum['nearbyBranch'] = 0;
                        $distances = [];
                        $firstDistanceArray = reset($datum['distance']);
                        foreach($datum['distance'] as $i => &$d)
                        {
                        
                            $datum['nearby'] = $firstDistanceArray['distance_in_km'];
                            $datum['nearbyBranch'] = $firstDistanceArray['branch_name'];

                            if($d['distance_in_km'] < $datum['nearby'])
                            {
                                $datum['nearby'] = $d['distance_in_km'];
                                $datum['nearbyBranch'] = $d['branch_name'];
                            }
                        }
                    }
                    // foreach($data as $key => &$datum)
                    // {
                    //     $datum['nearby'] = 0;
                    //     $datum['nearbyBranch'] = 0;
                    //     // dd($datum);
                    //     // dd($datum['distance'][$key]);

                    //     foreach($datum['distance'] as &$d)
                    //     {
                    //         // dd($d);
                    //         $datum['nearby'] = $d['distance_in_km'];
                    //         $datum['nearbyBranch'] = $d['branch_name'];
                    //         if($d['distance_in_km'] <= $datum['nearby'])
                    //         {
                    //             $datum['nearby'] = $d['distance_in_km'];
                    //             $datum['nearbyBranch'] = $d['branch_name'];
                    //         }
                    //     }
                    // }
                }
                // dd($data);
                
                $cats_in_block = $data;
            }
            else
            {
                $cats_in_block = Http::get(''.config('path.path.WebPath').'api/user/getDeals',[
                    'limit' => 4,
                    'page' => 1,
                    'category' => $category_to_show_on_block,
                    'returnType' => 'customPagination',
                    'timeSort' => 'desc',
                ])->json();
                // NEW CODE -- START
                if($cats_in_block == null)
                {
                    // dd('yess');
                    $right = false;
                    while($right == false)
                    {
                        $cats_in_block = Http::get(''.config('path.path.WebPath').'api/user/getDeals',[
                            'limit' => 4,
                            'page' => 1,
                            'category' => $category_to_show_on_block,
                            'returnType' => 'customPagination',
                            'timeSort' => 'desc',
                        ])->json();
                        if($cats_in_block == null)
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
                // dd($cats_in_block);
                $cats_in_block = $cats_in_block['data'];
            }
            // NEW------e







            // $cats_in_block = Http::get(''.config('path.path.WebPath').'api/user/getDeals',[
            //     'limit' => 4,
            //     'page' => 1,
            //     'returnType' => 'customPagination',
            //     'timeSort' => 'desc',
            // ])->json();

            
            // dd($cities);
            // foreach($cities['data'] as $ci)
            // {
            //     dd($ci);
            // }


            // RENDER HOME PAGE NOW
            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];
            //Trending Deals
            $response = Http::get(''.config('path.path.WebPath').'api/user/getTrendingDeals',[
                'limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',
                'cities[0]' => $request->city, 'country' => $request->country, 'lat' => $request->lat, 'long' => $request->long,
            ]);

            // dd($response->json());
            $trendingDeals = $response->json()['data'];

            foreach($trendingDeals as $key => &$datum)
            {
                //NearBy Deal
                $datum['nearby'] = 0;
                $datum['nearbyBranch'] = 0;
                $distances = [];
                $firstDistanceArray = reset($datum['distance']);
                foreach($datum['distance'] as $i => &$d)
                {
                
                    $datum['nearby'] = $firstDistanceArray['distance_in_km'];
                    $datum['nearbyBranch'] = $firstDistanceArray['branch_name'];

                    if($d['distance_in_km'] < $datum['nearby'])
                    {
                        $datum['nearby'] = $d['distance_in_km'];
                        $datum['nearbyBranch'] = $d['branch_name'];
                    }
                }
            }
            // foreach($trendingDeals as $key => &$datum)
            // {
            //     $datum['nearby'] = 0;
            //     $datum['nearbyBranch'] = 0;
            //     // dd(2);
            //     // dd($datum['distance'][$key]);

            //     foreach($datum['distance'] as &$d)
            //     {
            //         // dd($d);
            //         $datum['nearby'] = $d['distance_in_km'];
            //         $datum['nearbyBranch'] = $d['branch_name'];
            //         if($d['distance_in_km'] <= $datum['nearby'])
            //         {
            //             $datum['nearby'] = $d['distance_in_km'];
            //             $datum['nearbyBranch'] = $d['branch_name'];
            //         }
            //     }
            // }

            $TopSellers = $trendingDeals;


            //Array for data to show
            $cat_array = 
            [
                'couples' => 39,
                'men' => 1,
                'women' => 2,
                'kids' => 3,
                'family' => 40,
                'travel' => 41,
                'automobile' => 4,
                'cleaning' => 6,
            ];
            $notifications = null;
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
            }
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            // dd($cat_array['couples']);
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
            return view('user.index',compact('AuthUserCities','categories','CatBlockSection','cats_in_block','trendingDeals','TopSellers','cat_array','cities','categorySection','upperImageSection','lowerImageSection','footerImageSection','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
                // 'Message' => $response->json()['error'],
            ]);
        }
    }

    public function TrendingDealsSort(Request $request, $sort_type)           //TRENDING DEALS 
    {
        try
        {
            
            $UserType = '00';
            // dd($sortType);
            // dd($request);
            $loc_yes_no = false;
            //SETTING CITIES FOR UN AUTH
            $cities[] = [1,2,3];
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('unAuthUserLocations')['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
                // dd($cities);
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            // dd($cities);
            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];
            // dd($categories);








            $title = "TrendingDeals";
            $time_sort = 'N/A';
            $price_sort = 'asc';
            if($sort_type == 'priceAsc')
            {
                $price_sort = 'asc';
                $title = "Sort : Price Low to High";
            }
            if($sort_type == 'priceDesc')
            {
                $price_sort = 'desc';
                $title = "Sort : Price High to Low";
            }
            if($sort_type == 'dateAsc')
            {
                $time_sort = 'asc';
                $title = "Sort : Newest First";
            }
            if($sort_type == 'dateDesc')
            {
                $time_sort = 'desc';
                $title = "Sort : Oldest First";
            }

            if($sort_type == 'dateAsc' || $sort_type == 'dateDesc' )
            {
                if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                {
                    $UserType = 'User';

                    $lat = (float)session()->get('Authenticated_user_data')['userLocations'][0]['lat'];
                    $long = (float)session()->get('Authenticated_user_data')['userLocations'][0]['long'];
                    $city = session()->get('Authenticated_user_data')['userLocations'][0]['city'];
                    $country = session()->get('Authenticated_user_data')['userLocations'][0]['country'];

                    $token = session()->get('Authenticated_user_data')['token'];
                    $response = Http::withToken($token);
                    $response = $response->get(''.config('path.path.WebPath').'api/user/getUserLocations');
                    $userCities = $response->json()['data'];
                    $data = ['limit' => 10000,
                    'page' => 1,
                    'returnType' => 'customPagination',
                    'lat' => $lat ,
                    'long' => $long,
                    'timeSort' => $time_sort,
                    'country' =>$country];

                    foreach($userCities as $key => $c)
                    {
                        $data['cities['.$key.']'] = $c['city'];
                    }
                    $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',$data);

                    // dd(session()->get('Authenticated_user_data')['userLocations'][0]);
                    // $lat = (float)session()->get('Authenticated_user_data')['userLocations'][0]['lat'];
                    // $long = (float)session()->get('Authenticated_user_data')['userLocations'][0]['long'];
                    // $city = session()->get('Authenticated_user_data')['userLocations'][0]['city'];
                    // $country = session()->get('Authenticated_user_data')['userLocations'][0]['country'];
                    // // dd(session()->get('Authenticated_user_data')['userLocations'][0]);
                    // // dd($lat);
                    // $response = Http::get(''.config('path.path.WebPath').'api/user/getTrendingDeals',[
                    //     'limit' => 10000,
                    //     'page' => 1,
                    //     'returnType' => 'customPagination',
                    //     'lat' => $lat ,
                    //     'long' => $long,
                    //     'city' => $city,
                    //     'country' =>$country,
                    //     // 'priceSort' => $price_sort,
                    //     'timeSort' => $time_sort,
                    // ]);
                    // dd($response->json());
                    $loc_yes_no = true;
            
                }
                elseif( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
                {
                    $UserType = 'LocationUser';
                    $response = Http::get(''.config('path.path.WebPath').'api/user/getTrendingDeals',[
                        'limit' => 10000,
                        'page' => 1,
                        'returnType' => 'customPagination',
                        'lat' => (float)session()->get('unAuthUserLocations')['lat'] ,
                        'long' => (float)session()->get('unAuthUserLocations')['long'],
                        'cities[0]' => session()->get('unAuthUserLocations')['city'],
                        'country' =>session()->get('unAuthUserLocations')['country'],
                        // 'priceSort' => $price_sort,
                        'timeSort' => $time_sort,
                    ]);
                    $loc_yes_no = true;
                }
                else
                {
                    $response = Http::get(''.config('path.path.WebPath').'api/user/getDeals',[
                        'limit' => 10000,
                        'page' => 1,
                        'returnType' => 'customPagination',
                        // 'priceSort' => $price_sort,
                        'timeSort' => $time_sort,
                    ]);
                    // $offers_fetched = $response->json();
                    // dd($offers_fetched);
                   
                }
            }
            elseif($sort_type == 'priceAsc' || $sort_type == 'priceDesc')
            {
                if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                {
                    $UserType = 'User';
                    $lat = (float)session()->get('Authenticated_user_data')['userLocations'][0]['lat'];
                    $long = (float)session()->get('Authenticated_user_data')['userLocations'][0]['long'];
                    $city = session()->get('Authenticated_user_data')['userLocations'][0]['city'];
                    $country = session()->get('Authenticated_user_data')['userLocations'][0]['country'];

                    $token = session()->get('Authenticated_user_data')['token'];
                    $response = Http::withToken($token);
                    $response = $response->get(''.config('path.path.WebPath').'api/user/getUserLocations');
                    $userCities = $response->json()['data'];
                    $data = ['limit' => 10000,
                    'page' => 1,
                    'returnType' => 'customPagination',
                    'lat' => $lat ,
                    'long' => $long,
                    'priceSort' => $price_sort,
                    'country' =>$country];

                        //DROP DOWN CHANGE CODE
                    if(session()->has('AuthenticatedUserSelectedCities'))
                    {
                            $data['cities[0]'] = session()->get('AuthenticatedUserSelectedCities');    
                    }
                    else
                    {
                        foreach($userCities as $key => $c)
                        {
                            $data['cities['.$key.']'] = $c['city'];
                        }
                    }

                    // foreach($userCities as $key => $c)
                    // {
                    //     $data['cities['.$key.']'] = $c['city'];
                    // }
                    $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',$data);

                    $loc_yes_no = true;
            
                }
                elseif( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
                {
                    $UserType = 'LocationUser';
                    $response = Http::get(''.config('path.path.WebPath').'api/user/getTrendingDeals',[
                        'limit' => 10000,
                        'page' => 1,
                        'returnType' => 'customPagination',
                        'lat' => (float)session()->get('unAuthUserLocations')['lat'] ,
                        'long' => (float)session()->get('unAuthUserLocations')['long'],
                        'cities[0]' => session()->get('unAuthUserLocations')['city'],
                        'country' =>session()->get('unAuthUserLocations')['country'],
                        'priceSort' => $price_sort,
                        // 'timeSort' => $time_sort,
                    ]);
                    $loc_yes_no = true;
                }
                else
                {
                    $response = Http::get(''.config('path.path.WebPath').'api/user/getTrendingDeals',[
                        'limit' => 10000,
                        'page' => 1,
                        'returnType' => 'customPagination',
                        'priceSort' => $price_sort,
                        // 'timeSort' => $time_sort,
                    ]);
                    // $offers_fetched = $response->json();
                    // dd($offers_fetched);
                   
                }
            }
            else
            {
                $response = Http::get(''.config('path.path.WebPath').'api/user/getTrendingDeals',[
                    'limit' => 10000,
                    'page' => 1,
                    'returnType' => 'customPagination',
                    // 'priceSort' => $price_sort,
                    // 'timeSort' => $time_sort,
                ]);
            }


            

            // dd($response);

            // if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            // {
                $UserType = 'LocationUser';
            //     $response = Http::get(''.config('path.path.WebPath').'api/user/getTrendingDeals',[
            //         'lat' => session()->get('unAuthUserLocations')['lat'],
            //         'long' =>session()->get('unAuthUserLocations')['long'],
            //         'city' =>session()->get('unAuthUserLocations')['city'],
            //         'country' =>session()->get('unAuthUserLocations')['country'],

            //     ]);
            //     $trendingDeals = $response->json();
            // }
            // elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            // {
                $UserType = 'User';
            //     $response = Http::get(''.config('path.path.WebPath').'api/user/getTrendingDeals',[
            //         'lat' => session()->get('Authenticated_user_data')['userLocations'][0]['lat'],
            //         'long' =>session()->get('Authenticated_user_data')['userLocations'][0]['long'],
            //         'city' =>session()->get('Authenticated_user_data')['userLocations'][0]['city'],
            //         'country' =>session()->get('Authenticated_user_data')['userLocations'][0]['country'],

            //     ]);

                
            //     $trendingDeals = $response->json();
            // }
            // elseif(!session()->has('Authenticated_user_data') && !session()->has('unAuthUserLocations'))
            // {
            //     $response = Http::get(''.config('path.path.WebPath').'api/user/getTrendingDeals');
            //     $trendingDeals = $response->json();
            // }

            // dd($trendingDeals);

            $trendingDeals = $response['data'];
            // dd($trendingDeals);
            if($loc_yes_no)
            {
                foreach($trendingDeals as $key => &$datum)
                {
                    //NearBy Deal
                    $datum['nearby'] = 0;
                    $datum['nearbyBranch'] = 0;
                    $distances = [];
                    $firstDistanceArray = reset($datum['distance']);
                    foreach($datum['distance'] as $i => &$d)
                    {
                    
                        $datum['nearby'] = $firstDistanceArray['distance_in_km'];
                        $datum['nearbyBranch'] = $firstDistanceArray['branch_name'];

                        if($d['distance_in_km'] < $datum['nearby'])
                        {
                            $datum['nearby'] = $d['distance_in_km'];
                            $datum['nearbyBranch'] = $d['branch_name'];
                        }
                    }
                }
                // foreach($trendingDeals as $key => &$datum)
                // {
                //     $datum['nearby'] = 0;
                //     $datum['nearbyBranch'] = 0;
                //     // dd($datum);
                //     // dd($datum['distance'][$key]);
    
                //     foreach($datum['distance'] as &$d)
                //     {
                //         // dd($d);
                //         $datum['nearby'] = $d['distance_in_km'];
                //         $datum['nearbyBranch'] = $d['branch_name'];
                //         if($d['distance_in_km'] <= $datum['nearby'])
                //         {
                //             $datum['nearby'] = $d['distance_in_km'];
                //             $datum['nearbyBranch'] = $d['branch_name'];
                //         }
                //     }
                // }
            }
            
            // dd($trendingDeals);
            $deals = $this->paginate($trendingDeals);
            // dd($deals);
            $what_page = 'TrendingDeals';
            $title = "Trending Deals";
            $notifications = null;
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
            return view('user.categories', compact('AuthUserCities','deals','categories','title','cities','what_page','notifications','UserType'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
                // 'Message' => $response->json()['error'],
            ]);
        }
    }


    public function TrendingDealsSeeMore(Request $request)           //TRENDING DEALS 
    {
        try
        {
            $UserType = '00';
            // dd($request);
            //SETTING CITIES FOR UN AUTH
            $cities[] = [1,2,3];
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('unAuthUserLocations')['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
                // dd($cities);
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            // dd($cities);
            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];
            // dd($categories);

            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                // dd(2);
                $response = Http::get(''.config('path.path.WebPath').'api/user/getTrendingDeals',[
                    'limit' => 10000,
                    'page' => 1,
                    'returnType' => 'customPagination',
                    'lat' => session()->get('unAuthUserLocations')['lat'],
                    'long' =>session()->get('unAuthUserLocations')['long'],
                    'cities[0]' =>session()->get('unAuthUserLocations')['city'],
                    'country' =>session()->get('unAuthUserLocations')['country'],

                ]);
                $trendingDeals = $response->json();
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                // dd(1);
                $lat = (float)session()->get('Authenticated_user_data')['userLocations'][0]['lat'];
                $long = (float)session()->get('Authenticated_user_data')['userLocations'][0]['long'];
                $city = session()->get('Authenticated_user_data')['userLocations'][0]['city'];
                $country = session()->get('Authenticated_user_data')['userLocations'][0]['country'];

                $token = session()->get('Authenticated_user_data')['token'];
                // dd($token);
                $response = Http::withToken($token);
                $response = $response->get(''.config('path.path.WebPath').'api/user/getUserLocations');
                $userCities = $response->json()['data'];
                $data = [
                 'limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',
                'lat' => $lat ,
                'long' => $long,
                'country' =>$country];

                    //DROP DOWN CHANGE CODE
                    if(session()->has('AuthenticatedUserSelectedCities'))
                    {
                            $data['cities[0]'] = session()->get('AuthenticatedUserSelectedCities');    
                    }
                    else
                    {
                        foreach($userCities as $key => $c)
                        {
                            $data['cities['.$key.']'] = $c['city'];
                        }
                    }

                // foreach($userCities as $key => $c)
                // {
                //     $data['cities['.$key.']'] = $c['city'];
                // }
                // dd($data);
                $response = Http::get(''.config('path.path.WebPath').'api/user/getTrendingDeals',$data);
                // dd($response->json());
                // $response = Http::get(''.config('path.path.WebPath').'api/user/getTrendingDeals',[
                //     'lat' => session()->get('Authenticated_user_data')['userLocations'][0]['lat'],
                //     'long' =>session()->get('Authenticated_user_data')['userLocations'][0]['long'],
                //     'city' =>session()->get('Authenticated_user_data')['userLocations'][0]['city'],
                //     'country' =>session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                // ]);
                // dd($response->json());
                
                $trendingDeals = $response->json();
            }
            elseif(!session()->has('Authenticated_user_data') && !session()->has('unAuthUserLocations'))
            {
                // dd();
                $response = Http::get(''.config('path.path.WebPath').'api/user/getTrendingDeals',['limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',]);
                $trendingDeals = $response->json();
            }

            // dd($trendingDeals);

            $trendingDeals = $trendingDeals['data'];
            foreach($trendingDeals as $key => &$datum)
            {
                //NearBy Deal
                $datum['nearby'] = 0;
                $datum['nearbyBranch'] = 0;
                $distances = [];
                $firstDistanceArray = reset($datum['distance']);
                foreach($datum['distance'] as $i => &$d)
                {
                
                    $datum['nearby'] = $firstDistanceArray['distance_in_km'];
                    $datum['nearbyBranch'] = $firstDistanceArray['branch_name'];
    
                    if($d['distance_in_km'] < $datum['nearby'])
                    {
                        $datum['nearby'] = $d['distance_in_km'];
                        $datum['nearbyBranch'] = $d['branch_name'];
                    }
                }
            }
            // foreach($trendingDeals as $key => &$datum)
            // {
            //     $datum['nearby'] = 0;
            //     $datum['nearbyBranch'] = 0;
            //     // dd($datum);
            //     // dd($datum['distance'][$key]);

            //     foreach($datum['distance'] as &$d)
            //     {
            //         // dd($d);
            //         $datum['nearby'] = $d['distance_in_km'];
            //         $datum['nearbyBranch'] = $d['branch_name'];
            //         if($d['distance_in_km'] <= $datum['nearby'])
            //         {
            //             $datum['nearby'] = $d['distance_in_km'];
            //             $datum['nearbyBranch'] = $d['branch_name'];
            //         }
            //     }
            // }
            $deals = $this->paginate($trendingDeals);
            // dd(key($deals));

  



            $what_page = 'TrendingDeals';
            $title = "Trending Deals";
            $notifications = null;
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
            }
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
            return view('user.categories', compact('AuthUserCities','deals','categories','title','cities','what_page','notifications','UserType'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
                // 'Message' => $response->json()['error'],
            ]);
        }
    }

    
    public function purchaseDealsFromCart()
    {
        try
        {
            //Preparing Data
            $session_data = session()->get('cart_info');
            // dd($session_data);
            if($session_data == NULL || !$session_data )
            {
                return redirect()->route('cart')->with('alert','Slow down! You have nothing in your cart!');
            }
            foreach($session_data as $key => $datum)
            {
                // dd();
                $addition_discount = (int)$datum['deal_array']['additional_discount'];
                // dd($addition_discount);

                if($addition_discount == 0 && $datum['deal_array']['additional_discount_date'] == null)
                {
                    // dd($datum);
                    // IF ADDITIONAL DISCOUNT IS 0.. it doesn't matter if additional_discount_expiry is reached or not.
                    $price_to_charge = $datum['price'] - (  $datum['price'] * ($datum['deal_array']['discount_on_price']/100));
                    $data['deals'][] = [
                        'deal_id' => $datum['deal_id'],
                        // 'quantity' => $datum['quantity'],
                        'original_price' => $datum['price'],
                        'discount_percentage' => $datum['deal_array']['discount_on_price'],
                        'price_to_charge' => $price_to_charge,
                        'double_discount_applied' => 'No'
                    ];
                }
                else
                {
                    $now = Carbon::now();
                    $createdAt = Carbon::parse($datum['deal_array']['additional_discount_date']);
                    $result = $now->lt($createdAt);
                    if($result) //Hence, deal is Still Valid
                    {
                        $price_to_charge = $datum['price'] - (  $datum['price'] * ($addition_discount/100));
                        $data['deals'][] = [
                            'deal_id' => $datum['deal_id'],
                            // 'quantity' => $datum['quantity'],
                            'original_price' => $datum['price'],
                            'discount_percentage' => $datum['deal_array']['additional_discount'],
                            'price_to_charge' => $price_to_charge,
                            'double_discount_applied' => 'Yes'
                        ];
                    }
                    else    //Hence Deal is EXPIRED
                    {
                        $price_to_charge = $datum['price'] - (  $datum['price'] * ($datum['deal_array']['discount_on_price']/100));
                        $data['deals'][] = [
                            'deal_id' => $datum['deal_id'],
                            // 'quantity' => $datum['quantity'],
                            'original_price' => $datum['price'],
                            'discount_percentage' => $datum['deal_array']['discount_on_price'],
                            'price_to_charge' => $price_to_charge,
                            'double_discount_applied' => 'No'
                        ];
                    }

                }
            }
            foreach($data['deals'] as $key => $datum)
            {
                $sendData['deals'][] = [
                    'id' => $datum['deal_id'],
                    'quantity' => 1,
                    'price' => $datum['original_price'],
                    'discount' => $datum['discount_percentage'],
                    'total_price' => $datum['price_to_charge'],
                ];
            }
            // dd($sendData);
            //Sending Request
            $token = session()->get('Authenticated_user_data')['token'];
            // dd($token);
            $url = ''.config('path.path.WebPath').'api/user/purchaseDeal';
            // dd($sendData);
            $response = Http::withToken($token)->post( $url , $sendData);

            // dd($response->json());

            if (array_key_exists("error",$response->json()))
            {
                return redirect()->back()->with('alert',$response->json()['message']);
            }



            //  HERE REMOVE CART SESSION
            session()->forget('cart_info');

            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }

            return redirect()->route('cart')->with('success','Deals Purchased Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function userSearchText(Request $request)
    {
        try
        {
            $UserType = '00';
            // dd($request['query']);
            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];
            // dd($categories);

            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';

                $lat = (float)session()->get('Authenticated_user_data')['userLocations'][0]['lat'];
                $long = (float)session()->get('Authenticated_user_data')['userLocations'][0]['long'];
                $city = session()->get('Authenticated_user_data')['userLocations'][0]['city'];
                $country = session()->get('Authenticated_user_data')['userLocations'][0]['country'];

                $token = session()->get('Authenticated_user_data')['token'];
                $response = Http::withToken($token);
                $response = $response->get(''.config('path.path.WebPath').'api/user/getUserLocations');
                $userCities = $response->json()['data'];
                $data = ['limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',
                'lat' => $lat ,
                'long' => $long,
                'searchText' => $request['query'],
                'country' =>$country];

                    //DROP DOWN CHANGE CODE
                    if(session()->has('AuthenticatedUserSelectedCities'))
                    {
                            $data['cities[0]'] = session()->get('AuthenticatedUserSelectedCities');    
                    }
                    else
                    {
                        foreach($userCities as $key => $c)
                        {
                            $data['cities['.$key.']'] = $c['city'];
                        }
                    }
                $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',$data);
                if($response->json()['status'] == true)
                {
                    $data = $response->json()['data'];
                    foreach($data as $key => &$datum)
                    {
                        //NearBy Deal
                        $datum['nearby'] = 0;
                        $datum['nearbyBranch'] = 0;
                        $distances = [];
                        $firstDistanceArray = reset($datum['distance']);
                        foreach($datum['distance'] as $i => &$d)
                        {
                        
                            $datum['nearby'] = $firstDistanceArray['distance_in_km'];
                            $datum['nearbyBranch'] = $firstDistanceArray['branch_name'];
            
                            if($d['distance_in_km'] < $datum['nearby'])
                            {
                                $datum['nearby'] = $d['distance_in_km'];
                                $datum['nearbyBranch'] = $d['branch_name'];
                            }
                        }
                    }
                }
                $deals = $this->paginate($data);
            }
            elseif( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',[
                    'limit' => 10000,
                    'page' => 1,
                    'returnType' => 'customPagination',
                    'lat' => (float)session()->get('unAuthUserLocations')['lat'] ,
                    'long' => (float)session()->get('unAuthUserLocations')['long'],
                    'cities[0]' => session()->get('unAuthUserLocations')['city'],
                    'country' =>session()->get('unAuthUserLocations')['country'],
                    'searchText' => $request['query']
                ]);

                if($response->json()['status'] == true)
                {
                    $data = $response->json()['data'];
                    foreach($data as $key => &$datum)
                    {
                        //NearBy Deal
                        $datum['nearby'] = 0;
                        $datum['nearbyBranch'] = 0;
                        $distances = [];
                        $firstDistanceArray = reset($datum['distance']);
                        foreach($datum['distance'] as $i => &$d)
                        {
                        
                            $datum['nearby'] = $firstDistanceArray['distance_in_km'];
                            $datum['nearbyBranch'] = $firstDistanceArray['branch_name'];
            
                            if($d['distance_in_km'] < $datum['nearby'])
                            {
                                $datum['nearby'] = $d['distance_in_km'];
                                $datum['nearbyBranch'] = $d['branch_name'];
                            }
                        }
                    }
                    // foreach($data as $key => &$datum)
                    // {
                    //     $datum['nearby'] = 0;
                    //     $datum['nearbyBranch'] = 0;
                    //     // dd($datum);
                    //     // dd($datum['distance'][$key]);

                    //     foreach($datum['distance'] as &$d)
                    //     {
                    //         // dd($d);
                    //         $datum['nearby'] = $d['distance_in_km'];
                    //         $datum['nearbyBranch'] = $d['branch_name'];
                    //         if($d['distance_in_km'] <= $datum['nearby'])
                    //         {
                    //             $datum['nearby'] = $d['distance_in_km'];
                    //             $datum['nearbyBranch'] = $d['branch_name'];
                    //         }
                    //     }
                    // }
                }
                // dd($smallest);
                // dd($data);
                // $offers_fetched = $response->json()['data'];
                // dd($offers_fetched);
                $deals = $this->paginate($data);

            }
            else
            {
                $response = Http::get(''.config('path.path.WebPath').'api/user/getDeals',[
                    'limit' => 10000,
                    'page' => 1,
                    'returnType' => 'customPagination',
                    'searchText' => $request['query']
                ]);
                $offers_fetched = $response->json()['data'];
                // dd($offers_fetched);
                $deals = $this->paginate($offers_fetched);
            }

            // dd($deals);

            // dd($response->json());
            $title = "Search Results For : ".$request['query']."";

            //SETTING CITIES FOR UN AUTH
            $cities[] = 0;
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('unAuthUserLocations')['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }

            // dd($categories);
            // $offers_fetched = $response->json()['data'];
            // $deals = $this->paginate($offers_fetched);
            // dd($deals);
            $what_page = 'SearchDeals';
            $notifications = null;
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
            }
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
            return view('user.categories', compact('AuthUserCities','deals','categories','title','cities','what_page','notifications','UserType'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function userRefreshConvoList()
    {
        $token = session('Authenticated_user_data')['token'];
        // return $token;
        $response = Http::withToken($token);
        $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
        $conversations = $response->json()['data'];

        $html = '<ul class="ul_chatList" style="" id="ul_chatList_to_refresh">';


        foreach ($conversations as $c)
        {
            // if($c['last_message']['seen'] == 0)
            // return $c['opposite_user']['id'];
            // if($c['last_message']['seen'] == 0 && $c['opposite_user']['id'] != session('Authenticated_user_data')['id'] )
            // {
            //     $html .= '<li class="convo_list_item" data-id="'.$c['id'].'">
            //     <img src="https://c.neh.tw/thumb/f/720/m2H7K9A0b1d3b1m2.jpg" alt="" width="50px">
            //     <div>
            //         <h2>'.$c['opposite_user']['name'].'</h2>
            //         <h3>
            //            UNSEEN '.substr($c['last_message']['message'], 0 ,18).'...
            //         </h3>
            //     </div>
            //     </li>';
            // }
            // else
            // {
                $html .= '<li class="convo_list_item" data-id="'.$c['id'].'"> ';
                // return $c['opposite_user'];

                // $html .= ' <img src="https://c.neh.tw/thumb/f/720/m2H7K9A0b1d3b1m2.jpg" alt="" width="50px"> ';
                if($c['opposite_user']['profile_picture'] == null)
                {
                    $html .= ' <img src="https://c.neh.tw/thumb/f/720/m2H7K9A0b1d3b1m2.jpg" alt="" width="50px"> ';
                }
                else
                {
                    $html .= ' <img src="'.config('path.path.WebPath').''.config('path.path.UserPath').'/'.$c['opposite_user']['profile_picture'].'" alt="" width="50px"> ';

                }


                $html .= ' <div>
                    <h2>'.$c['opposite_user']['name'].'</h2>
                    <h3>
                        '.substr($c['last_message']['message'], 0 ,18).'...
                    </h3>
                </div>
                </li>';
            // }
            
        }
    
        $html .= ' </ul>';
        echo $html;
    }

    public function chatWithMerchant($Target_id)
    {
        //SETTING CITIES FOR UN AUTH
        $cities[] = 0;
        if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
        {
            $UserType = 'LocationUser';
            $session_data = session()->get('unAuthUserLocations');
            $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                'country' => session()->get('unAuthUserLocations')['country'],
            ]);
            // dd($request->country);
            $cities = $response->json();
        }
        elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
        {
            $UserType = 'User';
            $session_data = session()->get('unAuthUserLocations');
            $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
            ]);
            // dd($request->country);
            $cities = $response->json();
        }

        // dd($id);
        $token = session('Authenticated_user_data')['token'];
        $id = session('Authenticated_user_data')['id'];
        $response = Http::withToken($token);
        $response = $response->post(''.config('path.path.WebPath').'api/createConversation',
        [ 'message' => 'Hello' , 'receiver' => $Target_id] );
        $conversation = $response->json()['data'];

        // dd($conversation['id']);
        $convo_id = $conversation['id'];

        if($conversation)
        {
            //Get Conversation
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversation/'.$convo_id.'');
            $conversation = $response->json()['data'];
            // dd($conversation);
            //Get Conversation Messages
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversationMessages/'.$convo_id.'');
            $messages = $response->json()['data'];
            //All Conversations to show
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];
            //Categories on Top
            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];
            //Indication that coming from discountDetail Page.
            $auto_open_chat = 1;
            $notifications = null;
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
                // dd($notifications);
            }
            // dd($notifications);

            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";

            return view('user.userChat', compact('AuthUserCities','categories','conversations','messages','conversation','token','id','auto_open_chat','notifications'));
        }
        return 0;
    }

    public function chatWithAdmin($Target_id)
    {
        //SETTING CITIES FOR UN AUTH
        $cities[] = 0;
        if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
        {
            $UserType = 'LocationUser';
            $session_data = session()->get('unAuthUserLocations');
            $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                'country' => session()->get('unAuthUserLocations')['country'],
            ]);
            // dd($request->country);
            $cities = $response->json();
        }
        elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
        {
            $UserType = 'User';
            $session_data = session()->get('unAuthUserLocations');
            $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
            ]);
            // dd($request->country);
            $cities = $response->json();
        }

        // dd($id);
        $token = session('Authenticated_user_data')['token'];
        $id = session('Authenticated_user_data')['id'];
        $response = Http::withToken($token);
        $response = $response->post(''.config('path.path.WebPath').'api/createConversation',
        [ 'message' => 'Hello' , 'receiver' => $Target_id] );
        $conversation = $response->json()['data'];

        // dd($conversation['id']);
        $convo_id = $conversation['id'];

        if($conversation)
        {
            //Get Conversation
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversation/'.$convo_id.'');
            $conversation = $response->json()['data'];
            // dd($conversation);
            //Get Conversation Messages
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversationMessages/'.$convo_id.'');
            $messages = $response->json()['data'];
            //All Conversations to show
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];
            //Categories on Top
            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];
            //Indication that coming from discountDetail Page.
            $auto_open_chat = 1;
            $notifications = null;
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
                // dd($notifications);
            }
            // dd($notifications);

            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";

            return view('user.userChat', compact('AuthUserCities','categories','conversations','messages','conversation','token','id','auto_open_chat','notifications'));
        }
        return 0;
    }


    public function send_message_to_convo(Request $request)
    {
        // dd($request);
        // STORE IN DB
        $token = session('Authenticated_user_data')['token'];
        $response = Http::withToken($token);
        $response = $response->post(''.config('path.path.WebPath').'api/sendMessage/'.$request->convo_id.'',
        [ 'message' => $request->message ] );
        $conversation = $response->json()['data'];

        // broadcast(new SendMessage($request->convo_id,$request->sender_id,$request->receiver_id,$request->message)); 

        return 1;
    }

    public function loadConvo(Request $request)
    {
        $id = $request->convo_id;
        $user_id = session('Authenticated_user_data')['id'];

        // $id = 1;
        $token = session('Authenticated_user_data')['token'];
        $response = Http::withToken($token);
        $response = $response->get(''.config('path.path.WebPath').'api/getConversation/'.$id.'');
        $conversation = $response->json()['data'];

        $token = session('Authenticated_user_data')['token'];
        $response = Http::withToken($token);
        $response = $response->get(''.config('path.path.WebPath').'api/getConversationMessages/'.$id.'');
        $messages = $response->json()['data'];
        // return $id;
        $html = '
            <header id="header_chatbox">
                <div style="margin:0; margin-left: -25px; margin-right: 13px;">
                    <button style="color: rgb(0, 0, 0)" class="toggle_button_to_msgbox"> 
                        <i class="fa fa-arrow-circle-left" style="font-size:24px"></i>
                    </button>
                </div> ';

        if($conversation['opposite_user']['profile_picture'] == null)
        {
            $html .= ' <img src="https://c.neh.tw/thumb/f/720/m2H7K9A0b1d3b1m2.jpg" width="50px" alt=""> ';
        }
        else
        {
            $html .= ' <img src="'.config('path.path.WebPath').''.config('path.path.UserPath').'/'.$conversation['opposite_user']['profile_picture'].'" width="50px" alt=""> ';
        }

        // return $conversation['opposite_user']['profile_picture'];

        // $html = ' <img src="'.config('path.path.WebPath').''.config('path.path.BranchesPath').'/'.$conversation['opposite_user']['profile_picture'].'" style="width:50px;" width="50px" alt=""> ';


        $html .= ' <div class="intro_div">
                    <h2>Chat with '.$conversation['opposite_user']['name'].'</h2>
                    <h3>already '.count($messages).' messages</h3>
                </div>
            </header>

            <ul id="chat" style="display: flex;
                flex-direction: column-reverse;">';


            $html .= '
            <div id="new_msgs_be_here" >

            </div>
            ';

            $count = count($messages);

            for($i = $count-1; $i >= 0; $i--)
            { 
                if($messages[$i]['user_id'] == $user_id)
                {
                    // $date = Carbon\Carbon::parse($messages[$i]['created_at'])->isoFormat('dddd, h:mm A');
                    $date = Carbon::parse($messages[$i]['created_at'], 'UTC');
                    $date = $date->isoFormat('dddd, h:mm A');
                    $html .= '
                    <li class="me">
                        <div class="entete">
                            <h3>'.$date.'</h3>
                        </div>
                        <div class="message">
                            '.$messages[$i]['message'].'
                        </div>
                    </li>
                    ';
                }
                else
                {
                    // Carbon\Carbon::parse($messages[$i]['created_at'])->isoFormat('dddd, h:mm A');
                    $date = Carbon::parse($messages[$i]['created_at'], 'UTC');
                    $date = $date->isoFormat('dddd, h:mm A');
                    $html .= '
                    <li class="you">
                        <div class="entete">
                            <h3>'.$date.'</h3>
                        </div>
                        <div class="message">
                            '.$messages[$i]['message'].'
                        </div>
                    </li>
                    ';
                }

                
            }

            if($conversation['first_user'] == $user_id) // If I am first User
            {
                $receiver_id = $conversation['second_user'];
            }
            else
            {
                $receiver_id = $conversation['first_user'];
            }


            $html .=' </ul>
            <footer>
                    <form id="message_form_loaded">
                        <textarea name="message" id="message" placeholder="Type your message"></textarea>
                        <div style="text-align: center;">

                            <input type="hidden" id="convo_id" name="convo_id" value="'.$conversation['id'].'">
                            <input type="hidden" id="rec_id" name="rec_id" value="'.$receiver_id.'">
                            <input type="hidden" id="my_id" name="my_id" value="'.$user_id.'">


                            <button class="btn btn-primary send_button" type="button">Send</button>
                        </div>
                    </form>
            </footer>';

            
        echo $html;
    }


    public function userChat()
    {
        try
        {

            //SETTING CITIES FOR UN AUTH
            $cities[] = 0;
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('unAuthUserLocations')['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }

            // $id = 1;
            // $token = session('Authenticated_user_data')['token'];
            // $response = Http::withToken($token);
            // $response = $response->get(''.config('path.path.WebPath').'api/getConversationMessages/'.$id.'');
            // $response = $response->get(''.config('path.path.WebPath').'api/getConversation/1');
            // $conversation = $response->json()['data'];
            // $conversation = Http::get(''.config('path.path.WebPath').'api/getConversation/1');
            // dd($conversation);

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];
            // dd($conversations);
            // dd($conversations);
            // dd(1);
            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];

            $id = session('Authenticated_user_data')['id'];
            // dd($id);
            // dd($categories);
            $notifications = null;
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
            }
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";

            $auto_open_chat = 0;
            
            return view('user.userChat', compact('AuthUserCities','categories','conversations','token','id','auto_open_chat','cities','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function Wishlist()
    {
        try
        {
            //SETTING CITIES FOR UN AUTH
            $cities[] = 0;
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('unAuthUserLocations')['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/user/getWishlist');
            $wishlistItems = $response->json()['data'];
            // dd($response);
            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];
            $notifications = null;
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
            }
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
            return view('user.wishlist' , compact('AuthUserCities','wishlistItems','categories','cities','notifications'));
        } catch (\Exception $e) {
            if (array_key_exists("error",$response->json()))
            {
                return redirect()->back()->with('alert',$response['error']);
            }
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function add_to_wishlist($id)
    {
        // return $id;
        // $data['deals[0]'] = $id;
        // $deals['deals[0]'] = $id;
        $data['deals'][0] = $id;
        // dd($data);
        $token = session('Authenticated_user_data')['token'];
        $response = Http::withToken($token);
        $response = $response->post(''.config('path.path.WebPath').'api/user/addToWishlist', $data);
        $response = $response->json();

        if (array_key_exists("error",$response))
        {
            return redirect()->back()->with('alert',$response['error']);
        }

        // dd($response);
        if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
        return redirect()->back()->with('success', 'Wishlist Updated!');
    }

    public function delete_from_wishlist($id)
    {
        // dd($id);
        $token = session('Authenticated_user_data')['token'];
        $response = Http::withToken($token);
        $response = $response->post(''.config('path.path.WebPath').'api/user/deleteFromWishlist/'.$id.'');
        $response = $response->json();
        // dd($response);
        if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
        return redirect()->back()->with('success', 'Wishlist Updated!');
    }

    public function setPreferences(Request $request)
    {
        try
        {
            // dd($request);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->post(''.config('path.path.WebPath').'api/user/updatePreference', $request->all());
            $response = $response->json();
            if($response['message'] == "success")
            {
                if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                {
                    $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
                }

                return redirect()->back()->with('success', 'Preferences Updated!');
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
            ]);
        }
    }

    public function UpdatePreferences(Request $request)
    {
        try
        {
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->post(''.config('path.path.WebPath').'api/user/updatePassword', $request->all());
            $response = $response->json();
            
            if($response['message'] == "success")
            {
                if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                {
                    $UserType = 'User';
                    $token = session('Authenticated_user_data')['token'];
                    $id = session('Authenticated_user_data')['id'];
                    echo "<script>";
                    echo "var bearer_token = `". $token ."` ;";
                    echo "var id = `". $id ."` ;";
                    echo "</script>";
                }
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
            ]);
        }
    }

    public function changePasswordConfirm(Request $request)
    {
        try
        {
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->post(''.config('path.path.WebPath').'api/user/updatePassword', $request->all());
            $response = $response->json();
            if($response['message'] == "success")
            {
                if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                {
                    $UserType = 'User';
                    $token = session('Authenticated_user_data')['token'];
                    $id = session('Authenticated_user_data')['id'];
                    echo "<script>";
                    echo "var bearer_token = `". $token ."` ;";
                    echo "var id = `". $id ."` ;";
                    echo "</script>";
                }
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

    public function myprofile()
    {
        // try 
        // {
            // dd(session()->get('Authenticated_user_data'));
            $token = session()->get('Authenticated_user_data')['token'];
            $Usercities = [];
            $locations = Http::withToken($token)->get(''.config('path.path.WebPath').'api/user/getUserLocations')->json()['data'];

            // $CitiesOfUser = [];
            // foreach($locations as $L)
            // {
            //     $CitiesOfUser[] = $L['cityId'];
            // }
            // dd($CitiesOfUser);
            // dd($locations);
            // foreach($locations as $L)
            // {
            //     // dd($L);
            //     if((int)$L['lat'] == 0 && (int)$L['long'] == 0)
            //     {
            //         $primary_city = $L['city'];
            //     }
            //     $Usercities[] = $L['city'];
            // }

            $url = ''.config('path.path.WebPath').'api/getAllLanguages';
            $languages = Http::get($url)->json()['data'];

            $url = ''.config('path.path.WebPath').'api/getCountries';
            $countries = Http::get($url)->json()['data'];

            $url = ''.config('path.path.WebPath').'api/getCityByCountryID?id='.$locations[0]['countryId'].'';
            $CitiesOfUsersCountry = Http::get($url)->json()['data'];

            

            // dd($CitiesOfUsersCountry);
            // dd($primary_location);

            //SETTING CITIES FOR UN AUTH
            $cities[] = 0;
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('unAuthUserLocations')['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }

            
            $url = ''.config('path.path.WebPath').'api/user/getCustomerPurchasedDeals';
            $purchasedDeals = Http::withToken($token)->get($url,[
                'limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',
                'timeSort' => 'desc',
            ])->json()['data'];

                // dd($purchasedDeals);

            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];

            $url = ''.config('path.path.WebPath').'api/getTrendingCategories';
            $Trendingcategories = Http::get($url)->json()['data'];
            // dd($categories);
            $url = ''.config('path.path.WebPath').'api/user/getCurrentUser';
            $profile = Http::withToken($token)->get($url)->json()['data'];
            // dd($profile['perference']);

            // $user_prefs = (array) null;
            // foreach($profile['perference'] as $b)
            // {
            // $user_prefs[] = $b['category_id'];
            // }
            // dd($user_prefs);
            
            // dd($Usercities);
            // dd($cities);
            $notifications = null;
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
            }
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
            
            // return view('user.myprofile', compact('AuthUserCities','purchasedDeals','categories','profile','cities','locations','Usercities','primary_location','notifications'));
            return view('user.myprofile', compact('Trendingcategories','CitiesOfUsersCountry','locations','languages','countries','Usercities','AuthUserCities','purchasedDeals','categories','profile','cities','locations','notifications'));
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'Success' => 'False',
        //         'Error' => $e->getMessage(),
        //     ]);
        // }
    }

    public function UpdateCurrentLocation( Request $request)
    {
        // api/user/deleteUserLocation/1
        // dd($request);d
        // dd(session()->get('Authenticated_user_data'));
        $token = session()->get('Authenticated_user_data')['token'];
        $response = Http::withToken($token);
        $userLocationsResponse = $response->get(''.config('path.path.WebPath').'api/user/getUserLocations');
        // dd($response->json()['data'][0]['country']);

        //SettingProfileVariables
        $response = Http::withToken($token);
        $response = $response->get(''.config('path.path.WebPath').'api/user/getCurrentUser')->json();
        $data['name'] = $response['data']['name'];
        $data['gender'] = $response['data']['gender'];
        $data['phone_no'] = $response['data']['phone'];

        if($request->country == $userLocationsResponse->json()['data'][0]['countryId'])
        {    // Same country
            // dd("sAme");
            foreach($request->city as $c)
            {
                $locations[] = ['address'=>'N/A','country'=>$request->country,'city'=>$c];
                
            }
        }else
        {
            foreach($request->city as $c)
            {
                $locations[] = ['address'=>'N/A','country'=>$request->country,'city'=>$c];
                
            }
        }
        $data['locations'] = json_encode($locations);
        // dd($data);

        // dd($response->json());
        // $user_locs = $response->json()['data'];
        // foreach($user_locs as $loc)
        // {
        //     if((int)$loc['lat'] == 0 && (int)$loc['long'] == 0)
        //     {
        //         // dd($loc['id']);
        //         // /api/user/updateUserLocation/3
        //         // $response = Http::withToken($token);
        //         // $response = $response->post(''.config('path.path.WebPath').'api/user/deleteUserLocation/'.$loc['id'].'');
        //         // dd($response);
        //     }
        //     else
        //     {
        //         // dd($loc);
        //         $primary_location = $loc;
        //     }
        // }
        // dd($primary_location);

        $response = Http::withToken($token);
        $response = $response->post(''.config('path.path.WebPath').'api/user/updateProfile',$data);
        // $response = $response->post(''.config('path.path.WebPath').'api/user/updateUserLocation/'.$primary_location['id'].'',[
        //     'address' => $request->address,
        //     'city' => $request->city,
        //     'country' => $request->country,
        //     'lat' => 0,
        //     'long' =>  0,
        // ]);
        
        //Resetting the session
        $response = Http::withToken($token);
        $userLocationsResponse = $response->get(''.config('path.path.WebPath').'api/user/getUserLocations');
        // dd($userLocationsResponse->json()['data']);

        $userData = session()->get('Authenticated_user_data');
        $userData['userLocations'] = [];
        foreach($userLocationsResponse->json()['data'] as $key => $Loc)
        {
            $userData['userLocations'][$key] = $Loc;
            $userData['userLocations'][$key]['country'] = $Loc['countryId'];
            $userData['userLocations'][$key]['city'] = $Loc['cityId'];
        }
        // $userData['userLocations'][0] = [
        //     'address' => 'N/A',
        //     'city' => $request->city[0],
        //     'country' => $request->country,
        // ];
        // dd($userData);
        session()->forget('Authenticated_user_data');
        Session::put('Authenticated_user_data', $userData);
        // session()->get('Authenticated_user_data')['userLocations'][0]['city'] = $request->city ;
        // dd(session()->get('Authenticated_user_data'));


        // dd($response->json());
        return redirect()->back()->with('success', 'Current Location Updated!');
        // dd($response->json());
    }

    public function SETCITIES(Request $request)
    {
        try
        {
            // dd($request);
            $token = session()->get('Authenticated_user_data')['token'];
            // dd($token);
            $country = session()->get('Authenticated_user_data')['userLocations'][0]['country'];
            $cities = $request->cities;

            if($cities == null)
            {
                return redirect()->back()->with('alert','Cannot Empty Your Cities');
            }

            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/user/getUserLocations');
            // dd($response->json);
            $user_locs = $response->json()['data'];
            foreach($user_locs as $loc)
            {
                if((int)$loc['lat'] == 0 && (int)$loc['long'] == 0)
                {
                    // dd($loc['id']);
                    // /api/user/updateUserLocation/3
                    $response = Http::withToken($token);
                    $response = $response->post(''.config('path.path.WebPath').'api/user/deleteUserLocation/'.$loc['id'].'');
                    // dd($response);
                }
                else
                {
                    // dd($loc);
                }
            }

            //Updating
            foreach($cities as $c)
            {
                $response = Http::withToken($token);
                $response = $response->post(''.config('path.path.WebPath').'api/user/addUserLocation',[
                    'country' => $country,
                    'city' => $c,
                    'lat' => 0,
                    'long' => 0,
                    'address' => 'NULL',
                ]);
                // dd($response->json());
            }
            return redirect()->back()->with('success','Your Cities Updated');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
                // 'Message' => $response->json()['error'],
            ]);
        }
    }

    public function myAccountSettingApplied(Request $request)
    {
        try 
        {
            // dd($request);
            // dd(session('Authenticated_user_data')['token']);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);


            if($request->hasFile('profile_picture'))
            {
                // dd('yes');
                $response = $response->attach('profile_picture', file_get_contents($request->profile_picture), 'dP.png');
            }
            // dd($response);
            // dd(1);
            $response = $response->post(''.config('path.path.WebPath').'api/user/updateProfile', $request->all());
            $response = $response->json();
            // To Update Session, I made a $data array.
            $data['userData'] = $response['data'];
            $data['userData']['token'] = $token;
            $data['userData']['userLocations'][0] = session('Authenticated_user_data')['userLocations'][0];
            // dd($data);
            if($response['message'] == "success")
            {
                if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                {
                    $UserType = 'User';
                    $token = session('Authenticated_user_data')['token'];
                    $id = session('Authenticated_user_data')['id'];
                    echo "<script>";
                    echo "var bearer_token = `". $token ."` ;";
                    echo "var id = `". $id ."` ;";
                    echo "</script>";
                }
                session(['Authenticated_user_data' => $data['userData']]);
            }
            return redirect()->back()->with('success', 'Profile Updated!');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
                'Message' => $response->json()['error'],
            ]);
        }
    }

    

    public function cart_inc_or_dec(Request $request)
    {
        try
        {
            $session_data = session()->get('cart_info');
            $dataSet;


            foreach($session_data as $key => $datum)
            {
                if($key == $request->data_id)
                {
                    if($request->DEC_or_INC == 0)
                    {
                        $qty = $datum['quantity'] - 1;
                    }
                    else
                    {
                        $qty = $datum['quantity'] + 1;
                    }
                    
                    $total = $qty * $datum['price'];

                    $dataSet[] = [

                        'deal_id' => $datum['deal_id'],
                        'quantity' => $qty,
                        'price' => $datum['price'],
                        'total_price' => $total,
                        'discount' => $datum['discount'],
                        'deal_array' => $datum['deal_array'],
                    ];
                }
                else
                {
                    $dataSet[] = [

                        'deal_id' => $datum['deal_id'],
                        'quantity' => $datum['quantity'],
                        'price' => $datum['price'],
                        'total_price' => $datum['total_price'],
                        'discount' => $datum['discount'],
                        'deal_array' => $datum['deal_array'],
                        ];
                }
            }

            Session::put('cart_info', $dataSet);
            return response()->json(['success'=>'DONE']);
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
                'Message' => $response->json()['error'],
            ]);
        }
    }

    public function cart()
    {
        try
        {
            //SETTING CITIES FOR UN AUTH
            $cities[] = 0;
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('unAuthUserLocations')['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }

            $session_data = session()->get('cart_info');
            // dd($session_data);
            // $data = $session_data;
            // foreach($data as $d)
            // {

            // }

            // dd($session_data);


            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];
            $notifications = null;
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
            }
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
            return view('user.cart',compact('AuthUserCities','session_data','categories','cities','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
                'Message' => $response->json()['error'],
            ]);
        }
    }

    public function delete_from_cart($id)
    {
        try
        {
            $found = false;
            $existing_ids_in_session;
            //Get Deal
            $response = Http::get(''.config('path.path.WebPath').'api/user/getDeal',['deal_id' => $id,]);
            $deal = $response->json()['data'];
            //Merchant Name
            $response = Http::get(''.config('path.path.WebPath').'api/user/getMerchant/'.$deal['merchant_id'].'');
            $merchant = $response->json()['data'];
            $deal['merchant_name'] = $merchant['name'];

            // session()->forget('cart_info');
            $session_data = session()->get('cart_info');
            $new_session_data = (array) null;

            foreach($session_data as $datum)
            {
                if($datum['deal_id'] !== $id)
                {
                    $new_session_data[] = $datum;
                }
            }
            // dd($new_session_data);
            session()->forget('cart_info');
            // dd($session_data);
            Session::put('cart_info', $new_session_data);
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
            return redirect()->back()->with('alert', 'Deleted From Cart!');    
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
                // 'Message' => $response->json()['error'],
            ]);
        } 
    }

    public function add_to_cart($id)
    {
        try
        {
            // dd(session()->get('Authenticated_user_data'));
            if(session()->get('Authenticated_user_data')['type'] != 1)
            {
                // dd(1);
                return redirect()->back()->with('alert', 'Only For Users!');    
            }

            $token = session()->get('Authenticated_user_data')['token'];
        
            //commenting for here
            $response = Http::withToken($token)->get(''.config('path.path.WebPath').'api/user/getCustomerPurchasedDeals',[
                'limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination'
            ]);
            $purchasedDeals = $response->json()['data'];
            foreach($purchasedDeals as $d)
            {
                if($d['id'] == $id)
                {
                    return redirect()->back()->with('info', 'You Have Already Purchased This Deal!');  
                }
            }
            //commenting to here


            // return redirect()->back()->with('success', 'Added To Cart!');  
            
            $found = false;
            $existing_ids_in_session;
            //Get Deal
            $response = Http::get(''.config('path.path.WebPath').'api/user/getDeal',['deal_id' => $id,]);
            $deal = $response->json()['data'];
            // dd($deal);
            //Merchant Name
            $response = Http::get(''.config('path.path.WebPath').'api/user/getMerchant/'.$deal['merchant_id'].'');
            $merchant = $response->json()['data'];

            $deal['merchant_name'] = $merchant['name'];
            // dd($deal);
            // session()->forget('cart_info');
            $session_data = session()->get('cart_info');
            
            if($session_data)
            {
                $existing_ids_in_session = Arr::pluck(session()->get('cart_info'), 'deal_id');
                
                if (in_array($id, $existing_ids_in_session))
                {
                    // foreach($session_data as &$data)
                    // {
                    //     if($data['deal_id'] == $id) //Got Our id
                    //     {
                    //         $data['quantity'] += 1;
                    //         $data['total_price'] = $data['quantity'] * $data['price'];
                    //     }
                    // }
                    
                }
                else
                {
                    // dd(1);
                    // $session_data[] = [
                    //     'deal_id' => $id,
                    //     'quantity' => 1,
                    //     'price' => $deal['price'],
                    //     'total_price' => $deal['price'],
                    //     'discount' => 0,
                    //     'deal_array' => $deal,
                    // ];
                    // MADE 0 0 0 BECAUSE USER CAN BUY FREE DEALS COUPONS
                    $session_data[] = [
                        'deal_id' => $id,
                        'quantity' => 1,
                        'price' => 0,
                        'total_price' => 0,
                        'discount' => 0,
                        'deal_array' => $deal,
                    ];
                }
                
            }
            else    //Session Cart is Empty //It is first Deal Going in Cart. Only 1 Time Usage.
            {
                // dd($deal);
                // MADE 0 0 0 BECAUSE USER CAN BUY FREE DEALS COUPONS
                $session_data[] = [
                    'deal_id' => $id,
                    'quantity' => 1,
                    'price' => 0,
                    'total_price' => 0,
                    'discount' => 0,
                    'deal_array' => $deal,
                ];
                // $session_data[] = [
                //     'deal_id' => $id,
                //     'quantity' => 1,
                //     'price' => $deal['price'],
                //     'total_price' => $deal['price'],
                //     'discount' => 0,
                //     'deal_array' => $deal,
                // ];
            }
            // dd($session_data);
            Session::put('cart_info', $session_data);

            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
            return redirect()->back()->with('success', 'Added To Cart!');    
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
                'Message' => $response->json()['error'],
            ]);
        } 
    }

    public function editReviewOnDeal(Request $request, $id)
    {
        // dd($request);
        try
        {
            $rating = $request->rating_old;
            if($request->has('rating_new')) 
            {
                $rating = $request->rating_new;
            }
            // dd($rating);

            $deal = $response = Http::get(''.config('path.path.WebPath').'api/user/getDeal',['deal_id' => $id,]);
            $merchant_id = $deal->json()['data']['merchant_id'];
            // dd();
            // 74



            $user = session()->get('Authenticated_user_data');
            $token = $user['token'];
            $url = ''.config('path.path.WebPath').'api/user/addReview';
            $data = [
                'rating' => $rating,
                'notes' => $request->notes,
                // 'merchant_id' => $request->merchant_id,
                'merchant_id' => $merchant_id,
                'user_id' => $user['id'],
                'deal_id' => $id,
            ];
            // dd($data);
            $response = Http::withToken($token)->post($url, $data);
            // dd($response->json());

            //Chat Things
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }

            return redirect()->back()->with('success', 'Review Editted!');   

            // dd($response->json());
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function addReviewOnDeal(Request $request, $id)
    {
        // dd($request);
        try
        {
            $user = session()->get('Authenticated_user_data');
            $token = $user['token'];
            $url = ''.config('path.path.WebPath').'api/user/addReview';
            $data = [
                'rating' => $request->rating,
                'notes' => $request->notes,
                'merchant_id' => $request->merchant_id, 
                'user_id' => $user['id'],
                'deal_id' => $id,
            ];
            // dd($data);
            $response = Http::withToken($token)->post($url, $data);
            // dd($response);
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }

            return redirect()->back()->with('success', 'Review Submitted!');   

            // dd($response->json());
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
                'Message' => $response->json()['error'],
            ]);
        }
    }

    public function merchant_details($id)
    {
        try
        {
            if($id == 'categories')
            {
                return redirect('categories');
            }

            //SETTING CITIES FOR UN AUTH
            $cities[] = 0;
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('unAuthUserLocations')['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }

            $response = Http::get(''.config('path.path.WebPath').'api/user/getMerchant/'.$id.'');
            $merchant = $response->json()['data'];

            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];
            // dd($merchant);
            // dd($merchant);

            $response = Http::get(''.config('path.path.WebPath').'api/user/getMerchantDeals/'.$id.'');
            $deals = $response->json()['data'];
            // dd($deals);
            $deals = $this->paginate($deals);
            $notifications = null;
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
            }
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
            return view('user.merchantProfile',compact('AuthUserCities','merchant','deals','categories','cities','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
                // 'Message' => $merchant->json()['error'],
            ]);
        }
    }

    public function home()
    {
        // try
        // {
            // dd(session()->get('Authenticated_user_data'));
            $category_section = Http::get(''.config('path.path.WebPath').'api/user/getHomePageSections',['section' => 'category']);
            $categorySection = $category_section->json()['data'];

            // $upperImage_Section = Http::get(''.config('path.path.WebPath').'api/user/getHomePageSections',['section' => 'upperImageSection']);
            // $upperImageSection = $upperImage_Section->json()['data'];

            // $lowerImage_Section = Http::get(''.config('path.path.WebPath').'api/user/getHomePageSections',['section' => 'lowerImageSection']);
            // $lowerImageSection = $lowerImage_Section->json()['data'];

            // $footerImage_Section = Http::get(''.config('path.path.WebPath').'api/user/getHomePageSections',['section' => 'footerImageSection']);
            // $footerImageSection = $footerImage_Section->json()['data'];

            // $CatBlock_Section = Http::get(''.config('path.path.WebPath').'api/user/getHomePageSections',['section' => 'CatBlockSection']);
            // $CatBlockSection = $CatBlock_Section->json()['data'];

            $crousel_section = Http::get(''.config('path.path.WebPath').'api/user/getCarousals');
            $crousel = $crousel_section->json()['data'];

            // dd($categorySection);s
            //AuthenticatedUserSelectedCities
            // dd(count($crousel));
            // dd($CatBlockSection);
            // $category_to_show_on_block = $CatBlockSection[0]['data_id'];

            // dd(session()->get('Authenticated_user_data'));

            $data = ['limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',
            ];

            if( !session()->has('Authenticated_user_data')) // Guest
            {
                $UserType = 'Guest';
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1) // User
            {
                $UserType = 'User';
                $city = session()->get('Authenticated_user_data')['userLocations'][0]['city'];
                $country = session()->get('Authenticated_user_data')['userLocations'][0]['country'];

                $token = session()->get('Authenticated_user_data')['token'];
                $response = Http::withToken($token);
                $response = $response->get(''.config('path.path.WebPath').'api/user/getUserLocations');

                if(count($response->json()['data']) !== 0)
                {
                    $userCities = $response->json()['data'];
                    foreach($userCities as $key => $c)
                    {
                        $data['cities['.$key.']'] = $c['cityName'];
                    }
                    $data['country'] = $country;
                }
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] !== 1) // Merchant/Admin
            {
                if(session()->get('Authenticated_user_data')['type'] == 3){
                    $UserType = 'Admin';
                }else{
                    $UserType = 'Merchant';
                    $city = session()->get('Authenticated_user_data')['userLocations'][0]['city'];
                    $country = session()->get('Authenticated_user_data')['userLocations'][0]['country'];
                    $data['country'] = $country;
                    $data['cities[0]'] = $city;
                }
            }
            $trendingDeals = Http::get(''.config('path.path.WebPath').'api/user/getDeals', $data)->json();

            $data['is_sponsered'] = 1;
            $sponsoredDeals = Http::get(''.config('path.path.WebPath').'api/user/getDeals', $data)->json();
            // dd($sponsoredDeals);
            // dd($trendingDeals['data'][0]['image']['image']);
            // dd($trendingDeals);




        
            //SETTING CITIES FOR UN AUTH
            $cities['data'] = [1,2,3];
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('unAuthUserLocations')['country'],
                ]);
                $cities = $response->json();
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                ]);
                $cities = $response->json();
            }
      
            $categories_req = Http::get(''.config('path.path.WebPath').'api/categoryAutoComplete');
            $categories = $categories_req->json()['data'];

            $notifications = null;
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
                // dd($notifications);
            }
            
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
            // dd($categorySection);
            return view('user.index',compact('AuthUserCities','categories','trendingDeals','cities','sponsoredDeals',
                'categorySection','crousel','notifications'));
            // return view('user.index',compact('AuthUserCities','categories','CatBlockSection','trendingDeals','cities',
            //     'categorySection','upperImageSection','crousel','lowerImageSection','footerImageSection','notifications'));
            // return view('user.index',compact('AuthUserCities','categories','CatBlockSection','cats_in_block','trendingDeals','cat_array','cities',
            //     'categorySection','upperImageSection','lowerImageSection','footerImageSection','TopSellers','notifications'));
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'Success' => 'False',
        //         'Error' => $e->getMessage(),
        //     ]);
        // }
    }

    public function boost()
    {
        try
        {

            //SETTING CITIES FOR UN AUTH
            $cities[] = 0;
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('unAuthUserLocations')['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }

            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];
            $notifications = null;
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
            }
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
            
            return view('user.boost' , compact('AuthUserCities','categories','cities','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function userLogin()
    {
        try
        {
            return view('user.user_login');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AccVerify()
    {
        try
        {
            return view('user.AccVerify');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AccVerifyConfirm(Request $request)
    {
        try
        {
            // dd($request);
            $response = Http::post(''.config('path.path.WebPath').'api/verifyAccount',[
                'email' => $request->email,
                'code' => $request->code,
            ]);
            // dd($response->json());

            if($response->json()['message'] == 'success')
            {
                return redirect('login')->with('success','Your Account Successfully Verified.');
            }
            return redirect('AccVerify')->with('alert','Something Bad Happened!');
            
            // return view('user.AccVerify');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function ResendCodeConfirm(Request $request)
    {
        try
        {
            // dd($request);
            $response = Http::post(''.config('path.path.WebPath').'api/resendCode',[
                'email' => $request->email,
            ]);
            // dd($response->json());

            if($response->json()['message'] == 'success')
            {
                return redirect('AccVerify')->with('success','Confirmation Code is sent to your Email.');
            }
            if($response->json())
            {
                if($response->json()['message'] == 'Your account is already active')
                {
                    return redirect('AccVerify')->with('success','Your Account is Already Active.');
                }
                // return redirect('AccVerify')->with('success','Confirmation Code is sent to your Email.');
            }

            return redirect('AccVerify')->with('alert','Something Bad Happened!');
            
            // return view('user.AccVerify');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function forgotPasswordRequestConfirm(Request $request)
    {
        try
        {
            // dd($request);
            $response = Http::post(''.config('path.path.WebPath').'api/sendResetPassword',[
                'email' => $request->email,
            ]);
            // dd($response->json());

            if($response->json()['message'] == 'success')
            {
                return redirect('forgotPasswordRequest')->with('success','Your New Password Is Sent To Your Email.');
            }
            return redirect('forgotPasswordRequest')->with('alert','Something Bad Happened!');
            
            // return view('user.AccVerify');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function resendCodeRequest()
    {
        try
        {
            return view('user.ResendCodeRequest');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }
    public function forgotPasswordRequest()
    {
        try
        {
            return view('user.forgotPasswordRequest');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function userRegister()
    {
        try
        {
            $type = 1;
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }

            $url = ''.config('path.path.WebPath').'api/getAllLanguages';
            $languages = Http::get($url)->json()['data'];

            $url = ''.config('path.path.WebPath').'api/getCountries';
            $countries = Http::get($url)->json()['data'];

            return view('user.user_register',compact('AuthUserCities','type','languages','countries'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function discount_details($id)
    {
        try
        {
            // dd(session()->get('Authenticated_user_data'));

            // dd($id);
            if($id == 'categories')
            {
                return redirect('categories');
            }

            //SETTING CITIES FOR UN AUTH
            $cities[] = 0;
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('unAuthUserLocations')['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }

            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $lat = (float)session()->get('Authenticated_user_data')['userLocations'][0]['lat'];
                $long = (float)session()->get('Authenticated_user_data')['userLocations'][0]['long'];
                $response = Http::get(''.config('path.path.WebPath').'api/user/getDeal',[
                    'lat' => $lat ,
                    'long' => $long,
                    'deal_id' => $id,
                ]);
                // dd($response->json());

                if($response->json() !== null){
                    $deal = $response->json()['data'];
                }else{
                    return redirect('categories')->with('alert','This Deal is not available right now. ');
                }
                

                // dd($deal);
                // foreach($deal['distance'] as &$d)
                // {
                //     // dd($d);
                //     $deal['nearby'] = $d['distance_in_km'];
                //     $deal['nearbyBranch'] = $d['branch_name'];
                //     if($d['distance_in_km'] <= $deal['nearby'])
                //     {
                //         $deal['nearby'] = $d['distance_in_km'];
                //         $deal['nearbyBranch'] = $d['branch_name'];
                //     }
                // }
                // dd($data);
            }
            elseif(!session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                // dd('nAfetc');
                $lat = (float)session()->get('unAuthUserLocations')['lat'];
                $long = (float)session()->get('unAuthUserLocations')['long'];
                $response = Http::get(''.config('path.path.WebPath').'api/user/getDeal',[
                    'lat' => $lat ,
                    'long' => $long,
                    'deal_id' => $id,
                ]);

                if($response->json() !== null){
                    $deal = $response->json()['data'];
                }else{
                    return redirect('categories')->with('alert','This Deal is not available right now. ');
                }
                // dd($deal);
                // foreach($deal['distance'] as &$d)
                // {
                //     // dd($d);
                //     $deal['nearby'] = $d['distance_in_km'];
                //     $deal['nearbyBranch'] = $d['branch_name'];
                //     if($d['distance_in_km'] <= $deal['nearby'])
                //     {
                //         $deal['nearby'] = $d['distance_in_km'];
                //         $deal['nearbyBranch'] = $d['branch_name'];
                //     }
                // }
            }
            else
            {
                $response = Http::get(''.config('path.path.WebPath').'api/user/getDeal',[
                    'deal_id' => $id,
                ]);

                if($response->json() !== null){
                    $deal = $response->json()['data'];
                }else{
                    return redirect('categories')->with('alert','This Deal is not available right now. ');
                }
            }
            
            // dd($deal);
            // REVIEWS
            
            $response = Http::get(''.config('path.path.WebPath').'api/user/getDealsReviews/'.$id.'');
            $reviews = $response->json()['data'];

            foreach($reviews as &$r)
            {
                // dd($r);
                if($r['child'] > 0)
                {
                    $response = Http::get(''.config('path.path.WebPath').'api/user/getChildReviews/'.$r['id'].'');
                    // dd($response->json());
                    $r['replies'] = $response->json()['data'];
                }
            }
            // dd($reviews);

            // dd($reviews);

            // api/user/getDealsReviews/1


            // dd($deal);
            // $have_vid = false;
            // foreach($deal['images'] as $media)
            // {
            //     if($media['mime_type'] == 'video')
            //     {
                    
            //     }
            // }




            $response = Http::get(''.config('path.path.WebPath').'api/user/getMerchant/'.$deal['merchant_id'].'');
            $merchant = $response->json()['data'];
            $deal['merchant_name'] = $merchant['name'];
            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];
            $notifications = null;
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
            }
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
            return view('user.discount_details', compact('AuthUserCities','deal','categories','cities','reviews','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
                // 'Message' => $response->json()['error'],
            ]);
        }
    }

    public function getAuthUserLocations($token)
    {
        $token = session()->get('Authenticated_user_data')['token'];
        $locations = Http::withToken($token)->get(''.config('path.path.WebPath').'api/user/getUserLocations')->json()['data'];
        // dd($locations);
        $Usercities = [];
        if(count($locations) == 1)
        {
            // $Usercities[] = $locations[0]['city'];
            $Usercities[] = $locations[0]['cityName'];
        }
        else
        {
            foreach($locations as $key => $L)
            {
                if((int)$L['lat'] == 0 && (int)$L['long'] == 0)
                {
                    // $primary_city = $L['city'];
                    $primary_city = $L['cityName'];
                }
                if(!in_array($L['cityName'],$Usercities))
                {
                    // $Usercities[] = $L['city'];
                    $Usercities[] = $L['cityName'];
                }
            }
        }
        return $Usercities;
    }


    public function categories(Request $request)
    {
        // try
        // {
            // dd(session()->get('Authenticated_user_data'));
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
        
            // dd($AuthUserCities);
            

            $UserType = '00';
            //  ----------------------------------WHILE UNCOMMENTING THIS REMEMBER TO ADD AUTHUSERCITIES DROPDOWN FEATURE
            // dd($request);
            // dd(session()->get('categories_selected'));
            // session()->forget('categories_selected');
            // if(session()->get('categories_selected'))
            // {
            //     $cat_one = session()->get('categories_selected')[0];

            //     $page = 1;
            //     if($request->has('page'))
            //     {
            //         // dd($request['page']);
            //         $page = $request['page'];
            //     }
            //     // dd(1);
            //     $cities[] = 0;
            //     $session_data = session()->get('unAuthUserLocations');
            //     $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
            //         'country' => session()->get('unAuthUserLocations')['country'],
            //     ]);
            //     $cities = $response->json();

            //     $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',[
            //         'limit' => 10000,
            //         'page' => $page,
            //         'returnType' => 'customPagination',
            //         'lat' => (float)session()->get('unAuthUserLocations')['lat'] ,
            //         'long' => (float)session()->get('unAuthUserLocations')['long'],
            //         'cities[0]' => session()->get('unAuthUserLocations')['city'],
            //         'country' =>session()->get('unAuthUserLocations')['country'],
            //         'category' => $cat_one,
            //         'timeSort' => 'desc',
            //     ]);
            //     // dd($response->json());
            //     if($response->json()['status'] == true)
            //     {
            //         $data = $response->json()['data'];
            //         foreach($data as $key => &$datum)
            //         {
            //             $datum['nearby'] = 0;
            //             $datum['nearbyBranch'] = 0;
            //             // dd($datum);
            //             // dd($datum['distance'][$key]);

            //             foreach($datum['distance'] as &$d)
            //             {
            //                 // dd($d);
            //                 $datum['nearby'] = $d['distance_in_km'];
            //                 $datum['nearbyBranch'] = $d['branch_name'];
            //                 if($d['distance_in_km'] <= $datum['nearby'])
            //                 {
            //                     $datum['nearby'] = $d['distance_in_km'];
            //                     $datum['nearbyBranch'] = $d['branch_name'];
            //                 }
            //             }
            //         }
            //     }
            //     $deals = $this->paginate($data);


            //     // dd($deals);
            //     $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            //     $categories = Http::get($url)->json()['data'];
            //     $what_page = 'categories';
            //     $title = "Categories : All";
            //     $notifications = null;
            //     if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            //     {
            //         $UserType = 'User';
            //         $token = session()->get('Authenticated_user_data')['token'];
            //         $notifications = $this->getNotifications($token);
            //         $notifications =  $notifications['data'];
            //     }
            //     if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            //     {
            //         $UserType = 'User';
            //         $token = session('Authenticated_user_data')['token'];
            //         $id = session('Authenticated_user_data')['id'];
            //         echo "<script>";
            //         echo "var bearer_token = `". $token ."` ;";
            //         echo "var id = `". $id ."` ;";
            //         echo "</script>";
            //     }
            //     return view('user.categories', compact('AuthUserCities','deals','categories','title','cities','what_page','notifications','UserType'));
            // }

            // ------------------------

            // dd(1);
            //SETTING CITIES FOR UN AUTH
            $cities[] = 0;
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('unAuthUserLocations')['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }

            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];
            // dd($categories);

            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];

            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $lat = (float)session()->get('Authenticated_user_data')['userLocations'][0]['lat'];
                $long = (float)session()->get('Authenticated_user_data')['userLocations'][0]['long'];
                $city = session()->get('Authenticated_user_data')['userLocations'][0]['city'];
                $country = session()->get('Authenticated_user_data')['userLocations'][0]['country'];

                $token = session()->get('Authenticated_user_data')['token'];
                $response = Http::withToken($token);
                $response = $response->get(''.config('path.path.WebPath').'api/user/getUserLocations');
                $userCities = $response->json()['data'];
                $data = [
                'limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',
                // 'lat' => $lat ,
                // 'long' => $long,
                // 'timeSort' => 'desc',
                // 'country' =>$country
                ];


                    //DROP DOWN CHANGE CODE
                // if(session()->has('AuthenticatedUserSelectedCities'))
                // {
                //         $data['cities[0]'] = session()->get('AuthenticatedUserSelectedCities');    
                // }
                // else
                // {
                //     foreach($userCities as $key => $c)
                //     {
                //         $data['cities['.$key.']'] = $c['city'];
                //     }
                // }
                    // dd($data);
                $response = Http::get(''.config('path.path.WebPath').'api/user/getDeals',$data);

                // dd($response->json());

                //////////////////
                // if($response->json()['status'] == true)
                // {
                //     $data = $response->json()['data'];
                //     foreach($data as $key => &$datum)
                //     {
                //         //NearBy Deal
                //         $datum['nearby'] = 0;
                //         $datum['nearbyBranch'] = 0;
                //         $distances = [];
                //         $firstDistanceArray = reset($datum['distance']);
                //         foreach($datum['distance'] as $i => &$d)
                //         {
                        
                //             $datum['nearby'] = $firstDistanceArray['distance_in_km'];
                //             $datum['nearbyBranch'] = $firstDistanceArray['branch_name'];
    
                //             if($d['distance_in_km'] < $datum['nearby'])
                //             {
                //                 $datum['nearby'] = $d['distance_in_km'];
                //                 $datum['nearbyBranch'] = $d['branch_name'];
                //             }
                //         }
                //     }
                // }
                // $deals = $this->paginate($data);
                /////////////
                $deals = $this->paginate($response->json()['data']);
            }
            // elseif( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            // {
            //     $UserType = 'LocationUser';
            //     $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',[
            //         'limit' => 10000,
            //         'page' => 1,
            //         'timeSort' => 'desc',
            //         'returnType' => 'customPagination',
            //         'lat' => (float)session()->get('unAuthUserLocations')['lat'] ,
            //         'long' => (float)session()->get('unAuthUserLocations')['long'],
            //         'cities[0]' => session()->get('unAuthUserLocations')['city'],
            //         'country' =>session()->get('unAuthUserLocations')['country'],
            //     ]);
            //     // dd($response);
            //     if($response->json()['status'] == true)
            //     {
            //         $data = $response->json()['data'];
            //         foreach($data as $key => &$datum)
            //         {
            //             //NearBy Deal
            //             $datum['nearby'] = 0;
            //             $datum['nearbyBranch'] = 0;
            //             $distances = [];
            //             $firstDistanceArray = reset($datum['distance']);
            //             foreach($datum['distance'] as $i => &$d)
            //             {
                        
            //                 $datum['nearby'] = $firstDistanceArray['distance_in_km'];
            //                 $datum['nearbyBranch'] = $firstDistanceArray['branch_name'];
    
            //                 if($d['distance_in_km'] < $datum['nearby'])
            //                 {
            //                     $datum['nearby'] = $d['distance_in_km'];
            //                     $datum['nearbyBranch'] = $d['branch_name'];
            //                 }
            //             }
            //         }
            //     }
            //     // dd($smallest);
            //     // dd($data);
            //     // $offers_fetched = $response->json()['data'];
            //     // dd($offers_fetched);
            //     $deals = $this->paginate($data);

            // }
            else
            {
                $response = Http::get(''.config('path.path.WebPath').'api/user/getDeals',[
                    'limit' => 10000,
                    'page' => 1,
                    'returnType' => 'customPagination'
                ]);
                $offers_fetched = $response->json()['data'];
                // dd($offers_fetched);
                $deals = $this->paginate($offers_fetched);
            }

            // dd($deals);

            $what_page = 'categories';
            $title = "Categories : All";
            $notifications = null;
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                // dd($token);
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
            // dd($deals);
            return view('user.categories', compact('AuthUserCities','deals','categories','title','cities','what_page','notifications','UserType','AuthUserCities'));
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'Success' => 'False',
        //         'Error' => $e->getMessage(),
        //         // 'Message' => $response->json()['error'],
        //     ]);
        // }
    }

    public function PriceFilter(Request $request)
    {
        try
        {
            $UserType = '00';
            // $Discountmin = $request->min;
            // $Discountmax = $request->max;
            // dd($request->my_range);
            $Discountmin = 0;
            $Discountmax = 100;
            
            if($request->has('my_range') && $request->has('my_range'))
            {
                $array = explode(";",$request->my_range);
                $Discountmin = $array[0];
                $Discountmax = $array[1];
            }
            // dd($Discountmax);

            // dd($request->max);
            // dd($min);
            // dd($request->input('mix'));
            //SETTING CITIES FOR UN AUTH
            $cities[] = 0;
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('unAuthUserLocations')['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }

            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];
            // dd($categories);




            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $lat = (float)session()->get('Authenticated_user_data')['userLocations'][0]['lat'];
                $long = (float)session()->get('Authenticated_user_data')['userLocations'][0]['long'];
                $city = session()->get('Authenticated_user_data')['userLocations'][0]['city'];
                $country = session()->get('Authenticated_user_data')['userLocations'][0]['country'];

                $token = session()->get('Authenticated_user_data')['token'];
                $response = Http::withToken($token);
                $response = $response->get(''.config('path.path.WebPath').'api/user/getUserLocations');
                $userCities = $response->json()['data'];
                $data = ['limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',
                'lat' => $lat ,
                'long' => $long,
                'country' =>$country,
                'startingDiscount' => $Discountmin,
                'endingDiscount' => $Discountmax,
                ];


                    //DROP DOWN CHANGE CODE
                    if(session()->has('AuthenticatedUserSelectedCities'))
                    {
                            $data['cities[0]'] = session()->get('AuthenticatedUserSelectedCities');    
                    }
                    else
                    {
                        foreach($userCities as $key => $c)
                        {
                            $data['cities['.$key.']'] = $c['city'];
                        }
                    }

                // foreach($userCities as $key => $c)
                // {
                //     $data['cities['.$key.']'] = $c['city'];
                // }
                $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',$data);

                // dd(session()->get('Authenticated_user_data')['userLocations'][0]);
                // $lat = (float)session()->get('Authenticated_user_data')['userLocations'][0]['lat'];
                // $long = (float)session()->get('Authenticated_user_data')['userLocations'][0]['long'];
                // $city = session()->get('Authenticated_user_data')['userLocations'][0]['city'];
                // $country = session()->get('Authenticated_user_data')['userLocations'][0]['country'];
                // dd(session()->get('Authenticated_user_data')['userLocations'][0]);
                // dd($lat);
                // $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',[
                //     'limit' => 10000,
                //     'page' => 1,
                //     'returnType' => 'customPagination',
                //     'lat' => $lat ,
                //     'long' => $long,
                //     'city' => $city,
                //     'country' =>$country,
                //     'startingDiscount' => $request->min,
                //     'endingDiscount' => $request->max,
                // ]);
            }
            elseif( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',[
                    'limit' => 10000,
                    'page' => 1,
                    'returnType' => 'customPagination',
                    'lat' => (float)session()->get('unAuthUserLocations')['lat'] ,
                    'long' => (float)session()->get('unAuthUserLocations')['long'],
                    'cities[0]' => session()->get('unAuthUserLocations')['city'],
                    'country' =>session()->get('unAuthUserLocations')['country'],
                    'startingDiscount' => $Discountmin,
                    'endingDiscount' => $Discountmax,
                ]);
            }
            else
            {
                $response = Http::get(''.config('path.path.WebPath').'api/user/getDeals',[
                    'limit' => 10000,
                    'page' => 1,
                    'returnType' => 'customPagination',
                    'startingDiscount' => $Discountmin,
                    'endingDiscount' => $Discountmax,
                ]);
            }



            if($response->json()['status'] == true)
            {
                $data = $response->json()['data'];
                foreach($data as $key => &$datum)
                    {
                        //NearBy Deal
                        $datum['nearby'] = 0;
                        $datum['nearbyBranch'] = 0;
                        $distances = [];
                        $firstDistanceArray = reset($datum['distance']);
                        foreach($datum['distance'] as $i => &$d)
                        {
                        
                            $datum['nearby'] = $firstDistanceArray['distance_in_km'];
                            $datum['nearbyBranch'] = $firstDistanceArray['branch_name'];
            
                            if($d['distance_in_km'] < $datum['nearby'])
                            {
                                $datum['nearby'] = $d['distance_in_km'];
                                $datum['nearbyBranch'] = $d['branch_name'];
                            }
                        }
                    }
                // foreach($data as $key => &$datum)
                // {
                //     $datum['nearby'] = 0;
                //     $datum['nearbyBranch'] = 0;
                //     // dd($datum);
                //     // dd($datum['distance'][$key]);

                //     foreach($datum['distance'] as &$d)
                //     {
                //         // dd($d);
                //         $datum['nearby'] = $d['distance_in_km'];
                //         $datum['nearbyBranch'] = $d['branch_name'];
                //         if($d['distance_in_km'] <= $datum['nearby'])
                //         {
                //             $datum['nearby'] = $d['distance_in_km'];
                //             $datum['nearbyBranch'] = $d['branch_name'];
                //         }
                //     }
                // }
            }

            $deals = $this->paginate($data);


            $title = "Percentage Filter : ".$Discountmin."% - ".$Discountmax."% ";
            // dd($categories);
            // $offers_fetched = $response->json()['data'];
            // $deals = $this->paginate($offers_fetched);
            $what_page = 'priceFilter';
            $notifications = null;
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
            }
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }

            echo "<script>";
            echo "var Discountmin = `". $Discountmin ."` ;";
            echo "var Discountmax = `". $Discountmax ."` ;";
            echo "</script>";
            // $is_it_trending = false;
            return view('user.categories', compact('AuthUserCities','deals','categories','title','cities','what_page','notifications','UserType'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
                // 'Message' => $response->json()['error'],
            ]);
        }
    }

    public function categoriesSort($sort_type)
    {
        try
        {
            $UserType = '00';
            //SETTING CITIES FOR UN AUTH
            $loc_yes_or_no = false;
            $cities[] = 0;
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('unAuthUserLocations')['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            // dd($sort_type);
            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];
            // dd($categories);

            // dd($sort_type);

            $title = "Categories : All";
            $time_sort = 'N/A';
            $price_sort = 'asc';
            if($sort_type == 'priceAsc')
            {
                $price_sort = 'asc';
                $title = "Sort : Price Low to High";
            }
            if($sort_type == 'priceDesc')
            {
                $price_sort = 'desc';
                $title = "Sort : Price High to Low";
            }
            if($sort_type == 'dateAsc')
            {
                $time_sort = 'asc';
                $title = "Sort : Newest First";
            }
            if($sort_type == 'dateDesc')
            {
                $time_sort = 'desc';
                $title = "Sort : Oldest First";
            }

            if($sort_type == 'dateAsc' || $sort_type == 'dateDesc' )
            {
                if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                {
                    $UserType = 'User';

                    $lat = (float)session()->get('Authenticated_user_data')['userLocations'][0]['lat'];
                    $long = (float)session()->get('Authenticated_user_data')['userLocations'][0]['long'];
                    $city = session()->get('Authenticated_user_data')['userLocations'][0]['city'];
                    $country = session()->get('Authenticated_user_data')['userLocations'][0]['country'];

                    $token = session()->get('Authenticated_user_data')['token'];
                    $response = Http::withToken($token);
                    $response = $response->get(''.config('path.path.WebPath').'api/user/getUserLocations');
                    $userCities = $response->json()['data'];
                    $data = ['limit' => 10000,
                    'page' => 1,
                    'returnType' => 'customPagination',
                    'lat' => $lat ,
                    'long' => $long,
                    'timeSort' => $time_sort,
                    'country' =>$country
                    ];

                    foreach($userCities as $key => $c)
                    {
                        $data['cities['.$key.']'] = $c['city'];
                    }
                    $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',$data);

                    $loc_yes_or_no = true;
            
                }
                elseif( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
                {
                    $UserType = 'LocationUser';
                    $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',[
                        'limit' => 10000,
                        'page' => 1,
                        'returnType' => 'customPagination',
                        'lat' => (float)session()->get('unAuthUserLocations')['lat'] ,
                        'long' => (float)session()->get('unAuthUserLocations')['long'],
                        'cities[0]' => session()->get('unAuthUserLocations')['city'],
                        'country' =>session()->get('unAuthUserLocations')['country'],
                        // 'priceSort' => $price_sort,
                        'timeSort' => $time_sort,
                    ]);
                    $loc_yes_or_no = true;
                }
                else
                {
                    $response = Http::get(''.config('path.path.WebPath').'api/user/getDeals',[
                        'limit' => 10000,
                        'page' => 1,
                        'returnType' => 'customPagination',
                        // 'priceSort' => $price_sort,
                        'timeSort' => $time_sort,
                    ]);
                    // $offers_fetched = $response->json();
                    // dd($offers_fetched);
                   
                }
            }
            elseif($sort_type == 'priceAsc' || $sort_type == 'priceDesc')
            {
                if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                {
                    $UserType = 'User';
                    $lat = (float)session()->get('Authenticated_user_data')['userLocations'][0]['lat'];
                    $long = (float)session()->get('Authenticated_user_data')['userLocations'][0]['long'];
                    $city = session()->get('Authenticated_user_data')['userLocations'][0]['city'];
                    $country = session()->get('Authenticated_user_data')['userLocations'][0]['country'];

                    $token = session()->get('Authenticated_user_data')['token'];
                    $response = Http::withToken($token);
                    $response = $response->get(''.config('path.path.WebPath').'api/user/getUserLocations');
                    $userCities = $response->json()['data'];
                    $data = ['limit' => 10000,
                    'page' => 1,
                    'returnType' => 'customPagination',
                    'lat' => $lat ,
                    'long' => $long,
                    'country' =>$country,
                    'priceSort' => $price_sort,
                    ];

                        //DROP DOWN CHANGE CODE
                    if(session()->has('AuthenticatedUserSelectedCities'))
                    {
                            $data['cities[0]'] = session()->get('AuthenticatedUserSelectedCities');    
                    }
                    else
                    {
                        foreach($userCities as $key => $c)
                        {
                            $data['cities['.$key.']'] = $c['city'];
                        }
                    }

                    // foreach($userCities as $key => $c)
                    // {
                    //     $data['cities['.$key.']'] = $c['city'];
                    // }
                    $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',$data);

                    $loc_yes_or_no = true;
             
            
                }
                elseif( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
                {
                    $UserType = 'LocationUser';
                    $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',[
                        'limit' => 10000,
                        'page' => 1,
                        'returnType' => 'customPagination',
                        'lat' => (float)session()->get('unAuthUserLocations')['lat'] ,
                        'long' => (float)session()->get('unAuthUserLocations')['long'],
                        'cities[0]' => session()->get('unAuthUserLocations')['city'],
                        'country' =>session()->get('unAuthUserLocations')['country'],
                        'priceSort' => $price_sort,
                        // 'timeSort' => $time_sort,
                    ]);
                    $loc_yes_or_no = true;
                }
                else
                {
                    $response = Http::get(''.config('path.path.WebPath').'api/user/getDeals',[
                        'limit' => 10000,
                        'page' => 1,
                        'returnType' => 'customPagination',
                        'priceSort' => $price_sort,
                        // 'timeSort' => $time_sort,
                    ]);
                    // $offers_fetched = $response->json();
                    // dd($offers_fetched);
                   
                }
            }
            else
            {
                $response = Http::get(''.config('path.path.WebPath').'api/user/getDeals',[
                    'limit' => 10000,
                    'page' => 1,
                    'returnType' => 'customPagination',
                    'priceSort' => $price_sort,
                    'timeSort' => $time_sort,
                ]);
            }

            $data = $response->json()['data'];
            

            // dd($response->json());
            if($loc_yes_or_no)
            {
                if($response->json()['status'] == true)
                {
                    $data = $response->json()['data'];
                    foreach($data as $key => &$datum)
                    {
                        //NearBy Deal
                        $datum['nearby'] = 0;
                        $datum['nearbyBranch'] = 0;
                        $distances = [];
                        $firstDistanceArray = reset($datum['distance']);
                        foreach($datum['distance'] as $i => &$d)
                        {
                        
                            $datum['nearby'] = $firstDistanceArray['distance_in_km'];
                            $datum['nearbyBranch'] = $firstDistanceArray['branch_name'];
            
                            if($d['distance_in_km'] < $datum['nearby'])
                            {
                                $datum['nearby'] = $d['distance_in_km'];
                                $datum['nearbyBranch'] = $d['branch_name'];
                            }
                        }
                    }
                    // foreach($data as $key => &$datum)
                    // {
                    //     $datum['nearby'] = 0;
                    //     $datum['nearbyBranch'] = 0;
                    //     // dd($datum);
                    //     // dd($datum['distance'][$key]);
    
                    //     foreach($datum['distance'] as &$d)
                    //     {
                    //         // dd($d);
                    //         $datum['nearby'] = $d['distance_in_km'];
                    //         $datum['nearbyBranch'] = $d['branch_name'];
                    //         if($d['distance_in_km'] <= $datum['nearby'])
                    //         {
                    //             $datum['nearby'] = $d['distance_in_km'];
                    //             $datum['nearbyBranch'] = $d['branch_name'];
                    //         }
                    //     }
                    // }
                }
            }
            



            $deals = $this->paginate($data);
            // $is_it_trending = false;
            $what_page = 'categoriesSort';
            $notifications = null;
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
            }
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
            return view('user.categories', compact('AuthUserCities','deals','categories','title','cities','what_page','notifications','UserType'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }
    
    public function DealsByCat($id, Request $request)
    {
        try
        {
            $UserType = '00';
            // dd($request);
            // $array = explode(";",$request->my_range);
            // dd($array);

            $Discountmin = 0;
            $Discountmax = 100;
            
            if($request->has('my_range') && $request->has('my_range'))
            {
                $array = explode(";",$request->my_range);
                $Discountmin = $array[0];
                $Discountmax = $array[1];
                // dd($Discountmax);
            }

            //COMMENTING THIS OUT
            // $Discountmin = 0;
            // $Discountmax = 100;
            
            // if($request->has('min') && $request->has('max'))
            // {
            //     // dd($request->min);
            //     $Discountmin = $request->min;
            //     $Discountmax = $request->max;
            // }
            //COMMENTING THIS OUT

            $loc_yes_no = false;
            //SETTING CITIES FOR UN AUTH
            $cities[] = 0;
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('unAuthUserLocations')['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }

            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];
            // dd($categories);

            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';

                $lat = (float)session()->get('Authenticated_user_data')['userLocations'][0]['lat'];
                $long = (float)session()->get('Authenticated_user_data')['userLocations'][0]['long'];
                $city = session()->get('Authenticated_user_data')['userLocations'][0]['city'];
                $country = session()->get('Authenticated_user_data')['userLocations'][0]['country'];

                $token = session()->get('Authenticated_user_data')['token'];
                $response = Http::withToken($token);
                $response = $response->get(''.config('path.path.WebPath').'api/user/getUserLocations');
                $userCities = $response->json()['data'];
                $data = ['limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',
                'lat' => $lat ,
                'category' => $id,
                'long' => $long,
                'country' =>$country,
                'startingDiscount' => $Discountmin,
                'endingDiscount' => $Discountmax,];

                    //DROP DOWN CHANGE CODE
                    if(session()->has('AuthenticatedUserSelectedCities'))
                    {
                            $data['cities[0]'] = session()->get('AuthenticatedUserSelectedCities');    
                    }
                    else
                    {
                        foreach($userCities as $key => $c)
                        {
                            $data['cities['.$key.']'] = $c['city'];
                        }
                    }

                // foreach($userCities as $key => $c)
                // {
                //     $data['cities['.$key.']'] = $c['city'];
                // }
                $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',$data);
                // dd($response->json());
                $loc_yes_no = true;
            }
            elseif( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',[
                    'limit' => 10000,
                    'page' => 1,
                    'category' => $id,
                    'returnType' => 'customPagination',
                    'lat' => (float)session()->get('unAuthUserLocations')['lat'] ,
                    'long' => (float)session()->get('unAuthUserLocations')['long'],
                    'cities[0]' => session()->get('unAuthUserLocations')['city'],
                    'country' =>session()->get('unAuthUserLocations')['country'],
                    'startingDiscount' => $Discountmin,
                    'endingDiscount' => $Discountmax,
                    // 'priceSort' => $price_sort,
                    // 'timeSort' => $time_sort,
                ]);
                $loc_yes_no = true;
            }
            else
            {
                $response = Http::get(''.config('path.path.WebPath').'api/user/getDeals',[
                    'limit' => 10000,
                    'page' => 1,
                    'category' => $id,
                    'returnType' => 'customPagination',
                    'startingDiscount' => $Discountmin,
                    'endingDiscount' => $Discountmax,
                    // 'priceSort' => $price_sort,
                    // 'timeSort' => $time_sort,
                ]);
                $offers_fetched = $response->json()['data'];
                // dd($offers_fetched);
                $loc_yes_no = false;
                $deals = $this->paginate($offers_fetched);
            }

            // dd($response->json());

            if($loc_yes_no)
            {
                if($response->json()['status'] == true)
                {
                    $data = $response->json()['data'];
                    foreach($data as $key => &$datum)
                    {
                        //NearBy Deal
                        $datum['nearby'] = 0;
                        $datum['nearbyBranch'] = 0;
                        $distances = [];
                        $firstDistanceArray = reset($datum['distance']);
                        foreach($datum['distance'] as $i => &$d)
                        {
                        
                            $datum['nearby'] = $firstDistanceArray['distance_in_km'];
                            $datum['nearbyBranch'] = $firstDistanceArray['branch_name'];
            
                            if($d['distance_in_km'] < $datum['nearby'])
                            {
                                $datum['nearby'] = $d['distance_in_km'];
                                $datum['nearbyBranch'] = $d['branch_name'];
                            }
                        }
                    }
                    // foreach($data as $key => &$datum)
                    // {
                    //     $datum['nearby'] = 0;
                    //     $datum['nearbyBranch'] = 0;
                    //     // dd($datum);
                    //     // dd($datum['distance'][$key]);

                    //     foreach($datum['distance'] as &$d)
                    //     {
                    //         // dd($d);
                    //         $datum['nearby'] = $d['distance_in_km'];
                    //         $datum['nearbyBranch'] = $d['branch_name'];
                    //         if($d['distance_in_km'] <= $datum['nearby'])
                    //         {
                    //             $datum['nearby'] = $d['distance_in_km'];
                    //             $datum['nearbyBranch'] = $d['branch_name'];
                    //         }
                    //     }
                    // }
                }
                $deals = $this->paginate($data);
            }
            $category = Http::get(''.config('path.path.WebPath').'api/getCategory/'.$id.'')->json();
            // dd($category);
            $what_page = 'dealsByCat';
            $title = "Category : ".$category['data']['name']."";
            $notifications = null;
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
            }
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }
            echo "<script>";
            echo "var Discountmin = `". $Discountmin ."` ;";
            echo "var Discountmax = `". $Discountmax ."` ;";
            echo "</script>";
            return view('user.categories', compact('AuthUserCities','deals','categories','title','cities','what_page','notifications','UserType'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
                // 'Message' => $response->json()['error'],
            ]);
        }
    }

    public function DealsByCatSorting($id, $sort_type)
    {
        try
        {
            // dd($sortType);
            $UserType = '00';

            // $time_sort = 'N/A';
            // $price_sort = 'asc';
            if($sort_type == 'priceAsc')
            {
                $price_sort = 'asc';
                $title = "Sort : Price Low to High";
            }
            if($sort_type == 'priceDesc')
            {
                $price_sort = 'desc';
                $title = "Sort : Price High to Low";
            }
            if($sort_type == 'dateAsc')
            {
                $time_sort = 'asc';
                $title = "Sort : Newest First";
            }
            if($sort_type == 'dateDesc')
            {
                $time_sort = 'desc';
                $title = "Sort : Oldest First";
            }

            $loc_yes_no = false;
            //SETTING CITIES FOR UN AUTH
            $cities[] = 0;
            if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('unAuthUserLocations')['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }
            elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $session_data = session()->get('unAuthUserLocations');
                $response = Http::get(''.config('path.path.WebPath').'api/getSystemCitiesByCountry',[
                    'country' => session()->get('Authenticated_user_data')['userLocations'][0]['country'],
                ]);
                // dd($request->country);
                $cities = $response->json();
            }

            $url = ''.config('path.path.WebPath').'api/categoryAutoComplete';
            $categories = Http::get($url)->json()['data'];
            // dd($categories);



            
            
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';

                $lat = (float)session()->get('Authenticated_user_data')['userLocations'][0]['lat'];
                $long = (float)session()->get('Authenticated_user_data')['userLocations'][0]['long'];
                $city = session()->get('Authenticated_user_data')['userLocations'][0]['city'];
                $country = session()->get('Authenticated_user_data')['userLocations'][0]['country'];

                $token = session()->get('Authenticated_user_data')['token'];
                $response = Http::withToken($token);
                $response = $response->get(''.config('path.path.WebPath').'api/user/getUserLocations');
                $userCities = $response->json()['data'];

                if($sort_type == 'dateAsc' || $sort_type == 'dateDesc' )
                {
                    $data = ['limit' => 10000,
                    'page' => 1,
                    'returnType' => 'customPagination',
                    'lat' => $lat ,
                    'category' => $id,
                    'long' => $long,
                    'country' =>$country,
                    'timeSort' => $time_sort
                    ];
                }
                elseif($sort_type == 'priceAsc' || $sort_type == 'priceDesc')
                {
                    $data = ['limit' => 10000,
                    'page' => 1,
                    'returnType' => 'customPagination',
                    'lat' => $lat ,
                    'category' => $id,
                    'long' => $long,
                    'country' =>$country,
                    'priceSort' => $price_sort
                    ];
                }

                // dd($data);

                //DROP DOWN CHANGE CODE
                if(session()->has('AuthenticatedUserSelectedCities'))
                {
                        $data['cities[0]'] = session()->get('AuthenticatedUserSelectedCities');    
                }
                else
                {
                    foreach($userCities as $key => $c)
                    {
                        $data['cities['.$key.']'] = $c['city'];
                    }
                }

                // foreach($userCities as $key => $c)
                // {
                //     $data['cities['.$key.']'] = $c['city'];
                // }
                $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',$data);
                $loc_yes_no = true;
            }
            elseif( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
            {
                $UserType = 'LocationUser';

                if($sort_type == 'dateAsc' || $sort_type == 'dateDesc' )
                {
                    $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',[
                        'limit' => 10000,
                        'page' => 1,
                        'category' => $id,
                        'returnType' => 'customPagination',
                        'lat' => (float)session()->get('unAuthUserLocations')['lat'] ,
                        'long' => (float)session()->get('unAuthUserLocations')['long'],
                        'cities[0]' => session()->get('unAuthUserLocations')['city'],
                        'country' =>session()->get('unAuthUserLocations')['country'],
                        // 'priceSort' => $price_sort,
                        'timeSort' => $time_sort,
                    ]);
                }
                elseif($sort_type == 'priceAsc' || $sort_type == 'priceDesc')
                {
                    $response = Http::get(''.config('path.path.WebPath').'api/user/getNearByDeals',[
                        'limit' => 10000,
                        'page' => 1,
                        'category' => $id,
                        'returnType' => 'customPagination',
                        'lat' => (float)session()->get('unAuthUserLocations')['lat'] ,
                        'long' => (float)session()->get('unAuthUserLocations')['long'],
                        'cities[0]' => session()->get('unAuthUserLocations')['city'],
                        'country' =>session()->get('unAuthUserLocations')['country'],
                        'priceSort' => $price_sort,
                        // 'timeSort' => $time_sort,
                    ]);
                }

                
                $loc_yes_no = true;
            }
            else
            {
                if($sort_type == 'dateAsc' || $sort_type == 'dateDesc' )
                {
                    $response = Http::get(''.config('path.path.WebPath').'api/user/getDeals',[
                        'limit' => 10000,
                        'page' => 1,
                        'category' => $id,
                        'returnType' => 'customPagination',
                        // 'priceSort' => $price_sort,
                        'timeSort' => $time_sort,
                    ]);
                }
                elseif($sort_type == 'priceAsc' || $sort_type == 'priceDesc')
                {
                    $response = Http::get(''.config('path.path.WebPath').'api/user/getDeals',[
                        'limit' => 10000,
                        'page' => 1,
                        'category' => $id,
                        'returnType' => 'customPagination',
                        'priceSort' => $price_sort,
                        // 'timeSort' => $time_sort,
                    ]);
                }
                
                $offers_fetched = $response->json()['data'];
                // dd($offers_fetched);
                $loc_yes_no = false;
                $deals = $this->paginate($offers_fetched);
            }

            // dd($response->json());

            if($loc_yes_no)
            {
                if($response->json()['status'] == true)
                {
                    $data = $response->json()['data'];
                    foreach($data as $key => &$datum)
                    {
                        //NearBy Deal
                        $datum['nearby'] = 0;
                        $datum['nearbyBranch'] = 0;
                        $distances = [];
                        $firstDistanceArray = reset($datum['distance']);
                        foreach($datum['distance'] as $i => &$d)
                        {
                        
                            $datum['nearby'] = $firstDistanceArray['distance_in_km'];
                            $datum['nearbyBranch'] = $firstDistanceArray['branch_name'];
            
                            if($d['distance_in_km'] < $datum['nearby'])
                            {
                                $datum['nearby'] = $d['distance_in_km'];
                                $datum['nearbyBranch'] = $d['branch_name'];
                            }
                        }
                    }
                    // foreach($data as $key => &$datum)
                    // {
                    //     $datum['nearby'] = 0;
                    //     $datum['nearbyBranch'] = 0;
                    //     // dd($datum);
                    //     // dd($datum['distance'][$key]);

                    //     foreach($datum['distance'] as &$d)
                    //     {
                    //         // dd($d);
                    //         $datum['nearby'] = $d['distance_in_km'];
                    //         $datum['nearbyBranch'] = $d['branch_name'];
                    //         if($d['distance_in_km'] <= $datum['nearby'])
                    //         {
                    //             $datum['nearby'] = $d['distance_in_km'];
                    //             $datum['nearbyBranch'] = $d['branch_name'];
                    //         }
                    //     }
                    // }
                }
                $deals = $this->paginate($data);
            }
            $category = Http::get(''.config('path.path.WebPath').'api/getCategory/'.$id.'')->json();
            // dd($category);
            $what_page = 'dealsByCat';
            $title = "Category : ".$category['data']['name']."";
            $notifications = null;
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session()->get('Authenticated_user_data')['token'];
                $notifications = $this->getNotifications($token);
                $notifications =  $notifications['data'];
            }
            $AuthUserCities = [];
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $token = session()->get('Authenticated_user_data')['token'];
                $AuthUserCities = $this->getAuthUserLocations($token);
            }
            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
            {
                $UserType = 'User';
                $token = session('Authenticated_user_data')['token'];
                $id = session('Authenticated_user_data')['id'];
                echo "<script>";
                echo "var bearer_token = `". $token ."` ;";
                echo "var id = `". $id ."` ;";
                echo "</script>";
            }

            
            return view('user.categories', compact('AuthUserCities','deals','categories','title','cities','what_page','notifications','UserType'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
                // 'Message' => $response->json()['error'],
            ]);
        }
    }
    public function paginate($items, $perPage = 9, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => Paginator::resolveCurrentPath()] );
    }
    
}
