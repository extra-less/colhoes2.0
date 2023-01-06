<?php 
    include'db.php';
    $username = ($_GET['user']);
    if (isset($username)) {
        $query = "SELECT token FROM discord WHERE username ='".$username."'";
        $result = mysqli_query($con,$query);

        if (mysqli_num_rows($result) != 0)
        {
            $sql2 = "SELECT discordid FROM discord WHERE username ='".$username."'";
            $result2 = mysqli_query($con,$sql2);
            $row2 = mysqli_fetch_array($result2);
            if (mysqli_num_rows($result2) != 0 && $row2["discordid"] != NULL)
            {
                echo (json_encode("discord is linked"));
            } 
            else
            {
                $row = mysqli_fetch_array($result);
                echo (json_encode($row["token"]));
            }
        }
        else
        {
          echo (json_encode("no token registered"));
        }

    } else {
        echo (json_encode("no username provided"));
    }
?>


