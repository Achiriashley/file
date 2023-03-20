<?php
     $conn = mysqli_connect("localhost","root","","movies") or die("not connected");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>moviepage</title>
    <link rel="stylesheet" href="../css/moviepage.css">
    <link rel="shortcut icon" href="../images/favicon.png" type="image/png">
</head>
<body>

    
    <?php
        $movie_id = $_GET["movie_id"];
        $sql = " SELECT * 
                 FROM movies
                 WHERE movie_id = '$movie_id'
                " ;
        $result = mysqli_query ($conn,$sql);
            while ( $row = mysqli_fetch_assoc($result)){
                $moviename = $row["movie_name"];
                $description = $row["description"];
                $day = $row["day"];
                $author = $row["author"];
                $price = $row["price"];
                echo '
                        <section class="mobile">
                            <section class="image">
                                <img src="'.$row['images'].'">
                            </section>
                    
                            <section class="details">
                                <div class="a">
                                    <div class="name-holder">
                                        <p class="name">'.$moviename.'</p>
                                        <p class="author">'.$author.'</p>
                                    </div>
                                    <p class="price">'.$price.'<span>xaf</span></p>
                                </div>
                                <br><br><br>
                                <div class="description">
                                    <h1>Description</h1>
                                    <br>
                                     '.$description.'
                                </div>
                                <br><br>
                    
                                <form action="../../controller/addcart.php" method="post">
                                    <input type="hidden" name="name" value="">
                                    <input type="hidden" name="producer" value="">
                                    <input type="hidden" name="price" value="">
                                    <button class="add-cart" name="add">Add To Cart</button>
                                </form>
                            </section>
                        </section> 
                    ';
            }
        ?>

    
</body>
</html>