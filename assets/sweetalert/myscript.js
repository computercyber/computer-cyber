// hapus agenda
$('.tombol-hapus-agenda').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Yakin ingin menghapus',
		text: "Apa kamu yakin ingin menghapus?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

// hapus user
$('.tombol-hapus-user').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Yakin ingin menghapus',
		text: "Apa kamu yakin ingin menghapus?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

// hapus keanggotaan
$('.tombol-hapus-anggota').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Yakin ingin menghapus',
		text: "Apa kamu yakin ingin menghapus?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

// hapus pengumuman diterima
$('.tombol-hapus-anggota_diterima').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Yakin ingin menghapus',
		text: "Apa kamu yakin ingin menghapus?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

// reset data calon anggota
$('.tombol-reset-calon_anggota').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Yakin ingin reset data',
		text: "Apa kamu yakin ingin mereset data?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Reset data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

// reset data flashdata
// const flashData = $.('flash-data').data('flashdata');
// if (flashData) {
//     Swal.fire({
//         title: 'Data',
//         text: 'Berhasil' + flashData,
//         type: 'success'
//     });
// }

// hapus berita
$('.tombol-hapus-berita').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Yakin ingin menghapus',
		text: "Apa kamu yakin ingin menghapus?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

// hapus gallery
$('.tombol-hapus-gallery').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Yakin ingin menghapus',
		text: "Apa kamu yakin ingin menghapus?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

// hapus divisi
$('.tombol-hapus-divisi').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Yakin ingin menghapus',
		text: "Apa kamu yakin ingin menghapus?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

// hapus jabatan
$('.tombol-hapus-jabatan').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Yakin ingin menghapus',
		text: "Apa kamu yakin ingin menghapus?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

// hapus jabatan
$('.tombol-hapus-calon_anggota').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Yakin ingin menghapus',
		text: "Apa kamu yakin ingin menghapus?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

// hapus karya
// hapus jabatan
$('.tombol-hapus-karya').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Yakin ingin menghapus',
		text: "Apa kamu yakin ingin menghapus?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});



// small message 


// const Toast = Swal.mixin({
// 	toast: true,
// 	position: 'top-end',
// 	showConfirmButton: false,
// 	timer: 3000,
// 	timerProgressBar: true,
// 	onOpen: (toast) => {
// 		toast.addEventListener('mouseenter', Swal.stopTimer)
// 		toast.addEventListener('mouseleave', Swal.resumeTimer)
// 	}
// })

// Toast.fire({
// 	icon: 'success',
// 	title: 'Berhasil menghapus foto profile',
// 	type: 'success',
// });

const flashData = $('.flash-data').data('flashdata');

if (flashData == 'toast_success') {
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
		onOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	});

	Toast.fire({
		icon: 'success',
		title: "Berhasil dihapus",
		type: 'success',
	});
}

// delete anggota karya 
$('.tombol-hapus-anggota_karya').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Hapus Anggota Karya',
		text: "Apa kamu yakin ingin menghapus?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#DC3545',
		cancelButtonColor: '#6C757D',
		confirmButtonText: 'Ya, Hapus data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});
