<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/employee.css') }}"> <!-- Link to your custom CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            /* Prevent horizontal scroll */
        }

        .sidebar {
            position: fixed;
            /* Fixes the sidebar to the left */
            top: 0;
            /* Aligns to the top */
            left: 0;
            /* Aligns to the left */
            width: 250px;
            height: 100vh;
            /* Full height */
            overflow-y: auto;
            /* Allows scrolling within the sidebar if content overflows */
            transition: all 0.3s ease;
            /* Smooth transition for any width adjustments */
        }

        .main-content {
            margin-left: 250px;
            /* Adds space for the sidebar */
        }

        .header {
            position: sticky;
            /* Keeps header fixed while scrolling */
            top: 0;
            /* Aligns to the top */
            z-index: 1000;
            /* Ensures it stays on top of other content */
        }

        .card {
            flex: 1 1 auto;
            /* Allow cards to grow and shrink */
            max-width: 300px;
            /* Set a maximum width for cards */
            margin: 10px;
            /* Margin between cards */
        }

        .d-flex {
            display: flex;
            /* Enable flexbox layout */
            flex-wrap: wrap;
            /* Allow items to wrap to the next line */
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <aside class="sidebar bg-secondary text-white p-3">
            <div class="logo fs-4 fw-bold mb-4">EmployeeDash</div>
            <nav>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('employee.dashboard') }}" class="nav-link text-white">
                            <i class="bi bi-house-door"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee.teams') }}" class="nav-link text-white">
                            <i class="bi bi-people"></i> Team
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee.project') }}" class="nav-link text-white">
                            <i class="bi bi-briefcase"></i> Project
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="main-content flex-grow-1 p-3">
            <header
                class="header d-flex justify-content-between align-items-center mb-4 bg-white p-3 rounded shadow-sm">
                <div class="welcome-text fs-4 fw-bold">
                    @yield('title'), {{ auth()->user()->name }}
                </div>
                <div class="user-profile d-flex align-items-center">
                    <img src="/placeholder.svg?height=40&width=40" alt="User Avatar"
                        class="user-avatar rounded-circle me-2">
                    <span>{{ auth()->user()->name }}</span>
                </div>
            </header>
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
