<?php
require_once "classes/User.php";
 $user = new User;
 $users = $user->get_users();
 var_dump($users);



?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <?php
        foreach($users as $use){
            
        ?>
        <tr>
        <?php echo "<td>".$use['jobSeeker_firstName']."</td>";?>
       <?php echo "<td>".$use['jobSeeker_lastName']."</td>";?>
        <?php echo "<td>".$use['jobSeeker_email']."</td>";?>
        <?php echo "<td>".$use['jobSeeker_phone']."</td>";?>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
