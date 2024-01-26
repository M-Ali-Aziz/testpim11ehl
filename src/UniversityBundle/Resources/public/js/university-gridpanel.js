var university = {
    gridUrl:    "/university/ajax/get?",
    createUrl:  "/university/ajax/create-object",
    usersUrl:   "/university/ajax/get-users",
    fields:     ['o_published','o_id','o_key', 'o_userOwner', 'University', 'Year', 'Period', 'o_creationDate', 'o_modificationDate'],
    fieldsSearch:  ['o_key'],

    user: function() { return pimcore.globalmanager.get("user"); },

    showTab: function() {

        var panelId = "lu_university_panel";
        var tabPanel = Ext.getCmp("pimcore_panel_tabs");

        if (!Ext.get(Ext.query("#" + panelId)).elements.length) {

            university.panel = new Ext.Panel({
                id:         panelId,
                title:      "Partner universities",
                iconCls:    "pimcore_icon_university",
                border:     false,
                layout:     "fit",
                closable:   true,
                items:      [university.getGrid()]
            });

            tabPanel.add(university.panel);
        }

        tabPanel.setActiveItem(university.panel);
        pimcore.layout.refresh();
    },

    composeQueryString: function(name, fields) {
        var url = '';
        for(var i=0; i<fields.length; i++) {
            url += name + '%5B%5D=' + fields[i] + '&';
        }
        return url;
    },

    getGrid: function() {
        var itemsPerPage = 100;
        var url = university.gridUrl; // /university/ajax/get?
        // fields
        url += university.composeQueryString('fields', university.fields);
        // search fields
        url += university.composeQueryString('searchFields', university.fieldsSearch);

        var proxy = new Ext.data.proxy.Ajax({
            type: 'ajax',
            reader: {
                type: 'json',
                rootProperty: 'data',
                totalProperty: 'total'
            },
            actionMethods: {
                read   : 'POST'
            },
            api: {
                //create  : url + "xaction=create",
                read    : url + "xaction=read",
                //update  : url + "xaction=update",
                //destroy : url + "xaction=destroy"
            },
            listeners: {
                exception: function(proxy, response, operation){
                    Ext.MessageBox.show({
                        title: 'REMOTE EXCEPTION',
                        msg: operation.getError(),
                        icon: Ext.MessageBox.ERROR,
                        buttons: Ext.Msg.OK
                    });
                }
            }
        });

        university.store = Ext.create('Ext.data.Store', {
            proxy: proxy,
            autoLoad: false,
            autoSync: true,
            pageSize: itemsPerPage,
            fields: university.fields,
            remoteSort: true,
            remoteFilter: true
        });

        // specify segment of data you want to load using params
        university.store.load({
            params: {
                start: 0,
                limit: itemsPerPage
            }
        });

        university.users = [];
        Ext.Ajax.request({
            url: university.usersUrl,
            params: {},
            success: function(response){
                university.users = JSON.parse(response.responseText);
            }
        });

        university.pagingtoolbar = pimcore.helpers.grid.buildDefaultPagingToolbar(university.store, itemsPerPage);

        university.filterField = new Ext.form.TextField({
            xtype: "textfield",
            width: 200,
            style: "margin: 0 10px 0 0;",
            enableKeyEvents: true,
            listeners: {
                "keydown" : function (field, key) {
                    if (key.getKey() == key.ENTER) {
                        var input = field;
                        var proxy = university.store.getProxy();
                        proxy.extraParams.filter = input.getValue();
                        university.store.load();
                    }
                }
            }
        });

        var typesColumns = [
            {text: t("id"), flex: 70, sortable: true, dataIndex: 'o_id', editable: false, hidden: true},
            {text: 'University', flex: 210, sortable: true, dataIndex: 'University', editable: false},
            {text: 'Year', flex: 60, sortable: true, dataIndex: 'Year', editable: false,
                renderer: function(d) {
                    if (d !== undefined && d !== null) {
                        return Ext.Array.sort(d);
                    } else {
                        return "";
                    }
                }
            },
            {text: 'Period', flex: 60, sortable: true, dataIndex: 'Period', editable: false,
                renderer: function(d) {
                    if (d !== undefined && d !== null) {
                        return Ext.Array.sort(d);
                    } else {
                        return "";
                    }
                }
            },
            {text: "Created", sortable: true, dataIndex: 'o_creationDate', editable: false,
                hidden: false,
                width: 150,
                renderer: function(d) {
                    if (d !== undefined && d !== null) {
                        var date = new Date(d * 1000);
                        return Ext.Date.format(date, "Y-m-d H:i");
                    } else {
                        return "";
                    }
                }
            },

            {text: "Modified", sortable: true, dataIndex: 'o_modificationDate', editable: false,
                hidden: false,
                width: 150,
                renderer: function(d) {
                    if (d !== undefined && d !== null) {
                        var date = new Date(d * 1000);
                        return Ext.Date.format(date, "Y-m-d H:i");
                    } else {
                        return "";
                    }
                }
            }
        ];

        var toolbar = Ext.create('Ext.Toolbar', {
            cls: 'main-toolbar',
            items: [
                {
                    iconCls: "pimcore_icon_add",
                    text: t("add"),
                    xtype: "button",
                    handler: function() {
                        Ext.Ajax.request({
                            url: '/university/ajax/create-object',
                            params: {userId: university.user().id},
                            success: function(response){
                                response = JSON.parse(response.responseText);
                                if(response.success) {
                                    pimcore.helpers.openObject(response.id, "university");
                                } else {
                                    pimcore.helpers.showNotification('Error', response.message, 'error');
                                }
                            }
                        });
                    }
                },
                , "->", {
                    text: t("filter") + "/" + t("search"),
                    xtype: "tbtext",
                    style: "margin: 0 10px 0 0;"
                },
                university.filterField
            ]
        });

        university.grid = Ext.create('Ext.grid.Panel', {
            frame: false,
            scrollable: true,
            store: university.store,
            columns : typesColumns,
            columnLines: true,
            listeners: {
                rowclick: function(grid, rowIndex, e) {
                    pimcore.helpers.openObject(rowIndex.data.o_id, "university");
                }
            },
            dockedItems: [{
                xtype: 'pagingtoolbar',
                store: university.store,
                dock: 'bottom',
                displayInfo: true
            }],
            tbar: toolbar
        });

        return university.grid;
    }
}