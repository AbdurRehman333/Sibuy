<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryController extends Controller
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

    public function AdminAllCategories()
    {
        try{
            $token = session()->get('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getCategories' , [
                'limit' => 100000,
                'page' => 1,
                'returnType' => 'customPagination'
            ]);
            $categories = $response->json();
            // dd($categories);
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
            return view('Admin.Categories',compact('categories','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminCategoryAdd()
    {
        try{
            $token = session()->get('Authenticated_user_data')['token'];

            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getCategories' , [
                'limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination'
            ]);
            $categories = $response->json();
            // dd($categories);
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
            return view('Admin.CategoryAdd',compact('categories','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminAddCategory(Request $request)
    {
        try{
            $token = session()->get('Authenticated_user_data')['token'];
            $response = Http::withToken($token)->attach('image', file_get_contents($request->image), 'SomeName.png')
            ->post('gigiapi.zanforthstaging.com/api/admin/createCategory', [
                'name' =>  $request->name,
                'parent_id' => $request->parent_id,
            ]);
            
            if (array_key_exists("error",$response->json()))
            {
                return redirect()->back()->with('alert',$response->json()['error']);
            }

            return redirect('AdminCategoryAdd')->with('success','Category Added Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminCategoryUpdate(Request $request, $id)
    {
        try{
            $token = session()->get('Authenticated_user_data')['token'];
            $url = 'gigiapi.zanforthstaging.com/api/admin/updateCategory/'.$id.'';
            $response = Http::withToken($token);
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $response = Http::withToken($token)->attach('image', $file->get(), $file->getClientOriginalName());
            }
            $data = [
                'name' => $request->name,
                'parent_id' => $request->parent_id,
            ];
            $response = $response->post($url, $data)->json();
            
            if (array_key_exists("error",$response))
            {
                return redirect()->back()->with('alert',$response['error']);
            }
            
            // dd($response);
            return redirect('AdminEditCategory/'.$id.'')->with('success','Category Updated Successfully!');
            // return redirect()->back('success','Category Updated Successfully!');
            // dd($response->json());
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminEditCategory($id)
    {
        try{
            // dd($id);
            $token = session()->get('Authenticated_user_data')['token'];
            //All Categories
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getCategories' , [
                'limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination'
            ]);
            $categories = $response->json();
            //Get Specific Category Info
            $response = Http::withToken($token);
            $response = $response->get('gigiapi.zanforthstaging.com/api/admin/getCategory/'.$id.'');
            $category = $response->json();
            // dd($category);
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
            return view('Admin.CategoryEdit',compact('categories','category','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminDeleteCategory($id)
    {
        try{
            $token = session()->get('Authenticated_user_data')['token'];
            $response = Http::withToken($token)->post('gigiapi.zanforthstaging.com/api/admin/deleteCategory/'.$id.'');
            // dd($response->json());

            if (array_key_exists("error",$response->json()))
            {
                return redirect()->back()->with('alert',$response->json()['error']);
            }
            
            // dd($response);
            return redirect()->back()->with('success','Category Deleted Successfully!');

            // return redirect()->back();
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }
}
