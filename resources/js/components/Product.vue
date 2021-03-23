<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 product-wrapper">
                <div class="product">
                    <div>
                        <span class="product-label">
                            Name :
                        </span>
                        <span
                            v-if="!editingEntry"
                        >
                            {{ productData.product_name}}
                        </span>
                        <span
                            v-if="editingEntry"
                        >
                            <input
                                type="text"
                                v-model="productData.product_name"
                            />
                        </span>
                    </div>
                    <div class="product-details">
                        <div>
                            <span class="product-label">
                                Style :
                            </span>
                            <span
                                v-if="!editingEntry"
                            >
                                {{ productData.style}}
                            </span>
                            <span
                                v-if="editingEntry"
                            >
                                <input
                                    type="text"
                                    v-model="productData.style"
                                />
                            </span>
                        </div>
                        <div>
                            <span class="product-label">Brand :</span>
                            <span
                                v-if="!editingEntry"
                            >
                                {{ productData.brand}}
                            </span>
                            <span
                                v-if="editingEntry"
                            >
                                <input
                                    type="text"
                                    v-model="productData.brand"
                                />
                            </span>
                        </div>
                        <div>
                            <span class="product-label">SKUS :</span>
                            <span
                                v-for="sku in skus"
                                v-bind:key="sku"
                            >
                                {{ sku }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="product-operations" v-if="!editingEntry">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" @click="editing">
                        <path class="icon edit-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" @click="deleting">
                        <path class="icon delete-icon" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="product-operations" v-if="editingEntry">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" @click="save">
                        <path class="icon save-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-7a2 2 0 012-2h2m3-4H9a2 2 0 00-2 2v7a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-1m-1 4l-3 3m0 0l-3-3m3 3V3" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" @click="cancel">
                        <path class="icon cancel-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Input from '../../../vendor/laravel/breeze/stubs/inertia/resources/js/Components/Input.vue';
import lib from '../library';
    export default {
  components: { Input },
        name: "product",
        props: {
            product: {
                type: Object,
                default: () => {}
            }
        },
        data() {
            return {
                skus: [],
                editingEntry: false,
                productData: this.product,
                respons: {},
            }
        },
        methods : {
            /**
             * set to editing mode
             */
            editing () {
                this.$emit('editing', this.product);
                this.editingEntry = true;
            },
            /**
             * delete
             */
            deleting () {
                lib.func.delete(this.product)
                .then(response => {
                    this.response = response.response;
                    }
                )
                .then(response => {
                    this.$emit('deleting', this.product);
                    }
                )
            },
            /**
             * save changes
             */
            save () {
                console.log('save')
                lib.func.update(this.product, this.productData)
                .then(response => {
                    this.response = response.response;
                    }
                )
                .then(response => {
                    console.log('were here');
                    this.editingEntry = false;
                    this.$emit('saving', this.product);
                    }
                )
            },
            /**
             * cancel editing
             */
            cancel () {
                console.log('cancel');
                this.editingEntry = false;
                this.productData = this.product;
            }
        },
        mounted() {
            this.skus = this.productData.inventories.map(a => a.sku);
        }
    }
</script>
<style>

</style
