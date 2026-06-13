<?php
require 'db_connect.php';
$events = $conn->query("SELECT * FROM events ORDER BY start_date DESC LIMIT 3");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		content="KUET Adventure Club — Uniting students who love nature, teamwork, and challenge through trekking, cycling, and exploration.">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>KUET Adventure Club</title>
</head>

<body>
	<header class="hero">
		<?php include 'components/navbar.php'; ?>

		<div class="hero-content">
			<h1 class="title">Life is Either a Daring Adventure or Nothing at All.</h1>
			<p class="subtitle">KUET Adventure Club unites students who love nature, teamwork, and challenge. From
				trekking to social events, we grow resilience, confidence, and lifelong friendships.</p>
			<div class="hero-actions">
				<a href="register.php" class="btn btn-primary" id="cta-join">Join the Club</a>
				<a href="#about" class="btn btn-outline" id="cta-learn">Learn More</a>
			</div>
		</div>
	</header>

	<section id="about" class="content-section">
		<div class="container">
			<h2>Our Mission</h2>
			<p>Beyond the classroom, we explore the wild. KUET Adventure Club is
				dedicated to fostering a spirit of exploration among students through mountaineering, cycling, and
				community service.</p>
		</div>
	</section>



	<section id="activities" class="cards-section">
		<div class="container">
			<h2>What We Do</h2>
			<p class="section-sub">Six pillars that define the KUET Adventure
				Club experience.</p>
			<div class="grid">
				<div class="card">
					<div class="card-icon">
						<img width="48" height="48" src="https://img.icons8.com/color/48/track-order.png"
							alt="trekking" />
					</div>
					<h3>Trekking</h3>
					<p>Conquering the highest peaks and densest forests across Bangladesh and beyond.</p>
				</div>
				<div class="card">
					<div class="card-icon">
						<img width="48" height="48" src="https://img.icons8.com/color/48/cycling-road--v1.png"
							alt="cycling" />
					</div>
					<h3>Cycling</h3>
					<p>Long-distance rides to test endurance and explore the scenic beauty of the countryside.</p>
				</div>
				<div class="card">
					<div class="card-icon">
						<img width="64" height="64" src="https://img.icons8.com/dusk/64/social-network.png"
							alt="social-work" />
					</div>
					<h3>Social Work</h3>
					<p>Giving back to the community through relief work and environmental awareness.</p>
				</div>
				<div class="card">
					<div class="card-icon">
						<img width="48" height="48" src="https://img.icons8.com/emoji/48/camping.png" alt="camping" />
					</div>
					<h3>Camping</h3>
					<p>Overnight events under the stars, building bonds and survival skills in the wild.</p>
				</div>
				<div class="card">
					<div class="card-icon">
						<img width="48" height="48" src="https://img.icons8.com/color/48/float.png" alt="survival" />
					</div>
					<h3>Survival Skills</h3>
					<p>Workshops and training sessions to equip members with real-world outdoor skills.</p>
				</div>
				<div class="card">
					<div class="card-icon">
						<img width="48" height="48" src="https://img.icons8.com/3d-fluency/94/compass.png"
							alt="compass" />
					</div>
					<h3>Exploration</h3>
					<p>Discovering hidden gems, historical sites, and natural wonders across Bangladesh.</p>
				</div>
			</div>
		</div>
	</section>

	<!--EVENTS-->
	<section id="events" class="events-section">
		<div class="container">
			<h2>Events</h2>
			<p class="section-sub">Our recent and upcoming adventures across the
				country.</p>
			<div class="events-grid">
				<?php while ($event = $events->fetch_assoc()): ?>
					<div class="event-card">
						<?php
						$badgeClass = ($event['status'] === 'Upcoming') ? 'event-badge--upcoming' : 'event-badge--past';
						?>
						<div class="event-badge <?php echo $badgeClass; ?>"
							style="position: absolute; top: 16px; right: 16px;">
							<?php echo htmlspecialchars($event['status']); ?>
						</div>
						<div class="event-body">
							<div class="event-meta">
								<span
									class="event-date"><?php echo date("M j, Y", strtotime($event['start_date'])); ?></span>
								<span class="event-location"><?php echo htmlspecialchars($event['location']); ?></span>
							</div>
							<h3><?php echo htmlspecialchars($event['title']); ?></h3>
							<p><?php echo htmlspecialchars(substr($event['description'], 0, 100)) . (strlen($event['description']) > 100 ? '...' : ''); ?>
							</p>
							<a href="event.php?id=<?php echo $event['id']; ?>" class="event-link">View Details</a>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<div style="text-align: center; margin-top: 40px;">
				<a href="event.php" class="btn btn-outline" style="padding: 12px 32px; font-size: 1.1rem;">View All
					Events</a>
			</div>
		</div>
	</section>


	<!-- CONTACT -->
	<section id="contact" class="contact-section">
		<div class="container">
			<h2>Get in Touch</h2>
			<div class="contact-text">
				<p>Have questions or want to join our next event? Reach out to us!</p>
				<p><strong>Email:</strong> <a href="mailto:adventure@kuet.ac.bd"
						class="contact-link">adventure@kuet.ac.bd</a></p>
				<p><strong>Visit Us:</strong> KUET Campus, Khulna-9203, Bangladesh</p>
			</div>
		</div>
	</section>

	<?php include 'components/footer.php'; ?>

	<script src="script.js"></script>
</body>

</html>