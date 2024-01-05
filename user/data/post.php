<?php
// Get ALL post
function getAllPost($conn, $id)
{
    $sql = "SELECT post.Post_ID,account.Username, post.Post_Tittle,category.Category_Name, post.Time_create, post.Cover_Url, post_status.Status_Name, post.Status_ID FROM post INNER JOIN account ON post.Writer_ID = account.id INNER JOIN category ON post.Category_ID = category.id INNER JOIN post_status on post.Status_ID = post_status.Status_ID WHERE account.ID = ? ORDER BY post.Time_Create DESC ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}
//
function getPostNamebyID($conn, $id)
{
    $sql = "SELECT Post_Tittle from post WHERE Post_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetch();
    return $data["Post_Tittle"];
}
// Delete Post 
function deleteByIdPost($conn, $id): void
{
    $sql = "DELETE FROM post where Post_ID= ?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$id]);
    if ($res) {
        $em = "Xóa thành công";
        header("Location: post.php?success=" . urlencode($em));
        exit;
    } else {
        $em = "Xóa thất Bại";
        header("Location: post.php?error=" . urlencode($em));
        exit;
    }
}
// Read Post 
function getByIdDeep($conn, $id)
{
    $sql = "SELECT post.Post_ID,account.Username, post.Post_Tittle, post.Post_Content,category.Category_Name, post.Time_Create, post.Cover_Url, post_status.Status_Name FROM post INNER JOIN account ON post.Writer_ID = account.id INNER JOIN category ON post.Category_ID = category.id INNER JOIN post_status ON post.Status_ID = post_status.Status_ID  WHERE post.Post_ID = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetch();
        return $data;
    } else {
        return 0;
    }
}
//get Category 
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
// GET ALL CATEGORY
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
