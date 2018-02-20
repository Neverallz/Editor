
<?php
include_once ("configs/functions.php");
$terminals= new terminals();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="js/jquery/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="js/jquery/jquery.dataTables.min.css" />
	<script src="js/jquery/jquery.dataTables.js" type="text/javascript"></script>
    <script src="js/terminals.js"></script>
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container-fluid" style="width: 80%; margin-left: auto; margin-right: auto;">
      <div class="row">
          <h3>JTI TERMINALS</h3>
      </div>
            <div class="row">
                <h3>
                  <form>
                  <input type="button" value="Promotores" onclick="window.location.href='html/promotores.php'" />
                  <input type="button" value="Users" onclick="window.location.href='html/users.php'" />
                  </form>
                </h3>
            </div>

            <div class="row">
                <table id="terminalList" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>codigoJTI</th>
                      <th>nome</th>
                      <th>morada</th>
                      <th>codigoPostal</th>
                      <th>local</th>
                      <th>codigoCog</th>
                      <th>isActive</th>
                      <th>ecra</th>
                      <th>isMigrated</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        $terminals->listTerminals();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
