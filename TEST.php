<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CKEditor 5 - Classic editor</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
</head>
<body>
    <h1>Classic editor</h1>
    <form action="includes\TEST-inc.php" method="post">
        <textarea name="content" id="editor">
            &lt;p&gt;This is some sample content.&lt;/p&gt;
        </textarea>
        <button type="submit" name="submit">Save</button>
    </form>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
            // SPREMENJENA VERZIJA
            <p>
                Testni odstavek. Z aplikacijo GitHub
            <p>
    </script>
</body>
</html>
