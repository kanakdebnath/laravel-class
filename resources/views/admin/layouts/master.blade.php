<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  {{-- sweetalert  --}}
  <link rel="stylesheet" href="{{ asset('backend/assets/css/sweetalert2.min.css') }}">
  <!-- Template Main CSS File -->
  <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">

  {{-- toastr css  --}}
  <link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  {{-- summernote css  --}}
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.inc.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin.inc.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    @yield('contain')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.inc.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('backend/assets/js/main.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('backend/assets/js/jquery.js') }}"></script>

  <!-- Sweet alert JS File -->
  <script src="{{ asset('backend/assets/js/sweetalert2.min.js') }}"></script>

  <!-- toastr JS File -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <!-- summernote JS File -->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

  @stack('script')

  <script>
    @if(Session::has('message'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.success("{{ session('message') }}");
    @endif
  
    @if(Session::has('error'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.error("{{ session('error') }}");
    @endif
  
    @if(Session::has('info'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.info("{{ session('info') }}");
    @endif
  
    @if(Session::has('warning'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.warning("{{ session('warning') }}");
    @endif
  </script>

  <script>

$(document).on('click', '.button-delete', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var url = $(this).data('url');
    Swal.fire({
            title: "Are you sure!",
            type: "warning",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
    }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              type: "POST",
              url: url,
              data: {
                "_token": "{{ csrf_token() }}",
                "id": id
              },
              success: function (data) {
                    toastr.success(data.message);
                    setTimeout(function () {
                      location.reload();
                    }, 2500);
                    
                  }         
          });
      }
    })
});

    
  </script>

</body>

</html>