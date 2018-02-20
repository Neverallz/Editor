<?php
class comments{


  public function __construct()
  {


  }


    //Listagem base
  function listComments($idTerminal){
    $database=new Database();
    $database->query("SELECT *
                      FROM terminals_comments
                      Where idTerminals=:idTerminal");
    $database->bind(':idTerminal',$idTerminal);
    $rows=$database->resultset();
    $database=null;
    foreach($rows as $row){
      echo '<tr id="trComment_'.$row['idComments'].'">';
               echo '<td>';
                   echo '<button id="editComment_'.$row['idComments'].'" type="button">Editar</button>';
                   echo '<button id="saveComment_'.$row['idComments'].'" style="display:none;" type="button">Gravar</button>';
                   echo ' ';
                   echo '<button id="deleteComment_'.$row['idComments'].'" type="button">Apagar</button>';
                   echo ' ';


               echo '<td><input id="valueComment_'.$row['idComments'].'" type="text" disabled name="tableComment" style="width:97%" value="'. $row['comment'] . '"></td>';
               echo '<td>'. $row['commentDate'] . '</td>';
               echo '</tr>';
    }
  }

  function addNewComment($idTerminal,$comment){
    $database=new Database();
    $database->query('INSERT INTO `terminals_comments`(`idComments`, `idTerminals`, `comment`, `commentDate`) VALUES (NULL,:idTerminal,:comment,NOW());');
    $database->bind(':idTerminal', $idTerminal);
    $database->bind(':comment', $comment);
    $row = $database->execute();
    if ($row) {
      $idComment = $database->lastInsertId();

      $retval = '<tr id="trComment_'.$idComment.'"><td><button id="editComment_'.$idComment.'" type="button">Editar</button><button id="saveComment_'.$idComment.'" style="display:none;" type="button">Gravar</button> <button id="deleteComment_'.$idComment.'" type="button">Apagar</button> ' .
                '<td><input id="valueComment_'.$idComment.'" type="text" disabled name="tableComment" style="width:97%" value="'. $comment . '"></td><td>'. date("Y-m-d H:i:s") . '</td></tr>.!.'.$idComment;
    } else {
      $retval = "false";
    }
    $database=null;
    echo $retval;
  }

    function editComment($idComment, $comment){
      $database=new Database();
      $database->query('UPDATE terminals_comments SET comment = :comment, commentDate = NOW() WHERE idComments = :idComment;');
      $database->bind(':idComment', $idComment);
      $database->bind(':comment', $comment);
      $row = $database->execute();
      $database=null;
      if ($row) {
          echo "true";
      } else {
          echo "false";
      }
    }

    function deleteComment($idComment){
      $database=new Database();
      $database->query('DELETE FROM `terminals_comments` WHERE idComments = :idComment;');
      $database->bind(':idComment', $idComment);
      $row = $database->execute();
      $database=null;
      if ($row) {
          echo "true";
      } else {
          echo "false";
      }
    }




}


?>
