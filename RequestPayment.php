<?php include_once("DBConnection.php");?>
<!Doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Exe River Publishing</title>
</head>
<body>
<h1>Request Payment</h1>
<p>Use the form below to request Payment for a book</p>
<hr>
<section>
    <form action="Payment.php" method="post">
        Book<br />
        <Select name="books">
            <?php
            $sql=("SELECT * FROM `Books`");
            $result=$conn->query($sql);
            if($result->num_rows>0) {
                while ($row = $result->fetch_assoc()) {
                    $book=$row['Book'];
                    echo "<option value='$book'>" . $row['Book'] . "</option>";

                }
            }
            ?>
        </Select>
        </br>
        Author<br/>
        <Select name="author">
            <?php
            $sql=("SELECT * FROM `Users` WHERE `UserRole` = 'author'");
            $result=$conn->query($sql);
            if($result->num_rows>0) {
                while ($row = $result->fetch_assoc()) {
                    $uname=$row['Username'];
                    echo "<option value='$role'>" . $row['Username'] . "</option>";
                }
            }
            ?>
        </Select>
        </br>
        Payment Amount<br />
        <input type="text" name="Amount">
        <br />
        <br />
        <input type="submit" name="payment">
    </form>
</body>
</html>