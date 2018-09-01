<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="projet.css" />
    <title>Webos</title>
    <meta charset="utf-8">
  </head>

  <body>
    <div class="wrapper">
    <header>
      <a class='header_link' href="index.php">Accueil</a>
      <a class='header_link' href="login_admin.php">Accés administrateur</a>
      <a class='header_link' href="liste_articles.php">Nos articles</a>
    </header>
    <main>
      <form method="post" action="login_admin.php">
        <p>Identifiant :<input type="text" name="id"/></p>
        <p>Mot de passe :<input type="password" name="password"/></p>
        <input type="submit" value="Continuer"/>
      </form>

      <?php
        $id = "Romain";
        $mdp = "manivelle";
        if( isset($_POST["id"]) and isset($_POST["password"]))
        {
            $post_id = $_POST["id"];
            $post_mdp = $_POST["password"];
        }
        if(!isset($post_id)
            or !isset($id)
            or !isset($post_mdp)
            or !isset($mdp)
            or ($id !== $post_id)
            or ($mdp !== $post_mdp))
        {
          if(!empty($post_id) or !empty($post_mdp))
          {
            echo "<p>Mot de passe ou identifiant erroné</p>";
          }
        }
        else
        {
          header('location: admin.php');
          exit();
        }

      //echo "<p>Bonjour, {$_POST['Identifiant']} vous avez tapez :{$_POST['Mot de passe']}!</p>";
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
