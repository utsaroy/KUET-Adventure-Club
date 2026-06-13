<?php
require 'db_connect.php';

$is_single = isset($_GET['id']);
$event = null;
$events = null;

if ($is_single) {
  $id = (int) $_GET['id'];
  $stmt = $conn->prepare("SELECT * FROM events WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows === 1) {
    $event = $result->fetch_assoc();
  }
  $stmt->close();
  $page_title = $event ? htmlspecialchars($event['title']) . " — KUET Adventure Club" : "Event Not Found";
} else {
  $events = $conn->query("SELECT * FROM events ORDER BY start_date DESC");
  $page_title = "All Events — KUET Adventure Club";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="KUET Adventure Club Event Details.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="event.css">
  <title><?php echo $page_title; ?></title>
</head>

<body>
  <?php $is_event_page = true;
  include 'components/navbar.php'; ?>

  <?php if ($is_single): ?>
    <?php if ($event): ?>
    <header class="event-hero">
      <div class="event-hero-bg"></div>
      <div class="event-hero-overlay"></div>
      <div class="event-hero-content">
          <?php $badgeClass = ($event['status'] === 'Upcoming') ? 'event-badge--upcoming' : 'event-badge--past'; ?>
        <div class="event-hero-badge <?php echo $badgeClass; ?>"><?php echo htmlspecialchars($event['status']); ?></div>
        <h1 class="event-hero-title"><?php echo htmlspecialchars($event['title']); ?></h1>
        <div class="event-hero-meta">
          <span class="event-meta-chip">
            <img width="20" height="20" src="https://img.icons8.com/color/48/calendar--v1.png" alt="calendar" />
              <?php echo date("M j, Y", strtotime($event['start_date'])) . ' - ' . date("M j, Y", strtotime($event['end_date'])); ?>
          </span>
          <span class="event-meta-chip">
            <img width="20" height="20" src="https://img.icons8.com/color/48/marker--v1.png" alt="location" />
              <?php echo htmlspecialchars($event['location']); ?>
          </span>
        </div>
      </div>
    </header>

    <main class="event-main">
      <div class="event-layout">
        <!-- Left: Details -->
        <div class="event-details">
          <section class="event-section">
            <h2 class="event-section-title">About This Event</h2>
            <p><?php echo nl2br(htmlspecialchars($event['description'])); ?></p>
          </section>
        </div>
      </div>
    </main>
  <?php else: ?>
    <main class="event-main" style="min-height: 60vh; display: flex; align-items: center; justify-content: center;">
      <div style="text-align: center;">
        <h2 style="color: #f0f8ff; font-size: 2.5rem; margin-bottom: 20px;">Event Not Found</h2>
        <p style="color: #c0cfd6; margin-bottom: 30px;">The event you are looking for does not exist or has been removed.
        </p>
        <a href="index.php" class="btn btn-primary">Return to Homepage</a>
      </div>
    </main>
  <?php endif; ?>
  <?php else: ?>
  <!-- All Events View -->
  <main class="event-main" style="min-height: 80vh;">
    <div class="container" style="padding-top: 40px;">
      <h2 style="font-size: 2.5rem; color: #f0f8ff; text-align: center; margin-bottom: 40px;">All Events</h2>
      <div class="events-grid">
        <?php while($e = $events->fetch_assoc()): ?>
          <div class="event-card">
            <?php 
              $badgeClass = ($e['status'] === 'Upcoming') ? 'event-badge--upcoming' : 'event-badge--past';
            ?>
            <div class="event-badge <?php echo $badgeClass; ?>" style="position: absolute; top: 16px; right: 16px;">
              <?php echo htmlspecialchars($e['status']); ?>
            </div>
            <div class="event-body">
              <div class="event-meta">
                <span class="event-date"><?php echo date("M j, Y", strtotime($e['start_date'])); ?></span>
                <span class="event-location"><?php echo htmlspecialchars($e['location']); ?></span>
              </div>
              <h3><?php echo htmlspecialchars($e['title']); ?></h3>
              <p><?php echo htmlspecialchars(substr($e['description'], 0, 100)) . (strlen($e['description']) > 100 ? '...' : ''); ?></p>
              <a href="event.php?id=<?php echo $e['id']; ?>" class="event-link">View Details</a>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </main>
  <?php endif; ?>

  <?php include 'components/footer.php'; ?>

  <script src="script.js"></script>

</body>
</html>