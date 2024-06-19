<?php 
if($_SESSION['role'] == ""){
    echo "<script>document.location.href = '../auth/index.php'</script>";
    die;
    exit;
}
?>

<?php
    if($_SESSION['role'] == "ketua"){
?>
<!-- ======= Header ======= -->

<header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
    <div class="d-flex align-items-center justify-content-between">
        <a href="" role="button" class="logo d-flex align-items-center fst-normal fw-semibold" style="font-size: 13px;">
            <?php echo $isi['nama_pesantren'] ?>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto mx-3">
        <ul>
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button"
                    data-bs-toggle="dropdown" aria-controls="dropdown">
                    <i class="fa fa-user-alt"></i>
                    <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <hr class="dropdown-divider">
                        <div class="text-start">username : <?php echo $_SESSION['username'] ?></div>
                        <div class="mb-1"></div>
                        <div class="text-start">nama : <?php echo $_SESSION['nama'] ?></div>
                        <div class="mb-1"></div>
                        <div class="text-start">Jabatan : <?php echo $_SESSION['role'] ?></div>
                        <hr class="dropdown-divider">
                    </li>
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>
<!-- ======= Header ======= -->

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link" href="?page=beranda" aria-current="page">
                <i class="fa fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Data Master Ketua</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="?page=ketua" aria-current="page">
                        <i class="bi bi-circle"></i><span>ketua</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components2-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Data Master Bonus</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components2-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="?page=keamanan" aria-current="page">
                        <i class="bi bi-circle"></i><span>Keamanan</span>
                    </a>
                </li>
                <li>
                    <a href="?page=pelanggaran" aria-current="page">
                        <i class="bi bi-circle"></i><span>Pelanggaran</span>
                    </a>
                </li>
                <li>
                    <a href="?page=sanksi" aria-current="page">
                        <i class="bi bi-circle"></i><span>Sanksi</span>
                    </a>
                </li>
                <li>
                    <a href="?page=santri" aria-current="page">
                        <i class="bi bi-circle"></i><span>Santri</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#person-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Data pengguna</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="person-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="?page=userprofile" aria-current="page">
                        <i class="bi bi-circle"></i><span>Pengguna</span>
                    </a>
                </li>
                <li>
                    <a href="?page=user-ubah&id_pengguna=<?=$_SESSION['id_pengguna']?>" aria-current="page">
                        <i class="bi bi-circle"></i><span>Edit Pengguna</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#laporan-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Data Laporan</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="laporan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="?page=laporan-diskusi" aria-current="page">
                        <i class="bi bi-circle"></i><span>Laporan Diskusi</span>
                    </a>
                </li>
                <li>
                    <a href="?page=laporan-pelanggaran" aria-current="page">
                        <i class="bi bi-circle"></i><span>Laporan Pelanggaran</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link" href="?page=sistemwebsite" aria-current="page">
                <i class="fab fa-internet-explorer has-icon text-primary"></i>
                <span class="text-info hover">Sistem Website</span>
            </a>
        </li><!-- End Log Out Nav -->

        <li class="nav-item">
            <a class="nav-link" onclick="return confirm('Apakah anda ingin keluar dari website ini ?')"
                href="?page=keluar" aria-current="page">
                <i class="fa fa-sign-out has-icon text-dark"></i>
                <span class="text-danger">Log Out</span>
            </a>
        </li><!-- End Log Out Nav -->

    </ul>
</aside>

<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                </div>

            </div><!-- End Right side columns -->

        </div>

    </section>

    <?php
    }else if($_SESSION['role'] == "keamanan"){
?>
    <!-- ======= Header ======= -->

    <header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
        <div class="d-flex align-items-center justify-content-between">
            <a href="" role="button" class="logo d-flex align-items-center fst-normal fw-semibold"
                style="font-size: 13px;">
                <?php echo $isi['nama_pesantren'] ?>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto mx-3">
            <ul>
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button"
                        data-bs-toggle="dropdown" aria-controls="dropdown">
                        <i class="fa fa-user-alt"></i>
                        <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <hr class="dropdown-divider">
                            <div class="text-start">username : <?php echo $_SESSION['username'] ?></div>
                            <div class="mb-1"></div>
                            <div class="text-start">nama : <?php echo $_SESSION['nama'] ?></div>
                            <div class="mb-1"></div>
                            <div class="text-start">Jabatan : <?php echo $_SESSION['role'] ?></div>
                            <hr class="dropdown-divider">
                        </li>
                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header>
    <!-- ======= Header ======= -->

    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link" href="?page=beranda" aria-current="page">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="?page=keamanan" aria-current="page">
                            <i class="bi bi-circle"></i><span>Keamanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=ketua" aria-current="page">
                            <i class="bi bi-circle"></i><span>ketua</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=pelanggaran" aria-current="page">
                            <i class="bi bi-circle"></i><span>Pelanggaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=sanksi" aria-current="page">
                            <i class="bi bi-circle"></i><span>Sanksi</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=santri" aria-current="page">
                            <i class="bi bi-circle"></i><span>Santri</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#person-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Data pengguna</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="person-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="?page=user-ubah&id_pengguna=<?=$_SESSION['id_pengguna']?>" aria-current="page">
                            <i class="bi bi-circle"></i><span>Edit Pengguna</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link" onclick="return confirm('Apakah anda ingin keluar dari website ini ?')"
                    href="?page=keluar" aria-current="page">
                    <i class="fa fa-sign-out has-icon text-dark"></i>
                    <span class="text-danger">Log Out</span>
                </a>
            </li><!-- End Log Out Nav -->

        </ul>
    </aside>

    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                    </div>

                </div><!-- End Right side columns -->

            </div>

        </section>
        <?php
    }else if($_SESSION['role'] == "wali"){
?>
        <!-- ======= Header ======= -->

        <header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
            <div class="d-flex align-items-center justify-content-between">
                <a href="" role="button" class="logo d-flex align-items-center fst-normal fw-semibold"
                    style="font-size: 13px;">
                    <?php echo $isi['nama_pesantren'] ?>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->

            <nav class="header-nav ms-auto mx-3">
                <ul>
                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button"
                            data-bs-toggle="dropdown" aria-controls="dropdown">
                            <i class="fa fa-user-alt"></i>
                            <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                        </a><!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <hr class="dropdown-divider">
                                <div class="text-start">username : <?php echo $_SESSION['username'] ?></div>
                                <div class="mb-1"></div>
                                <div class="text-start">nama : <?php echo $_SESSION['nama'] ?></div>
                                <div class="mb-1"></div>
                                <div class="text-start">Jabatan : <?php echo $_SESSION['role'] ?></div>
                                <div class="mb-1"></div>
                                <div class="text-start">Nama Anak : <?php echo $_SESSION['nama_santri'] ?></div>
                                <hr class="dropdown-divider">
                            </li>
                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->

                </ul>
            </nav><!-- End Icons Navigation -->

        </header>
        <!-- ======= Header ======= -->

        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="?page=beranda" aria-current="page">
                        <i class="fa fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!-- End Dashboard Nav -->

                <li class="nav-item">
                    <a class="nav-link" href="?page=laporan-wali" aria-current="page">
                        <i class="fa fa-user-graduate has-icon text-info"></i>
                        <span class="text-primary">Laporan Santri</span>
                    </a>
                </li><!-- End Log Out Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#person-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-menu-button-wide"></i><span>Data pengguna</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="person-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="?page=user-ubah&id_pengguna=<?=$_SESSION['id_pengguna']?>" aria-current="page">
                                <i class="bi bi-circle"></i><span>Edit Pengguna</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Components Nav -->


                <li class="nav-item">
                    <a class="nav-link" onclick="return confirm('Apakah anda ingin keluar dari website ini ?')"
                        href="?page=keluar" aria-current="page">
                        <i class="fa fa-sign-out has-icon text-dark"></i>
                        <span class="text-danger">Log Out</span>
                    </a>
                </li><!-- End Log Out Nav -->

            </ul>
        </aside>

        <main id="main" class="main">
            <section class="section dashboard">
                <div class="row">

                    <!-- Left side columns -->
                    <div class="col-lg-8">
                        <div class="row">

                        </div>

                    </div><!-- End Right side columns -->

                </div>

            </section>
            <?php   
}else{
    echo "<script>document.location.href = '../auth/index.php'</script>";
    die;
    exit;
}
?>