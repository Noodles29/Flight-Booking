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
    $avatar;

    if ($password === $cpassword) {
        if (!empty($_FILES['avatar']['tmp_name'])) {
            $img_name = $_FILES['avatar']['name'];
            $tmp_name = $_FILES['avatar']['tmp_name'];
            $error = $_FILES['avatar']['error'];

            if ($error === 0) {
                $img_ex = explode('.', $img_name);
                $img_ex_to_lc = strtolower(end($img_ex));

                $allowed_exs = array('jpg', 'jpeg', 'png');
                if (in_array($img_ex_to_lc, $allowed_exs)) {
                    $new_img_name = uniqid($name, true) . '.' . $img_ex_to_lc;
                    $img_upload_path = './assets/img/' . $new_img_name;
                    if (move_uploaded_file($tmp_name, $img_upload_path)) {
                        $avatar = $new_img_name;
                    }

                    // $avatar = mysqli_real_escape_string($conn, $_POST["avatar"]);
                }
            }
            $sql = "UPDATE users SET name = '$name', username = '$username', address = '$address', contact = '$contact', password = '$password', avatar = '$avatar' WHERE id = '{$_SESSION['login_id']}'";
        } else {
            $sql = "UPDATE users SET name = '$name', username = '$username', address = '$address', contact = '$contact', password = '$password' WHERE id = '{$_SESSION['login_id']}'";

        }
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


// $isImgMoved = false;

// if ($_FILES['avatar']['tmp_nane']) {
//     $temp_file = $_FILES['avatar']['tmp_nane'];
//     $ds = DIRECTORY_SEPARATOR;
//     $avatar_name = $username."jpg";

//     $path = "upload".$ds.$avatar_name;

//     if (move_uploaded_file($temp_file, $path)) {
//         $isImgMoved = true;
//     }
// }

// if (mysqli_real_escape_string($conn, $_POST["avatar"])) {
//     $avatar = 'default_avt.jpg';
// } else {
//     $avatar = mysqli_real_escape_string($conn, $_POST["avatar"]);
// }

?>


<div class="container">
    <section class="col col-lg-7">
        <h1>Edit Profile</h1>
        <hr>
        <form action="" method="post" id="edit-profile" enctype="multipart/form-data">
            <?php
            $sql = "SELECT * FROM users WHERE id = '{$_SESSION["login_id"]}'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>

                    <img class="img-fluid" style="margin: 40px;" src="assets/img/<?php echo $row['avatar'] ?>" alt="" />

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" id="name" value="<?php echo $row['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Email:</label>
                        <input type="email" name="username" class="form-control" id="username" value="<?php echo $row['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact:</label>
                        <input type="text" name="contact" class="form-control" id="contact" value="<?php echo $row['contact'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" class="form-control" id="address" value="<?php echo $row['address'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control" id="password" value="<?php echo $row['password'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password:</label>
                        <input type="password" name="cpassword" class="form-control" id="cpassword" value="<?php echo $row['password'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="avatar">Profile Picture:</label>
                        <input type="file" name="avatar" class="form-control" id="avatar">
                    </div>

                    <div class="edit-btn">
                        <button type="submit" name="submit" class="edit-profile-btn">Update Profile</button>
                    </div>
            <?php
                }
            }
            ?>
        </form>
    </section>
</div>

<style>
    section {
        margin: 128px 0;
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
        margin: auto;
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

<!-- <script>
    $('#edit-profile').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=edit_profile',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
</script> -->