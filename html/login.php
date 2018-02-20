<html>
  <!-- <head><h1>Login Page</h1> -->
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <center>


     <form action = "login.php" method = "POST">

       Username: <input type="text" name="username"> <br /><br/>
       Password: <input type="password" name="password"> <br /><br/>

     <input type="submit" value="Login" name="submit">


     </form>

 </center>
 </body>
 </html>



 <?php

        $error ='';

        require('../configs/functions.php');

        $username = $_POST['username'];
        $password = $_POST['password'];


       if(isset($_POST['submit']))
       {
             if($username && $password)
             {
                  $check = mysql_query("SELECT * FROM users WHERE username='".$username."' AND password= '".$password."'");
                  $rows = mysql_num_rows($check);


             if(mysql_num_rows($check)!=0)
             {
                  session_start();
                  header("location:/main.php");
                  exit();
             }
             else
             {
                 echo "Couldn't find username.";

             }
        }
      else
      {
            echo "Please fill all the fields.";
      }

   }
  ?>
