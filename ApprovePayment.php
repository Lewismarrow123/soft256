<!--Date created: Sunday 2nd June 2019. Created By:Lewis Marrow. For Application:Soft256-->
<!--This page is used by an Administrator to approve a add a payment-->
<?php include_once("DBConnection.php");?>
<!Doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Exe River Publishing</title>
</head>
<body>
<h1>Approve Payment</h1>
<p>Use the form below to add Approve payment for a book</p>
<hr>
<form action="Payment.php" method="post">
    Book<br />
    <Select name="books">
        <!--Select's all Books from the database and then displays them in a drop down list for the user to select a book of there choice-->
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
    <!--Select's all Author from the database and then displays them in a drop down list for the user to select a book of there choice-->
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
    <!--Enter the payment amount to approve-->
    Payment Amount<br />
    <input type="text" name="Amount">
    <br />
    <br />
    <!--Passes the data to the payment class-->
    <input type="submit" name="ApprovePayment">
</form>
</body>
</html>