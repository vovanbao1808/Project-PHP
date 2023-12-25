<?php
session_start();
include "../../DB_Config/db_config.php";
if (isset($_SESSION["User"]) && $_SESSION["Role"] === "Admin") {
    if (
        isset($_POST['category'])
    ) {
        $category = $_POST['category'];

        if (empty($category)) {
            $em = "Tên Danh Mục Trống";
            header("Location: ../category-add.php?error=$em");
            exit;
        } else {
            $sql = "INSERT INTO category(Category_Name)VALUES(?)";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$category]);
            if ($res) {
                $sm = "Thêm Danh Mục Mới Thành Công!";
                header("Location: ../category-add.php?success=$sm");
                exit;
            } else {
                $em = "Lỗi Không xác định";
                header("Location: ../category-add.php?error=$em");
                exit;
            }
        }
    } else {
        header("Location: ../category-add.php");
        exit;
    }
} else {
    header("Location: ../404.php");
    exit;
}
