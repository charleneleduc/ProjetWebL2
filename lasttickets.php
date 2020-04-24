<html>
 <head>
        <title>Les 3 derniers Tickets</title>
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
  $clique = $_GET['clique'];
  if ($clique == 1) {
  	$var = $pdo->prepare("Select distinct(id_ticket), date from tickets
    INNER JOIN ticket_entry on ticket_entry.ticket_id=tickets.id_ticket
    INNER JOIN produits on produit_id=(select id from produits where nom= ?)
    order by date desc limit 3");
  	$var-> execute(array($_GET['nom']));
    $result = $var->fetchAll(PDO::FETCH_CLASS, 'tickets');
  }
  else if ($clique == 2){
    $var = $pdo->prepare("Select distinct(id_ticket), date from tickets
    INNER JOIN ticket_entry on ticket_entry.ticket_id=tickets.id_ticket
    INNER JOIN produits on produit_id=produits.id
    INNER JOIN categories on categorie_id=(select id from categories where nom_cate= ?)
    order by date desc limit 3");
    $var-> execute(array($_GET['nom']));
    $result = $var->fetchAll(PDO::FETCH_CLASS, 'tickets');
  }



?>
<TABLE BORDER=1>
  <TR>
    <TH>ID</TH> <TH>Date</TH>
  </TR>

      <?php
        foreach($result as $row) {
          $id = $row->id_ticket;
          $date = $row->date;
      ?>
      </a>
    <TR>
    <TD> <?php print_r($id); ?>	</TD>
    <TD> <?php print_r($date); ?>	</TD>
  </TR>
<?php } ?>
</TABLE>

</body>
</html>
