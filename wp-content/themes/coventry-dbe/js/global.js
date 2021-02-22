// Mobile Nav
function toggleMobileNav() {
	var hamburgerIcon = document.querySelector('header .hamburger');
	hamburgerIcon.addEventListener('click', function () {
    document.body.classList.toggle('mobile-nav-open');		
    hamburgerIcon.classList.toggle('is-active');
	});
};

document.addEventListener('DOMContentLoaded', function () {
	toggleMobileNav();
});
