<?php
    include("glava.php");
?>
<!-- BODY -->
<style>
    .ck-editor__editable[role="textbox"] {
    min-height: 400px;
    max-height: 400px;
    width: 100%;
}
</style>
<div class="pageImage" style="background-image: url(img/Create_image.jpg);">
    <div class="trailer"></div>
    <div class="headingInImage hidden">
        <h1>Ustvari svoje</h1>
        
    </div>
</div>
<div class="createBox">
    <div class="innerCreateBox">
        <h1>Objavi nalogo</h1>

        <?php
            echo "<form action='includes/create_naloga-inc.php?id_predmet=" . $_GET["id_predmet"]. "' method='post' enctype='multipart/form-data' >";
        ?>
        
            <div class="inputBoxCreate">
                <input type="text" required name="naslov" >
                <label>Naslov</label>
            </div>
            <div class="inputBoxCreate">
                <input type="text" required name="opis" >
                <label>Kratek opis (končaj z ...)</label>
            </div>
            <div class="inputBoxCreate">
                <input type="text" required name="imgUrl" >
                <label>URL slike</label>
            </div>

            
            <p class="pHeading">Vsebina</p>
            <div class="inputBoxCreate">
                <textarea id="editor" name="navodila"></textarea>    
            </div>

            <div class="inputBoxCreate">
                <input type="file" name="file" required>         
            </div>
            
            <div class="inputBoxCreate">
                <button type="submit" name="submit">Ustvari</button>          
            </div>
            
        </form>
    </div>   
</div>
<script src="CKEditor5\ckeditor5-build-classic\ckeditor.js" ></script>
<script>
    ClassicEditor.create(document.querySelector("#editor"))
    .catch(error => {
        console.error(error)
    });
</script> 

<!-- NOGA -->
<?php 
    include("noga.php");
?>