<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - University [input]
 * - SoleMoveId [input]
 * - Country [select]
 * - Region [select]
 * - MobilityType [multiselect]
 * - Subject [multiselect]
 * - Programme [multiselect]
 * - Year [multiselect]
 * - Period [multiselect]
 */

return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => '24',
   'name' => 'University',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1695379109,
   'userOwner' => 1,
   'userModification' => 1,
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
         'name' => 'University',
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
                 'name' => 'University',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'University',
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
                     'name' => 'University',
                     'title' => 'University',
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
                     'width' => 500,
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
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'SoleMoveId',
                     'title' => 'SoleMOVE ID',
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
                     'width' => 250,
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'name' => 'Country',
                     'title' => 'Country',
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
                        'key' => 'Argentina',
                        'value' => 'Argentina',
                      ),
                      1 => 
                      array (
                        'key' => 'Australia',
                        'value' => 'Australia',
                      ),
                      2 => 
                      array (
                        'key' => 'Austria',
                        'value' => 'Austria',
                      ),
                      3 => 
                      array (
                        'key' => 'Belgium',
                        'value' => 'Belgium',
                      ),
                      4 => 
                      array (
                        'key' => 'Brazil',
                        'value' => 'Brazil',
                      ),
                      5 => 
                      array (
                        'key' => 'Canada',
                        'value' => 'Canada',
                      ),
                      6 => 
                      array (
                        'key' => 'Chile',
                        'value' => 'Chile',
                      ),
                      7 => 
                      array (
                        'key' => 'China',
                        'value' => 'China',
                      ),
                      8 => 
                      array (
                        'key' => 'Costa Rica',
                        'value' => 'Costa Rica',
                      ),
                      9 => 
                      array (
                        'key' => 'Czech Republic',
                        'value' => 'Czech Republic',
                      ),
                      10 => 
                      array (
                        'key' => 'Denmark',
                        'value' => 'Denmark',
                      ),
                      11 => 
                      array (
                        'key' => 'Finland',
                        'value' => 'Finland',
                      ),
                      12 => 
                      array (
                        'key' => 'France',
                        'value' => 'France',
                      ),
                      13 => 
                      array (
                        'key' => 'Germany',
                        'value' => 'Germany',
                      ),
                      14 => 
                      array (
                        'key' => 'Hong Kong',
                        'value' => 'Hong Kong',
                      ),
                      15 => 
                      array (
                        'key' => 'Hungary',
                        'value' => 'Hungary',
                      ),
                      16 => 
                      array (
                        'key' => 'Iceland',
                        'value' => 'Iceland',
                      ),
                      17 => 
                      array (
                        'key' => 'Indonesia',
                        'value' => 'Indonesia',
                      ),
                      18 => 
                      array (
                        'key' => 'Ireland',
                        'value' => 'Ireland',
                      ),
                      19 => 
                      array (
                        'key' => 'Italy',
                        'value' => 'Italy',
                      ),
                      20 => 
                      array (
                        'key' => 'Japan',
                        'value' => 'Japan',
                      ),
                      21 => 
                      array (
                        'key' => 'Korea, Republic of',
                        'value' => 'Korea, Republic of',
                      ),
                      22 => 
                      array (
                        'key' => 'Mexico',
                        'value' => 'Mexico',
                      ),
                      23 => 
                      array (
                        'key' => 'Morocco',
                        'value' => 'Morocco',
                      ),
                      24 => 
                      array (
                        'key' => 'Netherlands',
                        'value' => 'Netherlands',
                      ),
                      25 => 
                      array (
                        'key' => 'New Zealand',
                        'value' => 'New Zealand',
                      ),
                      26 => 
                      array (
                        'key' => 'Norway',
                        'value' => 'Norway',
                      ),
                      27 => 
                      array (
                        'key' => 'Poland',
                        'value' => 'Poland',
                      ),
                      28 => 
                      array (
                        'key' => 'Portugal',
                        'value' => 'Portugal',
                      ),
                      29 => 
                      array (
                        'key' => 'Russian Federation',
                        'value' => 'Russian Federation',
                      ),
                      30 => 
                      array (
                        'key' => 'Singapore',
                        'value' => 'Singapore',
                      ),
                      31 => 
                      array (
                        'key' => 'Slovenia',
                        'value' => 'Slovenia',
                      ),
                      32 => 
                      array (
                        'key' => 'South Africa',
                        'value' => 'South Africa',
                      ),
                      33 => 
                      array (
                        'key' => 'Spain',
                        'value' => 'Spain',
                      ),
                      34 => 
                      array (
                        'key' => 'Switzerland',
                        'value' => 'Switzerland',
                      ),
                      35 => 
                      array (
                        'key' => 'Taiwan',
                        'value' => 'Taiwan',
                      ),
                      36 => 
                      array (
                        'key' => 'United Kingdom',
                        'value' => 'United Kingdom',
                      ),
                      37 => 
                      array (
                        'key' => 'USA',
                        'value' => 'USA',
                      ),
                    ),
                     'width' => 250,
                     'defaultValue' => '',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'columnLength' => 190,
                     'dynamicOptions' => false,
                     'defaultValueGenerator' => '',
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'name' => 'Region',
                     'title' => 'Region',
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
                        'key' => 'Africa',
                        'value' => 'Africa',
                      ),
                      1 => 
                      array (
                        'key' => 'Asia',
                        'value' => 'Asia',
                      ),
                      2 => 
                      array (
                        'key' => 'Europe',
                        'value' => 'Europe',
                      ),
                      3 => 
                      array (
                        'key' => 'Latin America',
                        'value' => 'Latin America',
                      ),
                      4 => 
                      array (
                        'key' => 'North America',
                        'value' => 'North America',
                      ),
                      5 => 
                      array (
                        'key' => 'Oceania',
                        'value' => 'Oceania',
                      ),
                    ),
                     'width' => 250,
                     'defaultValue' => '',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'columnLength' => 190,
                     'dynamicOptions' => false,
                     'defaultValueGenerator' => '',
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'name' => 'MobilityType',
                     'title' => 'Mobility Type',
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
                        'key' => 'Exchange',
                        'value' => 'Exchange',
                      ),
                      1 => 
                      array (
                        'key' => 'Double degree',
                        'value' => 'Double degree',
                      ),
                      2 => 
                      array (
                        'key' => 'International Master Class',
                        'value' => 'International Master Class',
                      ),
                      3 => 
                      array (
                        'key' => 'Summer exchange',
                        'value' => 'Summer exchange',
                      ),
                      4 => 
                      array (
                        'key' => 'Spare exchange places',
                        'value' => 'Spare exchange places',
                      ),
                      5 => 
                      array (
                        'key' => 'Tuition-based',
                        'value' => 'Tuition-based',
                      ),
                    ),
                     'width' => 250,
                     'height' => '',
                     'maxItems' => NULL,
                     'renderType' => 'tags',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'dynamicOptions' => false,
                  )),
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'name' => 'Subject',
                     'title' => 'Subject',
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
                        'key' => 'Business Administration',
                        'value' => 'Business Administration',
                      ),
                      1 => 
                      array (
                        'key' => 'Business Law',
                        'value' => 'Business Law',
                      ),
                      2 => 
                      array (
                        'key' => 'Economic History',
                        'value' => 'Economic History',
                      ),
                      3 => 
                      array (
                        'key' => 'Economics',
                        'value' => 'Economics',
                      ),
                      4 => 
                      array (
                        'key' => 'Informatics',
                        'value' => 'Informatics',
                      ),
                      5 => 
                      array (
                        'key' => 'Statistics',
                        'value' => 'Statistics',
                      ),
                      6 => 
                      array (
                        'key' => 'Other',
                        'value' => 'Other',
                      ),
                    ),
                     'width' => 250,
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
                 'labelWidth' => 100,
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
             'name' => 'Layout',
             'type' => NULL,
             'region' => 'east',
             'title' => '',
             'width' => 450,
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
                 'name' => 'Layout',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Programme info',
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
                     'name' => 'Programme',
                     'title' => 'Programme',
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
                        'key' => 'BSc Economy and Society',
                        'value' => 'BSc Economy and Society',
                      ),
                      1 => 
                      array (
                        'key' => 'BSc International Business',
                        'value' => 'BSc International Business',
                      ),
                      2 => 
                      array (
                        'key' => 'Ekonomie kandidatprogram',
                        'value' => 'Ekonomie kandidatprogram',
                      ),
                      3 => 
                      array (
                        'key' => 'Fristående kurser',
                        'value' => 'Fristående kurser',
                      ),
                      4 => 
                      array (
                        'key' => 'Human Resources kandidatprogram',
                        'value' => 'Human Resources kandidatprogram',
                      ),
                      5 => 
                      array (
                        'key' => 'Politices kandidatprogram',
                        'value' => 'Politices kandidatprogram',
                      ),
                      6 => 
                      array (
                        'key' => 'Praktisk filosofi, politik och ekonomi (kandidatprogram)',
                        'value' => 'PPE',
                      ),
                      7 => 
                      array (
                        'key' => 'Systemvetenskapligt kandidatprogram',
                        'value' => 'Systemvetenskapligt kandidatprogram',
                      ),
                      8 => 
                      array (
                        'key' => '---',
                        'value' => '---',
                      ),
                      9 => 
                      array (
                        'key' => 'MSc Accounting and Finance',
                        'value' => 'MSc Accounting and Finance',
                      ),
                      10 => 
                      array (
                        'key' => 'MSc Data Analytics and Business Economics',
                        'value' => 'MSc Data Analytics and Business Economics',
                      ),
                      11 => 
                      array (
                        'key' => 'MSc Entrepreneurship and Innovation',
                        'value' => 'MSc Entrepreneurship and Innovation',
                      ),
                      12 => 
                      array (
                        'key' => 'MSc Economics',
                        'value' => 'MSc Economics',
                      ),
                      13 => 
                      array (
                        'key' => 'MSc European and International Trade and Tax Law',
                        'value' => 'MSc European and International Trade and Tax Law',
                      ),
                      14 => 
                      array (
                        'key' => 'MSc Finance',
                        'value' => 'MSc Finance',
                      ),
                      15 => 
                      array (
                        'key' => 'MSc Information Systems',
                        'value' => 'MSc Information Systems',
                      ),
                      16 => 
                      array (
                        'key' => 'MSc Innovation and Global Sustainable Development',
                        'value' => 'MSc Innovation and Global Sustainable Development',
                      ),
                      17 => 
                      array (
                        'key' => 'MSc International Marketing and Brand Management',
                        'value' => 'MSc International Marketing and Brand Management',
                      ),
                      18 => 
                      array (
                        'key' => 'MSc International Strategic Management',
                        'value' => 'MSc International Strategic Management',
                      ),
                      19 => 
                      array (
                        'key' => 'MSc in Management',
                        'value' => 'MSc in Management',
                      ),
                      20 => 
                      array (
                        'key' => 'MSc Managing People, Knowledge and Change',
                        'value' => 'MPKC',
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
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'name' => 'Year',
                     'title' => 'Year',
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
                        'key' => '2022',
                        'value' => '2022',
                      ),
                      1 => 
                      array (
                        'key' => '2023',
                        'value' => '2023',
                      ),
                      2 => 
                      array (
                        'key' => '2024',
                        'value' => '2024',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'name' => 'Period',
                     'title' => 'Period',
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
                        'key' => 'Autumn',
                        'value' => 'Autumn',
                      ),
                      1 => 
                      array (
                        'key' => 'Spring',
                        'value' => 'Spring',
                      ),
                      2 => 
                      array (
                        'key' => 'Summer',
                        'value' => 'Summer',
                      ),
                      3 => 
                      array (
                        'key' => 'Full Year',
                        'value' => 'Full Year',
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
         'icon' => '',
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
   'icon' => '/bundles/pimcoreadmin/img/twemoji/1f310.svg',
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
