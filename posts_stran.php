<?php 
    include("glava.php");
?>


<!-- BODY -->

<div class="mainContainer">
    <form action="" method="get">
        <input class="searchBar" type="text" name="search" id="" placeholder="Search posts">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <button type="submit" name="searchSubmit" >Išči</button>
        <button type="submit" name="Reset">Ponastavi</button>
    </form>


    <?php 
    require_once "includes/functions-inc.php";
        if(isset($_SESSION["userId"])){
            if(roleCheck() == "admin"){
                echo "<form action='create_predmet.php' method='get'>";
                echo  "<input type='hidden' name='id_smer' value='" . $_GET['id']. "'>";
                echo "<button type='submit' >Nov Predmet</button>";
                echo "</form>";


            }
        }
    ?>
    
      
        
    <div class="postsContainer">
        <?php 
            include("includes\get_posts-onc.php");
        ?>
    </div>
    
    
    
</div>






<!-- NOGA -->
<?php 
    include("noga.php");
?>