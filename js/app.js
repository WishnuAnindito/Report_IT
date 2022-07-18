// Bagian header untuk popup profile, ketika di klik
const profile = document.querySelector('.wrapper-photo-profile-header');
const popupProfile = document.querySelector('.popup--profile');
profile.addEventListener('click', function () {
	popupProfile.style.display = 'block';
});

function closePopup(target) {
	target.style.display = 'none';
}

// Menghilangkan link untuk dropdown dibagian sidebar
const linksDropdown = document.querySelectorAll('.dropdown > .page-list-menu');
linksDropdown.forEach((linkDropdown) => {
	linkDropdown.addEventListener('click', function (e) {
		e.preventDefault();

		const iconArrowDropdown = linkDropdown.querySelector('.icon-dropdown');
		iconArrowDropdown.classList.toggle('rotate');

		// Animasi untuk dropdown
		const subDropdown = this.parentElement.querySelector('.sub-dropdown');
		subDropdown.classList.toggle('open');
	});
});

// Ketika klik link di sidebar, maka akan nemanbahkan class active untuk menambah background color
const linksSidebar = document.querySelectorAll('.page-list-menu:not(.dropdown > .page-list-menu)');
linksSidebar.forEach((linkSidebar) => {
	linkSidebar.addEventListener('click', function () {
		linksSidebar.forEach((linkSidebarNonActive) => {
			linkSidebarNonActive.classList.remove('active');
		});

		this.classList.add('active');
	});
});

// Klik hamburger menu nanti akan muncul sidebar nya
const menu = document.getElementById('menu');

const sidebar = document.querySelector('.list-menu');
menu.addEventListener('click', function () {
	sidebar.classList.toggle('open');
	closeSidebar();
});

// Membuat fungsi untuk menutup sidebar
function closeSidebar() {
	const movedContent = document.querySelectorAll('.moved-list-menu');

	movedContent.forEach((move) => {
		if (!move.hasAttribute('style')) {
			if (window.innerWidth <= 380) {
				move.style.transform = `translateX(${sidebar.clientWidth}px)`;
			} else {
				move.style.marginLeft = `${sidebar.clientWidth}px`;
			}
			document.body.classList.add('overflow-x-hidden');
		} else {
			move.removeAttribute('style');
			sidebar.classList.remove('open');
			document.body.removeAttribute('class');
		}
	});
}

// History kembali ke halaman sebelumnya
const backPage = document.querySelector('.back-page');
if (backPage != null) {
	backPage.addEventListener('click', function () {
		window.history.back();
	});
}

// Ambil tanggal, bulan, tahun, dan jam sekarang

const dateNow = document.querySelector('.working-hours--date-now');
if (dateNow != null) {
	setInterval(() => {
		const date = new Date().getDate();
		const month = new Date().getMonth();

		let monthNow = '';
		switch (month) {
			case 0:
				monthNow += 'January';
				break;
			case 1:
				monthNow += 'February';
				break;
			case 2:
				monthNow += 'March';
				break;
			case 3:
				monthNow += 'April';
				break;
			case 4:
				monthNow += 'May';
				break;
			case 5:
				monthNow += 'June';
				break;
			case 6:
				monthNow += 'July';
				break;
			case 7:
				monthNow += 'August';
				break;
			case 8:
				monthNow += 'September';
				break;
			case 9:
				monthNow += 'October';
				break;
			case 10:
				monthNow += 'November';
				break;
			case 11:
				monthNow += 'December';
				break;
			default:
				monthNow += 'Month not found!';
				break;
		}

		const year = new Date().getFullYear();
		const hours = new Date().getHours();
		const minutes = new Date().getMinutes();
		const seconds = new Date().getSeconds();

		dateNow.textContent = `${date} ${monthNow} ${year} - ${hours}:${minutes}:${seconds}`;
	}, 1000);
}

// Disabled link pagination yang punya class disable
const disabledPaginationLink = document.querySelector('.prev-next.disabled');
if (disabledPaginationLink != null) {
	disabledPaginationLink.addEventListener('click', function (e) {
		e.preventDefault();
	});
}

// Bagian maps, ketika di klik maka akan memperbesar
const maps = document.querySelector('.maps');
const popupMaps = document.querySelector('.popup--maps');
if (maps != null) {
	maps.addEventListener('click', function () {
		popupMaps.classList.add('show');
	});
}

function closeMaps() {
	popupMaps.classList.remove('show');
}

// Ketika ada elemen html yang punya class popup--profile, maka akan menjalankan fungsi diatas, yaitu. Menghilangkan popup profile header
window.addEventListener('click', function ({ target }) {
	if (target.classList.contains('popup--profile')) {
		closePopup(popupProfile);
	}

	if (target.classList.contains('show')) {
		closeMaps();
	}
});

// Event ketika tombol Escape di tekan
window.addEventListener('keyup', function ({ key }) {
	if (key === 'Escape') {
		if (popupProfile.hasAttribute('style')) {
			closePopup(popupProfile);
		}

		if (sidebar.classList.contains('open')) {
			closeSidebar();
		}

		if (popupMaps.classList.contains('show')) {
			closeMaps();
		}
	}
});
