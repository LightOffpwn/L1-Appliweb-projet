<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../projet.css" />
    <title>Webos</title>
    <meta charset="utf-8">
  </head>

  <body>
    <div class='wrapper'>
      <header>
        <a class='header_link' href="../index.php">Accueil</a>
        <a class='header_link' href="../login_admin.php">Accés administrateur</a>
        <a class='header_link' href="../liste_articles.php">Nos articles</a>
      </header>
    
     <main>
  
      <?php
        
        $server = "inf-mysql.univ-rouen.fr";
        $user = "heberro1";
        $mdp = "09071998";
        $bdd = "heberro12";
      

        $connection = mysqli_connect($server,$user,$mdp,$bdd);
        echo mysqli_connect_error($connection);
        
        $name = "Windows10";
        
        //$name
        $req = "SELECT adresseimg
        FROM machandises
        WHERE nom = '$name'";
        $result = mysqli_query($connection, $req);
        $row = $result->fetch_array();
        $im  = $row[0];
        echo mysqli_error($connection);                                  // recuperation de l'adresse de l'image
      
        $req = "SELECT description
        FROM machandises
        WHERE nom = '$name'";
        $result = mysqli_query($connection, $req);
        $row = $result->fetch_array();
        $desc  = $row[0];
        echo mysqli_error($connection);                                     //recuperer la description
        
        $req = "SELECT prix
        FROM machandises
        WHERE nom = '$name'";
        $result = mysqli_query($connection, $req); 
        $row = $result->fetch_array();
        $prix  = $row[0];
        echo mysqli_error($connection);                                    // recuperation du prix
   
        
        $req = "SELECT quantite
        FROM machandises
        WHERE nom = '$name'";
        $result = mysqli_query($connection, $req); 
        $row = $result->fetch_array();
        $quant  = $row[0];
        echo mysqli_error($connection);                                    // recuperation de la quantité
            
            
            
        echo "<p class=\"liste_article\"><img src=\"$im\" alt=\"$name\" height=\"400\"/><br/>
        $name <br/> $prix € </p>";
        echo " <p>$desc</p>";
        if($quant <= 0){
          echo '<p class="msg_error"> Nous sommes au regret de vous annoncer que nous somme en rupture de stock pour cet article</p>';
        }else{
          echo '<div class="liste_article"><form method="post" action="windows10.php">
          <p>J\'en veux :<input type="number" name="numb"/></p>
          <input type="submit" value="Acheter"/>
          </form></div>';
        if( isset($_POST["numb"]) and $_POST["numb"] >= 1  ){
          $numb = $_POST["numb"];
          if($numb > $quant){
            echo "<p class=\"msg_error\"> Nous sommes au regret de vous annoncer qu'il nous reste seulement $quant $name </p>";
          }
          else {
            $request = "SELECT quantite
            FROM machandises
            WHERE nom = '$name'";
            $result = mysqli_query($connection, $request);
            echo mysqli_error($connection);
            $row = mysqli_fetch_array($result);
            $res = $row["quantite"] - $numb;
            
            $request = "UPDATE machandises 
            SET quantite = $res
            WHERE nom = '$name'";
            mysqli_query($connection, $request);
            mysqli_error($connection);
            echo "<p class='succes'>Commande effectué!</p>";
            
        
            $f = fopen('facture.txt', 'w');
            
            fprintf($f,"Webos\nRouen\nromain.hebert1@etu.univ-rouen.fr\nalexandre.durand@etu.univ-rouen.fr\n\nDétail de votre commande :\n\n %d %s\t Prix unitaire : %d euro(s)\t Prix total : %d euro(s)\nEn votre aimable reglement,\nCordialement,\n
            Conditions de paiement : paiement à reception de facture, a 30 jours...
            Aucun escompte consenti pour reglement anticipe
            Tout incident de paiement est passible d'interet de retard. Le montant des penalites resulte de l application aux sommes restant dues d un taux d interet legal en vigueur au moment de l incident.
            Indemnite forfaitaire pour frais de recouvrement due au creancier en cas de retard de paiement: 40 euros", $numb, $name, $prix, $prix * $numb);
            
            fclose($f);
            }
          }
        }
     
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
