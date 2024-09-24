<?php 
    include("glava.php");
?>


<div class="createBox">
    <div class="innerCreateBox profile">
        <h1>Nastavitve profila</h1>

        <?php
            include("includes\show_profile_data-inc.php");
        ?>

        <form action="includes\update_profile-inc.php" method="post">
            <div class="inputBoxCreate">
                <input type="email" name="newEmail" id="">
                <label>Nov Email</label>
            </div>
            <div class="inputBoxCreate">
                <input type="password" name="newPassword" id="">
                <label>Novo geslo</label>
            </div>
            <button type="submit" name="submit" style="width: 200px">Save</button>
        </form>
        
        
        </form>
    </div>   
</div>



<!-- NOGA -->
<?php 
    include("noga.php");
?>