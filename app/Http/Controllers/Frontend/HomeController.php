<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Modules\Region\Repositories\RegionRepository;
use Modules\Product\Entities\Product;
use Modules\Township\Repositories\TownshipRepository;
/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    protected $checkDevice;

    protected $township;

    protected $region;

    public function __construct(TownshipRepository $township,RegionRepository $region)
    {
        $agent = new Agent();

        $this->checkDevice = $agent->isMobile()? 'mobile': 'frontend';

        $this->township = $township;
        $this->region   = $region;
    }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view("$this->checkDevice.index");
    }

    public function showChangeLanguagePage(){
        return view("$this->checkDevice.change-language");
    }

    public function changeLanguage(Request $request)
    {
        $locale = $request->get('language');

        app()->setLocale($locale);

        session()->put('locale', $locale);

        return view("$this->checkDevice.index");
    }

    public function orderList()
    {
        return view("$this->checkDevice.order");
    }

    public function trackOrder()
    {
        return view("$this->checkDevice.track-order");
    }
    public function profile()
    {
        return view("$this->checkDevice.user.profile.profile");
    }

    public function editProfile()
    {
        return view("$this->checkDevice.user.profile.edit");
    }
    public function welcome()
    {
        return view("$this->checkDevice.welcome");
    }



    public function forgotPassword()
    {
        return view("$this->checkDevice.auth.password.forgot-password");
    }
    public function otpConfirm()
    {
        return view("$this->checkDevice.auth.password.otp-confirm");
    }

    public function productCategories()
    {
        return view("$this->checkDevice.product-categories");
    }

    public function productDetail()
    {
        return view("$this->checkDevice.product-detail");
    }

    public function productSearch()
    {
        return view("$this->checkDevice.product-search");
    }

    public function product()
    {
        return view("$this->checkDevice.product");
    }

    public function shoppingCart()
    {
        return view("$this->checkDevice.shopping-cart");
    }

    public function favourite()
    {
        return view("$this->checkDevice.favourite");
    }

    public function vendorOnBoarding()
    {
        return view("$this->checkDevice.vendor.onboarding");
    }

    public function vendorProfile()
    {
        return view("$this->checkDevice.vendor.profile");
    }

    public function vendorHome()
    {
        return view("$this->checkDevice.vendor.home");
    }

    public function vendorOrders()
    {
        return view("$this->checkDevice.vendor.order");
    }

    public function vendorOrderDetail()
    {
        return view("$this->checkDevice.vendor.order-detail");
    }

    public function vendorAnalytics()
    {
        return view("$this->checkDevice.vendor.analytics");
    }

    public function vendorProduct()
    {
        return view("$this->checkDevice.vendor.product");
    }

    public function vendorAddProduct()
    {
        return view("$this->checkDevice.vendor.add-products");
    }

    public function vendorEditProfile()
    {
        return view("$this->checkDevice.vendor.edit-profile");
    }

    public function vendorLocation()
    {
        return view("$this->checkDevice.vendor.location");
    }

    public function driverOnBoarding()
    {
        return view("$this->checkDevice.driver.onboarding");
    }

    public function checkout()
    {
        return view("$this->checkDevice.checkout");
    }

    public function paymentConfirm()
    {
        return view("$this->checkDevice.payment-confirm");
    }

    public function payment()
    {
        return view("$this->checkDevice.payment");
    }

    public function review()
    {
        return view("$this->checkDevice.review");
    }
    public function notification()
    {
        return view("$this->checkDevice.notification");
    }

    public function getTownships($regionId)
    {
        return $this->township->getTownshipById($regionId);
    }

    public function getNRCcode($code)
    {
        return config('nrc.'.$code);
    }

}
