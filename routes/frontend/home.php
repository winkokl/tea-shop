<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
// use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
    // ->name('index')
    // ->breadcrumbs(function (Trail $trail) {
    //     $trail->push(__('Home'), route('frontend.index'));
    // });

Route::get('terms', [TermsController::class, 'index'])->name('pages.terms');
    // ->name('pages.terms')
    // ->breadcrumbs(function (Trail $trail) {
    //     $trail->parent('frontend.index')
    //         ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    // });



Route::get('otp-confirm', [HomeController::class, 'otpConfirm'])->name('otp_confirm');
Route::get('mobile-change-password', [HomeController::class, 'changePassword'])->name('mobile_change_password');
Route::get('change-language', [HomeController::class, 'showChangeLanguagePage'])->name('change_language');
Route::post('change-language', [HomeController::class, 'changeLanguage']);




Route::get('profile', [HomeController::class, 'profile'])->name('profile');
Route::get('profile/edit', [HomeController::class, 'editProfile'])->name('profile.edit');

Route::get('welcome', [HomeController::class, 'welcome'])->name('welcome');

Route::get('product', [HomeController::class, 'product'])->name('product');
Route::get('product-categories', [HomeController::class, 'productCategories'])->name('product_categories');
Route::get('product-detail', [HomeController::class, 'productDetail'])->name('product_detail');
Route::get('product-search', [HomeController::class, 'productSearch'])->name('product_search');

//vendor
Route::group(['as' => 'vendor_'], function () {
    Route::get('vendor-profile', [HomeController::class, 'vendorProfile'])->name('profile');
    Route::get('vendor-edit-profile', [HomeController::class, 'vendorEditProfile'])->name('edit_profile');

    Route::get('vendor-home', [HomeController::class, 'vendorHome'])->name('home');
    Route::get('vendor-onboarding', [HomeController::class, 'vendorOnBoarding'])->name('onboarding');
    Route::get('vendor-orders', [HomeController::class, 'vendorOrders'])->name('orders');
    Route::get('vendor-order-detail', [HomeController::class, 'vendorOrderDetail'])->name('order_detail');
    Route::get('vendor-analytics', [HomeController::class, 'vendorAnalytics'])->name('analytics');
    Route::get('vendor-product', [HomeController::class, 'vendorProduct'])->name('product');
    Route::get('vendor-add-products', [HomeController::class, 'vendorAddProduct'])->name('add_products');
    Route::get('vendor-location', [HomeController::class, 'vendorLocation'])->name('location');
});
//driver
Route::get('driver-onboarding', [HomeController::class, 'driverOnBoarding'])->name('driver_onboarding');


Route::get('orders', [HomeController::class, 'orderList'])->name('orders');
Route::get('track-order', [HomeController::class, 'trackOrder'])->name('track_order');
Route::get('shopping-cart', [HomeController::class, 'shoppingCart'])->name('shopping_cart');
Route::get('favourite', [HomeController::class, 'favourite'])->name('favourite');
Route::get('checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('payment-confirm', [HomeController::class, 'paymentConfirm'])->name('payment_confirm');
Route::get('payment', [HomeController::class, 'payment'])->name('payment');
Route::get('review', [HomeController::class, 'review'])->name('review');
Route::get('notification', [HomeController::class, 'notification'])->name('notification');

Route::get('customer/get-townships/{regionId}', [HomeController::class, 'getTownships'])->name('get_townships');
Route::get('customer/get-nrc-name/{code}', [HomeController::class, 'getNRCcode']);
