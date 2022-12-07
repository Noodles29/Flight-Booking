<?php
// include('header.php');
include 'admin/db_connect.php';
?>

<?php 
if (isset($_POST["submit"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $contact = mysqli_real_escape_string($conn, $_POST["contact"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $cpassword = mysqli_real_escape_string($conn, $_POST["cpassword"]);

    if ($password === $cpassword) {
        $sql = "UPDATE users SET name = '$name', username = '$username', address = '$address', contact = '$contact', password = '$password' WHERE id = '{$_SESSION['login_id']}'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Profile updated successfully.');</script>";
        } else {
            echo "<script>alert('Profile cannot updated successfully.');</script>";
        }
    } else {
        echo "<script>alert('Password not matched. Please try again.');</script>";
    }
}
?>

<div class="container">
    <section class="col col-lg-7">
        <h1>Edit Profile</h1><hr>
        <form action="" method="post">
            <?php
                $sql = "SELECT * FROM users WHERE id = '{$_SESSION["login_id"]}'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" id="name" value="<?php echo $row['name']?>">
            </div>
            <div class="form-group">
                <label for="username">Email:</label>
                <input type="email" name="username" class="form-control" id="username" value="<?php echo $row['username']?>">
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" name="contact" class="form-control" id="contact" value="<?php echo $row['contact']?>">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" class="form-control" id="address" value="<?php echo $row['address']?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" id="password" value="<?php echo $row['password']?>">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password:</label>
                <input type="password" name="cpassword" class="form-control" id="cpassword" value="<?php echo $row['password']?>">
            </div>
                    
            <?php
                    }
                }
            ?>
            <div class="edit-btn">
                <button type="submit" name="submit" class="edit-profile-btn">Update Profile</button>
            </div>
        </form>
</section>

<style>
    .container {
        margin-top: 128px;
        margin-left: 50px;
    }

    .form-group {
        padding: 5px 0;
    }

    label {
        font-weight: bold;
    }

    input {
        height: 40px;
        width: 300px;
        float: right;
    }

    button {
        width: 200px;
        height: 60px;
        display: block;
        margin:auto;
        background-color: #000033;
        color: white;
        border-radius: 50px;
        font-size: 18px;
        font-weight: 600;
    }

    .edit-btn {
        margin: 40px;
    }
</style>




