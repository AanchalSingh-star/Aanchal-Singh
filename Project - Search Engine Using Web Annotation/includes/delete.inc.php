<?php
if (isset($_POST["delete-site"])) {
        require 'dbh.inc.php';

        $linkId = $_GET['id'];

        $sql = "SELECT linkId FROM websites WHERE linkId =? ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
                header("Location: ../adminview.php?viewlink=websites&error=sqlerror");
                exit();
        }
        else
        {
                mysqli_stmt_bind_param($stmt, "s", $linkId);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0)
                {
                          $sql = "DELETE FROM websites WHERE linkId = ?";
                          $stmt = mysqli_stmt_init($conn);
                          if (!mysqli_stmt_prepare($stmt, $sql))
                          {
                                  header("Location: ../adminview.php?viewlink=websites&error=sqlerror");
                                  exit();
                          }
                          else
                          {

                                  mysqli_stmt_bind_param($stmt, "s", $linkId);
                                  mysqli_stmt_execute($stmt);
                                  header("Location: ../adminview.php?viewlink=websites&Deletion=success");
                                  exit();
                          }
                }
                else
                {
                          header("Location: ../adminview.php?viewlink=websites&error=linkidnotfound");
                          exit();
                }
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
}
elseif (isset($_POST["delete-image"]))
{
        require 'dbh.inc.php';

        $linkId = $_GET['id'];

        $sql = "SELECT linkId FROM images WHERE linkId =? ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
                header("Location: ../adminview.php?viewlink=images&error=sqlerror");
                exit();
        }
        else
        {
                mysqli_stmt_bind_param($stmt, "s", $linkId);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0)
                {
                          $sql = "DELETE FROM images WHERE linkId = ?";
                          $stmt = mysqli_stmt_init($conn);
                          if (!mysqli_stmt_prepare($stmt, $sql))
                          {
                                  header("Location: ../adminview.php?viewlink=images&error=sqlerror");
                                  exit();
                          }
                          else
                          {

                                  mysqli_stmt_bind_param($stmt, "s", $linkId);
                                  mysqli_stmt_execute($stmt);
                                  header("Location: ../adminview.php?viewlink=images&Deletion=success");
                                  exit();
                          }
                }
                else
                {
                          header("Location: ../adminview.php?viewlink=images&error=linkidnotfound");
                          exit();
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
