<?php

include("../configs/functions.php");
$comments= new comments();




    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: index.php");
    }

    if ( !empty($_POST)) {
        // keep track validation errors
        $codigoJTIError = null;
        $nomeError = null;
        $moradaError = null;
        $codigoPostalError = null;
        $localError = null;
        $codigoCogError = null;
        $descricaoError = null;
        $isActiveError = null;
        $nPlayersError = null;
        $nomeCogError = null;
        $nSerieError = null;
        $screenKeyError = null;
        $ecraError = null;
        $nSerieEcraError = null;
        $resolucaoEcraError = null;
        $suporteEcraError = null;
        $routerError = null;
        $nSerieRouterError = null;
        $imeiRouterError = null;
        $nSimRouterError = null;
        $shopManagerError = null;
        $nTlmError = null;
        $timezoneError = null;
        $redeWifiRkmIPError = null;
        $redeWifiRkmSSIDError = null;
        $redeWifiRkmPASSError = null;
        $ntpError = null;
        $playlistDateError = null;
        $isMigratedError = null;
        //$displayCommentsError = null;
        $commentError = null;
        $promotoresError=null;

        // keep track post values

        $codigoJTI = $_POST['codigoJTI'];
        $nome = $_POST['nome'];
        $morada = $_POST['morada'];
        $codigoPostal = $_POST['codigoPostal'];
        $local = $_POST['local'];
        $codigoCog = $_POST['codigoCog'];
        $descricao = $_POST['descricao'];
        $isActive = $_POST['isActive'];
        $nPlayers = $_POST['nPlayers'];
        $nomeCog = $_POST['nomeCog'];
        $nSerie = $_POST['nSerie'];
        $screenKey = $_POST['screenKey'];
        $ecra = $_POST['ecra'];
        $nSerieEcra = $_POST['nSerieEcra'];
        $resolucaoEcra = $_POST['resolucaoEcra'];
        $suporteEcra = $_POST['suporteEcra'];
        $router = $_POST['router'];
        $nSerieRouter = $_POST['nSerieRouter'];
        $imeiRouter = $_POST['imeiRouter'];
        $nSimRouter = $_POST['nSimRouter'];
        $shopManager = $_POST['shopManager'];

        $selectPromotores = $_POST['selectPromotores'];

        //$displayComments = $_POST['displayComments'];

        $nTlm = $_POST['nTlm'];
        $timezone = $_POST['timezone'];
        $redeWifiRkmIP = $_POST['redeWifiRkmIP'];
        $redeWifiRkmSSID = $_POST['redeWifiRkmSSID'];
        $redeWifiRkmPASS = $_POST['redeWifiRkmPASS'];
        $ntp = $_POST['ntp'];
        $playlistDate = $_POST['playlistDate'];
        $isMigrated = $_POST['isMigrated'];
        $comment = $_POST['comment'];







        // update data
        $database=null;
        $database=new Database();
        $database->query("UPDATE terminals SET  codigoJTI=:codigoJTI,
                                                nome=:nome,
                                                morada=:morada,
                                                codigoPostal=:codigoPostal,
                                                local=:local,
                                                codigoCog=:codigoCog,
                                                descricao=:descricao,
                                                isActive=:isActive,
                                                nPlayers=:nPlayers,
                                                nomeCog=:nomeCog,
                                                nSerie=:nSerie,
                                                screenKey=:screenKey,
                                                ecra=:ecra,
                                                nSerieEcra=:nSerieEcra,
                                                resolucaoEcra=:resolucaoEcra,
                                                suporteEcra=:suporteEcra,
                                                router=:router,
                                                nSerieRouter=:nSerieRouter,
                                                imeiRouter=:imeiRouter,
                                                nSimRouter=:nSimRouter,
                                                shopManager=:shopManager,
                                                nTlm=:nTlm,
                                                timezone=:timezone,
                                                redeWifiRkmIP=:redeWifiRkmIP,
                                                redeWifiRkmSSID=:redeWifiRkmSSID,
                                                redeWifiRkmPASS=:redeWifiRkmPASS,
                                                ntp=:ntp,
                                                playlistDate=:playlistDate,
                                                isMigrated=:isMigrated,
                                                comment=:comment
                          WHERE idTerminals=:idTerminals; ");


        $database->bind(":idTerminals",$id);
        $database->bind(":codigoJTI",$codigoJTI);
        $database->bind(":nome",$nome);
        $database->bind(":morada",$morada);
        $database->bind(":codigoPostal",$codigoPostal);
        $database->bind(":local",$local);
        $database->bind(":codigoCog",$codigoCog);
        $database->bind(":descricao",$descricao);
        $database->bind(":isActive",$isActive);
        $database->bind(":nPlayers",$nPlayers);
        $database->bind(":nomeCog",$nomeCog);
        $database->bind(":nSerie",$nSerie);
        $database->bind(":screenKey",$screenKey);
        $database->bind(":ecra",$ecra);
        $database->bind(":nSerieEcra",$nSerieEcra);
        $database->bind(":resolucaoEcra",$resolucaoEcra);
        $database->bind(":suporteEcra",$suporteEcra);
        $database->bind(":router",$router);
        $database->bind(":nSerieRouter",$nSerieRouter);
        $database->bind(":imeiRouter",$imeiRouter);
        $database->bind(":nSimRouter",$nSimRouter);
        $database->bind(":shopManager",$shopManager);
        $database->bind(":nTlm",$nTlm);
        $database->bind(":timezone",$timezone);
        $database->bind(":redeWifiRkmIP",$redeWifiRkmIP);
        $database->bind(":redeWifiRkmSSID",$redeWifiRkmSSID);
        $database->bind(":redeWifiRkmPASS",$redeWifiRkmPASS);
        $database->bind(":ntp",$ntp);
        $database->bind(":playlistDate",$playlistDate);
        $database->bind(":isMigrated",$isMigrated);
        $database->bind(":comment",$comment);
        $database->execute();



        //----------------------EXAMPLE OF INSERT ON DUPLICATE KEY UPDATE-------------------------

        // INSERT INTO component_psar (tbl_id, row_nr, col_1, col_2, col_3, col_4, col_5, col_6, unit, add_info, fsar_lock)
        //             VALUES('2', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'N')
        //             ON DUPLICATE KEY UPDATE col_1 = VALUES(col_1), col_2 = VALUES(col_2), col_3 = VALUES(col_3),
        //             col_4 = VALUES(col_4), col_5 = VALUES(col_5),
        //             col_6 = VALUES(col_6), unit = VALUES(unit),
        //             add_info = VALUES(add_info), fsar_lock = VALUES(fsar_lock)

        //----------------------------------------------------------------------------------------

        $database=null;
        $database=new Database();
        $database->query("UPDATE terminals_promotores SET idPromotor = :selectPromotores WHERE idTerminal=:id ;");
        $database->bind(":id",$id);
        $database->bind(":selectPromotores",$selectPromotores);
        $database->execute();

        $database->query('INSERT INTO terminals_promotores (idTerminalPromotores,idTerminal, idPromotor)
                          VALUES (NULL, :idTerminals, :selectPromotores)
                          ON DUPLICATE KEY
                          UPDATE idTerminal = :idTerminals, idPromotor = :selectPromotores; ');

        $database->bind(':idTerminals', $id);
        $database->bind(':selectPromotores', $selectPromotores);
        $row = $database->execute();



        // $database=null;
        // $database=new Database();
        // $database->query("UPDATE terminals_comments SET idTerminals = :displayComments WHERE idTerminals=:id ;");
        // $database->bind(":id",$id);
        // $database->bind(":displayComments",$displayComments);
        // $database->execute();
        //
        // $database->query('INSERT INTO terminals_comments (idComments,idTerminals,comment)
        //                   VALUES (NULL, :idTerminals, :displayComments)
        //                   ON DUPLICATE KEY
        //                   UPDATE idTerminals = :idTerminals, idComments = :displayComments; ');
        //
        // $database->bind(':idTerminals', $id);
        // $database->bind(':displayComments', $displayComments);
        // $row = $database->execute();





        header("Location: ../index.php");

    } else {


        $database=null;
        $database=new Database();
        $database->query("SELECT terminals.* FROM terminals
                          WHERE idTerminals=:idTerminals; ");
        $database->bind(":idTerminals",$id);
        $data=$database->single();

        $codigoJTI = $data['codigoJTI'];
        $nome = $data['nome'];
        $morada = $data['morada'];
        $codigoPostal = $data['codigoPostal'];
        $local = $data['local'];
        $codigoCog = $data['codigoCog'];
        $descricao = $data['descricao'];
        $isActive = $data['isActive'];
        $nPlayers = $data['nPlayers'];
        $nomeCog = $data['nomeCog'];
        $nSerie = $data['nSerie'];
        $screenKey = $data['screenKey'];
        $ecra = $data['ecra'];
        $nSerieEcra = $data['nSerieEcra'];
        $resolucaoEcra = $data['resolucaoEcra'];
        $suporteEcra = $data['suporteEcra'];
        $router = $data['router'];
        $nSerieRouter = $data['nSerieRouter'];
        $imeiRouter = $data['imeiRouter'];
        $nSimRouter = $data['nSimRouter'];
        $shopManager = $data['shopManager'];
        $nTlm = $data['nTlm'];
        $timezone = $data['timezone'];
        $redeWifiRkmIP = $data['redeWifiRkmIP'];
        $redeWifiRkmSSID = $data['redeWifiRkmSSID'];
        $redeWifiRkmPASS = $data['redeWifiRkmPASS'];
        $ntp = $data['ntp'];
        $playlistDate = $data['playlistDate'];
        $isMigrated = $data['isMigrated'];
        $comment = $data['comment'];


        $database=null;
        $database=new Database();
        $database->query("SELECT idPromotor FROM terminals_promotores
                          WHERE idTerminal=:idTerminals; ");
        $database->bind(":idTerminals",$id);
        $data=$database->single();
        $selectPromotores=$data['idPromotor'];

        $database=null;
        $database=new Database();
        $database->query("SELECT * FROM promotores ");
        $promotores=$database->resultset();
// -----------------------------------------------------------------------------
        // $database=null;
        // $database=new Database();
        // $database->query("SELECT idComments FROM terminals_comments
        //                   WHERE idTerminals=:idTerminals; ");
        // $database->bind(":idTerminals",$id);
        // $data=$database->single();
        // $displayComments=$data['idComments'];
        //
        // $database=null;
        // $database=new Database();
        // $database->query("SELECT * FROM terminals_comments ");
        // $terminals_comments=$database->resultset();




    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="../js/jquery/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../js/jquery/jquery-ui.min.js"></script>
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/updateterminals.js"></script>
</head>

<body>
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>UPDATE</h3>
                        <a class="btn" href="../index.php">Back</a>
                    </div>

                    <form class="form-horizontal" action="updateTerminals.php?id=<?php echo $id?>" method="post">

                      <div class="control-group <?php echo !empty($codigoJTIError)?'error':'';?>">
                        <label class="control-label">codigoJTI</label>
                        <div class="controls">
                            <input name="codigoJTI" type="text" placeholder="codigoJTI" value="<?php echo !empty($codigoJTI)?$codigoJTI:'';?>">
                            <?php if (!empty($codigoJTIError)): ?>
                                <span class="help-inline"><?php echo $codigoJTIError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($nomeError)?'error':'';?>">
                        <label class="control-label">nome</label>
                        <div class="controls">
                            <input name="nome" type="text"  placeholder="nome" value="<?php echo !empty($nome)?$nome:'';?>">
                            <?php if (!empty($nomeError)): ?>
                                <span class="help-inline"><?php echo $nomeError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($moradaError)?'error':'';?>">
                        <label class="control-label">morada</label>
                        <div class="controls">
                            <input name="morada" type="text"  placeholder="Name" value="<?php echo !empty($morada)?$morada:'';?>">
                            <?php if (!empty($moradaError)): ?>
                                <span class="help-inline"><?php echo $moradaError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($codigoPostalError)?'error':'';?>">
                        <label class="control-label">codigoPostal</label>
                        <div class="controls">
                            <input name="codigoPostal" type="text" placeholder="codigoPostal" value="<?php echo !empty($codigoPostal)?$codigoPostal:'';?>">
                            <?php if (!empty($codigoPostalError)): ?>
                                <span class="help-inline"><?php echo $codigoPostalError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($localError)?'error':'';?>">
                        <label class="control-label">local</label>
                        <div class="controls">
                            <input name="local" type="text"  placeholder="local" value="<?php echo !empty($local)?$local:'';?>">
                            <?php if (!empty($localError)): ?>
                                <span class="help-inline"><?php echo $local;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($codigoCogError)?'error':'';?>">
                        <label class="control-label">codigoCog</label>
                        <div class="controls">
                            <input name="codigoCog" type="text"  placeholder="codigoCog" value="<?php echo !empty($codigoCog)?$codigoCog:'';?>">
                            <?php if (!empty($codigoCogError)): ?>
                                <span class="help-inline"><?php echo $codigoCog;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($descricaoError)?'error':'';?>">
                        <label class="control-label">descricao</label>
                        <div class="controls">
                            <input name="descricao" type="text"  placeholder="descricao" value="<?php echo !empty($descricao)?$descricao:'';?>">
                            <?php if (!empty($descricaoError)): ?>
                                <span class="help-inline"><?php echo $descricao;?></span>
                            <?php endif;?>
                        </div>
                      </div>



                      <div class="control-group <?php echo !empty($isActiveError)?'error':'';?>">
                        <label class="control-label">isActive</label>
                        <div class="controls">
                            <input name="isActive" type="text"  placeholder="isActive" value="<?php echo !empty($isActive)?$isActive:'';?>">
                            <?php if (!empty($isActiveError)): ?>
                                <span class="help-inline"><?php echo $isActive;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($nPlayersError)?'error':'';?>">
                        <label class="control-label">nPlayers</label>
                        <div class="controls">
                            <input name="nPlayers" type="text"  placeholder="nPlayers" value="<?php echo !empty($nPlayers)?$nPlayers:'';?>">
                            <?php if (!empty($nPlayersError)): ?>
                                <span class="help-inline"><?php echo $nPlayers;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($isnomeCog)?'error':'';?>">
                        <label class="control-label">nomeCog</label>
                        <div class="controls">
                            <input name="nomeCog" type="text"  placeholder="nomeCog" value="<?php echo !empty($nomeCog)?$nomeCog:'';?>">
                            <?php if (!empty($nomeCogError)): ?>
                                <span class="help-inline"><?php echo $nomeCog;?></span>
                            <?php endif;?>
                        </div>
                      </div>



                      <div class="control-group <?php echo !empty($nSerieError)?'error':'';?>">
                        <label class="control-label">nSerie</label>
                        <div class="controls">
                            <input name="nSerie" type="text"  placeholder="nSerie" value="<?php echo !empty($nSerie)?$nSerie:'';?>">
                            <?php if (!empty($nSerieError)): ?>
                                <span class="help-inline"><?php echo $nSerie;?></span>
                            <?php endif;?>
                        </div>
                      </div>



                      <div class="control-group <?php echo !empty($screenKeyError)?'error':'';?>">
                        <label class="control-label">screenKey</label>
                        <div class="controls">
                            <input name="screenKey" type="text"  placeholder="screenKey" value="<?php echo !empty($screenKey)?$screenKey:'';?>">
                            <?php if (!empty($screenKeyError)): ?>
                                <span class="help-inline"><?php echo $screenKey;?></span>
                            <?php endif;?>
                        </div>
                      </div>



                      <div class="control-group <?php echo !empty($ecraError)?'error':'';?>">
                        <label class="control-label">ecra</label>
                        <div class="controls">
                            <input name="ecra" type="text"  placeholder="ecra" value="<?php echo !empty($ecra)?$ecra:'';?>">
                            <?php if (!empty($ecraError)): ?>
                                <span class="help-inline"><?php echo $ecra;?></span>
                            <?php endif;?>
                        </div>
                      </div>



                      <div class="control-group <?php echo !empty($nSerieEcraError)?'error':'';?>">
                        <label class="control-label">nSerieEcra</label>
                        <div class="controls">
                            <input name="nSerieEcra" type="text"  placeholder="nSerieEcra" value="<?php echo !empty($nSerieEcra)?$nSerieEcra:'';?>">
                            <?php if (!empty($nSerieEcraError)): ?>
                                <span class="help-inline"><?php echo $nSerieEcra;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($resolucaoEcraError)?'error':'';?>">
                        <label class="control-label">resolucaoEcra</label>
                        <div class="controls">
                            <input name="resolucaoEcra" type="text"  placeholder="resolucaoEcra" value="<?php echo !empty($resolucaoEcra)?$resolucaoEcra:'';?>">
                            <?php if (!empty($resolucaoEcraError)): ?>
                                <span class="help-inline"><?php echo $resolucaoEcra;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($suporteEcraError)?'error':'';?>">
                        <label class="control-label">suporteEcra</label>
                        <div class="controls">
                            <input name="suporteEcra" type="text"  placeholder="suporteEcra" value="<?php echo !empty($suporteEcra)?$suporteEcra:'';?>">
                            <?php if (!empty($suporteEcraError)): ?>
                                <span class="help-inline"><?php echo $suporteEcra;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($routerError)?'error':'';?>">
                        <label class="control-label">router</label>
                        <div class="controls">
                            <input name="router" type="text"  placeholder="router" value="<?php echo !empty($router)?$router:'';?>">
                            <?php if (!empty($routerError)): ?>
                                <span class="help-inline"><?php echo $router;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($nSerieRouterError)?'error':'';?>">
                        <label class="control-label">nSerieRouter</label>
                        <div class="controls">
                            <input name="nSerieRouter" type="text"  placeholder="nSerieRouter" value="<?php echo !empty($nSerieRouter)?$nSerieRouter:'';?>">
                            <?php if (!empty($nSerieRouterError)): ?>
                                <span class="help-inline"><?php echo $nSerieRouter;?></span>
                            <?php endif;?>
                        </div>
                      </div>



                      <div class="control-group <?php echo !empty($imeiRouterError)?'error':'';?>">
                        <label class="control-label">imeiRouter</label>
                        <div class="controls">
                            <input name="imeiRouter" type="text"  placeholder="imeiRouter" value="<?php echo !empty($imeiRouter)?$imeiRouter:'';?>">
                            <?php if (!empty($imeiRouterError)): ?>
                                <span class="help-inline"><?php echo $imeiRouter;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($nSimRouterError)?'error':'';?>">
                        <label class="control-label">nSimRouter</label>
                        <div class="controls">
                            <input name="nSimRouter" type="text"  placeholder="nSimRouter" value="<?php echo !empty($nSimRouter)?$nSimRouter:'';?>">
                            <?php if (!empty($nSimRouterError)): ?>
                                <span class="help-inline"><?php echo $nSimRouter;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($shopManagerError)?'error':'';?>">
                        <label class="control-label">shopManager</label>
                        <div class="controls">
                            <input name="shopManager" type="text"  placeholder="shopManager" value="<?php echo !empty($shopManager)?$shopManager:'';?>">
                            <?php if (!empty($shopManagerError)): ?>
                                <span class="help-inline"><?php echo $shopManager;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($promotoresError)?'error':'';?>">
                        <label class="control-label">Promotores</label>
                        <div class="controls">
                          <select name="selectPromotores" placeholder="selectPromotores" value="<?php echo !empty($selectPromotores)?$selectPromotores:'';?>">
                            <?php
                            foreach ($promotores as $promotor) {
                            //   if($selectPromotores==$promotor["idPromotor"])
                            //   {
                            //         echo "<option selected value='".$promotor["idPromotor"]."'>".$promotor["name"]."</option>";
                            // }else {
                            //         echo "<option value='".$promotor["idPromotor"]."'>".$promotor["name"]."</option>";
                            //       }
                            echo "<option ".($selectPromotores==$promotor["idPromotor"]?'selected':'')." value='".$promotor["idPromotor"]."'>".$promotor["name"]."</option>";
                            }
                            ?>

                          </select>
                            <?php if (!empty($promotoresError)): ?>
                                <span class="help-inline"><?php echo $promotores;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($shopManagerError)?'error':'';?>">
                        <label class="control-label">nTlm</label>
                        <div class="controls">
                            <input name="nTlm" type="text"  placeholder="nTlm" value="<?php echo !empty($nTlm)?$nTlm:'';?>">
                            <?php if (!empty($shopManagerError)): ?>
                                <span class="help-inline"><?php echo $nTlm;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($timezoneError)?'error':'';?>">
                        <label class="control-label">timezone</label>
                        <div class="controls">
                            <input name="timezone" type="text"  placeholder="timezone" value="<?php echo !empty($timezone)?$timezone:'';?>">
                            <?php if (!empty($timezoneError)): ?>
                                <span class="help-inline"><?php echo $timezone;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($redeWifiRkmIPError)?'error':'';?>">
                        <label class="control-label">redeWifiRkmIP</label>
                        <div class="controls">
                            <input name="redeWifiRkmIP" type="text"  placeholder="redeWifiRkmIP" value="<?php echo !empty($redeWifiRkmIP)?$redeWifiRkmIP:'';?>">
                            <?php if (!empty($redeWifiRkmIPError)): ?>
                                <span class="help-inline"><?php echo $redeWifiRkmIP;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($redeWifiRkmSSIDError)?'error':'';?>">
                        <label class="control-label">redeWifiRkmSSID</label>
                        <div class="controls">
                            <input name="redeWifiRkmSSID" type="text"  placeholder="redeWifiRkmSSID" value="<?php echo !empty($redeWifiRkmSSID)?$redeWifiRkmSSID:'';?>">
                            <?php if (!empty($redeWifiRkmSSIDError)): ?>
                                <span class="help-inline"><?php echo $redeWifiRkmSSID;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($redeWifiRkmPASSError)?'error':'';?>">
                        <label class="control-label">redeWifiRkmPASS</label>
                        <div class="controls">
                            <input name="redeWifiRkmPASS" type="text"  placeholder="redeWifiRkmPASS" value="<?php echo !empty($redeWifiRkmPASS)?$redeWifiRkmPASS:'';?>">
                            <?php if (!empty($redeWifiRkmPASSError)): ?>
                                <span class="help-inline"><?php echo $redeWifiRkmPASS;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($ntpError)?'error':'';?>">
                        <label class="control-label">ntp</label>
                        <div class="controls">
                            <input name="ntp" type="text"  placeholder="ntp" value="<?php echo !empty($ntp)?$ntp:'';?>">
                            <?php if (!empty($ntpError)): ?>
                                <span class="help-inline"><?php echo $ntp;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($playlistDateError)?'error':'';?>">
                        <label class="control-label">playlistDate</label>
                        <div class="controls">
                            <input name="playlistDate" type="text"  placeholder="playlistDate" value="<?php echo !empty($playlistDate)?$playlistDate:'';?>">
                            <?php if (!empty($playlistDateError)): ?>
                                <span class="help-inline"><?php echo $playlistDate;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($isMigratedError)?'error':'';?>">
                        <label class="control-label">isMigrated</label>
                        <div class="controls">
                            <input name="isMigrated" type="text"  placeholder="isMigrated" value="<?php echo !empty($isMigrated)?$isMigrated:'';?>">
                            <?php if (!empty($isMigratedError)): ?>
                                <span class="help-inline"><?php echo $isMigrated;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a class="btn" href="../index.php">Back</a>
                        </div>

                          <!-- <div class="control-group <?php// echo !empty($commentError)?'error':'';?>">
                            <button id="newComment" type="button">Adicionar Comentário</button>
                            <button id="saveNewComment" type="button">Gravar</button>
                            <div class="controls">

                                <input name="comment" type="text"  placeholder="comment" value="<?php //echo !empty($comment)?$comment:'';?>">

                                <?php //if (!empty($commentError)): ?>
                                    <span class="help-inline"><?php //echo $comment;?></span>
                                <?php// endif;?>
                            </div>
                          </div> -->

<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                       <!-- <div class="control-group <?php //echo !empty($displayCommentsError)?'error':'';?>">
                        <label class="control-label">Lista de Comentários</label>
                        <div class="controls">
                          <select name="displayComments" type="text" placeholder="displayComments" value="<?php //echo !empty($displayComments)?$displayComments:'';?>">
                            <?php
                            // foreach ($terminals_comments as $terminals_comment) {
                            //   if($displayComments==$terminals_comment["idComments"])
                            //   {
                            //         echo "<option value='".$terminals_comment["idComments"]."'>".$terminals_comment["comment"]."</option>";
                            // }else {
                            //         echo "<option value='".$terminals_comment["idComments"]."'>".$terminals_comment["comment"]."</option>";
                            //       }
                            // echo "<option ".($displayComments==$terminals_comment["idComments"]?'selected':'')." value='".$terminals_comment["idComments"]."'>".$terminals_comment["comment"]."</option>";

                            ?>

                          </select>
                            <?php //if (!empty($promotoresError)): ?>
                                <span class="help-inline"><?php //echo $promotores;?></span>
                            <?php //endif;?>
                        </div>
                      </div> -->


                    </form>
                    <div class="row">
                      <table width="100%">
                        <tr>
                          <td width="25%" style="">
                            <button id="newComment" style="float: right; margin-right: 10%;" type="button">Adicionar Comentário</button>
                            <button id="saveNewComment" type="button" style="display:none; float: right; margin-right: 10%;">Gravar</button>
                          </td>
                          <td width="75%">
                            <input id="addComment_<?php echo $id ?>" type="text" disabled placeholder="Adicione comentário" value="" style="margin:auto; width: 80%;" >
                          </td>
                        </tr>
                      </table>
                    </div>
                    <br><br>
                    <div class="row">
                        <table id="tblComents" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th width="20%">Action</th>
                              <th width="60%">comment</th>
                              <th width="20%">commentDate</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            $comments->listComments($id);
                          ?>
                          </tbody>
                    </table>
                </div>
                </div>

    </div>
  </body>
</html>
