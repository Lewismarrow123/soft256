<?php include_once("DBConnection.php");?>
<!Doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Exe River Publishing</title>
</head>
<body>
<h1>Add Feedback</h1>
<p>Use the form below to add a feedback to the Book</p>
<hr>
<section>
    <article id="Feedback">
        <form action="feedback.php" method="post">
            Book<br />
            <?php
            $sql=("SELECT * FROM `Books`");
            if($conn->query($sql) === TRUE) {
                    echo '<option>' . $type['Book'] . '</option>';
            }
            else{echo"do nothing";}
            ?>
            <input type="option" name="Book">
            <br />
            Author<br />
            <input type="text" name="Author">
            <br />
            Reviewer<br />
            <input type="text" name="reviewer">
            <br />
            Comment<br />
            <input type="text" name="comment">
            <br />
            Rating, please enter a value 1 to 5<br />
            <input type="text" name="rating">
            <br />
            <input type="submit" name="submit">
        </form>
    </article>
</section>
</body>