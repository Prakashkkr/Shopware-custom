import template from './sw-test-detail.html.twig';

const { Component, Mixin, Data: { Criteria } } = Shopware;

// const { mapPropertyErrors } = Shopware.Component.getComponentHelper();

Component.register('sw-test-detail', {
    template,

    inject: ['repositoryFactory', 'acl'],

    mixins: [
        Mixin.getByName('placeholder'),
        Mixin.getByName('notification'),
        Mixin.getByName('discard-detail-page-changes')('test'),
    ],

    shortcuts: {
        'SYSTEMKEY+S': 'onSave',
        ESCAPE: 'onCancel',
    },

    props: {
        testId: {
            type: String,
            required: false,
            default: null,
        },
    },
    data() {
        return {
            test: null,
            customFieldSets: [],
            isLoading: false,
            isSaveSuccessful: false,
            country: null,
            states: [],
        };
    },

    metaInfo() {
        return {
            title: this.$createTitle(this.identifier),
        };
    },

    computed: {
        identifier() {
            return this.placeholder(this.test, 'name');
        },

        testIsLoading() {
            return this.isLoading || this.test == null;
        },

        testRepository() {
            return this.repositoryFactory.create('swag_ship_finder');
        },

        mediaRepository() {
            return this.repositoryFactory.create('media');
        },
        countryCriteria() {
            const criteria = new Criteria(1, 25);
            criteria.addSorting(Criteria.sort('position', 'ASC'));
            return criteria;
        },
        stateCriteria() {
            if (!this.test.countryId) {
                return null;
            }

            const criteria = new Criteria(1, 25);
            criteria.addFilter(Criteria.equals('countryId', this.test.countryId));
            return criteria;
        },


        customFieldSetRepository() {
            return this.repositoryFactory.create('custom_field_set');
        },

        customFieldSetCriteria() {
            const criteria = new Criteria(1, null);
            criteria.addFilter(
                Criteria.equals('relations.entityName', 'swag_ship_finder'),
            );

            return criteria;
        },

        mediaUploadTag() {
            return `sw-test-detail--${this.test.id}`;
        },

        tooltipSave() {
            if (this.acl.can('swag_ship_finder.editor')) {
                const systemKey = this.$device.getSystemKey();

                return {
                    message: `${systemKey} + S`,
                    appearance: 'light',
                };
            }

            return {
                showDelay: 300,
                message: this.$tc('sw-privileges.tooltip.warning'),
                disabled: this.acl.can('order.editor'),
                showOnDisabledElements: true,
            };
        },

        tooltipCancel() {
            return {
                message: 'ESC',
                appearance: 'light',
            };
        },

        // ...mapPropertyErrors('test', ['street']),
    },

    watch: {
        testId() {
            this.createdComponent();
        },
        countryId: {
            immediate: true,
            handler(newId, oldId) {
                if (typeof oldId !== 'undefined') {
                    this.test.countryStateId = null;
                }
                console.log(newId);
                if (!this.countryId) {
                    this.country = null;
                    return Promise.resolve();
                }

                return this.countryRepository.get(this.countryId).then((country) => {
                    this.country = country;
                    this.getCountryStates();
                });
            },
        },
    },

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            Shopware.ExtensionAPI.publishData({
                id: 'sw-test-detail__test',
                path: 'test',
                scope: this,
            });
            if (this.testId) {
                this.loadEntityData();
                return;
            }

            Shopware.State.commit('context/resetLanguageToDefault');
            this.test = this.testRepository.create();
        },
        getCountryStates() {
            if (!this.country) {
                return Promise.resolve();
            }

            return this.countryStateRepository.search(this.stateCriteria).then((response) => {
                this.states = response;
            });
        },

        async loadEntityData() {
            this.isLoading = true;

            const [testResponse, customFieldResponse] = await Promise.allSettled([
                this.testRepository.get(this.testId),
                this.customFieldSetRepository.search(this.customFieldSetCriteria),
            ]);

            if (testResponse.status === 'fulfilled') {
                this.test = testResponse.value;
            }

            if (customFieldResponse.status === 'fulfilled') {
                this.customFieldSets = customFieldResponse.value;
            }

            if (testResponse.status === 'rejected' || customFieldResponse.status === 'rejected') {
                this.createNotificationError({
                    message: this.$tc(
                        'global.notification.notificationLoadingDataErrorMessage',
                    ),
                });
            }

            this.isLoading = false;
        },

        abortOnLanguageChange() {
            return this.testRepository.hasChanges(this.test);
        },

        saveOnLanguageChange() {
            return this.onSave();
        },

        onChangeLanguage() {
            this.loadEntityData();
        },

        setMediaItem({ targetId }) {
            this.test.mediaId = targetId;
        },

        setMediaFromSidebar(media) {
            this.test.mediaId = media.id;
        },

        onUnlinkLogo() {
            this.test.mediaId = null;
        },

        openMediaSidebar() {
            this.$refs.mediaSidebarItem.openContent();
        },

        onDropMedia(dragData) {
            this.setMediaItem({ targetId: dragData.id });
        },

        onSave() {
            if (!this.acl.can('swag_ship_finder.editor')) {
                return;
            }

            this.isLoading = true;

            this.testRepository.save(this.test).then(() => {
                this.isLoading = false;
                this.isSaveSuccessful = true;
                if (this.testId === null) {
                        this.$router.push({ name: 'sw.test.detail', params: { id: this.test.id } });
                    return;
                }
                this.loadEntityData();

            }).catch((exception) => {
                this.isLoading = false;
                this.createNotificationError({
                    message: this.$tc(
                        'global.notification.notificationSaveErrorMessageRequiredFieldsInvalid',
                    ),
                });
                throw exception;
            });
        },

        onCancel() {
            this.$router.push({ name: 'sw.test.index' });
        },
    },
});
