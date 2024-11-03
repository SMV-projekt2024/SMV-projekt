<?php
    require_once "database-inc.php"; 

    $sql = "SELECT * FROM users"; 
    

    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }
    
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);


    
    
    if (mysqli_num_rows($resultData) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Role</th></tr>"; 
    
        
        while ($row = mysqli_fetch_assoc($resultData)) {
            echo "<tr>";
           
            echo "<td>" . htmlspecialchars($row['UsersId']) . "</td>"; 
            echo "<td>" . htmlspecialchars($row['UsersUsername']) . "</td>"; 
            echo "<td>" . htmlspecialchars($row['UsersEmail']) . "</td>"; 
            echo "<td>" . htmlspecialchars($row['UsersRole']) . "</td>"; 

            echo "<td>";

            # SPREMENI
            echo "<form action='uporabnik_stran.php?id_user=" . $row['UsersId'] . "' method='post' >";
            echo "<button class='tabelaButton' type='submit'>Uredi</button>";
            echo "</form>";

            # IZBRIŠI
            echo "<form action='includes/delete_user-inc.php?id_user=" . $row['UsersId'] . "' method='post'  onsubmit=\"return confirm('Ste prepričani, da želite izbrisati tega uporabnika.');\">";
            echo "<button class='tabelaButton' type='submit'>Izbriši</button>";
            echo "</form>";

            echo "</td>";
            echo "</tr>";
        }
    
        echo "</table>";
    } else {
        echo "No users found with 'neki' in their username.";
    }
    
    mysqli_close($conn);
    