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
    <title>My Blog</title>
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

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 18px;
        }

        .posts {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .post {
            background-color: #f0f2f5;
            padding: 20px;
            border-radius: 5px;
        }

        .post-title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .post-content {
            font-size: 16px;
            color: #333;
            margin-bottom: 20px;
        }

        .read-more {
            display: block;
            text-align: center;
            color: #333;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .read-more:hover {
            color: #555;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        .footer p {
            font-size: 14px;
            color: #777;
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
        <div class="header">
            <h1>Welcome <?php echo $_SESSION['first_name']; ?>!</h1>
            <p>Where Words Come Alive And These Are Tops!  <a class="extralinks" href="allblogs.php">All Blogs  </a> <a href="addblog.php" class="extralinks2">Post a New Blog  </a> <a href="profile.php" class="extralinks">My Profile </a></p>
        </div>
        <div class="posts">
            <?php
                $sql2 = "SELECT * FROM blogs";
                
                if($result_set = $connection->query($sql2)){
                    $i = 0;
                    while($datarows = $result_set->fetch_array(MYSQLI_ASSOC)){
                        $content = "";
                        $j = 0;
                        while($j<65){
                            $content = $content . $datarows['content'][$j];
                            $j++;
                        }
                        $content = $content . ".......";
                        if($i<4){
                            $i++;
                            echo "<div class='post'>".
                                "<h2 class='post-title'>" . $datarows['title'] ."</h2>".
                                "<p class='post-content'>" . $content . "</p>".
                                "<a href=\"read.php?blog_id={$datarows['blogid']}\" class='read-more'>Read More</a>".
                                "</div>";
                        }else{
                            break;
                        }
                    }
                }
            ?>
        </div>
        <div class="footer">
            <p>&copy; 2024 My Blog. All Rights Reserved.</p>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
