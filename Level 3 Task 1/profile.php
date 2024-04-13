<?php
    require_once 'connection/connection.php';
?>
<?php
    session_start();

    $user;
    $owner = 1;
    
    if(isset($_GET['user_id'])){
        $user = $_GET['user_id'];
        $owner = 0;
    }else{
        $user = $_SESSION['user_id'];
        $owner = 1;
    }

        $sql9 = "SELECT * FROM users WHERE userid={$user} LIMIT 1";
        $result_set = mysqli_query($connection,$sql9);

        if(isset($result_set)){
            if(mysqli_num_rows($result_set) == 1){
                $result = mysqli_fetch_assoc($result_set);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-info {
            text-align: center;
        }
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .username {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .bio {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .post {
            margin-bottom: 20px;
        }
        .post-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .post-content {
            font-size: 14px;
        }
        .delete-button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 5px 10px;
            cursor: pointer;
        }
        .title{
            text-decoration: none;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-info">
        <img src="dp.png" alt="Profile Picture" class="profile-picture">
        <?php
                    echo "<div class='username'>" . $result['firstname'] . " " . $result['lastname'] . "</div>";
                    echo "<div class='bio'>" . "@" . $result['username'] . "</div>";

                    if($owner == 1){
                        echo "<a href=\"logout.php\" class='title'>" . "Log Out" . "</a>";
                    }
                    
                    }
                }
        ?>
        <h2>Posts:</h2>
        <?php
            $sql5 = "SELECT * FROM blogs WHERE userid = {$user}";
                
            if($result_set = $connection->query($sql5)){
                while($datarows = $result_set->fetch_array(MYSQLI_ASSOC)){
                    echo "<div class='post'>" .
                        "<h3 class='post-title'>" . "<a href=\"read.php?blog_id={$datarows['blogid']}\" class='title'>" . $datarows['title'] . "</a>" . "</h3>" .
                        "</div>";

                    if($owner == 1){
                        echo "<button name='' class='delete-button'>" . "Delete" . "</button>";
                    }
                }
            }
        ?>
    </div>
</div>

</body>
</html>
