<?php
session_start();
if (
    isset($_SESSION["User"]) && $_SESSION["Role"] === "Admin"
    && $_GET['ID']
) {
    $id = $_GET['ID'];
    include_once("data/post.php");
    include_once("../DB_Config/db_config.php");
    $name = getNamebyID($conn,$id);
    var_dump($name);
    // $sql1 = "";
    // $stmt1 = $conn->prepare($sql1);
    // $stmt1->execute();
    // $post = deleteByIdPost($conn, $id);
?>
    
<?php } else {
    header("Location:404.php");
    exit;
}
?>