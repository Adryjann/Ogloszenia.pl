<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
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
            session_start();
            if(isset($_SESSION['login'])){
                header("Location: index_log.php");
            }
          $servername = "localhost";
          $username = "root";
          $pass = "";

          try{
            $pdo = new PDO("mysql:host=$servername;dbname=baza_ogloszenia",$username, $pass);
            foreach($pdo->query('SELECT * FROM ogloszenia order by data desc LIMIT 5 ') as $wiersz){
                echo "<a href='this_adv_t.php?id=".$wiersz['id']."'><article class='adv_view'> <img src='".$wiersz['zdjecie']."'><div><p>".$wiersz['nazwa']."</p><p> Cena: ".$wiersz['cena']."</p><p>Lokalizacja: ".$wiersz['lokalizacja']."</p><p>Data dodania: ".$wiersz['data']."</div> </article></a>";
                
                echo"<br>";
            }


          }

          catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
          }



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
      
        @$kryterium = $_POST['find'];
        @$location = $_POST['location'];
        
        $_SESSION['kryterium']=$kryterium;
        $_SESSION['location']=$location;
      
        if(isset($kryterium) || isset($location)){
            header ("Location: wyszukiwanie.php");
        }
        
      ?>


  </div>

  <footer>


  </footer>








</body>
