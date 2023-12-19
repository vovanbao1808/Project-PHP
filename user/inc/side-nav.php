<?php
session_start();
?>
<input type="checkbox" id="checkbox">
<header class="header">
    <h2 class="u-name">My<b>Blog</b>
        <label for="checkbox">
            <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
        </label>
    </h2>
    <div class="d-flex align-items-center">
        <i class="fa fa-user" aria-hidden="true"></i> &nbsp;
        <span><?php echo $_SESSION['User'] ?></span>
    </div>

</header>
<div class="body">
    <nav class="side-bar">
        <div class="user-p">
            <img src="../upload/user/512px-Hacker_behind_PC.svg.png">
            <h4><?php echo $_SESSION['User'] ?></h4>
        </div>
        <ul class="navList">
            <li>
                <a href="../user/post.php">
                    <i class="fa fa-wpforms" aria-hidden="true"></i>
                    <span>Post</span>
                </a>
            </li>
            <li>
                <a href="../user/history.php">
                    <i class="fa fa-wpforms" aria-hidden="true"></i>
                    <span>History</span>
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