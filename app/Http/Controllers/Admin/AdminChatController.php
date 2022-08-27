<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminChatController extends Controller
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
    
    public function AdminOpenUserChat($id)
    {
        $my_id = session('Authenticated_user_data')['id'];
        $token = session('Authenticated_user_data')['token'];
        $response = Http::withToken($token);
        $response = $response->post('gigiapi.zanforthstaging.com/api/createConversation',
        [ 'message' => 'Hello' , 'receiver' => $id] );
        $conversation = $response->json()['data'];
        $convo_id = $conversation['id'];
        return redirect()->back()->with('success','Chat Opened! Now You Can Contact This User From Chat Sidebar');
    }

    public function AdminchatWithMerchant(Request $request,$id)
    {
        // dd($id);
        // return $request->merchant_id;
        $my_id = session('Authenticated_user_data')['id'];

        $token = session('Authenticated_user_data')['token'];
        $response = Http::withToken($token);
        $response = $response->post('gigiapi.zanforthstaging.com/api/createConversation',
        [ 'message' => 'Hello' , 'receiver' => $id] );
        $conversation = $response->json()['data'];

        // dd($conversation['id']);
        $convo_id = $conversation['id'];

        //Get Conversation
        // $response = Http::withToken($token);
        // $response = $response->get('gigiapi.zanforthstaging.com/api/getConversation/'.$convo_id.'');
        // $conversation = $response->json()['data'];
        // // dd($conversation);
        // //Get Conversation Messages
        // $response = Http::withToken($token);
        // $response = $response->get('gigiapi.zanforthstaging.com/api/getConversationMessages/'.$convo_id.'');
        // $messages = $response->json()['data'];
        // //All Conversations to show
        // $response = Http::withToken($token);
        // $response = $response->get('gigiapi.zanforthstaging.com/api/getConversations');
        // $conversations = $response->json()['data'];

        return redirect()->back()->with('success','Chat Opened! Now You Can Contact This Merchant From Chat Sidebar');



        // $html = ' <ul class="contacts contacts_to_load">';
        // foreach($conversations as $c)
        // {
        //     $html .= ' <li class="active dz-chat-user convo_list_item" data-id="'.$c['id'].'">
        //     <div class="d-flex bd-highlight">
        //         <div class="img_cont">
        //             <img src="images/avatar/1.jpg" class="rounded-circle user_img" alt="" />
        //         </div>
        //         <div class="user_info">
        //             <span>'.$c['opposite_user']['name'].'</span>
        //             <p>'.substr($c['last_message']['message'], 0 ,40).'...</p>
        //         </div>
        //     </div>
        //     </li> ' ;
        // }
        

        // $html .= ' </ul> ';
        // echo $html;
    }

    public function loadConvo_forDashboards_Header(Request $request)
    {

        $id = $request->convo_id;
        $user_id = session('Authenticated_user_data')['id'];

        $token = session('Authenticated_user_data')['token'];
        $response = Http::withToken($token);
        $response = $response->get('gigiapi.zanforthstaging.com/api/getConversation/'.$id.'');
        $conversation = $response->json()['data'];

        $response = Http::withToken($token);
        $response = $response->get('gigiapi.zanforthstaging.com/api/getConversationMessages/'.$id.'');
        $messages = $response->json()['data'];

        $html = ' <h6 class="mb-1">Chat with '.$conversation['opposite_user']['name'].'</h6> ';
        $html .= ' <p class="mb-0 text-success"> Already '.count($messages).' messages </p> ';

        // $html = '<div id="this_content_change_on_load">
        //             <h6 class="mb-1">Chat with Khelesh</h6>
        //             <p class="mb-0 text-success">Online</p>
        //         </div>';    
        echo $html;

    }


    public function loadConvo_forDashboards(Request $request)
    {
        $id = $request->convo_id;
        $user_id = session('Authenticated_user_data')['id'];

        // $id = 1;
        $token = session('Authenticated_user_data')['token'];
        $response = Http::withToken($token);
        $response = $response->get('gigiapi.zanforthstaging.com/api/getConversation/'.$id.'');
        $conversation = $response->json()['data'];

        $token = session('Authenticated_user_data')['token'];
        $response = Http::withToken($token);
        $response = $response->get('gigiapi.zanforthstaging.com/api/getConversationMessages/'.$id.'');
        $messages = $response->json()['data'];

        // $html = '
        // <div class="card chat dz-chat-history-box d-none this_is_to_be_updated_on_convo_load">
        //     <div class="card-header chat-list-header text-center">
        //         <a href="javascript:void(0)" class="dz-chat-history-back">
        //             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"/><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/></g></svg>
        //         </a>
        //         <div>
        //             ';

        // $html .= ' <h6 class="mb-1">Chat with '.$conversation['opposite_user']['name'].'</h6> ';
        // $html .= ' <p class="mb-0 text-success"> Already '.count($messages).' messages </p> ';
        
        // $html .=  '
        //         </div>
        //         <div class="dropdown">
        //             <a href="javascript:void(0)" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
        //             <ul class="dropdown-menu dropdown-menu-right">
        //                 <li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View profile</li>
        //                 <li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close friends</li>
        //                 <li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
        //                 <li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
        //             </ul>
        //         </div>
        //     </div>


        //     <div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3" style="display: flex; flex-direction: column-reverse;"> ';

        //     $count = count($messages);


        //     for($i = $count-1; $i >= 0; $i--)
        //     {
        //         if($messages[$i]['user_id'] == $user_id)
        //         {
        //             $html .= '
        //             <div class="d-flex justify-content-start mb-4">
        //                 <div class="img_cont_msg">
        //                     <img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
        //                 </div>
        //                 <div class="msg_cotainer">
        //                     Hi, how a samim?
        //                     <span class="msg_time">8:40 AM, Today</span>
        //                 </div>
        //             </div> ';
        //         }
        //         else
        //         {
        //             $html .= '    
        //             <div class="d-flex justify-content-end mb-4">
        //                 <div class="msg_cotainer_send">
        //                     Hi Khalid i you?
        //                     <span class="msg_time_send">8:55 AM, Today</span>
        //                 </div>
        //                 <div class="img_cont_msg">
        //                     <img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
        //                 </div>
        //             </div> ';
        //         }
        //     }

            

            


        //     $html .= '  

        //     </div>

        //     <div class="card-footer type_msg">
        //         <div class="input-group">
        //             <textarea class="form-control" placeholder="Type your message..."></textarea>
        //             <div class="input-group-append">
        //                 <button type="button" class="btn btn-primary"><i class="fa fa-location-arrow"></i></button>
        //             </div>
        //         </div>
        //     </div>
        // </div>
        // ';

        if($conversation['first_user'] == $user_id) // If I am first User
            {
                $receiver_id = $conversation['second_user'];
            }
            else
            {
                $receiver_id = $conversation['first_user'];
            }


        // $html .='
        //     <div class="data_from_back">
        //     <input type="hidden" id="convo_id" name="convo_id" value="'.$conversation['id'].'">
        //     <input type="hidden" id="rec_id" name="rec_id" value="'.$receiver_id.'">
        //     <input type="hidden" id="my_id" name="my_id" value="'.$user_id.'">
        //     </div>
        //     ';

        // $html = " <h1> hello </h1>";


        $html = '<div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3" style="display: flex; flex-direction: column-reverse;"> ';


            $html .= '
            <div id="new_msgs_be_here" >

            </div>
            ';

            $count = count($messages);


            for($i = $count-1; $i >= 0; $i--)
            {
                if($messages[$i]['user_id'] == $user_id)
                {
                    $html .= '
                    <div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                            <img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                        </div>
                        <div class="msg_cotainer">
                        '.$messages[$i]['message'].'
                            <span class="msg_time">8:40 AM, Today</span>
                        </div>
                    </div> ';
                }
                else
                {
                    $html .= '    
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                        '.$messages[$i]['message'].'
                            <span class="msg_time_send">8:55 AM, Today</span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
                        </div>
                    </div> ';
                }
            }

            

            $html .= '  </div> ';


            $html .='
            <div class="data_from_back">
            <input type="hidden" id="convo_id" name="convo_id" value="'.$conversation['id'].'">
            <input type="hidden" id="rec_id" name="rec_id" value="'.$receiver_id.'">
            <input type="hidden" id="my_id" name="my_id" value="'.$user_id.'">
            </div>
            ';

        echo $html;
    }
}
