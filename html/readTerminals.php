<?php

    include("../configs/functions.php");





    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: index.php");
    } else {

		$database=null;
		$database=new Database();
		$database->query("SELECT terminals.* 
						FROM terminals 
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
		if($data)
		{
			$selectPromotores=$data['idPromotor'];
				
			$database=null;
			$database=new Database();
			$database->query("SELECT name FROM promotores where idPromotor = :idPromotor");
			$database->bind(":idPromotor",$selectPromotores);
			$data=$database->single();
			$promotor=$data['name'];
		}
		else
		{
			$promotor="";
		}
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="../js/jquery/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../js/jquery/jquery.dataTables.min.css" />
	<script src="../js/jquery/jquery.dataTables.js" type="text/javascript"></script>
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>DETALHES</h3>
                    </div>
                    <div class="form">
                      <a class="btn" href="../index.php">Back</a>
                   </div>
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">codigoJTI</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $codigoJTI;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">nome</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $nome;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">morada</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $morada;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">codigoPostal</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $codigoPostal;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">local</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $local;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">codigoCog</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $codigoCog;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">descricao</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $descricao;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">isActive</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $isActive;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">nPlayers</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $nPlayers;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">nomeCog</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $nomeCog;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">nSerie</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $nSerie;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">screenKey</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $screenKey;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">ecra</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $ecra;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">nSerieEcra</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $nSerieEcra;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">resolucaoEcra</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $resolucaoEcra;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">suporteEcra</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $suporteEcra;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">router</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $router;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">nSerieRouter</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $nSerieRouter;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">imeiRouter</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $imeiRouter;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">nSimRouter</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $nSimRouter;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">shopManager</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $shopManager;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Promotores</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $promotor;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">nTlm</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $nTlm;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">timezone</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $timezone;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">redeWifiRkmIP</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $redeWifiRkmIP;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">redeWifiRkmSSID</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $redeWifiRkmSSID;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">redeWifiRkmPASS</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $redeWifiRkmPASS;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">ntp</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $ntp;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">playlistDate</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $playlistDate;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">isMigrated</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $isMigrated;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">comment</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $comment;?>
                            </label>
                        </div>
                      </div>



                    </div>
                </div>

    </div> <!-- /container -->
  </body>
</html>
