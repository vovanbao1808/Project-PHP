<?php
session_start();
if (isset($_SESSION["User"]) && $_SESSION["Role"] === "Admin") {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Dashboard - Category</title>
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
            <h3 class="mb-3">All Category
                <a href="category-add.php" class="btn btn-success">Add New Category</a>
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
            <?php if ($category != 0) {
                $count = 0 ?>
                <table class="table t1 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID </th>
                            <th scope="col">Name Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($category as $category) {

                        ?>
                            <tr>
                                <th scope="row"><?php echo ($count++) ?></th>
                                <td><?php echo $category["Category_Name"] ?></td>
                                <td>
                                    <a href="category-delete.php?ID=<?php echo $category["ID"] ?>" class="btn btn-danger">Delete</a>
                                    <br>
                                    &nbsp
                                    <a href="category-edit.php?ID=<?php echo $category["ID"] ?>" class="btn btn-danger">Edit</a>
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
            navList.item(2).classList.add("active");
        </script>
    </body>

    </html>
<?php } else {
    header("Location:404.php");
    exit;
}
?>