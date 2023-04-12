<?php include('header.php'); ?>
<?php
$error=array("","","","","",true);
if(isset($_POST['submit'])){
    $imie=htmlspecialchars($_POST['imie']);
    if ($imie == "" || strlen($imie) < 3){
        $error[0] = "Brak Imienia";
       // echo $error[0];
    }
    $nazwisko=htmlspecialchars($_POST['nazwisko']);
    if ($nazwisko == "" || strlen($nazwisko) < 3) {
        $error[1] = "Brak Nazwiska";
    }
    $login=htmlspecialchars($_POST['login']);
    if ($login == "" || strlen($login) < 3) {
        $error[2] = "Brak Loginu";
    }
    $email=htmlspecialchars($_POST['email']);
    if ($email == "") {
        $error[3] = "Brak Emaila";
    }
    $haslo1=htmlspecialchars($_POST['haslo1']);
    $haslo2=htmlspecialchars($_POST['haslo2']);
    if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/', $haslo1) 
    ||  !preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/', $haslo2)
    || $haslo1 != $haslo2
    )
    $error[4] .= "Hasła musza m iec 8 znakow i byc identico";

  
            
        $nazwisko= $_POST['nazwisko'];
        $imie= $_POST['imie'];
        $haslo1= $_POST['haslo1'];
        $email= $_POST['email'];
        $login= $_POST['login'];
        $haslo2= $_POST['haslo2'];
        // echo $nazwisko;
        // echo $imie;
        // echo $haslo1;
        // echo $email;
        // echo $login;
        if(!empty($_POST['submit'])){
            $error[5]=true;
        }else {
            $error[5]=false;
        }
}

?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- <form action="signup.php" method="post"> -->
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
                <?php
                if($error[0]!=""){

                
                ?>
                <label class="alert alert-warning"><?php echo $error[0]; ?></label>
<?php } ?>
                <input type="text"id="imie" name="imie" placeholder="Imię" class="form-control" aria-labelledby="passwordHelpBlock">
                <div class="mb-3">
                <?php
                if($error[1]!=""){

                
                ?>
                <label class="alert alert-warning"><?php echo $error[1]; ?></label>
<?php } ?>
                <input type="text"id="nazwisko" name="nazwisko" placeholder="Nazwisko" class="form-control" aria-labelledby="passwordHelpBlock">
                <div class="mb-3">
                <?php
                if($error[2]!=""){

                
                ?>
                <label class="alert alert-warning"><?php echo $error[2]; ?></label>
<?php } ?>
                <input type="text"id="login" placeholder="Login" name="login" class="form-control" aria-labelledby="passwordHelpBlock">
                <label for="exampleFormControlInput1" class="form-label"></label>
                <div class="mb-3">
                <?php
                if($error[3]!=""){

                
                ?>
                <label class="alert alert-warning"><?php echo $error[3]; ?></label>
<?php } ?>
                <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
                <div class="mb-3">
                <?php
                if($error[4]!=""){

                
                ?>
                <label class="alert alert-warning"><?php echo $error[4]; ?></label>
<?php } ?>
                <label for="inputPassword5" class="form-label">Password</label>
                <input type="password" name="haslo1" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
                <label for="inputPassword5" class="form-label">Password Again:</label>
                <input type="password" id="inputPassword5" name="haslo2" class="form-control" aria-labelledby="passwordHelpBlock">
                <div class="mb-3">
                <?php
                if($error[5]!=""){

                
                ?>
                <label class="alert alert-warning">Musisz accpet avt regumalin</label>
<?php } ?>
                <input type="checkbox" value="Regulamin" name="submit"> Akceptuję Regulamin.<br>
<input type="submit" value="Załóż konto" name="submit">
<input type="reset" value="Wyczyść">


        </div>
    </div>
</div>

<?php
if ($error[0] == "" && $error[1] == "" && $error[2] == "" && $error[3] == "" && $error[4] == "" && $error[5]) {
    $conn = mysqli_connect('localhost', 'Josef', '123', 'portal');
    if (!$conn) {
        echo ' NIE POŁĄCZONO Z BAZĄ! Error: '.mysqli_connect_error() ; 
    }else{
    echo 'Połączono z bazą';
    echo $_POST['imie'];
    echo $_POST['nazwisko'];
    echo $_POST['login'];
    echo $_POST['email'];
    echo $_POST['haslo1'];
    echo $_POST['haslo2'];
    echo $_POST['submit'];
} 
}
?>