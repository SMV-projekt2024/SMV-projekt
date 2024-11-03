<?php 
    include("glava.php");
?>

<!-- BODY -->

<div class="mainContainer">
    <div class="smeriContainer">
        <p>Neki</p>
    </div>
    <p>Neki</p>

</div>



<!-- NOGA -->
<?php 
    include("noga.php");
?><?php 
include("glava.php");
?>


<!-- BODY -->

<div class="mainContainer">
<form action="" method="get">
    <input class="searchBar" type="text" name="search" id="" placeholder="Search posts">
    <button type="submit" name="searchSubmit" >Išči</button>
    <button type="submit" name="Add" onclick="create">Dodaj</button>
<?php
    include("create_course.php");
    ?>

    
</form>
<div class="postsContainer">
    <?php 
        include("includes\get_predmeti-inc.php");
    ?>
</div>


</div>






<!-- NOGA -->
<?php 
include("noga.php");
?>