// =============== navbar
const nav = document.querySelector('.nav');
const navList = document.querySelector('.nav-list');
const navItem = document.querySelectorAll('.nav-list li a');
const logo = document.querySelector('.logo');
const burger = document.querySelector('.burger');

// navbar size on scroll
window.addEventListener('scroll', sizeNav);

function sizeNav() {
	if (window.scrollY > nav.offsetHeight - 30) {
		nav.classList.add('active');
	} else {
		nav.classList.remove('active');
	}
}

//mobile navSlide
const navSlide = () => {
	burger.addEventListener('click', () => {
		console.log('clicked');
		navList.classList.toggle('slide');
		burger.classList.toggle('toggle');
	});
	//close navbar when clicking li
	for (let i = 0; i < navItem.length; i++) {
		let closeNav = navItem[i];

		closeNav.addEventListener('click', () => {
			if (navList.classList.contains('slide')) {
				navList.classList.toggle('slide');
			}
			if (burger.classList.contains('toggle')) {
				burger.classList.toggle('toggle');
			}
		});
	}
};
navSlide();
