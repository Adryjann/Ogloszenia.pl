<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" href="fav.png"/>
    <title>Logowanie</title>
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
             
              
            <input type="submit" value="Zaloguj się" class="but_log" id="but_reg">
              
              
          </form>  
          
          
          <?php
         
           
          include 'scripts/logowanie_script.php';
          ?>
          <?php
          include 'scripts/logowanie_script2.php'; 
          ?>
          
      </article>
   

    

   


  </div>

  <footer>


  </footer>








</body>