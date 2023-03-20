<?php

$conn = mysqli_connect("localhost","root","","movies") or die("not connected");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/homepage.css">
</head>
<body>

    <header id="nav">
        <nav>
            <article class="cinemix">
                Cinemix
            </article>
    
            <article>
                <div class="bar-holder">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </article>
        </nav>
    </header>

    <section class="up-container">
        <div class="up-image">
            <img src="../images/301-3018232_god-of-war-4-hd.jpg" alt="">
        </div>
        <div class="up-title" > 
           <b> Stranger Things</b>
        </div>
    </section>
    <br><br>

    <?php
    
        $sql = " SELECT * 
                  FROM movies
                " ;
        $result = mysqli_query ($conn,$sql);
        while ( $row = mysqli_fetch_assoc($result)){
           $movie_id = $row["movie_id"];
           $moviename = $row["movie_name"];
           $description = $row["description"];
           $day = $row["day"];

           if($day == 'monday' ){
               echo'
                    <section class="one">
                        <h1>Monday</h1>
                        <br>
                        <div class="slider-holder">
                            <article class="slider">
                                <a href="./moviepage.php?movie_id='.$movie_id.'"><img src="'.$row["images"].'"></a>
                            </article>
                        </div>
                    </section>
                ';
             }
            elseif($day == 'Tuesday'){
                echo'
                        <section class="one">
                            <h1>Tuesday</h1>
                            <br>
                            <div class="slider-holder">
                                <article class="slider">
                                    <a href="./moviepage.php?movie_id='.$movie_id.'"><img src="'.$row["images"].'"></a>
                                </article>
                            </div>
                        </section>
                    ';
            }
            elseif($day == 'Wednesday'){
                echo'
                        <section class="one">
                            <h1>Wednesday</h1>
                            <br>
                            <div class="slider-holder">
                                <article class="slider">
                                <a href="./moviepage.php?movie_id='.$movie_id.'"><img src="'.$row["images"].'"></a>
                                </article>
                            </div>
                        </section>
                    ';
            }
            elseif($day == 'Thursday'){
                echo'
                        <section class="one">
                            <h1>Thursday</h1>
                            <br>
                            <div class="slider-holder">
                                <article class="slider">
                                    <a href="./moviepage.php?movie_id='.$movie_id.'"><img src="'.$row["images"].'"></a>
                                </article>
                            </div>
                        </section>
                    ';
            }
            elseif($day == 'Friday'){
                echo'
                        <section class="one">
                            <h1>Friday</h1>
                            <br>
                            <div class="slider-holder">
                                <article class="slider">
                                    <a href="./moviepage.php?movie_id = '.$movie_id.'"><img src="'.$row["images"].'"></a>
                                </article>
                            </div>
                        </section>
                    ';
            }
            elseif($day == 'Saturday'){
                echo'
                        <section class="one">
                            <h1>Saturday</h1>
                            <br>
                            <div class="slider-holder">
                                <article class="slider">
                                <a href="./moviepage.php?movie_id = '.$movie_id.'"><img src="'.$row["images"].'"></a>
                                </article>
                            </div>
                        </section>
                    ';
            }
            
            
            
            

        }

        
    
    ?>
</body>
</html>