<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class MerchantHomeController extends Controller
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

    public function BankDetails()
    {
        try{

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];

            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";

            return view('Merchant.BankDetails',compact('conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function Transactions()
    {
        try{

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];

            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";

            return view('Merchant.Transactions',compact('conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }
    
    public function RequestPayment()
    {
        try{

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];

            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";

            return view('Merchant.RequestPayment',compact('conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function MerchantAllNotifications()
    {
        try{
            // dd(1);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getNotifications',[
                'limit' => 2000,
                'page' => 1,
                'timeSort' => 'desc',
            ]);
            $notifications_to_show = $response->json();
            // dd($notifications);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];

            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";

            return view('Merchant.MerchantNotifications',compact('conversations','notifications_to_show','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    // public $conversations;

    // public function __construct()
    // {
    //     // dd(session('Authenticated_user_data'));
    //     $token = session('Authenticated_user_data')['token'];
    //     $response = Http::withToken($token);
    //     $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
    //     $convos = $response->json()['data'];

    //     $this->conversations = $convos;
    // }

    public function paginate_for_all_coupons($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => Paginator::resolveCurrentPath()] );
    }

    public function MerchantSearchCoupons(Request $request)
    {
        try{
            // dd($this->conversations);
            // dd($request['query']);
            $token = session('Authenticated_user_data')['token'];
            // dd($token);
            $response = Http::withToken($token);
            // $response = $response->get(''.config('path.path.WebPath').'api/merchant/getDeals' , [
            //     'returnType' => 'customPagination',
            //     'limit' => 1000,
            //     'status' => 1,
            //     'active' => 1,
            //     'orderBy' => 'desc',
            //     // 'searchText' => $request['query']
            // ]);
            // dd($response);

            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getDeals' , [
                // 'returnType' => 'customPagination',
                'returnType' => 'dataTable',
                'status' => 'all',
                'active' => 1,
                'orderBy' => 'desc',
                'searchText' => $request['query']
            ]);

            $deals = $response->json()['data'];
            $offers = $this->paginate_for_all_coupons($deals);
            // dd($offers);
            $is_Inactive = 0;
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getTopCategories');
            $topCats = $response->json();

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";

            return view('Merchant.offers',compact('offers','topCats','is_Inactive','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function MerchantDashboard()
    {
        // try{
            $token = session('Authenticated_user_data')['token'];
            // dd($token);
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getDashboardStats');
            $dashboardStats = $response->json();
            // dd($dashboardStats);
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getTopCategories');
            $topCats = $response->json();

            // $response = Http::withToken($token);
            // $response = $response->get(''.config('path.path.WebPath').'api/merchant/getCategoryStats');
            // $topCats = $response->json();
            // dd($topCats[0]);


            // dd($topCats);
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getRecentDeals');
            $recentDeals = $response->json();
            // dd($recentDeals);
                // dd($token);
            //Merchant Profile
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getProfile');
            $getProfile = $response->json()['data'];
            // dd($getProfile);
            // $response = Http::withToken($token);
            // $response = $response->get(''.config('path.path.WebPath').'api/merchant/getProfile');
            // $getProfile = $response->json()['data'];
            //PENDING DEALS
            $client = new \GuzzleHttp\Client();
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getDeals' , [
                'returnType' => 'customPagination',
                'limit' => 1000,
                'status' => 0,
                'active' => 1,
            ]);
            $offers = $response->json();
            // dd($offers);

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            // dd(session()->get('Authenticated_user_data'));
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";

            // $conversations = $this->conversations;
            return view('Merchant.index',compact('dashboardStats','topCats','recentDeals','getProfile','offers','conversations','notifications'));
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'Success' => 'False',
        //         'Error' => $e->getMessage(),
        //     ]);
        // }
    }

    public function MerchantProfile()
    {
        try{

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";

            return view('Merchant.Profile',compact('conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }    

    

}
