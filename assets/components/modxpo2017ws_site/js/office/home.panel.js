modxpo2017ws_site.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'modxpo2017ws_site-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: false,
            hideMode: 'offsets',
            items: [{
                title: _('modxpo2017ws_site_items'),
                layout: 'anchor',
                items: [{
                    html: _('modxpo2017ws_site_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'modxpo2017ws_site-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    modxpo2017ws_site.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(modxpo2017ws_site.panel.Home, MODx.Panel);
Ext.reg('modxpo2017ws_site-panel-home', modxpo2017ws_site.panel.Home);
