<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div>
                    There are : {{ inventoryData.length }} inventory items in the system for {{ user.name }}.
                </div>
                <div>
                    <select v-model="filteredProperty">
                        <option value="id">Product ID</option>
                        <option value="sku">SKU</option>
                        <option value="inventory_threshold">Inventory Threshold</option>
                    </select>
                    <input
                        placeholder="filter value"
                        v-model="search"
                    >
                </div>
                <div
                    v-for="inventory in filteredList"
                    v-bind:key="inventory.id"
                    class="inventory-item-wrapper"
                >
                    <inventory
                        :inventory="inventory"
                    >
                    </inventory>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import inventory from './Inventory';
    import lib from '../library';
    export default {
        name: "inventories",
        components: {
            inventory
        },
        props: {
            inventories: {
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
                filteredProperty: 'id',
                search: '',
                inventoryData: this.inventories,
            }
        },
        computed: {
            filteredList() {
                if (!this.search) return this.inventoryData;

                if (this.filteredProperty === 'inventory_threshold') {
                    return this.inventoryData.filter((inv) => {
                        return inv.quantity <= this.search;
                    });
                }

                return this.inventoryData.filter((inv) => {
                    return inv[this.filteredProperty].toString().indexOf(this.search) > -1
                });
            },
        },
        methods : {
        },
        mounted() {
        }
    }
</script>
