function homeCarousel() {
	$('.owl-carousel').owlCarousel({
		items: 1,
		loop: true,
	});
}

document.addEventListener('DOMContentLoaded', function () {
	homeCarousel();
});
