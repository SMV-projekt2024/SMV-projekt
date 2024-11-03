<?php 
    include("glava.php");
?>


<!-- BODY -->

<div class="mainContainer">
    <form action="" method="get">
        <input class="searchBar" type="text" name="search" id="" placeholder="Search posts">
        <button type="submit" name="searchSubmit" >Išči</button>

    </form>
    <div class="postsContainer">
        <?php 
            include("includes\get_smeri-inc.php");
        ?>
    </div>
    
    
</div>






<!-- NOGA -->
<?php 
    include("noga.php");
?>