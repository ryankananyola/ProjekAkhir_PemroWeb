<?php
    session_start();
    if(empty($_SESSION['cart'])){
        $_SESSION['cart'] = array();
        $_SESSION['jml'] = 0;
        $_SESSION['total'] = 0;
    }

    $productid = $_POST['productid'];
    $productname = $_POST['productname'];
    $unitprice = $_POST['unitprice'];
    $jumlah = $_POST['jumlah'];
    $subtotal = $unitprice*$jumlah;

    array_push($_SESSION['cart'], array($productid, $productname, $unitprice, $jumlah, $subtotal));

    include 'koneksi.php';

    $produk = mysqli_query($konek, "SELECT * FROM Products WHERE ProductID = '$productid'");
    $dataproduk = mysqli_fetch_array($produk);

    $order = $dataproduk['UnitsOnOrder'] + $jumlah;
    $stock = $dataproduk['UnitsInStock'] - $jumlah;
    $_SESSION['jml']++;
    $_SESSION['total'] = $_SESSION['total'] + $subtotal;

    $update = mysqli_query($konek, "UPDATE Products set UnitsOnOrder ='$order', UnitsInStock = '$stock' WHERE ProductID= '$productid'");
    if ($update){ ?>
        
        <html>
            <body>
                <h5>Barang telah diinput ke <a href="shopping_cart.php">Shopping Cart</a></h5>
            </body>
        </html>
        <?php
    }
?>
