
<?php
include_once ("../configs/functions.php");
$users= new users();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="../js/jquery/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../js/jquery/jquery.dataTables.min.css" />
	<script src="../js/jquery/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../js/promotores.js"></script>
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container-fluid" style="width: 80%; margin-left: auto; margin-right: auto;">
            <div class="row">
                <h3>
                  <form>
                  <input type="button" value="Back" onclick="window.location.href='../index.php'" />
                  </form>
                </h3>
            </div>
            <div class="row">
                <h3>USERS</h3>
            </div>
            <div class="row">
                <table id="usersList" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>Nome</th>
                      <th>Email</th>
                      <th>Created</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>ImagesDefaultTime</th>
                      <th>Password</th>
                      <th>UserKey</th>
                      <th>isAdmin</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                         $users->listUsers();
                  ?>

                </form>
                <div class="row">
                  <table width="100%">
                    <tr>
                      <td width="25%" style="">
                        <button id="newUser" style="float: right; margin-right: 10%;" type="button">Adicionar Utilizador</button>
                        <button id="saveNewUser" type="button" style="display:none; float: right; margin-right: 10%;">Gravar</button>
                      </td>
                      <td width="75%">
                        <input id="addUser_<?php echo $id ?>" type="text" disabled placeholder="Adicione Utilizador" value="" style="margin:auto; width: 80%;" >
                      </td>
                    </tr>
                  </table>
                </div>
                <br><br>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
