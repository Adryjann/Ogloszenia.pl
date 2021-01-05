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
            <button type="button" name="button" class="but_log">Zaloguj się</button>
              <a href="rejestracja.php"> <button type="button" name="button" class="but_log" id="but_reg">Zarejestruj się</button></a>
      </div>
  </header>

  <div id="register_section">
      
      <article class="main_register">
        <img src="logo.png" alt="logo" id="register_logo"/>
      
          <form method="post">
              
              <input type="text" name="login" placeholder="Login" class="register_form"/>
              
              <br>
              
              <input type="password" name="haslo" placeholder="Hasło" class="register_form"/>
              <br>
             
              <div class="g-recaptcha" data-sitekey="6LdrjucZAAAAAGRI5zSp-6EaOcqXgOzwjyrLXRMM"></div>
            <input type="submit" value="Zaloguj się" class="but_log" id="but_reg">
              
              
          </form>  
          
          
          <?php
         
           
            @$login = $_POST['login'];
            @$haslo = $_POST['haslo'];
          
          
             
         $servername = "localhost";
         $username = "root";
         $password = "";
         session_start();
          
          if(isset($_SESSION['login'])){
              header ("Location: index_log.php");
          }
         
         try{
            $pdo = new PDO("mysql:host=$servername;dbname=baza_ogloszenia",
            $username, $password);
              
             
            
             $login_query = "SELECT count(*) from uzytkownicy where login='".$login."'";
             $password_query = "SELECT password from uzytkownicy where login='".$login."'";
                
            
            $log = $pdo->query($login_query);
            $pass = $pdo->query($password_query);
             
            $count = $log->fetchColumn();
            $cpass = $pass->fetchColumn();
            
              if(!isset($login)){
                  echo "";
              }
             else if($count==0){
                
                 $_SESSION['error']="Nie ma takiego użytkownika";
                 
             }
             else if(password_verify($haslo,$cpass)){
        
             $_SESSION['login']=$login;
             echo $_SESSION['login'];
             header ("Location: index_log.php");     
                
             }
             else{
                 
                 $_SESSION['error']="Podano błędne hasło";
             }
               
             
                
             
             }
         
         
             
             catch(PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }

          
          ?>
           <?php
                if(isset($_SESSION['error'])){
                    echo "<p class='reg_error'>".$_SESSION['error']."</p>";
                     unset($_SESSION['error']);
                }
               
                
              
              ?>
          
      </article>
   

    

   


  </div>

  <footer>


  </footer>








</body>