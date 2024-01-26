<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - Rubrik [input]
 * - Ingress [textarea]
 * - Body [wysiwyg]
 * - Image1 [image]
 * - Alt [input]
 * - Caption [input]
 * - Video [video]
 * - YouTube [input]
 * - Rubrik3 [input]
 * - Body3 [wysiwyg]
 * - Image3 [image]
 * - Alt3 [input]
 * - Rubrik2 [input]
 * - Body2 [wysiwyg]
 * - Image2 [image]
 * - Alt2 [input]
 * - Category [select]
 * - Subject [multiselect]
 * - SubSubject [multiselect]
 * - Staff [multiselect]
 * - Webb [multiselect]
 * - SV [checkbox]
 * - EN [checkbox]
 * - Ettan [checkbox]
 * - Startpage [checkbox]
 * - EHL [checkbox]
 * - Snippet [input]
 * - Color [input]
 */

return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => '13',
   'name' => 'News',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1695379109,
   'userOwner' => 1,
   'userModification' => 18,
   'parentClass' => '',
   'implementsInterfaces' => '',
   'listingParentClass' => '',
   'useTraits' => '',
   'listingUseTraits' => '',
   'encryption' => false,
   'encryptedTables' => 
  array (
  ),
   'allowInherit' => false,
   'allowVariants' => false,
   'showVariants' => false,
   'fieldDefinitions' => 
  array (
  ),
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'name' => 'pimcore_root',
     'type' => NULL,
     'region' => NULL,
     'title' => NULL,
     'width' => NULL,
     'height' => NULL,
     'collapsible' => false,
     'collapsed' => false,
     'bodyStyle' => NULL,
     'datatype' => 'layout',
     'permissions' => NULL,
     'children' => 
    array (
      0 => 
      Pimcore\Model\DataObject\ClassDefinition\Layout\Region::__set_state(array(
         'name' => 'News',
         'type' => NULL,
         'region' => NULL,
         'title' => '',
         'width' => NULL,
         'height' => NULL,
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => '',
         'datatype' => 'layout',
         'permissions' => NULL,
         'children' => 
        array (
          0 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
             'name' => 'Content',
             'type' => NULL,
             'region' => 'center',
             'title' => '',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'permissions' => NULL,
             'children' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Text',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Text',
                 'width' => NULL,
                 'height' => NULL,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'permissions' => NULL,
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                     'name' => 'Rubrik',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => '',
                     'width' => 500,
                     'height' => 14,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'children' => 
                    array (
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'text',
                     'html' => '<b>Titel&nbsp;<font color="#ff0000">*</font></b>',
                     'renderingClass' => '',
                     'renderingData' => '',
                     'border' => false,
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'Rubrik',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin:0px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => 500,
                     'defaultValue' => NULL,
                     'columnLength' => 255,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'defaultValueGenerator' => '',
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                     'name' => 'Ingress',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => '',
                     'width' => 500,
                     'height' => 32,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => 'padding-top:16px;',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'children' => 
                    array (
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'text',
                     'html' => '<b>Ingress</b>',
                     'renderingClass' => '',
                     'renderingData' => '',
                     'border' => false,
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'name' => 'Ingress',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'textarea',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => 500,
                     'height' => 130,
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                     'name' => 'Body',
                     'title' => 'Text',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'wysiwyg',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => 600,
                     'height' => '',
                     'toolbarConfig' => '',
                     'excludeFromSearchIndex' => false,
                     'maxCharacters' => 0,
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'icon' => '',
                 'labelWidth' => 100,
                 'labelAlign' => 'left',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Bild',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Bild',
                 'width' => NULL,
                 'height' => NULL,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'permissions' => NULL,
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                     'name' => 'Image1',
                     'title' => 'Bild',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'image',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => 690,
                     'height' => 460,
                     'uploadPath' => '/news',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                     'name' => 'Alttext',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => '',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'children' => 
                    array (
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'text',
                     'html' => '<b>Alt text</b> för skärmläsare (viktigt ur ett tillgänglighetsperspektiv).',
                     'renderingClass' => '',
                     'renderingData' => '',
                     'border' => false,
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'Alt',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-top:10px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => 590,
                     'defaultValue' => NULL,
                     'columnLength' => 255,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'defaultValueGenerator' => '',
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                     'name' => 'Caption',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => '',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'children' => 
                    array (
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'text',
                     'html' => '<b>Bildtexten</b>&nbsp;visas ut under bilden i ett separat fält.&nbsp;',
                     'renderingClass' => '',
                     'renderingData' => '',
                     'border' => false,
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'Caption',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-top:-10px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => 590,
                     'defaultValue' => NULL,
                     'columnLength' => 255,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'defaultValueGenerator' => '',
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'icon' => '',
                 'labelWidth' => 100,
                 'labelAlign' => 'left',
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Video',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Video',
                 'width' => NULL,
                 'height' => NULL,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'permissions' => NULL,
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Video::__set_state(array(
                     'name' => 'Video',
                     'title' => 'Video',
                     'tooltip' => 'Om du lägger in en video kommer det att vara denna som visas ut oavsett om du lagt in en bild eller ej.',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'video',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => 510,
                     'height' => '',
                     'allowedTypes' => NULL,
                     'supportedTypes' => 
                    array (
                      0 => 'asset',
                      1 => 'youtube',
                      2 => 'vimeo',
                      3 => 'dailymotion',
                    ),
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'YouTube',
                     'title' => 'YouTube videoklipp-ID',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => 410,
                     'defaultValue' => NULL,
                     'columnLength' => 255,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'defaultValueGenerator' => '',
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'icon' => NULL,
                 'labelWidth' => 100,
                 'labelAlign' => 'left',
              )),
              3 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Facts',
                 'type' => NULL,
                 'region' => '',
                 'title' => 'Infobox 1',
                 'width' => NULL,
                 'height' => NULL,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'permissions' => NULL,
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => '',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => 'padding-bottom: 25px;',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'children' => 
                    array (
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'text',
                     'html' => 'Fungerar endast i nya mallar.',
                     'renderingClass' => '',
                     'renderingData' => '',
                     'border' => false,
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => '',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'children' => 
                    array (
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'text',
                     'html' => '<b>Rubrik</b>',
                     'renderingClass' => '',
                     'renderingData' => '',
                     'border' => false,
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'Rubrik3',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-top:-10px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => 380,
                     'defaultValue' => NULL,
                     'columnLength' => 60,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => true,
                     'defaultValueGenerator' => '',
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                     'name' => 'Body3',
                     'title' => 'Text',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'wysiwyg',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => 480,
                     'height' => '',
                     'toolbarConfig' => '',
                     'excludeFromSearchIndex' => false,
                     'maxCharacters' => 0,
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                     'name' => 'Image3',
                     'title' => 'Bild',
                     'tooltip' => 'Använd en bild som är 690 px bred för bästa resultat i alla enheter. En högställd bild kommer bäst till sin rätt,  d v s en bild som är större på höjden än på bredden, blir bäst. ',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-top: 20px',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'image',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => 480,
                     'height' => '',
                     'uploadPath' => '/news',
                  )),
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => '',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'children' => 
                    array (
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'text',
                     'html' => '<b>Alt text</b> för skärmläsare (viktigt ur ett tillgänglighetsperspektiv).',
                     'renderingClass' => '',
                     'renderingData' => '',
                     'border' => false,
                  )),
                  6 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'Alt3',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-top:-10px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => 380,
                     'defaultValue' => NULL,
                     'columnLength' => 255,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'defaultValueGenerator' => '',
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'icon' => '',
                 'labelWidth' => 100,
                 'labelAlign' => 'left',
              )),
              4 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'More info',
                 'type' => NULL,
                 'region' => '',
                 'title' => 'Infobox 2',
                 'width' => NULL,
                 'height' => NULL,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'permissions' => NULL,
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => '',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => 'padding-bottom: 25px;',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'children' => 
                    array (
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'text',
                     'html' => 'Fungerar endast i nya mallar.',
                     'renderingClass' => '',
                     'renderingData' => '',
                     'border' => false,
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => '',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'children' => 
                    array (
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'text',
                     'html' => '<b>Rubrik</b>',
                     'renderingClass' => '',
                     'renderingData' => '',
                     'border' => false,
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'Rubrik2',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-top:-10px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => 380,
                     'defaultValue' => NULL,
                     'columnLength' => 60,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => true,
                     'defaultValueGenerator' => '',
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                     'name' => 'Body2',
                     'title' => 'Text',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'wysiwyg',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => 480,
                     'height' => '',
                     'toolbarConfig' => '',
                     'excludeFromSearchIndex' => false,
                     'maxCharacters' => 0,
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                     'name' => 'Image2',
                     'title' => 'Bild',
                     'tooltip' => 'Använd en bild som är 690 px bred för bästa resultat i alla enheter. En högställd bild kommer bäst till sin rätt,  d v s en bild som är större på höjden än på bredden, blir bäst. ',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-top: 20px',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'image',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => 480,
                     'height' => '',
                     'uploadPath' => '/news',
                  )),
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => '',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'children' => 
                    array (
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'text',
                     'html' => '<b>Alt text</b> för skärmläsare (viktigt ur ett tillgänglighetsperspektiv).',
                     'renderingClass' => '',
                     'renderingData' => '',
                     'border' => false,
                  )),
                  6 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'Alt2',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-top:-10px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => 380,
                     'defaultValue' => NULL,
                     'columnLength' => 255,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'defaultValueGenerator' => '',
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'icon' => '',
                 'labelWidth' => 100,
                 'labelAlign' => 'left',
              )),
              5 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Tags',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Taggar och kategorier',
                 'width' => NULL,
                 'height' => NULL,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'permissions' => NULL,
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'name' => 'Category',
                     'title' => 'Kärnverksamhet',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'select',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Forskning',
                        'value' => 'cat_forskning',
                      ),
                      1 => 
                      array (
                        'key' => 'Utbildning',
                        'value' => 'cat_utbildning',
                      ),
                      2 => 
                      array (
                        'key' => 'Alumni',
                        'value' => 'cat_alumni',
                      ),
                      3 => 
                      array (
                        'key' => 'Karriär',
                        'value' => 'cat_karriar',
                      ),
                      4 => 
                      array (
                        'key' => 'Samverkan',
                        'value' => 'cat_samverkan',
                      ),
                      5 => 
                      array (
                        'key' => 'Övrigt',
                        'value' => 'cat_ovrigt',
                      ),
                      6 => 
                      array (
                        'key' => 'Staff',
                        'value' => 'cat_announcement',
                      ),
                    ),
                     'width' => 350,
                     'defaultValue' => '',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'columnLength' => 190,
                     'dynamicOptions' => false,
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'name' => 'Subject',
                     'title' => 'Ämnesområde',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'multiselect',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Ekonomisk historia',
                        'value' => 'Ekonomisk historia',
                      ),
                      1 => 
                      array (
                        'key' => 'Forskningspolitik',
                        'value' => 'Forskningspolitik',
                      ),
                      2 => 
                      array (
                        'key' => 'Företagsekonomi',
                        'value' => 'Företagsekonomi',
                      ),
                      3 => 
                      array (
                        'key' => 'Handelsrätt',
                        'value' => 'Handelsrätt',
                      ),
                      4 => 
                      array (
                        'key' => 'Informatik',
                        'value' => 'Informatik',
                      ),
                      5 => 
                      array (
                        'key' => 'Nationalekonomi',
                        'value' => 'Nationalekonomi',
                      ),
                      6 => 
                      array (
                        'key' => 'Statistik',
                        'value' => 'Statistik',
                      ),
                    ),
                     'width' => 350,
                     'height' => '',
                     'maxItems' => NULL,
                     'renderType' => 'tags',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'dynamicOptions' => false,
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'name' => 'SubSubject',
                     'title' => 'Ämnen, övriga',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'multiselect',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'AI',
                        'value' => 'AI',
                      ),
                      1 => 
                      array (
                        'key' => 'Demografi',
                        'value' => 'Demografi',
                      ),
                      2 => 
                      array (
                        'key' => 'Entreprenörskap',
                        'value' => 'Entreprenörskap',
                      ),
                      3 => 
                      array (
                        'key' => 'Finans',
                        'value' => 'Finans',
                      ),
                      4 => 
                      array (
                        'key' => 'Forskningspolitik',
                        'value' => 'Forskningspolitik',
                      ),
                      5 => 
                      array (
                        'key' => 'Hållbar utveckling',
                        'value' => 'Hållbar utveckling',
                      ),
                      6 => 
                      array (
                        'key' => 'Hälsoekonomi',
                        'value' => 'Hälsoekonomi',
                      ),
                      7 => 
                      array (
                        'key' => 'Ledarskap',
                        'value' => 'Ledarskap',
                      ),
                      8 => 
                      array (
                        'key' => 'Marknadsföring',
                        'value' => 'Marknadsföring',
                      ),
                      9 => 
                      array (
                        'key' => 'Offentlig ekonomi',
                        'value' => 'Offentlig ekonomi',
                      ),
                      10 => 
                      array (
                        'key' => 'Organisation',
                        'value' => 'Organisation',
                      ),
                      11 => 
                      array (
                        'key' => 'Redovisning',
                        'value' => 'Redovisning',
                      ),
                      12 => 
                      array (
                        'key' => 'Strategi',
                        'value' => 'Strategi',
                      ),
                      13 => 
                      array (
                        'key' => 'Utvecklingsekonomi',
                        'value' => 'Utvecklingsekonomi',
                      ),
                    ),
                     'width' => 350,
                     'height' => '',
                     'maxItems' => NULL,
                     'renderType' => 'tags',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'dynamicOptions' => false,
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'name' => 'Staff',
                     'title' => 'Staff pages',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'multiselect',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Economics research',
                        'value' => 'Economics research',
                      ),
                    ),
                     'width' => 350,
                     'height' => '',
                     'maxItems' => NULL,
                     'renderType' => 'tags',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'dynamicOptions' => false,
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'icon' => '',
                 'labelWidth' => 110,
                 'labelAlign' => 'left',
              )),
              6 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Utvisning',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Utvisning',
                 'width' => NULL,
                 'height' => NULL,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'permissions' => NULL,
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => '',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'children' => 
                    array (
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'text',
                     'html' => '<b>Webbplats</b>',
                     'renderingClass' => '',
                     'renderingData' => '',
                     'border' => false,
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'name' => 'Webb',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'multiselect',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Ekonomihögskolan (sv)',
                        'value' => 'ehl',
                      ),
                      1 => 
                      array (
                        'key' => 'Ekonomihögskolan (eng)',
                        'value' => 'lusem',
                      ),
                      2 => 
                      array (
                        'key' => 'Ekonomihögskolans bibliotek',
                        'value' => 'biblioteket',
                      ),
                      3 => 
                      array (
                        'key' => 'Ekonomihögskolans karriärcenter',
                        'value' => 'karriarcenter',
                      ),
                      4 => 
                      array (
                        'key' => 'Centrum för ekonomisk demografi',
                        'value' => 'ced',
                      ),
                      5 => 
                      array (
                        'key' => 'Centrum för handelsforskning',
                        'value' => 'handel',
                      ),
                      6 => 
                      array (
                        'key' => 'Ekonomisk-historiska institutionen',
                        'value' => 'ekh',
                      ),
                      7 => 
                      array (
                        'key' => 'Företagsekonomiska institutionen',
                        'value' => 'fek',
                      ),
                      8 => 
                      array (
                        'key' => 'Institutionen för handelsrätt',
                        'value' => 'har',
                      ),
                      9 => 
                      array (
                        'key' => 'Institutionen för informatik',
                        'value' => 'ics',
                      ),
                      10 => 
                      array (
                        'key' => 'KEFU',
                        'value' => 'kefu',
                      ),
                      11 => 
                      array (
                        'key' => 'Knut Wicksells centrum för ...',
                        'value' => 'kwc',
                      ),
                      12 => 
                      array (
                        'key' => 'LUSEM Staff Pages',
                        'value' => 'staff',
                      ),
                      13 => 
                      array (
                        'key' => 'Nationalekonomiska institutionen',
                        'value' => 'nek',
                      ),
                      14 => 
                      array (
                        'key' => 'Statistiska institutionen',
                        'value' => 'stat',
                      ),
                      15 => 
                      array (
                        'key' => 'Sten K Johnson Centre for ...',
                        'value' => 'entrepreneur',
                      ),
                      16 => 
                      array (
                        'key' => '............................',
                        'value' => '............................',
                      ),
                      17 => 
                      array (
                        'key' => 'BISS - Big Science and Society',
                        'value' => 'BISS',
                      ),
                      18 => 
                      array (
                        'key' => 'Partnerskapet',
                        'value' => 'Partnerskapet',
                      ),
                      19 => 
                      array (
                        'key' => 'FEK forskarutbildning',
                        'value' => 'FEK forskarutbildning',
                      ),
                      20 => 
                      array (
                        'key' => 'FEK studievägledning',
                        'value' => 'FEK studievägledning',
                      ),
                      21 => 
                      array (
                        'key' => 'KNOWSCIENCE',
                        'value' => 'KNOWSCIENCE',
                      ),
                      22 => 
                      array (
                        'key' => 'Lunds skatteakademi',
                        'value' => 'Lunds skatteakademi',
                      ),
                      23 => 
                      array (
                        'key' => 'Rektorsblogg',
                        'value' => 'Rektorsblogg',
                      ),
                      24 => 
                      array (
                        'key' => 'Sustainable Future Hub',
                        'value' => 'Sustainable Future Hub',
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => NULL,
                     'renderType' => 'tags',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'dynamicOptions' => false,
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                     'name' => 'SV',
                     'title' => 'Visa ut på svenska sidor',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'checkbox',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => 0,
                     'defaultValueGenerator' => '',
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                     'name' => 'EN',
                     'title' => 'Visa ut på engelska sidor',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'checkbox',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => 0,
                     'defaultValueGenerator' => '',
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => '',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'children' => 
                    array (
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'text',
                     'html' => '<div><b><br></b></div><b>Nedan gäller endast ehl.lu.se, lusem.lu.se samt staff.lusem.lu.se</b>',
                     'renderingClass' => '',
                     'renderingData' => '',
                     'border' => false,
                  )),
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                     'name' => 'Ettan',
                     'title' => 'Visa ut på ettan (huvudnyhet)',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'checkbox',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => 0,
                     'defaultValueGenerator' => '',
                  )),
                  6 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                     'name' => 'Startpage',
                     'title' => 'Visa ut på startsida',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'checkbox',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => 1,
                     'defaultValueGenerator' => '',
                  )),
                  7 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                     'name' => 'EHL',
                     'title' => 'Kommunikationsavdelningen',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'checkbox',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => 0,
                     'defaultValueGenerator' => '',
                  )),
                  8 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'Snippet',
                     'title' => 'Snippet',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => true,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => NULL,
                     'defaultValue' => NULL,
                     'columnLength' => 190,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'defaultValueGenerator' => '',
                  )),
                  9 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'Color',
                     'title' => 'Color',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => true,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => NULL,
                     'defaultValue' => NULL,
                     'columnLength' => 190,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'defaultValueGenerator' => '',
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'icon' => '',
                 'labelWidth' => 190,
                 'labelAlign' => 'left',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'tabpanel',
             'border' => false,
             'tabPosition' => 'top',
          )),
        ),
         'locked' => false,
         'blockedVarsForExport' => 
        array (
        ),
         'fieldtype' => 'region',
         'icon' => NULL,
      )),
    ),
     'locked' => false,
     'blockedVarsForExport' => 
    array (
    ),
     'fieldtype' => 'panel',
     'layout' => NULL,
     'border' => false,
     'icon' => NULL,
     'labelWidth' => 100,
     'labelAlign' => 'left',
  )),
   'icon' => '/bundles/pimcoreadmin/img/icon/newspaper.png',
   'previewUrl' => '',
   'group' => '',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '@AppBundle.website.news_linkGenerator',
   'previewGeneratorReference' => NULL,
   'compositeIndices' => 
  array (
  ),
   'generateTypeDeclarations' => false,
   'showFieldLookup' => false,
   'propertyVisibility' => 
  array (
    'grid' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
    'search' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
  ),
   'enableGridLocking' => false,
   'deletedDataComponents' => 
  array (
  ),
   'blockedVarsForExport' => 
  array (
  ),
   'activeDispatchingEvents' => 
  array (
  ),
));
