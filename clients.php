<html>
 <head>
        <title>Clients</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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

$var = $pdo->query('SELECT * FROM utilisateurs');
$var-> execute();
$result = $var->fetchAll(PDO::FETCH_CLASS, 'utilisateurs');
 ?>
<TABLE BORDER=1>
		<TR>
			<TH>Prénom</TH> <TH>Nom</TH> <TH>ID</TH>
		</TR>
		<TR>
			<TD>
				<?php
					foreach($result as $row) {
						$prenom = $row->prenom;
						print_r($prenom);
						echo '<br />';
					}
				?>
			</TD>
			<TD>
				<?php
					foreach($result as $row) {
						$nom = $row->nom;
						print_r($nom);
						echo '<br />';
					}
				?>
			</TD>
			<TD>
				<?php
					foreach($result as $row) {
						$id = $row->id;
						print_r($id);
						echo '<br />';
					}
				?>
			</TD>
		</TR>
	</TABLE>
</body>
</html>
