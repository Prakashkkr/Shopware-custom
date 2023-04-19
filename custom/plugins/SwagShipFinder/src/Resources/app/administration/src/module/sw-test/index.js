import './page/sw-test-list';
import './page/sw-test-detail';
import './snippet/en-GB.json';
import './acl';

const { Module } =Shopware;
Module.register('sw-test', {
    type: 'core',
    name: 'test',
    title: 'sw-test.general.mainMenuItemGeneral',
    description: 'Manages the test of the application',
    version: '1.0.0',
    targetVersion: '1.0.0',
    color: '#57D9A3',
    icon: 'regular-products',
    favicon: 'icon-module-products.png',
    entity: 'swag_ship_finder',

    routes: {
        index: {
            components: {
                default: 'sw-test-list',
            },
            path: 'index',
            meta: {
                privilege: 'swag_ship_finder.viewer',
            },
        },
        create: {
            component: 'sw-test-detail',
            path: 'create',
            meta: {
                parentPath: 'sw.test.index',
                privilege: 'swag_ship_finder.creator',
            },
        },
        detail: {
            component: 'sw-test-detail',
            path: 'detail/:id',
            meta: {
                parentPath: 'sw.test.index',
                privilege: 'swag_ship_finder.viewer',
            },
            props: {
                default(route) {
                    return {
                        testId: route.params.id,
                    };
                },
            },
        },
    },

    navigation: [{
        path: 'sw.test.index',
        privilege: 'swag_ship_finder.viewer',
        label: 'sw-test.general.mainMenuItemList',
        id: 'sw-test',
        parent: 'sw-catalogue',
        color: '#57D9A3',
        position: 50,
    }],

});

