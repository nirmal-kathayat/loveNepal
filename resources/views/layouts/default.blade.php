<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="viewport" content="width=device-width,initial-scale=1">
      <title>Admin Dashboard</title>
      <!-- Favicon icon -->

      <link rel="stylesheet" type="text/css" href="{{asset('/vendor/sweetalert2/dist/sweetalert2.min.css')}}">
      <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="{{asset('/css/reset.css')}}" rel="stylesheet">
      <link href="{{asset('/css/style.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/main.css') }}">

      @stack('style')
</head>

<body>
      <div class="main-wrapper flex">
            @include('layouts.sidebar')
            <div class="main-content">
                  @include('layouts.header')
                  @yield('content')
            </div>
      </div>
      <!-- Required vendors -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
      </script>
      <script src="{{asset('/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>


      <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

      <script type="text/javascript">
            $(document).ready(function() {
                  $('.user-info').on('click', function() {
                        if ($(this).hasClass('active')) {
                              $(this).removeClass('active')
                              $('.top-dropdown-menu').slideUp()

                        } else {
                              $(this).addClass('active')
                              $('.top-dropdown-menu').slideDown()
                        }
                  })
            })
      </script>
      @stack('scripts')

</body>

</html>