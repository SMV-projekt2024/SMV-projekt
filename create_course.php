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
        <h1>Ustvari predmet</h1>
        
    </div>
</div>
<div class="createBox">
    <div class="innerCreateBox">
        <h1>Ustvari nov predmet</h1>
        <form action="includes/create_post-inc.php" method="post" >
            <div class="inputBoxCreate">
                <input type="text" required name="ime" id="">
                <label>Ime predmeta</label>
            </div>
            <div class="inputBoxCreate">
                <input type="text" required name="opis" id="">
                <label>Kratek opis (končaj z ...)</label>
            </div>

            <div class="radio-container">
    <div class="radio-item">

    </div>


    <div class="radio-item">

    </div>


    <div class="radio-item">

    </div>


    <div class="radio-item">

    </div>


    <div class="radio-item">
y
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