<!--Date created: Monday 20th May 2019. Created By:Lewis Marrow. For Application:Soft256-->
<!--This page is used by an Editor or Reviewer to add feedback to a book from the  database-->
<!--This provides an initial link to the database file to add a connection to the database-->
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
            <!--Select's all Reviewers from the database and then displays them in a drop down list for the user to select their username-->
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
            <!-- On Submit the data is passed to be processed in Feedback.php-->
            <input type="submit" name="submit">
        </form>
    </article>
</section>
</body>