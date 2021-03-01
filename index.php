
<!DOCTYPE html>
<?php header('Content-type: text/html; charset=UTF-8'); ?>
<head>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" href="fav.png"/>
    <title>kupuj.pl</title>
    
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
    
  <header>
      <div class="left">
          <a href="index.php"><img src="logo.png" alt="logo" id="logo"></a>
      </div>

      <div class="right">
          <a href="logowanie.php"><button type="button" name="button" class="but_log">Zaloguj się</button></a>
          <a href="rejestracja.php"> <button type="button" name="button" class="but_log" id="but_reg">Zarejestruj się</button></a>
      </div>
  </header>

  <div class="sec">
    <article class="first_title">
        <p>Najnowsze ogłoszenia</p>
    </article>

    <article class="center_art">

      
        <?php
            include 'scripts/index_script.php'
        ?>
      

        

    </article>

    <div class="find_adv">
    <table>
      <tr>
          <form method="post">
        <td><img src="lupka.png" alt="lupka" class="lupka"></td>
        <td><input type="text" name="find" placeholder="Znajdź coś dla siebie" id="nazwa_ogl"</td>
        <td><input type="text" name="location" placeholder="Lokalizacja" id="lokalizcja"</td>
        <td><button type="submit" class="find_button">Wyszukaj</button></td>
      </tr>
        </form>
        
        

    </table>


    </div>
      
      <?php
      
        include 'scripts/index_script2.php'
        
      ?>


  </div>

  <footer>


  </footer>








</body>
