<template>
    <div class="wrapper">
        <navigation></navigation>

        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: 'app',
    components: {
        navigation: () => import('./components/Navigation.vue'),
    }
}
</script>
<style lang="scss" scoped>
    
</style>