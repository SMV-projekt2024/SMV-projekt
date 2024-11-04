<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start(); 
}

if (isset($_GET["id"])){
    $id_predmeta = $_GET["id"];

    $currentUserId = $_SESSION["userId"];

    require_once "database-inc.php";
    require_once "functions-inc.php";

    $sql = "SELECT * FROM Predmeti 
            WHERE id_predmet = $id_predmeta";
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
        echo "      <h1>" . $row["kratica"] . "</h1>";
        echo "      <p><b>" . $row["celo_ime"] . "</b></p>";
        //echo "      <p>Published on: " . $row["PostsDate"] . "</p> <br>";
        echo '</div>';
        echo '</div>';
        echo '<div class="PostBox">';
        echo '    <div class="innerPostBox">';


        $sql = "SELECT *
                FROM Naloge
                WHERE id_predmet = $id_predmeta";
        $statement = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statement, $sql)){
             header("location: ../prva_stran.php?error=StatementFailed");
             exit();
        }
        mysqli_stmt_execute($statement);

        $resultDataN = mysqli_stmt_get_result($statement);

        $sql = "SELECT *
                FROM Poucevanja
                WHERE id_predmet = $id_predmeta
                AND id_user = $currentUserId";
        $statement = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statement, $sql)){
             header("location: ../prva_stran.php?error=StatementFailed");
             exit();
        }
        mysqli_stmt_execute($statement);

        $resultDataPoucevanje = mysqli_stmt_get_result($statement);

        $dovoljenje = mysqli_fetch_assoc($resultDataPoucevanje) > 0;





        #Priakz nalog
        prikazNaloge($resultDataN, $currentUserId, $id_predmeta, $dovoljenje);





        if ($row = mysqli_fetch_assoc($resultDataPoucevanje) > 0 || roleCheck() == "admin") {
            echo "<a href='create_post.php?id_predmet=". $id_predmeta ."'><button>Ustvari nalogo</button></a>";
        }
        





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