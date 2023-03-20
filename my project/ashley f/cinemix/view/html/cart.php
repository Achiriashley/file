<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "movies") or die("Unable to connect to Database");
$conn2 = mysqli_connect("localhost", "root", "", "cart") or die("Unable to connect to database");

if($_SESSION["username"] == 0){
    header("Location:http://cinemix/view/login.html");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Regera</title>
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="shortcut icon" href="../images/favicon.png" type="image/png">
</head>
<body>
    <div id="pc">
        <section>
            <form action="../../controller/cart-delete.php" method="post">
                <nav>
                    <h2>Shopping Cart</h2> 
                    <button type="submit" class="remove-all" name="delete-all">Remove all</button>
                </nav>
    
                <?php
    
                    $username = $_SESSION["username"];
                    $total = 0;
    
                    $sql = "SELECT *
                            FROM cart
                            WHERE username = '$username'
                           ";
                    $result = mysqli_query($conn, $sql);
    
                    $query = "SELECT *
                              FROM items
                             ";
                    $solu = mysqli_query($conn2, $query);
    
                    while($row = mysqli_fetch_assoc($result) AND $row1 = mysqli_fetch_assoc($solu)){  
                        $item = $row["item_name"];
                        $amount_purchased = $row["amount_purchased"];
                        $price = $row["price"];
                        
                        $total += $price;
                        
                        echo'
                            <div class="items-holder">
                                <div class="item-image">
                                    <img src="'.$row1["image"].'">
                                </div>
                                <div class="item-name">
                                    <p class="bookname">'.$item.'</p>
                                </div>
                                <div class="item-amount">
                                    <label for="">Amount purchased</label>
                                    <br>
                                    <input type="number" name="" class="amount" value="'.$amount_purchased.'">
                                </div>
                                <div class="item-total">
                                    <p>'.$price.'</p>
                                    <button type="reset" class="remove"><a href="../../../controller/cart-delete.php?delete_name='.$item.'">Remove</a></button>
                                </div>
                            </div>
                            ';
                    }
    
                ?>
    
                <hr>
                    
                <div class="sum">
                    <div class="sum-holder">
                        <div>
                            <h3>Sub-Total</h3>
                            <p>
                                <?php
                                    $sql = "SELECT COUNT(*) AS counts
                                            FROM cart
                                            WHERE username = '$username'
                                           ";
                                    $result = mysqli_query($conn, $sql);
                                
                                    if (mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo"$row[counts]";
                                        }
                                    }
                                ?> 
                             items
                            </p>
                        </div>
                        <div class="value">
                            <?php
                                echo $total ,'XAF'
                            ?>
                        </div>
                    </div>
                    <br><br>
                    <button type="button" class="checkout1">Checkout</button>
                </div>
            </form>
    
            <br><br>
            <a href="./homepage.php">Back</a>
        </section>
    </div>
    
    

    <div id="mobile">
        <section class="one">
            <a href="./profile.php">
                <div class="user">
                    <img src="../images/icons8-user-100.png" alt=""> 
                </div>
            </a>
            <p>My cart</p>

            <a href="./homepage.php"><img src="../images/icons8-back-67.png" alt="back" class="menu"></a>
        </section>

        <br><br>

        <!--<section class="two">
            <div class="form">
                <form action="search.php" method="post">
                    <input type="search" name="search" id="" placeholder="Search.."> 
                    <button type="submit" class="search-button" name="submit"><img src="../images/icons8-search-more-100 (1).png"></button>
                </form>
            </div>
    
            <div class="filter-holder">
                <form action="" method="post">
                    <button class="del"><img src="../images/icons8-filters-100.png" class="filters"></button>
                </form>
            </div>
        </section>-->

        <br><br><br>

        <section class="three">

            <?php
                $username = $_SESSION["username"];
                $prod_name = $_POST["name"];

                $sql = "SELECT *
                        FROM cart
                        WHERE username = '$username'
                       ";
                $result = mysqli_query($conn, $sql);
                
                
                $query0 = "SELECT *
                           FROM items
                          ";
                $result0 = mysqli_query($conn2, $query0);

                while($row=mysqli_fetch_assoc($result) and $row0=mysqli_fetch_assoc($result0)){
                    $name = $row["item"];
                    $amount = $row["amount_purchased"];
                    $price = $row["price"];

                    echo'
                            <div class="items">
                                <img src="'.$row0["image"].'">
                                <div class="details">
                                    <form action="" method="post">
                                        <p class="name">'.$name.'</p>
                                        <p class="price">'.$price.'XAF</p>
                                        <br>
                                        <label for="number">Amount Purchased</label>
                                        <input type="number" name="amount" value='.$amount.'>
                                        <input type="hidden" name="name" value='.$name.'>
                                        <input type="hidden" name="price" value='.$price.'>  
                                    </form>                               
                                </div>
                                <div class="delete">
                                    <a class="del" href="../../controller/delete.php?delete='.$name.'" name="remove"><img src="../images/icons8-remove-100.png"></a>
                                </div>
                            </div>

                            <br><br>
                        ';
                }

            ?>

        <br><br><br>

        <section class="four">
            <h1>Price Details</h1>
            <br>
            <div>
                <p>Total Purchases</p>
                <p>
                    <?php
                        $query = "SELECT amount_purchased
                                  FROM cart
                                  WHERE username = '$username'
                                 ";
                        $result = mysqli_query($conn, $query);

                        $total = 0;
                        while($row=mysqli_fetch_assoc($result)){
                            $amount = $row["amount_purchased"];
                            $total += $amount;
                        }
                        echo $total;
                    ?>
                </p>
            </div>
            <br><br>
            <div>
                <p>Delivery Charges</p>
                <p>1000XAF</p>
            </div>
            <br><br>
            <hr>
            <br><br>
            <div>
                <p class="tot">Total amount</p>
                <p class="amt">
                    <?php
                        $query = "SELECT price
                                FROM cart
                                WHERE username = '$username'
                                ";
                        $result = mysqli_query($conn, $query);

                        $total = 0;
                        while($row=mysqli_fetch_assoc($result)){
                            $price = $row["price"];
                            $total += $price;
                        }
                        $sum = $total + 1000;
                        echo $sum, 'XAF'
                    ?>
                </p>
            </div>
            <br><br>
            <button type="button" class="checkout2">Check Out</button>
        </section>

    </div>

    <section class="modal1">
        <article>
            <button class="close">&times;</button>

            <br><br>
            <nav>
                <ul>
                    <li><a href="./homepage.php">HOME</a></li>
                    <li><a href="./item.php">ITEMS</a></li>
                    <li>
                        <a href="" class="cart-link">CART
                            <span>
                                <?php
                                        $username = $_SESSION["username"];

                                        $query = "SELECT COUNT(*) AS counts
                                                FROM cart
                                                WHERE username = '$username'
                                                ";
                                        $result = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo"$row[counts]";
                                            }
                                        }
                                ?>
                            </span>
                        </a>
                    </li>
                    <?php
                        $status = $_SESSION["status"];
                        
                        if($status == 'user'){
                            echo '';
                        }
                        elseif($status == 'admin'){
                            echo'<li><a href="./options.php">OPTIONS</a></li>';
                        }
                    ?>
                    <li><a href="../../controller/logout.php">LOGOUT</a></li>
                </ul>
            </nav>
        </article>
    </section>

</body>
</html>