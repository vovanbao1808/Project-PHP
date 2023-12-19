<?php
session_start();
include "../../DB_Config/db_config.php";
if (isset($_SESSION["User"]) && $_SESSION["Role"] === "User") {
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
            $em = "Title is required";
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
                    $em = "Sorry, your file is too large";
                    header("Location: ../post-add.php?error=$em");
                    exit;
                } else {
                    $image_ex = pathinfo($image_name, PATHINFO_EXTENSION);
                    $image_ex = strtolower($image_ex);

                    $new_image_name = uniqid("BLOG-", true) . '.' . $image_ex;
                    $image_path = '../../upload/blog/' . $new_image_name;
                    move_uploaded_file($image_temp, $image_path);
                    $_SESSION['Image'] = $new_image_name;
                    $sql = "INSERT INTO post(Writer_ID, Post_Tittle, Post_Content, Category_ID, Cover_Url, Status_Check) VALUES(?,?,?,?,?,?)";
                    $stmt = $conn->prepare($sql);
                    $res = $stmt->execute([$_SESSION['ID'], $title, $text, $category, $new_image_name, 1]);
                    if ($res) {
                        $sm = "Successfully Created!";
                        header("Location: ../post-add.php?success=$sm");
                        exit;
                    } else {
                        $em = "Unknown error occurred";
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
                $sm = "Successfully Created!";
                header("Location: ../post-add.php?success=$sm");
                exit;
            } else {
                $em = "Unknown error occurred";
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
