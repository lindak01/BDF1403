<!DOCTYPE html>

<html>
<head>
    <title>Cooking Lao</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    <?php
        mysql_connect('localhost:8888', 'root', 'root') or
        die(mysql_error());
        mysql_select_db('BDF1403') or die(mysql_error());
    
    ?>

</body>
</html>
