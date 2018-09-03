<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="projet.css" />
    <title>Webos</title>
    <meta charset="utf-8">
  </head>

  <body>
    <div id="wrapper">
    <header>
      <a class='header_link' href="index.php">Accueil</a>
      <a class='header_link' href="login_admin.php">Accés administrateur</a>
      <a class='header_link' href="liste_articles.php">Nos articles</a>
    </header>
    <main>
      

      <?php
      
      $server = "inf-mysql.univ-rouen.fr";
      $user = "heberro1";
      $mdp = "09071998";
      $bdd = "heberro12";
      
      $connection = mysqli_connect($server,$user,$mdp,$bdd);
      echo mysqli_connect_error();

     
      //Velux
      $req = "SELECT adresseimg
      FROM machandises
      WHERE nom = 'Velux'";
      $result = mysqli_query($connection, $req);
      $row = $result->fetch_array();
      $im_Velux  = $row[0];
      echo mysqli_error($connection);
 
      $req = "SELECT prix
      FROM machandises
      WHERE nom = 'Velux'";
      $result = mysqli_query($connection, $req); 
      $row = $result->fetch_array();
      $prix_Velux  = $row[0];
      echo mysqli_error($connection);
      
      
      //Windows10
      $req = "SELECT adresseimg
      FROM machandises
      WHERE nom = 'Windows10'";
      $result = mysqli_query($connection, $req);
      $row = $result->fetch_array();
      $im_Windows10  = $row[0];
      echo mysqli_error($connection);
 
      $req = "SELECT prix
      FROM machandises
      WHERE nom = 'Windows10'";
      $result = mysqli_query($connection, $req); 
      $row = $result->fetch_array();
      $prix_Windows10  = $row[0];
      echo mysqli_error($connection);
      
      //MacOs
      $req = "SELECT adresseimg
      FROM machandises
      WHERE nom = 'MacOS'";
      $result = mysqli_query($connection, $req);
      $row = $result->fetch_array();
      $im_MacOs  = $row[0];
      echo mysqli_error($connection);
 
      $req = "SELECT prix
      FROM machandises
      WHERE nom = 'MacOS'";
      $result = mysqli_query($connection, $req); 
      $row = $result->fetch_array();
      $prix_MacOs  = $row[0];
      echo mysqli_error($connection);
      
      //Ubuntu
      $req = "SELECT adresseimg
      FROM machandises
      WHERE nom = 'Ubuntu'";
      $result = mysqli_query($connection, $req);
      $row = $result->fetch_array();
      $im_Ubuntu  = $row[0];
      echo mysqli_error($connection);
 
      $req = "SELECT prix
      FROM machandises
      WHERE nom = 'Ubuntu'";
      $result = mysqli_query($connection, $req); 
      $row = $result->fetch_array();
      $prix_Ubuntu  = $row[0];
      echo mysqli_error($connection);
 
      
 
      echo"<div class=\"liste_article\"> 
      <table>
      <tr>
        <td>
          <div class='article'>
            <a href='/articles/velux.php'>
              <div>Velux</div>
              <img src=$im_Velux alt=\"Velux\" height=\"300\"/>
              <div>$prix_Velux €</div>
            </a>
          </div>
        </td>
        <td>
          <div class='article'>
            <a href='/articles/windows10.php'>
              <div>Windows10</div>
              <img src=$im_Windows10 alt=\"Windows10\" height=\"300\"/>
              <div>$prix_Windows10 €</div>
            </a>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class='article'>
            <a href='/articles/macos.php'>
              <div>MacOs</div>
              <img src=$im_MacOs alt=\"MacOs\" height=\"300\"/>
              <div>$prix_MacOs €</div>
            </a>
          </div>
        </td>
        <td>
          <div class='article'>
            <a href='/articles/ubuntu.php'>
              <div>Ubuntu</div>
              <img src=$im_Ubuntu alt=\"Ubuntu\" height=\"300\"/>
              <div>$prix_Ubuntu €</div>
            </a>
          </div>
        </td>
      </tr>
      </table>
   </div>";
      
      mysqli_close($connection);
      ?>
    </main>
    <footer>
      <hr>
      <div>
        Developpé par HEBERT Romain et DURAND Alexandre <br/>
        Pour tout problèmes ou informations veuiller nous contacter à une des adresses suivantes :<br/>
        romain.hebert1@etu.univ-rouen.fr
        alexandre.durand@etu.univ-rouen.fr
      </div>
    </footer>
    </div>
  </body>
</html>
<!--
http://localhost/projet/liste_article.php-->