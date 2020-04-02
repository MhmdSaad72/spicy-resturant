/* ==============================================
    Charts Gradients
============================================== */
var ctx1 = $("canvas").get(0).getContext("2d");
var gradientTransparent = ctx1.createLinearGradient(150.000, 0.000, 150.000, 300.000);
gradientTransparent.addColorStop(0.000, 'rgba(252, 138, 6, 0.2)');
gradientTransparent.addColorStop(0.600, 'rgba(255, 255, 255, 0');
gradientTransparent.addColorStop(1.000, 'rgba(255, 255, 255, 0');

var ctx2 = $("canvas").get(0).getContext("2d");
var gradientPrimary = ctx2.createLinearGradient(0.000, 150.000, 300.000, 150.000);
gradientPrimary.addColorStop(0.050, 'rgba(251, 124, 103, 0)');
gradientPrimary.addColorStop(0.400, '#fa8f14');
gradientPrimary.addColorStop(0.500, '#fa8f14');
gradientPrimary.addColorStop(0.900, '#fa8f14');

var config = {
    // gradients
    gradientTransparent: gradientTransparent,
    gradientPrimary: gradientPrimary,
};
