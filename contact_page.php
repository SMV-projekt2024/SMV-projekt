<?php
    include("glava.php");
?>



<div class="createBox">
    <div class="innerCreateBox ContactUs">
        <h1>Contact us</h1>
        <form action="includes\contact_email-inc.php" method="post">
            <div class="inputBoxCreate">
                <input type="text" required name="name" id="">
                <label>Name</label>
            </div>
            <div class="inputBoxCreate">
                <input type="email" required name="email" id="">
                <label>Email</label>
            </div>
            <div class="inputBoxCreate">
                <textarea name="message" id="" rows="30" cols="100"></textarea>
                <label>Message</label>
            </div>
            <div class="inputBoxCreate">
                <button type="submit" name="sendMail">Send</button>          
            </div>
            
        </form>
    </div>   
</div>





<!-- NOGA -->
<?php 
    include("noga.php");
?>