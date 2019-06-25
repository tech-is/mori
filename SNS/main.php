<?php 
include('./core/core.php'); 
$database = new database();
$sql = 'SELECT * FROM teckis.member';
$rows = $database->select($sql);
?>
<head>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Tech-M</a>
    </nav>
    <div class="container">
        <?php print_r($rows); ?>
    </div>
</body>
</html>