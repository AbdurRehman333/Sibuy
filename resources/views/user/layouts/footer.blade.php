<footer class="footer darkmode">
    <div class="edge">
        <div class="row margin-top-2">
            <div class="col-md">
                <h5 class="ul-fold white">GiGi</h5>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Gigi</a></li>
                    {{-- @if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1) --}}
                    <li><a href="{{url('chatWithAdmin/19')}}">Connect With Admin</a></li>
                    {{-- @endif --}}

                    <li><a href="#">In your community</a></li>
                </ul>
            </div>
            <div class="col-md">
                <h5 class="ul-fold white">Work with GiGi</h5>
                <ul>
                    {{-- @if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1) --}}
                    <li><a href="{{url('chatWithAdmin/19')}}">Meet Gigi</a></li>
                    {{-- @endif --}}
                    <li><a href="#">Terms and Conditions</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md">
                <h5 class="ul-fold white">Community</h5>
                <ul>
                    <li><a href="#">Community</a></li>
                    <li><a href="#">Apps</a></li>
                    <li><a href="#">Forum</a></li>
                    <li><a href="#">Pentest</a></li>
                </ul>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="row">

                    <div style="float: right;width: 100%;text-align: right;">
                        <div class="col-*"> <img src="{{asset('assets/USER/img/heading/logo-alternate.png')}}"
                                class="logo" alt="" width="34" height="34" loading="lazy"> </div>
                    </div>
                    <div class="col-md-6 col-lg-12 text-center text-md-left text-lg-right footer__newsletter">
                        <h5 class="white">Sign up for the GiGi newsletter</h5>
                        <form>
                            <input type="email" class="email" placeholder="Your e-mail address">
                            <input type="submit" class="submit" value="Subscribe">
                        </form>
                    </div>
                    <div class="col-md-6 col-lg-12 text-center text-md-right footer__social">
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
                    </div>
                    <div class="col-md-12 col-lg-12 text-center text-lg-right p-2 footer__copyright">
                        <p>Copyright © 2022 GiGi – All rights reserved
                            <br /> <a href="#" target="_blank">Privacy and Cookie Notice</a> | <a href="#"
                                target="_blank">Terms and Conditions</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>