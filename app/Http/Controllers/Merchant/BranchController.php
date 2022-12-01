<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Psr7;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BranchController extends Controller
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

    public function MerchantEditbranch($id)
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $url = "'.config('path.path.WebPath').'api/merchant/getBranch/".$id."";
            $response = Http::withToken($token);
            $response = $response->get($url);
            $branch = $response->json()['data'];
            // dd($branch['name']);
            // dd($token);
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
            return view('Merchant.EditBranch',compact('branch','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function EditBranch(Request $request, $id)
    {
        try{
            // dd($request);
            $token = session('Authenticated_user_data')['token'];

            if($request->hasFile('ImageUpload'))
            {
                $image = $request->file('logo');
                $image_path = $request['logo']->getPathname();
                $image_mime = $request['logo']->getmimeType();
                $image_org  = $request['logo']->getClientOriginalName();

                //WORKING
                $response = Http::withToken($token)
                ->attach(
                    'logo', file_get_contents($request->logo), 'image.png'  //working
                )

                ->post(''.config('path.path.WebPath').'api/merchant/updateBranch/'.$id.'', [
                    'name' =>  $request->name,
                    'address' => $request->address,
                    'description' => $request->description,
                    'country' => $request->country,
                    'city' => $request->city,
                    'lat' => $request->lat,
                    'long' => $request->long,
                ]);

                // dd($response->json());
                // return redirect()->back();
                return redirect('MerchantEditbranch/'.$id.'')->with('success', 'Branch Updated Successfully!');
            }
            //WORKING
            $response = Http::withToken($token)->post(''.config('path.path.WebPath').'api/merchant/updateBranch/'.$id.'', [
                'name' =>  $request->name,
                'address' => $request->address,
                'description' => $request->description,
                'country' => $request->country,
                'city' => $request->city,
                'lat' => $request->lat,
                'long' => $request->long,
            ]);

            // dd($response->json());
            // return redirect()->back();
            return redirect('MerchantEditbranch/'.$id.'')->with('success', 'Branch Updated Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }


    public function MerchantDeletebranch($id)
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $url = "'.config('path.path.WebPath').'api/merchant/deleteBranch/".$id."";
            $response = Http::withToken($token);
            $response = $response->post($url);
            // dd($response->json());
            if (array_key_exists("error",$response->json()))
            {
                if($response->json()['error'] == 'This branch contains deals. You cannot delete this branch.')
                {
                    return redirect()->back()->with('alert', 'This branch contains deals. You cannot delete this branch!');   
                }
            }
            return redirect()->back()->with('success', 'Branch Deleted Sucessfully!');   
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function MerchantAddBranch()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];
            $id = session('Authenticated_user_data')['id'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Merchant.AddBranch',compact('conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function MerchantBranches()
    {
        try{
            $token = session('Authenticated_user_data')['token'];
            // dd($token);
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/merchant/getBranches' , [
                'limit' => 10000,
                'page' => 1,
                'returnType' => 'customPagination'
                // 'returnType' => 'dataTable',
                // 'status' => 'default 1',
            ]);
            $branches = $response->json();
            // dd($branches);
            $branches = $this->paginate($branches['data']);
            // dd($branches);
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
            $conversations = $response->json()['data'];
            $id = session('Authenticated_user_data')['id'];
            $token = session()->get('Authenticated_user_data')['token'];
            $notifications = $this->getNotifications($token);
            $notifications =  $notifications['data'];
            echo "<script>";
            echo "var bearer_token = `". $token ."` ;";
            echo "var id = `". $id ."` ;";
            echo "</script>";
            return view('Merchant.Branches',compact('branches','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => Paginator::resolveCurrentPath()] );
    }

    public function AddBranch(Request $request)
    {
        try{
            // dd($request);
            $token = session('Authenticated_user_data')['token'];

            $image = $request->file('logo');
            $image_path = $request['logo']->getPathname();
            $image_mime = $request['logo']->getmimeType();
            $image_org  = $request['logo']->getClientOriginalName();

            //WORKING
            $response = Http::withToken($token)
            ->attach(
                'logo', file_get_contents($request->logo), 'image.png'  //working
            )

            // ->attach('file', $request->logo->getRealPath())
            
            ->post(''.config('path.path.WebPath').'api/merchant/createBranch', [
                'name' =>  $request->name,
                'address' => $request->address,
                'lat' => $request->lat,
                'long' => $request->long,
                'description' => $request->description,
                'country' => $request->country,
                'city' => $request->city,
            ]);

            // dd($response->json());
            return redirect('MerchantAddBranch')->with('success', 'Branch Added Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }
}
