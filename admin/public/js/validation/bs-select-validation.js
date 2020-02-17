/* ===============================================================
     BOOTSTRAP SELECT VALIDATION
  =============================================================== */

/*global $, window, document*/
$(function () {
    'use strict';

    $(window).on('load', function () {
        $('<div class="invalid-feedback">Please select a smkoing area</div><div class="valid-feedback">Looks good!</div>').insertAfter('.bootstrap-select button');
    });

    $('.selectpicker').on('change', function () {
        $(this).closest('.dropdown').find('.filter-option-inner-inner').addClass('selected');
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


});
