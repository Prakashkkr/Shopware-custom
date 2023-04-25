import template from './sw-blog-list.html.twig';

const { Component, Mixin } = Shopware;
const { Criteria } = Shopware.Data;

Component.register('sw-blog-list', {
    template,

    inject: ['repositoryFactory', 'acl'],

    mixins: [
        Mixin.getByName('listing'),
    ],

    data() {
        return {
            blogs: null,
            isLoading: true,
            sortBy: 'name',
            sortDirection: 'ASC',
            total: 0,
            searchConfigEntity: 'blog_finder',
        };
    },

    metaInfo() {
        return {
            title: this.$createTitle(),
        };
    },

    computed: {
        blogRepository() {
            return this.repositoryFactory.create('blog_finder');
        },

        blogColumns() {
            return [{
                property: 'name',
                dataIndex: 'name',
                allowResize: true,
                routerLink: 'sw.blog.detail',
                label: 'sw-blog.list.columnName',
                inlineEdit: 'string',
                primary: true,
            }, {
                property: 'active',
                label: 'sw-test-demo.list.columnActive',
                inlineEdit: 'boolean',
                allowResize: true,
                align: 'center',
            }];
        },

        blogCriteria() {
            const blogCriteria = new Criteria(this.page, this.limit);

            blogCriteria.setTerm(this.term);
            blogCriteria.addSorting(Criteria.sort(this.sortBy, this.sortDirection, this.naturalSorting));

            return blogCriteria;
        },
    },

    methods: {
        onChangeLanguage(languageId) {
            this.getList(languageId);
        },

        async getList() {
            this.isLoading = true;

            const criteria = await this.addQueryScores(this.term, this.blogCriteria);

            if (!this.entitySearchable) {
                this.isLoading = false;
                this.total = 0;

                return false;
            }

            if (this.freshSearchTerm) {
                criteria.resetSorting();
            }

            return this.blogRepository.search(criteria)
                .then(searchResult => {
                    this.blogs = searchResult;
                    this.total = searchResult.total;
                    this.isLoading = false;
                });
        },

        updateTotal({ total }) {
            this.total = total;
        },
    },
});