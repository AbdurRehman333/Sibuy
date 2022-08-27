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
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Events\SendMessage;


class AjaxLoadDealsController extends Controller
{
    public function LoadDeals($id)
    {


        //Store Deals IDs in Session.
        // $session_data = session()->get('cart_info');
        // $existing_ids_in_session = Arr::pluck(session()->get('cart_info'), 'deal_id');
        // if (in_array($id, $existing_ids_in_session))
        // Session::put('cart_info', $session_data);
        $data[] = $id;
        // session()->forget('categories_selected');
        $session_data = session()->get('categories_selected');
        if($session_data)
        {
            $inSession = $session_data;
            foreach($inSession as $d)
            {
                $data[] = $d;
            }
            Session::put('categories_selected', $data);
        }
        else
        {
            Session::put('categories_selected', $data);
        }

        // return session()->get('categories_selected');
        // return session()->get('categories_selected')[0];
        

        // Session::put('cart_info', $session_data);




        $cities[] = 0;
        if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
        {
            $session_data = session()->get('unAuthUserLocations');
            $response = Http::get('gigiapi.zanforthstaging.com/api/getSystemCitiesByCountry',[
                'country' => session()->get('unAuthUserLocations')['country'],
            ]);
            $cities = $response->json();
        }
        elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
        {
            $session_data = session()->get('unAuthUserLocations');
            $response = Http::get('gigiapi.zanforthstaging.com/api/getSystemCitiesByCountry',[
                'country' => session()->get('Authenticated_user_data')['location']['country'],
            ]);
            $cities = $response->json();
        }
        $url = 'gigiapi.zanforthstaging.com/api/categoryAutoComplete';
        $categories = Http::get($url)->json()['data'];
        if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
        {
            $lat = (float)session()->get('Authenticated_user_data')['location']['lat'];
            $long = (float)session()->get('Authenticated_user_data')['location']['long'];
            $city = session()->get('Authenticated_user_data')['location']['city'];
            $country = session()->get('Authenticated_user_data')['location']['country'];

            $token = session()->get('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/user/getUserLocations');
            $userCities = $response->json()['data'];
            $data = [
            'limit' => 10000,
            'page' => 1,
            'returnType' => 'customPagination',
            'lat' => $lat ,
            'long' => $long,
            'country' =>$country];

            foreach($userCities as $key => $c)
            {
                $data['cities['.$key.']'] = $c['city'];
            }
            $response = Http::get('gigiapi.zanforthstaging.com/api/user/getNearByDeals',$data);
            if($response->json()['status'] == true)
            {
                $data = $response->json()['data'];
                foreach($data as $key => &$datum)
                {
                    $datum['nearby'] = 0;
                    $datum['nearbyBranch'] = 0;
                    foreach($datum['distance'] as &$d)
                    {
                        // dd($d);
                        $datum['nearby'] = $d['distance_in_km'];
                        $datum['nearbyBranch'] = $d['branch_name'];
                        if($d['distance_in_km'] <= $datum['nearby'])
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
            $response = Http::get('gigiapi.zanforthstaging.com/api/user/getNearByDeals',[
                'limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',
                'lat' => (float)session()->get('unAuthUserLocations')['lat'] ,
                'long' => (float)session()->get('unAuthUserLocations')['long'],
                'cities[0]' => session()->get('unAuthUserLocations')['city'],
                'country' =>session()->get('unAuthUserLocations')['country'],
            ]);
            if($response->json()['status'] == true)
            {
                $data = $response->json()['data'];
                foreach($data as $key => &$datum)
                {
                    $datum['nearby'] = 0;
                    $datum['nearbyBranch'] = 0;
                    foreach($datum['distance'] as &$d)
                    {
                        $datum['nearby'] = $d['distance_in_km'];
                        $datum['nearbyBranch'] = $d['branch_name'];
                        if($d['distance_in_km'] <= $datum['nearby'])
                        {
                            $datum['nearby'] = $d['distance_in_km'];
                            $datum['nearbyBranch'] = $d['branch_name'];
                        }
                    }
                }
            }
            $deals = $this->paginate($data);
        }
        else
        {
            $response = Http::get('gigiapi.zanforthstaging.com/api/user/getDeals',[
                'limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination'
            ]);
            $offers_fetched = $response->json()['data'];
            $deals = $this->paginate($offers_fetched);
        }


        return $deals;


        $html = `<div> `;
        
        // src=`.'https://gigiapi.zanforthstaging.com/'.$deal['image']['path'].'/'.$deal['image']['image'].''.`
        
        foreach($deals as $key => $deal)
        {
            $html .= ` <div>
                <a href="`.URL('discount_details/'.$deal['id']).`" data-id="`.$deal['id'].`" class="Anchor_included_all">

                <img 
                style='width:100%; height:250px; object-fit: contain;'
                
           
                src='https://gigiapi.zanforthstaging.com/images/deals/ade6e09783544caec854ad48435231b4.png'
                
                />



            `;
            $html .= `</div> `;
            return $html;

            $html .= `







                    <div class='col-md-4 discount-card' style='padding: 10px; cursor: pointer;'> `;

                            if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                            {
                                $html .= ` <span class="ma_heart" data-id="`.$deal['id'].`" id="`.$deal['id'].`_maHeart" onmouseover="maHeartHover(this)"
                                style="
                                font-size: 37px;
                                right: 0;
                                /* right :33px; */
                                color : #b45b5b;
                                position: absolute;"
                                ><i class="fa fa-heart" aria-hidden="true"></i></span> `;
                            }
                            
                        $html .= `<img 
                        style='width:100%; height:250px; object-fit: contain;'
                        src='`.'https://gigiapi.zanforthstaging.com/'.$deal['image']['path'].'/'.$deal['image']['image'].''.`' />

                        <p style="margin-bottom: 0px;"><span> `.$deal['merchant_name'].`</span></p> `;

                        $length = Str::length($deal['name']);
                        
        
                        if($length >= 0  && $length < 10)
                        {
                            $html .= `
                            <b style='font-size: 18px;'>`.$deal['name'].` 
                                <span class="random_text `.$length.`" style="visibility: hidden;">11111111111111111111111111111111111111</span>
                            </b> `;
                        }
                        
                        elseif($length >= 10 && $length < 20)
                        {
                            $html .= ` <b style='font-size: 18px;'>`.$deal['name'].` 
                            <span class="random_text `.$length.`" style="visibility: hidden;">34239042308402938049151</span>
                        </b> `;
                        }
                        elseif($length >= 20 && $length < 30)
                        {
                            $html .= ` <b style='font-size: 18px;'>`.$deal['name'].` 
                            <span class="random_text `.$length.`" style="visibility: hidden;">342390423084029</span>
                            </b> `;
                        }
                        else
                        {
                            $html .= ` <b style='font-size: 18px;'>`.$deal['name'].`</b> `;
                        }

                        $blue_text = ($deal['discount_on_price'] / 100) * $deal['price'];
                        $blue_text =  $deal['price'] - $blue_text;

                        $now = Carbon::now();
                        $expiry = $deal['additional_discount_date'];
                        $result = $now->lt($expiry);
                        
                        $html .= `
                        <br /><span class='deal_des'>
                            `.substr($deal['description'], 0, 40).`...
                        
                        
                    
                            </span>
                            <br /> `;
                        
                            if($deal['type'] == 'Entire Menu')
                            {

                            
                                $html .= ` <span class='old-price' style="display: none;">`.$blue_text.`</span>
                                        <img style="margin-bottom: 7px;margin-left: -5px; visibility:hidden" src="`.asset('assets/mannatIconBlack.png').`" width="20px" alt=""> `;
                                    
                                $price_to_pay_in_double_discount = $deal['price'] - ($deal['price'] * ($deal['additional_discount'] / 100) );
                                    
                                $html .= `<span
                                        class='new-price' style="color: #d30b0b;">Entire Menu</span> `;
                            }
                            else
                            {

                                if($deal['additional_discount'] && $result)
                                {

                                
                                    if($deal['additional_discount'] > 0 )
                                    {

                                    

                                        $html .= ` <span class='old-price'>`.$blue_text.`</span>
                                        <img style="    margin-bottom: 7px;margin-left: -5px;" src="`.asset('assets/mannatIconBlack.png').`" width="20px" alt="">`;


                                        // @php
                                            $price_to_pay_in_double_discount = $deal['price'] - ($deal['price'] * ($deal['additional_discount'] / 100) );
                                        // @endphp

                                        $html .= ` <span
                                        class='new-price' style="color: #d30b0b;">`.$price_to_pay_in_double_discount.`Azn</span> `;

                                    }
                                }
                                else{

                                
                                    $html .= `
                                    <span class='old-price'>`.$deal['price'].`</span>
                                    <img style="    margin-bottom: 7px;margin-left: -5px;" src="`.asset('assets/mannatIconBlack.png').`" width="20px" alt="">


                                    <span
                                        class='new-price'>`.$blue_text.`</span>
                                        <img style="    margin-bottom: 7px;margin-left: -5px;" src="`.asset('assets/mannatIcon.webp').`" width="20px" alt="">
                                    `;

                                }     
                            }
                            $html .= `
                            &nbsp; `;
                            if($deal['additional_discount'] && $result)
                            {

                            
                                if($deal['additional_discount'] > 0)
                                {

                                

                                    $html .= ` <span class='percent-off' style="background-color: #d30b0b;">`.$deal['additional_discount'].`%
                                    OFF</span> `;

                                }
                            }else
                            {

                            
                                $html .= ` <span class='percent-off'>`.$deal['discount_on_price'].`%
                                OFF</span> `;
                            }


                        if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                        {
                            $html .= `  <hr>
                                <div class='location'>`.$deal['nearbyBranch'].`</div>
                                <div class='nearkm'>Near <span>`.$deal['nearby'].` KMs</span></div>
                                }elseif(!session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations')) `;
                                    {
                                        $html .= ` <hr>
                                    <div class='location'>`.$deal['nearbyBranch'].`</div>
                                    <div class='nearkm'>Near <span>`.$deal['nearby'].` KMs</span></div> `;
                                    }
                        }

                        $html .= `
                        </div>
                    </a>
                </div>
                `;
            // $html .= ` </div>`;

        }
        return $html;
    }

    public function paginate($items, $perPage = 9, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => 'categories'] );
    }
}
