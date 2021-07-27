<?php

if(isset($_POST['login-submit']))
{
        require 'dbh.inc.php';

        $mailuid = $_POST['username'];
        $password = $_POST['pwd'];
        $userview = $_GET['userview'];

        if(empty($mailuid)|| empty($password))
        {
                  header("Location: ../index.php?userview=".$userview."&error=emptyfields");
                  exit();
        }
        else
        {
                  $sql = "SELECT *FROM users WHERE uidUsers=? OR emailUsers=?;";
                  $stmt = mysqli_stmt_init($conn);
                  if (!mysqli_stmt_prepare($stmt,$sql))
                  {
                            header("Location: ../index.php?userview=".$userview."&error=sqlerror");
                  }
                  else
                  {

                            mysqli_stmt_bind_param($stmt,"ss",$mailuid,$mailuid);
                            mysqli_stmt_execute($stmt);
                            $results = mysqli_stmt_get_result($stmt);
                            if($row = mysqli_fetch_assoc($results))
                            {
                                      $pwdCheck =password_verify($password,$row['pwdUsers']);
                                      if($pwdCheck == false)
                                      {
                                              header("Location: ../index.php?userview=".$userview."&error=wrongpwd");
                                              exit();
                                      }
                                      else if ($pwdCheck == true)
                                      {
                                              session_start();
                                              $_SESSION['userId'] = $row['idUsers'];
                                              $_SESSION['userUid'] = $row['uidUsers'];

                                              header('Location: ../user.php?userview=websites&login=success');
                                              exit();
                                      }
                                      else
                                      {
                                              header("Location: ../index.php?userview=".$userview."&error=wrongpwd");
                                              exit();
                                      }
                            }
                            else
                            {
                                      header("Location: ../index.php?userview=".$userview."&error=nouser");
                                      exit();
                            }
                  }
        }
}
else
{
        header("Location: ../index.php?userview=websites");
        exit();
}
