import $ from "jquery";

require('bootstrap-datepicker/js/bootstrap-datepicker')
require('bootstrap-datepicker/js/locales/bootstrap-datepicker.fr')
require('bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')

$(document).ready(function () {
    $('.js-datepicker').datepicker({
        language: 'fr',
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayBtn: "linked",
        todayHighlight: true,
        orientation: "bottom",
    });
});