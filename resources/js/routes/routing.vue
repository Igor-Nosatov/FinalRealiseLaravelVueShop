import Home from '../views/home/Home';
import Shop from '../views/shop/Shop';
import Category from '../views/shop/Category';
import Login from '../views/Login';
import Register from '../views/Register'
import SingleProduct from '../views/single_product/SingleProduct';
import Checkout from '../views/Checkout';
import Cart from '../views/Cart';
import Wishlist from '../views/Wishlist';
import Contact from '../views/Contact';

const routes = [{
        name: 'home',
        path: '/',
        component: Home
    },
    {
        path: '/shop',
        name: 'shop',
        component: Shop
    },
    {
        path: '/category/:id',
        name: 'category',
        component: Category
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    },
    {
        path: '/product/:id',
        name: 'single-products',
        component: SingleProduct
    },
    {
        path: '/cart',
        name: 'cart',
        component: Cart,

    },
    {
        path: '/wishlist',
        name: 'wishlist',
        component: Wishlist,
    },
    {
        path: '/checkout',
        name: 'checkout',
        component: Checkout,
    },
    {
        path: '/contact',
        name: 'contact',
        component: Contact,
    }
]
export default routes
