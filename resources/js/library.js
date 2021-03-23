export default {
    func: {
        /**
         * delete a product
         * @param {Product} product
         * @returns
         */
        delete (product) {
            let url = '/api/product/' + product.id

            return axios.delete(url)
            .then((response) => {
                return {
                    response: response.data
                }
            })
            .catch(error => {
                console.log('deleting product error')
            });
        },
        /**
         * update a product
         * @param {Product} product
         * @param {Array} data
         * @returns
         */
        update (product, data) {
            return axios.put('/api/product/' + product.id, {
                data: data
            })
            .then((response) => {
                return {
                    response: response.data
                }
            })
            .catch(error => {
                console.log('updating product error')
            });
        },
        /**
         * fetch product data
         * @param {User} user
         * @returns
         */
        updateProducts (user) {
            return axios.get('/api/user-products/' + user.id)
            .then((response) => {
                return {
                    products: response.data
                }
            })
                .catch(error => {
                    console.log('fetching products error')
                });
        },
        /**
         * fetch inventory data
         * @param {User} user
         * @returns
         */
        updateInventories (user) {
            console.log('were in lib');
            return axios.get('/api/user-inventories/' + user.id)
            .then((response) => {
                return {
                    inventories: response.data
                }
            })
                .catch(error => {
                    console.log('fetching inventories error')
                });
        },
    }
}
