(function ($) {
    "use strict";

    $(function () {

        var components = {
            "key": "HTML Generators",
            "views": [
                {
                    "component": {
                        "id": "button",
                        "label": "Button",
                        "description": "Create a button with different style and size options.",
                        "icon": "fa-2x fa-th-large"
                    },
                    "options": {
                        "preview": true,
                        "type": "shortcode",
                        "shortcode_id": "button",
                        "shortcode_atts": ["label", "style", "size"],
                        "label": "Button",
                        "style": "default",
                        "size": "default",
                        "form": [
                            {
                                "name": "label",
                                "label": "Button Text",
                                "type": "input"
                            },
                            {
                                "name": "style",
                                "label": "Style",
                                "type": "select",
                                "values": { "default": "Default", "primary": "Primary", "success": "Success", "danger": "Danger" }
                            },
                            {
                                "name": "size",
                                "label": "Size",
                                "type": "select",
                                "values": { "default": "Default", "sm": "Small", "xs": "Extra Small", "lg": "Large" }
                            }
                        ]
                    }
                }
            ]
        };

        $(document).on('loaded.ComponentsCtrl.builder', function()
        {
            var Components = angular.element('[ng-controller="ComponentsCtrl"]').scope();
            if (typeof Components !== 'undefined' && typeof Components.components !== 'undefined')
                Components.append(components);
        });

    });

})(jQuery);