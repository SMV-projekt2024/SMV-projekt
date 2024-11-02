<?php

    require_once "database-inc.php"; 
    $UserId = $_GET["id_user"];


    #NAJPREJ O UPORABNIKU-----------------------------

    $sql = "SELECT * FROM users
            WHERE UsersId = ?"; 
    

    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }
    mysqli_stmt_bind_param($statement, "i", $UserId );
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);


    
    
    if (mysqli_num_rows($resultData) > 0) {
        
        while ($row = mysqli_fetch_assoc($resultData)) {
            echo '<div class="profileBox">';
            echo '<p>Username:</p>';
            echo '<p>' . $row["UsersUsername"] . '</p>';
            echo '</div>';

            echo '<div class="profileBox">';
            echo '<p>Email:</p>';
            echo '<p>' . $row["UsersEmail"] . '</p>';
            echo '</div>';

            echo '<div class="profileBox">';
            echo '<p>Password:</p>';
            echo '<p>*</p>';
            echo '</div>';

            echo '<div class="profileBox">';
            echo '<p>Rights:</p>';
            echo '<p>' . $row["UsersRole"] . '</p>';
            echo '</div>';

        }
    } else {
        echo "Error geting user information, try again later";
    }


    # ZDAJ PA ZA PODATKE O VPISIH---------------------
    $sql = "SELECT id_vpis, p.kratica, p.celo_ime 
            FROM Vpisi v JOIN Predmeti p
            ON v.id_predmet = p.id_predmet
            WHERE v.id_user = ?"; 
    

    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }
    mysqli_stmt_bind_param($statement, "i", $UserId );
    mysqli_stmt_execute($statement);

    $resultDataVpisi = mysqli_stmt_get_result($statement);


    if (mysqli_num_rows($resultDataVpisi) > 0) {
    
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Kratica Predmeta</th><th>Celo Ime</th><th></th></tr>"; 
    
        while ($row = mysqli_fetch_assoc($resultDataVpisi)) {
            echo "<tr>";
            echo "<form action='uporabnik_stran.php?id_user=". $row['id_vpis'] ."' method='post'>";
            echo "<td>" . $row['kratica'] . "</td>"; 
            echo "<td>" . $row['celo_ime'] . "</td>"; 

            echo "<td><button class='tabelaButton' type='submit'>Izbriši</button></td>";
            echo "</form>"; 

            echo "</tr>";
        }
        echo "</table>";


    } else {
        echo "Ni vpisov";
    }




    
   
    
    mysqli_close($conn);
    