<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome to Dashboard</h2>
    <p>User ID: <?php echo $user_id; ?></p>
    <p>Username: <?php echo $username; ?></p>
    <a href="<?php echo site_url('auth/logout'); ?>">Logout</a>
</body>
</html>
