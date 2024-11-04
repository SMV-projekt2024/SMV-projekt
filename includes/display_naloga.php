<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start(); 
}

if (isset($_GET["id"])){
    $id_naloga = $_GET["id"];

    require_once "database-inc.php";
    require_once "functions-inc.php";

    $sql = "SELECT * FROM Naloge
            WHERE id_naloga = $id_naloga";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);

    if (mysqli_num_rows($resultData) > 0) {
        $row = mysqli_fetch_assoc($resultData);

        echo '<div class="pageImage" style="background-image: url(' . $row["slika"] . ');">';
        echo '<div class="trailer"></div>';
        echo '    <div class="headingInImage">';
        echo "      <h1>" . $row["naslov"] . "</h1>";
        echo "      <p><b>" . $row["opis"] . "</b></p>";
        //echo "      <p>Published on: " . $row["PostsDate"] . "</p> <br>";
        echo '</div>';
        echo '</div>';
        echo '<div class="PostBox">';
        echo '    <div class="innerPostBox">';

        echo '<h2>Navodilo</h2>';
        echo '<p>' .  $row["navodilo"] . '</p>';
        echo  "<pre> 
        
        </pre>";

        echo "<form action='includes/prenesi_file-inc.php?id_naloga=" . $row['id_naloga'] . "' method='post' >";
                
        echo "<button  type='submit'>Prenesi gradivo</button>";
        echo "</form>";

        echo  "<pre> 
        </pre>";


        #---------------------------PREGLED dovoljenj-----------------


        $currentUserId = $_SESSION["userId"];


        $sql = "SELECT *
                FROM Poucevanja JOIN Predmeti
                ON Poucevanja.id_predmet = Predmeti.id_predmet JOIN Naloge
                ON Predmeti.id_predmet = Naloge.id_predmet
                WHERE id_naloga = $id_naloga
                AND id_user = $currentUserId";
        $statement = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statement, $sql)){
             header("location: ../prva_stran.php?error=StatementFailed");
             exit();
        }
        mysqli_stmt_execute($statement);

        $resultDataN = mysqli_stmt_get_result($statement);
        





        if ($rowD = mysqli_fetch_assoc($resultDataN) > 0 || roleCheck() == "admin") {
            echo "<form action='./edit_naloga.php?id_naloga=" . $row['id_naloga'] . "' method='post' >";
                echo "<button  type='submit'>Uredi nalogo</button>";
            echo "</form>";
        }






















        #uredi
        

        echo  "<pre> 
        
        </pre>";

        echo '<h2>Oddaj nalogo</h2>';
        echo   '<form action="includes/upload-inc.php?id_naloga='. $id_naloga . '" method="POST" enctype="multipart/form-data">';
        echo '<input type="file" name="file">';
        echo '<button type="submit" name="submit">Shrani</button>';
        echo '</form>';





        echo '    </div>';
        echo '</div>';




        
    }
    else {
        header("location: ../prva_stran.php?error=PostNotFound");
        exit();
    }
    mysqli_stmt_close($statement);
}
else{
    header("location: ../prva_stran.php?error=PostIdNotFound");
    exit();
}