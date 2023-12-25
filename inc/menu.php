<?php
session_start();
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/Project-PHP/index.php">MyBlog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/Project-PHP/index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Project-PHP/blog.php">Bài Viết</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Project-PHP/about.php">Về Chúng tôi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Project-PHP/contact.php">Liên hệ</a>
                </li>
                <?php
                if (isset($_SESSION["User"])) {
                    echo <<<PHP
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome {$_SESSION["User"]}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
PHP;
                    if ($_SESSION["Role"] === "Admin") {
                        echo '<li><a class="dropdown-item" href="/Project-PHP/admin/dashboard.php">Trang Quản lý ADMIN</a></li>';
                    } else if ($_SESSION['Role'] === "User") {
                        echo '<li><a class="dropdown-item" href="/Project-PHP/user/dashboard.php">Quản Lý Bài Viết</a></li>';
                    }
                    echo '<li><a class="dropdown-item" href="profile.php">Trang cá nhân</a></li>';
                    echo '<li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>';
                    echo '</ul></div>';
                } else {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="login.php">Login</a>';
                    echo '</li>';
                }
                ?>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Tìm Kiếm</button>
            </form>
        </div>
    </div>
</nav>