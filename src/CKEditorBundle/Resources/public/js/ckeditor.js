pimcore.registerNS("pimcore.plugin.CKEditorBundle");

pimcore.plugin.CKEditorBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.CKEditorBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // Global configuration for all WYSIWYG Editors
        pimcore.object.tags.wysiwyg.defaultEditorConfig = {
            allowedContent: true,
            format_tags: 'p;h2;h3;h4',
            toolbar: [
                { name: 'clipboard', items: [ 'Paste', '-', 'Undo', 'Redo' ] },
                { name: 'links', items: [ 'Link', 'Unlink', 'Anchor'  ] },
                { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
                { name: 'document', items: [ 'Sourcedialog' ] },
                '/',
                { name: 'basicstyles', items: [ 'Bold', 'Italic', '-', 'RemoveFormat' ] },
                { name: 'colors', items : [ 'BGColor' ] },
                { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Blockquote' ] },
                { name: 'styles', items: [ 'Format' ] }
            ],
            // All content will be pasted as plain text.
            forcePasteAsPlainText: true
        };
    }
});

var CKEditorBundlePlugin = new pimcore.plugin.CKEditorBundle();
