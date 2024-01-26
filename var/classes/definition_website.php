<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - MainLanguage [language]
 * - DepartmentNumber [input]
 * - DomainName [input]
 * - Subdomain [input]
 * - NewsFilter [input]
 * - localizedfields [localizedfields]
 * -- LocaleExists [checkbox]
 * -- BaseUri [input]
 * -- main_title [input]
 * -- main_sub_title [input]
 * -- contact_information_name [textarea]
 * -- contact_information_address [input]
 * -- contact_information_phone [input]
 * -- contact_information_mail [input]
 * -- MainMenu [manyToManyRelation]
 * -- TargetGroups [manyToManyRelation]
 * -- Subsites [manyToManyRelation]
 * -- Shortcuts [manyToManyRelation]
 * -- Departments [manyToManyRelation]
 * -- SiteInfo [advancedManyToManyRelation]
 */

return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => '7',
   'name' => 'website',
   'description' => '',
   'creationDate' => 1357399337,
   'modificationDate' => 1695379109,
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
      Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
         'name' => 'Layout',
         'type' => NULL,
         'region' => '',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Language::__set_state(array(
             'name' => 'MainLanguage',
             'title' => 'Main Language',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'fieldtype' => 'language',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'width' => '',
             'defaultValue' => NULL,
             'optionsProviderClass' => NULL,
             'optionsProviderData' => NULL,
             'columnLength' => 190,
             'dynamicOptions' => false,
             'defaultValueGenerator' => '',
             'onlySystemLanguages' => true,
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
             'name' => 'DepartmentNumber',
             'title' => 'Lucat Department Number',
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
             'width' => '',
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
             'name' => 'DomainName',
             'title' => 'Domain Name',
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
             'width' => '',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
             'name' => 'Subdomain',
             'title' => 'Subdomain',
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
             'width' => '',
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
          4 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
             'name' => 'NewsFilter',
             'title' => 'News filter',
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
          5 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
             'name' => 'localizedfields',
             'title' => '',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'fieldtype' => 'localizedfields',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => true,
             'visibleSearch' => true,
             'blockedVarsForExport' => 
            array (
            ),
             'children' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                 'name' => 'LocaleExists',
                 'title' => 'Locale Exists',
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
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'name' => 'BaseUri',
                 'title' => 'Base Uri',
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
                 'width' => 300,
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
                 'name' => 'main_title',
                 'title' => 'Main title (header) *',
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
                 'width' => 300,
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'name' => 'main_sub_title',
                 'title' => 'Main sub title (header) *',
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
                 'width' => 300,
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
              4 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                 'name' => 'contact_information_name',
                 'title' => 'Contact info (name) *',
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
                 'width' => 300,
                 'height' => 40,
                 'maxLength' => NULL,
                 'showCharCount' => false,
                 'excludeFromSearchIndex' => false,
              )),
              5 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'name' => 'contact_information_address',
                 'title' => 'Contact info (address) *',
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
                 'width' => 300,
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
              6 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'name' => 'contact_information_phone',
                 'title' => 'Contact info (phone) *',
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
                 'width' => 300,
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
              7 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'name' => 'contact_information_mail',
                 'title' => 'Contact info (mail)',
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
                 'width' => 300,
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
              8 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyRelation::__set_state(array(
                 'name' => 'MainMenu',
                 'title' => 'Main Menu *',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'manyToManyRelation',
                 'relationType' => true,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'width' => 800,
                 'height' => '',
                 'maxItems' => NULL,
                 'assetUploadPath' => '',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'page',
                  ),
                  1 => 
                  array (
                    'documentTypes' => 'link',
                  ),
                ),
                 'enableTextSelection' => false,
              )),
              9 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyRelation::__set_state(array(
                 'name' => 'TargetGroups',
                 'title' => 'Målgrupper i toolbar',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'manyToManyRelation',
                 'relationType' => true,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'width' => 800,
                 'height' => '',
                 'maxItems' => NULL,
                 'assetUploadPath' => '',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'page',
                  ),
                  1 => 
                  array (
                    'documentTypes' => 'link',
                  ),
                ),
                 'enableTextSelection' => false,
              )),
              10 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyRelation::__set_state(array(
                 'name' => 'Subsites',
                 'title' => 'Undersajter i toolbar',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'manyToManyRelation',
                 'relationType' => true,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'width' => 800,
                 'height' => '',
                 'maxItems' => NULL,
                 'assetUploadPath' => '',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'page',
                  ),
                ),
                 'enableTextSelection' => false,
              )),
              11 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyRelation::__set_state(array(
                 'name' => 'Shortcuts',
                 'title' => 'Genvägslänkar bredvid sökruta',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'manyToManyRelation',
                 'relationType' => true,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => NULL,
                 'width' => 800,
                 'height' => '',
                 'maxItems' => NULL,
                 'assetUploadPath' => '',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'page',
                  ),
                  1 => 
                  array (
                    'documentTypes' => 'link',
                  ),
                ),
                 'enableTextSelection' => false,
              )),
              12 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyRelation::__set_state(array(
                 'name' => 'Departments',
                 'title' => 'Departments',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'manyToManyRelation',
                 'relationType' => true,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'width' => 800,
                 'height' => '',
                 'maxItems' => NULL,
                 'assetUploadPath' => '',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'page',
                  ),
                  1 => 
                  array (
                    'documentTypes' => 'link',
                  ),
                ),
                 'enableTextSelection' => false,
              )),
              13 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\AdvancedManyToManyRelation::__set_state(array(
                 'name' => 'SiteInfo',
                 'title' => 'About this site',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'advancedManyToManyRelation',
                 'relationType' => true,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => NULL,
                 'width' => 800,
                 'height' => '',
                 'maxItems' => 1,
                 'assetUploadPath' => '',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'page',
                  ),
                  1 => 
                  array (
                    'documentTypes' => 'link',
                  ),
                ),
                 'enableTextSelection' => false,
                 'columns' => 
                array (
                ),
                 'columnKeys' => 
                array (
                ),
                 'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\ElementMetadata[]',
                 'optimizedAdminLoading' => false,
                 'enableBatchEdit' => NULL,
                 'allowMultipleAssignments' => NULL,
              )),
            ),
             'region' => NULL,
             'layout' => NULL,
             'width' => '',
             'height' => '',
             'maxTabs' => NULL,
             'border' => false,
             'provideSplitView' => NULL,
             'tabPosition' => 'top',
             'hideLabelsWhenTabsReached' => NULL,
             'referencedFields' => 
            array (
            ),
             'fieldDefinitionsCache' => NULL,
             'permissionView' => NULL,
             'permissionEdit' => NULL,
             'labelWidth' => 160,
             'labelAlign' => 'left',
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
         'labelWidth' => 200,
         'labelAlign' => 'left',
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
   'icon' => '/bundles/pimcoreadmin/img/icon/web-browser.png',
   'previewUrl' => '',
   'group' => '',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '',
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
