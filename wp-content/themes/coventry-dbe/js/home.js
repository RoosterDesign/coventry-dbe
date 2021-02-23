function homeCarousel() {
	$('.owl-carousel').owlCarousel({
		items: 1,
		loop: true,
		itemElement: 'article',
		autoplay: true,
		dots: true,
	});
}

document.addEventListener('DOMContentLoaded', function () {
	homeCarousel();
});
