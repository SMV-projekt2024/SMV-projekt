<?php 
    include("glava.php");
?>


<!-- BODY -->

<div class="mainContainer">
    <form action="" method="get">
        <input class="searchBar" type="text" name="search" id="" placeholder="Search posts">
        <button type="submit" name="searchSubmit" >Search</button>
        <button type="submit" name="Reset">Reset</button>
    </form>
    <div class="postsContainer">
        <?php 
            include("includes\get_posts-onc.php");
        ?>
    </div>
    <div class="navPosts">
        
        <div class="postsNumbers">
            <a href="?pageNr=1">First</a>
            <?php
                if(isset($_GET["pageNr"]) && $_GET["pageNr"] > 1){
            ?>
                <a href="?pageNr=<?php echo $_GET["pageNr"] - 1?>">Previous</a>
            <?php
                }else{
            ?>
                <a>Previous</a>
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

            <p>Page <?php echo $page ?> of <?php echo $pages ?></p>
        </div>

        <div class="postsNumbers">
            <?php
                if(!isset($_GET["pageNr"])){
            ?>
                <a href="?pageNr=2">Next</a>
            <?php
                }else{
                    if($_GET["pageNr"] >= $pages){
            ?>
                        <a>Next</a>

                <?php
                    }else{
                ?>
                        <a href="?pageNr=<?php echo $_GET["pageNr"] + 1?>">Next</a>
            <?php
                    }
                }
            ?>
            <a href="?pageNr=<?php echo $pages ?>">Last</a>
        </div>
        
    </div>
    
</div>






<!-- NOGA -->
<?php 
    include("noga.php");
?>