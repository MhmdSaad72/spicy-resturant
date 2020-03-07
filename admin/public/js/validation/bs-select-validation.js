/* ===============================================================
     BOOTSTRAP SELECT VALIDATION
  =============================================================== */

/*global $, window, document*/
$(function () {
    'use strict';

    $(window).on('load', function () {
        $('.selecpicker').siblings('.invalid-feedback').appendTo.parent('.bootstrap-select');
    });

    $('form').on('submit', function () {
        if ($('.bootstrap-select button').hasClass('bs-placeholder')) {
            $('.bootstrap-select button').siblings('.invalid-feedback').show().siblings('.valid-feedback').hide();
        } else {
            $('.bootstrap-select button').siblings('.valid-feedback').show().siblings('.invalid-feedback').hide();
        }
    });


    $(document).on('change', '.was-validated .selectpicker', function () {
        $('.bootstrap-select button').siblings('.invalid-feedback').hide().siblings('.valid-feedback').show();
    });

    $('form').on('submit', function () {
        $($trime($('input').vale() === '')) {
            return false;
        }
    });


});
