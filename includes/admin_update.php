<?php
include_once 'db_connect.php';
session_start();

if (isset($_POST["valider"]))
{
    $datas = $_POST['form'];
    foreach($datas['produits'] as $id_produit=>$champs){
        $produit1 = $champs['nom'];
        $description = $champs['description'];
        $prix = $champs['prix'];
        if($manager->updateproduit($produit1, $description, $prix, $id_produit))
            {
                header('Location: ../admin.php');
            }
    }
    
}
        
if (isset($_POST['supprimer']))
{
    $id_produit = $_POST['id_produit'];
    if($manager->deleteproduit($id_produit))
    {
        header('Location: ../admin.php');
    }
}
        
if (isset($_POST["ajouter"]))
{
    $produit1 = $_POST['produit'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $id_categorie = $_POST['id_categorie'];

    if($manager->insertproduit($produit1, $description, $prix, $id_categorie))
    {
        header('Location: ../admin.php');
    }
}

 if (isset($_POST["submit"]))
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $entreprise = $_POST['entreprise'];
    $cp = $_POST['cp'];
    $ville = $_POST['ville'];
    $adr = $_POST['adr'];
    $adr_2 = $_POST['adr_2'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];
    
    if($manager->coordonne($nom, $prenom, $entreprise, $cp, $ville, $adr, $adr_2, $tel))
    {
        header('Location: ../fini.php');
    }
}
