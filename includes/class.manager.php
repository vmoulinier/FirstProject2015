<?php 
class Manager
{
    private $bdd;
	
    function __construct($bdd)
    {
      $this->bdd = $bdd;
    }
    
    //USER//
    
    public function coordonne($nom, $prenom, $entreprise, $cp, $ville, $adr, $adr_2, $tel)
    {
        $query = $this->bdd->prepare("UPDATE membres SET nom= :nom , prenom= :prenom , entreprise= :entreprise, cp= :cp, ville= :ville, adresse_1= :adr, adresse_2= :adr_2, telephone= :tel WHERE id= :id ");
        $query->bindValue(':id', $_SESSION['user']->getId());
        $query->bindValue(':nom', $nom);
        $query->bindValue(':prenom', $prenom);
        $query->bindValue(':entreprise', $entreprise);
        $query->bindValue(':cp', $cp);
        $query->bindValue(':ville', $ville);
        $query->bindValue(':adr', $adr);
        $query->bindValue(':adr_2', $adr_2);
        $query->bindValue(':tel', $tel);
        $query->execute();
        header('Location: editionprofil.php');
    }
    
    public function selectuserbyid()
    {
        $requser = $this->bdd->prepare('SELECT * FROM membres WHERE id = ?');
        $requser->execute(array($_SESSION['user']->getId()));
        $userinfo = $requser->fetch();
        return $userinfo;
    }
    
    public function selectuserid($id)
    {
        $requser = $this->bdd->prepare('SELECT * FROM membres WHERE id = ?');
        $requser->execute(array($id));
        $row = $requser->fetchAll();
        return $row;
    }
    
    public function selectuserbymail($mail)
    {
        $reqmail = $this->bdd->prepare("SELECT * FROM membres WHERE mail = ?");
        $reqmail->execute(array($mail));
        $mailexist = $reqmail->rowCount();
        return $mailexist;
    }
    
    public function payer($id_commande)
    {
        $id_commande = $_POST['id_commande'];
	$query = $this->bdd->prepare("UPDATE commande SET paye = 1 WHERE id_commande = :id_commande");
	$query->bindValue(':id_commande', $id_commande);
	$query->execute();
        return $query;
    }
    
    public function connexionadmin()
    {
        if (isset($_SESSION['user']) && $_SESSION['user']->getId() == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function connexion()
    {
        if (isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }
    
    public function catproduitbyidcat()
    {
        $query = $this->bdd->prepare("SELECT * FROM categorie_produit ORDER by id_categorie ASC");
        $query->execute();
        $catproduit = $query->fetchAll();
        return $catproduit;
    }
    
    //PRODUIT//    
    
    public function selectproduit($id_cat)
    {
        $query = $this->bdd->prepare("SELECT * FROM produit WHERE id_categorie = ?");
        $query->execute(array($id_cat));
        $selectproduit = $query->fetchAll();
        return $selectproduit;
    }
    
    public function updateproduit($produit1, $description, $prix, $id_produit)
    {
	$query = $this->bdd->prepare("UPDATE produit SET nom= :nom, description= :description, prix= :prix WHERE id_produit= :id_produit");
	$query->bindValue(':nom', $produit1);
	$query->bindValue(':description', $description);
	$query->bindValue(':prix', $prix);
	$query->bindValue(':id_produit', $id_produit);
	$query->execute();
        return $query;
    }
    
    public function deleteproduit($id_produit)
    {
	$query = $this->bdd->prepare("DELETE FROM produit WHERE id_produit = :id_produit ");
        $query->bindValue(':id_produit', $id_produit);
	$query->execute();
        return $query;
    }
    
    public function insertproduit($produit1, $description, $prix, $id_categorie)
    {
        $query = $this->bdd->prepare("INSERT INTO produit (nom, description, prix, id_categorie) VALUES (:nom, :description, :prix, :id_categorie)");
        $query->bindValue(':nom', $produit1);
        $query->bindValue(':description', $description);
        $query->bindValue(':prix', $prix);
        $query->bindValue(':id_categorie', $id_categorie);
        $query->execute();   
        return $query;
    }
    
    //COMMANDES//
    
    public function commandesbyidmembres()
    {
        $reqcommande = $this->bdd->prepare('SELECT * FROM commande WHERE id_membres = ? ORDER BY id_commande DESC');		
	$reqcommande->execute(array($_SESSION['user']->getId()));	
        $commandemembres = $reqcommande->fetchAll();
        return $commandemembres;
    }
    
    public function commandesnonpaye()
    {
        $reqcommande = $this->bdd->prepare('SELECT * FROM commande INNER JOIN membres ON id_membres = id WHERE paye = 0 ORDER BY id_commande DESC');		
	$reqcommande->execute(array($_SESSION['user']->getId()));	
        $commandeinfo = $reqcommande->fetchAll();
        return $commandeinfo;
    }
    
    public function lignecommandes($id_commande)
    {
        $reqligne_commande = $this->bdd->prepare('SELECT * FROM ligne_commande WHERE id_commande = ?');						
	$reqligne_commande->execute(array($id_commande));	
        $ligne_commandeinfo = $reqligne_commande->fetchAll();
        return $ligne_commandeinfo;
    }
    
}