// Menggunakan / Custom DataTables untuk halaman presence
let table1 = new DataTable('#table-office', {
	language: {
		search: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="rotate-90deg"><path fill="none" d="M0 0h24v24H0z"/><path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z" fill="rgba(122,122,122,1)"/></svg>`,
		searchPlaceholder: 'Find something',
	},
	responsive: true,
});

let table2 = new DataTable('#reports', {
	language: {
		search: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="rotate-90deg"><path fill="none" d="M0 0h24v24H0z"/><path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z" fill="rgba(122,122,122,1)"/></svg>`,
		searchPlaceholder: 'Find something',
	},
	dom: 'Bfrtip',
	buttons: [
        {
			extend: 'excelHtml5',
            text: 'Excel',
            exportOptions: {
                stripHtml: false
            }
        },
	],
	// buttons: [
	// 	{
	// 		extend: 'pdf',
	// 		title: 'Reports',
	// 		orientation: 'landscape',
	// 		text: '<i class="fa fa-file-pdf-o"></i> Export to PDF',
	// 		titleAttr: 'PDF',
	// 	},
	// ],
	responsive: true,
});

// Menambahkan class pada input search
const inputTableAttendanceFilter = document.querySelector('.dataTables_filter').querySelector('input');
inputTableAttendanceFilter.classList.add('input', 'input--filter');
