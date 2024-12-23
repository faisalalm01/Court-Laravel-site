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

document.addEventListener('DOMContentLoaded', () => {
    const hamburgerButton = document.getElementById('hamburgerButton');
    const sidebar = document.getElementById('sidebar');

    // Toggle Sidebar
    hamburgerButton.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full'); // Toggle visibility
        hamburgerButton.classList.toggle('active'); // Toggle active class
    });

    // Toggle Dropdowns
    document.querySelectorAll('.dropdown-btn').forEach(button => {
        button.addEventListener('click', () => {
            const dropdown = button.nextElementSibling;
            dropdown.classList.toggle('hidden'); // Show/Hide dropdown
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const hamburgerButton = document.getElementById('hamburgerButton');
    const sidebar = document.getElementById('sidebar');

    // Pastikan elemen ditemukan
    if (hamburgerButton && sidebar) {
        hamburgerButton.addEventListener('click', () => {
            // Toggle visibility
            sidebar.classList.toggle('-translate-x-full'); 
            // Toggle active class untuk animasi tombol
            hamburgerButton.classList.toggle('active'); 
        });
    } else {
        console.error('Hamburger button or sidebar not found in DOM');
    }
});
