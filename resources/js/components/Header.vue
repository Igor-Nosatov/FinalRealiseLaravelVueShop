<template>
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
                </div>
            </div>
        </nav>
    </div>
</header>
</template>
