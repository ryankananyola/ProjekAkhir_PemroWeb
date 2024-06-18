<?php
    session_start();
    if(empty($_SESSION['cart'])){
        $_SESSION['cart'] = array();
        $_SESSION['jml'] = 0;
        $_SESSION['total'] = 0;
    }
?>

<html>
    <body>
        <h1>Shopping Cart</h1>
        <table border ="1px">
            <tr>
                <th>Pid</th>
                <th>ProductName</th>
                <th>UnitPrice</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            <?php
            for ($row = 0; $row < $_SESSION['jml']; $row++){
                ?>
                <tr>
                    <?php
                    for($col = 0; $col < 5; $col++){
                        ?>
                        <td><?php echo $_SESSION['cart'][$row][$col];?></td>
                    <?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
           
        </table>
        
        <h3>Total
            <br>
            <?php echo $_SESSION['total']; ?>
        </h3>
        
        <h3>Kembali ke <a href="categories.php">Kategori</a></h3>
    </body>
</html>