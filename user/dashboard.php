<?php
session_start();
if (isset($_SESSION["User"]) && $_SESSION["Role"] === "User") {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/side-bar.css">
    </head>

    <body>
        <input type="checkbox" id="checkbox">
        <header class="header">
            <h2 class="u-name">My <b>Blog</b>
                <label for="checkbox">
                    <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
                </label>
            </h2>
            <i class="fa fa-user" aria-hidden="true"></i>
        </header>
        <div class="body">
            <nav class="side-bar">
                <div class="user-p">
                    <img src="../img/user.jpg">
                    <h4>Elias</h4>
                </div>
                <ul>
                    <li>
                        <a href="#">
                            <i class="fa fa-desktop" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <span>Message</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-comment-o" aria-hidden="true"></i>
                            <span>Comment</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <span>About</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <span>Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="../logout.php">
                            <i class="fa fa-power-off" aria-hidden="true"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <section class="section-1">
                <h1>WELCOME</h1>
                <p>#CodingWithElias</p>
            </section>
        </div>

    </body>

    </html>







<?php } else {
    header("Location:404.php");
    exit;
}
?>