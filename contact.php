<?php
session_start();
include('inc/menu.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Liên hệ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <br>
    <br>
    <div class="card container">
        <div class="card container">
            <div class="card-body text-center">
                <h5 class="card-title">ADMIN1</h5>
                <h6 class="card-subtitle mb-2 text-muted">Nội dung liên hệ</h6>
                <p class="card-text">Họ và tên: Võ Văn Bảo.
                    <br>
                    Đây là ADMIN quản trị các vấn đề liên quan đến server trang web
                    <br>
                    Các phương thức liên hệ với ADMIN1 nếu server web bị lỗi
                </p>
                <i class="fa fa-facebook" aria-hidden="true"></i>
                &nbsp;
                &nbsp;
                <a href="https://facebook.com/vovanbao.1808" class="card-link">Võ Văn Bảo</a>
                &nbsp;
                &nbsp;
                <i class="fa fa-github"></i>
                &nbsp;
                &nbsp;
                <a href="https://github.com/vovanbao1808" class="card-link">Võ Văn Bảo</a>
            </div>
        </div>
        <br>
        <br>
        <div class="card container">
            <div class="card-body text-center">
                <h5 class="card-title">ADMIN2</h5>
                <h6 class="card-subtitle mb-2 text-muted">Nội dung liên hệ</h6>
                <p class="card-text">Họ và tên: Nguyễn Ngọc Mai Phương.
                    <br>
                    Đây là ADMIN sẽ quản trị các bài viết liên quan đến trang web
                    <br>
                    Các phương thức liên hệ với ADMIN2 nếu cần duyệt bài viết
                </p>
                <i class="fa fa-facebook" aria-hidden="true"></i>
                &nbsp;
                &nbsp;
                <a href="https://facebook.com/nnmp.pmnn" class="card-link">Nguyễn Ngọc Mai Phương</a>
                &nbsp;
                &nbsp;
            </div>
        </div>
    </div>
</body>