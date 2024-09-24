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
    <div class="postsContainer">
        <?php 
            include("includes\get_posts-onc.php");
        ?>
    </div>1px !important;
    <div class="navPosts">
        
        <div class="postsNumbers">
            <a href="?pageNr=1">Prva</a>
            <?php
                if(isset($_GET["pageNr"]) && $_GET["pageNr"] > 1){
            ?>
                <a href="?pageNr=<?php echo $_GET["pageNr"] - 1?>"Prejšna</a>
            <?php
                }else{
            ?>
                <a>Prejšna</a>
            <?php
                }
            ?>
        </div>

        <div class="NumPage">
            <?php
                if(!isset($_GET["pageNr"])){
                    $page = 1;
                }
                else{
                    $page = $_GET["pageNr"];
                }
            ?>

            <p>Stran <?php echo $page ?> of <?php echo $pages ?></p>
        </div>

        <div class="postsNumbers">
            <?php
                if(!isset($_GET["pageNr"])){
            ?>
                <a href="?pageNr=2">Naslednja</a>
            <?php
                }else{
                    if($_GET["pageNr"] >= $pages){
            ?>
                        <a>Naslednja</a>

                <?php
                    }else{
                ?>
                        <a href="?pageNr=<?php echo $_GET["pageNr"] + 1?>">Naslednja</a>
            <?php
                    }
                }
            ?>
            <a href="?pageNr=<?php echo $pages ?>">Zadnja</a>
        </div>
        
    </div>
    
</div>






<!-- NOGA -->
<?php 
    include("noga.php");
?>