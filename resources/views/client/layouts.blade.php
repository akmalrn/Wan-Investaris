<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard</title>
    <style>
        :root {
            --primary-color: #4a90e2;
            --secondary-color: #f5f7fa;
            --text-color: #333;
            --sidebar-width: 250px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--secondary-color);
            color: var(--text-color);
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: var(--sidebar-width);
            background-color: #fff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 30px;
        }

        .nav-list {
            list-style-type: none;
        }

        .nav-item {
            margin-bottom: 15px;
        }

        .nav-link {
            text-decoration: none;
            color: var(--text-color);
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .nav-link:hover {
            color: var(--primary-color);
        }

        .nav-link i {
            margin-right: 10px;
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .welcome-text {
            font-size: 24px;
            font-weight: bold;
        }

        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .widget-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .widget {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .widget-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .widget-title {
            font-size: 18px;
            font-weight: bold;
        }

        .widget-content {
            font-size: 24px;
            font-weight: bold;
            color: var(--primary-color);
        }

        .progress-bar {
            width: 100%;
            height: 10px;
            background-color: #e0e0e0;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 10px;
        }

        .progress {
            height: 100%;
            background-color: var(--primary-color);
            width: 75%;
        }

        .container-project {
            display: flex;
            flex-direction: column;
            gap: 30px;
            padding: 20px;
        }

        .project-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .project-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: calc(33.33% - 20px);
            box-sizing: border-box;
        }

        .project-info {
            display: flex;
            flex-direction: column;
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
            margin: 20px 0
            padding: 20px;
            /* Add some vertical spacing */
            font-size: 24px;
            /* Increase the font size for better visibility */
            color: var(--primary-color);
            /* Use the primary color for the arrow */
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 1200px) {
            .project-card {
                width: calc(50% - 20px);
                /* 2 cards per row */
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
                /* Reduce sidebar width */
            }

            .logo {
                font-size: 20px;
                /* Smaller logo font */
            }

            .welcome-text {
                font-size: 20px;
                /* Smaller welcome text */
            }

            .arrow {
                font-size: 20px;
                /* Smaller arrow text */
            }

            .project-card {
                width: 100%;
                /* 1 card per row */
            }
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="logo">ClientDash</div>
            <nav>
                <ul class="nav-list">
                    <li class="nav-item"><a href="{{ route('client.dashboard') }}" class="nav-link"><i>🏠</i>Dashboard</a></li>
                    <li class="nav-item"><a href="{{ route('client.project') }}" class="nav-link"><i>📁</i>Projects</a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
            <header class="header">
                <div class="welcome-text">Welcome back, John!</div>
                <div class="user-profile">
                    <img src="/placeholder.svg?height=40&width=40" alt="User Avatar" class="user-avatar">
                    <span>{{ auth()->user()->name }}</span>
                </div>
            </header>
            @yield('content')
        </main>
    </div>
</body>

</html>
