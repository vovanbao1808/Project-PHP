<?php
session_start();
include "../../DB_Config/db_config.php";
if (isset($_SESSION["User"]) && $_SESSION["Role"] === "Admin") {
    if (
        isset($_POST['title']) &&
        isset($_FILES['cover']) &&
        isset($_POST['category']) &&
        isset($_POST['text'])
    ) {

        $title = $_POST['title'];
        $text = $_POST['text'];
        $category = $_POST['category'];

        if (empty($title)) {
            $em = "Tên Tiêu Đề Bị Trống";
            header("Location: ../post-add.php?error=$em");
            exit;
        } else if (empty($category)) {
            $category = 0;
        }

        $image_name = $_FILES['cover']['name'];
        if ($image_name != "") {
            $image_size = $_FILES['cover']['size'];
            $image_temp = $_FILES['cover']['tmp_name'];
            $error = $_FILES['cover']['error'];
            if ($error === 0) {
                if ($image_size > 20971520) {
                    $em = "Xin Lỗi, File Tải Lên lớn hơn 20MB";
                    header("Location: ../post-add.php?error=$em");
                    exit;
                } else {
                    $image_ex = pathinfo($image_name, PATHINFO_EXTENSION);
                    $image_ex = strtolower($image_ex);

                    $new_image_name = uniqid("BLOG-", true) . '.' . $image_ex;
                    $image_path = '../../upload/blog/' . $new_image_name;
                    move_uploaded_file($image_temp, $image_path);
                    $_SESSION['Image'] = $new_image_name;
                    $sql = "INSERT INTO post(Writer_ID, Post_Tittle, Post_Content, Category_ID, Cover_Url, Status_ID) VALUES(?,?,?,?,?,?)";
                    $stmt = $conn->prepare($sql);
                    $res = $stmt->execute([$_SESSION['ID'], $title, $text, $category, $new_image_name, 1]);
                    if ($res) {
                        $sm = "Thêm Bài Viết Thành Công!";
                        header("Location: ../post-add.php?success=$sm");
                        exit;
                    } else {
                        $em = "Lỗi Không Xác Định!";
                        header("Location: ../post-add.php?error=$em");
                        exit;
                    }
                }
            }
        } else {
            $sql = "INSERT INTO post(Writer_ID, Post_Tittle, Post_Content, Category_ID, Status_Check) VALUES(?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$_SESSION['ID'], $title, $text, $category, 1]);
            if ($res) {
                $sm = "Thêm Bài Viết mới Thành Công";
                header("Location: ../post-add.php?success=$sm");
                exit;
            } else {
                $em = "Lỗi Không xác định";
                header("Location: ../post-add.php?error=$em");
                exit;
            }
        }
    } else {
        header("Location: ../post-add.php");
        exit;
    }
} else {
    header("Location: ../404.php");
    exit;
}
