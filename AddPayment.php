<?php include_once("DBConnection.php");?>
<!Doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Exe River Publishing</title>
</head>
<body>
<h1>Add Payment</h1>
<p>Use the form below to add a payment for a book</p>
<p>Please note credit will be taken from your virtual account</p>
<hr>
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
    <input type="submit" name="AddPayment">
</form>
</body>
</html>