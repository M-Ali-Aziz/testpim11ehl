<?php 

return [
    3 => [
        "id" => 3,
        "name" => "events (sv)",
        "pattern" => "/^\\/(kalendarium)\\/(.*)/",
        "reverse" => "/%page/%key",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\EventsController::detailAction",
        "action" => NULL,
        "variables" => "page,key",
        "defaults" => "",
        "siteId" => [
            8
        ],
        "methods" => NULL,
        "priority" => 10,
        "creationDate" => 1478858071,
        "modificationDate" => 1678453116
    ],
    4 => [
        "id" => 4,
        "name" => "staff-list (sv)",
        "pattern" => "/^\\/(kontakt)\\/(v[0-9]+|list)/",
        "reverse" => "/%page/%id",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\StaffController::listAction",
        "action" => NULL,
        "variables" => "page,id",
        "defaults" => "",
        "siteId" => [
            8
        ],
        "methods" => NULL,
        "priority" => 10,
        "creationDate" => 1485778889,
        "modificationDate" => 1678453116
    ],
    14 => [
        "id" => 14,
        "name" => "news (preview)",
        "pattern" => "/\\/(sv\\/|en\\/)?(nyheter|news)\\/preview\\/(.*)/",
        "reverse" => "/{%lang/}%page/%id",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\NewsController::previewAction",
        "action" => NULL,
        "variables" => "lang,page,id",
        "defaults" => "",
        "siteId" => [

        ],
        "methods" => NULL,
        "priority" => 1,
        "creationDate" => 1479223798,
        "modificationDate" => 1678453116
    ],
    15 => [
        "id" => 15,
        "name" => "news (sv)",
        "pattern" => "/^\\/(nyheter)\\/(.*)/",
        "reverse" => "/%page/%id",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\NewsController::detailAction",
        "action" => NULL,
        "variables" => "page,id",
        "defaults" => "",
        "siteId" => [
            8
        ],
        "methods" => NULL,
        "priority" => 5,
        "creationDate" => 1485182167,
        "modificationDate" => 1678453116
    ],
    16 => [
        "id" => 16,
        "name" => "staff (sv)",
        "pattern" => "/^\\/(kontakt)\\/(.*)/",
        "reverse" => "/%page/%id",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\StaffController::detailAction",
        "action" => NULL,
        "variables" => "page,id",
        "defaults" => "",
        "siteId" => [
            8
        ],
        "methods" => NULL,
        "priority" => 5,
        "creationDate" => 1485245069,
        "modificationDate" => 1678453116
    ],
    22 => [
        "id" => 22,
        "name" => "news (sv+en)",
        "pattern" => "/^\\/(nyheter|en\\/news)\\/(.*)/",
        "reverse" => "/%page/%id",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\NewsController::detailAction",
        "action" => NULL,
        "variables" => "page,id",
        "defaults" => "",
        "siteId" => [
            12,
            3,
            14,
            2,
            17
        ],
        "methods" => NULL,
        "priority" => 5,
        "creationDate" => 1485350823,
        "modificationDate" => 1678453116
    ],
    24 => [
        "id" => 24,
        "name" => "events (sv+en)",
        "pattern" => "/^\\/(kalendarium|en\\/calendar)\\/(.*)/",
        "reverse" => "/%page/%key",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\EventsController::detailAction",
        "action" => NULL,
        "variables" => "page,key",
        "defaults" => "",
        "siteId" => [
            12,
            3,
            14,
            2,
            17
        ],
        "methods" => NULL,
        "priority" => 10,
        "creationDate" => 1485778600,
        "modificationDate" => 1678453116
    ],
    25 => [
        "id" => 25,
        "name" => "staff-list (sv+en)",
        "pattern" => "/^\\/(kontakt|en\\/contact)\\/(v[0-9]+|list)/",
        "reverse" => "/%page/%id",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\StaffController::listAction",
        "action" => NULL,
        "variables" => "page,id",
        "defaults" => "",
        "siteId" => [
            12,
            3,
            14,
            2
        ],
        "methods" => NULL,
        "priority" => 10,
        "creationDate" => 1485779007,
        "modificationDate" => 1678453116
    ],
    26 => [
        "id" => 26,
        "name" => "staff-search (sv+en)",
        "pattern" => "/^\\/(kontakt\\/sokresultat|en\\/contact\\/search)/",
        "reverse" => "/kontakt/sokresultat",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\StaffController::search.resultAction",
        "action" => NULL,
        "variables" => "",
        "defaults" => "",
        "siteId" => [
            12,
            3,
            14,
            2
        ],
        "methods" => NULL,
        "priority" => 4,
        "creationDate" => 1485779044,
        "modificationDate" => 1678453116
    ],
    27 => [
        "id" => 27,
        "name" => "staff-search (sv)",
        "pattern" => "/^\\/kontakt\\/sokresultat/",
        "reverse" => "/kontakt/sokresultat",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\StaffController::search.resultAction",
        "action" => NULL,
        "variables" => "",
        "defaults" => "",
        "siteId" => [
            8
        ],
        "methods" => NULL,
        "priority" => 4,
        "creationDate" => 1485779076,
        "modificationDate" => 1678453116
    ],
    28 => [
        "id" => 28,
        "name" => "news (en)",
        "pattern" => "/^\\/(news)\\/(.*)/",
        "reverse" => "/%page/%id",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\NewsController::detailAction",
        "action" => NULL,
        "variables" => "page,id",
        "defaults" => "",
        "siteId" => [
            13,
            18,
            9,
            16
        ],
        "methods" => NULL,
        "priority" => 5,
        "creationDate" => 1485784591,
        "modificationDate" => 1678453116
    ],
    29 => [
        "id" => 29,
        "name" => "staff-search (en)",
        "pattern" => "/^\\/contact\\/search/",
        "reverse" => "/kontakt/sokresultat",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\StaffController::search.resultAction",
        "action" => NULL,
        "variables" => NULL,
        "defaults" => NULL,
        "siteId" => [
            13,
            18,
            16
        ],
        "methods" => NULL,
        "priority" => 4,
        "creationDate" => 1485786751,
        "modificationDate" => 1678453116
    ],
    30 => [
        "id" => 30,
        "name" => "staff-list (en)",
        "pattern" => "/^\\/(contact)\\/(v[0-9]+|list)/",
        "reverse" => "/%page/%id",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\StaffController::listAction",
        "action" => NULL,
        "variables" => "page,id",
        "defaults" => "",
        "siteId" => [
            13,
            18,
            16
        ],
        "methods" => NULL,
        "priority" => 10,
        "creationDate" => 1485787061,
        "modificationDate" => 1678453116
    ],
    31 => [
        "id" => 31,
        "name" => "staff (sv+en)",
        "pattern" => "/^\\/(kontakt|en\\/contact)\\/(.*)/",
        "reverse" => "/%page/%id",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\StaffController::detailAction",
        "action" => NULL,
        "variables" => "page,id",
        "defaults" => "",
        "siteId" => [
            12,
            3,
            14,
            2
        ],
        "methods" => NULL,
        "priority" => 5,
        "creationDate" => 1485787248,
        "modificationDate" => 1678453116
    ],
    32 => [
        "id" => 32,
        "name" => "staff (en)",
        "pattern" => "/^\\/(contact)\\/(.*)/",
        "reverse" => "/%page/%id",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\StaffController::detailAction",
        "action" => NULL,
        "variables" => "page,id",
        "defaults" => NULL,
        "siteId" => [
            13,
            18,
            16
        ],
        "methods" => NULL,
        "priority" => 5,
        "creationDate" => 1485856567,
        "modificationDate" => 1678453116
    ],
    33 => [
        "id" => 33,
        "name" => "events (en)",
        "pattern" => "/^\\/(calendar)\\/(.*)/",
        "reverse" => "/%page/%key",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\EventsController::detailAction",
        "action" => NULL,
        "variables" => "page,key",
        "defaults" => "",
        "siteId" => [
            13,
            18,
            9,
            16
        ],
        "methods" => NULL,
        "priority" => 10,
        "creationDate" => 1485856660,
        "modificationDate" => 1678453116
    ],
    34 => [
        "id" => 34,
        "name" => "calendar (preview)",
        "pattern" => "/\\/(sv\\/|en\\/)?(calendar|kalender)\\/preview\\/(.*)/",
        "reverse" => "/{%lang/}%page/%id",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\EventsController::previewAction",
        "action" => NULL,
        "variables" => "lang,page,id",
        "defaults" => "",
        "siteId" => [

        ],
        "methods" => NULL,
        "priority" => 0,
        "creationDate" => 1517406753,
        "modificationDate" => 1678453116
    ],
    35 => [
        "id" => 35,
        "name" => "staff-sub-site-list (sv+en)",
        "pattern" => "/^\\/([^\\/,\\s]*)\\/([^\\/,\\s]*)\\/(v[0-9]+)\\/(v[0-9]+)/",
        "reverse" => "/%subsite/%lang/%instid/%id",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\StaffController::listAction",
        "action" => NULL,
        "variables" => "subsite,lang,instid,id",
        "defaults" => NULL,
        "siteId" => [
            8,
            13,
            18
        ],
        "methods" => [

        ],
        "priority" => 10,
        "creationDate" => 1634065833,
        "modificationDate" => 1634892442
    ],
    36 => [
        "id" => 36,
        "name" => "staff-sub-site-list (no lang)",
        "pattern" => "/^\\/([^\\/,\\s]*)\\/(v[0-9]+)\\/(v[0-9]+)/",
        "reverse" => "/%subsite/%instid/%id",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\StaffController::listAction",
        "action" => NULL,
        "variables" => "subsite,instid,id",
        "defaults" => NULL,
        "siteId" => [
            8,
            13,
            18
        ],
        "methods" => [

        ],
        "priority" => 10,
        "creationDate" => 1634892443,
        "modificationDate" => 1634892530
    ],
    37 => [
        "id" => 37,
        "name" => "staff-sub-site-list",
        "pattern" => "/^\\/(v[0-9]+)\\/(v[0-9]+)/",
        "reverse" => "/%instid/%id",
        "module" => NULL,
        "controller" => "AppBundle\\Controller\\StaffController::listAction",
        "action" => NULL,
        "variables" => "instid,id",
        "defaults" => NULL,
        "siteId" => [
            8,
            13,
            18
        ],
        "methods" => [

        ],
        "priority" => 10,
        "creationDate" => 1634892530,
        "modificationDate" => 1634892580
    ]
];
