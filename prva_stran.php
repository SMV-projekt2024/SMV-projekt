<?php 
    include("glava.php");
?>

<!-- BODY -->
<div class="bigImage">
    <div class="trailer"></div>

    <div class="headingInImage hidden" >
        <?php
            if(isset($_SESSION["username"])){
                echo "<h2>Dobrodošli, " . $_SESSION["username"] . "</h2>";
            }
        ?>

        <h1 class="hidden">Spletna Učilnica LLF</h1>
        <p>Vaša učilnica na spletu</p>
        <a href="sole.php"><button>Preberi 🡺</button></a> <br>
    </div>
</div>

<section class="about">
    <div class="aboutContainer">
        <img src="img\slikaUcenje.jpg" alt="">
        <div class="aboutText">
            <h1>O učilnici</h1>
            <h5>Platforma za vaše učenje!</h5>
            <p>Dobrodošli v SPLETNI UČILNICI LLF, kjer lahko s pomočjo interaktivnih vsebin in skupnostnih aktivnosti bogatite svoje znanje. Učite se s širokim naborom predmetov, sodelujte pri diskusijah, oddajajte naloge in pregledujte vsebine, ki vam bodo pomagale pri uspešnem napredku. Spletna učilnica je zasnovana tako, da spodbuja sodelovanje in aktivno učenje z enostavnim dostopom do različnih učnih gradiv.</p>
            <p>Če med uporabo platforme naletite na kakršno koli neprimerno vsebino ali imate vprašanja glede uporabe, vas prosimo, da nas nemudoma kontaktirate. Naša ekipa je tukaj, da vam pomaga pri vseh težavah in vprašanjih. Varnost in kakovost vaše izkušnje sta za nas najpomembnejši. Kontaktirajte nas, če potrebujete pomoč pri dostopu, nadgradnji vašega računa ali imate druge zahteve.</p>
            <a href="contact_page.php" class="hidden"><button type="button" >Kontaktirajte nas</button></a>
        </div>
    </div>
</section>

<!-- NOGA -->
<?php 
    include("noga.php");
?>
