<?php include 'includes/db_connect.php'; session_start(); include( "head.php"); $userinfo=$manager->selectuserbyid(); ?><html><body>    <div class="bodytest">        <?php include 'menu.php';?>        <?php if ($manager->connexion() == true) : ?>        <div class="row">            <div class="col-md-4">            </div>            <div class="col-md-4" style="margin-top:4%; padding:4%; background:white; margin-left:4%; margin-right:4%; border-radius:6px;">                <table class="table table-hover" style="width:100%">                    <h4>Profil de <?php echo $userinfo['nom'] . ' ' . $userinfo['prenom'] . ''; ?></h4>                    <br />                    <br />                    <tr>                        <td>Nom :                            <?php echo $userinfo['nom']; ?>                        </td>                    </tr>                    <tr>                        <td>Prenom :                            <?php echo $userinfo[ 'prenom']; ?>                        </td>                    </tr>                    <tr>                        <td>Adresse :                            <?php echo $userinfo[ 'adresse_1'] . ' ' . $userinfo[ 'cp'] . ' ' . $userinfo[ 'ville']; ?>                        </td>                    </tr>                    <tr>                        <td>Entreprise :                            <?php echo $userinfo[ 'entreprise']; ?>                        </td>                    </tr>                    <tr>                        <td>Telephone :                            <?php echo $userinfo[ 'telephone']; ?>                        </td>                    </tr>                    <tr>                        <td>Email :                            <?php echo $userinfo[ 'mail']; ?>                        </td>                    </tr>                </table>                <br />                <b><a href="editionprofil.php">Editer mon profil</a> |					<a href="deconnexion.php">Se déconnecter</a></b>            </div>            <div class="col-md-4">            </div>        </div>        <?php else: header( 'Location: login.php'); ?>        <?php endif; ?>    </div></body></html>