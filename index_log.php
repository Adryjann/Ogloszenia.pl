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
            <button type="button" name="button" class="but_log">Dodaj ogłoszenie</button>
          <a href="logout.php"> <button type="button" name="button" class="but_log" id="but_reg">Wyloguj się</button></a>
      </div>
  </header>

  <div class="sec">
    <article class="first_title">
        <p>Najnowsze ogłoszenia</p>
    </article>

    <article class="center_art">

      <article class="adv_view">
            <img src="sam.jpeg" alt="samochod">
            <p>Mercedes-benz C63 </p>
            <p>Cena: 63000zł</p>
            <p>Kraków(Małopolskie)</p>

      </article>

      <?php
            
            session_start();
            if(!isset($_SESSION['login'])){
                header("Location: index.php");
            }
       
          $servername = "localhost";
          $username = "root";
          $pass = "";

          try{
            $pdo = new PDO("mysql:host=$servername;dbname=baza_ogloszenia",$username, $pass);
            foreach($pdo->query('SELECT * FROM ogloszenia order by data ') as $wiersz){
                echo "<a href='this_adv_t_log.php?id=".$wiersz['id']."'><article class='adv_view'> <img src='".$wiersz['zdjecie']."'><p>".$wiersz['nazwa']."</p><p> Cena: ".$wiersz['cena']."</p><p>".$wiersz['lokalizacja']."</p> </article></a>";
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
            header ("Location: wyszukiwanie_t.php");
        }
        
      ?>


  </div>

  <footer>


  </footer>








</body>
