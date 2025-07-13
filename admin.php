<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["is_admin"] !== true) {
    header("location: login.php");
    exit;
}
$files = glob("new/*");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Admin Dashboard</h2>
        <a href="logout.php" class="btn btn-secondary">Logout</a>
    </div>
    <h4>Uploaded Files</h4>
    <ul class="list-group">
        <?php if(empty($files)): ?>
            <li class="list-group-item">No files uploaded yet.</li>
        <?php else: ?>
            <?php foreach($files as $file): ?>
                <li class="list-group-item">
                    <a href="<?php echo $file; ?>" target="_blank"><?php echo basename($file); ?></a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>
</body>
</html>
