import './bootstrap';
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-icons/font/bootstrap-icons.css';
import '@fortawesome/fontawesome-free/css/all.min.css';
import '@fortawesome/fontawesome-free/js/all.js';
import 'laravel-datatables-vite';
// import 'datatables.net-dt/css/jquery.dataTables.css'; // Import CSS DataTables
import 'datatables.net-buttons-dt/css/buttons.dataTables.css'; // Import CSS Buttons DataTables
import $ from 'jquery';
import dt from 'datatables.net';
import dtButtons from 'datatables.net-buttons';
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
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ entri",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            paginate: {
                previous: "previous",
                next: "next"
            },
            zeroRecords: "Tidak ada data yang ditemukan"
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const sidebarTextElements = document.querySelectorAll('.sidebar-text');
    const sidebarToggle = document.getElementById('sidebarToggle');

    sidebarToggle.addEventListener('click', function () {
        // Toggle kelas sidebar untuk menyempitkan
        sidebar.classList.toggle('collapsed');

        // Toggle visibility dari teks sidebar
        sidebarTextElements.forEach(element => {
            element.classList.toggle('d-none');
        });

        // Ubah width sidebar
        if (sidebar.classList.contains('collapsed')) {
            sidebar.style.width = '70px';
        } else {
            sidebar.style.width = '280px';
        }
    });
});
