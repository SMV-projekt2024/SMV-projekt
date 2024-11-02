<?php 
    include("includes/check_user-inc.php");
?>






<?php include("glava.php"); ?>

<!-- POST -->

<?php
    include("includes\display_post-onc.php");
    
?>
<?php 
    include("noga.php");
?>



<!--
<div class="createBox">
    <div class="innerCreateBox comments">
        <h1>Komentarji</h1>
        <?php 
           if(isset($_SESSION["userId"])){
            echo '<div class="commentsInputBox">';
            echo '    <form action="includes\create_comment-inc.php?id=' . (int)$_GET["id"] . '" method="post">';
            echo '        <input type="text" required name="comment" placeholder="Add a comment...">'; 
            echo '        <button type="submit" name="submit">Comment</button>'; 
            echo '    </form>'; 
            echo '</div>';
           }
        ?>
        
        <?php
           $pageId = (int)$_GET["id"];
           include("includes\display_comments-inc.php");
        ?>
    </div>   
</div>-->



<!----NOGA---->

