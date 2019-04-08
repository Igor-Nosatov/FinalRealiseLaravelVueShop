<template>
<div>
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item">
                                <router-link :to="{ name: 'home' }" class="nav-link">Home</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="{ name: 'shop' }" class="nav-link">Shop</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="{ name: 'cart' }" class="nav-link">Cart</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="{ name: 'contact' }" class="nav-link">Contact</router-link>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <router-link :to="{ name: 'cart' }" class="nav-link">
                                    <span class="ti-bag"></span>
                                </router-link>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <router-link :to="{ name: 'wishlist' }" class="nav-link">
                                    <span class="ti-heart"></span>
                                </router-link>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <router-link :to="{ name: 'login' }" class="nav-link" v-if="!isLoggedIn">Login</router-link>
                            <router-link :to="{ name: 'register' }" class="nav-link" v-if="!isLoggedIn">Register</router-link>
                            <span v-if="isLoggedIn">
                                <router-link :to="{ name: 'userboard' }" class="nav-link" v-if="user_type == 0"> Hi, {{name}}</router-link>
                                <router-link :to="{ name: 'admin' }" class="nav-link" v-if="user_type == 1"> Hi, {{name}}</router-link>
                            </span>
                            <li class="nav-link" v-if="isLoggedIn" @click="logout"> Logout</li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <router-view :key="$route.fullPath" @loggedIn="change"></router-view>
    <footer-component></footer-component>
</div>
</template>


<script>
    export default {
        data() {
            return {
                name: null,
                user_type: 0,
                isLoggedIn: localStorage.getItem('shop.jwt') != null
            }
        },
        mounted() {
            this.setDefaults()
        },
        methods : {
            setDefaults() {
                if (this.isLoggedIn) {
                    let user = JSON.parse(localStorage.getItem('shop.user'))
                    this.name = user.name
                    this.user_type = user.is_admin
                }
            },
            change() {
                this.isLoggedIn = localStorage.getItem('shop.jwt') != null
                this.setDefaults()
            },
            logout(){
                localStorage.removeItem('shop.jwt')
                localStorage.removeItem('shop.user')
                this.change()
                this.$router.push('/')
            }
        }
    }
    </script>
