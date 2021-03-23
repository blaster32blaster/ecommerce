<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>
                            Ecommerce
                        </span>
                        <button
                            v-if="!showInventory"
                            class="user-inventory-button"
                            @click="handleShowInventory"
                        >
                            User Inventory
                        </button>
                        <button
                            v-if="showInventory"
                            class="user-inventory-cancel-button"
                            @click="handleCancelShowInventory"
                        >
                            Bask to Products
                        </button>
                    </div>

                    <div class="card-body">
                        <productlist
                            v-if="!showInventory"
                            :products="products"
                            :user="user"
                        >
                        </productlist>
                        <inventorylist
                            v-if="showInventory"
                            :inventories="inventories"
                            :user="user"
                        >
                        </inventorylist>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import productlist from './ProductList';
    import inventorylist from './InventoryList';
    import lib from '../library';
import Inventory from './Inventory.vue';
    export default {
        name: "dashboard",
        components: {
            productlist,
            inventorylist
        },
        props: {
            user: {
                type: Object,
                default: () => {}
            },
            products: {
                type: Array,
                default: () => []
            }
        },
        data() {
            return {
                showInventory: false,
                inventories: [],
            }
        },
        methods : {
            /**
             * handle showing inventory
             */
            handleShowInventory () {
                this.showInventory = true;
            },
            /**
             * hnadle cancel showing inv
             */
            handleCancelShowInventory () {
                this.showInventory = false;
            },
            /**
             * fetch inventory data
             */
            fetchInventories () {
                console.log('were getting the invs')
                lib.func.updateInventories(this.user)
                        .then(response => {
                                console.log('here be the response');
                                this.inventories = [];
                                this.inventories = response.inventories;
                            }
                        )
            }
        },
        mounted() {
            this.fetchInventories();
        }
    }
</script>
<style scoped>
    .card-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
</style>
