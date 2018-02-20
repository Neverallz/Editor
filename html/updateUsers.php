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
        $NameError = null;
        $EmailError = null;
        $CreatedError = null;
        $AddressError = null;
        $PhoneError = null;
        $ImagesDefaultTimeError = null;
        $PasswordError = null;
        $UserKeyError = null;
        $isAdminError = null;

        // keep track post values

        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Created= $_POST['Created'];
        $Address = $_POST['Address'];
        $Phone = $_POST['Phone'];
        $ImagesDefaultTime = $_POST['ImagesDefaultTime'];
        $Password = $_POST['Password'];
        $UserKey = $_POST['UserKey'];
        $isAdmin= $_POST['isAdmin'];

        // update data
        $database=null;
        $database=new Database();
        $database->query("UPDATE user SET Name=:Name,
                                                Email=:Email,
                                                Created=:Created,
                                                Address=:Address,
                                                Phone=:Phone,
                                                ImagesDefaultTime=:ImagesDefaultTime,
                                                Password=:Password,
                                                UserKey=:UserKey,
                                                isAdmin=:isAdmin
                          WHERE IdUser=:IdUser; ");


        $database->bind(":IdUser",$id);
        $database->bind(":Name",$Name);
        $database->bind(":Email",$Email);
        $database->bind(":Created",$Created);
        $database->bind(":Address",$Address);
        $database->bind(":Phone",$Phone);
        $database->bind(":ImagesDefaultTime",$ImagesDefaultTime);
        $database->bind(":Password",$Password);
        $database->bind(":UserKey",$UserKey);
        $database->bind(":isAdmin",$isAdmin);

        $database->execute();

        header("Location: ../html/users.php");

    } else {


        $database=null;
        $database=new Database();
        $database->query("SELECT user.* FROM user
                          WHERE user.IdUser=:IdUser; ");
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
                        <h3>UPDATE</h3>
                    </div>
                    <form class="form-horizontal" action="updateUsers.php?id=<?php echo $id?>" method="post">

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="../html/users.php">Back</a>
                        </div>

                      <div class="control-group <?php echo !empty($NameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="Name" type="text" placeholder="Name" value="<?php echo !empty($Name)?$Name:'';?>">
                            <?php if (!empty($NameError)): ?>
                                <span class="help-inline"><?php echo $NameError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($EmailError)?'error':'';?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input name="Email" type="text"  placeholder="Email" value="<?php echo !empty($Email)?$Email:'';?>">
                            <?php if (!empty($EmailError)): ?>
                                <span class="help-inline"><?php echo $EmailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($CreatedError)?'error':'';?>">
                        <label class="control-label">Created</label>
                        <div class="controls">
                            <input name="Created" type="text"  placeholder="Created" value="<?php echo !empty($Created)?$Created:'';?>">
                            <?php if (!empty($CreatedError)): ?>
                                <span class="help-inline"><?php echo $CreatedError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>



                      <div class="control-group <?php echo !empty($AddressError)?'error':'';?>">
                        <label class="control-label">Address</label>
                        <div class="controls">
                            <input name="Address" type="text"  placeholder="Address" value="<?php echo !empty($Address)?$Address:'';?>">
                            <?php if (!empty($AddressError)): ?>
                                <span class="help-inline"><?php echo $AddressError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($PhoneError)?'error':'';?>">
                        <label class="control-label">Phone</label>
                        <div class="controls">
                            <input name="Phone" type="text"  placeholder="Phone" value="<?php echo !empty($Phone)?$Phone:'';?>">
                            <?php if (!empty($PhoneError)): ?>
                                <span class="help-inline"><?php echo $PhoneError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($ImagesDefaultTimeError)?'error':'';?>">
                        <label class="control-label">ImagesDefaultTime</label>
                        <div class="controls">
                            <input name="ImagesDefaultTime" type="text"  placeholder="ImagesDefaultTime" value="<?php echo !empty($ImagesDefaultTime)?$ImagesDefaultTime:'';?>">
                            <?php if (!empty($ImagesDefaultTimeError)): ?>
                                <span class="help-inline"><?php echo $ImagesDefaultTimeError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($PasswordError)?'error':'';?>">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input name="Password" type="text"  placeholder="Password" value="<?php echo !empty($Password)?$Password:'';?>">
                            <?php if (!empty($PasswordError)): ?>
                                <span class="help-inline"><?php echo $PasswordError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($UserKeyError)?'error':'';?>">
                        <label class="control-label">UserKey</label>
                        <div class="controls">
                            <input name="UserKey" type="text"  placeholder="UserKey" value="<?php echo !empty($UserKey)?$UserKey:'';?>">
                            <?php if (!empty($UserKeyError)): ?>
                                <span class="help-inline"><?php echo $UserKeyError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($isAdminError)?'error':'';?>">
                        <label class="control-label">isAdmin</label>
                        <div class="controls">
                          <select name="isAdmin">
                              <option value="1" <?php echo ($isAdmin=='1')?'selected':''?>>User</option>
                              <option value="2" <?php echo ($isAdmin=='2')?'selected':''?>>Admin</option>
                              <option value="3" <?php echo ($isAdmin=='3')?'selected':''?>>HelpDesk</option>
                              <option value="-1" <?php echo ($isAdmin=='-1')?'selected':''?>>SuperUser</option>
                          </select>
                      </div>

                        <!-- <div class="controls">
                            <input name="isAdmin" type="text"  placeholder="isAdmin" value="<?php //echo !empty($isAdmin)?$isAdmin:'';?>">
                            <?//php if (!empty($isAdminError)): ?>
                                <span class="help-inline"><?php //echo $isAdminError;?></span>
                            <?//php endif; ?>
                        </div> -->
                      </div>

                    </form>
                </div>


          </div>

    </div>
  </body>
</html>
