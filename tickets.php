<html>
 <head>
        <title>Tickets</title>
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

	$var = $pdo->prepare('SELECT * FROM tickets');
	$var-> execute();
	$result = $var->fetchAll(PDO::FETCH_CLASS, 'tickets');

?>

	<TABLE BORDER=1>
		<TR>
			<TH>ID</TH> <TH>Date</TH> <TH>Id Utilisateur</TH>
		</TR>
		<TR>
			<TD>
				<?php
					foreach($result as $row) {
						$id = $row->id_ticket;
						print_r($id);
						echo '<br />';
					}
				?>
			</TD>
			<TD>
				<?php
					foreach($result as $row) {
						$date = $row->date;
						print_r($date);
						echo '<br />';
					}
				?>
			</TD>
			<TD>
				<?php
					foreach($result as $row) {
						$utilisateur_id = $row->utilisateur_id;
						print_r($utilisateur_id);
						echo '<br />';
					}
				?>
			</TD>
		</TR>
	</TABLE>
</body>
</html>
