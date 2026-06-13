<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit;
}
require 'db_connect.php';

$message = '';

// Delete
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM events WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $message = "Event deleted successfully.";
    }
    $stmt->close();
}

// Add
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
    $title = $_POST['title'];
    $location = $_POST['location'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];
    $description = $_POST['description'];
    $stmt = $conn->prepare("INSERT INTO events (title, description, location, start_date, end_date, status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $title, $description, $location, $start_date, $end_date, $status);
    if ($stmt->execute()) {
        $message = "Event added successfully.";
    } else {
        $message = "Error adding event.";
    }
    $stmt->close();
}

// Edit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id = (int)$_POST['id'];
    $title = $_POST['title'];
    $location = $_POST['location'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];
    $description = $_POST['description'];
    $stmt = $conn->prepare("UPDATE events SET title = ?, description = ?, location = ?, start_date = ?, end_date = ?, status = ? WHERE id = ?");
    $stmt->bind_param("ssssssi", $title, $description, $location, $start_date, $end_date, $status, $id);
    if ($stmt->execute()) {
        $message = "Event updated successfully.";
    } else {
        $message = "Error updating event.";
    }
    $stmt->close();
}

$edit_event = null;
if (isset($_GET['edit_id'])) {
    $id = (int)$_GET['edit_id'];
    $stmt = $conn->prepare("SELECT * FROM events WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $edit_event = $result->fetch_assoc();
    }
    $stmt->close();
}

$events = $conn->query("SELECT * FROM events ORDER BY start_date DESC");
$members = $conn->query("SELECT * FROM members ORDER BY registration_date DESC");
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: #fff;
        }

        th,
        td {
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 12px;
            text-align: left;
        }

        th {
            background: rgba(255, 255, 255, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #c0cfd6;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(0, 0, 0, 0.2);
            color: white;
        }
    </style>
</head>

<body>


    <div class="dashboard-container">
        <div class="header-action">
            <h2 style="font-size: 2rem; color: #f0f8ff;">Admin Dashboard</h2>
            <a href="logout.php" class="btn btn-outline" style="padding: 10px 20px;">Logout</a>
        </div>

        <?php if ($message): ?>
            <div
                style="background: rgba(74, 222, 128, 0.2); color: #4ade80; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <div style="margin-bottom: 40px;">
            <h3><?php echo $edit_event ? "Edit Event" : "Add New Event"; ?></h3>
            <form method="POST"
                style="margin-top: 20px; display: flex; flex-direction: column; gap: 16px; max-width: 600px;">
                <input type="hidden" name="action" value="<?php echo $edit_event ? 'edit' : 'add'; ?>">
                <?php if ($edit_event): ?>
                    <input type="hidden" name="id" value="<?php echo $edit_event['id']; ?>">
                <?php endif; ?>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-input" value="<?php echo $edit_event ? htmlspecialchars($edit_event['title']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" class="form-input" value="<?php echo $edit_event ? htmlspecialchars($edit_event['location']) : ''; ?>" required>
                </div>
                <div style="display: flex; gap: 16px;">
                    <div class="form-group" style="flex: 1;">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-input" value="<?php echo $edit_event ? $edit_event['start_date'] : ''; ?>" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-input" value="<?php echo $edit_event ? $edit_event['end_date'] : ''; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-input" required>
                        <option value="Upcoming" <?php echo ($edit_event && $edit_event['status'] == 'Upcoming') ? 'selected' : ''; ?>>Upcoming</option>
                        <option value="Completed" <?php echo ($edit_event && $edit_event['status'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-input" rows="4" required><?php echo $edit_event ? htmlspecialchars($edit_event['description']) : ''; ?></textarea>
                </div>
                <div style="display: flex; gap: 10px;">
                    <button type="submit" class="btn btn-primary"><?php echo $edit_event ? "Update Event" : "Add Event"; ?></button>
                    <?php if ($edit_event): ?>
                        <a href="admin_dashboard.php" class="btn btn-outline">Cancel</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <h3>Existing Events</h3>
        <table>
            <tr>
                <th>Title</th>
                <th>Location</th>
                <th>Dates</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $events->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['location']); ?></td>
                    <td><?php echo $row['start_date'] . ' to ' . $row['end_date']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <a href="admin_dashboard.php?edit_id=<?php echo $row['id']; ?>" class="btn btn-outline"
                            style="padding: 5px 10px; font-size: 0.8rem; color: #3b82f6; border-color: #3b82f6; margin-right: 5px;">Edit</a>
                        <a href="admin_dashboard.php?delete=<?php echo $row['id']; ?>" class="btn btn-outline"
                            style="padding: 5px 10px; font-size: 0.8rem; color: #ef4444; border-color: #ef4444;"
                            onclick="return confirm('Are you sure you want to delete this event?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>

        <h3 style="margin-top: 60px;">Registered Members</h3>
        <table>
            <tr>
                <th>Name</th>
                <th>Student ID</th>
                <th>Department</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Registration Date</th>
            </tr>
            <?php while ($member = $members->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($member['name']); ?></td>
                    <td><?php echo htmlspecialchars($member['student_id']); ?></td>
                    <td><?php echo htmlspecialchars($member['department']); ?></td>
                    <td><?php echo htmlspecialchars($member['email']); ?></td>
                    <td><?php echo htmlspecialchars($member['phone']); ?></td>
                    <td><?php echo date("M j, Y g:i A", strtotime($member['registration_date'])); ?></td>
                </tr>
            <?php endwhile; ?>
            <?php if ($members->num_rows === 0): ?>
                <tr>
                    <td colspan="6" style="text-align: center; color: rgba(255, 255, 255, 0.5);">No members registered yet.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    <?php include 'components/footer.php'; ?>
</body>

</html>