<?php 
    include("glava.php");
?>


    <h2>Oddaj Domačo Nalogo</h2>
    <form action="llf_oddaja.php" method="post" enctype="multipart/form-data">
        <label for="ime_dijaka">Ime in priimek:</label>
        <input type="text" id="ime_dijaka" name="ime_dijaka" required>
        <br><br>
        <label for="datoteka_naloge">Izberi datoteko:</label>
        <input type="file" id="datoteka_naloge" name="datoteka_naloge" required>
        <br><br>
        <button type="submit" name="oddaj">Oddaj</button>
    </form>


<?php
// Podatki za povezavo z bazo
$streznik = "localhost";
$uporabnisko_ime = "root";  // Zamenjajte z vašim uporabniškim imenom
$geslo = "";                // Zamenjajte z vašim geslom
$baza = "llf_ucilnica";

// Ustvari povezavo
$conn = new mysqli($streznik, $uporabnisko_ime, $geslo, $baza);

// Preveri povezavo
if ($conn->connect_error) {
    die("Povezava ni uspela: " . $conn->connect_error);
}

if (isset($_POST['oddaj'])) {
    $ime_dijaka = mysqli_real_escape_string($conn, $_POST['ime_dijaka']);
    $datoteka = $_FILES['datoteka_naloge'];

    // Podrobnosti datoteke
    $imeDatoteke = $datoteka['name'];
    $tmpImeDatoteke = $datoteka['tmp_name'];
    $velikostDatoteke = $datoteka['size'];
    $napakaDatoteke = $datoteka['error'];
    $vrstaDatoteke = $datoteka['type'];

    // Dovoljene vrste datotek (neobvezno)
    $dovoljene = array('pdf', 'doc', 'docx', 'txt');
    $koncnicaDatoteke = strtolower(pathinfo($imeDatoteke, PATHINFO_EXTENSION));

    if (in_array($koncnicaDatoteke, $dovoljene)) {
        if ($napakaDatoteke === 0) {
            if ($velikostDatoteke < 5000000) { // Omejitev velikosti datoteke na 5 MB
                // Ustvari unikatno ime datoteke
                $novoImeDatoteke = uniqid('', true) . "." . $koncnicaDatoteke;
                $ciljnaMapa = 'naloge/' . $novoImeDatoteke;

                // Premakni datoteko na strežnik
                if (move_uploaded_file($tmpImeDatoteke, $ciljnaMapa)) {
                    // Vstavi zapis v bazo
                    $sql = "INSERT INTO oddaje_nalog (ime_dijaka, ime_datoteke) VALUES ('$ime_dijaka', '$novoImeDatoteke')";

                    if ($conn->query($sql) === TRUE) {
                        echo "Domača naloga uspešno oddana!";
                    } else {
                        echo "Napaka: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Prišlo je do napake pri nalaganju datoteke.";
                }
            } else {
                echo "Velikost datoteke presega 5 MB omejitev.";
            }
        } else {
            echo "Napaka pri nalaganju datoteke. Koda napake: " . $napakaDatoteke;
        }
    } else {
        echo "Napačna vrsta datoteke. Dovoljene so samo PDF, DOC, DOCX, in TXT datoteke.";
    }
}

<!-- NOGA -->

    include("noga.php");
?>
