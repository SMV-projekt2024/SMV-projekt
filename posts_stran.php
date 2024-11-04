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
    <form action="create_predmet.php" method="get">
        <input type="hidden" name="id_smer" value="<?php echo $_GET['id']; ?>">
        <button type="submit" >Nov Predmet</button>
    </form>
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