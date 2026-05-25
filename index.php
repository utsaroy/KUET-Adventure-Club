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
	<link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>KUET Adventure Club</title>
</head>

<body>
	<header class="hero">
		<?php include 'components/navbar.php'; ?>

		<div class="hero-content">
			<h1 class="title">Life is Either a Daring Adventure or Nothing at All.</h1>
			<p class="subtitle">KUET Adventure Club unites students who love nature, teamwork, and challenge. From
				trekking to social expeditions, we grow resilience, confidence, and lifelong friendships.</p>
			<div class="hero-actions">
				<a href="login.html" class="btn btn-primary" id="cta-join">Join the Club →</a>
				<a href="#about" class="btn btn-outline" id="cta-learn">Learn More</a>
			</div>
		</div>
	</header>

	<section id="about" class="content-section">
		<div class="container">
			<h2 data-aos="fade-up">Our Mission</h2>
			<p data-aos="fade-up" data-aos-delay="80">Beyond the classroom, we explore the wild. KUET Adventure Club is
				dedicated to fostering a spirit of exploration among students through mountaineering, cycling, and
				community service.</p>
		</div>
	</section>

	<!--  STATS-->
	<section id="stats" class="stats-section">
		<div class="container">
			<div class="stats-grid">
				<div class="stat-item" data-aos="fade-up" data-aos-delay="0">
					<span class="stat-number" data-target="60">60</span><span class="stat-suffix">+</span>
					<span class="stat-label">Expeditions</span>
				</div>
				<div class="stat-item" data-aos="fade-up" data-aos-delay="100">
					<span class="stat-number" data-target="350">350</span><span class="stat-suffix">+</span>
					<span class="stat-label">Members</span>
				</div>
				<div class="stat-item" data-aos="fade-up" data-aos-delay="200">
					<span class="stat-number" data-target="12">12</span><span class="stat-suffix">+</span>
					<span class="stat-label">Years Active</span>
				</div>
				<div class="stat-item" data-aos="fade-up" data-aos-delay="300">
					<span class="stat-number" data-target="20">20</span><span class="stat-suffix">+</span>
					<span class="stat-label">Destinations</span>
				</div>
			</div>
		</div>
	</section>

	<section id="activities" class="cards-section">
		<div class="container">
			<h2 data-aos="fade-up">What We Do</h2>
			<p class="section-sub" data-aos="fade-up" data-aos-delay="60">Six pillars that define the KUET Adventure
				Club experience.</p>
			<div class="grid">
				<div class="card" data-aos="fade-up" data-aos-delay="0">
					<div class="card-icon">
						<img width="48" height="48" src="https://img.icons8.com/color/48/track-order.png"
							alt="trekking" />
					</div>
					<h3>Trekking</h3>
					<p>Conquering the highest peaks and densest forests across Bangladesh and beyond.</p>
				</div>
				<div class="card" data-aos="fade-up" data-aos-delay="100">
					<div class="card-icon">
						<img width="48" height="48" src="https://img.icons8.com/color/48/cycling-road--v1.png"
							alt="cycling" />
					</div>
					<h3>Cycling</h3>
					<p>Long-distance rides to test endurance and explore the scenic beauty of the countryside.</p>
				</div>
				<div class="card" data-aos="fade-up" data-aos-delay="200">
					<div class="card-icon">
						<img width="64" height="64" src="https://img.icons8.com/dusk/64/social-network.png"
							alt="social-work" />
					</div>
					<h3>Social Work</h3>
					<p>Giving back to the community through relief work and environmental awareness.</p>
				</div>
				<div class="card" data-aos="fade-up" data-aos-delay="300">
					<div class="card-icon">
						<img width="48" height="48" src="https://img.icons8.com/emoji/48/camping.png" alt="camping" />
					</div>
					<h3>Camping</h3>
					<p>Overnight expeditions under the stars, building bonds and survival skills in the wild.</p>
				</div>
				<div class="card" data-aos="fade-up" data-aos-delay="400">
					<div class="card-icon">
						<img width="48" height="48" src="https://img.icons8.com/color/48/float.png" alt="survival" />
					</div>
					<h3>Survival Skills</h3>
					<p>Workshops and training sessions to equip members with real-world outdoor skills.</p>
				</div>
				<div class="card" data-aos="fade-up" data-aos-delay="500">
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
			<h2 data-aos="fade-up">Expeditions</h2>
			<p class="section-sub" data-aos="fade-up" data-aos-delay="60">Our recent and upcoming adventures across the
				country.</p>
			<div class="events-grid">
				<!-- Upcoming -->
				<div class="event-card" data-aos="fade-up" data-aos-delay="0">
					<div class="event-cover event-cover-1">
						<span class="event-badge event-badge--upcoming">Upcoming</span>
					</div>
					<div class="event-body">
						<div class="event-meta">
							<span class="event-date">Aug 15, 2026</span>
							<span class="event-location">Sajek Valley, CHT</span>
						</div>
						<h3>Sajek Hill Trek 2026</h3>
						<p>A 3-day trek through the misty ridges of Sajek — one of Bangladesh's most breathtaking
							highlands.</p>
						<a href="event.html" class="event-link">View Details →</a>
					</div>
				</div>
				<!-- Past -->
				<div class="event-card" data-aos="fade-up" data-aos-delay="120">
					<div class="event-cover event-cover-2">
						<span class="event-badge event-badge--past">Completed</span>
					</div>
					<div class="event-body">
						<div class="event-meta">
							<span class="event-date">Jan 10, 2026</span>
							<span class="event-location">Bandarban</span>
						</div>
						<h3>Keokradong Winter Expedition</h3>
						<p>Summiting Bangladesh's highest peak in the crisp winter air with 24 members of the club.</p>
						<a href="event.html" class="event-link">View Details →</a>
					</div>
				</div>
				<!-- Past -->
				<div class="event-card" data-aos="fade-up" data-aos-delay="240">
					<div class="event-cover event-cover-3">
						<span class="event-badge event-badge--past">Completed</span>
					</div>
					<div class="event-body">
						<div class="event-meta">
							<span class="event-date">Oct 5, 2025</span>
							<span class="event-location">Sundarbans</span>
						</div>
						<h3>Sundarbans Mangrove Tour</h3>
						<p>Exploring the world's largest mangrove forest by boat — a rare encounter with nature's wild
							side.</p>
						<a href="event.html" class="event-link">View Details →</a>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!--MEMBERS-->
	<section id="members" class="members-section">
		<div class="container">
			<h2 data-aos="fade-up">Executive Panel</h2>
			<p class="section-sub" data-aos="fade-up" data-aos-delay="60">The team leading KUET Adventure Club in 2026.
			</p>
			<div class="members-grid">
				<div class="member-card" data-aos="fade-up" data-aos-delay="0">
					<div class="member-avatar member-avatar--1">
					</div>
					<div class="member-info">
						<h3>Arif Rahman</h3>
						<span class="member-role">President</span>
						<span class="member-dept">CSE, Batch '21</span>
						<div class="member-socials">
							<a href="#" aria-label="Facebook" class="social-icon">
								<img width="30" height="30" src="https://img.icons8.com/color/48/facebook-new.png"
									alt="facebook-new" />
							</a>
							<a href="#" aria-label="LinkedIn" class="social-icon">
								<img width="30" height="30" src="https://img.icons8.com/color/48/linkedin.png"
									alt="linkedin" />
							</a>
						</div>
					</div>
				</div>
				<div class="member-card" data-aos="fade-up" data-aos-delay="100">
					<div class="member-avatar member-avatar--2">
					</div>
					<div class="member-info">
						<h3>Fatema Islam</h3>
						<span class="member-role">Vice President</span>
						<span class="member-dept">EEE, Batch '21</span>
						<div class="member-socials">
							<a href="#" aria-label="Facebook" class="social-icon">
								<img width="30" height="30" src="https://img.icons8.com/color/48/facebook-new.png"
									alt="facebook-new" />
							</a>
							<a href="#" aria-label="LinkedIn" class="social-icon">

								<img width="30" height="30" src="https://img.icons8.com/color/48/linkedin.png"
									alt="linkedin" />
							</a>
						</div>
					</div>
				</div>
				<div class="member-card" data-aos="fade-up" data-aos-delay="200">
					<div class="member-avatar member-avatar--3">
					</div>
					<div class="member-info">
						<h3>Mehedi Hasan</h3>
						<span class="member-role">General Secretary</span>
						<span class="member-dept">ME, Batch '22</span>
						<div class="member-socials">
							<a href="#" aria-label="Facebook" class="social-icon">
								<img width="30" height="30" src="https://img.icons8.com/color/48/facebook-new.png"
									alt="facebook-new" />
							</a>
							<a href="#" aria-label="LinkedIn" class="social-icon">

								<img width="30" height="30" src="https://img.icons8.com/color/48/linkedin.png"
									alt="linkedin" />
							</a>
						</div>
					</div>
				</div>
				<div class="member-card" data-aos="fade-up" data-aos-delay="300">
					<div class="member-avatar member-avatar--4">
					</div>
					<div class="member-info">
						<h3>Nusrat Karim</h3>
						<span class="member-role">Treasurer</span>
						<span class="member-dept">CE, Batch '22</span>
						<div class="member-socials">
							<a href="#" aria-label="Facebook" class="social-icon">
								<img width="30" height="30" src="https://img.icons8.com/color/48/facebook-new.png"
									alt="facebook-new" />
							</a>
							<a href="#" aria-label="LinkedIn" class="social-icon">
								<img width="30" height="30" src="https://img.icons8.com/color/48/linkedin.png"
									alt="linkedin" />
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include 'components/footer.php'; ?>

	<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
	<script src="script.js"></script>
</body>

</html>