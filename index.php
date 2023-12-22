<?php 
session_start();
include "connect.php";
 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link href="assets/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="style_login.css">
<?php include "connect.php" ?>
</head>
<body>
<div class="login-form">
      <?php if (isset($_POST['login'])) {

            $email= mysqli_real_escape_string($con,$_POST['email']);
            $password= mysqli_real_escape_string($con,$_POST['password']);
            
            if ($email !="" && $password !="") {
                $sql="SELECT count(*) as count,user_id ,user_access,user_username from users where user_email='$email' and user_password='$password'";
                        $result=mysqli_query($con,$sql);
                        $rows=mysqli_fetch_array($result);
                        $count=$rows['count'];
                        $user_id=$rows['user_id'];
                        $user_name=$rows['user_username'];
                        $user_access=$rows['user_access'];
                        
                        
                if ($count > 0) {
                    $sql2="SELECT * FROM users WHERE user_email='{$email}' and user_password='{$password}'";
                $results=mysqli_query($con,$sql2);
                while ($row=mysqli_fetch_array($results))
                {
                        $u_name=$row['user_username'];
                        $u_id=$row['user_id'];
                        $u_access=$row['user_access'];
                        $u_email=$row['user_email'];
                        $u_password=$row['user_password'];


                
               if($email ==  $u_email && $password == $u_password && $u_access <> 'admin') {
                   echo "<span style='color: red'>ERROR: ACCESS DENIED</span>";
                }
                else{
                    
                   $_SESSION['admin']=$row['user_username'];
                   redirect('main/dashboard/');
                }    
                };
                        }  
                        else{
                    echo "<span style='color: red'>ERROR: WRONG EMAIL OR PASSWORD COMBINATION</span>";
                        }
                       }
                      }
         ?>
  <form class="form" method="POST" action="">
    <h1>Login</h1>
    <div class="content">
      <div class="input-field">
        <input type="email" placeholder="Email" name="email" autocomplete="nope">
      </div>
      <div class="input-field">
        <input type="password" placeholder="Password" name="password" autocomplete="new-password">
      </div>
      <a href="#" class="link">Forgot Your Password?</a>
    </div>
    <div >
      <input type="submit" class="btn btn-primary btn-lg btn-block mb-3" value="login" name="login">
    </div>
  </form>
</div>

</body>
</html>
