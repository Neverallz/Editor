<?php
class promotores
{



    public function __construct()
    {


    }

      function listPromotores(){
          $database=new Database();
          $database->query("SELECT idPromotor,name, email,nTlm
                            FROM promotores");
          $rows=$database->resultset();
          //$database=null;
          foreach($rows as $row){
                      $database->query("SELECT * FROM promotores WHERE idPromotor=:idPromotor");
                      $database->bind(':idPromotor',$row['idPromotor']);
                      $type=$database->single();
                      $database->execute();
                        echo '<tr>';
                        echo '<td width=250>';
                             echo '<a class="btn" href="../html/readPromotores.php?id='.$row['idPromotor'].'">Detalhes</a>';
                             echo ' ';
                             echo '<a class="btn btn-success" href="../html/updatePromotores.php?id='.$row['idPromotor'].'">Editar</a>';
                             echo ' ';
                            //  echo '<a class="btn btn-danger" href="delete.php?id='.$row['idPromotor'].'">Apagar</a>';
                            //  echo '</td>';

                         echo '<td>'. $row['name'] . '</td>';
                         echo '<td>'. $row['email'] . '</td>';
                         echo '<td>'. $row['nTlm'] . '</td>';
                         echo '</tr>';
                   }
          }
}
?>
