$(function () {
    /* ==========================================
       CUSTOM FILE UPLOAD
    ============================================ */
    $(":file").filestyle({
        buttonBefore: true,
        btnClass: "btn-primary",
        placeholder: "No file chosen"
    });

    $('.bootstrap-filestyle .form-control:disabled, .bootstrap-filestyle .form-control[readonly]').css({
        'border': 'none',
        'background': '#f5f5f5'
    });
});
