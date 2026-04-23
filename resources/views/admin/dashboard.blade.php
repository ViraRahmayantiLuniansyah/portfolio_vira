<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #0f0f0f;
            color: white;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: #1a1a1a;
            padding: 20px;
        }

        .sidebar h2 {
            color: #ff4da6;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: #ccc;
            text-decoration: none;
            margin: 15px 0;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #ff4da6;
        }

        /* Main */
        .main {
            flex: 1;
            padding: 30px;
        }

        .card-container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            background: #1a1a1a;
            padding: 20px;
            border-radius: 15px;
            width: 200px;
            box-shadow: 0 0 10px rgba(255, 77, 166, 0.2);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            color: #ff4da6;
            margin-bottom: 10px;
        }

        .card p {
            color: #aaa;
        }

        .topbar {
            margin-bottom: 30px;
        }

        .topbar h1 {
            color: #ff4da6;
        }

    </style>
</head>
<body>

<div class="container">

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Panel</h2>

        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.messages') }}">Messages</a>
        <a href="{{ route('admin.skills') }}">Skills</a>
        <a href="{{ route('admin.projects') }}">Projects</a>
        <a href="{{ route('admin.certificates') }}">Certificates</a>
    </div>

    <!-- Main Content -->
    <div class="main">

        <div class="topbar">
            <h1>Dashboard</h1>
            <p>Welcome to your admin panel</p>
        </div>

        <div class="card-container">

            <div class="card">
                <h3>Messages</h3>
                <p>Lihat pesan masuk</p>
            </div>

            <div class="card">
                <h3>Skills</h3>
                <p>Kelola skill</p>
            </div>

            <div class="card">
                <h3>Projects</h3>
                <p>Kelola project</p>
            </div>

            <div class="card">
                <h3>Certificates</h3>
                <p>Kelola sertifikat</p>
            </div>

        </div>

    </div>

</div>

</body>
</html>