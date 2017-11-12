var modxpo2017ws_site = function (config) {
    config = config || {};
    modxpo2017ws_site.superclass.constructor.call(this, config);
};
Ext.extend(modxpo2017ws_site, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('modxpo2017ws_site', modxpo2017ws_site);

modxpo2017ws_site = new modxpo2017ws_site();