<?php
    require_once 'connection/connection.php';
?>
<?php
    session_start();

    if(isset($_GET['blog_id'])){
        $blog = $_GET['blog_id'];
    }
?>
<?php
    $sql8 = "SELECT * FROM blogs WHERE blogid = {$blog} LIMIT 1";
    $result_set = mysqli_query($connection,$sql8);

    $name;

    if(isset($result_set)){
        if(mysqli_num_rows($result_set) == 1){
            $result = mysqli_fetch_assoc($result_set);

            $sql6 = "SELECT * FROM users WHERE userid = {$result['userid']} ";
            $query = mysqli_query($connection,$sql6);

            if(mysqli_num_rows($query) == 1){
                $result1 = mysqli_fetch_assoc($query);
                $name = $result1['firstname'] . " " . $result1['lastname'];
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body, input, button {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.post {
    background-color: #f0f2f5;
    padding: 20px;
    border-radius: 5px;
}

.post-title {
    font-size: 36px;
    margin-bottom: 10px;
}

.post-date {
    font-size: 14px;
    color: #777;
    margin-bottom: 20px;
}

.post-content {
    font-size: 16px;
    color: #333;
    line-height: 1.6;
}

.back-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.back-btn:hover {
    background-color: #555;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="post">
            <?php

                        echo "<h2 class='post-title'>" . $result['title'] . "</h2>" .
                            "<p class='post-date'>Posted on " . $result['postedtime'] . " by " . "<a href=\"profile.php?user_id={$result['userid']}\" class='' >" . $name . "</a>" . "</p>" .
                            "<div class='post-content'>" . "<p>" . $result['content'] . "</p>" .
                            "</div>";
                    }
                }
            ?>
            <a href="home.php" class="back-btn">Back to Homepage</a>
        </div>
    </div>
</body>
</html>
