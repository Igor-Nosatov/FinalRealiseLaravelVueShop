<template>
<div>
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Wishlist Cart</h1>
                    <nav class="d-flex align-items-center">
                        <router-link to="/" class="nav-link">Home<span class="lnr lnr-arrow-right"></span></router-link>
                        <router-link to="/wishlist" class="nav-link">Wishlist</router-link>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Add to Order</th>
                                <th scope="col">Delete Products</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(wish, index) in wishlist">

                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img :src="wish.image" :alt="wish.name" class="img-fluid">
                                        </div>
                                        <div class="media-body">
                                            <p>{{wish.name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>${{wish.price}}</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="number" min="1" max="100" name="qty" id="sst" maxlength="12" v-model="wish.qty" title="Quantity:" class="input-text qty">
                                    </div>
                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="primary-btn" @click="addWishToOrder(wish)">Add to Order</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <button type="submit" class="primary-btn" @click="deleteWish(wish.id, index)">Delete Wish</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
</template>

<script>
export default {
    data() {
        return {
            wishlist: []
        }
    },
    methods: {
        fetchWishListProduct() {
            let url = `/api/wishlist`
            axios.get(url).then(response => {
                this.wishlist = response.data.wishlist;
            }).catch(error => {
                console.log(error)
            });
        },
        addWishToOrder(wish) {
            axios.post('/api/order/add', {
                name: wish.name,
                image: wish.image,
                price: wish.price,
                qty: wish.qty
            }).then(response => {
                console.log(response)
                this.name = ''
                this.image = ''
                this.price = ''
                this.qty = ''
            }).catch(error => {
                console.log(error)
            })
        },
        deleteWish(id, index) {
            axios.delete('/api/wishlist/delete/' + id).then(response => {
                console.log(response);
                this.wishlist.splice(index, 1)
            }).catch(error => {
                console.log(error)
            })
        }
    },
    mounted() {
        this.isLoggedIn = localStorage.getItem('jwt') != null
    },
    beforeMount() {
        this.fetchWishListProduct();
        if (localStorage.getItem('jwt') != null) {
            this.user = JSON.parse(localStorage.getItem('user'))
            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')
        }
    }
}
</script>
