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
 * - Start [datetime]
 * - End [datetime]
 * - ShowEnd [checkbox]
 * - venue_later [checkbox]
 * - venue [select]
 * - Organizer [select]
 * - Namn [input]
 * - Titel [input]
 * - email [email]
 * - Phone [input]
 * - FormLink [input]
 * - RegDate [date]
 * - Fullbokat [checkbox]
 * - Alert [textarea]
 * - Cancelled [checkbox]
 * - Category [select]
 * - Serie [select]
 * - SV [checkbox]
 * - EN [checkbox]
 * - Check [checkbox]
 * - Startpage [checkbox]
 * - Webb [multiselect]
 */

return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => '16',
   'name' => 'Events',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1695379108,
   'userOwner' => 18,
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
         'name' => 'Calendar',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'Rubrik',
                     'title' => 'Rubrik',
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
                     'visibleGridView' => true,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => 470,
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
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'name' => 'Ingress',
                     'title' => 'Ingress',
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
                     'width' => 470,
                     'height' => 35,
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                     'name' => 'Body',
                     'title' => 'Text som beskriver evenemanget',
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
                     'width' => 530,
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
                 'icon' => NULL,
                 'labelWidth' => 60,
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
                     'tooltip' => 'Använd en bild som är 560 px bred för bästa resultat i alla enheter. Bilden kommer bäst till sin rätt om den är större på bredden än på höjden. 560x330 px är att rekommendera.

Bilden kommer att visas mellan ingress och brödtext. 

Det kommer också vara denna bild som visas om du t ex delar nyheten på Facebook.',
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
                     'width' => 530,
                     'height' => '',
                     'uploadPath' => '/events',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'Alt',
                     'title' => 'Alt-text',
                     'tooltip' => 'Alla kan inte se bilder. Men bilden är ofta viktig för förståelsen. För att förklara vad som är på bilden används alt-texten. Ange en kort, beskrivande text av bilden som gör den tillgänglig och ökar synlighet på ex Google. ',
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
                     'width' => 470,
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'Caption',
                     'title' => 'Bildtext',
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
                     'width' => 470,
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
                 'labelWidth' => 60,
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
                 'name' => 'Time and venue',
                 'type' => NULL,
                 'region' => '',
                 'title' => 'Tid/plats',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Datetime::__set_state(array(
                     'name' => 'Start',
                     'title' => 'Händelsen börjar',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'datetime',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => true,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'queryColumnType' => 'bigint(20)',
                     'columnType' => 'bigint(20)',
                     'defaultValue' => NULL,
                     'useCurrentDate' => false,
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Datetime::__set_state(array(
                     'name' => 'End',
                     'title' => 'Händelsen slutar',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'datetime',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'queryColumnType' => 'bigint(20)',
                     'columnType' => 'bigint(20)',
                     'defaultValue' => NULL,
                     'useCurrentDate' => false,
                     'defaultValueGenerator' => '',
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                     'name' => 'ShowEnd',
                     'title' => 'Visa ut sluttid',
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
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                     'name' => 'venue_later',
                     'title' => 'Lokal meddelas senare',
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
                     'visibleGridView' => true,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => 0,
                     'defaultValueGenerator' => '',
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'name' => 'venue',
                     'title' => 'Lokal',
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
                     'visibleGridView' => true,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'options' => NULL,
                     'width' => 430,
                     'defaultValue' => '',
                     'optionsProviderClass' => '@Appbundle.website.optionsprovider.lokal',
                     'optionsProviderData' => '',
                     'columnLength' => 190,
                     'dynamicOptions' => false,
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
                 'labelWidth' => 150,
                 'labelAlign' => 'left',
              )),
              4 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Organizer',
                 'type' => NULL,
                 'region' => '',
                 'title' => 'Kontakt',
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
                     'name' => 'Organizer',
                     'title' => 'Arrangör',
                     'tooltip' => 'Ange vem som arrangerar evenemanget.',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'select',
                     'relationType' => false,
                     'invisible' => true,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Ekonomihögskolan',
                        'value' => 'ehl',
                      ),
                      1 => 
                      array (
                        'key' => 'Ekonomihögskolans bibliotek',
                        'value' => 'biblioteket',
                      ),
                      2 => 
                      array (
                        'key' => 'Ekonomihögskolans karriärcenter',
                        'value' => 'karriarcenter',
                      ),
                      3 => 
                      array (
                        'key' => 'Centrum för ekonomisk demografi',
                        'value' => 'ced',
                      ),
                      4 => 
                      array (
                        'key' => 'Centrum för handelsforskning',
                        'value' => 'handel',
                      ),
                      5 => 
                      array (
                        'key' => 'Ekonomisk-historiska institutionen',
                        'value' => 'ekh',
                      ),
                      6 => 
                      array (
                        'key' => 'Företagsekonomiska institutionen',
                        'value' => 'fek',
                      ),
                      7 => 
                      array (
                        'key' => 'Institutionen för handelsrätt',
                        'value' => 'har',
                      ),
                      8 => 
                      array (
                        'key' => 'Institutionen för informatik',
                        'value' => 'ics',
                      ),
                      9 => 
                      array (
                        'key' => 'KEFU',
                        'value' => 'kefu',
                      ),
                      10 => 
                      array (
                        'key' => 'Knut Wicksells centrum för ...',
                        'value' => 'kwc',
                      ),
                      11 => 
                      array (
                        'key' => 'Nationalekonomiska institutionen',
                        'value' => 'nek',
                      ),
                      12 => 
                      array (
                        'key' => 'Statistiska institutionen',
                        'value' => 'stat',
                      ),
                      13 => 
                      array (
                        'key' => 'Sten K Johnson Centre for ...',
                        'value' => 'entrepreneur',
                      ),
                      14 => 
                      array (
                        'key' => '............................',
                        'value' => '............................',
                      ),
                      15 => 
                      array (
                        'key' => 'KNOWSCIENCE',
                        'value' => 'KNOWSCIENCE',
                      ),
                      16 => 
                      array (
                        'key' => 'Lunds skatteakademi',
                        'value' => 'Lunds skatteakademi',
                      ),
                    ),
                     'width' => 310,
                     'defaultValue' => '',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'columnLength' => 190,
                     'dynamicOptions' => false,
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'Namn',
                     'title' => 'Kontaktperson',
                     'tooltip' => 'Namnet på den person som kan svara på frågor kring evenemanget.',
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
                     'width' => 310,
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'Titel',
                     'title' => 'Titel',
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
                     'width' => 310,
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Email::__set_state(array(
                     'name' => 'email',
                     'title' => 'E-post',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'email',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => 310,
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
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'Phone',
                     'title' => 'Telefon:',
                     'tooltip' => 'Internationellt format: +46 46 222 xx xx',
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
                     'width' => 310,
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
                 'icon' => NULL,
                 'labelWidth' => 120,
                 'labelAlign' => 'left',
              )),
              5 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Registration',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Anmälan',
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
                     'width' => 510,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => 'padding:20px;',
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
                     'html' => 'För att kunna planera vissa evenemang, så behöver man ofta någon form av anmälan. Det snabbaste och enklaste sättet är att skapa ett formulär i t ex <a href="https://www.google.com/intl/sv/forms/about/" target="_blank">Google Forms</a>&nbsp;och länka till detta formulär.&nbsp;<div><br></div><div>Om du lägger in en länk så kommer det att visas en anmälningsknapp på evenemangssidan som tar besökaren till anmälningsformuläret.&nbsp;</div>',
                     'renderingClass' => '',
                     'renderingData' => '',
                     'border' => false,
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'FormLink',
                     'title' => 'Länk till anmälan',
                     'tooltip' => 'Ange fullständig URL, inklusive http...',
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
                     'width' => 330,
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
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Date::__set_state(array(
                     'name' => 'RegDate',
                     'title' => 'Sista anmälningsdag',
                     'tooltip' => 'Du rekommenderas ange en sista anmälningsdag, för att få igång anmälningarna i god tid. Efter detta datum försvinner anmälningslänken. Om du vill förlänga anmälningstiden måste du gå in här igen och sätta ett nytt datum.',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'date',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'queryColumnType' => 'bigint(20)',
                     'columnType' => 'bigint(20)',
                     'defaultValue' => NULL,
                     'useCurrentDate' => false,
                     'defaultValueGenerator' => '',
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                     'name' => 'Fullbokat',
                     'title' => 'Evenemanget är fullbokat',
                     'tooltip' => 'När du har tillräckligt många anmälningar, kan du klicka i den här rutan. Länken till anmälningsforuläret försvinner och ett meddelande visas upp på eventsidan som berättar att eventet är fullbokat. Glöm inte att stänga ditt anmälningsformulär!',
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
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'icon' => NULL,
                 'labelWidth' => 180,
                 'labelAlign' => 'left',
              )),
              6 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Alert',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Alert/inställt',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'name' => 'Alert',
                     'title' => 'Meddelande',
                     'tooltip' => 'Alert vid lokalbyte, inställda evenemang etc.',
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
                     'width' => 340,
                     'height' => 70,
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                     'name' => 'Cancelled',
                     'title' => 'Evenemanget är inställt',
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
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'icon' => NULL,
                 'labelWidth' => 170,
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
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
             'name' => 'Settings',
             'type' => NULL,
             'region' => 'east',
             'title' => '',
             'width' => 390,
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
                 'name' => 'Language',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Kategori/språk',
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
                     'title' => 'Eventkategori',
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
                     'visibleGridView' => true,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Disputation',
                        'value' => 'Disputation',
                      ),
                      1 => 
                      array (
                        'key' => 'Föreläsning',
                        'value' => 'Föreläsning',
                      ),
                      2 => 
                      array (
                        'key' => 'Föredrag',
                        'value' => 'Föredrag',
                      ),
                      3 => 
                      array (
                        'key' => 'Gästföreläsning',
                        'value' => 'Gästföreläsning',
                      ),
                      4 => 
                      array (
                        'key' => 'Hybrid',
                        'value' => 'Hybrid',
                      ),
                      5 => 
                      array (
                        'key' => 'Konferens',
                        'value' => 'Konferens',
                      ),
                      6 => 
                      array (
                        'key' => 'Kurs',
                        'value' => 'Kurs',
                      ),
                      7 => 
                      array (
                        'key' => 'Mässa',
                        'value' => 'Mässa',
                      ),
                      8 => 
                      array (
                        'key' => 'Möte',
                        'value' => 'Möte',
                      ),
                      9 => 
                      array (
                        'key' => 'RP-seminarium',
                        'value' => 'RP-seminarium',
                      ),
                      10 => 
                      array (
                        'key' => 'Seminarium',
                        'value' => 'Seminarium',
                      ),
                      11 => 
                      array (
                        'key' => 'Slutseminarium',
                        'value' => 'Slutseminarium',
                      ),
                      12 => 
                      array (
                        'key' => 'Symposium',
                        'value' => 'Symposium',
                      ),
                      13 => 
                      array (
                        'key' => 'Webbinarium',
                        'value' => 'Webbinarium',
                      ),
                      14 => 
                      array (
                        'key' => 'Workshop',
                        'value' => 'Workshop',
                      ),
                      15 => 
                      array (
                        'key' => 'Övrigt',
                        'value' => 'Övrigt',
                      ),
                    ),
                     'width' => 190,
                     'defaultValue' => 'Seminarium',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'columnLength' => 190,
                     'dynamicOptions' => false,
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'name' => 'Serie',
                     'title' => 'Återkommande serie',
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
                     'visibleGridView' => true,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Institute for Innovation Management',
                        'value' => 'Institute for Innovation Management',
                      ),
                      1 => 
                      array (
                        'key' => 'Institute for Public Affairs',
                        'value' => 'Institute for Public Affairs',
                      ),
                      2 => 
                      array (
                        'key' => 'Institute for Sustainability Impact',
                        'value' => 'Institute for Sustainability Impact',
                      ),
                      3 => 
                      array (
                        'key' => 'Morning talks',
                        'value' => 'Morning talks',
                      ),
                      4 => 
                      array (
                        'key' => 'EVRACSI Webinar Series',
                        'value' => 'EVRACSI Webinar Series',
                      ),
                      5 => 
                      array (
                        'key' => 'Applied Microeconomics (NEK)',
                        'value' => 'Applied Microeconomics Seminar Series (Dept. of Economics)',
                      ),
                      6 => 
                      array (
                        'key' => 'Departmental Seminars (NEK)',
                        'value' => ' Departmental Seminar Series (Dept. of Economics)',
                      ),
                      7 => 
                      array (
                        'key' => 'Financial Economics (NEK)',
                        'value' => 'Financial Economics (Dept. of Economics)',
                      ),
                      8 => 
                      array (
                        'key' => 'Macroeconomics and Econometrics (NEK)',
                        'value' => 'Macroeconomics and Econometrics Seminar Series (Dept. of Economics)',
                      ),
                      9 => 
                      array (
                        'key' => 'Microeconomics: Theory and Experiments (NEK)',
                        'value' => 'Microeconomics: Theory and Experiments (Dept. of Economics)',
                      ),
                      10 => 
                      array (
                        'key' => 'Brown Bag Seminar (CED)',
                        'value' => 'Brown Bag Seminar',
                      ),
                      11 => 
                      array (
                        'key' => 'Brown Bag Seminar (NEK)',
                        'value' => ' Brown Bag Seminar (Dept. of Economics)',
                      ),
                      12 => 
                      array (
                        'key' => 'International Tax seminars (HAR)',
                        'value' => 'International Tax seminars',
                      ),
                      13 => 
                      array (
                        'key' => 'LSRN Initiative',
                        'value' => 'LSRN Initiative',
                      ),
                      14 => 
                      array (
                        'key' => 'Skatteseminarium (HAR)',
                        'value' => 'Skatteseminarium',
                      ),
                      15 => 
                      array (
                        'key' => 'Rising stars in entrepreneurship ... (SKJCE)',
                        'value' => 'Rising stars in entrepreneurship and small business research',
                      ),
                      16 => 
                      array (
                        'key' => 'Wicksell Workshop',
                        'value' => 'Wicksell Workshop',
                      ),
                      17 => 
                      array (
                        'key' => 'Wicksell Seminar: Practitioners’ Seminar',
                        'value' => 'Wicksell Seminar: Practitioners’ Seminar',
                      ),
                      18 => 
                      array (
                        'key' => 'Wicksell Seminar: Financial Economics',
                        'value' => 'Wicksell Seminar: Financial Economics',
                      ),
                      19 => 
                      array (
                        'key' => 'Photographs of faculty and staff',
                        'value' => 'Photographs of faculty and staff',
                      ),
                    ),
                     'width' => 190,
                     'defaultValue' => '',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'columnLength' => 190,
                     'dynamicOptions' => false,
                     'defaultValueGenerator' => '',
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
                     'visibleGridView' => true,
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
                     'visibleGridView' => true,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => 0,
                     'defaultValueGenerator' => '',
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                     'name' => 'Check',
                     'title' => 'Check',
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
                     'invisible' => true,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => 0,
                     'defaultValueGenerator' => '',
                  )),
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                     'name' => 'Startpage',
                     'title' => 'Visa på startsida',
                     'tooltip' => 'Gäller ehl.lu.se samt lusem.lu.se.',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'checkbox',
                     'relationType' => false,
                     'invisible' => true,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => 1,
                     'defaultValueGenerator' => '',
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'panel',
                 'layout' => '',
                 'border' => false,
                 'icon' => NULL,
                 'labelWidth' => 155,
                 'labelAlign' => 'left',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Web',
                 'type' => NULL,
                 'region' => '',
                 'title' => 'Webb',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'name' => 'Webb',
                     'title' => 'Webb',
                     'tooltip' => 'Ange en eller flera webbplatser och undersidor som evenemanget kan visas på.',
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
                     'visibleGridView' => true,
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
                        'key' => 'Nationalekonomiska institutionen',
                        'value' => 'nek',
                      ),
                      13 => 
                      array (
                        'key' => 'Statistiska institutionen',
                        'value' => 'stat',
                      ),
                      14 => 
                      array (
                        'key' => 'Sten K Johnson Centre for ...',
                        'value' => 'entrepreneur',
                      ),
                      15 => 
                      array (
                        'key' => '............................',
                        'value' => '.............................',
                      ),
                      16 => 
                      array (
                        'key' => 'LUSEM Staff Pages',
                        'value' => 'staff',
                      ),
                      17 => 
                      array (
                        'key' => 'LUSEM Staff Pages Ekon. historia',
                        'value' => ' sta-ekh',
                      ),
                      18 => 
                      array (
                        'key' => 'LUSEM Staff Pages Företagsekonomi',
                        'value' => ' sta-fek',
                      ),
                      19 => 
                      array (
                        'key' => 'LUSEM Staff Pages Handelsrätt',
                        'value' => ' sta-har',
                      ),
                      20 => 
                      array (
                        'key' => 'LUSEM Staff Pages informatik',
                        'value' => ' sta-ics',
                      ),
                      21 => 
                      array (
                        'key' => 'LUSEM Staff Pages Nationalekonomi',
                        'value' => ' sta-nek',
                      ),
                      22 => 
                      array (
                        'key' => 'LUSEM Staff Pages Statistik',
                        'value' => ' sta-sta',
                      ),
                      23 => 
                      array (
                        'key' => '............................',
                        'value' => '............................',
                      ),
                      24 => 
                      array (
                        'key' => 'BISS - Big Science and Society',
                        'value' => 'BISS',
                      ),
                      25 => 
                      array (
                        'key' => 'FEK Forskarutbildning',
                        'value' => 'FEK Forskarutbildning',
                      ),
                      26 => 
                      array (
                        'key' => 'FEK Studievägledning',
                        'value' => 'FEK Studievägledning',
                      ),
                      27 => 
                      array (
                        'key' => 'KNOWSCIENCE',
                        'value' => 'KNOWSCIENCE',
                      ),
                      28 => 
                      array (
                        'key' => 'Lunds skatteakademi',
                        'value' => 'Lunds skatteakademi',
                      ),
                      29 => 
                      array (
                        'key' => 'NEK Anslagstavla',
                        'value' => 'Anslagstavla',
                      ),
                      30 => 
                      array (
                        'key' => 'Sustainable Future Hub',
                        'value' => 'Sustainable Future Hub',
                      ),
                    ),
                     'width' => 260,
                     'height' => 810,
                     'maxItems' => NULL,
                     'renderType' => 'list',
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
                 'icon' => NULL,
                 'labelWidth' => 70,
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
   'icon' => '/bundles/pimcoreadmin/img/icon/calendar_view_day.png',
   'previewUrl' => '',
   'group' => '',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '@AppBundle.website.events_linkGenerator',
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
      'id' => false,
      'key' => false,
      'path' => true,
      'published' => false,
      'modificationDate' => false,
      'creationDate' => false,
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
