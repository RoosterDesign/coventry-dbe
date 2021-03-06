function homeCarousel() {
	$('.owl-carousel').owlCarousel({
		items: 1,
		loop: true,
		itemElement: 'article',
		autoplay: true,
		dots: true,
		autoplayTimeout: 7000,
	});
}

function modal() {
	var modal = document.querySelector('.modalWrap');
	if (modal) {
		/* Open */
		var modalOpen = document.querySelector('.js-open-modal');
		modalOpen.addEventListener('click', function (e) {
			e.preventDefault();
			modal.classList.add('-open');
		});

		/* Close */
		var modalClose = document.querySelector('.js-close-modal');
		modalClose.addEventListener('click', function () {
			modal.classList.remove('-open');
		});
	}
}

document.addEventListener('DOMContentLoaded', function () {
	homeCarousel();
	modal();
});
