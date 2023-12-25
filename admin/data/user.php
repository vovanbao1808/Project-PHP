<?php
// Get ALL User
function getAllUser($conn)
{
    $sql = "SELECT ID, FullName, Username, Time_create FROM account";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}
// Delete by ID
function deleteByIdUser($conn, $id): void
{
    $sql = "DELETE FROM account where ID= ?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$id]);
    if ($res) {
        $em = "Xóa thành công!";
        header("Location: user.php?success=$em");
        exit;
    } else {
        $em = "Xóa Thất Bại!";
        header("Location: user.php?error=$em");
        exit;
    }
}
