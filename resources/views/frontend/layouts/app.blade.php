<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/styles.css') }}">

    <title>
        Eterna - Blog
    </title>
</head>

<body>
    @include('frontend.layouts.header')
    @yield('content')
    @include('frontend.layouts.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/js/scripts.js') }}"></script>
    <script>
        $('#newsletterForm').on('submit', function(e) {
            e.preventDefault();
            let email = $('#email').val();
            let url = $(this).data('url')
            $.ajax({
                url: url,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    email: email
                },
                success: function(response) {
                    alert(response.data);
                    $('#newsletterForm')[0].reset();
                },
                error: function(response) {
                    console.log(response.responseJSON.message);
                    
                    alert(response.responseJSON.message)
                }
            });
        });
    </script>
    @yield('js')
</body>

</html>
