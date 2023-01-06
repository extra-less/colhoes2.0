<?php 
    include'db.php';
    $username = ($_GET['user']);
    $type = ($_GET['type']);

    function random_str(
        int $length = 64,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }
    

    if (isset($username)) {
            if (isset($type)) {
                $token = random_str(16);
                $sqltkn = "SELECT * FROM discord WHERE token = '". $token ."'";
                $run = mysqli_query($con,$sqltkn);

                if (mysqli_num_rows($run) != 0){
                    $token = random_str(16);
                }

                $sqlreg = "INSERT INTO discord (username, token, type) VALUES ('". $username ."', '". $token ."', ". $type . ")";
                $register = mysqli_query($con,$sqlreg);

                $sqlgettkn = "SELECT token FROM discord WHERE username = '". $username ."'";;
                $result2 = mysqli_query($con,$sqlgettkn);
                $rower = mysqli_fetch_array($result2);
                echo (json_encode($rower["token"]));
            } else {
                echo (json_encode("no type provided"));
            }
    } else {
        echo (json_encode("no username provided"));
    }
?>


