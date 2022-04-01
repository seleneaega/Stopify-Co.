<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stopify Co.</title>
    <link rel="stylesheet" href="editsong.css">
    <link rel="icon" href="pic/headphones.png">
</head>
<body>
    <?php 

        error_reporting(0);

        $title = $_POST["inputTitle"];
        $artist = $_POST["inputArtist"];
        $genre = $_POST["inputGenre"];
        $duration_final_min = $_POST["inputDurationMin"];
        $duration_seconds = $_POST["inputDurationSecs"];
        $id = $_POST["inputSongId"];

        include_once("database.php");


        if($title == "" || $artist == "" || $genre == "" || $duration_final_min == "" || $duration_seconds == "")
        {
            if($title == ""){
                echo "<h1 style='text-align: center;'>please put a title!</h1>";
            }

            if($artist == ""){
                echo "<h1 style='text-align: center;'>please put an artist!</h1>";
            }

            if($genre == ""){
                echo "<h1 style='text-align: center;'>please put a genre!</h1>";
            }

            if($duration_final_min == ""){
                echo "<h1 style='text-align: center;'>please put an input!</h1>";
            }

            if($duration_seconds == ""){
                echo "<h1 style='text-align: center;'>please put an input!</h1>";
            }

            echo "<h2 style='text-align: center;'><a href='song-list.php'> go back </a></h2>";
        }else{

            $duration_min_convert = $duration_final_min * 60;

            $duration_final = $duration_min_convert + $duration_seconds;

        $updateSongs = "UPDATE  songs

                        SET     title = '$title', 
                                artists = '$artist', 
                                genre = '$genre', 
                                duration = '$duration_final'

                        WHERE   id = '$id'
                        ";

        $Update = mysqli_query($con, $updateSongs);

            if($Update){
                header("Location: song-list.php?m=1");
            } else{
                echo "<h1> ERROR! </h1>";
                echo "<p>" . mysqli_error($con) ."</p>";
            }
        }

    ?>
</body>
</html>