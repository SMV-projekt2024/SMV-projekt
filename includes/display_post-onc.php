<?php

if (isset($_GET["id"])){
    $id_predmeta = $_GET["id"];

    require_once "database-inc.php";
    require_once "functions-inc.php";

    $sql = "SELECT * FROM Predmeti JOIN Naloge 
    ON Predmeti.id_predmet = Naloge.id_predmet
    WHERE Predmeti.id_predmet = $id_predmeta";
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
       
        
        echo '<div class="post">';
        echo '<a href="post.php?id=' . $row["id_naloga"] . '">';
        //echo '<img class="postImg" src="' . $row["PostsImgUrl"] . '">';
        echo '<div class="postBody">';
        echo '<h2 class="postTitle">' . $row["naslov"] . '</h2>';
        echo '<p class="postText">' . $row["opis"] . '</p> <br>';
        //echo '<p class="postText">' . $row["PostsDescription"] . '</p> <br>';
        //echo '<p class="postInfo">Created by <i>' . $row["UsersUsername"] . '</i></p>';
        //echo '<p class="postInfo">Published on <i>' . $row["PostsDate"] . '</i></p>';

        /*
        if ($currentUser == $row['UsersUsername'] || roleCheck() == "admin") {
            echo "<a class='deleteButton' href='includes\delete_data-inc.php?id=" .$row["PostsId"] . "&type=post' ><img class='deleteIcon' src='img\delete-removebg-Outside.png' onmouseover='change(this)' onmouseout='changeback(this)'></a>";
        }
            */
        
        echo '</a>';
        echo '</div>';
        echo '</div>';





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