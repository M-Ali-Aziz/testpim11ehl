<?php
return [
    "default" => [                                              // this is the config for the default view
        "iconCls" => "pimcore_icon_perspective",
        "elementTree" => [
            [
                "type" => "documents",                          // document tree
                "position" => "left",
                "expanded" => false,                            //  there can be only one expanded view on each side
                "hidden" => false,
                "sort" => -3                                    // trees with lower values are shown first
            ],
            [
                "type" => "assets",
                "position" => "left",
                "expanded" => false,
                "hidden" => false,
                "sort" => -2
            ],
            [
                "type" => "objects",
                "position" => "left",
                "expanded" => false,
                "hidden" => false,
                "sort" => -1
            ]
        ],
        "dashboards" => [                                  // this is the standard setting for the welcome screen
            "predefined" => [
                "welcome" => [                             // internal key of the dashboard
                    "positions" => [
                        [                                  // left column
                            [
                                "id" => 1,
                                "type" => "pimcore.layout.portlets.modificationStatistic",
                                "config" => null                // additional config
                            ],
                            [
                                "id" => 2,
                                "type" => "pimcore.layout.portlets.modifiedAssets",
                                "config" => null
                            ]
                        ],
                        [
                            [
                                "id" => 3,
                                "type" => "pimcore.layout.portlets.modifiedObjects",
                                "config" => null
                            ],
                            [
                                "id" => 4,
                                "type" => "pimcore.layout.portlets.modifiedDocuments",
                                "config" => null
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ],
    "no Objects" => [
        "iconCls" => "pimcore_icon_perspective",
        "elementTree" => [
            [
                "type" => "documents",                          // document tree
                "position" => "left",
                "expanded" => false,                            //  there can be only one expanded view on each side
                "hidden" => false,
                "sort" => -3                                    // trees with lower values are shown first
            ],
            [
                "type" => "assets",
                "position" => "left",
                "expanded" => false,
                "hidden" => false,
                "sort" => -2
            ]
        ]
    ],
    "Assets only" => [
        "icon" => "/pimcore/static6/img/flat-color-icons/webcam.svg",
        "elementTree" => [
            [
                "type" => "assets",
                "position" => "left",                                      // show the asset tree on the right side
                "expanded" => false,                                       // expand it
                "hidden" => false,
                "sort" => -2
            ]
        ]
    ]
];
