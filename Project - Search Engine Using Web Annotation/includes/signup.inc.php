<?php
if (isset($_POST["signup-submit"]))
{
            require 'dbh.inc.php';

            $username = $_POST['uid'];
            $email = $_POST['email'];
            $password = $_POST['pwd'];
            $passwordRepeat = $_POST['pwd-repeat'];
            $userview = $_GET['userview'];

            if(empty($username)||empty($email)||empty($password)||empty($passwordRepeat))
            {
                          header("Location: ../index.php?userview=".$userview."&error=emptyfields&uid=".$username."&email=".$email);
                          exit();
            }
            elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)&&!preg_match("/^[a-zA-Z0-9]*$/", $username))
            {
                          header("Location: ../index.php?userview=".$userview."&error=invalidemail&uid");
                          exit();
            }

            elseif (!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                          header("Location: ../index.php?userview=".$userview."&error=invalidemail&uid=".$username);
                          exit();
            }
            elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username))
            {
                          header("Location: ../index.php?userview=".$userview."&error=invaliduid&email=".$email);
                          exit();
            }
            else if ($password!==$passwordRepeat)
            {
                          header("Location: ../index.php?userview=".$userview."&error=passwordcheck&uid=".$username."&email=".$email);
                          exit();
            }
            else
            {
                          $sql = "SELECT uidUsers FROM users WHERE uidUsers =? ";
                          $stmt = mysqli_stmt_init($conn);
                          if (!mysqli_stmt_prepare($stmt, $sql))
                          {
                                  header("Location: ../index.php?userview=".$userview."&error=sqlerror");
                                  exit();
                          }
                          else
                          {
                                    mysqli_stmt_bind_param($stmt, "s", $username);
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_store_result($stmt);
                                    $resultCheck = mysqli_stmt_num_rows($stmt);
                                    if ($resultCheck > 0)
                                    {
                                            header("Location: ../index.php?userview=".$userview."&error=usertaken&email=".$email);
                                            exit();
                                    }
                                    else
                                    {
                                              $idUsers=1;
                                              $sql = "SELECT idUsers FROM users WHERE idUsers =? ";
                                              $stmt = mysqli_stmt_init($conn);
                                              if (!mysqli_stmt_prepare($stmt, $sql))
                                              {
                                                      header("Location: ../index.php?userview=".$userview."&error=sqlerror");
                                                      exit();
                                              }
                                              else
                                              {
                                                      do {
                                                                  mysqli_stmt_bind_param($stmt, "s", $idUsers);
                                                                  mysqli_stmt_execute($stmt);
                                                                  mysqli_stmt_store_result($stmt);
                                                                  $resultCheck = mysqli_stmt_num_rows($stmt);
                                                                  if ($resultCheck > 0)
                                                                  {
                                                                            $idUsers++;
                                                                  }

                                                      } while ($resultCheck);
                                              }

                                              $sql = "INSERT into users (uidUsers, emailUsers, pwdUsers, idUsers) VALUES (?, ?, ?, ?)";
                                              $stmt = mysqli_stmt_init($conn);
                                              if (!mysqli_stmt_prepare($stmt, $sql))
                                              {
                                                      header("Location: ../index.php?userview=".$userview."&error=sqlerror");
                                                      exit();
                                              }
                                              else
                                              {
                                                      $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                                                      mysqli_stmt_bind_param($stmt, "ssss", $username,$email, $hashedPwd, $idUsers);
                                                      mysqli_stmt_execute($stmt);
                                                      header("Location: ../user.php?userview=websites&signup=success");
                                                      exit();
                                              }
                                    }
                          }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
}
else
{
            header("Location: ../index.php?userview=websites");
            exit();
}
