
// menu toggle
function toggleMenu() {
  const links = document.querySelector('.nav-links');
  const icon = document.querySelector('.menu-icon');
  const isOpen = links.classList.toggle('active');
  icon.textContent = isOpen ? '✕' : '☰';
}

// Close menu on mobile
document.querySelectorAll('.nav-links a').forEach(link => {
  link.addEventListener('click', () => {
    document.querySelector('.nav-links').classList.remove('active');
    document.querySelector('.menu-icon').textContent = '☰';
  });
});

// Navbar glass effect strengthens on scroll
window.addEventListener('scroll', () => {
  const nav = document.querySelector('.nav-container');
  if (window.scrollY > 40) {
    nav.style.background = 'rgba(8, 20, 26, 0.85)';
  } else {
    nav.style.background = 'rgba(11, 28, 36, 0.55)';
  }
});