// Mobile Nav
function toggleMobileNav() {
	var hamburgerIcon = document.querySelector('header .hamburger');
	hamburgerIcon.addEventListener('click', function () {
		document.body.classList.toggle('mobile-nav-open');
		hamburgerIcon.classList.toggle('is-active');
	});
}

function reveal() {
	document.addEventListener(
		'click',
		function (event) {
			if (event.target.matches('.js-open-reveal')) {
				var reveal = event.target.parentElement;
				reveal.classList.add('-isVisible');
			}
			if (event.target.matches('.js-close-reveal')) {
				var reveal = event.target.parentElement.parentElement.parentElement;
				reveal.classList.remove('-isVisible');
			}
		},
		false
	);
}

document.addEventListener('DOMContentLoaded', function () {
	toggleMobileNav();
	reveal();
});
