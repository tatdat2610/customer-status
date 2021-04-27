define([
    'uiComponent',
    'Magento_Customer/js/customer-data'
], function (Component, customerData) {
    'use strict';

    return Component.extend({
        initialize: function () {
            this._super();
            customerData.reload(['status_section'], true);
            this.header = customerData.get('status_section');
        }
    });
});
