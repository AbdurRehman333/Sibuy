<footer class="footer darkmode">
    <div class="edge">
        <div class="row margin-top-2">
            <div class="col-md">
                <h5 class="ul-fold white">SiBuy365</h5>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About SiBuy365</a></li>
       
                    <li><a href="{{url('userChat')}}">Connect With Admin</a></li>
               
                    @if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                        <li><a href="{{url('ReferralCode')}}">Refer in your community</a></li>
                    @endif

                </ul>
            </div>
            <div class="col-md">
                <h5 class="ul-fold white">Office in Phnom Penh </h5>
                <ul>
                    {{-- @if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1) --}}
                    <li style="margin-top: 22px;"><a target="_blank" href="https://www.google.com/maps/place/Cambodia/@12.1454395,104.9806145,7z/data=!3m1!4b1!4m5!3m4!1s0x310787bfd4dc3743:0xe4b7bfe089f41253!8m2!3d12.565679!4d104.990963" >
                        
                        <span class="number display-4" style="background-color: #333335;
                        padding: 15px;
                        margin-right: 15px;
                        border-radius: 50%;">01.</span>
                        
                        Chaom Chao, Phnom Penh

                    </a></li>
                    {{-- <li><a href="{{url('chatWithAdmin/19')}}">Meet Sibuy</a></li> --}}
                    {{-- @endif --}}
                    <li style="margin-top: 22px;"><a href="http://t.me/SiBuy365" target="_blank">
                        
                        <span class="number display-4" style="background-color: #333335;
                        padding: 15px;
                        margin-right: 15px;
                        border-radius: 50%;">02.</span>
                        
                        Telegram

                        </a></li>
                    <li style="margin-top: 22px;"><a href="#" >
                        <span class="number display-4" style="background-color: #333335;
                        padding: 15px;
                        margin-right: 15px;
                        border-radius: 50%;">03.</span>

                        support@sibuy365.com

                        </a></li>
                    <li style="margin-top: 22px;"><a href="#" >
                        <span class="number display-4" style="background-color: #333335;
                        padding: 15px;
                        margin-right: 15px;
                        border-radius: 50%;">04.</span>

                        recruitment@sibuy365.com

                        </a></li>
                </ul>
            </div>
            {{-- <div class="col-md">
                <h5 class="ul-fold white">Community</h5>
                <ul>
                    <li><a href="#">Community</a></li>
                    <li><a href="#">Apps</a></li>
                    <li><a href="#">Forum</a></li>
                    <li><a href="#">Pentest</a></li>
                </ul>
            </div> --}}
            <div class="col-md-12 col-lg-4">
                <div class="row">

                    <div style="float: right;width: 100%;text-align: right;">
                        <div class="col-*"> 
                            
                            <img src="{{asset('assets/images/sibuy.png')}}"
                                class="logo" alt="" width="34" height="34" loading="lazy">

                            {{-- <img src="{{asset('assets/images/sibuy.png')}}"
                                class="logo" alt="" width="34" height="34" loading="lazy">
                            <a class="" href="{{url('userChat')}}" data-shop-count="0">
                                    <svg width="34" height="34" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22.4605 3.84888H5.31688C4.64748 3.84961 4.00571 4.11586 3.53237 4.58919C3.05903 5.06253 2.79279 5.7043 2.79205 6.3737V18.1562C2.79279 18.8256 3.05903 19.4674 3.53237 19.9407C4.00571 20.4141 4.64748 20.6803 5.31688 20.6811C5.54005 20.6812 5.75404 20.7699 5.91184 20.9277C6.06964 21.0855 6.15836 21.2995 6.15849 21.5227V23.3168C6.15849 23.6215 6.24118 23.9204 6.39774 24.1818C6.5543 24.4431 6.77886 24.6571 7.04747 24.8009C7.31608 24.9446 7.61867 25.0128 7.92298 24.9981C8.22729 24.9834 8.52189 24.8863 8.77539 24.7173L14.6173 20.8224C14.7554 20.7299 14.918 20.6807 15.0842 20.6811H19.187C19.7383 20.68 20.2743 20.4994 20.7137 20.1664C21.1531 19.8335 21.4721 19.3664 21.6222 18.8359L24.8966 7.05011C24.9999 6.67481 25.0152 6.28074 24.9414 5.89856C24.8675 5.51637 24.7064 5.15639 24.4707 4.84663C24.235 4.53687 23.931 4.28568 23.5823 4.11263C23.2336 3.93957 22.8497 3.84931 22.4605 3.84888ZM23.2733 6.60304L20.0006 18.3847C19.95 18.5614 19.8432 18.7168 19.6964 18.8275C19.5496 18.9381 19.3708 18.9979 19.187 18.9978H15.0842C14.5856 18.9972 14.0981 19.1448 13.6837 19.4219L7.84171 23.3168V21.5227C7.84097 20.8533 7.57473 20.2115 7.10139 19.7382C6.62805 19.2648 5.98628 18.9986 5.31688 18.9978C5.09371 18.9977 4.87972 18.909 4.72192 18.7512C4.56412 18.5934 4.4754 18.3794 4.47527 18.1562V6.3737C4.4754 6.15054 4.56412 5.93655 4.72192 5.77874C4.87972 5.62094 5.09371 5.53223 5.31688 5.5321H22.4605C22.5905 5.53243 22.7188 5.56277 22.8353 5.62076C22.9517 5.67875 23.0532 5.76283 23.1318 5.86646C23.2105 5.97008 23.2642 6.09045 23.2887 6.21821C23.3132 6.34597 23.308 6.47766 23.2733 6.60304Z"
                                            fill="#0B2A97" />
                                        <path
                                            d="M7.84173 11.4233H12.0498C12.273 11.4233 12.4871 11.3347 12.6449 11.1768C12.8027 11.019 12.8914 10.8049 12.8914 10.5817C12.8914 10.3585 12.8027 10.1444 12.6449 9.98661C12.4871 9.82878 12.273 9.74011 12.0498 9.74011H7.84173C7.61852 9.74011 7.40446 9.82878 7.24662 9.98661C7.08879 10.1444 7.00012 10.3585 7.00012 10.5817C7.00012 10.8049 7.08879 11.019 7.24662 11.1768C7.40446 11.3347 7.61852 11.4233 7.84173 11.4233Z"
                                            fill="#0B2A97" />
                                        <path
                                            d="M15.4162 13.1066H7.84173C7.61852 13.1066 7.40446 13.1952 7.24662 13.3531C7.08879 13.5109 7.00012 13.725 7.00012 13.9482C7.00012 14.1714 7.08879 14.3855 7.24662 14.5433C7.40446 14.7011 7.61852 14.7898 7.84173 14.7898H15.4162C15.6394 14.7898 15.8535 14.7011 16.0113 14.5433C16.1692 14.3855 16.2578 14.1714 16.2578 13.9482C16.2578 13.725 16.1692 13.5109 16.0113 13.3531C15.8535 13.1952 15.6394 13.1066 15.4162 13.1066Z"
                                            fill="#0B2A97" />
                                    </svg>
            
                                </a> 
                            
                            </div> --}}
                      
                    </div>
                    
                    {{-- @if(session()->has('Authenticated_user_data'))
                    @if(session()->get('Authenticated_user_data')['type'] == 1)
                    <div style="float: right;width: 100%;text-align: right;">
                        <div class="col-*"> <img src="{{asset('assets/images/sibuy.png')}}"
                                class="logo" alt="" width="34" height="34" loading="lazy">
                            
                            
                                <a class="" href="{{url('userChat')}}" data-shop-count="0">
                                    <svg width="34" height="34" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22.4605 3.84888H5.31688C4.64748 3.84961 4.00571 4.11586 3.53237 4.58919C3.05903 5.06253 2.79279 5.7043 2.79205 6.3737V18.1562C2.79279 18.8256 3.05903 19.4674 3.53237 19.9407C4.00571 20.4141 4.64748 20.6803 5.31688 20.6811C5.54005 20.6812 5.75404 20.7699 5.91184 20.9277C6.06964 21.0855 6.15836 21.2995 6.15849 21.5227V23.3168C6.15849 23.6215 6.24118 23.9204 6.39774 24.1818C6.5543 24.4431 6.77886 24.6571 7.04747 24.8009C7.31608 24.9446 7.61867 25.0128 7.92298 24.9981C8.22729 24.9834 8.52189 24.8863 8.77539 24.7173L14.6173 20.8224C14.7554 20.7299 14.918 20.6807 15.0842 20.6811H19.187C19.7383 20.68 20.2743 20.4994 20.7137 20.1664C21.1531 19.8335 21.4721 19.3664 21.6222 18.8359L24.8966 7.05011C24.9999 6.67481 25.0152 6.28074 24.9414 5.89856C24.8675 5.51637 24.7064 5.15639 24.4707 4.84663C24.235 4.53687 23.931 4.28568 23.5823 4.11263C23.2336 3.93957 22.8497 3.84931 22.4605 3.84888ZM23.2733 6.60304L20.0006 18.3847C19.95 18.5614 19.8432 18.7168 19.6964 18.8275C19.5496 18.9381 19.3708 18.9979 19.187 18.9978H15.0842C14.5856 18.9972 14.0981 19.1448 13.6837 19.4219L7.84171 23.3168V21.5227C7.84097 20.8533 7.57473 20.2115 7.10139 19.7382C6.62805 19.2648 5.98628 18.9986 5.31688 18.9978C5.09371 18.9977 4.87972 18.909 4.72192 18.7512C4.56412 18.5934 4.4754 18.3794 4.47527 18.1562V6.3737C4.4754 6.15054 4.56412 5.93655 4.72192 5.77874C4.87972 5.62094 5.09371 5.53223 5.31688 5.5321H22.4605C22.5905 5.53243 22.7188 5.56277 22.8353 5.62076C22.9517 5.67875 23.0532 5.76283 23.1318 5.86646C23.2105 5.97008 23.2642 6.09045 23.2887 6.21821C23.3132 6.34597 23.308 6.47766 23.2733 6.60304Z"
                                            fill="#0B2A97" />
                                        <path
                                            d="M7.84173 11.4233H12.0498C12.273 11.4233 12.4871 11.3347 12.6449 11.1768C12.8027 11.019 12.8914 10.8049 12.8914 10.5817C12.8914 10.3585 12.8027 10.1444 12.6449 9.98661C12.4871 9.82878 12.273 9.74011 12.0498 9.74011H7.84173C7.61852 9.74011 7.40446 9.82878 7.24662 9.98661C7.08879 10.1444 7.00012 10.3585 7.00012 10.5817C7.00012 10.8049 7.08879 11.019 7.24662 11.1768C7.40446 11.3347 7.61852 11.4233 7.84173 11.4233Z"
                                            fill="#0B2A97" />
                                        <path
                                            d="M15.4162 13.1066H7.84173C7.61852 13.1066 7.40446 13.1952 7.24662 13.3531C7.08879 13.5109 7.00012 13.725 7.00012 13.9482C7.00012 14.1714 7.08879 14.3855 7.24662 14.5433C7.40446 14.7011 7.61852 14.7898 7.84173 14.7898H15.4162C15.6394 14.7898 15.8535 14.7011 16.0113 14.5433C16.1692 14.3855 16.2578 14.1714 16.2578 13.9482C16.2578 13.725 16.1692 13.5109 16.0113 13.3531C15.8535 13.1952 15.6394 13.1066 15.4162 13.1066Z"
                                            fill="#0B2A97" />
                                    </svg>
            
                                </a> 
                            
                            
                            </div>
                    </div>
                    @endif
                    @endif --}}

                   

                    <div class="col-md-6 col-lg-12 text-center text-md-left text-lg-right footer__newsletter" style="display: none;">
                        <h5 class="white">Sign up for the SiBuy365 newsletter</h5>
                        <form>
                            <input type="email" class="email" placeholder="Your e-mail address">
                            <input type="submit" class="submit" value="Subscribe">
                        </form>
                    </div>
                    {{-- <div class="col-md-6 col-lg-12 text-center text-md-right footer__social">
                        <h5 class="white">Follow us on social media</h5>
                        <span class="footer__social-icons"> <span class="footer__social-icons-list"> <a href="#"
                                    target="_blank"><img alt="Facebook"
                                        src="{{asset('assets/USER/img/icons/facebook.svg')}}" width="24px"
                                        height="24px" /></a> <a href="#" target="_blank"><img alt="Instagram"
                                        src="{{asset('assets/USER/img/icons/instagram.svg')}}" width="24px"
                                        height="24px" /></a> <a href="#" target="_blank"><img alt="Youtube"
                                        src="{{asset('assets/USER/img/icons/youtube.svg')}}" width="24px"
                                        height="17px" /></a> <a href="#" target="_blank"><img alt="Twitter"
                                        src="{{asset('assets/USER/img/icons/twitter.svg')}}" width="24px"
                                        height="20px" /></a> </span> </span>
                    </div> --}}
                    <div class="col-md-12 col-lg-12 text-center text-lg-right p-2 footer__copyright">
                        <p>Copyright © 2022 SiBuy365 – All rights reserved
                            <br /> <a href="#" target="_blank">Privacy and Cookie Notice</a> | <a href="#"
                                target="_blank">Terms and Conditions</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <hr> --}}
    {{-- <style>
        .lang_anchors:hover{
            text-decoration: none;
            color: orange;
        }
        .lang_anchors:focus{
            text-decoration: none;
            color: orange;
        }
    </style> --}}
    {{-- <div style="font-size: 16px;">
        <span style="color:#edae47">Select Language : </span> <span> <a class="lang_anchors" href="#">English</a> </span> | <span> <a class="lang_anchors" href="#">Chinese</a> </span> | 
        <span> <a class="lang_anchors" href="#">khmer</a> </span>
    </div> --}}
</footer>