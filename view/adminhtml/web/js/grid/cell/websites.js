/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
define([
    'Magento_Ui/js/grid/columns/column',
    'underscore'
], function (Column, _) {
    'use strict';

    return Column.extend({
        defaults: {
            bodyTmpl: 'Beeapps_AttributesManagement/grid/cell/websites-cell.html'
        },

        /**
         * Get websites grouped by type
         *
         * @param {Object} record - Record object
         * @returns {Array} Result array
         */
        getWebsitesGroupedByType: function (record) {
            var result = [];

            _.each(record[this.index], function (websites, type) {
                result.push({
                    type: type,
                    sites: websites
                });
            });

            return result;
        }
    });
});
