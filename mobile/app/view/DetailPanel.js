/*
 * File: app/view/DetailPanel.js
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

Ext.define('Inyungu.view.DetailPanel', {
    extend: 'Ext.tab.Panel',
    alias: 'widget.detailpanel',

    requires: [
        'Ext.XTemplate',
        'Ext.tab.Bar'
    ],

    config: {
        items: [
            {
                xtype: 'container',
                title: 'Contact',
                iconCls: 'info',
                id: 'contact',
                items: [
                    {
                        xtype: 'container',
                        id: 'info',
                        padding: 10,
                        tpl: [
                            '<img class="photo" src="../images/products/{image}" width="100" height="100"/>;',
                            '<h2>{productname}</h2><div class="info">{firstname},{telephone}<br/>',
                            '</div>'
                        ],
                        layout: 'hbox',
                        items: [
                            {
                                xtype: 'component',
                                height: 100,
                                id: 'photo',
                                tpl: [
                                    '<img class="photo" src="images/{image}" width="100" height="100"/>'
                                ],
                                width: 100
                            },
                            {
                                xtype: 'component',
                                id: 'data',
                                padding: 10,
                                tpl: [
                                    '<h2>{productname}</h2><div class="info">',
                                    '',
                                    '<b>Amazina</b>   : {firstname} {lastname}<br/>',
                                    '<b>Telephoni</b> : {telephone}<br/>',
                                    '<b>Ingano</b>    : {quantity}{mesure}<br/>',
                                    '<b>Igiciro</b>   : {currentprice}frw<br/>',
                                    '<b>Igiciro c</b> : {totalamount}frw<br/>',
                                    '<b>Intara</b>    : {province}<br/>',
                                    '<b>Akarere</b>  : {district}<br/>',
                                    '<b>Umurenge</b>  : {umurenge}<br/>',
                                    '<b>Akagali</b>   : {akagali}<br/>',
                                    '<b>Italiki</b>   : {creationdate}<br/>',
                                    '<b>Muri make</b> : <p class="detail">{detail}</p><br/>',
                                    '',
                                    '</div>'
                                ]
                            }
                        ]
                    }
                ]
            },
            {
                xtype: 'container',
                title: 'About Us',
                iconCls: 'compose'
            }
        ],
        tabBar: {
            docked: 'bottom',
            hidden: false,
            layout: {
                type: 'hbox',
                pack: 'center'
            }
        }
    }

});