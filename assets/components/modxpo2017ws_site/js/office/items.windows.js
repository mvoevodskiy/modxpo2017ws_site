modxpo2017ws_site.window.CreateItem = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'modxpo2017ws_site-item-window-create';
    }
    Ext.applyIf(config, {
        title: _('modxpo2017ws_site_item_create'),
        width: 550,
        autoHeight: true,
        url: modxpo2017ws_site.config.connector_url,
        baseParams: {
            action: 'modxpo2017ws_site/processor',
            method: 'item/create',
        },
        fields: this.getFields(config),
        keys: this.getKeys(config),
    });
    modxpo2017ws_site.window.CreateItem.superclass.constructor.call(this, config);
    this.on('hide', function () {
        var w = this;
        window.setTimeout(function () {
            w.close();
        }, 200);
    });
};
Ext.extend(modxpo2017ws_site.window.CreateItem, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'textfield',
            fieldLabel: _('modxpo2017ws_site_item_name'),
            name: 'name',
            id: config.id + '-name',
            anchor: '99%',
            allowBlank: false,
        }, {
            xtype: 'textarea',
            fieldLabel: _('modxpo2017ws_site_item_description'),
            name: 'description',
            id: config.id + '-description',
            height: 150,
            anchor: '99%'
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('modxpo2017ws_site_item_active'),
            name: 'active',
            id: config.id + '-active',
            checked: true,
        }];
    },

    getKeys: function (config) {
        return [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }];
    },

});
Ext.reg('modxpo2017ws_site-item-window-create', modxpo2017ws_site.window.CreateItem);


modxpo2017ws_site.window.UpdateItem = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'modxpo2017ws_site-item-window-update';
    }
    Ext.applyIf(config, {
        title: _('modxpo2017ws_site_item_update'),
        width: 550,
        autoHeight: true,
        url: modxpo2017ws_site.config.connector_url,
        baseParams: {
            action: 'modxpo2017ws_site/processor',
            method: 'item/update',
        },
        fields: this.getFields(config),
        keys: this.getKeys(config),
    });
    modxpo2017ws_site.window.UpdateItem.superclass.constructor.call(this, config);
    this.on('hide', function () {
        var w = this;
        window.setTimeout(function () {
            w.close();
        }, 200);
    });
};
Ext.extend(modxpo2017ws_site.window.UpdateItem, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'hidden',
            name: 'id',
            id: config.id + '-id',
        }, {
            xtype: 'textfield',
            fieldLabel: _('modxpo2017ws_site_item_name'),
            name: 'name',
            id: config.id + '-name',
            anchor: '99%',
            allowBlank: false,
        }, {
            xtype: 'textarea',
            fieldLabel: _('modxpo2017ws_site_item_description'),
            name: 'description',
            id: config.id + '-description',
            anchor: '99%',
            height: 150,
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('modxpo2017ws_site_item_active'),
            name: 'active',
            id: config.id + '-active',
        }];
    },

    getKeys: function () {
        return [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }];
    },

});
Ext.reg('modxpo2017ws_site-item-window-update', modxpo2017ws_site.window.UpdateItem);