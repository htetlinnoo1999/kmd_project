<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu</li>
                <li @if(URL::current() == route('dashboard')) class="mm-active" @endif>
                    <a href="{{route('dashboard')}}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">Brands & Shops</li>
                @if(isCompanyAdmin(\Illuminate\Support\Facades\Auth::user()))
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Brands Management
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li @if(URL::current() == route('admin.brand.create')) class="mm-active" @endif>
                                <a href="{{route('admin.brand.create')}}">
                                    <i class="metismenu-icon">
                                    </i>Create Brand
                                </a>
                            </li>
                            <li @if(URL::current() == route('admin.brand.index')) class="mm-active" @endif>
                                <a href="{{route('admin.brand.index')}}">
                                    <i class="metismenu-icon">
                                    </i>All Brands
                                </a>
                            </li>
                        </ul>
                    </li>
                @elseif(\Illuminate\Support\Facades\Auth::user()->roles[0]->name == "Brand Admin")
                    <li @if(URL::current() == route('admin.brand.show',brandSlug(\Illuminate\Support\Facades\Auth::user()->id))) class="mm-active" @endif>
                        <a href="{{route('admin.brand.show',brandSlug(\Illuminate\Support\Facades\Auth::user()->id))}}">
                            <i class="metismenu-icon pe-7s-photo-gallery"></i>
                            My Brand
                        </a>
                    </li>
                @else
                    <li @if(URL::current() == route('admin.coupon.create',brandSlug(\Illuminate\Support\Facades\Auth::user()->id))) class="mm-active" @endif>
                        <a href="{{route('admin.coupon.create',brandSlug(\Illuminate\Support\Facades\Auth::user()->id))}}">
                            <i class="metismenu-icon pe-7s-photo-gallery"></i>
                            Create Coupons
                        </a>
                    </li>
                @endif

                @if(\Illuminate\Support\Facades\Auth::user()->roles[0]->name != "Shop Admin")
                    <li @if(URL::current() == route('admin.shop.index') || URL::current() == route('admin.shop.allshops')) class="mm-active" @endif>
                        <a href="{{isCompanyAdmin(\Illuminate\Support\Facades\Auth::user())?route('admin.shop.allshops'):route('admin.shop.index')}}">
                            <i class="metismenu-icon pe-7s-photo-gallery"></i>
                            All Shops
                        </a>
                    </li>
                @endif
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        About Coupons
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li @if(URL::current() == route('admin.coupon.index') || URL::current() == route('admin.coupon.allcoupons')) class="mm-active" @endif>
                            <a href="{{isCompanyAdmin(\Illuminate\Support\Facades\Auth::user())?route('admin.coupon.allcoupons'):route('admin.coupon.index')}}">
                                <i class="metismenu-icon pe-7s-photo-gallery"></i>
                                All Coupons
                            </a>
                        </li>
                        <li @if(URL::current() == route('admin.coupon.allRedeemedCoupons')) class="mm-active" @endif>
                            <a href="{{route('admin.coupon.allRedeemedCoupons')}}">
                                <i class="metismenu-icon">
                                </i>All Redeemed Coupons
                            </a>
                        </li>
                        <li @if(URL::current() == route('admin.coupon.redeemedCoupons', 'unused')) class="mm-active" @endif>
                            <a href="{{route('admin.coupon.redeemedCoupons', 'unused')}}">
                                <i class="metismenu-icon">
                                </i>Unused Redeemed Coupons
                            </a>
                        </li>
                        <li @if(URL::current() == route('admin.coupon.redeemedCoupons', 'used')) class="mm-active" @endif>
                            <a href="{{route('admin.coupon.redeemedCoupons', 'used')}}">
                                <i class="metismenu-icon">
                                </i>Used Redeemed Coupons
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="app-sidebar__heading">Home Page</li>
                @if(isCompanyAdmin(\Illuminate\Support\Facades\Auth::user()))
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Users Management
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li @if(URL::current() == route('admin.student.index')) class="mm-active" @endif>
                                <a href="{{route('admin.student.index')}}">
                                    <i class="metismenu-icon">
                                    </i>Pending Students
                                </a>
                            </li>

                            <li @if(URL::current() == route('admin.pendingAdmins')) class="mm-active" @endif>
                                <a href="{{route('admin.pendingAdmins')}}">
                                    <i class="metismenu-icon">
                                    </i>All pending Admins
                                </a>
                            </li>

                            <li @if(URL::current() == route('admin.brandAdmins')) class="mm-active" @endif>
                                <a href="{{route('admin.brandAdmins')}}">
                                    <i class="metismenu-icon">
                                    </i>All Brand Admins
                                </a>
                            </li>

                            <li @if(URL::current() == route('admin.shopAdmins')) class="mm-active" @endif>
                                <a href="{{route('admin.shopAdmins')}}">
                                    <i class="metismenu-icon">
                                    </i>All Shop Admins
                                </a>
                            </li>
                        </ul>
                    </li>
                @elseif(\Illuminate\Support\Facades\Auth::user()->roles[0]->name == "Brand Admin")
                    <li @if(URL::current() == route('admin.specificBrandAdmins')) class="mm-active" @endif>
                        <a href="{{route('admin.specificBrandAdmins')}}">
                            <i class="metismenu-icon pe-7s-photo-gallery"></i>
                            Admin Management
                        </a>
                    </li>
                @endif
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-photo-gallery"></i>
                        Sliders Management
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li @if(URL::current() == route('admin.slider.create')) class="mm-active" @endif>
                            <a href="{{route('admin.slider.create')}}">
                                <i class="metismenu-icon">
                                </i>Create Slider
                            </a>
                        </li>
                        <li @if(URL::current() == route('admin.slider.index')) class="mm-active" @endif>
                            <a href="{{route('admin.slider.index')}}">
                                <i class="metismenu-icon">
                                </i>All Sliders
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-photo-gallery"></i>
                        Categories Management
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li @if(URL::current() == route('admin.category.create')) class="mm-active" @endif>
                            <a href="{{route('admin.category.create')}}">
                                <i class="metismenu-icon">
                                </i>Create Category
                            </a>
                        </li>
                        <li @if(URL::current() == route('admin.category.index')) class="mm-active" @endif>
                            <a href="{{route('admin.category.index')}}">
                                <i class="metismenu-icon">
                                </i>All Categories
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-photo-gallery"></i>
                        Coupon Type Management
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>

                        <li @if(URL::current() == route('admin.couponType.index')) class="mm-active" @endif>
                            <a href="{{route('admin.couponType.index')}}">
                                <i class="metismenu-icon">
                                </i>All Coupon Types
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
