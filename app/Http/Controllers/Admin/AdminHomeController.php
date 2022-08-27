<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use QrCode;
use Illuminate\Support\Facades\Http;
// use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminHomeController extends Controller
{
    public function getNotifications($token)
    {
        $response = Http::withToken($token);
        $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
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
                $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
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

    public function AdminAllNotifications()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            // dd($token);
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
                'limit' => 2000,
                'page' => 1,
                'timeSort' => 'desc',
            ]);
            $notifications_to_show = $response->json();
            // dd($notifications);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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

            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";

            return view('Admin.AllNotifications',compact('conversations','notifications_to_show','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function maleUsageStat()
    {
        try{

            $fromAge = 0;
            $toAge = 0;

            $fromDate = null;
            $toDate = null;

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getUsers' , [
                'limit' => 10,
                'page' => 1,
                'returnType' => 'dataTable',
                'status' => 1,
                'gender' => 'male'
            ]);
            $users = $response->json()['data'];
            // dd($users);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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

            $gender = 'male';
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            
            return view('Admin.Users',compact('users','conversations','gender','fromAge','toAge','fromDate','toDate','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function femaleUsageStat()
    {
        try{

            $fromAge = 0;
            $toAge = 0;

            $fromDate = null;
            $toDate = null;

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getUsers' , [
                'limit' => 10,
                'page' => 1,
                'returnType' => 'dataTable',
                'status' => 1,
                'gender' => 'female'
            ]);
            $users = $response->json()['data'];
            // dd($users);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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

            $gender = 'female';
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Admin.Users',compact('users','conversations','gender','fromAge','toAge','fromDate','toDate','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }
    public function UpdateSectionBox(Request $request)
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $file = $request->file('image');
            if($request->hasFile('image'))
            {
                $response->attach('image', $file->get(), $file->getClientOriginalName());
            }
            $response = $response->post('gigiapi.zanforthstaging.com/api/admin/addHomePageSections' , [
                'section' => $request->section,
                'sequence' => $request->sequence,
                'text' => $request->text,
                'data_id' => $request->category,
            ]);
            // dd($response->json());
            if (array_key_exists("error",$response->json()))
            {
                return redirect()->back()->with('alert',$response->json()['error']);
            }

            // dd($response->json());
            return redirect()->back()->with('success','Box Updated');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminHomeSectionEdit($id)
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getHomePageSection/'.$id.'');
            $section = $response->json();

            // dd($section['data']);
            


            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getCategories' , [
                'limit' => 100000,
                'page' => 1,
                'returnType' => 'customPagination'
            ]);
            $categories = $response->json();
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            return view('Admin.HomeSectionEdit',compact('conversations','categories','section','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminHomePageManagement()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            // dd(config('path.path.HomeSectionsPath'));
            // dd($token);
            //CategorySection
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getHomePageSections',[
                'limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',
                'section' => 'category'
            ]);
            $category_section = $response->json();
            foreach($category_section['data'] as &$c)
            {
                $response = Http::withToken($token);
                $response = $response->get('gigiapi.zanforthstaging.com/api/getCategory/'.$c['data_id'].'');
                $c['category_name'] = $response->json()['data']['name'];
            }
            // dd($category_section);
            //upperImageSection
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getHomePageSections',[
                'limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',
                'section' => 'upperImageSection'
            ]);
            $upperImageSection = $response->json();
            foreach($upperImageSection['data'] as &$c)
            {
                $response = Http::withToken($token);
                $response = $response->get('gigiapi.zanforthstaging.com/api/getCategory/'.$c['data_id'].'');
                $c['category_name'] = $response->json()['data']['name'];
            }
            //lowerImageSection
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getHomePageSections',[
                'limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',
                'section' => 'lowerImageSection'
            ]);
            $lowerImageSection = $response->json();
            foreach($lowerImageSection['data'] as &$c)
            {
                $response = Http::withToken($token);
                $response = $response->get('gigiapi.zanforthstaging.com/api/getCategory/'.$c['data_id'].'');
                $c['category_name'] = $response->json()['data']['name'];
            }
            //footerImageSection
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getHomePageSections',[
                'limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',
                'section' => 'footerImageSection'
            ]);
            $footerImageSection = $response->json();
            // dd($footerImageSection);
            foreach($footerImageSection['data'] as &$c)
            {
                $response = Http::withToken($token);
                $response = $response->get('gigiapi.zanforthstaging.com/api/getCategory/'.$c['data_id'].'');
                $c['category_name'] = $response->json()['data']['name'];
            }
            //CatBlocKSection
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getHomePageSections',[
                'limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',
                'section' => 'CatBlockSection'
            ]);
            $CatBlockSection = $response->json();
            foreach($CatBlockSection['data'] as &$c)
            {
                $response = Http::withToken($token);
                $response = $response->get('gigiapi.zanforthstaging.com/api/getCategory/'.$c['data_id'].'');
                $c['category_name'] = $response->json()['data']['name'];
            }
            // dd($CatBlockSection);

            // $token = session()->get('Authenticated_user_data')['token'];
            // $notifications = $this->getNotifications($token);
            // $notifications =  $notifications['data'];

            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
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
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
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
            $notifications = $response->json()['data'];

            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Admin.HomePageManagement',compact('conversations','category_section','upperImageSection','lowerImageSection','footerImageSection','CatBlockSection','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function MaleUsage()
    {
        try{
            // $token = session('Authenticated_user_data')['token'];
            // dd($token);
            // $client = new \GuzzleHttp\Client();
            // $response = Http::withToken($token);
            // // $response = $response->get('gigiapi.zanforthstaging.com/api/merchant/getDeals' , [
            // $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getCategoryStats');
            // $deals = $response->json()['data'];
            // dd($deals);

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
                $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Admin.MaleUsage','conversations','notifications');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminCategoriesStats()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            // dd($token);
            $client = new \GuzzleHttp\Client();
            $response = Http::withToken($token);
            // $response = $response->get('gigiapi.zanforthstaging.com/api/merchant/getDeals' , [
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getCategoryStats');
            $deals = $response->json()['data'];
            // dd($deals);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
                $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Admin.CategoriesStat',compact('deals','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    // AdminPurchaseDealsStats
    public function AdminPurchaseDealsStats()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getPurchaseDealsData' , [
                'limit' => 100000,
                'page' => 1,
                // 'returnType' => 'dataTable',
                'returnType' => 'customPagination',
                'orderBy' => 'desc'
            ]);
            $deals = $response->json()['data'];
            // dd($deals);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            return view('Admin.RedeemeDealsStat', compact('deals','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminRedeemStatFilterbyDate(Request $request)
    {
        try{
            // dd($request);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getPurchaseDealsData' , [
                'limit' => 100000,
                'page' => 1,
                // 'returnType' => 'dataTable',
                'returnType' => 'customPagination',
                'orderBy' => 'desc',
                'fromDate' => $request->min_date,
                'toDate' => $request->max_date,
            ]);
            $deals = $response->json()['data'];
            // dd($deals);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            return view('Admin.RedeemeDealsStat', compact('deals','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminRedeemedDealsStats()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getDeals' , [
                'limit' => 100000,
                'page' => 1,
                // 'returnType' => 'dataTable',
                'returnType' => 'customPagination',
                'status' => 1,
                'active' => 1,
                'orderBy' => 'desc'
            ]);
            $deals = $response->json()['data'];
            // dd($deals);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            return view('Admin.PurchaseDealStats', compact('deals','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function changeStatusOfMerchantAccept($id)
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->post('gigiapi.zanforthstaging.com/api/admin/changeStatusOfMerchant/'.$id.'' , ['status' => 1]);
            // $response = $response->json()['data'];
            return redirect()->back()->with('success', 'Preferences Updated!');
            // dd($response);
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }
    public function changeStatusOfMerchantDecline($id)
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->post('gigiapi.zanforthstaging.com/api/admin/changeStatusOfMerchant/'.$id.'' , ['status' => 0]);
            // $response = $response->json()['data'];
            return redirect()->back()->with('success', 'Preferences Updated!');
            // dd($response);
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminManageReviews(Request $request)
    {
        try{
            // dd(env('UserPath'));
            // dd(config('path.path.UserPath'));
            // config('path.path.UserPath');

            $token = session('Authenticated_user_data')['token'];
            // dd($token);
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getLatestReviews');
            $reviews = $response->json()['data'];

            // dd($reviews);

            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getMerchants' , [
                'limit' => 100,
                'page' => 1,
                'returnType' => 'customPagination',
                'status' => 1,
            ]);
            $merchants = $response->json()['data'];
            // dd($merchants);

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            // $token = session()->get('Authenticated_user_data')['token'];
            // $notifications = $this->getNotifications($token);
            // $notifications =  $notifications['data'];

            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
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
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
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
            $notifications = $response->json()['data'];

            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Admin.Reviews', compact('reviews','merchants','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminAllReviewsFilterUsers(Request $request)
    {
        // dd($request);
        try{
            // $dueDateTime = Carbon::createFromFormat('Y-m-d', $request->min_date);
            // dd($dueDateTime);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getReviews',[
                'limit'=>1000000,
                'page'=>1,
                'returnType'=>'customPagination',
                // 'fromDate' => $request->min_date,
                // 'toDate' => $request->max_date,
            ]);


            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getReviews',[
                        'limit'=>1000000,
                        'page'=>1,
                        'returnType'=>'customPagination',
                        // 'fromDate' => $request->min_date,
                        // 'toDate' => $request->max_date,
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



            $reviews = $response->json()['data'];
            $min_date = Carbon::parse($request->min_date)->format('Y-m-d');
            $max_date  = Carbon::parse($request->max_date)->format('Y-m-d');
            // dd($max_date);
            // dd($fromDate);
            // dd(Carbon::parse($fromDate)->format('Y-m-d'));
            // // DATE HANDLING
            // dd($reviews[0]['created_at']);
            $review_date = Carbon::parse($reviews[0]['created_at'])->format('Y-m-d');
            // dd($review_date);
            // $now = Carbon::now();
            // $result = $max_date->lt($review_date);
            

            // if($min_date > $review_date)
            // {
            //     dd('yes');
            // }
            // else
            // {
            //     dd('no');
            // }
            // dd($result);
            // dd($date);

            foreach($reviews as &$r)
            {
                $r['reply_id'] = 0;
                $r['replied'] = false;

                // if($r['deal_id'] == 0)
                // {

                // }
                // else
                // {
                    $getDeal = Http::withToken($token)->get('gigiapi.zanforthstaging.com/api/admin/getDeal/'.$r['deal_id'].'')->json();

                    // NEW CODE -- START
                    if($getDeal == null)
                    {
                        // dd('yess');
                        $right = false;
                        while($right == false)
                        {
                            $getDeal = Http::withToken($token)->get('gigiapi.zanforthstaging.com/api/admin/getDeal/'.$r['deal_id'].'')->json();
                            if($getDeal == null)
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

                    $r['deal_name'] = $getDeal['data']['name'];
                    $r['merchant_name'] = $getDeal['data']['merchant']['name'];
                // }
                
                // if($getDeal == null)
                // {
                //     dd($r['deal_id']);
                // }
                foreach($reviews as &$reply)
                {
                    $reply['replied_to_someone'] = false;

                    if($r['id'] ==  $reply['parent_id'])
                    {
                        $r['reply_id'] = $reply['id'];
                        $r['replied'] = true;
                        $r['reply_notes'] = $reply['notes'];
                        $r['merchant_name'] = $reply['name'];

                        $reply['deal_id'] = $r['deal_id'];
                        $reply['replied_to_someone'] = true;
                        $reply['replied_to'] = $r['name'];
                    }
                }
                $getDeal == null;
            }

            // dd($reviews);
            $from_filter = 1;
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            // $token = session()->get('Authenticated_user_data')['token'];
            // $notifications = $this->getNotifications($token);
            // $notifications =  $notifications['data'];

            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
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
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
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
            $notifications = $response->json()['data'];

            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Admin.AllReviews',compact('conversations','reviews','min_date','max_date','from_filter','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminAllReviews()
    {
        try{

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getReviews',[
                'limit'=>1000000,
                'page'=>1,
                'returnType'=>'customPagination',
            ]);


            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getReviews',[
                        'limit'=>1000000,
                        'page'=>1,
                        'returnType'=>'customPagination',
                        // 'fromDate' => $request->min_date,
                        // 'toDate' => $request->max_date,
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

            $reviews = $response->json()['data'];

            $min_date = null;
            $max_date  =null;

            foreach($reviews as &$r)
            {
                $r['reply_id'] = 0;
                $r['replied'] = false;

                $getDeal = Http::withToken($token)->get('gigiapi.zanforthstaging.com/api/admin/getDeal/'.$r['deal_id'].'')->json();


                // NEW CODE -- START
                if($getDeal == null)
                {
                    // dd('yess');
                    $right = false;
                    while($right == false)
                    {
                        $getDeal = Http::withToken($token)->get('gigiapi.zanforthstaging.com/api/admin/getDeal/'.$r['deal_id'].'')->json();
                        if($getDeal == null)
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



                $r['deal_name'] = $getDeal['data']['name'];
                $r['merchant_name'] = $getDeal['data']['merchant']['name'];

                foreach($reviews as &$reply)
                {
                    $reply['replied_to_someone'] = false;
                    // $getDeal = Http::withToken($token)->get('gigiapi.zanforthstaging.com/api/admin/getDeal/'.$r['deal_id'].'')->json();

                    // dd($reply['deal_name']);
                    // dd(isset( $reply['deal_name'] ));
                    // dd(isset( $getDeal['data']['name'] ));


                    
                    // $final_array=array_merge($existing_array, $new_array);


                    // $reply['deal_name'] = $getDeal['data']['name'];
                    // $reply['merchant_name'] = $getDeal['data']['merchant']['name'];

                    if($r['id'] ==  $reply['parent_id'])
                    {
                        $r['reply_id'] = $reply['id'];
                        $r['replied'] = true;
                        $r['reply_notes'] = $reply['notes'];
                        $r['merchant_name'] = $reply['name'];

                        $reply['deal_id'] = $r['deal_id'];
                        $reply['replied_to_someone'] = true;
                        $reply['replied_to'] = $r['name'];
                    }
                }
                $getDeal == null;
            }

            // dd($reviews);
            $from_filter = 0;
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            // $token = session()->get('Authenticated_user_data')['token'];
            // $notifications = $this->getNotifications($token);
            // $notifications =  $notifications['data'];

            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
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
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
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
            $notifications = $response->json()['data'];

            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Admin.AllReviews',compact('conversations','reviews','min_date','max_date','from_filter','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function loadBranchesBeforeQR(Request $request)
    {
        $token = session('Authenticated_user_data')['token'];
        $response = Http::withToken($token)->get('gigiapi.zanforthstaging.com/api/user/getPurchaseDeal/'.$request->ID.'');
        $purchasedDeal = $response->json()['data'];
        
        $response = Http::withToken($token)->get('gigiapi.zanforthstaging.com/api/user/getDeal/'.$purchasedDeal['id'].'');
        $deal = $response->json()['data'];
        return $deal;
    }

    public function load_qr(Request $request)
    {
        // return $request->branchID;



        // $response = Http::get('gigiapi.zanforthstaging.com/api/user/getDeal/'.$request->ID.'');
        $token = session('Authenticated_user_data')['token'];
        // return $token;
        $response = Http::withToken($token)->get('gigiapi.zanforthstaging.com/api/user/getPurchaseDeal/'.$request->ID.'');
        $deal = $response->json()['data'];

        $response = Http::get('gigiapi.zanforthstaging.com/api/user/getMerchant/'.$deal['merchant_id'].'');
        $merchant = $response->json()['data'];

        $time_of_purchase = Carbon::parse($deal['created_at'])->format('d F Y');

        $now = Carbon::now();
        $expiry = $deal['additional_discount_date'];
        $result = $now->lt($expiry);

        $str = ''.$deal["purchase_id"].':'.$request->branchID.':'.$deal['purchase_quantity'].':'.$deal["discount_on_price"].':'.$deal["price"].':'.$deal["type"].':'.$deal["availability_status"].':'.$deal["name"].'';

        if($deal['additional_discount'] <= 0 || !$result)
        {
            $AdDiscount = "N/A";
            $AdDiscountDate = "N/A";
        }
        else
        {
            $AdDiscount = $deal['additional_discount'];
            $AdDiscountDate = Carbon::parse($deal['additional_discount_date'])->format('d F Y');
            $str = ''.$deal["purchase_id"].':'.$request->branchID.':'.$deal['purchase_quantity'].':'.$AdDiscount.':'.$deal["price"].':'.$deal["type"].':'.$deal["availability_status"].':'.$deal["name"].'';
        }

        $deal['merchant_name'] = $merchant['name'];
        // $str = "DEALID: ".$deal['id']."\nDeal : ".$deal['name']."\nMerchant : ".$deal['merchant_name']."\nDiscount : ".$deal['discount_on_price']."%\nType : ".$deal['type']."\nActual Price : ".$deal['actual_price']."$\nPrice : ".$deal['price']."$\nAfter Discount : ".$deal['after_discount']."$\nType : ".$deal['type']."";

        // Purchase ID, branch ID, qty, discount on price, price, type, availability status, product name
        // 225:84:1:60:2500:Specific Product:Expired:With Name
        // 228:86:1:40:0:Entire Menu:Available:Offer1
        


        //uncomment this
        // $str = "DEALID: ".$deal['id']."\nDeal : ".$deal['name']."\nMerchant : ".$deal['merchant_name']."\nDiscount : ".$deal['discount_on_price']."%\nType : ".$deal['type']."\nPrice : ".$deal['price']."AZN\nAdditional Discount : ".$AdDiscount."\nAdditional Discount Expiry: ".$AdDiscountDate." \nType : ".$deal['type']." \nTime Of Purchase : ".$time_of_purchase."";
        $variable = $str;
        $variable = ''.QrCode::size(200)->generate($variable).'';
        return $variable;
    }

    public function load_user_for_admin(Request $request)
    {
        // return $request->user_id;

        $token = session('Authenticated_user_data')['token'];
        // return $token;
        $response = Http::withToken($token);
        $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getUser/'.$request->user_id.'');
        $user = $response->json()['data'];
        // return $user;
        // return $user['locations'][0]['city'];
        $join_date = Carbon::parse($user['created_at'])->format('d F y');

        $html = '
            <div> <strong> Name : '.$user['name'].' </strong> </div>
            <div> <strong> Email : '.$user['email'].' </strong> </div>
            <div> <strong> Phone : '.$user['phone'].' </strong> </div>
            <div> <strong> Gender : '.$user['gender'].' </strong> </div>
            <div> <strong> Date of Birth : '.$user['date_of_birth'].' </strong> </div>
            <div> <strong> Join Date : '.$join_date.' </strong> </div>
            <div> <strong> Deals Purchased : '.$user['dealPurchased'].' </strong> </div>
            <div> <strong> Deals Redeemed : '.$user['dealRadeem'].' </strong> </div>';

        if(count($user['locations']) > 0 )
        {
            $html .= ' <div> <strong> Location : '.$user['locations'][0]['city'].','.$user['locations'][0]['country'].' </strong> </div>';
        }

        if(count($user['perference']) > 0)
        {
            $html .='
                <div> <strong> Preferences : </strong> </div>
            ';

            $html .='
                <span class="margin:2px;border: 2px solid gray;
                padding: 4px;"> <strong> | </strong> </span>
                ';

            foreach($user['perference'] as $p)
            {
                $html .='
                <span class="margin:2px;border: 2px solid gray;
                padding: 4px;"> <strong> '.$p['category_name'].' | </strong> </span>
                ';
            }
        }

       

        // <div> <strong> Gender : '.$user['male'].' </strong> </div>
        // <div> <strong> Deals Purchased : '.$user['dealPurchased'].' </strong> </div>
        //     <div> <strong> Deals Redeemed : '.$user['dealRadeem'].' </strong> </div>
        // $html = '<h1> Hello </h1>';

        // $html = '<h1> Hello </h1>';
        return $html;
    }

    public function AdminDashboard()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            // dd($token);
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getUsers' , [
                'limit' => 10000,
                'page' => 1,
                'returnType' => 'dataTable',
                'status' => 1,
                'gender' => 'all',
            ]);
            $users = $response->json()['data'];
            $total = count($users);
            // dd($users);
            // FOR FEMALES
            $teens = 0;
            $adults = 0;
            $adultsPlus = 0;
            $adultsPlusPlus = 0;
            $old = 0;
            $oldPlus = 0;

            $now = Carbon::now();
            foreach($users as &$user)
            {
                if($user['gender'] == 'female')
                {
                    $diff = $now->diffInMonths($user['date_of_birth']);
                    $age = round($diff/12,0);
                    $user['age'] = $age;

                    if($user['age'] > 13 && $user['age'] < 19)
                    {
                        $teens++;
                    }
                    if($user['age'] >= 20 && $user['age'] <= 28)
                    {
                        $adults++;
                    }
                    if($user['age'] >= 29 && $user['age'] <= 35)
                    {
                        $adultsPlus++;
                    }
                    if($user['age'] >= 36 && $user['age'] <= 45)
                    {
                        $adultsPlusPlus++;                   
                    }
                    if($user['age'] >= 46 && $user['age'] <= 60)
                    {
                        $old++;
                    }
                    if($user['age'] >= 60 && $user['age'] <= 100)
                    {
                        $oldPlus++;
                        // dd('OLD+');
                    }
                    // $arr[] = $user;
                }
            }
            // dd($arr);
            $FemaleAgeWiseGraph = [
                '13-19' => $teens,
                '20-28' => $adults,
                '29-35' => $adultsPlus,
                '36-45' => $adultsPlusPlus,
                '46-60' => $old,
                '60+' => $oldPlus,
            ];

            $i = 0;
            echo "<script>";
            foreach($FemaleAgeWiseGraph as $key => $value)
            {
                if($i == 0)
                {
                    echo "var GenderFemaleKey1 = `". $key ."` ;";
                    echo "var GenderFemaleValue1 = ". $value ." ;";
                }
                if($i == 1)
                {
                    echo "var GenderFemaleKey2 = `". $key ."` ;";
                    echo "var GenderFemaleValue2 = ". $value ." ;";
                }
                if($i == 2)
                {
                    echo "var GenderFemaleKey3 = `". $key ."` ;";
                    echo "var GenderFemaleValue3 = ". $value ." ;";
                }
                if($i == 3)
                {
                    echo "var GenderFemaleKey4 = `". $key ."` ;";
                    echo "var GenderFemaleValue4 = ". $value ." ;";
                }
                if($i == 4)
                {
                    echo "var GenderFemaleKey5 = `". $key ."` ;";
                    echo "var GenderFemaleValue5 = ". $value ." ;";
                }
                if($i == 5)
                {
                    echo "var GenderFemaleKey6 = `". $key ."` ;";
                    echo "var GenderFemaleValue6 = ". $value ." ;";
                }
                $i++;
            }
            echo "</script>"; 

            // FOR Males AGE WISE GRAPH
            $teens = 0;
            $adults = 0;
            $adultsPlus = 0;
            $adultsPlusPlus = 0;
            $old = 0;
            $oldPlus = 0;

            $now = Carbon::now();
            foreach($users as &$user)
            {
                if($user['gender'] == 'male')
                {
                    $diff = $now->diffInMonths($user['date_of_birth']);
                    $age = round($diff/12,0);
                    $user['age'] = $age;

                    if($user['age'] > 13 && $user['age'] < 19)
                    {
                        $teens++;
                    }
                    if($user['age'] >= 20 && $user['age'] <= 28)
                    {
                        $adults++;
                    }
                    if($user['age'] >= 29 && $user['age'] <= 35)
                    {
                        $adultsPlus++;
                    }
                    if($user['age'] >= 36 && $user['age'] <= 45)
                    {
                        $adultsPlusPlus++;                   
                    }
                    if($user['age'] >= 46 && $user['age'] <= 60)
                    {
                        $old++;
                    }
                    if($user['age'] >= 60 && $user['age'] <= 100)
                    {
                        $oldPlus++;
                        // dd('OLD+');
                    }
                    // $arr[] = $user;
                }
            }
            // dd($arr);
            $MaleAgeWiseGraph = [
                '13-19' => $teens,
                '20-28' => $adults,
                '29-35' => $adultsPlus,
                '36-45' => $adultsPlusPlus,
                '46-60' => $old,
                '60+' => $oldPlus,
            ];

            $i = 0;
            echo "<script>";
            foreach($MaleAgeWiseGraph as $key => $value)
            {
                if($i == 0)
                {
                    echo "var GenderMaleKey1 = `". $key ."` ;";
                    echo "var GenderMaleValue1 = ". $value ." ;";
                }
                if($i == 1)
                {
                    echo "var GenderMaleKey2 = `". $key ."` ;";
                    echo "var GenderMaleValue2 = ". $value ." ;";
                }
                if($i == 2)
                {
                    echo "var GenderMaleKey3 = `". $key ."` ;";
                    echo "var GenderMaleValue3 = ". $value ." ;";
                }
                if($i == 3)
                {
                    echo "var GenderMaleKey4 = `". $key ."` ;";
                    echo "var GenderMaleValue4 = ". $value ." ;";
                }
                if($i == 4)
                {
                    echo "var GenderMaleKey5 = `". $key ."` ;";
                    echo "var GenderMaleValue5 = ". $value ." ;";
                }
                if($i == 5)
                {
                    echo "var GenderMaleKey6 = `". $key ."` ;";
                    echo "var GenderMaleValue6 = ". $value ." ;";
                }
                $i++;
            }
            echo "</script>"; 

            // dd($MaleAgeWiseGraph);
            // dd($users);







            // //Top Category Stats Cats
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getCategoryStats');
            $cats = $response->json();
            // dd($cats);
            // // Basic Stats
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getDashboardStats');
            $basic_stats = $response->json()['data'];

            // //Top Merchants 
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getTopMerchants');
            $TopMerchants = $response->json()['data'];
            // dd($TopMerchants);

            //SEARCHTERMS
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getMostSearchedTerm');
            $searchTerms = $response->json()['data'];
            // dd($searchTerms);
            // //Top Deals
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getTopDeals');
            $TopDeals = $response->json()['data'];
            // dd($TopDeals);

            // // //Top Cats
            // $response = Http::withToken($token);
            // $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getTopCategories');
            // $cats = $response->json();
            // dd($cats);
            // foreach($cats as $index => $cat){
            //     dd($index);
            // }

            //Purchased Deals
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getDealPurchasedGraphDataMonthWise');
            $PurchasedGraph = $response->json()['data'];

            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getGenderStats',['gender' => 'male' ]);
            $getMaleData = $response->json()['data'];
            // dd($getMaleData);
            // 
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getGenderStats',['gender' => 'female' ]);
            $getFemaleData = $response->json()['data'];


            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getMostSearchedLink');
            $mostSearch = $response->json();
            // dd($mostSearch);


            $i = 0;
            echo "<script>";
            foreach($PurchasedGraph as $key => $value)
            {
                if($i == 0)
                {
                    echo "var label1 = `". $key ."` ;";
                    echo "var prod1 = ". $value ." ;";
                }
                if($i == 1)
                {
                    echo "var label2 = `". $key ."` ;";
                    echo "var prod2 = ". $value ." ;";
                }
                if($i == 2)
                {
                    echo "var label3 = `". $key ."` ;";
                    echo "var prod3 = ". $value ." ;";
                }
                if($i == 3)
                {
                    echo "var label4 = `". $key ."` ;";
                    echo "var prod4 = ". $value ." ;";
                }
                if($i == 4)
                {
                    echo "var label5 = `". $key ."` ;";
                    echo "var prod5 = ". $value ." ;";
                }
                if($i == 5)
                {
                    echo "var label6 = `". $key ."` ;";
                    echo "var prod6 = ". $value ." ;";
                }
                if($i == 6)
                {
                    echo "var label7 = `". $key ."` ;";
                    echo "var prod7 = ". $value ." ;";
                }
                if($i == 7)
                {
                    echo "var label8 = `". $key ."` ;";
                    echo "var prod8 = ". $value ." ;";
                }
                $i++;
            }
            echo "</script>"; 


            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getUsersGraphDataMonthWise');
            $user_graph = $response->json()['data'];

            $i = 0;
            echo "<script>";
            foreach($user_graph as $key => $value)
            {
                if($i == 0)
                {
                    echo "var Ulabel1 = `". $key ."` ;";
                    echo "var Uprod1 = ". $value ." ;";
                }
                if($i == 1)
                {
                    echo "var Ulabel2 = `". $key ."` ;";
                    echo "var Uprod2 = ". $value ." ;";
                }
                if($i == 2)
                {
                    echo "var Ulabel3 = `". $key ."` ;";
                    echo "var Uprod3 = ". $value ." ;";
                }
                if($i == 3)
                {
                    echo "var Ulabel4 = `". $key ."` ;";
                    echo "var Uprod4 = ". $value ." ;";
                }
                if($i == 4)
                {
                    echo "var Ulabel5 = `". $key ."` ;";
                    echo "var Uprod5 = ". $value ." ;";
                }
                if($i == 5)
                {
                    echo "var Ulabel6 = `". $key ."` ;";
                    echo "var Uprod6 = ". $value ." ;";
                }
                if($i == 6)
                {
                    echo "var Ulabel7 = `". $key ."` ;";
                    echo "var Uprod7 = ". $value ." ;";
                }
                if($i == 7)
                {
                    echo "var Ulabel8 = `". $key ."` ;";
                    echo "var Uprod8 = ". $value ." ;";
                }
                $i++;
            }
            echo "</script>"; 

            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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

            return view('Admin.index', compact('mostSearch','conversations','basic_stats', 'TopMerchants','TopDeals','cats','getMaleData','getFemaleData','searchTerms','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }
    public function AdminManageMerchants()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getMerchants' , [
                'limit' => 1000,
                'page' => 1,
                'returnType' => 'customPagination',
                'status' => 2,
                'orderBy' => 'desc',
            ]);
            $merchants = $response->json()['data'];
            // dd($merchants);
            $merchants = $this->paginateMerchantRequest($merchants);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            return view('Admin.ManageMerchants',compact('merchants','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function paginateMerchantRequest($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => Paginator::resolveCurrentPath()] );
    }

    public function ActiveMerchants()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getMerchants' , [
                'limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination',
                'status' => 1,
                'orderBy' => 'desc',
            ]);
            $merchants = $response->json()['data'];
            // dd($merchants);
            $merchants = $this->paginateActiveMerchantRequest($merchants);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            return view('Admin.ActiveMerchants',compact('merchants','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function paginateActiveMerchantRequest($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => Paginator::resolveCurrentPath()] );
    }
    

    public function SearchCoupons(Request $request)
    {
        try{
            // dd($request['query']);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getDeals' , [
                'limit' => 1000,
                'page' => 1,
                // 'returnType' => 'dataTable',
                'returnType' => 'customPagination',
                'status' => 1,
                'active' => 1,
                'orderBy' => 'desc',
                'searchText' => $request['query']
            ]);
            $deals = $response->json()['data'];
            $deals = $this->paginate_for_all_coupons($deals);
            // dd($deals);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            return view('Admin.Coupons',compact('deals','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminCoupons()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getDeals' , [
                'limit' => 1000,
                'page' => 1,
                // 'returnType' => 'dataTable',
                'returnType' => 'customPagination',
                'status' => 1,
                'active' => 1,
                'orderBy' => 'desc'
            ]);

            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getDeals' , [
                        'limit' => 1000,
                        'page' => 1,
                        // 'returnType' => 'dataTable',
                        'returnType' => 'customPagination',
                        'status' => 1,
                        'active' => 1,
                        'orderBy' => 'desc'
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




            $deals = $response->json()['data'];
            $deals = $this->paginate_for_all_coupons($deals);
            // dd($deals);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];

            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Admin.Coupons',compact('deals','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function DealsStoppedByAdmin()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getDeals' , [
                'limit' => 1000,
                'page' => 1,
                // 'returnType' => 'dataTable',
                'returnType' => 'customPagination',
                'status' => 2,
                'active' => 1,
                'orderBy' => 'desc'
            ]);
            $deals = $response->json()['data'];
            // dd($deals);
            $deals = $this->paginate_for_all_coupons($deals);
            // dd($deals);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            return view('Admin.DealsStopped',compact('deals','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function paginate_for_all_coupons($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => Paginator::resolveCurrentPath()] );
    }

    public function AdminAllUsers()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $fromAge = 0;
            $toAge = 0;

            $fromDate = null;
            $toDate = null;


            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getUsers' , [
                'limit' => 10000,
                'page' => 1,
                'returnType' => 'dataTable',
                'status' => 1,
            ]);

            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getUsers' , [
                        'limit' => 10000,
                        'page' => 1,
                        'returnType' => 'dataTable',
                        'status' => 1,
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


            $users = $response->json()['data'];
            // dd($users);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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

            $gender = 'all';
            $token = session()->get('Authenticated_user_data')['token'];
            // $notifications = $this->getNotifications($token);
            // $notifications =  $notifications['data'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
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
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
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
            $notifications = $response->json()['data'];


            $id = session('Authenticated_user_data')['id'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Admin.Users',compact('users','conversations','gender','fromAge','toAge','fromDate','toDate','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminAgeFilterUsers(Request $request)
    {
        try{
            // dd($request);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $gender = $request->gender;

            $fromDate = null;
            $toDate = null;

            if($request->has('fromDate'))
            {
                $fromDate = $request->fromDate;
            }
            if($request->has('toDate'))
            {
                $toDate = $request->toDate;
            }
            // dd($fromDate);
            if($request->gender == 'female')
            {
                $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getUsers' , [
                    'limit' => 10,
                    'page' => 1,
                    'returnType' => 'dataTable',
                    'status' => 1,
                    'fromAge'=> $request->min,
                    'toAge'=> $request->max,
                    'gender' => 'female',
                    'fromDate'=> $fromDate,
                    'toDate'=> $toDate,
                ]);
            }
            elseif($request->gender == 'male')
            {
                $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getUsers' , [
                    'limit' => 10,
                    'page' => 1,
                    'returnType' => 'dataTable',
                    'status' => 1,
                    'fromAge'=> $request->min,
                    'toAge'=> $request->max,
                    'gender' => 'male',
                    'fromDate'=> $fromDate,
                    'toDate'=> $toDate,
                ]);
            }
            else
            {
                $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getUsers' , [
                    'limit' => 10,
                    'page' => 1,
                    'returnType' => 'dataTable',
                    'status' => 1,
                    'fromAge'=> $request->min,
                    'toAge'=> $request->max,
                    'fromDate'=> $fromDate,
                    'toDate'=> $toDate,
                ]);
            }
            
            $fromAge = $request->min;
            $toAge = $request->max;

            $users = $response->json()['data'];
            // dd($users);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            // $token = session()->get('Authenticated_user_data')['token'];
            // $notifications = $this->getNotifications($token);
            // $notifications =  $notifications['data'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
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
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
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
            $notifications = $response->json()['data'];

            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Admin.Users',compact('users','conversations','gender','fromAge','toAge','fromDate','toDate','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminDateFilterUsers(Request $request)
    {
        try{
            // dd($request);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $gender = $request->gender;
            $fromAge = 0;
            $toAge = 0;

            $fromDate = $request->min_date;
            $toDate = $request->max_date;

            if($request->has('fromAge'))
            {
                $fromAge = $request->fromAge;
            }
            if($request->has('toAge'))
            {
                $toAge = $request->toAge;
            }
            // dd($toAge);
            if($request->gender == 'female')
            {
                $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getUsers' , [
                    'limit' => 10,
                    'page' => 1,
                    'returnType' => 'dataTable',
                    'status' => 1,
                    'fromDate'=> $request->min_date,
                    'toDate'=> $request->max_date,
                    'gender' => 'female',
                    'fromAge'=> $fromAge,
                    'toAge'=> $toAge,
                ]);
            }
            elseif($request->gender == 'male')
            {
                $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getUsers' , [
                    'limit' => 10,
                    'page' => 1,
                    'returnType' => 'dataTable',
                    'status' => 1,
                    'fromDate'=> $request->min_date,
                    'toDate'=> $request->max_date,
                    'gender' => 'male',
                    'fromAge'=> $fromAge,
                    'toAge'=> $toAge,
                ]);
            }
            else
            {
                $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getUsers' , [
                    'limit' => 10,
                    'page' => 1,
                    'returnType' => 'dataTable',
                    'status' => 1,
                    'fromDate'=> $request->min_date,
                    'toDate'=> $request->max_date,
                    'fromAge'=> $fromAge,
                    'toAge'=> $toAge,
                ]);
            }

            
            
            $users = $response->json()['data'];
            // dd($users);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            // $token = session()->get('Authenticated_user_data')['token'];
            // $notifications = $this->getNotifications($token);
            // $notifications =  $notifications['data'];

            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
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
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getNotifications',[
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
            $notifications = $response->json()['data'];


            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Admin.Users',compact('users','conversations','gender','fromAge','toAge','fromDate','toDate','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }


    public function AdminMerchantProfile($id)
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getMerchant/'.$id.'?type=admin',[
                'type' => 'admin',
            ]);
            // dd($response);
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getMerchant/'.$id.'?type=admin',[
                        'type' => 'admin',
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

            $merchant = $response->json()['data'];
            // dd($merchant);

            $deals = [];
            if($merchant['status'] == 1)
            {
                $response = Http::withToken($token);
                $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getMerchantDeals/'.$id.'');
    
                // NEW CODE -- START
                if($response->json() == null)
                {
                    // dd('yess');
                    $right = false;
                    while($right == false)
                    {
                        $response = Http::withToken($token);
                        $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getMerchantDeals/'.$id.'');
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
    
                $deals = $response->json()['data'];
            }

            
            
            // dd($deals);
            // 2

            $deals = $this->paginate_for_profile($deals);
            // dd($deals);  
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
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
            return view('Admin.MerchantProfile',compact('merchant','deals','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function paginate_for_profile($items, $perPage = 8, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => Paginator::resolveCurrentPath()] );
    }
}
