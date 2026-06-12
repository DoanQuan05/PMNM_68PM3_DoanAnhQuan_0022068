<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        body { margin: 0; font-family: sans-serif; }
        .content { margin-top: 80px; margin-bottom: 80px; padding: 20px; }
    </style>
</head>
<body>
    <?php require '../app/views/layout/partial/header.php'; ?>
    <div class="content">
        <?php require '../app/views/' . $viewname . '.php'; ?>
    </div>
    <?php require '../app/views/layout/partial/footer.php'; ?>
</body>
</html>
