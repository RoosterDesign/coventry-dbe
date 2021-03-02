function homeCarousel() {
	$('.owl-carousel').owlCarousel({
		items: 1,
		loop: true,
		itemElement: 'article',
		autoplay: true,
		dots: true,
		autoplayTimeout: 70000,
	});
}

document.addEventListener('DOMContentLoaded', function () {
	homeCarousel();
});
