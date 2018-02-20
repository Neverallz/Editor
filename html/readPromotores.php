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
      $database->query("SELECT promotores.* FROM promotores
                        WHERE idPromotor=:idPromotor; ");
      $database->bind(":idPromotor",$id);
      $data=$database->single();

      $name = $data['name'];
      $email = $data['email'];
      $nTlm = $data['nTlm'];

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
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
                      <a class="btn" href="../html/promotores.php">Back</a>
                   </div>
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">name</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['name'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">email</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['email'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">nTlm</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['nTlm'];?>
                            </label>
                        </div>
                      </div>

                    </div>
                </div>

    </div> <!-- /container -->
  </body>
</html>
