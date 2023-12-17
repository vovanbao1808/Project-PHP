<?php
session_start();

if (isset($_SESSION["User"]) && $_SESSION["Role"] === "Admin" && isset($_GET['ID'])) {
    $post_id = $_GET['ID'];

    include_once("data/post.php");

    include_once("../DB_Config/db_config.php");
    $post = getByIdDeep($conn, $post_id);
    $category = getCategoryById($conn, $post_id);

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Dashboard - <?php echo $post['Post_Tittle'] ?> </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/side-bar.css">
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </head>

    <body>
        <?php
        include "inc/side-nav.php";
        ?>
        <h3 class="mb-3">
            <a href="post.php" class="btn btn-secondary">All Posts</a> <a href="category.php" class="btn btn-secondary">All Category</a>
        </h3>
        <h3 class="mb-3">

        </h3>
        <div class="main-table">

            <div class="card main-blog-card mb-5">
                <img src="../upload/blog/<?php echo $post['Cover_Url'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post['Post_Title'] ?></h5>
                    <?php echo $post['Post_Content'] ?>
                    <hr>
                    <p class="card-text d-flex justify-content-between">
                        <b>Category: <?php echo $category['Category_Name'] ?></b>
                        <small class="text-body-secondary">Date: <?php echo $post['Time_create'] ?></small>
                    </p>
                </div>
            </div>

        </div>
        </section>
        </div>

        <script>
            var navList = document.getElementById('navList').children;
            navList.item(1).classList.add("active");
        </script>
    </body>

    </html>

<?php } else {
    header("Location: 404.php");
    exit;
} ?>