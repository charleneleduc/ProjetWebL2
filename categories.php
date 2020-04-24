<html>
 <head>
        <title>Catégories</title>
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

$var = $pdo->prepare('SELECT * FROM categories');
$var-> execute();
$result = $var->fetchAll(PDO::FETCH_CLASS, 'categories');

 ?>
<TABLE BORDER=1>
		<TR>
			<TH>Nom</TH> <TH>ID</TH>
		</TR>
		<TR>
			<TD>
				<?php
					foreach($result as $row) {
						$nom_cate = $row->nom_cate;
						print_r($nom_cate);
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
