<?php
session_start();
if (
    isset($_SESSION["User"]) &&
    $_SESSION["Role"] === "Admin"
    && $_GET['ID']
) {
    $id = $_GET['ID'];
    include_once("data/post.php");
    include_once("../DB_Config/db_config.php");
    $name = getPostNamebyID($conn, $id);
    $sql1 = "INSERT INTO history(User_ID,Post_Tittle,Event_ID) VALUES (?,?,?)";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute([$_SESSION['ID'], $name, 7]);
    $post = deleteByIdPost($conn, $id);
?>
<?php } else {
    header("Location:404.php");
    exit;
}
?>