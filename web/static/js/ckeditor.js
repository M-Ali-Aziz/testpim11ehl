CKEDITOR.editorConfig = function( config ) {
    config.allowedContent = true;
    config.format_tags = 'p;h2;h3;h4';
    config.toolbar = [
        { name: 'clipboard', items: ['Paste', '-', 'Undo', 'Redo' ] },
        { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
        { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
        { name: 'document', items: [ 'Sourcedialog' ] },
        '/',
        { name: 'basicstyles', items: [ 'Bold', 'Italic', '-', 'RemoveFormat' ] },
        { name: 'colors', items : [ 'BGColor' ] },
        { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Blockquote' ] },
        { name: 'styles', items: [ 'Format' ] }
    ];
    // All content will be pasted as plain text.
    config.forcePasteAsPlainText = true;
};
