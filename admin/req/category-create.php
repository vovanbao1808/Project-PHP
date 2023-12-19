<?php
session_start();
include "../../DB_Config/db_config.php";
if (isset($_SESSION["User"]) && $_SESSION["Role"] === "Admin") {
    if (
        isset($_POST['category'])
    ) {
        $category = $_POST['category'];

        if (empty($category)) {
            $em = "Category is required";
            header("Location: ../category-add.php?error=$em");
            exit;
        } else {
            $sql = "INSERT INTO category(Category_Name)VALUES(?)";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$category]);
            if ($res) {
                $sm = "Successfully Created!";
                header("Location: ../category-add.php?success=$sm");
                exit;
            } else {
                $em = "Unknown error occurred";
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
