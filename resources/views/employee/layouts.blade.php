<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard Employee | WAN Inventaris</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
  ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/Wan Logo.png') }}">
    <!-- Google Fonts
  ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('employee/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('employee/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS -->
    <link rel="stylesheet" href="{{ asset('employee/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('employee/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('employee/css/owl.transitions.css') }}">
    <!-- meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('employee/css/meanmenu/meanmenu.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('employee/css/animate.css') }}">
    <!-- normalize CSS -->
    <link rel="stylesheet" href="{{ asset('employee/css/normalize.css') }}">
    <!-- mCustomScrollbar CSS -->
    <link rel="stylesheet" href="{{ asset('employee/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- jvectormap CSS -->
    <link rel="stylesheet" href="{{ asset('employee/css/jvectormap/jquery-jvectormap-2.0.3.css') }}">
    <!-- notika icon CSS -->
    <link rel="stylesheet" href="{{ asset('employee/css/notika-custom-icon.css') }}">
    <!-- wave CSS -->
    <link rel="stylesheet" href="{{ asset('employee/css/wave/waves.min.css') }}">
    <!-- main CSS -->
    <link rel="stylesheet" href="{{ asset('employee/css/main.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('employee/style.css') }}">
    <!-- responsive CSS -->
    <link rel="stylesheet" href="{{ asset('employee/css/responsive.css') }}">
    <!-- modernizr JS -->
    <script src="{{ asset('employee/js/vendor/modernizr-2.8.3.min.js') }}"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        .container-project {
            margin-bottom: 40px;
            text-align: center;
        }

        .project-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .project-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 280px;
            min-height: 250px;
            transition: transform 0.3s ease;
        }

        .project-card:hover {
            transform: translateY(-10px);
        }

        .project-info {
            margin: 10px 0;
        }

        .project-title {
            font-size: 1.4em;
            color: #007bff;
        }

        .client-name,
        .project-name,
        .deadline,
        .status {
            font-size: 1.1em;
            margin: 5px 0;
        }

        .status {
            font-weight: bold;
        }

        .unprocessed {
            border-left: 5px solid #ffc107;
        }

        .ongoing {
            border-left: 5px solid #007bff;
        }

        .completed {
            border-left: 5px solid #28a745;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .project-card {
                width: 100%;
            }
        }

        /* CSS untuk container dan layout team cards */
        .container-teams {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin: 0 auto;
        }

        /* Style untuk card */
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            min-width: 300px;
            max-width: 350px;
            flex: 1 1 200px;
        }

        /* Hover effect pada card */
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* Style untuk card body */
        .card-body {
            padding: 20px;
        }

        /* Style untuk judul card */
        .card-title {
            font-size: 1.4em;
            color: #007bff;
            margin-bottom: 15px;
            text-transform: capitalize;
        }

        /* Style untuk list group (daftar anggota tim) */
        .list-group-item {
            font-size: 1em;
            padding: 10px;
            border: none;
            background-color: #f9f9f9;
        }

        /* Style untuk informasi proyek */
        .project-info {
            margin-top: 20px;
        }

        /* Style untuk teks proyek dan status */
        .project-info .card-text {
            font-size: 0.95em;
            color: #555;
            margin-bottom: 10px;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .d-flex {
                flex-direction: column;
            }

            .card {
                min-width: 100%;
                max-width: none;
                margin: 10px 0;
            }
        }

        /* Styling container */
        .container-teams {
            padding: 20px;
            background-color: #f9f9f9;
            /* Light background for the container */
        }

        /* Styling each card */
        .card {
            background-color: #ffffff;
            /* White background for cards */
            border: 1px solid #e0e0e0;
            /* Light grey border for cards */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Adding shadow for a modern look */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            /* Lift the card on hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            /* Add deeper shadow on hover */
        }

        /* Styling card title */
        .card-title {
            color: #007bff;
            /* Primary color for titles */
            font-size: 1.25rem;
            /* Larger font for title */
            font-weight: bold;
        }

        /* Styling card text */
        .card-text {
            color: #555;
            /* Grey color for text */
        }

        /* Styling the leader name */
        .card-text strong {
            color: #343a40;
            /* Darker color for strong text */
        }

        /* Styling project info section */
        .project-info p {
            color: #28a745;
            /* Green color for project info text */
            font-weight: bold;
        }

        /* Styling the list of employees */
        .list-group-item {
            background-color: #f1f1f1;
            /* Light grey background for list items */
            border: none;
            /* Remove border from list items */
            color: #333;
            /* Darker color for text */
        }

        .list-group-item:nth-child(odd) {
            background-color: #e9ecef;
            /* Alternating row colors */
        }

        /* Making sure the card fits well */
        .card-body {
            padding: 20px;
        }

        /* Styling for mobile responsiveness */
        @media (max-width: 768px) {
            .card {
                margin-bottom: 20px;
                /* Add margin between cards on small screens */
            }
        }
    </style>

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><img src="{{ asset('assets/img/Wan.png') }}" alt="Logo WAN"
                                style="width: 200px"></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            @if (Route::is('employee.dashboard', 'employee.project', 'employee.teams'))
                                <li class="nav-item nc-al">
                                    <a href="" data-toggle="dropdown" role="button" aria-expanded="false"
                                        class="nav-link dropdown-toggle">
                                        <span><i class="notika-icon notika-alarm"></i></span>
                                        <div class="spinner4 spinner-4"></div>
                                        <div class="ntd-ctn">
                                            <span>{{ $notificationsCount }}</span>
                                        </div>
                                    </a>
                                    <div role="menu"
                                        class="dropdown-menu message-dd notification-dd animated zoomIn">
                                        <div class="hd-mg-tt">
                                            <h2>Notification</h2>
                                        </div>
                                        <div class="hd-message-info">

                                            @if ($notifications->isEmpty())
                                                <p>No notifications available.</p>
                                            @else
                                                @foreach ($notifications as $notification)
                                                    <a href="{{ route('notifications.show', $notification->id) }}">
                                                        <div class="hd-message-sn">
                                                            <div class="hd-mg-ctn">
                                                                <h3>{{ $notification->created_by_user->name ?? 'System' }}
                                                                </h3>
                                                                <p>{{ $notification->message }}</p>
                                                                <p>Project:
                                                                    {{ $notification->teamMember->team->project->name ?? 'No Project' }}
                                                                </p>
                                                                @if ($notification->teamMember->team->leader)
                                                                    <p>Leader:
                                                                        {{ $notification->teamMember->team->leader->name }}
                                                                    </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </a>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                @else
                            @endif

                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                    class="nav-link dropdown-toggle">
                                    <span>
                                        <h3>{{ auth()->user()->name }}</h3>
                                    </span>
                                </a>
                                <div class="dropdown-menu message-dd chat-dd animated zoomIn">
                                    <div class="hd-message-info">
                                        <!-- Display the authenticated user's information -->
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="{{ auth()->user()->profile_picture }}" alt="" />
                                                    <!-- Assuming you have a profile picture -->
                                                    <div class="chat-avaible"><i class="notika-icon notika-dot"></i>
                                                    </div>
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>{{ auth()->user()->name }}</h3>
                                                    <p>Online</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                        <div class="hd-mg-va">
                                            <a class="" href="#" id="logout-btn">Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                            <script>
                                                document.getElementById('logout-btn').addEventListener('click', function(event) {
                                                    event.preventDefault();

                                                    Swal.fire({
                                                        title: 'Are you sure?',
                                                        text: "You will be logged out!",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Yes, logout!'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('logout-form').submit();
                                                        }
                                                    });
                                                });
                                            </script>

                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demoevent" href="#">Email</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#democrou" href="#">Interface</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demolibra" href="#">Charts</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="#">Tables</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demo" href="#">Forms</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">App
                                        views</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="{{ request()->routeIs('employee.dashboard') ? 'active' : '' }}"><a
                                href="{{ route('employee.dashboard') }}"><i class="notika-icon notika-house"></i>
                                Home</a>
                        </li>
                        <li><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-edit"></i> Project</a>
                        </li>
                        <li class="{{ request()->routeIs('employee.teams') ? 'active' : '' }}"><a
                                href="{{ route('employee.teams') }}"><i class="notika-icon notika-edit"></i>
                                Teams</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        {{-- <div id="Home" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="index.html">Dashboard One</a>
                                </li>
                                <li><a href="index-2.html">Dashboard Two</a>
                                </li>
                                <li><a href="index-3.html">Dashboard Three</a>
                                </li>
                                <li><a href="index-4.html">Dashboard Four</a>
                                </li>
                                <li><a href="analytics.html">Analytics</a>
                                </li>
                                <li><a href="widgets.html">Widgets</a>
                                </li>
                            </ul>
                        </div>
                        <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="inbox.html">Inbox</a>
                                </li>
                                <li><a href="view-email.html">View Email</a>
                                </li>
                                <li><a href="compose-email.html">Compose Email</a>
                                </li>
                            </ul>
                        </div> --}}
                        <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{ route('employee.project.leader') }}">Project Leader</a>
                                </li>
                                <li><a href="{{ route('employee.project.member') }}">Project Member</a>
                                </li>
                            </ul>
                        </div>
                        {{-- <div id="Charts" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="flot-charts.html">Flot Charts</a>
                                </li>
                                <li><a href="bar-charts.html">Bar Charts</a>
                                </li>
                                <li><a href="line-charts.html">Line Charts</a>
                                </li>
                                <li><a href="area-charts.html">Area Charts</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Tables" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="normal-table.html">Normal Table</a>
                                </li>
                                <li><a href="data-table.html">Data Table</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Forms" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="form-elements.html">Form Elements</a>
                                </li>
                                <li><a href="form-components.html">Form Components</a>
                                </li>
                                <li><a href="form-examples.html">Form Examples</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Appviews" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="notification.html">Notifications</a>
                                </li>
                                <li><a href="alert.html">Alerts</a>
                                </li>
                                <li><a href="modals.html">Modals</a>
                                </li>
                                <li><a href="buttons.html">Buttons</a>
                                </li>
                                <li><a href="tabs.html">Tabs</a>
                                </li>
                                <li><a href="accordion.html">Accordion</a>
                                </li>
                                <li><a href="dialog.html">Dialogs</a>
                                </li>
                                <li><a href="popovers.html">Popovers</a>
                                </li>
                                <li><a href="tooltips.html">Tooltips</a>
                                </li>
                                <li><a href="dropdown.html">Dropdowns</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Page" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="contact.html">Contact</a>
                                </li>
                                <li><a href="invoice.html">Invoice</a>
                                </li>
                                <li><a href="typography.html">Typography</a>
                                </li>
                                <li><a href="color.html">Color</a>
                                </li>
                                <li><a href="login-register.html">Login Register</a>
                                </li>
                                <li><a href="404.html">404 Page</a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->
    <main>
        @yield('content')
    </main>
    <!-- Start Email Statistic area-->
    {{-- <div class="notika-email-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="email-statis-inner notika-shadow">
                        <div class="email-ctn-round">
                            <div class="email-rdn-hd">
								<h2>Email Statistics</h2>
							</div>
                            <div class="email-statis-wrap">
                                <div class="email-round-nock">
                                    <input type="text" class="knob" value="0" data-rel="55" data-linecap="round" data-width="130" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true">
                                </div>
                                <div class="email-ctn-nock">
                                    <p>Total Emails Sent</p>
                                </div>
                            </div>
                            <div class="email-round-gp">
                                <div class="email-round-pro">
                                    <div class="email-signle-gp">
                                        <input type="text" class="knob" value="0" data-rel="75" data-linecap="round" data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true" disabled>
                                    </div>
                                    <div class="email-ctn-nock">
                                        <p>Bounce Rate</p>
                                    </div>
                                </div>
                                <div class="email-round-pro">
                                    <div class="email-signle-gp">
                                        <input type="text" class="knob" value="0" data-rel="35" data-linecap="round" data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true" disabled>
                                    </div>
                                    <div class="email-ctn-nock">
                                        <p>Total Opened</p>
                                    </div>
                                </div>
                                <div class="email-round-pro sm-res-ds-n lg-res-mg-bl">
                                    <div class="email-signle-gp">
                                        <input type="text" class="knob" value="0" data-rel="45" data-linecap="round" data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true" disabled>
                                    </div>
                                    <div class="email-ctn-nock">
                                        <p>Total Ignored</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                        <div class="recent-post-ctn">
                            <div class="recent-post-title">
                                <h2>Recent Posts</h2>
                            </div>
                        </div>
                        <div class="recent-post-items">
                            <div class="recent-post-signle rct-pt-mg-wp">
                                <a href="#">
                                    <div class="recent-post-flex">
                                        <div class="recent-post-img">
                                            <img src="img/post/2.jpg" alt="" />
                                        </div>
                                        <div class="recent-post-it-ctn">
                                            <h2>Smith</h2>
                                            <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="recent-post-signle">
                                <a href="#">
                                    <div class="recent-post-flex rct-pt-mg">
                                        <div class="recent-post-img">
                                            <img src="img/post/1.jpg" alt="" />
                                        </div>
                                        <div class="recent-post-it-ctn">
                                            <h2>John Deo</h2>
                                            <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="recent-post-signle">
                                <a href="#">
                                    <div class="recent-post-flex rct-pt-mg">
                                        <div class="recent-post-img">
                                            <img src="img/post/4.jpg" alt="" />
                                        </div>
                                        <div class="recent-post-it-ctn">
                                            <h2>Malika</h2>
                                            <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="recent-post-signle">
                                <a href="#">
                                    <div class="recent-post-flex rct-pt-mg">
                                        <div class="recent-post-img">
                                            <img src="img/post/2.jpg" alt="" />
                                        </div>
                                        <div class="recent-post-it-ctn">
                                            <h2>Smith</h2>
                                            <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="recent-post-signle">
                                <a href="#">
                                    <div class="recent-post-flex rct-pt-mg">
                                        <div class="recent-post-img">
                                            <img src="img/post/1.jpg" alt="" />
                                        </div>
                                        <div class="recent-post-it-ctn">
                                            <h2>John Deo</h2>
                                            <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="recent-post-signle">
                                <a href="#">
                                    <div class="recent-post-flex rc-ps-vw">
                                        <div class="recent-post-line rct-pt-mg">
                                            <p>View All</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="recent-items-wp notika-shadow sm-res-mg-t-30">
                        <div class="rc-it-ltd">
                            <div class="recent-items-ctn">
                                <div class="recent-items-title">
                                    <h2>Recent Items</h2>
                                </div>
                            </div>
                            <div class="recent-items-inn">
                                <table class="table table-inner table-vmiddle">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th style="width: 60px">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="f-500 c-cyan">4555</td>
                                            <td>Samsung Galaxy Mega</td>
                                            <td class="f-500 c-cyan">$921</td>
                                        </tr>
                                        <tr>
                                            <td class="f-500 c-cyan">4556</td>
                                            <td>Huawei Ascend P6</td>
                                            <td class="f-500 c-cyan">$240</td>
                                        </tr>
                                        <tr>
                                            <td class="f-500 c-cyan">8778</td>
                                            <td>HTC One M8</td>
                                            <td class="f-500 c-cyan">$400</td>
                                        </tr>
                                        <tr>
                                            <td class="f-500 c-cyan">5667</td>
                                            <td>Samsung Galaxy Alpha</td>
                                            <td class="f-500 c-cyan">$870</td>
                                        </tr>
                                        <tr>
                                            <td class="f-500 c-cyan">7886</td>
                                            <td>LG G3</td>
                                            <td class="f-500 c-cyan">$790</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
							<div id="recent-items-chart" class="flot-chart-items flot-chart vt-ct-it tb-rc-it-res"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Email Statistic area-->
    <!-- Start Realtime sts area-->
    <div class="realtime-statistic-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="realtime-wrap notika-shadow mg-t-30">
                        <div class="realtime-ctn">
                            <div class="realtime-title">
                                <h2>Realtime Visitors</h2>
                            </div>
                        </div>
                        <div class="realtime-visitor-ctn">
                            <div class="realtime-vst-sg">
                                <h4><span class="counter">4,35,456</span></h4>
                                <p>Visitors last 24h</p>
                            </div>
                            <div class="realtime-vst-sg">
                                <h4><span class="counter">4,566</span></h4>
                                <p>Visitors last 30m</p>
                            </div>
                        </div>
                        <div class="realtime-map">
                            <div class="vectorjsmarp" id="world-map"></div>
                        </div>
                        <div class="realtime-country-ctn realtime-ltd-mg">
                            <h5>September 4, 21:44:02 (2 Mins 56 Seconds)</h5>
                            <div class="realtime-ctn-bw">
                                <div class="realtime-ctn-st">
                                    <span><img src="img/country/1.png" alt="" /></span> <span>United States</span>
                                </div>
                                <div class="realtime-bw">
                                    <span>Firefox</span>
                                </div>
                                <div class="realtime-bw">
                                    <span>Mac OSX</span>
                                </div>
                            </div>
                        </div>
                        <div class="realtime-country-ctn">
                            <h5>September 7, 20:44:02 (5 Mins 56 Seconds)</h5>
                            <div class="realtime-ctn-bw">
                                <div class="realtime-ctn-st">
                                    <span><img src="img/country/2.png" alt="" /></span> <span>Australia</span>
                                </div>
                                <div class="realtime-bw">
                                    <span>Firefox</span>
                                </div>
                                <div class="realtime-bw">
                                    <span>Mac OSX</span>
                                </div>
                            </div>
                        </div>
                        <div class="realtime-country-ctn">
                            <h5>September 9, 19:44:02 (10 Mins 56 Seconds)</h5>
                            <div class="realtime-ctn-bw">
                                <div class="realtime-ctn-st">
                                    <span><img src="img/country/3.png" alt="" /></span> <span>Brazil</span>
                                </div>
                                <div class="realtime-bw">
                                    <span>Firefox</span>
                                </div>
                                <div class="realtime-bw">
                                    <span>Mac OSX</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="add-todo-list notika-shadow mg-t-30">
                        <div class="realtime-ctn">
                            <div class="realtime-title">
                                <h2>Add Todo</h2>
                            </div>
                        </div>
                        <div class="card-box">
                            <div class="todoapp">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-sm-6 col-xs-12">
                                        <h4 id="todo-message"><span id="todo-remaining"></span> of <span id="todo-total"></span> remaining</h4>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="notika-todo-btn">
                                            <a href="#" class="pull-right btn btn-primary btn-sm" id="btn-archive">Archive</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="notika-todo-scrollbar">
                                    <ul class="list-group no-margn todo-list" id="todo-list"></ul>
                                </div>
                                <div id="todo-form">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-sm-12 col-xs-12 todo-inputbar">
                                            <div class="form-group todo-flex">
                                                <div class="nk-int-st">
                                                    <input type="text" id="todo-input-text" name="todo-input-text" class="form-control" placeholder="Add new todo">
                                                </div>
                                                <div class="todo-send">
                                                    <button class="btn-primary btn-md btn-block btn notika-add-todo" type="button" id="todo-btn-submit">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="notika-chat-list notika-shadow mg-t-30 tb-res-ds-n dk-res-ds">
                        <div class="realtime-ctn">
                            <div class="realtime-title">
                                <h2>Chat Box</h2>
                            </div>
                        </div>
                        <div class="card-box">
                            <div class="chat-conversation">
                                <div class="widgets-chat-scrollbar">
                                    <ul class="conversation-list">
                                        <li class="clearfix">
                                            <div class="chat-avatar">
                                                <img src="img/post/1.jpg" alt="male">
                                                <i>10:00</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <i>John Deo</i>
                                                    <p>
                                                        Hello!
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix odd">
                                            <div class="chat-avatar">
                                                <img src="img/post/2.jpg" alt="Female">
                                                <i>10:01</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap chat-widgets-cn">
                                                    <i>Smith</i>
                                                    <p>
                                                        Hi, How are you? What about our next meeting?
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="chat-avatar">
                                                <img src="img/post/1.jpg" alt="male">
                                                <i>10:01</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <i>John Deo</i>
                                                    <p>
                                                        Yeah everything is fine
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix odd">
                                            <div class="chat-avatar">
                                                <img src="img/post/2.jpg" alt="male">
                                                <i>10:02</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap chat-widgets-cn">
                                                    <i>Smith</i>
                                                    <p>
                                                        Wow that's great
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="chat-avatar">
                                                <img src="img/post/1.jpg" alt="male">
                                                <i>10:01</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <i>John Deo</i>
                                                    <p>
                                                        Doing Better i am thinking about that..
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix odd">
                                            <div class="chat-avatar">
                                                <img src="img/post/2.jpg" alt="male">
                                                <i>10:02</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap chat-widgets-cn">
                                                    <i>Smith</i>
                                                    <p>
                                                        Wow, You also tallent man...
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="chat-widget-input">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-sm-12 col-xs-12 chat-inputbar">
                                            <div class="form-group todo-flex">
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control chat-input" placeholder="Enter your text">
                                                </div>
                                                <div class="chat-send">
                                                    <button type="submit" class="btn btn-md btn-primary btn-block notika-chat-btn">Send</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Realtime sts area-->
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2024
                            . All rights reserved. WAN Teknologi <a href="https://wansolution.co.id/" target="blank">Internasional</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
  ============================================ -->
    <script src="{{ asset('employee/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS -->
    <script src="{{ asset('employee/js/bootstrap.min.js') }}"></script>
    <!-- wow JS -->
    <script src="{{ asset('employee/js/wow.min.js') }}"></script>
    <!-- price-slider JS -->
    <script src="{{ asset('employee/js/jquery-price-slider.js') }}"></script>
    <!-- owl.carousel JS -->
    <script src="{{ asset('employee/js/owl.carousel.min.js') }}"></script>
    <!-- scrollUp JS -->
    <script src="{{ asset('employee/js/jquery.scrollUp.min.js') }}"></script>
    <!-- meanmenu JS -->
    <script src="{{ asset('employee/js/meanmenu/jquery.meanmenu.js') }}"></script>
    <!-- counterup JS -->
    <script src="{{ asset('employee/js/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('employee/js/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('employee/js/counterup/counterup-active.js') }}"></script>
    <!-- mCustomScrollbar JS -->
    <script src="{{ asset('employee/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- jvectormap JS -->
    <script src="{{ asset('employee/js/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('employee/js/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('employee/js/jvectormap/jvectormap-active.js') }}"></script>
    <!-- sparkline JS -->
    <script src="{{ asset('employee/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('employee/js/sparkline/sparkline-active.js') }}"></script>
    <!-- flot JS -->
    <script src="{{ asset('employee/js/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('employee/js/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('employee/js/flot/curvedLines.js') }}"></script>
    <script src="{{ asset('employee/js/flot/flot-active.js') }}"></script>
    <!-- knob JS -->
    <script src="{{ asset('employee/js/knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('employee/js/knob/jquery.appear.js') }}"></script>
    <script src="{{ asset('employee/js/knob/knob-active.js') }}"></script>
    <!-- wave JS -->
    <script src="{{ asset('employee/js/wave/waves.min.js') }}"></script>
    <script src="{{ asset('employee/js/wave/wave-active.js') }}"></script>
    <!-- todo JS -->
    <script src="{{ asset('employee/js/todo/jquery.todo.js') }}"></script>
    <!-- plugins JS -->
    <script src="{{ asset('employee/js/plugins.js') }}"></script>
    <!-- Chat JS -->
    <script src="{{ asset('employee/js/chat/moment.min.js') }}"></script>
    <script src="{{ asset('employee/js/chat/jquery.chat.js') }}"></script>
    <!-- main JS -->
    <script src="{{ asset('employee/js/main.js') }}"></script>
</body>

</html>
