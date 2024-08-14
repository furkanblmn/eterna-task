<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <a href="/dashboard">
            <img alt="Logo" src="{{ asset('admin/assets/img/muuf_logo.svg') }}" class="h-45px logo"
                style="filter:brightness(0) invert(1);" />
        </a>
    </div>
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item">
                    <a class="menu-link @if (in_array(trim($__env->yieldContent('menu')), ['admin_homepage'])) active @endif"
                        href="{{ route('dashboard.index') }}">
                        <span class="menu-icon"><i class="fa-solid fa-house"></i></span>
                        <span class="menu-title text-capitalize">Home</span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span
                            class="menu-section text-muted text-uppercase fs-8 ls-1">ADMIN PANEL</span>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <a class="menu-link @if (in_array(trim($__env->yieldContent('menu')), ['categories'])) active @endif"
                            href="{{ route('dashboard.categories.index') }}">
                            <span class="menu-icon"><i class="fa-brands fa-slack"></i></span>
                            <span class="menu-title text-capitalize">Categories</span>
                        </a>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <a class="menu-link @if (in_array(trim($__env->yieldContent('menu')), ['blogs'])) active @endif"
                            href="{{ route('dashboard.blogs.index') }}">
                            <span class="menu-icon"><i class="fa-brands fa-slack"></i></span>
                            <span class="menu-title text-capitalize">Blogs</span>
                        </a>
                    </div>
                </div>



                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <a class="menu-link @if (in_array(trim($__env->yieldContent('menu')), ['newsletters'])) active @endif"
                            href="{{ route('dashboard.newsletters.index') }}">
                            <span class="menu-icon"><i class="fa-brands fa-slack"></i></span>
                            <span class="menu-title text-capitalize">Newsletters</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
