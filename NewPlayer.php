<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Player sign up</title>
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
          crossorigin="anonymous">
</head>


<body>

<h2>DIVA Games</h2>
<h3>New Player Registration</h3>
<?php
$DisplayForm = TRUE;
require_once("PlayerFunctions.inc");

$fName=""; $lName=""; $email=""; $city=""; $country=""; $professional=""; $pwd=""; $pwdConf="";
$fNameError=""; $lNameError=""; $emailError=""; $cityError=""; $pwdError=""; $pwdConfError="";

if (isset($_POST["submit"])){
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $email = $_POST["email"];
    $city = $_POST["city"];
    $country = $_POST["country"];
    $professional = (empty($_POST["professional"]))? "no":"yes";
    $pwd= $_POST["pwd"];
    $pwdConf = $_POST["pwdConf"];
//    echo $fName, $lName, $email, $city, $country, $professional, $pwd, $pwdConf;


    $fNameError = !validateName($fName);
    $lNameError = !validateName($lName);
    $emailError = !validateEmail($email);
    $cityError = !validateCity($city);
    $pwdError = !validatePwd($pwd);
    $pwdConfError = !(validatePwd($pwdConf) && $pwd === $pwdConf);

    $DisplayForm = ($fNameError || $lNameError || $emailError || $cityError || $pwdError || $pwdConfError);

    if (!$DisplayForm){
        $fp = fopen("./players.txt", 'a');
        fwrite($fp, $fName. "~".
                $lName. "~".
                $email. "~".
                $city . "~".
                $country. "~".
                $professional. "\r\n");
        fclose($fp);
    }
}


if ($DisplayForm){
?>
    <form id="" name="" method="POST" action="NewPlayer.php">
        <label for="fName"> First Name: </label>
        <input type="text" name="fName" id="fName" value="<?php echo $fName;?>" maxlength="50" <?php echo ($fNameError)? 'class="diverr"':''?>/>
        <?php echo ($fNameError)? '<div><i class="fas fa-exclamation-circle error"></i> Cannot be empty. Only letters and (- or \').</div>':'<div></div>' ?>

        <label for="lName"> Last Name: </label>
        <input type="text" name="lName" id="lName" value="<?php echo $lName;?>" maxlength="50" <?php echo ($lNameError)? 'class="diverr"':''?>/>
        <?php echo ($lNameError)? '<div><i class="fas fa-exclamation-circle error"></i> Cannot be empty. Only letters and (- or \').</div>':'<div></div>' ?>

        <label for="email"> email: </label>
        <input type="text" name="email" id="email" value="<?php echo $email;?>" maxlength="100" <?php echo ($emailError)? 'class="diverr"':''?>/>
        <?php echo ($emailError)? '<div><i class="fas fa-exclamation-circle error"></i> Email format not recognized.</div>': '<div></div>' ?>

        <label for="city"> City: </label>
        <input type="text" name="city" id="city" value="<?php echo $city;?>" maxlength="50" <?php echo ($cityError)? 'class="diverr"':''?>/>
        <?php echo ($cityError)? '<div><i class="fas fa-exclamation-circle error"></i> Cannot be empty. Only letters and (-).</div>':'<div></div>' ?>

        <label for="country"> Country: </label>
        <select name="country" id="country" >
            <option value="Canada" <?php echo ($_POST["country"] === "Canada")? "selected" : null ?>>Canada</option>
            <option value="United States" <?php echo ($_POST["country"] === "United States")? "selected" : null ?>>United States</option>
            <option value="Argentina" <?php echo ($_POST["country"] === "Argentina")? "selected" : null ?>>Argentina</option>
            <option value="Brazil" <?php echo ($_POST["country"] === "Brazil")? "selected" : null ?>>Brazil</option>
            <option value="Colombia" <?php echo ($_POST["country"] === "Colombia")? "selected" : null ?>>Colombia</option>
            <option value="Ecuador" <?php echo ($_POST["country"] === "Ecuador")? "selected" : null ?>>Ecuador</option>
            <option value="Peru" <?php echo ($_POST["country"] === "Peru")? "selected" : null ?>>Peru</option>
            <option value="Poland" <?php echo ($_POST["country"] === "Poland")? "selected" : null ?>>Poland</option>
        </select>
        <div></div>

        <label for="professional"> Professional: </label>
        <input type="checkbox" name="professional" id="professional" <?php echo ($professional == "yes")? "checked" : null; ?>  />
        <div></div>

        <label for="pwd"> Password: </label>
        <input type="password" name="pwd" id="pwd" maxlength="20" <?php echo ($pwdError)? 'class="diverr"':''?>/>
        <?php echo ($pwdError)? '<div><i class="fas fa-exclamation-circle error"></i> Cannot be empty.</div>': '<div></div>' ?>

        <label for="pwdConf"> Confirm Password: </label>
        <input type="password" name="pwdConf" id="pwdConf" maxlength="20" <?php echo ($pwdConfError)? 'class="diverr"':''?>/>
        <?php echo ($pwdConfError)? '<div><i class="fas fa-exclamation-circle error"></i> Confirmation does not match password.</div>':'<div></div>'?>

        <div></div><input type="submit" name="submit" id="submit" value="SAVE"><div></div>
    </form>
<?php
} else {
    ?>

    <h3>Player saved! <?php echo $fName ." ". $lName ?> has been added to your roster. Good luck with your picks in the pool.</h3>
    <a href=".\NewPlayer.php" class="btn">Continue</a>
    <?php
}
?>


</body>
</html>


