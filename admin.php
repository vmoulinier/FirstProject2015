<?php 
include 'includes/db_connect.php'; 
session_start(); 
include ( "head.php"); 

?>
<!DOCTYPE html>
<html lang="en">

<body>
    <?php if ($manager->connexionadmin() == true){ } else { header('Location: index.php'); }?>
    <div class="bodytest">
        <?php include 'menu.php'; ?>
        <!-- Ligne -->
        <div class="row" style="padding-top:3%; width:90%; margin:auto">
            <!-- Première colonne de la Ligne Alias les produits-->
            <div class="col-md-12">
                <!-- Tableau -->
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php $a=1 ; $b=100; foreach ($manager->catproduitbyidcat() as $row) { $a++; $b++; ?>
                    <div class="panel panel-warning">
                        <div class="panel-heading" role="tab" id="<?php echo ($b); ?>">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo ($a); ?>" aria-expanded="true" aria-controls="<?php print ($a); ?>" style="font-weight: bold;">

                                <!-- affiche la catégorie -->                            
                                <h4><?php echo $row['libelle']; ?></h4> </a>
                            </h4>
                        </div>
                        <div id="<?php echo ($a); ?>" class="panel-collapse <?php if ($a == 2) { echo ('collapse in'); } else { echo ('collapse'); } ?>" role="tabpanel" aria-labelledby="<?php echo ($b); ?>">
                            <div class="panel-body">
                                <div style="padding-bottom: 2px;"></div>
                                <?php $id_cat = $row[ 'id_categorie']; foreach ($manager->selectproduit($id_cat) as $row2) { if (isset($row)) { ?>
                                <div class="row" style="padding-bottom:2%; margin-top:0%;">
                                    <form method="POST" action="includes/admin_update.php">
                                        <div class="col-md-3" style="padding-right:6%; margin:auto;">
                                            <!-- affiche le produit -->
                                            <label style="color:black;">Produit :</label>
                                            <br />
                                            <input type="text" class="form-control" name="form[produits][<?php echo $row2['id_produit'];?>][nom]" value="<?php echo $row2['nom']; ?>" /> </div>
                                        <div class="col-md-3" style="padding-right:6%; margin:auto;">
                                            <!-- affiche la description -->
                                            <label style="color:black;">Description :</label>
                                            <br />
                                            <textarea type="text" class="form-control" name="form[produits][<?php echo $row2['id_produit'];?>][description]" />
                                            <?php echo $row2[ 'description']; ?>
                                            </textarea>
                                        </div>
                                        <div class="col-md-3" style="padding-right:6%; margin:auto;">
                                            <!-- affiche les prix -->
                                            <label style="color:black;">Prix :</label>
                                            <br />
                                            <input type="text" class="form-control" name="form[produits][<?php echo $row2['id_produit'];?>][prix]" value="<?php echo $row2['prix']; ?>" /> 
                                        </div>
                                        <div class="col-md-3" style="padding-right:6%; margin:auto;">
                                            <label style="color:black;">&nbsp; </label>
                                            <br />
                                            <input type="hidden" name="id_produit" value="<?php echo $row2['id_produit']; ?>">
                                            <input type="submit" name="supprimer" class="btn btn-danger" value="Supprimer" /> 
                                        </div>
                                </div>
                                            <?php } } ?>
                                            <label style="color:black;">Mettre à jour les produits </label><br />
                                            <input type="submit" name="valider" class="btn btn-info" value="&nbsp Valider &nbsp" />   
                                            <br /><br />
                                    </form>
                                
                                <div class="row" style="padding-bottom:2%; padding-top:1%; border-top: 1px solid black;">
                                    <form method="POST" action="includes/admin_update.php">
                                        <div class="col-md-3" style="padding-right:6%; margin:auto;">
                                            <!-- affiche le produit -->
                                            <label style="color:black;">Produit :</label>
                                            <br />
                                            <input type="text" class="form-control" name="produit" value=" " /> </div>
                                        <div class="col-md-3" style="padding-right:6%; margin:auto;">
                                            <!-- affiche la description -->
                                            <label style="color:black;">Description :</label>
                                            <br />
                                            <textarea class="form-control" name="description" value=" " /></textarea>
                                        </div>
                                        <div class="col-md-2" style="padding-right:6%; margin:auto;">
                                            <!-- affiche les prix -->
                                            <label style="color:black;">Prix :</label>
                                            <br />
                                            <input type="text" class="form-control" name="prix" value=" " /> </div>
                                        <div class="col-md-2" style="padding-right:6%; margin:auto;">
                                            <input type="hidden" name="id_categorie" value="<?php echo $row['id_categorie'] ?>">
                                            <label style="color:black;">&nbsp; </label>
                                            <br />
                                            <input type="submit" name="ajouter" class="btn btn-info" value="Ajouter" /> </div>
                                        <div class="col-md-2" style="padding-right:6%; margin:auto;"> </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?> </div>
            </div>
        </div>
    </div>
    </body>
</html>