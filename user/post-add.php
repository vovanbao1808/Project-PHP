<?php
session_start();
if (isset($_SESSION["User"]) && $_SESSION["Role"] === "User") {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Dashboard - Create New Post</title>
        <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/side-bar.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <?php
        include('inc/side-nav.php');
        include_once("data/category.php");
        include("../DB_Config/db_config.php");
        $category = getAllCategory($conn);
        ?>

        <div class="main-table">
            <h3 class="mb-3">Create New Post
                <a href="post.php" class="btn btn-secondary">Posts</a>
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

            <form class="shadow p-3" action="req/post-create.php" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label class="form-label">Author</label>
                    <input disabled type="text" class="form-control" name="user_write" value="<?php echo $_SESSION["User"] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Cover Image</label>
                    <input type="file" class="form-control" name="cover">
                </div>
                <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea class="form-control text" name="text" id="content" rows="12" cols="50"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-control">
                        <?php foreach ($category as $category) { ?>
                            <option value="<?php echo $category['ID'] ?>">
                                <?php echo $category['Category_Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>.
        </section>
        </div>

        <script>
            ClassicEditor
                .create(document.querySelector('#content'))
                .catch(error => {
                    console.error(error);
                });
        </script>
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