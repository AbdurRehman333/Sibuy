<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReviewController extends Controller
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

    public function AdminAcceptReview($id)
    {
        try{
            // dd($id);
            $token = session()->get('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $review = $response->get(''.config('path.path.WebPath').'api/admin/getReview/'.$id.'')->json()['data'];
            // dd($response);
            $response = Http::withToken($token)->post(''.config('path.path.WebPath').'api/admin/editReview/'.$id.'',
            [
                'deal_id' => $review['deal_id'],
                'notes' => $review['notes'],
                'rating' => $review['rating'],
                'status' => 'approved',
            ]);
            // dd($response);
            return redirect()->back()->with('success','Review Approved Successfully!');

        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminRejectReview($id)
    {
        try{

        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminReviewUpdate(Request $request)
    {
        try{
            // dd($request);
            if($request->rating)
            {
                // dd($request->rating);
                $rating = $request->rating;
            }
            else
            {
                $rating = $request->rating_old;
            }
            // dd($rating);

            // if($rating !== 0)
            // {
            //     $rating = 5;
            // }
            $token = session()->get('Authenticated_user_data')['token'];
            // dd($token);
            $response = Http::withToken($token)->post(''.config('path.path.WebPath').'api/admin/editReview/'.$request->review_id.'',
            [
                'deal_id' => $request->deal_id,
                'notes' => $request->notes,
                'rating' => $rating,
            ]);

            // dd($response->json());

            return redirect()->back()->with('success','Review Updated Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }

    public function AdminEditReview($id)
    {
        // dd($id);
        try{
            $token = session('Authenticated_user_data')['token'];
            $response = Http::withToken($token);
            $response = $response->get(''.config('path.path.WebPath').'api/admin/getReview/'.$id.'');
            $review = $response->json()['data'];
            // dd($review);
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
            return view('Admin.ReviewEdit',compact('review','conversations','notifications'));
        } catch (\Exception $e) {
            return response()->json([
                'Success' => 'False',
                'Error' => $e->getMessage(),
            ]);
        }
    }
}
