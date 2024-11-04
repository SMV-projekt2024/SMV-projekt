<?php 
    include("glava.php");
?>

<!-- BODY -->

<div class="mainContainer">

        <form action="" method="get">
            <input class="searchBar" type="text" name="search" id="" placeholder="Search posts">
            <button type="submit" name="searchSubmit" >Išči</button>
            <button type="submit" name="Reset">Ponastavi</button>
        </form>


    <div class="smeriContainer">
        <div class="createBox">
        <div class="innerCreateBox">


            <?php
                include("includes\display_vse_uporabnike-inc.php");
            ?>
        </div>   
    </div>
</div>

</div>



<!-- NOGA -->
<?php 
    include("noga.php");
?>