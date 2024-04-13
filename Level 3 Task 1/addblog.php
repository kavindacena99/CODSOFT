<?php
    require_once 'connection/connection.php';
?>
<?php
    session_start();

    if(isset($_POST['add'])){
        $time = date("Y-m-d");
        $title = mysqli_real_escape_string($connection,$_POST['title']);
        $content = mysqli_real_escape_string($connection,$_POST['content']); 

        $user = $_SESSION['user_id'];

        $sql3 = "INSERT INTO blogs (userid,title,postedtime,content) VALUES($user,'{$title}','{$time}','{$content}')";
        $result3 = mysqli_query($connection,$sql3);

        if(isset($result3)){
            header('Location: home.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Blog</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body, input, button, textarea {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

h1 {
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    resize: vertical;
}

button.btn {
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button.btn:hover {
    background-color: #555;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Create New Blog</h1>
        <form action="addblog.php" method="POST" class="blog-form">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content" rows="10" required></textarea>
            </div>
            <button type="submit" name="add" class="btn">Create Blog</button>
        </form>
    </div>
</body>
</html>
