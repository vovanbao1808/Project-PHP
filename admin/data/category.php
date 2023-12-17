<?php
function getAllCategory($conn)
{
    $sql = "SELECT * FROM category";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}

function deleteByIdCategory($conn, $id): void
{
    $sql = "DELETE FROM category where ID= ?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$id]);
    if ($res) {
        $em = "Successfully deleted!";
        header("Location: category.php?success=$em");
        exit;
    } else {
        $em = "Unknown error!";
        header("Location: category.php?error=$em");
        exit;
    }
}
