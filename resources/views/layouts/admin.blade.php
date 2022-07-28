<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skuter Ngasinan</title>
    <!-- plugins:css -->
    {{-- <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css"> --}}
    <!-- endinject -->
    <!-- Plugin css for this page -->
    {{-- <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css"> --}}
    {{-- <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css"> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/css/perfect-scrollbar.min.css" />
    @vite(['public/vendors/feather/feather.css', 'public/vendors/mdi/css/materialdesignicons.min.css', 'public/vendors/ti-icons/css/themify-icons.css', 'public/vendors/typicons/typicons.css', 'public/vendors/simple-line-icons/css/simple-line-icons.css', 'public/vendors/css/vendor.bundle.base.css', 'public/js/select.dataTables.min.css', 'public/css/vertical-layout-light/style.css'])
    <!-- endinject -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.21/dataRender/datetime.js" charset="utf8"></script>
    <!-- Moment.js: -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <style>
        select {
            color: black !important;
        }

        label {
            color: mediumblue;
            font-weight: 900;
        }

        @media (min-width: 576px) .modal-dialog {
            max-width: 1000px;
            margin: 1.75rem auto;
        }
    </style>
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="index.html">
                        <h5>Skuter Ngasinan</h5>
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img style="max-width: 50px;height: 50px;" class="img-fluid"
                                src="{{ Auth::user()->profile_photo_url }}" alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img style="max-width: 50px;height: 50px;" class="img-fluid"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                                    alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                                <p class="fw-light text-muted mb-0">{{ Auth::user()->email }}</p>
                            </div>
                            <a class="dropdown-item" href="{{ route('profile.show') }}"><i
                                    class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i>
                                {{ __('Profile') }}</a>
                            @if (auth()->id())
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a role="button"
                                        href="{{ route('logout') }}"href="{{ route('logout') }}"onclick="event.preventDefault();this.closest('form').submit(); "
                                        class="dropdown-item"><i
                                            class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>{{ __('Log Out') }}</a>
                                </form>
                            @endif
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section"
                            role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab"
                            aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Surat Surat</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('suratpengantar') }}">
                            <i class="menu-icon mdi mdi-file-document"></i>
                            <span class="menu-title">Surat Pengantar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
                            <i class="menu-icon mdi mdi-file-document"></i>
                            <span class="menu-title">Surat Kematian</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
                            <i class="menu-icon mdi mdi-file-document"></i>
                            <span class="menu-title">Surat Kelahiran</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
                            <i class="menu-icon mdi mdi-file-document"></i>
                            <span class="menu-title">Pindah</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="home-tab">
                                <div class="tab-content tab-content-basic">
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                        aria-labelledby="overview">
                                        <div class="row">
                                            @yield('konten')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Kelompok KKN 60
                            Universitas Sebelas Maret 2022</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2022. All
                            rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    @vite(['public/js/jquery.cookie.js', 'public/vendors/js/vendor.bundle.base.js', 'public/vendors/chart.js/Chart.min.js', 'public/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js', 'public/vendors/progressbar.js/progressbar.min.js', 'public/js/off-canvas.js', 'public/js/hoverable-collapse.js', 'public/js/template.js', 'public/js/settings.js', 'public/js/todolist.js', 'public/js/dashboard.js', 'public/js/Chart.roundedBarCharts.js'])
    <!-- plugins:js -->
    {{-- <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script> --}}

    <!-- End custom js for this page-->
</body>

</html>