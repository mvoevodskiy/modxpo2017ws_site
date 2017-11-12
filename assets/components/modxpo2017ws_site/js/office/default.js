Ext.onReady(function () {
    modxpo2017ws_site.config.connector_url = OfficeConfig.actionUrl;

    var grid = new modxpo2017ws_site.panel.Home();
    grid.render('office-modxpo2017ws_site-wrapper');

    var preloader = document.getElementById('office-preloader');
    if (preloader) {
        preloader.parentNode.removeChild(preloader);
    }
});