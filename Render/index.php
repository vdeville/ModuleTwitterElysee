<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="styleModuleTwitter.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
    <div class="" id="test">
        <?php include('Render.php'); ?>
        <script>
            $("#test").load("index.php #test");

            var $scores = $("#test");
            setInterval(function () {
                $scores.load("index.php #test");
                console.log("Refresh Ok");
            }, 30000);
        </script>
    </div>
</body>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/image.js"></script>
</html>
