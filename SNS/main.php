<?php include('./core/core.php'); 
$database = new database();
$sql = 'SELECT * FROM teckis.member';
$hoge = $database->select($sql);
?>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Tech-M</a>
    <div class="container">
        <?php print_r($hoge); ?>
    </div>
</body>
</html>