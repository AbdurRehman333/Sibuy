<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TagController extends Controller
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

    public function AdminAllTags()
    {
        try{
            $token = session()->get('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/admin/getTags' , [
                'limit' => 100000,
                'page' => 1,
                'returnType' => 'customPagination'
            ]);
            $tags = $response->json();
            // dd($categories);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
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
            // dd($notifications);
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Admin.Tags',compact('tags','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminTagAdd()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
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
            return view('Admin.TagAdd',compact('conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminAddTag(Request $request)
    {
        try{
            $token = session()->get('Authenticated_user_data')['token'];
            $response = Http::withToken($token)->post(''.config('path.path.WebPath').'api/admin/createTag', [
                'name' =>  $request->name,
            ]);
            
            if (array_key_exists("error",$response->json()))
            {
                return redirect()->back()->with('alert',$response->json()['error']);
            }


            return redirect('AdminTagAdd')->with('success','Tag Added Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminTagUpdate(Request $request, $id)
    {
        try{
            $token = session()->get('Authenticated_user_data')['token'];
            $url = ''.config('path.path.WebPath').'api/admin/updateTag/'.$id.'';
            $response = Http::withToken($token);
            $data = [
                'name' => $request->name,
                'parent_id' => $request->parent_id,
            ];
            $response = $response->post($url, $data);

            if (array_key_exists("error",$response->json()))
            {
                return redirect()->back()->with('alert',$response->json()['error']);
            }

            return redirect('AdminEditTag/'.$id.'')->with('success','Tag Updated Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminEditTag($id)
    {
        try{
            $token = session()->get('Authenticated_user_data')['token'];
            //Get Specific Tag Info
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/admin/getTag/'.$id.'');
            $tag = $response->json();
            // dd($tag);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            // NEW CODE -- START
            if($response->json() == null)
            {
                // dd('yess');
                $right = false;
                while($right == false)
                {
                    $response = Http::withToken($token);
                    $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
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
            return view('Admin.TagEdit',compact('tag','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminDeleteTag($id)
    {
        try{
            $token = session()->get('Authenticated_user_data')['token'];
            $response = Http::withToken($token)->post(''.config('path.path.WebPath').'api/admin/deleteTag/'.$id.'');
            // return redirect()->back()->with('alert',$response->json()['message']);
            return redirect()->back()->with('alert','Tag Deleted Successfuly!');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }
}
