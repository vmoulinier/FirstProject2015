<?php 
include 'includes/db_connect.php'; 
session_start(); 
include( "head.php"); 
if (isset($_POST[ "id_membres"])) { 
$id = $_POST['id_membres']; 
foreach ($manager->selectuserid($id) as $row) { 
?>
<!DOCTYPE html>
<html>
<body>
    <div class="bodytest">
        <!-- menu/icone -->
        <?php include 'menu.php';?>
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10" style="margin-top:4%; padding:4%; background:white; margin-left:1%; margin-right:1%; border-radius:6px;">
                <h4>Information du membre</h4>
                <br>
                <table class="table table-hover">
                    <tr>
                        <td class="warning"><span style="color:#F2C214; font-weight:bold">Nom</span>
                        </td>
                        <td class="warning"><span style="color:#F2C214; font-weight:bold">Prenom</span>
                        </td>
                        <td class="warning"><span style="color:#F2C214; font-weight:bold">Adresse </span>
                        </td>
                        <td class="warning"><span style="color:#F2C214; font-weight:bold">Adresse 2</span>
                        </td>
                        <td class="warning"><span style="color:#F2C214; font-weight:bold">Ville</span>
                        </td>
                        <td class="warning"><span style="color:#F2C214; font-weight:bold">Email</span>
                        </td>
                        <td class="warning"><span style="color:#F2C214; font-weight:bold">Telephone</span>
                        </td>
                        <td class="warning"><span style="color:#F2C214; font-weight:bold">Entreprise</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $row[ 'nom'] ?>
                        </td>
                        <td>
                            <?php echo $row[ 'prenom'] ?>
                        </td>
                        <td>
                            <?php echo $row[ 'adresse_1'] ?>
                        </td>
                        <td>
                            <?php echo $row[ 'adresse_2'] ?>
                        </td>
                        <td>
                            <?php echo $row[ 'ville'] ?>
                        </td>
                        <td>
                            <?php echo $row[ 'mail'] ?>
                        </td>
                        <td>
                            <?php echo $row[ 'telephone'] ?>
                        </td>
                        <td>
                            <?php echo $row[ 'entreprise'] ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-1">
            </div>
            <br>
        </div>
    </div>
    <?php } } ?>
    <?php include 'menu.php';?>
    <h1 style="text-align:center">La page que vous demandez n'existe pas</h1>
</body>
</html>