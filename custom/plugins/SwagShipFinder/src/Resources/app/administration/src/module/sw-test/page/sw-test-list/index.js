import template from './sw-test-list.html.twig';

const { Component, Mixin } = Shopware;
const { Criteria } = Shopware.Data;

Component.register('sw-test-list', {
    template,

    inject: ['repositoryFactory', 'acl'],

    mixins: [
        Mixin.getByName('listing'),
    ],

    data() {
        return {
            tests: null,
            isLoading: true,
            sortBy: 'name',
            sortDirection: 'ASC',
            total: 0,
            searchConfigEntity: 'swag_ship_finder',
        };
    },

    metaInfo() {
        return {
            title: this.$createTitle(),
        };
    },

    computed: {
        testRepository() {
            return this.repositoryFactory.create('swag_ship_finder');
        },

        customerColumns() {
            return this.getCustomerColumns();
        },

        testColumns() {
            return [{
                property: 'name',
                dataIndex: 'name',
                allowResize: true,
                routerLink: 'sw.test.detail',
                label: 'sw-test.list.columnName',
                inlineEdit: 'string',
                primary: true,
            },{
                property: 'city',
                dataIndex: 'city',
                allowResize: true,
                routerLink: 'sw.test.detail',
                label: 'sw-test.list.columnCity',
                inlineEdit: 'string',
                primary: true,
            },{
                property: 'countryStateId',
                dataIndex: 'State',
                allowResize: true,
                routerLink: 'sw.test.detail',
                label: 'sw-test.list.columnCountryStateId',
                inlineEdit: 'string',
                primary: true,
            }, {
                    property: 'country_id',
                    dataIndex: 'Country',
                    allowResize: true,
                    routerLink: 'sw.test.detail',
                    label: 'sw-test.list.columnCountryId',
                    inlineEdit: 'string',
                    primary: true,
              },
                {
                    property: 'product_id',
                    dataIndex: 'Product',
                    allowResize: true,
                    routerLink: 'sw.test.detail',
                    label: 'sw-test.list.columnProductId',
                    inlineEdit: 'string',
                    primary: true,
                },
                {
                    property: 'media_id',
                    dataIndex: 'Media',
                    allowResize: true,
                    routerLink: 'sw.test.detail',
                    label: 'sw-test.list.columnMediaId',
                    inlineEdit: 'string',
                    primary: true,
                }];
        },



        testCriteria() {
            const testCriteria = new Criteria(this.page, this.limit);

            testCriteria.setTerm(this.term);
            testCriteria.addSorting(Criteria.sort(this.sortBy, this.sortDirection, this.naturalSorting));

            return testCriteria;
        },
    },

    methods: {
        onChangeLanguage(languageId) {
            this.getList(languageId);
        },

        async getList() {
            this.isLoading = true;

            const criteria = await this.addQueryScores(this.term, this.testCriteria);

            if (!this.entitySearchable) {
                this.isLoading = false;
                this.total = 0;

                return false;
            }

            if (this.freshSearchTerm) {
                criteria.resetSorting();
            }

            return this.testRepository.search(criteria)
                .then(searchResult => {
                    this.test = searchResult;
                    this.total = searchResult.total;
                    this.isLoading = false;
                });
        },

        updateTotal({ total }) {
            this.total = total;
        },
    },
});
