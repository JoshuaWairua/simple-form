<?php
    require_once('./config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <div>
        <?php
            if(isset($_POST['create'])){
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];

                $sql = "INSERT INTO users (firstName, lastName, email ) VALUES(?,?,?)";
                $stmtinsert = $db->prepare($sql);
                $result = $stmtinsert->execute([$firstName, $lastName, $email]);
                if($result) {
                    echo 'Successfully Submitted!';
                }else{
                    echo 'Error submitting. Try again later.';
                }
            }
        ?>
    </div>

    <div class="page-container">
        <form action="registration.php" method="post" class="sub-form">
            <label for="firstName"> First Name: </label>
            <input type="text" name="firstName" required> 
            <br>
            <label for="lastName"> Last Name: </label>
            <input type="text" name="lastName" required>
            <br>
            <label for="email"> Email: </label>
            <input type="email" name="email" required>
            <br>
            <input type="submit" name="create" value="Submit" id="sendBtn">   
        </form>
    </div>

    
</body>
</html>