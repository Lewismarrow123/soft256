<?php include_once("DBConnection.php");?>
<!Doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Exe River Publishing</title>
</head>
<body>
<h1>Get Payment</h1>
<p>Use the form below to display payments for your books</p>
<p>Please note credit will be taken from your virtual account when you pay</p>
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
    <br />
    <input type="submit" name="getPayment">
</form>
</body>
</html>