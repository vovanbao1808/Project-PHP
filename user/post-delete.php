<?php
session_start();
if (
    isset($_SESSION["User"]) && $_SESSION["User"] === "Admin"
    && $_GET['ID']
) {
    $id = $_GET['ID'];
    include_once("data/post.php");
    include_once("../DB_Config/db_config.php");
    $post = deleteByIdPost($conn, $id);
?>
    
<?php } else {
    header("Location:404.php");
    exit;
}
?>