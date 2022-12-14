<?php
// include('header.php');
include 'admin/db_connect.php';
?>

<html>
<div class="container">
    <section class="col col-lg-7">
        <h1>Profile</h1>
        <?php
        $sql = "SELECT * FROM users WHERE id = '{$_SESSION["login_id"]}'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>

                <img class="img-fluid" style="margin: 50px;" src="assets/img/<?php echo $row['avatar'] ?>" alt="" />

                <table class="table table-borderd table-condensed">
                    <tr>
                        <th>Username:</th>
                        <td><?php echo $row['name']; ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?php echo $row['username']; ?></td>
                    </tr>
                    <tr>
                        <th>Contact:</th>
                        <td><?php echo $row['contact']; ?></td>
                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td><?php echo $row['address']; ?></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><a href="index.php?page=edit_profile">Edit profile</a>
                        </td>
                    </tr>
                </table>

        <?php
            }
        }
        ?>
    </section>
</div>


</html>

<style>
    table {
        width: 100%;
    }

    section {
        margin: 128px 0;
    }

</style>