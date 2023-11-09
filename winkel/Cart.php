<?php
include "CartFuncties.php";
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Winkelwagen</title>
</head>
<body>
<h1>Inhoud Winkelwagen</h1>

<?php
$cart = getCart();
?>

<table border="1">
    <tr>
        <th>Product</th>
        <th>Aantal</th>
        <th>Kosten</th>
    </tr>

    <?php
    $totalPrice = 0;

    foreach ($cart as $stockItemID => $quantity) {

        $pricePerItem = 2.50;
        $productCost = $pricePerItem * $quantity;
        $totalPrice += $productCost;

       $productName = "Product Name"; // Replace with actual product name

        echo "<tr>";
        echo "<td><a href='view.php?id=$stockItemID'>Product $stockItemID</a></td>";
        echo "<td>$quantity</td>";
        echo "<td>€$productCost</td>";
        echo "</tr>";
    }
    ?>

    <tr>
        <td><strong>Totaalprijs</strong></td>
        <td></td>
        <td><strong>€<?php echo number_format($totalPrice, 2); ?></strong></td>
    </tr>
</table>
<p><a href='view.php?id=0'>Naar artikelpagina van artikel 0</a></p>
<p><a href="logout.php">uitloggen</a></p>

</body>
</html>
