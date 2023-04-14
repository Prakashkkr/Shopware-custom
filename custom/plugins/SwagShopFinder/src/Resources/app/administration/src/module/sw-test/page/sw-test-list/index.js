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
            test: null,
            isLoading: true,
            sortBy: 'name',
            sortDirection: 'ASC',
            total: 0,
            searchConfigEntity: 'swag_shop_finder',
        };
    },

    metaInfo() {
        return {
            title: this.$createTitle(),
        };
    },

    computed: {
        testRepository() {
            return this.repositoryFactory.create('swag_shop_finder');
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
                property: 'course',
                dataIndex: 'course',
                allowResize: true,
                routerLink: 'sw.test.detail',
                label: 'sw-test.list.columnCourse',
                inlineEdit: 'string',
                primary: true,
            },{
                    property: 'mobile_no',
                    dataIndex: 'mobile_no',
                    allowResize: true,
                    routerLink: 'sw.test.detail',
                    label: 'sw-test.list.columnMobile_no',
                    inlineEdit: 'string',
                    primary: true,
              },{
                property: 'image',
                dataIndex: 'image',
                allowResize: true,
                routerLink: 'sw.test.detail',
                label: 'sw-test.list.columnImage',
                inlineEdit: 'string',
                primary: true,
            },{
                property: 'description',
                dataIndex: 'description',
                allowResize: true,
                routerLink: 'sw.test.detail',
                label: 'sw-test.list.columnDescription',
                inlineEdit: 'string',
                primary: true,
            },

            ];
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
