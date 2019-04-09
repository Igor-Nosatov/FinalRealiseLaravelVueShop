<template>
        <div>
            <head-component></head-component>
            <router-view :key="$route.fullPath"></router-view>
            <footer-component></footer-component>
        </div>
</template>

<script>

</script>
