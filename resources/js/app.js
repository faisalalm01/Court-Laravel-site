import './bootstrap';
import 'bootstrap';
import '../css/app.css';
import '@fortawesome/fontawesome-free/css/all.min.css';
import '@fortawesome/fontawesome-free/js/all.js';
import 'laravel-datatables-vite';
import 'datatables.net-buttons-dt/css/buttons.dataTables.css';
import $ from 'jquery';
import 'datatables.net-buttons/js/buttons.html5.js';
import 'datatables.net-buttons/js/buttons.print.js';

$(document).ready(function () {
    $('#table-data').DataTable({
        // dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ],
        responsive: true,
        language: {
            search: `Cari`,
            lengthMenu: "Tampilkan _MENU_ entri",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            paginate: {
                previous: `<button class="bg-red-600">previous</button>`,
                next: "next"
            },
            zeroRecords: "Tidak ada data yang ditemukan"
        }
    });
});

new DataTable('#example');

if (document.getElementById("data-tables") && typeof simpleDatatables.DataTable !== 'undefined') {
    const dataTable = new simpleDatatables.DataTable("#data-tables", {
        paging: true,
        perPage: 5,
        perPageSelect: [5, 10, 15, 20, 25],
        sortable: true,
    });
}

