<?php 
include("includes/db_connect.php");
session_start();
include("head.php");
?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <div class="bodytest">
            <?php include 'menu.php'; ?>
            <?php if ($manager->connexion() == true){ } else { header('Location: login.php'); }?>
            <div class="row" style="padding-top:8%; width:100%; margin:auto">
                <div class="col-md-4">      
                </div>
                <div class="col-md-4" style="padding-left:1%; padding-right:1%;">	
                    <div class="panel panel-warning">
                        <div class="panel-heading">

                            <div class="panel-title"><h5>Merci d'avoir commandé !</h5></div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12" style="padding:5%">
                                    <center><a href="javascript:;" class="simpleCart_checkout btn btn-success simpleCart_empty">Finaliser votre commande.</a></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">      
                </div>
            </div>
        </div>
        <script> $.validate();</script>
    </body>
</html>