import './bootstrap';
import $ from 'jquery';
window.$ = window.jQuery = $;

import 'bootstrap';
import DataTable from 'datatables.net-bs5';
window.DataTable = DataTable;

import Swal from 'sweetalert2';
window.Swal = Swal;

import toastr from 'toastr';
window.toastr = toastr;

// Default Toastr options
toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
};
