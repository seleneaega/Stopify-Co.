<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stopify Co. | Edit</title>
    <link rel="stylesheet" href="editsong.css">
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
            $songID = $_GET["id"];
        ?>

        <?php

            include_once('database.php');

            $songId = $_GET["id"];

            $selectQuery = "SELECT * FROM songs WHERE id = '$songId'";

            $execQuery = mysqli_query($con, $selectQuery);

            $fetchQuery = mysqli_fetch_assoc($execQuery);

            $song_id = $fetchQuery["id"];
            $song_title = $fetchQuery["title"];
            $song_artist = $fetchQuery["artists"];
            $song_genre = $fetchQuery["genre"];
            $song_picture = $fetchQuery["pic"];
            $song_duration = $fetchQuery["duration"];

            $duration_minutes = $song_duration / 60;
                $duration_final_min = floor ($duration_minutes);

            $duration_seconds = $song_duration % 60;

        ?>

        <div class="main-container">
            <h3>Edit Song | <?php echo "$song_title"; ?><h3>
        </div>
        <br>
        <div class="class">
            <div class="album-cover">
                <img width="200px" src="images/<?php echo "$song_id"; ?>/album.jpg">
            </div>
            <br>
            <div class="edit-form">
                <form action="handleEditSong.php" method="POST">
                    <table class="info-edit">
                        <tr>
                            <td>
                                <label for="name">title: </label>
                            </td>
                            <td>
                                <input type="text" name="inputTitle" value="<?php echo $song_title; ?>">
                            <td>
                        </tr> 
                        <tr>
                            <td>
                                <label for="name">artist: </label>
                            </td>
                            <td>
                                <input type="text" name="inputArtist" value="<?php echo $song_artist; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="name">genre: </label>
                            </td>
                            <td>
                                <input type="text" name="inputGenre" value="<?php echo $song_genre; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="name">duration minutes: </label>
                            </td>
                            <td>
                                <input type="number" name="inputDurationMin" value="<?php echo $duration_final_min; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label for="name=">duration seconds: </label>
                            </td>
                            <td>
                                <input type="number" name="inputDurationSecs" value="<?php echo $duration_seconds; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                                <input type="submit" value="save changes" class="btn">
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="inputSongId" value="<?php echo $songID; ?>">
                </form>
            </div>
        </div>
    </div>
</body>
</html>