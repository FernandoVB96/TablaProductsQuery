<?php
require_once './php/connection.php';

$con = connection();

$sql = "SELECT ProductName, CategoryName, UnitPrice FROM products, categories WHERE products.CategoryID = categories.CategoryID
AND products.UnitPrice > (SELECT AVG(UnitPrice) FROM products p WHERE p.CategoryID = products.CategoryID)";
$query = mysqli_query($con, $sql);
$fields = mysqli_fetch_fields($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Products</title>
</head>
<body>
    <h2>Products</h2>
    <div class="tabla">
        <table border="1">
            <thead>
            <tr>
                <th>ProductName</th>
                <th>CategoryName</th>
                <th>UnitPrice</th>
            </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                <tr>
                    <td><?= $row['ProductName'] ?></td>
                    <td><?= $row['CategoryName'] ?></td>
                    <td><?= $row['UnitPrice'] . " €" ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
