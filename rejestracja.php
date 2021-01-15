<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
  <header>
      <div class="left">
          <a href="index.php"><img src="logo.png" alt="logo" id="logo"></a>
      </div>

      <div class="right">
            <a href="logowanie.php"><button type="button" name="button" class="but_log">Zaloguj się</button></a>
              <button type="button" name="button" class="but_log" id="but_reg">Zarejestruj się</button>
      </div>
  </header>

  <div id="register_section">
      
      <article class="main_register">
        <img src="logo.png" alt="logo" id="register_logo"/>
      
          <form method="post">
              <input type="text" name="email" placeholder="Email" class="register_form"/>
              <br>
              <input type="text" name="login" placeholder="Login" class="register_form"/>
              <br>
              <input type="password" name="haslo" placeholder="Hasło" class="register_form"/>
              <br>
              <input type="text" name="phone" placeholder="Numer telefonu" class="register_form"/>
              <div class="g-recaptcha" data-sitekey="6LdrjucZAAAAAGRI5zSp-6EaOcqXgOzwjyrLXRMM"></div>
            <input type="submit" value="Zarejestruj się" class="but_log" id="but_reg">
              
              
          </form>  
          
          
          <?php
         
            @$email = $_POST['email'];
            @$login = $_POST['login'];
            @$haslo = $_POST['haslo'];
            @$phone = $_POST['phone'];
          
             
         $servername = "localhost";
         $username = "root";
         $password = "";
         
         
         try{
            $pdo = new PDO("mysql:host=$servername;dbname=baza_ogloszenia",
            $username, $password);
              
             
             $e_ok=false;
             $login_query = "SELECT user_id from uzytkownicy where login = '".$login."'";
             
             
             session_start();
             if(isset($login)){
                 $e_ok=true;
                 $login_test=0;
                 
                 foreach($pdo->query("SELECT user_id from uzytkownicy where login = '".$login."'") as $wiersz){
                     $login_test=$wiersz['user_id'];
                 }
                 
                 $email_test=0;
                     
                 foreach($pdo->query("SELECT user_id from uzytkownicy where email = '".$email."'") as $wiersz){
                     $email_test=$wiersz['user_id'];
                 }
                 
                 
                 
                 if($login_test!=0){
                     $e_ok=false;
                     $_SESSION['test_login']="Ktoś użył już tego loginu";
                 }
                 
                 if($email_test!=0){
                     $e_ok=false;
                     $_SESSION['test_email']="Ktoś użył już tego emaila";
                 }
                
                 if(strlen($email)<3 || strlen($email)>30){
                     $e_ok=false;
                     $_SESSION['e_email']="Nie poprawny email";
                 }
                 
                 
                 if(strlen($login)<3 || strlen($login)>30){
                     $e_ok=false;
                     $_SESSION['e_login']="login musi zawierać od 3 do 30 znaków";
                 }
                 
                 
                 
                 if(strlen($haslo)<6 ){
                     $e_ok=false;
                     $_SESSION['e_password']="Nie poprawne hasło";
                 }
                 
                 
                 
                 if(strlen($phone)<6 || strlen($phone)>30){
                     $e_ok=false;
                     $_SESSION['e_phone']="Nie poprawny numer telefonu";
                 }
                 
                 
                 $sekret = "6LdrjucZAAAAAES4pR01vCa7xTIJaLWau7DNYNwQ";
                 $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
                 
                 $odpowiedz=json_decode($sprawdz);
                 
                 if($odpowiedz->success==false){
                     $e_ok=false;
                     $_SESSION['recaptcha']="Potwierdź, że nie jesteś robotem";
                 }
             }
             
             
             if($e_ok==true){
                 $password_hash=password_hash($haslo, PASSWORD_DEFAULT);
                 $query = "INSERT INTO uzytkownicy (email, login, password, phone) VALUES('".$email."','".$login."','".$password_hash."','".$phone."')";
                 $pdo->exec($query);
             echo("Rekord zostal dodany");
             header("Location: logowanie.php");
             }
             
             if(isset($_SESSION['test_login'])){
                 echo "<p class='reg_error'>".$_SESSION['test_login']."</p>";
                 unset($_SESSION['test_login']);
             }
             
             if(isset($_SESSION['test_email'])){
                 echo "<p class='reg_error'>".$_SESSION['test_email']."</p>";
                 unset($_SESSION['test_email']);
             }
             
             if(isset($_SESSION['e_email'])){
                 echo "<p class='reg_error'>".$_SESSION['e_email']."</p>";
                 unset($_SESSION['e_email']);
             }
             
             if(isset($_SESSION['e_login'])){
                 echo "<p class='reg_error'>".$_SESSION['e_login']."</p>";
                 unset($_SESSION['e_login']);
             }
             
             if(isset($_SESSION['e_password'])){
                 echo "<p class='reg_error'>".$_SESSION['e_password']."</p>";
                 unset($_SESSION['e_password']);
             }
             
             if(isset($_SESSION['e_phone'])){
                 echo "<p class='reg_error'>".$_SESSION['e_phone']."</p>";
                 unset($_SESSION['e_phone']);
             }
             
             if(isset($_SESSION['recaptcha'])){
                 echo "<p class='reg_error'>".$_SESSION['recaptcha']."</p>";
                 unset($_SESSION['recaptcha']);
             }
             
             
             
             }
         
             
             catch(PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }

          
          ?>
          
          
      </article>
   

    

   


  </div>

  <footer>


  </footer>








</body>