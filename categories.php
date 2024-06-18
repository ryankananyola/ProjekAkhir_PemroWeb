<?php
    session_start();
    if(empty($_SESSION['cart'])){
        $_SESSION['cart'] = array();
        $_SESSION['jml'] = 0;
    }
?>

<html>
    <body>
        <h1>Daftar Kategori</h1>
        <h4>Tampilkan <a href="shopping_cart.php">Shopping Cart</a></h4>
        <table border="1px">
            <tr>
                <th>CateogryID</th>
                <th>CategoryName</th>
                <th>Description</th>
            </tr>

            <?php
            include 'koneksi.php';

            $kategori = mysqli_query($konek, "SELECT * FROM categories");
            while ($data = mysqli_fetch_array($kategori)) { ?>
                <tr>
                    <td><?php echo $data['CategoryID']; ?></td>
                    <td><a href="produk.php?categoryid=<?php echo $data['CategoryID']; ?>"><?php echo $data['CategoryName']; ?></a></td>
                    <td><?php echo $data['Description']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </body>

</html>