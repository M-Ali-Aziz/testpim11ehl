var lucrisSync = {
    toolbar: function() {
        // add Lucris sync button under Tools in the main menu
        var layoutToolbar = pimcore.globalmanager.get("layout_toolbar");

        var action = new Ext.Action({
            id: "lucrissyncbtn_menu_item",
            text: "Synka Lucris",
            iconCls:"lucrissyncbtn_menu_icon",
            handler: lucrisSync.showTab
        });

        layoutToolbar.extrasMenu.add(action);
    },

    showTab: function () {
        var panelId = "lucrissyncbtn_check_panel";
        var tabPanel = Ext.getCmp("pimcore_panel_tabs");

        if (!Ext.get(Ext.query("#" + panelId)).elements.length) {
            lucrisSync.panel = new Ext.Panel({
                id:         "lucrissyncbtn_check_panel",
                title:      "Synka Lucris",
                iconCls:    "lucrissyncbtn_check_panel_icon",
                border:     false,
                bodyPadding: 12,
                closable:   true,
                items: lucrisSync.getItems()
            });

            tabPanel.add(lucrisSync.panel);
        }

        tabPanel.setActiveTab(lucrisSync.panel);
        pimcore.layout.refresh();
    },

    getItems: function () {
        var FormFieldSet = [{
            xtype: 'fieldset',
            title: 'Synka Lucris',
            items: [{
                xtype: 'button',
                text: 'Synka Lucris',
                renderTo: Ext.getBody(),
                handler: lucrisSync.syncLucris
            }]
        }];

        return FormFieldSet;
    },

    syncing: false,

    syncMsg: null,

    syncLucris: function() {
        if (lucrisSync.syncing == true) {
            return;
        }

        lucrisSync.syncing = true;

        // Set message
        lucrisSync.syncMsg = Ext.MessageBox.alert('Var god vänta!!', 'Synkar Lucris ...');

        // Making request to lucrisBundle -> SyncController -> lucrisAction
        Ext.Ajax.request({
            url: "/lucris/sync/lucris",
            success: function(response, opts) {
                if (response.responseText.indexOf('ERROR') !== -1) {
                    lucrisSync.syncMsg.hide();
                    pimcore.helpers.showNotification('Error', response.responseText, 'error');
                    lucrisSync.syncing = false;
                    return;
                }

                lucrisSync.syncMsg.hide();
                pimcore.helpers.showNotification('Success', 'Synkning av Lucris lyckades.', 'success');
                lucrisSync.syncing = false;
            },
            failure: function(response, opts) {
                lucrisSync.syncMsg.hide();
                pimcore.helpers.showNotification('Error', response.responseText, 'error');
                lucrisSync.syncing = false;
            }
        });
    }
}
