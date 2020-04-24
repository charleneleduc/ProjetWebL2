<?php
// Catégories
	class categories{
		public $nom_cate;
		public $id;

		public function __construct() {}

		public function __toString(){
			return $this->nom_cate;
			return $this->id;
		}
	}

// Clients
	class utilisateurs{
		public $prenom;
		public $nom;
		public $id;

		public function __construct() {
		}

		public function __toString(){
			return $this->prenom;
			return $this->nom;
			return $this->id;
		}
	}

// Produits
class produits{
  public $nom;
  public $prix;
  public $categorie_id;
  public $id;

  public function __construct() {}

  public function __toString(){
    return $this->nom;
    return $this->prix;
    return $this->categorie_id;
    return $this->id;
  }
}

// Ticket Entry
class ticket_entry{
  public $quantite;
  public $produit_id;
  public $ticket_id;
  public $id_entry;

  public function __construct() {}

  public function __toString(){
    return $this->quantite;
    return $this->produit_id;
    return $this->ticket_id;
    return $this->id_entry;
  }
}

// Tickets
class tickets{
  public $id_ticket;
  public $date;
  public $utilisateur_id;

public function __construct() {}

public function __toString(){
    return $this->id_ticket;
    return $this->date;
    return $this->utilisateur_id;
  }
}

?>
