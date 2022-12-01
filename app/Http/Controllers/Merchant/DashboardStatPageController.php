<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardStatPageController extends Controller
{
    // public function TotalDealsSaleStat()
    // {
    //     // dd(1);
    //     try{
    //         $token = session('Authenticated_user_data')['token'];
    //         $response = Http::withToken($token);
    //         $response = $response->get(''.config('path.path.WebPath').'api/merchant/getPurchaseDealsData' , [
    //             'limit' => 100000,
    //             'page' => 1,
    //             // 'returnType' => 'dataTable',
    //             'returnType' => 'customPagination',
    //             'orderBy' => 'desc'
    //         ]);
    //         $deals = $response->json()['data'];
    //         // dd($deals);
    //         return view('Merchant.TotalDealsSaleStat', compact('deals'));
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'Success' => 'False',
    //             'Error' => $e->getMessage(),
    //         ]);
    //     }
    // }

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

    public function MerchantCategoriesStat()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            // dd($token);
            $client = new \GuzzleHttp\Client();
            $response = Http::withToken($token);
            // $response = $response->get(''.config('path.path.WebPath').'api/merchant/getDeals' , [
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getCategoryStats');
            $deals = $response->json()['data'];
            // dd($deals);

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
            // dd(1);
            return view('Merchant.CategoriesStat',compact('deals','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function MerchantTotalSales()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            // dd($token);
            $client = new \GuzzleHttp\Client();
            $response = Http::withToken($token);
            // $response = $response->get(''.config('path.path.WebPath').'api/merchant/getDeals' , [
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getPurchaseDealsData' , [
                // 'returnType' => 'customPagination',
                // 'returnType' => 'dataTable',
                'limit' => 100000,
                'status' => 'all',
                'active' => 1,
                'orderBy' => 'desc'
            ]);
            $deals = $response->json()['data'];
            // dd($deals);
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

            return view('Merchant.TotalSalesStat',compact('deals','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function MerchantDateFilterTotalSales(Request $request)
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            // dd($token);
            $client = new \GuzzleHttp\Client();
            $response = Http::withToken($token);
            // $response = $response->get(''.config('path.path.WebPath').'api/merchant/getDeals' , [
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getPurchaseDealsData' , [
                // 'returnType' => 'customPagination',
                // 'returnType' => 'dataTable',
                'limit' => 100000,
                'status' => 'all',
                'active' => 1,
                'orderBy' => 'desc',
                'fromDate' => $request->min_date,
                'toDate' => $request->max_date,
            ]);
            $deals = $response->json()['data'];
            // dd($deals);
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

            return view('Merchant.TotalSalesStat',compact('deals','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }
}
