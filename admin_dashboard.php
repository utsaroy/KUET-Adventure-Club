<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard — KUET Adventure Club</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            padding-top: 0;
        }

        .dashboard-container {
            width: min(1000px, 92vw);
            margin: 60px auto;
            background: rgba(255, 255, 255, 0.05);
            padding: 40px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            min-height: 50vh;
        }

        .header-action {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php $is_event_page = true;
    include 'components/navbar.php'; ?>

    <div class="dashboard-container">
        <div class="header-action">
            <h2 style="font-size: 2rem; color: #f0f8ff;">Admin Dashboard</h2>
            <a href="logout.php" class="btn btn-outline" style="padding: 10px 20px;">Logout</a>
        </div>
        <p style="color: #c0cfd6; font-size: 1.1rem; margin-bottom: 40px;">Welcome to the secure Admin Portal. Select an
            option below to manage the site content.</p>
        <div class="grid" style="grid-template-columns: repeat(2, 1fr);">
            <div class="card" style="text-align: center;">
                <h3>Manage Expeditions</h3>
                <p>Create new events or remove old ones.</p>
                <a href="admin_events.php" class="btn btn-primary" style="margin-top: 20px;">Go to Expeditions</a>
            </div>
            <div class="card" style="text-align: center;">
                <h3>Executive Panel</h3>
                <p>Update team members shown on homepage.</p>
                <a href="admin_members.php" class="btn btn-primary" style="margin-top: 20px;">Go to Panel</a>
            </div>
        </div>
    </div>

    <?php include 'components/footer.php'; ?>
</body>

</html>