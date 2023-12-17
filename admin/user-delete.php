<?php
session_start();
if (
    isset($_SESSION["User"]) && $_SESSION["Role"] === "Admin"
    && $_GET['ID']
) {
    $id = $_GET['ID'];
    var_dump($_GET['ID']);
    include_once("data/user.php");
    include_once("../DB_Config/db_config.php");
    $user = deleteByIdUser($conn, $id);
?>
    
<?php } else {
    header("Location:404.php");
    exit;
}
?>