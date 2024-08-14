<meta charset="utf-8" />
<title>
    @if (trim($__env->yieldContent('title')))
        @yield('title') |
    @endif
    Yönetim Paneli | {{ config('settings.general.site_title') }}
</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}" />
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<link href="{{ asset('admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
    type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/filepond-plugin-media-preview@1.0.11/dist/filepond-plugin-media-preview.min.css">
<link href="{{ asset('admin/assets/css/filepond.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
