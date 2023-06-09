// Mobile Nav
function toggleMobileNav() {
	var hamburgerIcon = document.querySelector('header .hamburger');

	hamburgerIcon.addEventListener('click', function () {
		document.body.classList.toggle('mobile-nav-open');
		hamburgerIcon.classList.toggle('is-active');
		closeAllSubnav();
	});
}

// Close All Sub-Navs
function closeAllSubnav() {
	let openSubMenus = document.querySelectorAll('.sub-menu.-isVisible');
	for (let i = 0; i < openSubMenus.length; i++) {
		openSubMenus[i].classList.remove('-isVisible');
	}
}

function addMenuChevron(subMenu) {
	let chevron = document.createElement('div');
	chevron.className = 'menu-item-chevron';
	chevron.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>';
	subMenu.parentNode.insertBefore(chevron, subMenu);
}

function addBackButton(subMenu) {
	subMenu.insertAdjacentHTML('afterbegin', '<li class="menu-item menu-item--back"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg> Back</a></li>');
}

function openSubMenu(subMenu) {
	subMenu.classList.add('-isVisible');
}

function closeSubMenu(parent) {
	let openSubMenu = parent.querySelector('.sub-menu.-isVisible');
	let subMenuBack = openSubMenu.querySelector('.menu-item--back > a');
	subMenuBack.addEventListener('click', function (e) {
		e.preventDefault();
		openSubMenu.classList.remove('-isVisible');
	});
}

function mobileNavTiers() {
	let parentMenuItems = document.querySelectorAll('.mainNav .menu-item-has-children');

	for (let i = 0; i < parentMenuItems.length; i++) {
		let parent = parentMenuItems[i];
		let subMenu = parent.querySelector('.sub-menu');

		//= Add Chevron to parent
		addMenuChevron(subMenu);

		//= Add back button to children
		addBackButton(subMenu);

		//= Toggle Sub-Menu
		let subMenuToggle = parent.querySelector('.menu-item-chevron');
		subMenuToggle.addEventListener('click', function () {
			//= Open Sub Menu
			openSubMenu(subMenu);

			//= Close Sub Menu (on click)
			closeSubMenu(parent);
		});
	}
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
	mobileNavTiers();
	toggleMobileNav();
	reveal();
	resourceDownloadLinks();
});
