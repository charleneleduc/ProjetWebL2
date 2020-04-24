<html>
 <head>
        <title>Tickets Entry</title>
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


	$var = $pdo->prepare('SELECT * FROM ticket_entry');
	$var-> execute();
	$result = $var->fetchAll(PDO::FETCH_CLASS, 'ticket_entry');

	?>
<TABLE BORDER=1>
		<TR>
			<TH>Quantité</TH> <TH>Id Produit</TH> <TH>Id Ticket</TH> <TH>ID</TH>
		</TR>
		<TR>
			<TD>
				<?php
					foreach($result as $row) {
						$quantite = $row->quantite;
						print_r($quantite);
						echo '<br />';
					}
				?>
			</TD>
			<TD>
				<?php
					foreach($result as $row) {
						$produit_id = $row->produit_id;
						print_r($produit_id);
						echo '<br />';
					}
				?>
			</TD>
			<TD>
				<?php
					foreach($result as $row) {
						$ticket_id = $row->ticket_id;
						print_r($ticket_id);
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
