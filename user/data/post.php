<?php
// Get ALL post
function getAllPostByUser($conn, $id)
{
    $sql = "SELECT post.Post_ID,account.Username, post.Post_Tittle, post.Post_Content,category.Category_Name, post.Time_create, post.Cover_Url, post.Status_Check FROM post INNER JOIN account ON post.Writer_ID = account.id INNER JOIN category ON post.Category_ID = category.id WHERE account.ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}
// Delete by ID
function deleteByIdPost($conn, $id,): void
{
    $sql = "DELETE FROM post where Post_ID= ?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$id]);
    if ($res) {
        $em = "Successfully deleted!";
        header("Location: post.php?success=$em");
        exit;
    } else {
        $em = "Unknown error!";
        header("Location: post.php?error=$em");
        exit;
    }
}
// getById Deep 
function getByIdDeep($conn, $id, $userid)
{
    $sql = "SELECT post.Post_ID,account.Username, post.Post_Tittle, post.Post_Content,category.Category_Name, post.Time_create, post.Cover_Url, post.Status_Check FROM post INNER JOIN account ON post.Writer_ID = account.id INNER JOIN category ON post.Category_ID = category.id WHERE post.Post_ID = ? and account.ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id, $userid]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetch();
        return $data;
    } else {
        return 0;
    }
}
function getCategoryByID($conn, $id)
{
    $sql = "SELECT category.Category_Name FROM post INNER JOIN category ON post.Category_ID = category.id WHERE post.Post_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetch();
        return $data;
    } else {
        return 0;
    }
}

// Change post
