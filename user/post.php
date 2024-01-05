<?php
session_start();
if (
    isset($_SESSION["User"]) &&
    $_SESSION["Role"] === "User"
) {

    include_once("data/post.php");
    include("../DB_Config/db_config.php");
    $post = getAllPost($conn, $_SESSION["ID"]);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Bài Viết</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/side-bar.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <?php
        include('inc/side-nav.php');
        ?>
        <div>
            <h3 class="mb-3 text-center">Tất Cả Bài Viết
                <br>
                <a href="post-add.php" class="btn btn-success">Thêm Bài Viết Mới</a>
                <br>
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
                <table class="table t1 table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">ID </th>
                            <th class="text-center" scope="col">Người Viết</th>
                            <th class="text-center" scope="col">Ảnh bìa</th>
                            <th class="text-center" scope="col">Tiêu đề</th>
                            <th class="text-center" scope="col">Danh Mục</th>
                            <th class="text-center" scope="col">Thời Gian Tạo</th>
                            <th class="text-center" scope="col">Hành Động</th>
                            <th class="text-center" scope="col">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($post as $post) {
                        ?>
                            <tr>
                                <td class="text-center" scope="row"><?php echo ($count++) ?></td>
                                <td class="text-center" scope="row"><?php echo $post["Username"] ?></td>
                                <td class="text-center"><img src="../upload/blog/<?php echo $post["Cover_Url"] ?>" width="50%" height="50%"></td>
                                <td class="text-center" scope="row"><a href="single-post.php?ID=<?php echo $post["Post_ID"] ?>"> <?php echo $post["Post_Tittle"] ?> </td>
                                <td class="text-center" scope="row"><?php echo $post["Category_Name"] ?></td>
                                <td class="text-center" scope="row"><?php echo $post["Time_create"] ?></td>
                                <td class="text-center" scope="row">
                                    <a href="post-edit.php?ID=<?php echo $post["Post_ID"] ?>" class="btn btn-success">Sửa</a>
                                    <br> &nbsp;<br>
                                    <a href="post-delete.php?ID=<?php echo $post["Post_ID"] ?>" class="btn btn-danger">Xóa</a>
                                </td>
                                <td scope="row"><?php echo $post['Status_Name'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="alert alert-warning">
                    Trống!
                </div>
            <?php } ?>
        </div>
        </section>
        </div>
        <!-- <script>
            var navList = document.getElementById('navList').children;
            navList.item(1).classList.add("active");
        </script> -->
    </body>

    </html>
<?php } else {
    header("Location:404.php");
    exit;
}
?>