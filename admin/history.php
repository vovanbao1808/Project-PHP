<?php
session_start();
if (isset($_SESSION["User"]) && $_SESSION["Role"] === "Admin") {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Trang Quản Lý - Lịch Sử</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/side-bar.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <?php
        include('inc/side-nav.php');
        include_once('data/history.php');
        include_once('../DB_Config/db_config.php');
        $history = getALLHistory($conn, $_SESSION['ID']);
        // var_dump($history);
        if ($history != 0) {
            $count = 0;
        ?>
            <table class="table t1 table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID </th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Sự kiện</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($history as $history) { ?>
                        <tr>
                            <td scope="row"><?php echo ($count++) ?></td>
                            <td scope="row"><?php echo $history["Time_Event"] ?></td>
                            <td scope="row">
                                <?php
                                if ($history["Event_ID"] === 1) {
                                    echo $history["Username"] . " " . $history["Event_Name"];
                                } else if ($history["Event_ID"] === 2) {
                                    echo $history["Username"] . " " . $history["Event_Name"];
                                } else {
                                    if (empty($history["Post_Tittle"])) {
                                        echo $history["Username"] . " " . $history["Event_Name"] . " " . "tên" . " " . $history["Category_Name"];
                                    } else {
                                        echo $history["Username"] . " " . $history["Event_Name"] . " "  . $history["Post_Tittle"];
                                    }
                                }
                                ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-warning">
                Trống!
            </div>
        <?php } ?>

        </section>
        </div>
    </body>

    </html>
<?php } else {
    header("Location:404.php");
    exit;
}
?>