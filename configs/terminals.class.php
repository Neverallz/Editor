<?php
class terminals{


  public function __construct()
  {


  }


    //Listagem base
  function listTerminals(){
    $database=new Database();
    $database->query("SELECT idTerminals,codigoJTI, nome,morada,codigoPostal,local,codigoCog,isActive,ecra,isMigrated
                      FROM terminals");
    $rows=$database->resultset();
    //$database=null;
    foreach($rows as $row){
      echo '<tr>';
               echo '<td width=250>';
                   echo '<a class="btn" href="html/readTerminals.php?id='.$row['idTerminals'].'">Detalhes</a>';
                   echo ' ';
                   echo '<a class="btn btn-success" href="html/updateTerminals.php?id='.$row['idTerminals'].'">Editar</a>';
                   echo ' ';
                  //  echo '<a class="btn btn-danger" href="html/deleteTerminals.php?id='.$row['idTerminals'].'">Delete</a>';
                  //  echo '</td>';


               echo '<td>'. $row['codigoJTI'] . '</td>';
               echo '<td>'. $row['nome'] . '</td>';
               echo '<td>'. $row['morada'] . '</td>';
               echo '<td>'. $row['codigoPostal'] . '</td>';
               echo '<td>'. $row['local'] . '</td>';
               echo '<td>'. $row['codigoCog'] . '</td>';
               echo '<td>'. $row['isActive'] . '</td>';
               echo '<td>'. $row['ecra'] . '</td>';
               echo '<td>'. $row['isMigrated'] . '</td>';
               echo '</tr>';
    }
  }






}


?>
