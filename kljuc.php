<?php 
    include("glava.php");
?>

<!-- BODY -->

<div class="mainContainer">
    <div class="smeriContainer">
        <div class="createBox">
        <div class="innerCreateBox">
            <h1>Vpiši ključ</h1>
            <?php
               echo "<form action='includes/add_vpis-inc.php?id_predmet=". $_GET["id_predmet"] ."' method='post'>"
            ?>
            
                <div class="inputBoxCreate">
                    <input type="text" required name="kljuc">
                    <label>Ključ</label>
                </div>
                
                <div class="inputBoxCreate">
                    <button type="submit" name="submit">Vpiši</button>          
                </div>
                
            </form>
        </div>   
    </div>
</div>

</div>



<!-- NOGA -->
<?php 
    include("noga.php");
?>