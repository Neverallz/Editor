<?php
class users{


  public function __construct()
  {


  }


    //Listagem base
  function listUsers(){
    $database=new Database();
    $database->query("SELECT * FROM user");
    $rows=$database->resultset();
    foreach($rows as $row){
      echo '<tr>';
               echo '<td width=250>';
                   echo '<a class="btn" href="../html/readUsers.php?id='.$row['IdUser'].'">Detalhes</a>';
                   echo ' ';
                   echo '<a class="btn btn-success" href="../html/updateUsers.php?id='.$row['IdUser'].'">Editar</a>';
                   echo ' ';
                   echo '<a class="btn btn-danger" href="../html/deleteUsers.php?id='.$row['IdUser'].'">Delete</a>';
                   echo '</td>';


               echo '<td>'. $row['Name'] . '</td>';
               echo '<td>'. $row['Email'] . '</td>';
               echo '<td>'. $row['Created'] . '</td>';
               echo '<td>'. $row['Address'] . '</td>';
               echo '<td>'. $row['Phone'] . '</td>';
               echo '<td>'. $row['ImagesDefaultTime'] . '</td>';
               echo '<td>'. $row['Password'] . '</td>';
               echo '<td>'. $row['UserKey'] . '</td>';
               switch ($row) {
                   case "1":
                        echo '<td>'. $row['isAdmin'] . '</td>';
                        break;
                   case "2":
                        echo '<td>'. $row['isAdmin'] . '</td>';
                        break;
                   case "3":
                        echo '<td>'. $row['isAdmin'] . '</td>';
                        break;
                    case "-1":
                        echo '<td>'. $row['isAdmin'] . '</td>';
                        break;
                   default:
                    echo '<td>'. $row['isAdmin'] . '</td>';
               }
              //  echo '<td>'. $row['isAdmin'] . '</td>';
               echo '</tr>';
              }
          }
}


?>
