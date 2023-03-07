<?php
session_start();
$indulo_mappa="kepek/";
$mappa_elemek=scandir($indulo_mappa);
sort($mappa_elemek);
$elem_db=count($mappa_elemek);
$elem_db2=count($mappa_elemek) -2;
//print $elem_db2;
// if ($_POST['ellertek']!=100) 
// {
//     print" Az ellenőrző kódot hibásan adta meg. EZért a regisztrációja sikertelen. Próbálja meg újra!";
   
// }
if (isset($_POST["reg"]))
{
    print $_POST["ellertek"];
    if ($_POST['ellertek']!=100)
    {
        print"helytele captcha érték kérem javitsa";
    }
    else{
    $celmappa = "kepek/";
    $celfajl = $celmappa.basename($_FILES["profil"]["name"]);
    $sikeres = 1;
    $kep = getimagesize($_FILES["profil"]["tmp_name"]);
    if ($kep !== false){
        print("A feltöltött fájl kép. ");
    }
    else{
        print("A feltöltött fájl nem kép. ");
        $sikeres = 0;
    }

    if (file_exists($celfajl)) {
        print("A fájl már létezik, töltsön fel másik képet. ");
        $sikeres = 0;
    }

    
    $tipusa = strtolower(pathinfo($celfajl, PATHINFO_EXTENSION));
    if($tipusa!="jpg"){
        
        print("Nem jó képformátum. ");
        $sikeres = 0;
    }

    if ($sikeres == 0){
        print("Sikertelen feltöltés, próbálja újra. ");
    }
    else{
        if (move_uploaded_file($_FILES["profil"]["tmp_name"],$celfajl)){
            print("Sikeres feltöltés. ");
        }
        else{
        print("Sikertelen feltöltés. ");
        }
    }
    print $_SERVER['REMOTE_ADDR'];
    $file=fopen(isset($_POST["mail"]),"w");
    fwrite($file, "nev:".$_POST['nev']."Születsi év: ".$_POST['szulev']."mail:".$_POST['mail']."telefon:".$_POST['telefon']."m.helynev".$_POST['munkahelynev']."mhelycim:".$_POST['munkahelycim']."munkakor".$_POST['munkakor']."IP: ".$_SERVER['REMOTE_ADDR']);
}
}








?>

<!DOCTYPE html>
<html lang="HU">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>konferencia regisztrálás</title>
    <style>
        img{
            width:550px;
            height:550px;
            display: inline-block;
        }
        
        
    </style>
</head>
<body>

<h1> regisztrácio</h1>

<h5>
    Sok szeretettel üdvözöljük, az AB Kft konferenciát szervez kereső-optimalizálás (SEO) témakörében, melyre internetes felületen bárki szabadon
regisztrálhat.

</h5>

<form action="" method="post" enctype="multipart/form-data">
<label for="nev">Név</label>
<input type="text" name="nev" id="nev" required> <br>

<label for="szulev">születési év</label>
<input type="number" name="szulev" id="szulev" min="1923" max="2006" required><br>

<label for="mail">mail cim</label>
<input type="email" name="mail" id="mail" required><br>

<label for="telefon">telefonszám</label>
<input type="tel" name="telefon" id="telefon" pattern="[0-9]{2}-[0-9]{2}-[0-9]{3}-[0-9]{4}"
       required> <small>Format: 06-20-123-4567</small> vagy
       <small>Format: 36-20-123-4567</small><br>

<label for="munkahelynev">munkahely neve</label>  
<input type="text" name="munkahelynev" id="munkahelynev" required><br> 


<label for="munkahelycim">munkahely cim</label>   
<input type="text" name="munkahelycim" id="munkahelycim" required> <br>

<label for="munkakor">munkakor</label>   
<input type="text" name="munkakor" id="munkakor" required> <br>

<label for="profil">profilkép</label> 
<input type="file" name="profil" id="profil" required><br>


<label for="ell">Kérem adja meg az értékét</label>
<label for="ellertrek">99+1</label>
<input type="number" name="ellertek" id="ellertek" required><br>

<button type="submit" name="reg">regisztrálok a  konferenciára</button> <br>



</form>
<img src="img/20221106_082706.jpg" alt="Olly" title="OLLY" >
    
</body>
</html>