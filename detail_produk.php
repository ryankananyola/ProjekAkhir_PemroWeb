<?php
    session_start();
    if(empty($_SESSION['cart'])){
        $_SESSION['cart'] = array();
        $_SESSION['jml'] = 0;
    }
?>

<?php
include "koneksi.php";

$productid = $_GET['productid'];
$produk = mysqli_query($konek, "SELECT * FROM Products WHERE ProductID='$productid'");
$dataproduk = mysqli_fetch_array($produk);
?>

<html>
    <body>
        <center>
            <h3>DETAIL PRODUK</h3>
            <table border="1">
                <tr>
                    <td>
                        ProductID
                    </td>
                    <td>:</td>
                    <td><?php echo $dataproduk['ProductID']; ?></td>
                </tr>
                <tr>
                    <td>
                        ProductName
                    </td>
                    <td>:</td>
                    <td><?php echo $dataproduk['ProductName']; ?></td>
                </tr>
                <tr>
                    <td>
                        SupplierID
                    </td>
                    <td>:</td>
                    <td><?php echo $dataproduk['SupplierID']; ?></td>
                </tr>
                <tr>
                    <td>
                        QuantityPerUnit
                    </td>
                    <td>:</td>
                    <td><?php echo $dataproduk['QuantityPerUnit']; ?></td>
                </tr>
                <tr>
                    <td>
                        UnitPrice
                    </td>
                    <td>:</td>
                    <td><?php echo $dataproduk['UnitPrice']; ?></td>
                </tr>
                <tr>
                    <td>
                        UnitsInStock
                    </td>
                    <td>:</td>
                    <td><?php echo $dataproduk['UnitsInStock']; ?></td>
                </tr>
                <tr>
                    <td>
                        UnitsInOrder
                    </td>
                    <td>:</td>
                    <td><?php echo $dataproduk['UnitsOnOrder']; ?></td>
                </tr>
                <tr>
                    <td>
                        ReorderLevel
                    </td>
                    <td>:</td>
                    <td><?php echo $dataproduk['ReorderLevel']; ?></td>
                </tr>
                <tr>
                    <td>
                        Discontinued
                    </td>
                    <td>:</td>
                    <td><?php echo $dataproduk['Discontinued']; ?></td>
                </tr>
            </table>

            <form action = "input_cart.php" method = "POST">
                <input type ="hidden" name = "productid" value="<?php echo $dataproduk['ProductID']; ?>">
                <input type ="hidden" name = "productname" value="<?php echo $dataproduk['ProductName']; ?>">
                <input type ="hidden" name = "unitprice" value="<?php echo $dataproduk['UnitPrice']; ?>">
                <br>
                <input type = "text" name = "jumlah" placeholder = "jumlah" >
                <input type = "submit" value = "Beli">
            </form>
            <h3>Tampilkan <a href = "shopping_cart.php">Shopping Cart</a></h3>
        </center>
    </body>
</html>