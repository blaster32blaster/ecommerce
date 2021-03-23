<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 inventory-wrapper">
                <div class="inventory">
                    <div>
                        <span class="inventory-label">
                            Name :
                        </span>
                        <span
                        >
                            {{ inventoryData.product.product_name}}
                        </span>
                    </div>
                    <div class="inventory-details">
                        <div>
                            <span class="inventory-label">
                                Quantity :
                            </span>
                            <span
                            >
                                {{ inventoryData.quantity}}
                            </span>
                        </div>
                        <div>
                            <span class="product-label">
                                Color :
                            </span>
                            <span
                            >
                                {{ inventoryData.color}}
                            </span>
                        </div>
                        <div>
                            <span class="product-label">
                                Size :
                            </span>
                            <span
                            >
                                {{ inventoryData.size}}
                            </span>
                        </div>
                        <div>
                            <span class="product-label">
                                Price :
                            </span>
                            <span
                            >
                                {{ inventoryData.price_cents}}
                            </span>
                        </div>
                        <div>
                            <span class="product-label">
                                Cost :
                            </span>
                            <span
                            >
                                {{ inventoryData.cost_cents}}
                            </span>
                        </div>
                        <div>
                            <span class="product-label">SKU :</span>
                            <span
                            >
                                {{ inventoryData.sku }}
                            </span>
                        </div>
                    </div>
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
        name: "inventory",
        props: {
            inventory: {
                type: Object,
                default: () => {}
            }
        },
        data() {
            return {
                inventoryData: this.inventory,
                response: {},
            }
        },
        methods : {
        },
        mounted() {
        }
    }
</script>
<style>

</style
