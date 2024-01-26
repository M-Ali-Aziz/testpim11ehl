pimcore.registerNS("pimcore.plugin.UniversityBundle");

pimcore.plugin.UniversityBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.UniversityBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);

        // Adding Custom Main Navigation Items (University).
        this.navEl = Ext.get('pimcore_menu_search').insertSibling('<li id="pimcore_menu_university" data-menu-tooltip="Partner universities" class="pimcore_menu_item icon-university"></li>', 'after');
    },

    pimcoreReady: function (params, broker) {
        // alert("UniversityBundle ready!");

        // University click event
        this.navEl.on("click", function(){ university.showTab(); });
    }
});

var UniversityBundlePlugin = new pimcore.plugin.UniversityBundle();
