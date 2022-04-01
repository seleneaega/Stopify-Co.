<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stopify Co.</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="pic/headphones.png">
</head>
<body>
    <div class="navbar">
        <ul class="navul">
            <li class="nav">profile</li>
            <li class="nav">my songs</li>
            <li class="nav">playlist</li>
        </ul>
    </div>

    <div class="title">
        <h1>Stopify</h1>

<?php
    if(isset($_GET["msg"])){
        if($_GET["msg"] == 1){
            echo "<h4 class='msg-success'>Success! Your changes has been saved!</h4>";
        }elseif($_GET["msg"] == 2){
             echo "<h4 class='msg-error'>Error! Song does not exist!</h4>";
        }    
    }
?>

<?php

    include_once('database.php');

    $selectQuery = 'SELECT * FROM songs';

    $execQuery = mysqli_query($con, $selectQuery);

    while($songs = mysqli_fetch_assoc($execQuery)){

        $songId = $songs["id"];
        $songTitle = $songs["title"];
        $songArtist = $songs["artists"];
        $songGenre = $songs["genre"];
        $songPicture = $songs["pic"];
        $songDuration = $songs["duration"];


        echo
        "
            <div class='hehe'>
                <div class='album'>
                        <img width='200px' src='images/$songId/album.jpg'>
                        <ul>
                            <li><u><h4>$songTitle</h4></u></li>
                            <li>$songArtist</li>
                            <li>$songGenre</li>
                            <li>$songDuration</li>
                        </ul>
                    <a href='edit-song.php?id=$songId'><input value='edit' type='submit' name='editButton'></a>
                </div>
            </div>
        ";
    }
?>
        </div>
    </div>
</body>
</html>