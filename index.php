<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>barcode</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action="./index.php" method="get">
            <label for="fname">Scanner</label>
            <input type="text" id="number" name="number" placeholder="barcode scanner" autocomplete="off">
        </form>
    </div>

    <?php
    if (isset($_GET['number'])) {

        $sql = "SELECT * FROM products WHERE number = '" . $_GET['number'] . "'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>
        <div class="container">
            <img src="img/<?php echo $results[0]['img']; ?>" width="35%">
            <h2>ชื่อสินค้า : <span id="name"><?php echo $results[0]['name']; ?></span></h2>
            <h3>จำนวนคงเหลือ : <span id="quantity"><?php echo $results[0]['quantity']; ?>
                    <?php echo $results[0]['unit']; ?></span></h3>
        </div>
    <?php }
    ?>

</body>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.getElementById("number").focus();
    });
</script>

</html>