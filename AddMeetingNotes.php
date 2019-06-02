<!Doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Exe River Publishing</title>
</head>
<body>
<h1>Add Meeting Notes</h1>
<p>Use the form below to add a meeting to the database</p>
<hr>
<section>
    <article id="Meeting Notes">
        <form action="MeetingNotes.php" method="post">
            Meeting Name<br />
            <input type="text" name="meetingname">
            <br />
            Author <br />
            <input type="text" name="author">
            <br />
            Editor/Reviewer <br />
            <input type="text" name="mentor">
            <br />
            Transcript<br />
            <input type="text" name="transcript">
            <br />
            Date of submission<br />
            <input type="date" name="date" value="dd-mm-yyyy">
            <br />
            <input type="submit" name="submit">
        </form>
    </article>
</section>
</body>
</html>