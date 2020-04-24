<html>
 <head>
        <title>Produits</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>

<body>

<?php
	require('classe.php');

	try{
		$pdo=new PDO("pgsql:host=pedago01c.univ-avignon.fr;dbname=etd","uapv1803813","O9NngV");
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}

	$var = $pdo->prepare('select nom, nom_cate, prix from produits, categories where(produits.categorie_id=categories.id)');
	$var-> execute();
	$result = $var->fetchAll(PDO::FETCH_CLASS, 'produits');

  $bool = 0;
  $ajout = $pdo->prepare("SELECT id FROM produits");
  $ajout->execute();
  $resultat = $ajout->fetchAll(PDO::FETCH_CLASS,'produits');
  if (isset($_POST['submit'])){
    if ((isset($_POST['nomprod'])) && (isset($_POST['prixprod'])) && (isset($_POST['idcate'])) && (isset($_POST['idprod']))){
      $nomprod = $_POST['nomprod'];
      $prixprod = $_POST['prixprod'];
      $idcate = $_POST['idcate'];
      $idprod = $_POST['idprod'];
      foreach($resultat as $row){
              $id = $row->id;
              if($id==$idprod){
                $bool = 1;
              }
          }
      if($bool==1){
        $modifier = $pdo->prepare("UPDATE produits SET (nom, prix, categorie_id) = ('$nomprod', $prixprod, $idcate) WHERE id=$idprod");
        $modifier->execute();
        header('Location: produits.php');
      }
      else{
        $ajouter = $pdo->prepare("INSERT INTO produits VALUES ($idprod, '$nomprod', $prixprod, $idcate)");
        $ajouter-> execute();
        header('Location: produits.php');
      }
    }
  }
?>

	<TABLE BORDER=1>
		<TR>
      <TH>Nom du produit</TH> <TH>Nom de la catégorie</TH> <TH>Prix du produit</TH>
		</TR>
			<?php
			foreach($result as $row) {
			$nom = $row->nom;
            $nom_cate = $row->nom_cate;
            $prix = $row->prix;
            echo '<tr>';
            echo '<td><a href= "lasttickets.php?clique=1&nom='.$nom.'">';
            print_r($nom);
            echo '</a></td>';
            echo '<td><a href= "lasttickets.php?clique=2&nom='.$nom_cate.'">';
            print_r($nom_cate);
            echo '</td>';
            echo '<td>';
            print_r($prix);
            echo '</td>';
            echo '</tr>';
  			}	?>
        </a>
	</TABLE>

<!-- Ajout d'un produit -->
<div class="w3-container" >
  <button onclick="document.getElementById('modal').style.display='block'" class="w3-button w3-black">Ajouter un produit</button>
    <div id="modal" class="w3-modal">
        <div class="w3-modal-content w3-card-4">
            <header>
                <span onclick="document.getElementById('modal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            </header>
            <div class="w3-container w3-center">
                <form class="w3-container" action="" method="post">
                  <fieldset>
                      <legend>Ajouter ou modifier </legend>
                      <label for="idprod">Id Produit </label>
                      <input type="number" id="idprod" name="idprod" min="1" value="1">
                      <label for="nomprod">Nom Produit </label>
                      <input type="text" id="nomprod" name="nomprod" pattern="[A-Z][a-z]*"></br>
                      <label for="prixprod">Prix Produit </label>
                      <input type="number" id="prixprod" name="prixprod" min="0" step="0.01">
                      <label for="idcate">Id Categorie Produit </label>
                      <input type="number" id="idcate" name="idcate" min="1" max="5" value="1"></br>
                      <input type="submit" value="submit" name="submit">
                  </fieldset><br>
                </form>
            </div>
        </div>
    </div>
  </div>
</body>
</html>
