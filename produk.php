<?php
    session_start();
    if(empty($_SESSION['cart'])){
        $_SESSION['cart'] = array();
        $_SESSION['jml'] = 0;
    }
?>
<?php
    include 'koneksi.php';

    $categoryid = $_GET['categoryid'];
    $kategori = mysqli_query($konek, "SELECT * FROM Categories WHERE CategoryID = '$categoryid'");
    $datakategori = mysqli_fetch_array($kategori);
?>

<html>
    <body>
        <h1>Daftar Produk</h1>
        <h4>Tampilkan <a href = "shopping_cart.php">Shopping Cart</a></h4>
        <h2>Kategori : <?php echo $datakategori['CategoryName'];?></h2>
        <table border = "1px">
            <tr>
                <th>ProductID</th>
                <th>ProductName</th>
                <th>UnitPrice</th>
            </tr>

            <?php
            $produk = mysqli_query($konek, "SELECT * FROM Products WHERE CategoryID = '$categoryid'");
            while($data = mysqli_fetch_array($produk)){ ?>
                <tr>
                    <td><?php echo $data['ProductID']; ?></td>
                    <td><a href ="detail_produk.php?productid=<?php echo $data['ProductID']; ?> "><?php echo $data['ProductName']; ?></a></td>
                    <td><?php echo $data['UnitPrice']; ?></td>
                </tr>
                
        <?php
        }

        ?>
        </table>
    </body>
</html>