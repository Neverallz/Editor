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
      $database->query("SELECT user.* FROM user
                        WHERE IdUser=:IdUser; ");
      $database->bind(":IdUser",$id);
      $data=$database->single();

      $Name = $data['Name'];
      $Email = $data['Email'];
      $Created = $data['Created'];
      $Address = $data['Address'];
      $Phone = $data['Phone'];
      $ImagesDefaultTime = $data['ImagesDefaultTime'];
      $Password = $data['Password'];
      $UserKey = $data['UserKey'];
      $isAdmin = $data['isAdmin'];

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
                      <a class="btn" href="../html/users.php">Back</a>
                   </div>
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Name'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Email'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Created</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Created'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Address</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Address'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Phone</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Phone'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">ImagesDefaultTime</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['ImagesDefaultTime'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Password'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">UserKey</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['UserKey'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">isAdmin</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['isAdmin'];?>
                            </label>
                        </div>
                      </div>
                    </div>
                </div>

    </div> <!-- /container -->
  </body>
</html>
