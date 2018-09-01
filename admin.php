<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="projet.css" />
    <title>Webos</title>
    <meta charset="utf-8">
  </head>

  <body>
    <div class='wrapper'>
    <header>
      <a class='header_link' href="index.php">Accueil</a>
      <a class='header_link' href="login_admin.php">Accés administrateur</a>
      <a class='header_link' href="liste_articles.php">Nos articles</a>
    </header>
    <main>

    <p>Bonjour, monsieur administrateur</p>

    <?php
      $connection = mysqli_connect("localhost","id799516_heberro1","2580romain","id799516_heberro1");
      echo mysqli_connect_error($connection);

      /*
      if ( !empty($_POST["name"]) and !empty($_POST["desc"]) and !empty($_POST["image"]) ){
        $name = $_POST["name"];
        $description = $_POST["desc"];
        $image = $_POST["image"];

        $request = "SELECT MAX(id) FROM marchandises";
        $res = mysqli_query($connection, $request);
        ++$res;

        $request = "INSERT INTO marchandises
        VALUES ('$res','$name',0,'$image','$description')";
        mysqli_query($connection, $request);

      }
      */

      //Velux
      $req = "SELECT adresseimg
      FROM machandises
      WHERE nom = 'Velux'";
      $result = mysqli_query($connection, $req);
      $row = $result->fetch_array();
      $im_Velux  = $row[0];
      echo mysqli_error($connection);

      $req = "SELECT quantite
      FROM machandises
      WHERE nom = 'Velux'";
      $result = mysqli_query($connection, $req);
      $row = $result->fetch_array();
      $quantite_Velux  = $row[0];
      echo mysqli_error($connection);


      //Windows10
      $req = "SELECT adresseimg
      FROM machandises
      WHERE nom = 'Windows10'";
      $result = mysqli_query($connection, $req);
      $row = $result->fetch_array();
      $im_Windows10  = $row[0];
      echo mysqli_error($connection);

      $req = "SELECT quantite
      FROM machandises
      WHERE nom = 'Windows10'";
      $result = mysqli_query($connection, $req);
      $row = $result->fetch_array();
      $quantite_Windows10  = $row[0];
      echo mysqli_error($connection);

      //MacOs
      $req = "SELECT adresseimg
      FROM machandises
      WHERE nom = 'MacOS'";
      $result = mysqli_query($connection, $req);
      $row = $result->fetch_array();
      $im_MacOs  = $row[0];
      echo mysqli_error($connection);

      $req = "SELECT quantite
      FROM machandises
      WHERE nom = 'MacOS'";
      $result = mysqli_query($connection, $req);
      $row = $result->fetch_array();
      $quantite_MacOs  = $row[0];
      echo mysqli_error($connection);

      //Ubuntu
      $req = "SELECT adresseimg
      FROM machandises
      WHERE nom = 'Ubuntu'";
      $result = mysqli_query($connection, $req);
      $row = $result->fetch_array();
      $im_Ubuntu  = $row[0];
      echo mysqli_error($connection);

      $req = "SELECT quantite
      FROM machandises
      WHERE nom = 'Ubuntu'";
      $result = mysqli_query($connection, $req);
      $row = $result->fetch_array();
      $quantite_Ubuntu  = $row[0];
      echo mysqli_error($connection);



      echo "<div class=\"liste_article\">
      <table>
        <tr>
          <td>
            <div class='article'>
              <div>Velux</div>
              <img src=$im_Velux alt=\"Velux\" height=\"100\"/>
              <div>$quantite_Velux disponibles</div>
              <form method=\"post\" action=\"admin.php\"> <p class=\"bloc\"> Je veux en commander : <input type=\"number\" name=\"numb_velux\"/> </p> <input type=\"submit\" value=\"Approvisionner l'article\"/> </form>
            </div>
          </td>
          <td>
            <div class='article'>
              <div>Windows10</div>
              <img src=$im_Windows10 alt=\"Windows10\" height=\"100\"/>
              <div>$quantite_Windows10 disponibles</div>
              <form method=\"post\" action=\"admin.php\"> <p class=\"bloc\"> Je veux en commander : <input type=\"number\" name=\"numb_windows10\"/> </p> <input type=\"submit\" value=\"Approvisionner l'article\"/> </form>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <div class='article'>
              <div>MacOs</div>
              <img src=$im_MacOs alt=\"MacOs\" height=\"100\"/>
              <div>$quantite_MacOs disponibles</div>
              <form method=\"post\" action=\"admin.php\"> <p class=\"bloc\"> Je veux en commander : <input type=\"number\" name=\"numb_macos\"> </p> <input type=\"submit\" value=\"Approvisionner l'article\"/> </form>
            </div>
          </td>
          <td>
            <div class='article'>
              <div>Ubuntu</div>
              <img src=$im_Ubuntu alt=\"Ubuntu\" height=\"100\"/>
              <div>$quantite_Ubuntu disponibles</div>
              <form method=\"post\" action=\"admin.php\"> <p class=\"bloc\"> Je veux en commander : <input type=\"number\" name=\"numb_ubuntu\"/> </p> <input type=\"submit\" value=\"Approvisionner l'article\"/> </form>
            </div>
          </td>
        </tr>
      </table>
      </div>";

      if(!empty($_POST["numb_velux"]) and $_POST["numb_velux"] > 0){
        $number = $_POST["numb_velux"];

        $request = "SELECT quantite
        FROM machandises
        WHERE nom = 'Velux'";
        $result = mysqli_query($connection, $request);
        echo mysqli_error($connection);
        $row = mysqli_fetch_array($result);
        $res = $row["quantite"] + $number;

        $request = "UPDATE machandises
        SET quantite = $res
        WHERE nom = 'Velux'";
        mysqli_query($connection, $request);
        mysqli_error($connection);
        header('Location: admin.php');
        //

        $req = "SELECT prix
        FROM machandises
        WHERE nom = 'Velux'";
        $result = mysqli_query($connection, $req);
        $row = $result->fetch_array();
        $prix  = $row[0];
        echo mysqli_error($connection);

        $f = fopen('bon_de_commande.txt', 'w');

        fprintf($f,"Webos\nRouen\nromain.hebert1@etu.univ-rouen.fr\nalexandre.durand@etu.univ-rouen.fr\n\nDétail de votre commande :\n\n %d Velux\t Prix unitaire : %d euro(s)\t Prix total : %d euro(s),\nCordialement,\n", $number, $prix, $prix * $number);

        fclose($f);
        //
        exit();

      } elseif (!empty($_POST["numb_velux"]) and $_POST["numb_velux"] < 0) {
        header('Location: admin.php');
        exit();
      }

      if(!empty($_POST["numb_windows10"]) and $_POST["numb_windows10"] > 0){
        $number = $_POST["numb_windows10"];

        $request = "SELECT quantite
        FROM machandises
        WHERE nom = 'Windows10'";
        $result = mysqli_query($connection, $request);
        echo mysqli_error($connection);
        $row = mysqli_fetch_array($result);
        $res = $row["quantite"] + $number;

        $request = "UPDATE machandises
        SET quantite = $res
        WHERE nom = 'Windows10'";
        mysqli_query($connection, $request);
        mysqli_error($connection);
        header('Location: admin.php');
        //

        $req = "SELECT prix
        FROM machandises
        WHERE nom = 'Windows10'";
        $result = mysqli_query($connection, $req);
        $row = $result->fetch_array();
        $prix  = $row[0];
        echo mysqli_error($connection);

        $f = fopen('bon_de_commande.txt', 'w');

        fprintf($f,"Webos\nRouen\nromain.hebert1@etu.univ-rouen.fr\nalexandre.durand@etu.univ-rouen.fr\n\nDétail de votre commande :\n\n %d Windows10\t Prix unitaire : %d euro(s)\t Prix total : %d euro(s),\nCordialement,\n", $number, $prix, $prix * $number);

        fclose($f);
        //
        exit();

      } elseif (!empty($_POST["numb_windows10"]) and $_POST["numb_windows10"] < 0) {
        header('Location: admin.php');
        exit();
      }

      if(!empty($_POST["numb_macos"]) and $_POST["numb_macos"] > 0){
        $number = $_POST["numb_macos"];

        $request = "SELECT quantite
        FROM machandises
        WHERE nom = 'MacOS'";
        $result = mysqli_query($connection, $request);
        echo mysqli_error($connection);
        $row = mysqli_fetch_array($result);
        $res = $row["quantite"] + $number;

        $request = "UPDATE machandises
        SET quantite = $res
        WHERE nom = 'MacOS'";
        mysqli_query($connection, $request);
        mysqli_error($connection);
        header('Location: admin.php');
        //

        $req = "SELECT prix
        FROM machandises
        WHERE nom = 'MacOS'";
        $result = mysqli_query($connection, $req);
        $row = $result->fetch_array();
        $prix  = $row[0];
        echo mysqli_error($connection);

        $f = fopen('bon_de_commande.txt', 'w');

        fprintf($f,"Webos\nRouen\nromain.hebert1@etu.univ-rouen.fr\nalexandre.durand@etu.univ-rouen.fr\n\nDétail de votre commande :\n\n %d MacOs\t Prix unitaire : %d euro(s)\t Prix total : %d euro(s),\nCordialement,\n", $number, $prix, $prix * $number);

        fclose($f);
        //
        exit();

      } elseif (!empty($_POST["numb_macos"]) and $_POST["numb_macos"] < 0) {
        header('Location: admin.php');
        exit();
      }

      if(!empty($_POST["numb_ubuntu"]) and $_POST["numb_ubuntu"] > 0){
        $number = $_POST["numb_ubuntu"];

        $request = "SELECT quantite
        FROM machandises
        WHERE nom = 'Ubuntu'";
        $result = mysqli_query($connection, $request);
        echo mysqli_error($connection);
        $row = mysqli_fetch_array($result);
        $res = $row["quantite"] + $number;

        $request = "UPDATE machandises
        SET quantite = $res
        WHERE nom = 'Ubuntu'";
        mysqli_query($connection, $request);
        mysqli_error($connection);
        header('Location: admin.php');
        //

        $req = "SELECT prix
        FROM machandises
        WHERE nom = 'Ubuntu'";
        $result = mysqli_query($connection, $req);
        $row = $result->fetch_array();
        $prix  = $row[0];
        echo mysqli_error($connection);

        $f = fopen('bon_de_commande.txt', 'w');

        fprintf($f,"Webos\nRouen\nromain.hebert1@etu.univ-rouen.fr\nalexandre.durand@etu.univ-rouen.fr\n\nDétail de votre commande :\n\n %d Ubuntu\t Prix unitaire : %d euro(s)\t Prix total : %d euro(s),\nCordialement,\n", $number, $prix, $prix * $number);

        fclose($f);
        //
        exit();

      } elseif (!empty($_POST["numb_ubuntu"]) and $_POST["numb_ubuntu"] < 0) {
        header('Location: admin.php');
        exit();
      }

      mysqli_close($connection);
    ?>
    </main>
    <footer>
      <div>
        <HR>
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
http://localhost/projet/login_admin.php-->
