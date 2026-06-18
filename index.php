<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendaftaran Mahasiswa Baru</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>

        body{
            background-color: #f5f7fb;
            overflow-x: hidden;
        }

        .sidebar{
            width: 250px;
            min-height: 100vh;
            background-color: #002D80;
            position: fixed;
            left: 0;
            top: 0;
        }

        .sidebar-title{
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 22px;
            font-weight: bold;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        .sidebar a{
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px 20px;
            transition: 0.3s;
        }

        .sidebar a:hover{
            background-color: #0052CC;
        }

        .sidebar .active{
            background-color: #0052CC;
        }

        .main-content{
            margin-left: 250px;
            padding: 30px;
        }

        .page-title{
            color: #002D80;
            font-weight: bold;
        }

    </style>

</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">

        <div class="sidebar-title">
            PMB Dashboard
        </div>

        <a href="index.php?page=home"
           class="<?php echo ($page == 'home') ? 'active' : ''; ?>">
            <i class="bi bi-house-door-fill"></i>
            Home
        </a>

        <a href="index.php?page=camaba"
           class="<?php echo ($page == 'camaba') ? 'active' : ''; ?>">
            <i class="bi bi-people-fill"></i>
            CAMABA
        </a>

        <a href="index.php?page=laporan"
           class="<?php echo ($page == 'laporan') ? 'active' : ''; ?>">
            <i class="bi bi-bar-chart-fill"></i>
            Laporan
        </a>

    </div>

    <!-- Main Content -->
    <div class="main-content">

        <?php

        switch($page)
        {
            case 'camaba':
                include 'pages/camaba.php';
                break;

            case 'laporan':
                include 'pages/laporan.php';
                break;

            case 'home':
            default:
                include 'pages/home.php';
                break;
        }

        ?>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>