<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-bold me-1">{{ date('Y') }} ©.</span>
            <a href="{{ url('/') }}" target="_blank"
                class="text-gray-800 text-hover-primary">{{ config('settings.general.site_title') }}</a>
        </div>
    </div>
</div>
