
<template>
<div class="main-block">
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shop Category page</h1>
                    <nav class="d-flex align-items-center">
                    <router-link to="/" class="nav-link">Home<span class="lnr lnr-arrow-right"></span></router-link>
                    <router-link to="/shop" class="nav-link">Shop</router-link>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Browse Categories</div>
                    <ul class="main-categories">
                        <li v-for="(category,index) in categories" @key="index">
                            <router-link :to="{name: 'category', params: {id: category.id}}" class="nav-link">{{category.name}}<span>({{category.name.length}})</span></router-link>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-filter mt-50">
                    <div class="top-filter-head">Product Filters</div>
                    <div class="common-filter">
                        <div class="head">Brands</div>
                        <form>
                            <ul>
                                <li class="filter-list" v-for="brand in brands">
                                    <input class="pixel-radio" type="radio" id="apple" name="brand" :value="brand.id" v-model="selectedBrand">
                                    <label for="apple">{{ brand.name }}
                                        <span>({{brand.name.length}})</span>
                                    </label>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div class="common-filter">
                        <div class="head">Color</div>
                        <form>
                            <ul>
                                <li class="filter-list" v-for="color in colors">
                                    <input class="pixel-radio" type="radio" id="black" name="color" :value="color.id" v-model="selectedColor">
                                    <label for="black">{{ color.name }}
                                        <span>({{color.name.length}})</span>
                                    </label>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div class="common-filter">
                        <div class="head">Price</div>
                        <div class="wrap-grid">
                            <div class="wrap-flex">
                                <input type="range" class="minPrice" v-model="minPrice" min="0" max="149" value="0" step="10">
                                <input type="range" class="maxPrice" v-model="maxPrice" min="150" max="300" value="300" step="10">
                            </div>
                        </div>
                        <div class="wrap-grid">
                            <div class="wrap-flex">
                                <span class="min">{{minPrice}}</span>
                                <span class="max">{{maxPrice}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sortAndsearch">
                        <div>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort By
                                </button>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" @click="sortProducts('price', 'asc')" type="button">low to high price</button>
                                    <button class="dropdown-item" @click="sortProducts('price', 'desc')" type="button">high to low price</button>
                                    <button class="dropdown-item" @click="sortProducts('name', 'asc')" type="button">sort by asc</button>
                                    <button class="dropdown-item" @click="sortProducts('name', 'desc')" type="button">sort by desc</button>
                                </div>
                            </div>
                        </div>
                        <form class="d-flex justify-content-between">
                            <input type="text" class="search" v-model="search" placeholder="search" />
                        </form>
                    </div>
                    <div class="pagination ml-auto">
                        <div v-for="pageNumber in totalPages" v-if="Math.abs(pageNumber - currentPage) < 3 || pageNumber == totalPages || pageNumber == 1">
                            <a v-bind:key="pageNumber" @click="setPage(pageNumber)" :class="{'current': currentPage === pageNumber }">{{ pageNumber }}</a>
                        </div>
                    </div>
                </div>
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        <div class="col-lg-4 col-md-6" v-for="(product, index) in displayProducts" @key="index">
                            <div class="single-product">
                                <router-link :to="{ path: '/product/'+product.id}">
                                    <img :src="product.image" :alt="product.name" class="img-fluid">
                                </router-link>
                                <div class="product-details">
                                    <h6>{{ product.name }}</h6>
                                    <div class="price">
                                        <h6>${{ product.price }}</h6>
                                        <h6 class="l-through">${{ product.old_price }}</h6>
                                        <div class="product_count">
                                            <input type="number" min="1" max="100" v-model="product.qty" name="qty" id="sst" maxlength="12" value=""  title="Quantity:" class="input-text qty">
                                        </div>
                                    </div>
                                    <div class="prd-bottom">
                                        <a class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text"> <button class="add-btn" @click="addToCart(product)">Cart</button></p>
                                        </a>
                                        <a class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text"><button class="add-btn" @click="addWishlist(product)">Wishlist</button>Wishlist</p>
                                        </a>

                                        <router-link :to="{ path: '/product/'+product.id}" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">view more</p>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sortAndsearch">
                        <div>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort By
                                </button>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" @click="sortProducts('price', 'asc')" type="button">low to high price</button>
                                    <button class="dropdown-item" @click="sortProducts('price', 'desc')" type="button">high to low price</button>
                                    <button class="dropdown-item" @click="sortProducts('name', 'asc')" type="button">sort by asc</button>
                                    <button class="dropdown-item" @click="sortProducts('name', 'desc')" type="button">sort by desc</button>
                                </div>
                            </div>
                        </div>
                        <form class="d-flex justify-content-between">
                            <input type="text" class="search" v-model="search" placeholder="search" />
                        </form>
                    </div>
                    <div class="pagination ml-auto">
                        <div v-for="pageNumber in totalPages" v-if="Math.abs(pageNumber - currentPage) < 3 || pageNumber == totalPages || pageNumber == 1">
                            <a v-bind:key="pageNumber" @click="setPage(pageNumber)" :class="{'current': currentPage === pageNumber }">{{ pageNumber }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    created() {
        this.fetchProducts();
    },
    data() {
        return {
            products: [],
            currentPage: 1,
            productsPerPage: 9,
            resultCount: 1,
            categories: [],
            colors: [],
            brands: [],
            selectedBrand: '',
            selectedColor: '',
            sort: '',
            minPrice: 0,
            maxPrice: 300,
            search: ''
        }
    },
    methods: {
        fetchProducts() {
            let url = `/api/shop`
            axios.get(url).then(response => {
                this.products = response.data.products;
                this.categories = response.data.categories;
                this.colors = response.data.colors;
                this.brands = response.data.brands;
            }).catch(error => {
                console.log(error)
            });
        },
        paginate(products) {
            let page = this.currentPage;
            let productsPerPage = this.productsPerPage;
            let from = (page * productsPerPage) - productsPerPage;
            let to = (page * productsPerPage);
            return products.slice(from, to);
        },
        setPage(pageNumber) {
            this.currentPage = pageNumber;
        },
        sortProducts(key, direction) {
            this.sort = `${key} > ${direction}`
            if (direction === 'asc') {
                this.products.sort((a, b) => a[key] > b[key] ? 1 : -1)
            } else {
                this.products.sort((a, b) => a[key] < b[key] ? 1 : -1)
            }
        },
        addToCart(product) {
            axios.post('/api/cart/add', {
                name: product.name,
                image: product.image,
                price: product.price,
                qty: product.qty
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
        addWishlist(product) {
            axios.post('/api/wishlist/add', {
                name: product.name,
                image: product.image,
                price: product.price,
                qty: product.qty
            }).then(response => {
                console.log(response)
                this.name = ''
                this.image = ''
                this.price = ''
                this.qty = ''
            }).catch(error => {
                console.log(error)
            })
        }
    },
    computed: {
        searchProducts() {
            return this.products.filter(product => {
                return product.name.toLowerCase().includes(this.search.toLowerCase());
            })
        },
        filterProducts() {
            let vm = this,
                products = vm.searchProducts
            let filter_products = _.filter(products, function(query) {
                let brand = vm.selectedBrand ? (query.brand_id == vm.selectedBrand) : true,
                    color = vm.selectedColor ? (query.color_id == vm.selectedColor) : true,
                    price = query.price >= vm.minPrice && query.price <= vm.maxPrice;
                return brand && color && price
            });
            return filter_products;
        },
        displayProducts() {
            return this.paginate(this.filterProducts);
        },
        totalPages() {
            let pageCount = this.resultCount = this.filterProducts.length;
            return Math.ceil(this.resultCount / this.productsPerPage)
        }
    }
}
</script>
