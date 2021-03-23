<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div
                    v-for="product in productsData"
                    v-bind:key="product.id"
                    class="product-item-wrapper"
                >
                    <product
                        :product="product"
                        @editing="handleEdit"
                        @deleting="handleDelete"
                        @saving="handleSaving"
                    >
                    </product>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import product from './Product';
    import lib from '../library';
    export default {
        name: "products",
        components: {
            product
        },
        props: {
            products: {
                type: Array,
                default: () => []
            },
            user: {
                type: Object,
                default: () => {}
            },
        },
        data() {
            return {
                productsData: this.products,
            }
        },
        methods : {
            /**
             * set to edit
             */
            handleEdit () {
            },
            /**
             * handle product deletion
             */
            handleDelete (products) {
                this.updateProductData(products);
            },
            /**
             * handle product save
             */
            handleSaving () {
                this.updateProductData();
            },
            /**
             * fetch product data
             */
            updateProductData (products) {
                lib.func.updateProducts(this.user)
                        .then(response => {
                                this.productsData = [];
                                this.productsData = response.products;
                            }
                        )
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
