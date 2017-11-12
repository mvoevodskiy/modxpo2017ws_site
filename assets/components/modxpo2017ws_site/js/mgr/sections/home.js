modxpo2017ws_site.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'modxpo2017ws_site-panel-home',
            renderTo: 'modxpo2017ws_site-panel-home-div'
        }]
    });
    modxpo2017ws_site.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(modxpo2017ws_site.page.Home, MODx.Component);
Ext.reg('modxpo2017ws_site-page-home', modxpo2017ws_site.page.Home);