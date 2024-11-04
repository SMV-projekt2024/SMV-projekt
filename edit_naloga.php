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
        <h1>Uredi nalogo</h1>

        <?php
            echo "<form action='includes/edit_naloga-inc.php?id_naloga=" . $_GET["id_naloga"]. "' method='post' enctype='multipart/form-data' >";
        ?>
        
            <div class="inputBoxCreate">
                <input type="text"  name="naslov" >
                <label>Naslov</label>
            </div>
            <div class="inputBoxCreate">
                <input type="text"  name="opis" >
                <label>Kratek opis (končaj z ...)</label>
            </div>
            <div class="inputBoxCreate">
                <input type="text"  name="imgUrl" >
                <label>URL slike</label>
            </div>

            
            <p class="pHeading">Navodilo</p>
            <div class="inputBoxCreate">
                <textarea id="editor" name="navodila"></textarea>    
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