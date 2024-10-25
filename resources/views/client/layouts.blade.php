<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - Day Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{ asset('assets/img/Wan Logo.png') }}" rel="icon">
    <link href="{{ asset('day/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('day/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('day/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('day/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('day/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('day/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('day/css/main.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    <!-- =======================================================
        * Template Name: Day
  * Template URL: https://bootstrapmade.com/day-multipurpose-html-template-for-free/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        main {
            margin: 10%;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            /* Center the container */
            padding: 20px;
            text-align: center;
            /* Center text in the container */
        }

        .container-project {
            display: flex;
            /* Use flex for better alignment */
            flex-direction: column;
            /* Align items in a column */
            align-items: center;
            /* Center items horizontally */
            gap: 30px;
        }

        .project-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            /* Center the project cards */
            gap: 20px;
        }

        .project-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
            width: 300px;
            /* Set a fixed width for the cards */
        }

        .project-info {
            gap: 8px;
        }

        .project-title {
            font-size: 1.5em;
            font-weight: bold;
            color: #007bff;
        }

        .client-name,
        .deadline,
        .team-name,
        .status {
            margin: 0;
            font-size: 1.1em;
        }

        .deadline {
            color: #dc3545;
        }

        .status {
            font-weight: bold;
            text-transform: capitalize;
        }

        /* Project Status Colors */
        .unprocessed {
            border-left: 5px solid #ffc107;
        }

        .ongoing {
            border-left: 5px solid #007bff;
        }

        .completed {
            border-left: 5px solid #28a745;
        }

        .arrow {
            font-size: 50px;
            text-align: center;
            margin: 20px 0;
            color: #007bff;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 1200px) {
            .project-card {
                width: 90%;
                /* Adjust card width for smaller screens */
            }
        }

        @media (max-width: 768px) {
            .project-card {
                width: 100%;
                /* Full width on smaller devices */
            }

            .search-bar {
                width: calc(100% - 140px);
                margin-bottom: 20px;
            }

            .promotion-section {
                flex-direction: column;
            }
        }
    </style>
</head>

<body class="index-page">

    <header id="header" class="header fixed-top">

        <div class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center"><a
                            href="mailto:contact@example.com">contact@example.com</a></i>
                    <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                    <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div><!-- End Top Bar -->

        <div class="branding d-flex align-items-center">

            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <!-- <img src="day/img/logo.png" alt=""> -->
                    <img src="{{ asset('assets/img/Wan.png') }}" alt="">
                    <h1 class="sitename"></h1>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="https://wansolution.co.id/" target="blank">Home</a></li>
                        <li><a href="https://wansolution.co.id/layanan/kategori/web-development" target="blank">Web
                                Development</a></li>
                        <li><a href="https://wansolution.co.id/layanan/kategori/aplikasi-development"
                                target="blank">Aplikasi Development</a></li>
                        <li><a href="https://wansolution.co.id/layanan/kategori/mobile-apps" target="blank">Mobile
                                Apps</a></li>

                        <li class="dropdown"><a href="#"><span>Lainnya</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="https://wansolution.co.id/layanan/kategori/digital-marketing"
                                        target="blank">Digital Marketing</a></li>
                                <li><a href="https://wansolution.co.id/layanan/kategori/design-grafis"
                                        target="blank">Design Grafis</a></li>
                                <li><a href="https://wansolution.co.id/layanan/kategori/networking-infrastruktur"
                                        target="blank">Networking & Infastruktur</a></li>
                                <li><a href="https://wansolution.co.id/layanan/kategori/master-plan-it"
                                        target="blank">Master Plan IT</a></li>
                            </ul>
                        </li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
            </div>

        </div>

    </header>

    <main class="main py-5">
        <div class="container">
            <h1 class="mb-4">Client Project Search</h1>
            <form method="POST" action="{{ route('client.project') }}" class="d-flex justify-content-center mb-5"
                onsubmit="hidePromotionSection()">
                @csrf <!-- Include this to prevent CSRF attacks -->
                <input type="text" name="project_id" placeholder="Search by Project ID"
                    value="{{ request('project_id') }}" class="form-control me-2" style="max-width: 300px;">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>


            <div class='container-project'>
                {{-- Check if there is project_id and team members --}}
                @if (request('project_id'))
                    @if ($teamMembers && $teamMembers->count())
                        {{-- Unprocessed Projects --}}
                        @if (in_array($teamMembers->first()->team->project->status, ['unprocessed', 'ongoing', 'completed']))
                            <div class="container-project-unprocessed mb-5">
                                <h2 class="text-warning">Unprocessed Projects</h2>
                                <div class="row">
                                    @foreach ($teamMembers->groupBy('team_id') as $teamId => $members)
                                        @if (in_array($members->first()->team->project->status, ['unprocessed', 'ongoing', 'completed']))
                                            <div class="col-md mb-4">
                                                <div class="card unprocessed">
                                                    <div class="card-body">
                                                        <h3 class="project-title text-primary">
                                                            {{ $members->first()->team->project->name }}
                                                        </h3>
                                                        <p class="client-name"><strong>Client:</strong>
                                                            {{ $members->first()->team->project->client->name }}</p>
                                                        <p class="deadline text-danger"><strong>Deadline:</strong>
                                                            {{ \Carbon\Carbon::parse($members->first()->team->project->end_date)->format('d M Y') }}
                                                        </p>
                                                        <p class="team-name"><strong>Team:</strong>
                                                            {{ $members->first()->team->name }}</p>
                                                        <p class="status"><strong>Status:</strong> Unprocessed</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Ongoing Projects --}}
                        @if (in_array($teamMembers->first()->team->project->status, ['ongoing', 'completed']))
                            <div class="arrow mb-4 text-center">
                                <i class="bi bi-arrow-down-circle" style="font-size: 50px;"></i>
                            </div>
                            <div class="container-project-ongoing mb-5">
                                <h2 class="text-primary">Ongoing Projects</h2>
                                <div class="row">
                                    @foreach ($teamMembers->groupBy('team_id') as $teamId => $members)
                                        @if (in_array($members->first()->team->project->status, ['ongoing', 'completed']))
                                            <div class="col-md mb-4">
                                                <div class="card ongoing">
                                                    <div class="card-body">
                                                        <h3 class="project-title text-primary">
                                                            {{ $members->first()->team->project->name }}
                                                        </h3>
                                                        <p class="client-name"><strong>Client:</strong>
                                                            {{ $members->first()->team->project->client->name }}</p>
                                                        <p class="deadline text-danger"><strong>Deadline:</strong>
                                                            {{ \Carbon\Carbon::parse($members->first()->team->project->end_date)->format('d M Y') }}
                                                        </p>
                                                        <p class="team-name"><strong>Team:</strong>
                                                            {{ $members->first()->team->name }}</p>
                                                        <p class="status"><strong>Status:</strong> Ongoing</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Completed Projects --}}
                        @if (in_array($teamMembers->first()->team->project->status, ['completed']))
                            <div class="arrow mb-4 text-center">
                                <i class="bi bi-arrow-down-circle" style="font-size: 50px;"></i>
                            </div>
                            <div class="container-project-completed mb-5">
                                <h2 class="text-success">Completed Projects</h2>
                                <div class="row">
                                    @foreach ($teamMembers->groupBy('team_id') as $teamId => $members)
                                        @if ($members->first()->team->project->status == 'completed')
                                            <div class="col-md mb-4">
                                                <div class="card completed">
                                                    <div class="card-body">
                                                        <h3 class="project-title text-primary">
                                                            {{ $members->first()->team->project->name }}
                                                        </h3>
                                                        <p class="client-name"><strong>Client:</strong>
                                                            {{ $members->first()->team->project->client->name }}</p>
                                                        <p class="deadline text-danger"><strong>Deadline:</strong>
                                                            {{ \Carbon\Carbon::parse($members->first()->team->project->end_date)->format('d M Y') }}
                                                        </p>
                                                        <p class="team-name"><strong>Team:</strong>
                                                            {{ $members->first()->team->name }}</p>
                                                        <p class="status"><strong>Status:</strong> Completed</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @else
                        <p>No project data found</p>
                    @endif
                @endif
            </div>
        </div>
    </main>


    <footer id="footer" class="footer position-relative dark-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-about">
                        <img src="{{ asset('assets/img/Wan.png') }}" alt="">
                        <a href="index.html" class="logo sitename"></a>
                        <div class="footer-contact pt-3">
                            <p>Graha Nurul Menteng</p>
                            <p>Jl, Terapi Raya, RT.03/RW.19</p>
                            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                            <p><strong>Email:</strong> <span>info@example.com</span></p>
                        </div>
                        <div class="social-links d-flex mt-4">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links 1</h4>
                    <ul>
                        <li><a href="https://wansolution.co.id/" target="blank">Home</a></li>
                        <li><a href="https://wansolution.co.id/layanan/kategori/web-development" target="blank">Web
                                Development</a></li>
                        <li><a href="https://wansolution.co.id/layanan/kategori/aplikasi-development"
                                target="blank">Aplikasi Development</a></li>
                        <li><a href="https://wansolution.co.id/layanan/kategori/mobile-apps" target="blank">Mobile
                                Apps</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>2</h4>
                    <ul>
                        <li><a href="https://wansolution.co.id/layanan/kategori/digital-marketing"
                                target="blank">Digital Marketing</a></li>
                        <li><a href="https://wansolution.co.id/layanan/kategori/design-grafis" target="blank">Design
                                Grafis</a></li>
                        <li><a href="https://wansolution.co.id/layanan/kategori/networking-infrastruktur"
                                target="blank">Networking & Infastruktur</a></li>
                        <li><a href="https://wansolution.co.id/layanan/kategori/master-plan-it" target="blank">Master
                                Plan IT</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                    <form action="forms/newsletter.php" method="post" class="php-email-form">
                        <div class="newsletter-form"><input type="email" name="email"><input type="submit"
                                value="Subscribe"></div>
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                    </form>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">WAN</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">GraTek</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('day/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('day/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('day/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('day/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('day/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('day/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('day/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('day/js/main.js') }}"></script>


</body>

</html>
