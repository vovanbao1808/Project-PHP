<?php
session_start();
include('inc/menu.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bài Viết</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <section class="d-flex">
            <main class="main-blog">
                <?php for ($i = 0; $i <= 10; $i++) { ?>
                    <div class="card main-blog-card">
                        <img src="/Project-PHP/upload/blog/<?php echo $_SESSION['Image'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Blog title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <p class="card-text">
                                <small class="text-body-secondary"> Last updated 3 mins ago</small>
                            </p>
                            <a href="#" class="btn btn-primary ">Read more</a>
                        </div>
                    </div>
                    <br><br>
                <?php
                } ?>
            </main>
        </section>
    </div>


</body>

</html>