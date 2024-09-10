<?php 
    include("glava.php");
?>


<!-- BODY -->
<div class="bigImage">
    <div class="trailer"></div>

    <div class="headingInImage hidden" >
        <?php
            if(isset($_SESSION["username"])){
                echo "<h2>Welcome, " . $_SESSION["username"] . "</h2>";
            }
        ?>
        <h1 class="hidden">Spletna Ucilnica LLF</h1>
        <p>Explore The Finance World</p>
        <a href="posts_stran.php"><button>Read 🡺</button></a>
        
    </div>
</div>

<section class="about">
    <div class="aboutContainer">
        <img src="img\AboutUs.jpg" alt="">
        <div class="aboutText">
            <h1>About Us</h1>
            <h5>Blog made to help YOU!</h5>
            <p>Welcome to FINANCE UNIVERSE, where articles come to life through vibrant community engagement. Dive into a diverse range of topics, from technology to personal development, and contribute your own insights by creating and sharing articles. Join dynamic discussions, offer feedback, and connect with fellow readers through comments. Explore, share, and engage with knowledge like never before on our interactive platform.</p>
            <p>If you encounter any instances of harmful speech or inappropriate content during your time on our platform, we encourage you to reach out to us immediately. Your safety and comfort are paramount, and we are committed to maintaining a respectful and inclusive environment for all users. Additionally, if you wish to upgrade your role or have any other inquiries, our dedicated team is here to assist you. Please don't hesitate to contact us—we're here to ensure your experience on [Platform Name] is positive and fulfilling.</p>
                <a href="contact_page.php" class="hidden"><button type="button" >Contact us</button></a>
                
        </div>
    </div>
</section>









<!-- NOGA -->
<?php 
    include("noga.php");
?>