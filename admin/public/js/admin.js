$(function () {
    /* ==========================================
       CUSTOM FILE UPLOAD
    ============================================ */
    $(":file").filestyle({
        buttonBefore: true,
        btnClass: "btn-secondary font-weight-normal shadow-0",
    });

    $(window).on('load', function () {
        $(':file').each(function () {
            var fileVal = $(this).attr('value');
            $(this).parent('.form-group').find('.bootstrap-filestyle input').attr('placeholder', fileVal);
        });
    });
});
