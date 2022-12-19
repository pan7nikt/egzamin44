<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep papierniczy</title>
    <link rel="stylesheet" href="styl.css" type="text/css">
</head>

<body>
    <div id="banner">
        <h1>W naszym sklepie internetowym kupisz najtaniej</h1>
    </div>
    <div id="left">
        <h3>Promocja 15% obejmuje artykuły:</h3>
        <ul>
            <!--SKRYPT 1-->
            <?php
                $conn = mysqli_connect('localhost','root','','sklep');
                $q = mysqli_query($conn,'SELECT `nazwa` FROM towary WHERE promocja=1;');
                while($a = mysqli_fetch_array($q))
                {
                    echo "<li>".$a['nazwa']."</li>";
                }
                mysqli_close($conn);
            ?>
        </ul>
    </div>
    <div id="mid">
        <h3>Cena wybranego artykułu w promocji</h3>
        <form method="post">
            <select name="artykul">
                <option value="Gumka do mazania">Gumka do mazania</option>
                <option value="Cienkopis">Cienkopis</option>
                <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
                <option value="Markery 4 szt.">Markery 4 szt.</option>
            </select>
            <input type="submit" value="wybierz">
        </form>
        <!--SKRYPT 2-->
        <?php
            if(isset($_POST['artykul']))
            {
                $conn = mysqli_connect('localhost','root','','sklep');
                $q = mysqli_query($conn,'SELECT `cena` FROM towary WHERE nazwa="'.$_POST['artykul'].'";');
                $cena = round(mysqli_fetch_array($q)['cena'] * 0.85 , 2);
                echo $cena;
            }
        ?>
    </div>
    <div id="right">
        <h3>Kontakt</h3>
        <p>telefon: 123123123<br><a href="mailto:bok@sklep.pl">email:bok@sklep.pl</a></p>
        <img src="promocja2.png" alt="promocja">
    </div>
    <div id="stopka">
        <h4>Autor strony 12345678901</h4>
    </div>
</body>

</html>