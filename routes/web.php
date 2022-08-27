<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminBranchController;
use App\Http\Controllers\Admin\AdminOfferController;
use App\Http\Controllers\Admin\MerchantManagementController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\AdminChatController;

use App\Http\Controllers\Merchant\MerchantHomeController;
use App\Http\Controllers\Merchant\OfferController;
use App\Http\Controllers\Merchant\DashboardStatPageController;
use App\Http\Controllers\Merchant\BranchController;
use App\Http\Controllers\Merchant\MerchantSettingController;
use App\Http\Controllers\Merchant\ChatController;

use App\Http\Controllers\Auth\UserMerchantAuthController;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\AjaxLoadDealsController;
use App\Http\Controllers\CommonAuthController;

use App\Http\Middleware\AuthCheckMerchant;
use App\Http\Middleware\AuthCheckAdmin;
use App\Http\Middleware\AuthCheckUser;
use App\Http\Middleware\AuthAdminMerchantCommon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::post('/load_qr',[AdminHomeController::class, "load_qr"])->name('load_qr');
    Route::post('/loadBranchesBeforeQR',[AdminHomeController::class, "loadBranchesBeforeQR"])->name('loadBranchesBeforeQR');

    Route::middleware([AuthCheckAdmin::class])->group(function(){
   
        Route::post('/load_user_for_admin',[AdminHomeController::class, "load_user_for_admin"])->name('load_user_for_admin');
        //Admin
        Route::get('/AdminDashboard',[AdminHomeController::class, "AdminDashboard"])->name('AdminDashboard');
        Route::get('/AdminCoupons',[AdminHomeController::class, "AdminCoupons"])->name('AdminCoupons');
        Route::get('/DealsStoppedByAdmin',[AdminHomeController::class, "DealsStoppedByAdmin"])->name('DealsStoppedByAdmin');
        Route::any('/SearchCoupons',[AdminHomeController::class, "SearchCoupons"])->name('/SearchCoupons');
        // Route::get('/AdminSearchCoupons',[AdminHomeController::class, "AdminSearchCoupons"])->name('AdminSearchCoupons');

        Route::get('/AdminAllNotifications',[AdminHomeController::class, "AdminAllNotifications"])->name('AdminAllNotifications');

        Route::get('/AdminAllUsers',[AdminHomeController::class, "AdminAllUsers"])->name('AdminAllUsers');
        Route::get('/AdminAgeFilterUsers',[AdminHomeController::class, "AdminAgeFilterUsers"])->name('AdminAgeFilterUsers');
        Route::get('/AdminDateFilterUsers',[AdminHomeController::class, "AdminDateFilterUsers"])->name('AdminDateFilterUsers');

        Route::get('/AdminPurchaseDealsStats',[AdminHomeController::class, "AdminPurchaseDealsStats"])->name('AdminPurchaseDealsStats');
        Route::get('/AdminRedeemStatFilterbyDate',[AdminHomeController::class, "AdminRedeemStatFilterbyDate"])->name('AdminRedeemStatFilterbyDate');


        Route::get('/AdminRedeemedDealsStats',[AdminHomeController::class, "AdminRedeemedDealsStats"])->name('AdminRedeemedDealsStats');
        Route::get('/AdminCategoriesStats',[AdminHomeController::class, "AdminCategoriesStats"])->name('AdminCategoriesStats');
        Route::get('/maleUsageStat',[AdminHomeController::class, "maleUsageStat"])->name('maleUsageStat');
        Route::get('/femaleUsageStat',[AdminHomeController::class, "femaleUsageStat"])->name('femaleUsageStat');

        Route::get('/AdminManageReviews',[AdminHomeController::class, "AdminManageReviews"])->name('AdminManageReviews');
        Route::get('/changeStatusOfMerchantAccept/{id}',[AdminHomeController::class, "changeStatusOfMerchantAccept"])->name('changeStatusOfMerchantAccept');
        Route::get('/changeStatusOfMerchantDecline/{id}',[AdminHomeController::class, "changeStatusOfMerchantDecline"])->name('changeStatusOfMerchantDecline');

        Route::get('/AdminAllReviews',[AdminHomeController::class, "AdminAllReviews"])->name('AdminAllReviews');
        Route::get('/AdminAllReviewsFilterUsers',[AdminHomeController::class, "AdminAllReviewsFilterUsers"])->name('AdminAllReviewsFilterUsers');

        //Merchant Management
        Route::get('/AdminManageMerchants',[AdminHomeController::class, "AdminManageMerchants"])->name('AdminManageMerchants');
        Route::get('/ActiveMerchants',[AdminHomeController::class, "ActiveMerchants"])->name('ActiveMerchants');
        Route::get('/AdminMerchantProfile/{id}',[AdminHomeController::class, "AdminMerchantProfile"])->name('AdminMerchantProfile');
        Route::get('/AdminEditMerchant/{id}',[MerchantManagementController::class, "AdminEditMerchant"])->name('AdminEditMerchant');
        Route::post('/AdminMerchantProfileUpdate',[MerchantManagementController::class, "AdminMerchantProfileUpdate"])->name('AdminMerchantProfileUpdate');
        
        Route::get('/AdminMerchantReviews/{id}',[MerchantManagementController::class, "AdminMerchantReviews"])->name('AdminMerchantReviews');
        //CATEGORIES
        Route::get('/AdminAllCategories',[CategoryController::class, "AdminAllCategories"])->name('AdminAllCategories');
        Route::get('/AdminCategoryAdd',[CategoryController::class, "AdminCategoryAdd"])->name('AdminCategoryAdd');
        Route::post('/AdminAddCategory',[CategoryController::class, "AdminAddCategory"])->name('AdminAddCategory');
        Route::post('/AdminCategoryUpdate/{id}',[CategoryController::class, "AdminCategoryUpdate"])->name('AdminCategoryUpdate');
        Route::get('/AdminDeleteCategory/{id}',[CategoryController::class, "AdminDeleteCategory"])->name('AdminDeleteCategory');
        Route::get('/AdminEditCategory/{id}',[CategoryController::class, "AdminEditCategory"])->name('AdminEditCategory');
            
        //REVIEW
        Route::get('/AdminEditReview/{id}',[ReviewController::class, "AdminEditReview"])->name('AdminEditReview');
        Route::post('/AdminReviewUpdate',[ReviewController::class, "AdminReviewUpdate"])->name('AdminReviewUpdate');

        //Tags
        Route::get('/AdminAllTags',[TagController::class, "AdminAllTags"])->name('AdminAllTags');
        Route::get('/AdminTagAdd',[TagController::class, "AdminTagAdd"])->name('AdminTagAdd');
        Route::post('/AdminAddTag',[TagController::class, "AdminAddTag"])->name('AdminAddTag');
        Route::post('/AdminTagUpdate/{id}',[TagController::class, "AdminTagUpdate"])->name('AdminTagUpdate');
        Route::get('/AdminDeleteTag/{id}',[TagController::class, "AdminDeleteTag"])->name('AdminDeleteTag');
        Route::get('/AdminEditTag/{id}',[TagController::class, "AdminEditTag"])->name('AdminEditTag');
            
        Route::get('/AdminchatWithMerchant/{id}',[AdminChatController::class, "AdminchatWithMerchant"])->name('AdminchatWithMerchant');
        Route::get('/AdminOpenUserChat/{id}',[AdminChatController::class, "AdminOpenUserChat"])->name('AdminOpenUserChat');
        
        //BRANCH
        Route::get('/AdminBranchRequests',[AdminBranchController::class, "AdminBranchRequests"])->name('AdminBranchRequests');

        //OFFER
        Route::get('/AdminOfferRequests',[AdminOfferController::class, "AdminOfferRequests"])->name('AdminOfferRequests');
        Route::get('/AdminOfferActivationReactivationRequest',[AdminOfferController::class, "AdminOfferActivationReactivationRequest"])->name('AdminOfferActivationReactivationRequest');
        Route::get('/takeActionOnDealActivation/{id}',[AdminOfferController::class, "takeActionOnDealActivation"])->name('takeActionOnDealActivation');
        Route::post('/takeActionOnDealActivationReject/{id}',[AdminOfferController::class, "takeActionOnDealActivationReject"])->name('takeActionOnDealActivationReject');
        
        Route::get('/AdminDiscountRequests',[AdminOfferController::class, "AdminDiscountRequests"])->name('AdminDiscountRequests');
            //EDIT
        Route::get('/AdminEditOffer/{id}',[AdminOfferController::class, "AdminEditOffer"])->name('AdminEditOffer');
        Route::post('/AdminEditOfferConfirm/{id}',[AdminOfferController::class, "AdminEditOfferConfirm"])->name('AdminEditOfferConfirm');
        //ACCEPT REJECT OFFERS
        Route::get('/AdminAcceptDeal/{id}',[AdminOfferController::class, "AdminAcceptDeal"])->name('AdminAcceptDeal');
        Route::post('/AdminRejectDeal/{id}',[AdminOfferController::class, "AdminRejectDeal"])->name('AdminRejectDeal');

        //Deal Details
        Route::get('/OfferDetails/{id}',[AdminOfferController::class, "OfferDetails"])->name('OfferDetails');


        Route::get('AdminHomePageManagement',[AdminHomeController::class, "AdminHomePageManagement"])->name('AdminHomePageManagement');
        Route::get('AdminHomeSectionEdit/{id}',[AdminHomeController::class, "AdminHomeSectionEdit"])->name('AdminHomeSectionEdit');
        Route::post('UpdateSectionBox',[AdminHomeController::class, "UpdateSectionBox"])->name('UpdateSectionBox');
        
        Route::post('admin_logout',[CommonAuthController::class, "admin_logout"])->name('admin_logout');

    });
    


        //Merchant -------- Will decide later.
    Route::get('/register/merchant',[CommonAuthController::class, "registerMerchant"])->name('registerMerchant');
    Route::post('register_merchant',[CommonAuthController::class, "register_merchant"])->name('register_merchant');
    Route::get('/login/merchant',[CommonAuthController::class, "Login"])->name('Merchantlogin');
    Route::post('merchant_login',[CommonAuthController::class, "merchant_login"])->name('merchant_login');


    Route::middleware([AuthCheckMerchant::class])->group(function(){

        Route::get('/MerchantAllNotifications',[MerchantHomeController::class, "MerchantAllNotifications"])->name('MerchantAllNotifications');

        Route::any('/MerchantSearchCoupons',[MerchantHomeController::class, "MerchantSearchCoupons"])->name('/MerchantSearchCoupons');
        
        Route::post('merchant_logout',[CommonAuthController::class, "merchant_logout"])->name('merchant_logout');
        

        Route::get('/MerchantDashboard',[MerchantHomeController::class, "MerchantDashboard"])->name('MerchantDashboard');
        Route::get('/MerchantProfile',[MerchantHomeController::class, "MerchantProfile"])->name('MerchantProfile');
        //Branch
        Route::get('/MerchantAddBranch',[BranchController::class, "MerchantAddBranch"])->name('MerchantAddBranch');
        Route::get('/MerchantBranches',[BranchController::class, "MerchantBranches"])->name('MerchantBranches');

        Route::get('/MerchantEditbranch/{id}',[BranchController::class, "MerchantEditbranch"])->name('MerchantEditbranch');
        Route::get('/MerchantDeletebranch/{id}',[BranchController::class, "MerchantDeletebranch"])->name('MerchantDeletebranch');
        
        Route::post('/AddBranch',[BranchController::class, "AddBranch"])->name('AddBranch');
        Route::post('/EditBranch/{id}',[BranchController::class, "EditBranch"])->name('EditBranch');



        // 23|JTbJmyDfbURacNEmIbxbx3mQ8GLInZUmqgb7pBTp
        //Offer
        Route::get('/MerchantAddOffer',[OfferController::class, "MerchantAddOffer"])->name('MerchantAddOffer');

        Route::get('/MerchantOfferReviews',[OfferController::class, "MerchantOfferReviews"])->name('MerchantOfferReviews');
        Route::get('/MerchantOfferReviewsFilter',[OfferController::class, "MerchantOfferReviewsFilter"])->name('MerchantOfferReviewsFilter');
        Route::post('/merchantReplyToComment',[OfferController::class, "merchantReplyToComment"])->name('merchantReplyToComment');

        //These two are same because by default it takes active deals.
        Route::get('/MerchantOffers',[OfferController::class, "MerchantOffers"])->name('MerchantOffers');
        Route::get('/ShowActiveOffers',[OfferController::class, "MerchantOffers"])->name('ShowActiveOffers');
        //This is for Inactive deals.
        Route::get('/ShowInactiveOffers',[OfferController::class, "ShowInactiveOffers"])->name('ShowInactiveOffers');
        Route::get('/ShowRejectedOffers',[OfferController::class, "ShowRejectedOffers"])->name('ShowRejectedOffers');

        Route::get('/MerchantInActiveOffer/{id}',[OfferController::class, "MerchantInActiveOffer"])->name('MerchantInActiveOffer');
        Route::get('/MerchantActivateOffer/{id}',[OfferController::class, "MerchantActivateOffer"])->name('MerchantActivateOffer');
        
        Route::get('/Offer/{id}',[OfferController::class, "Offer"])->name('Offer');


        Route::get('/MerchantEditOffer/{id}',[OfferController::class, "MerchantEditOffer"])->name('MerchantEditOffer');
        Route::get('/MerchantDeleteOffer/{id}',[OfferController::class, "MerchantDeleteOffer"])->name('MerchantDeleteOffer');
        Route::post('/AddOffer',[OfferController::class, "AddOffer"])->name('AddOffer');
        Route::post('/EditOffer/{id}',[OfferController::class, "EditOffer"])->name('EditOffer');


        Route::get('/MerchantAdditionalDiscount',[OfferController::class, "MerchantAdditionalDiscount"])->name('MerchantAdditionalDiscount');
        Route::post('/SetAdditionalDiscount',[OfferController::class, "SetAdditionalDiscount"])->name('SetAdditionalDiscount');


        //Dashboard Redirect Stat Pages
        Route::get('/MerchantTotalSales',[DashboardStatPageController::class, "MerchantTotalSales"])->name('MerchantTotalSales');
        Route::get('/MerchantDateFilterTotalSales',[DashboardStatPageController::class, "MerchantDateFilterTotalSales"])->name('MerchantDateFilterTotalSales');
        Route::get('/MerchantCategoriesStat',[DashboardStatPageController::class, "MerchantCategoriesStat"])->name('MerchantCategoriesStat');
        // Route::get('/TotalDealsSaleStat',[DashboardStatPageController::class, "TotalDealsSaleStat"])->name('TotalDealsSaleStat');

        
        //Settings
        Route::get('/MerchantSettings',[MerchantSettingController::class, "MerchantSettings"])->name('MerchantSettings');
        Route::post('/MerchantProfileUpdate',[MerchantSettingController::class, "MerchantProfileUpdate"])->name('MerchantProfileUpdate');
        Route::post('/UpdatePassword',[MerchantSettingController::class, "UpdatePassword"])->name('UpdatePassword');

        Route::get('/MobileChat',[MerchantSettingController::class, "MobileChat"])->name('MobileChat');  
        Route::get('/MobileChatLogin',[MerchantSettingController::class, "MobileChatLogin"])->name('MobileChatLogin');  
        Route::post('/MobileChatLoginConfirm',[MerchantSettingController::class, "MobileChatLoginConfirm"])->name('MobileChatLoginConfirm');  
    });

    Route::middleware([AuthAdminMerchantCommon::class])->group(function(){
        // SET MIDWARE FOR 2,3
              
        // CHAT
        Route::post('/loadConvo_forDashboards',[ChatController::class, "loadConvo_forDashboards"])->name('loadConvo_forDashboards');
        Route::post('/loadConvo_forDashboards_Header',[ChatController::class, "loadConvo_forDashboards_Header"])->name('loadConvo_forDashboards_Header');
        Route::get('/AdminAndMerchantRefreshConvoList',[ChatController::class, "AdminAndMerchantRefreshConvoList"])->name('AdminAndMerchantRefreshConvoList');  // FIR ADMIN AND MERCHANT
    });

    
    //USER 
     
    Route::get('/',[UserController::class, "home"]);
    Route::get('/home',[UserController::class, "home"])->name('home');
    Route::get('/boost',[UserController::class, "boost"])->name('boost');
    Route::get('/TrendingDealsSeeMore',[UserController::class, "TrendingDealsSeeMore"])->name('TrendingDealsSeeMore');
    Route::get('/TrendingDealsSort/{sortType}',[UserController::class, "TrendingDealsSort"])->name('TrendingDealsSort');

    //UNAUTH
    // Route::get('/GotoCity/{city}',[UserController::class, "GotoCity"])->name('GotoCity');

    //AUTH
    Route::get('login',[UserController::class, "userLogin"])->name('login');
    Route::get('AccVerify',[UserController::class, "AccVerify"])->name('AccVerify');
    Route::post('AccVerifyConfirm',[UserController::class, "AccVerifyConfirm"])->name('AccVerifyConfirm');
    Route::get('resendCodeRequest',[UserController::class, "resendCodeRequest"])->name('resendCodeRequest');
    Route::get('forgotPasswordRequest',[UserController::class, "forgotPasswordRequest"])->name('forgotPasswordRequest');
    Route::post('forgotPasswordRequestConfirm',[UserController::class, "forgotPasswordRequestConfirm"])->name('forgotPasswordRequestConfirm');
    Route::post('ResendCodeConfirm',[UserController::class, "ResendCodeConfirm"])->name('ResendCodeConfirm');

    Route::post('user_login',[UserMerchantAuthController::class, "user_login"])->name('user_login');
    Route::get('register',[UserController::class, "userRegister"])->name('register');
    Route::post('user_registration',[UserMerchantAuthController::class, "user_registration"])->name('user_registration');

    

    Route::get('cart',[UserController::class, "cart"])->name('cart');
    Route::get('add_to_cart/{id}',[UserController::class, "add_to_cart"])->name('add_to_cart');
    Route::get('delete_from_cart/{id}',[UserController::class, "delete_from_cart"])->name('delete_from_cart');
    Route::post('cart_inc_or_dec',[UserController::class, "cart_inc_or_dec"])->name('cart_inc_or_dec');
    Route::get('purchaseDealsFromCart',[UserController::class, "purchaseDealsFromCart"])->name('purchaseDealsFromCart');
    
    Route::get('categories',[UserController::class, "categories"])->name('categories');
    Route::get('categories/{sort_type}',[UserController::class, "categoriesSort"])->name('categoriessort');
    Route::get('PriceFilter',[UserController::class, "PriceFilter"])->name('PriceFilter');

    Route::get('DealsByCat/{id}',[UserController::class, "DealsByCat"])->name('DealsByCat');
    Route::get('DealsByCatSorting/{id}/{sortType}',[UserController::class, "DealsByCatSorting"])->name('DealsByCatSorting');
    // Route::post('PriceFilter',[UserController::class, "PriceFilter"])->name('PriceFilter');

    Route::get('discount_details/{id}',[UserController::class, "discount_details"])->name('discount_details');
    Route::get('merchant_details/{id}',[UserController::class, "merchant_details"])->name('merchant_details');

    Route::get('userSearchText',[UserController::class, "userSearchText"])->name('userSearchText');


    Route::middleware([AuthCheckUser::class])->group(function(){
        Route::post('addReviewOnDeal/{id}',[UserController::class, "addReviewOnDeal"])->name('addReviewOnDeal');
        Route::post('editReviewOnDeal/{id}',[UserController::class, "editReviewOnDeal"])->name('editReviewOnDeal');
        
        Route::post('user_logout',[UserMerchantAuthController::class, "user_logout"])->name('user_logout');
        Route::get('myprofile',[UserController::class, "myprofile"])->name('myprofile');

        Route::post('SETCITIES',[UserController::class, "SETCITIES"])->name('SETCITIES');
        Route::get('UserSelectedCity/{city}',[UserController::class, "UserSelectedCity"])->name('UserSelectedCity');

        Route::post('myAccountSettingApplied',[UserController::class, "myAccountSettingApplied"])->name('myAccountSettingApplied');
        Route::post('changePasswordConfirm',[UserController::class, "changePasswordConfirm"])->name('changePasswordConfirm');
        Route::post('setPreferences',[UserController::class, "setPreferences"])->name('setPreferences');
        Route::post('UpdateCurrentLocation',[UserController::class, "UpdateCurrentLocation"])->name('UpdateCurrentLocation');

        Route::get('userChat',[UserController::class, "userChat"])->name('userChat');
        Route::get('chatWithMerchant/{id}',[UserController::class, "chatWithMerchant"])->name('chatWithMerchant');
        Route::get('chatWithAdmin/{id}',[UserController::class, "chatWithAdmin"])->name('chatWithAdmin');
        Route::get('userRefreshConvoList',[UserController::class, "userRefreshConvoList"])->name('userRefreshConvoList');

        Route::post('loadConvo',[UserController::class, "loadConvo"])->name('loadConvo');

        Route::get('wishlist',[UserController::class, "wishlist"])->name('wishlist');

        Route::get('add_to_wishlist/{id}',[UserController::class, "add_to_wishlist"])->name('add_to_wishlist');
        Route::get('delete_from_wishlist/{id}',[UserController::class, "delete_from_wishlist"])->name('delete_from_wishlist');
    });

    // SET MIDWARE FOR 1,2,3 // Or Leaving it Open
    Route::post('send_message_to_convo',[UserController::class, "send_message_to_convo"])->name('send_message_to_convo');   // THIS MuST NOT BE INsIDE 1 MIDDLEWARE>> UNIVERSAL FOR ALL
    Route::post('UnAuthUserLocationFetched',[UserController::class, "UnAuthUserLocationFetched"])->name('UnAuthUserLocationFetched');   // THIS MuST NOT BE INsIDE 1 MIDDLEWARE>> UNIVERSAL FOR ALL
    Route::get('UnAuthUserLocationFetched',[UserController::class, "UnAuthUserLocationFetched"])->name('');   // THIS MuST NOT BE INsIDE 1 MIDDLEWARE>> UNIVERSAL FOR ALL
    Route::get('SelectingCity/{city}',[UserController::class, "SelectingCity"])->name('SelectingCity');   // THIS MuST NOT BE INsIDE 1 MIDDLEWARE>> UNIVERSAL FOR ALL


    Route::get('LoadDeals/{id}',[AjaxLoadDealsController::class, "LoadDeals"])->name('LoadDeals');  

    

});
