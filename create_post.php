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
        <form action="includes/create_post-inc.php" method="post" >
            <div class="inputBoxCreate">
                <input type="text" required name="naslov" id="">
                <label>Naslov</label>
            </div>
            <div class="inputBoxCreate">
                <input type="text" required name="opis" id="">
                <label>Kratek opis (končaj z ...)</label>
            </div>
            <div class="inputBoxCreate">
                <input type="text" required name="imgUrl" id="">
                <label>URL slike</label>
            </div>

            
            <p class="pHeading">Vsebina</p>
            <div class="inputBoxCreate">
                <textarea id="editor" name="body"></textarea>    
            </div>

            <div class="inputBoxCreate">
                <input type="file" name="file">         
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