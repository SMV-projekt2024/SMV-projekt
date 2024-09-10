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
        <h1>Create your own</h1>
        <p>Explore The Crypto World</p>
        
    </div>
</div>
<div class="createBox">
    <div class="innerCreateBox">
        <h1>Create your post</h1>
        <form action="includes/create_post-inc.php" method="post">
            <div class="inputBoxCreate">
                <input type="text" required name="title" id="">
                <label>Title</label>
            </div>
            <div class="inputBoxCreate">
                <input type="text" required name="description" id="">
                <label>Short Description (end with ...)</label>
            </div>
            <div class="inputBoxCreate">
                <input type="text" required name="imgUrl" id="">
                <label>Image URL</label>
            </div>

            <p class="pHeading">Branch</p>
            <div class="radioBoxOut">
                <div class="radioBoxInner">
                    <input type="radio" required name="branch" id="rad1" value="crypto">
                    <label for="rad1">Crypto</label>
                </div>
                <div class="radioBoxInner">
                    <input type="radio" required name="branch" id="rad2" value="forex">
                    <label for="rad2">Forex</label>
                </div>
                <div class="radioBoxInner">
                    <input type="radio" required name="branch" id="rad3" value="commodities">
                    <label for="rad3">Commodities</label>
                </div> 
                <div class="radioBoxInner">
                    <input type="radio" required name="branch" id="rad4" value="RealEstate">
                    <label for="rad4">Real Estate</label>
                </div> 
                <div class="radioBoxInner">
                    <input type="radio" required name="branch" id="rad5" value="general">
                    <label for="rad5">General</label>
                </div>  
            </div> 
            
            <p class="pHeading">Body</p>
            <div class="inputBoxCreate">
                <textarea id="editor" name="body"></textarea>                       
            </div>
            <div class="inputBoxCreate">
                <button type="submit" name="submit">Create</button>          
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