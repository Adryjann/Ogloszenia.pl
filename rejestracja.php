<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="icon" href="fav.png"/>
    <title>Rejestracja</title>
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
              <div class="g-recaptcha" data-sitekey="6LfZy2oaAAAAAH7oZai7sjZf5G_UM9aLLyEhL3dY"></div>
            <input type="submit" value="Zarejestruj się" class="but_log" id="but_reg">
              
              
          </form>  
          
          
          <?php
         
           include 'scripts/rejestracja_script.php';

          
          ?>
          
          
      </article>
   

    

   


  </div>

  <footer>


  </footer>








</body>