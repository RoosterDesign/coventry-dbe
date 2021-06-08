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
			if (event.target.classList.contains('js-open-reveal')) {
				var reveal = event.target.parentElement;
				reveal.classList.add('-isVisible');
			}
			if (event.target.classList.contains('js-close-reveal')) {
				var reveal = event.target.parentElement.parentElement.parentElement;
				reveal.classList.remove('-isVisible');
			}
		},
		false
	);
}

// Add target blank to resources download buttons
function resourceDownloadLinks() {
	var downloadLinks = document.querySelectorAll('.wpdm-download-link');
	for (var i = 0; i < downloadLinks.length; i++) {
		const link = downloadLinks[i];
		link.setAttribute('target', '_blank');
	}
}


document.addEventListener('DOMContentLoaded', function () {
	toggleMobileNav();
	reveal();
	resourceDownloadLinks();
});