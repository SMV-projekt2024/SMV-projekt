<?php
    require_once "database-inc.php"; 

    $nalogaId = $_GET["id_naloga"];

    $sql = "SELECT * 
            FROM Oddanenaloge JOIN Users
            ON Oddanenaloge.id_ucenec = Users.UsersId JOIN Naloge
            ON Oddanenaloge.id_naloga = Naloge.id_naloga
            WHERE Oddanenaloge.id_naloga = $nalogaId"; 
    

    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }
    
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);


    
    
    if (mysqli_num_rows($resultData) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Username</th><th>Ime</th><th>Prenesi</th></tr>"; 
    
        
        while ($row = mysqli_fetch_assoc($resultData)) {
            echo "<tr>";
            
            echo "<td>" . $row['UsersUsername'] . "</td>"; 
            echo "<td>" . $row['UsersIme'] . " " . $row["UsersPriimek"] . "</td>";

            echo "<td>";

            # SPREMENI
            echo "<form action='includes/prenesi_file-inc.php?id_oddaja=" . $row['id_oddaja'] . "' method='post' >";
            echo "<button class='tabelaButton' type='submit'>Prenesi</button>";
            echo "</form>";

            echo "</td>";
            echo "</tr>";
        }
    
        echo "</table>";
    } else {
        echo "Ta naloga je brez oddaj";
    }
    
    mysqli_close($conn);