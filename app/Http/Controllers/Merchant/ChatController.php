<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class ChatController extends Controller
{
    public function AdminAndMerchantRefreshConvoList()
    {
        $token = session('Authenticated_user_data')['token'];
        $response = Http::withToken($token);
        $response = $response->get(''.config('path.path.WebPath').'api/getConversations');
        $conversations = $response->json()['data'];
        

        // $html = 'div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body">
        //                 <ul class="contacts">';
        // $html = 'div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body" ';

        $html = '<ul class="contacts">';

        foreach ($conversations as $c)
        {
            $html .= '<li class="active dz-chat-user convo_list_item" data-id="'.$c['id'].'">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont"> ';

            if($c['opposite_user']['profile_picture'] == null)
            {
                $html .=   ' <img src="'.asset('images/avatar/1.jpg').'" class="rounded-circle user_img" alt="" /> ';
            }
            else
            {
                $html .=   ' <img src="'.config('path.path.WebPath').''.config('path.path.UserPath').'/'.$c['opposite_user']['profile_picture'].'" class="rounded-circle user_img" alt="" /> ';
            }



            $html .=   '                        </div>
                                    <div class="user_info">
                                        <span>'.$c['opposite_user']['name'].'</span>
                                        <p>'.substr($c['last_message']['message'], 0 ,40).'...</p>
                                    </div>
                                </div>
                            </li> ';
        }

        $html .= ' </ul>';

        echo $html;
    }

    public function loadConvo_forDashboards_Header(Request $request)
    {

        $id = $request->convo_id;
        $user_id = session('Authenticated_user_data')['id'];

        $token = session('Authenticated_user_data')['token'];
        $response = Http::withToken($token);
        $response = $response->get(''.config('path.path.WebPath').'api/getConversation/'.$id.'');
        $conversation = $response->json()['data'];

        $response = Http::withToken($token);
        $response = $response->get(''.config('path.path.WebPath').'api/getConversationMessages/'.$id.'');
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
        $response = $response->get(''.config('path.path.WebPath').'api/getConversation/'.$id.'');
        $conversation = $response->json()['data'];

        $token = session('Authenticated_user_data')['token'];
        $response = Http::withToken($token);
        $response = $response->get(''.config('path.path.WebPath').'api/getConversationMessages/'.$id.'');
        $messages = $response->json()['data'];

        
        if($conversation['first_user'] == $user_id) // If I am first User
            {
                $receiver_id = $conversation['second_user'];
            }
            else
            {
                $receiver_id = $conversation['first_user'];
            }

        $html = '<div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3" id="ul_chatList_to_refresh" style="display: flex; flex-direction: column-reverse;"> ';


            $html .= '
            <div id="new_msgs_be_here" >

            </div>
            ';

            $count = count($messages);


            for($i = $count-1; $i >= 0; $i--)
            {
                if($messages[$i]['user_id'] == $user_id)
                {
                    $date = Carbon::parse($messages[$i]['created_at'], 'UTC');
                    $date = $date->isoFormat('dddd, h:mm A');

                    $html .= '
                    <div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg"> ';


                    if($messages[$i]['user']['profile_picture'] == null)
                    {
                        $html .= ' <img src="'.asset('images/avatar/1.jpg').'" class="rounded-circle user_img_msg" alt="" /> ';
                    }
                    else
                    {
                        $html .= ' <img src="'.config('path.path.WebPath').''.config('path.path.UserPath').'/'.$messages[$i]['user']['profile_picture'].'" class="rounded-circle user_img_msg" alt="" /> ';
                    }


                    $html .= '     </div>
                        <div class="msg_cotainer">
                        '.$messages[$i]['message'].'
                            <span class="msg_time">'.$date.'</span>
                        </div>
                    </div> ';
                }
                else
                {
                    $date = Carbon::parse($messages[$i]['created_at'], 'UTC');
                    $date = $date->isoFormat('dddd, h:mm A');

                    $html .= '    
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                        '.$messages[$i]['message'].'
                            <span class="msg_time_send">'.$date.'</span>
                        </div>
                        <div class="img_cont_msg"> ';

                    if($messages[$i]['user']['profile_picture'] == null)
                    {
                        $html .= '        <img src="'.asset('images/avatar/2.jpg').'" class="rounded-circle user_img_msg" alt="" />';
                    }
                    else
                    {
                        $html .= ' <img src="'.config('path.path.WebPath').''.config('path.path.UserPath').'/'.$messages[$i]['user']['profile_picture'].'" class="rounded-circle user_img_msg" alt="" />';
                    }
                    

                    $html .= '    </div>
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
