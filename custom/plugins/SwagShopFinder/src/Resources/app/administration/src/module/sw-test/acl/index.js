
Shopware.Service('privileges')
    .addPrivilegeMappingEntry({
        category: 'permissions',
        parent: 'catalogues',
        key: 'swag_shop_finder',
        roles: {
            viewer: {
                privileges: [
                    'swag_shop_finder:read',
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
                    'swag_shop_finder:update',
                    Shopware.Service('privileges').getPrivileges('media.creator'),
                ],
                dependencies: [
                    'swag_shop_finder.viewer',
                ],
            },
            creator: {
                privileges: [
                    'swag_shop_finder:create',
                ],
                dependencies: [
                    'swag_shop_finder.viewer',
                    'swag_shop_finder.editor',
                ],
            },
            deleter: {
                privileges: [
                    'swag_shop_finder:delete',
                ],
                dependencies: [
                    'swag_shop_finder.viewer',
                ],
            },
        },
    });
