<?php
    require_once "database-inc.php"; 



    if (isset($_GET["searchSubmit"])) {
        $search = $_GET["search"];
        $sql = "SELECT * FROM Users 
        WHERE CONCAT(UsersIme, UsersPriimek, UsersUsername)LIKE '%$search%'";

        $statement = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statement, $sql)){
            header("location: ../prva_stran.php?error=StatementFailed");
            exit();
        }
        mysqli_stmt_execute($statement);
        $resultData = mysqli_stmt_get_result($statement);

        mysqli_stmt_close($statement); 
    } 
    else{
        $sql = "SELECT * FROM users"; 
    

    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }
    
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);
    }

    


    
    
    if (mysqli_num_rows($resultData) > 0) {
        echo "<table class='tabelaVsi'border='1'>";
        echo "<tr><th>ID</th><th>Ime</th><th>Email</th><th>Role</th></tr>"; 
    
        
        while ($row = mysqli_fetch_assoc($resultData)) {
            echo "<tr>";
           
            echo "<td>" . $row['UsersId'] . "</td>"; 
            echo "<td>" . $row['UsersIme'] . " ". $row['UsersPriimek'] . "</td>"; 
            echo "<td>" . $row['UsersEmail'] . "</td>"; 
            echo "<td>" . $row['UsersRole'] . "</td>"; 

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
        echo "Uporabnikov s tem imenom ni bilo najdenih.";
    }
    
    mysqli_close($conn);
    