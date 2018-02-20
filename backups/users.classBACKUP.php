<?php
class users{


  public function __construct()
  {


  }


    //Listagem base
  function listUsers(){
    $database=new Database();
    $database->query("SELECT * FROM user
                      Where IdUser=:IdUser");
    $database->bind(':IdUser',$IdUser);
    $rows=$database->resultset();
    $database=null;
    foreach($rows as $row){
      echo '<tr id="trUser_'.$row['IdUser'].'">';
               echo '<td>';
                   echo '<button id="editUser_'.$row['IdUser'].'" type="button">Editar</button>';
                   echo '<button id="saveUser_'.$row['IdUser'].'" style="display:none;" type="button">Gravar</button>';
                   echo ' ';
                   echo '<button id="deleteUser_'.$row['IdUser'].'" type="button">Apagar</button>';
                   echo ' ';


               echo '<td><input id="valueUser_'.$row['IdUser'].'" type="text" disabled name="tableComment" style="width:97%" value="'. $row['comment'] . '"></td>';
               echo '</tr>';
    }
  }

  function addNewUser($IdUser,$Name){
    $database=new Database();
    $database->query('INSERT INTO `user`(`IdUser`, `IdUsers`, `comment`, `commentDate`) VALUES (NULL,:IdUser,:comment,NOW());');
    $database->bind(':IdUser', $IdUser);
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

    function editUser($IdUser, $Name){
      $database=new Database();
      $database->query('UPDATE user SET Name = :Name, Email = :Email, Created = NOW() , Address = :Address, Phone = :Phone, ImagesDefaultTime = :ImagesDefaultTime , Password = :Password, UserKey=:UserKey, isAdmin=:isAdmin
                        WHERE IdUser = :IdUser;');
      $database->bind(':IdUser', $IdUser);
      $database->bind(':Name', $Name);
      $database->bind(':Email', $Email);
      $database->bind(':Created', $Created);
      $database->bind(':Address', $Address);
      $database->bind(':Phone', $Phone);
      $database->bind(':ImagesDefaultTime', $ImagesDefaultTime);
      $database->bind(':Password', $Password);
      $database->bind(':UserKey', $UserKey);
      $database->bind(':isAdmin', $isAdmin);
      $row = $database->execute();
      $database=null;
      if ($row) {
          echo "true";
      } else {
          echo "false";
      }
    }

    function deleteUser($IdUser){
      $database=new Database();
      $database->query('DELETE FROM `user` WHERE IdUser = :IdUser;');
      $database->bind(':IdUser', $IdUser);
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
