<nav class="nav" <?php if(isset($is_event_page)) echo 'style="position: sticky; top: 0; z-index: 100; padding: 10px 20px; background: rgba(11, 28, 36, 0.95);"'; ?>>
    <div class="nav-container">
        <a href="index.php" class="nav-brand">
            <img src="images/logo.jpg" alt="KUET Adventure Club logo" class="logo">
            <div class="nav-title">
                <span class="nav-title-main">KUET Adventure Club</span>
            </div>
        </a>
        <div class="nav-links">
            <a href="index.php#about">About</a>
            <a href="index.php#activities">Activities</a>
            <a href="index.php#events">Events</a>
            <a href="index.php#members">Members</a>
            <a href="#contact">Contact</a>
        </div>
        <div class="menu-icon" onclick="toggleMenu()">☰</div>
    </div>
</nav>
