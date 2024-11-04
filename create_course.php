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
<<<<<<< Updated upstream
                <label>Ime predmeta</label>
=======
                <label>Ime</label>
>>>>>>> Stashed changes
            </div>
            <div class="inputBoxCreate">
                <input type="text" required name="opis" id="">
                <label>Kratek opis (končaj z ...)</label>
            </div>
<<<<<<< Updated upstream

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
=======
            <div class="radio-container">
    <!-- Radio option 1 -->
    <div class="radio-item">
      <label for="Gim">Gimnazija</label>
      <input type="radio" id="Gim" name="Sola" value="Gim">
    </div>

    <!-- Radio option 2 -->
    <div class="radio-item">
      <label for="Gvo">GVO</label>
      <input type="radio" id="Gvo" name="Sola" value="Gvo">
    </div>

    <!-- Radio option 3 -->
    <div class="radio-item">
      <label for="Smm">SMM</label>
      <input type="radio" id="Smm" name="Sola" value="Smm">
    </div>

    <!-- Radio option 4 -->
    <div class="radio-item">
      <label for="Ker">KER</label>
      <input type="radio" id="Ker" name="Sola" value="Ker">
    </div>

    <!-- Radio option 5 -->
    <div class="radio-item">
      <label for="Sdl">SDL</label>
      <input type="radio" id="Sdl" name="Sola" value="Sdl">
>>>>>>> Stashed changes
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