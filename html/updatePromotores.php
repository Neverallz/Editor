<?php

include("../configs/functions.php");





    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: index.php");
    }

    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $emailError = null;
        $nTlmError = null;

        // keep track post values

        $name = $_POST['name'];
        $email = $_POST['email'];
        $nTlm = $_POST['nTlm'];

        // update data
        $database=null;
        $database=new Database();
        $database->query("UPDATE promotores SET name=:name,
                                                email=:email,
                                                nTlm=:nTlm
                          WHERE idPromotor=:idPromotor; ");


        $database->bind(":idPromotor",$id);
        $database->bind(":name",$name);
        $database->bind(":email",$email);
        $database->bind(":nTlm",$nTlm);
        $database->execute();

        header("Location: ../html/promotores.php");

    } else {


        $database=null;
        $database=new Database();
        $database->query("SELECT promotores.* FROM promotores
                          WHERE promotores.idPromotor=:idPromotor; ");
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
                        <h3>UPDATE</h3>
                    </div>

                    <form class="form-horizontal" action="updatePromotores.php?id=<?php echo $id?>" method="post">

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="../html/promotores.php">Back</a>
                        </div>

                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">name</label>
                        <div class="controls">
                            <input name="name" type="text" placeholder="name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">email</label>
                        <div class="controls">
                            <input name="email" type="text"  placeholder="email" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($nTlmError)?'error':'';?>">
                        <label class="control-label">nTlm</label>
                        <div class="controls">
                            <input name="nTlm" type="text"  placeholder="nTlm" value="<?php echo !empty($nTlm)?$nTlm:'';?>">
                            <?php if (!empty($nTlmError)): ?>
                                <span class="help-inline"><?php echo $nTlmError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                    </form>
                </div>

    </div>
  </body>
</html>
