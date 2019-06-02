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
        <form action="Feedback.php" method="post">
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
            Reviewer<br/>
            <Select name="reviewers">
                <?php
                $sql=("SELECT * FROM `Users` WHERE `UserRole` = 'reviewer'");
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
            Comment<br />
            <input type="text" name="comment">
            <br />
            Rating, please enter a value 1 to 5<br />
            <input type="text" name="rating">
            Date<br />
            <input type="date" name="date" value="dd-mm-yyyy">
            <br />
            <input type="submit" name="submit">
        </form>
    </article>
</section>
</body>