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

function getByIdDeep($conn, $id)
{
    $sql = "SELECT post.Post_ID,Username, post.Post_Tittle, post.Post_Content,Category_Name, post.Time_create, post.Cover_Url, post.Status_Check FROM post INNER JOIN account ON post.Writer_ID = account.id INNER JOIN category ON post.Category_ID = category.id WHERE category.ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() >= 1) {
        $data = [];
        while ($row = $stmt->fetch()) {
            $data[] = $row;
        }
        return $data;
    } else {
        return 0;
    }
}
