<?php
$isAdd = !$employee || !isset($employee->id);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level 2 Employee</title>
    <link rel="stylesheet" href="<?= getenv('BASE_URL') . '/public/assets/css/main.css' ?>">
</head>

<body>
    <?php include_once 'form.php' ?>
</body>

</html>