<?php
// include('header.php');
include 'admin/db_connect.php';
?>

<html>
<div class="container">
    <section class="col col-lg-7">
        <h1>Profile</h1>
        <table class="table table-borderd table-condensed">
            <tr>
                <th>Username:</th>
                <td><?php echo ($_SESSION['login_name']); ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?php echo ($_SESSION['login_username']); ?></td>
            </tr>
            <tr>
                <th>Contact:</th>
                <td><?php echo ($_SESSION['login_contact']); ?></td>
            </tr>
            <tr>
                <th>Address:</th>
                <td><?php echo ($_SESSION['login_address']); ?></td>
            </tr>
            <tr>
                <th></th>
                <td><a href="index.php?page=edit_profile">Edit profile</a>
                </td>
            </tr>
        </table>
    </section>
</div>


</html>

<style>
    table {
        width: 100%;
    }

    .container {
        margin-top: 128px;
        margin-left: 50px;
    }
</style>
