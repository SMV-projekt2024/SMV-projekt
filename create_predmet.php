<?php
    include("glava.php");
?>
<!-- BODY -->

<div class="pageImage" style="background-image: url(img/Create_image.jpg);">
    <div class="trailer"></div>
    <div class="headingInImage hidden">
        <h1>Ustvari svoje</h1>
        
    </div>
</div>
<div class="createBox">
    <div class="innerCreateBox">
        <h1>Ustvari predmet</h1>

        <?php
            echo "<form action='includes/create_predmet-inc.php?id_smer=" . $_GET["id_smer"]. "' method='post' enctype='multipart/form-data' >";
        ?>
        
            <div class="inputBoxCreate">
                <input type="text" required name="kratica" >
                <label>Kratica</label>
            </div>
            <div class="inputBoxCreate">
                <input type="text" required name="celo_ime" >
                <label>Celo ime</label>
            </div>
            <div class="inputBoxCreate">
                <input type="text" required name="imgUrl" >
                <label>URL slike</label>
            </div>

            <div class="inputBoxCreate">
                <input type="text" required name="kljuc" >
                <label>Ključ</label>
            </div>

        
            
            <div class="inputBoxCreate">
                <button type="submit" name="submit">Ustvari</button>          
            </div>
            
        </form>
    </div>   
</div>
 

<!-- NOGA -->
<?php 
    include("noga.php");
?>