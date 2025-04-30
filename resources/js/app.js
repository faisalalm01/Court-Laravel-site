// import './bootstrap';
// import 'bootstrap';
// import '../css/app.css';
// import '@fortawesome/fontawesome-free/css/all.min.css';
// import '@fortawesome/fontawesome-free/js/all.js';
// import 'laravel-datatables-vite';
// import 'datatables.net-buttons-dt/css/buttons.dataTables.css';
// import $ from 'jquery';
// import 'datatables.net-buttons/js/buttons.html5.js';
// import 'datatables.net-buttons/js/buttons.print.js';
// import { DataTable } from "simple-datatables";
// import "simple-datatables/dist/style.css";

// $(document).ready(function () {
//     $('#table-data').DataTable({
//         // dom: 'Bfrtip',
//         // buttons: [
//         //     'copy', 'csv', 'excel', 'pdf', 'print'
//         // ],
//         responsive: true,
//         language: {
//             search: `Cari`,
//             lengthMenu: "Tampilkan _MENU_ entri",
//             info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
//             paginate: {
//                 previous: `<button class="bg-red-600">previous</button>`,
//                 next: "next"
//             },
//             zeroRecords: "Tidak ada data yang ditemukan"
//         }
//     });
// });

// new DataTable('#example');

// Import library
import "./bootstrap";
import "bootstrap";
import "../css/app.css";
import "@fortawesome/fontawesome-free/css/all.min.css";
import "@fortawesome/fontawesome-free/js/all.js";

// Import Simple-DataTables
import { DataTable } from "simple-datatables";
import "simple-datatables/dist/style.css";

// Fungsi untuk handle modal
function setupModals() {
    // Buka modal
    document.querySelectorAll("[data-modal-toggle]").forEach((button) => {
        button.addEventListener("click", function () {
            const modalId = this.getAttribute("data-modal-toggle");
            const modal = document.getElementById(modalId);
            modal.classList.remove("hidden");
            modal.classList.add("flex");
        });
    });

    // Tutup modal
    document.querySelectorAll("[data-modal-hide]").forEach((button) => {
        button.addEventListener("click", function () {
            const modalId = this.getAttribute("data-modal-hide");
            const modal = document.getElementById(modalId);
            modal.classList.add("hidden");
            modal.classList.remove("flex");
        });
    });
}

// Inisialisasi DataTable dengan Tailwind
function initializeDataTable() {
    const table = document.getElementById("data-tables");

    if (table && typeof DataTable !== "undefined") {
        const dataTable = new DataTable(table, {
            paging: true,
            perPage: 10,
            perPageSelect: [1, 5, 10, 15, 20, 25],
            sortable: true,
            labels: {
                placeholder: "Cari...",
                // perPage: "{select} entri per halaman",
                noRows: "Tidak ada data yang ditemukan",
                info: "Menampilkan {start} sampai {end} dari {rows} data",
            },
            layout: {
                top: "{select}{search}",
                bottom: "{info}{pager}",
            },
        });

        // Custom styling untuk komponen DataTable
        setTimeout(() => {
            // Search input
            const searchInput = document.querySelector(".dataTable-input");
            if (searchInput) {
                searchInput.classList.add(
                    "border",
                    "border-gray-300",
                    "rounded-lg",
                    "px-3",
                    "py-2",
                    "focus:outline-none",
                    "focus:ring-2",
                    "focus:ring-blue-500",
                    "focus:border-transparent",
                    "w-full",
                    "md:w-64"
                );
                searchInput.placeholder = "Cari data...";
            }

            // Per page select
            const perPageSelect = document.querySelector(".dataTable-selector");
            if (perPageSelect) {
                perPageSelect.classList.add(
                    "border",
                    "border-gray-300",
                    "rounded-lg",
                    "px-3",
                    "py-2",
                    "focus:outline-none",
                    "focus:ring-2",
                    "focus:ring-blue-500",
                    "focus:border-transparent"
                );
            }

            // Pagination buttons
            const paginationButtons = document.querySelectorAll(
                ".dataTable-pagination a"
            );
            paginationButtons.forEach((btn) => {
                btn.classList.add(
                    "px-3",
                    "py-1",
                    "mx-1",
                    "rounded",
                    "bg-white",
                    "border",
                    "border-gray-300",
                    "hover:bg-gray-100",
                    "text-gray-700"
                );
            });

            // Active pagination button
            const activePageButton = document.querySelector(
                ".dataTable-pagination a.active"
            );
            if (activePageButton) {
                activePageButton.classList.add(
                    "bg-blue-500",
                    "text-white",
                    "border-blue-500"
                );
                activePageButton.classList.remove("bg-white", "text-gray-700");
            }

            // Container top
            const dataTableTop = document.querySelector(".dataTable-top");
            if (dataTableTop) {
                dataTableTop.classList.add(
                    "flex",
                    "flex-col",
                    "md:flex-row",
                    "items-center",
                    "justify-between",
                    "gap-4",
                    "mb-4"
                );
            }

            // Container bottom
            const dataTableBottom = document.querySelector(".dataTable-bottom");
            if (dataTableBottom) {
                dataTableBottom.classList.add(
                    "flex",
                    "flex-col",
                    "md:flex-row",
                    "items-center",
                    "justify-between",
                    "gap-4",
                    "mt-4"
                );
            }
        }, 100);
    }
}

// Inisialisasi saat DOM siap
document.addEventListener("DOMContentLoaded", function () {
    initializeDataTable();
    setupModals();
});
