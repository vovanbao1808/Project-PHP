<?php
session_start();
if (isset($_SESSION["User"]) && $_SESSION["Role"] === "User") {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Dashboard - Posts</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/side-bar.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <?php
        $User_ID = $_SESSION['ID'];
        include('inc/side-nav.php');
        include_once("data/post.php");
        include("../DB_Config/db_config.php");
        $post = getAllPostByUser($conn, $User_ID);
        ?>

        <div class="main-table">
            <h3 class="mb-3">All Posts
                <a href="post-add.php" class="btn btn-success">Add New Post</a>
            </h3>
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-warning">
                    <?= htmlspecialchars($_GET['error']) ?>
                </div>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success">
                    <?= htmlspecialchars($_GET['success']) ?>
                </div>
            <?php } ?>
            <?php if ($post != 0) {
                $count = 0 ?>
                <table class="table t1 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID </th>
                            <th scope="col">Author</th>
                            <th scope="col">Post Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Time create</th>
                            <th scope="col">Action</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($post as $post) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo ($count++) ?></th>
                                <td><?php echo $post["Username"] ?></td>
                                <td><img src="../upload/blog/<?php echo $post["Cover_Url"] ?>"></td>
                                <td><a href="single-post.php?ID=<?php echo $post["Post_ID"] ?>"> <?php echo $post["Post_Tittle"] ?> </td>
                                <td><?php echo $post["Category_Name"] ?></td>
                                <td><?php echo $post["Time_create"] ?></td>
                                <td>
                                    <a href="post-delete.php?ID=<?php echo $post["Post_ID"] ?>" class="btn btn-danger">Delete</a>
                                    <br>
                                    &nbsp
                                    <a href="post-edit.php?ID=<?php echo $post["Post_ID"] ?>" class="btn btn-danger">Edit</a>
                                </td>
                                <td>
                                    <?php if ($post["Status_Check"] === 0) {
                                        echo "Post not accept to show";
                                    } else if ($post["Status_Check"] === 1) {
                                        echo "Post accept to show";
                                    } else {
                                        echo "Error!";
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="alert alert-warning">
                    Empty!
                </div>
            <?php } ?>
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
    header("Location:404.php");
    exit;
}
?>