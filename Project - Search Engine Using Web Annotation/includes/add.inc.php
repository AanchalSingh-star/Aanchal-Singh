<?php
if (isset($_POST["insert-site"]))
{
          require 'dbh.inc.php';

          $webAnnotation = $_POST['webAnnotation'];
          $title = $_POST['title'];
          $link = $_POST['link'];
          $linkDesc = $_POST['linkDesc'];

          $sql = "SELECT link FROM websites WHERE link =? ";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql))
          {
                    header("Location: ../admin.php?error=sqlerror");
                    exit();
          }
          else
          {
                    mysqli_stmt_bind_param($stmt, "s", $link);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $resultCheck = mysqli_stmt_num_rows($stmt);
                    if ($resultCheck > 0)
                    {
                              header("Location: ../admin.php?error=linktaken&webannotation=".$webAnnotation."&title=".$title."&linkdescription=".$linkDesc);
                              exit();
                    }
                    else
                    {
                            $linkId=1;
                            $sql = "SELECT linkId FROM websites WHERE linkId =? ";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql))
                            {
                                    header("Location: ../admin.php?error=sqlerror");
                                    exit();
                            }
                            else
                            {
                                    do {
                                                mysqli_stmt_bind_param($stmt, "s", $linkId);
                                                mysqli_stmt_execute($stmt);
                                                mysqli_stmt_store_result($stmt);
                                                $resultCheck = mysqli_stmt_num_rows($stmt);
                                                if ($resultCheck > 0)
                                                {
                                                          $linkId++;
                                                }

                                    } while ($resultCheck);
                            }

                            $sql = "INSERT into websites (webAnnotation, title, link, linkDesc, linkId) VALUES (?, ?, ?, ?, ?)";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql))
                            {
                                  header("Location: ../admin.php?error=sqlerror");
                                  exit();
                            }
                            else
                            {

                                  mysqli_stmt_bind_param($stmt, "sssss", $webAnnotation, $title, $link, $linkDesc, $linkId);
                                  mysqli_stmt_execute($stmt);
                                  header("Location: ../admin.php?Insertion=success");
                                  exit();
                            }
                    }
          }

          mysqli_stmt_close($stmt);
          mysqli_close($conn);
}

elseif (isset($_POST["insert-image"]))
{
          require 'dbh.inc.php';

          $webAnnotation = $_POST['webAnnotation'];
          $title = $_POST['title'];
          $link = $_POST['link'];

          $sql = "SELECT link FROM images WHERE link =? ";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql))
          {
                  header("Location: ../admin.php?error=sqlerror");
                  exit();
          }
          else
          {
                  mysqli_stmt_bind_param($stmt, "s", $link);
                  mysqli_stmt_execute($stmt);
                  mysqli_stmt_store_result($stmt);
                  $resultCheck = mysqli_stmt_num_rows($stmt);
                  if ($resultCheck > 0)
                  {
                          header("Location: ../admin.php?error=linktaken&webannotation=".$webAnnotation."&title=".$title);
                          exit();
                  }
                  else
                  {
                          $linkId=1;
                          $sql = "SELECT linkId FROM images WHERE linkId =? ";
                          $stmt = mysqli_stmt_init($conn);
                          if (!mysqli_stmt_prepare($stmt, $sql))
                          {
                                  header("Location: ../admin.php?error=sqlerror");
                                  exit();
                          }
                          else
                          {
                                  do {
                                              mysqli_stmt_bind_param($stmt, "s", $linkId);
                                              mysqli_stmt_execute($stmt);
                                              mysqli_stmt_store_result($stmt);
                                              $resultCheck = mysqli_stmt_num_rows($stmt);
                                              if ($resultCheck > 0)
                                              {
                                                        $linkId++;
                                              }

                                  } while ($resultCheck);
                          }

                          $sql = "INSERT into images (webAnnotation, title, link, linkId) VALUES (?, ?, ?, ?)";
                          $stmt = mysqli_stmt_init($conn);
                          if (!mysqli_stmt_prepare($stmt, $sql))
                          {
                                  header("Location: ../admin.php?error=sqlerror");
                                  exit();
                          }
                          else
                          {

                                  mysqli_stmt_bind_param($stmt, "ssss", $webAnnotation, $title, $link, $linkId);
                                  mysqli_stmt_execute($stmt);
                                  header("Location: ../admin.php?Insertion=success");
                                  exit();
                          }
                  }
          }

          mysqli_stmt_close($stmt);
          mysqli_close($conn);
}
else
{
          header("Location: ../admin.php?");
          exit();
}
