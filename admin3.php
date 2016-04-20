<?php 
include 'includes/db_connect.php'; 
session_start(); 
include ( "head.php"); 
ini_set( "display_errors", 0); error_reporting(0); 
setlocale (LC_TIME, 'fr_FR','fra'); date_default_timezone_set("Europe/Paris"); mb_internal_encoding("UTF-8");
if (isset($_POST["payer"]))
{
    $id_commande = $_POST['id_commande'];
    if($manager->payer($id_commande))
    {
        header('Location: admin3.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <?php if ($manager->connexionadmin() == true){ } else { header('Location: index.php'); }?>
    <div class="bodytest">
        <!-- menu/icone -->
        <?php include 'menu.php' ?>
        <!-- Ligne -->
        <div class="row" style="padding-top:3%; width:95%; margin:auto">
            <div class="col-md-2"> </div>
            <!-- Première colonne de la Ligne Alias les produits-->
            <div class="col-md-8" style="margin-top:1%; padding:2%; background:white; border-radius:6px;">
                <h4>Commandes non payés</h4>
                <br />
                <?php 
                setlocale(LC_TIME, "fr_FR"); 
                foreach ($manager->commandesnonpaye() as $commandeinfo) { 
                ?>
                <form action="membres.php" method="post" target="_blank">
                    <table class="table table-hover">
                    <tr> 
                        Commande de <input type="submit" style="border: none; color: #0404B4; background-color: #fff;" name="submit" value="<?php echo ''.$commandeinfo['nom'].' '.$commandeinfo['prenom'].''?>" />datant du <b><?php echo utf8_encode(strftime('%A %d %B %Y', strtotime($commandeinfo['date']))) ?></b> 
                    </tr>
                        <input type="hidden" name="id_membres" value="<?php echo $commandeinfo['id_membres'] ?>" /> 
                </form>
                <form method="POST" action="">
                    <tr>
                        <td class="info"><b>Produit</b>
                        </td>
                        <td class="info"><b>Prix unitaire </b>
                        </td>
                        <td class="info"><b>Quantite </b>
                        </td>
                        <td class="info"><b>Montant Total</b>
                        </td>
                    </tr>
                    <?php 
                    $id_commande = $commandeinfo[ 'id_commande']; 
                    foreach ($manager->lignecommandes($id_commande) as $ligne_commandeinfo) { 
                    ?>
                    <tr>
                        <td>
                            <?php echo $ligne_commandeinfo[ 'libelle'] ?>
                        </td>
                        <td>
                            <?php echo $ligne_commandeinfo[ 'montant_unitaire'] ?> &euro;</td>
                        <td>
                            <?php echo $ligne_commandeinfo[ 'quantite'] ?>
                        </td>
                        <td>
                            <?php echo $ligne_commandeinfo[ 'montant_total'] ?> &euro;</td>
                    </tr>
                    <?php } ?>
                    <tr style="position: right">
                        
                        <td><u>Prix total : <b><?php echo $commandeinfo['montant']; ?> &euro;</b></u>
                        </td>
                        <td>
                            <input type="hidden" name="id_commande" value="<?php echo $commandeinfo['id_commande'] ?>" />
                            <input type="submit" name="payer" class="btn btn-danger" value="PAYER" />
                        </td>
                    </tr>
                    </table>
                </form>
                <?php } ?> </div>
            <div class="col-md-2"> </div>
        </div>
        <br /> </div>
    </div>
    </body>
</html>