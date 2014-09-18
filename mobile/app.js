/*
 * File: app.js
 *
 * This file was generated by Sencha Architect version 3.0.1.
 * http://www.sencha.com/products/architect/
 *
 * This file requires use of the Sencha Touch 2.3.x library, under independent license.
 * License of Sencha Architect does not include license for Sencha Touch 2.3.x. For more
 * details see http://www.sencha.com/license or contact license@sencha.com.
 *
 * This file will be auto-generated each and everytime you save your project.
 *
 * Do NOT hand edit this file.
 */

// @require @packageOverrides
Ext.Loader.setConfig({

});


Ext.application({
    views: [
        'DetailPanel',
        'ListContainer'
    ],
    controllers: [
        'Products',
        'PeopleSearch'
    ],
    name: 'Inyungu',

    launch: function() {

        Ext.create('Inyungu.view.MainNav', {fullscreen: true});
    }

});
