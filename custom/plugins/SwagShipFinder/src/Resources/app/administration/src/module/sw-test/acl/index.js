/*
 * @package inventory
 */

Shopware.Service('privileges')
    .addPrivilegeMappingEntry({
        category: 'permissions',
        parent: 'catalogues',
        key: 'swag_ship_finder',
        roles: {
            viewer: {
                privileges: [
                    'swag_ship_finder:read',
                    'custom_field_set:read',
                    'custom_field:read',
                    'custom_field_set_relation:read',
                    Shopware.Service('privileges').getPrivileges('media.viewer'),
                    'user_config:read',
                    'user_config:create',
                    'user_config:update',
                ],
                dependencies: [],
            },
            editor: {
                privileges: [
                    'swag_ship_finder:update',
                    Shopware.Service('privileges').getPrivileges('media.creator'),
                ],
                dependencies: [
                    'swag_ship_finder.viewer',
                ],
            },
            creator: {
                privileges: [
                    'swag_ship_finder:create',
                ],
                dependencies: [
                    'swag_ship_finder.viewer',
                    'swag_ship_finder.editor',
                ],
            },
            deleter: {
                privileges: [
                    'swag_ship_finder:delete',
                ],
                dependencies: [
                    'swag_ship_finder.viewer',
                ],
            },
        },
    });
