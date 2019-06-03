<?php
/**
 * Created by PhpStorm.
 * User: lewis
 * Date: 2019-06-02
 * Time: 19:40
 */
//Includes a connection to the database
include_once("DBConnection.php");?>
<!Doctype HTML>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Exe River Publishing</title>
        </head>
        <body>
        <h1>Delete User</h1>
        <p>Use the form below to delete a user from the database</p>
        <hr>
        <form action="Administrator.php" method="post">
            User<br />
            <Select name="Users">
                <!--Gets users all users from the database and display's the username in the dropdown list-->
                <?php
                $sql=("SELECT * FROM `Users`");
                $result=$conn->query($sql);
                if($result->num_rows>0) {
                    while ($row = $result->fetch_assoc()) {
                        $user=$row['Username'];
                        echo "<option value='$user'>" . $row['Username'] . "</option>";
                    }
                }
                ?>
            </Select>
            <br />
            <input type="submit" name="Delete">
        </form>
        </body>
</html>
