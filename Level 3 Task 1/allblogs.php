<?php
    require_once 'connection/connection.php';
?>
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Blogs</title>
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
        h1 {
            text-align: center;
        }
        .blog {
            border-bottom: 1px solid #ddd;
            padding: 20px 0;
        }
        .blog h2 {
            margin-bottom: 10px;
        }
        .title{
            text-decoration: none;
            color: #555;
        }
        .blog p {
            margin: 0;
        }
        .extralinks2{
            text-decoration: none;
            color: blue;
        }
        .extralinks{
            color: #555;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>View Blogs</h1>
    <a href="addblog.php" class="extralinks2">Post a New Blog</a> <a href="profile.php" class="extralinks">My Profile</a>
    
    <?php
        $sql5 = "SELECT * FROM blogs";
                
        if($result_set = $connection->query($sql5)){
            while($datarows = $result_set->fetch_array(MYSQLI_ASSOC)){
                echo "<div class='blog'>" .
                    "<h2>" . "<a href=\"read.php?blog_id={$datarows['blogid']}\" class='title'>" . $datarows['title'] . "</a>" . "</h2>" .
                    "</div>";
            }
        }
    ?>
</div>

</body>
</html>
