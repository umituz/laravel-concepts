<template>
    <div>
        <Navbar />
        <div>
            <router-view :key="$route.fullPath"></router-view>
        </div>
    </div>
</template>

<script>
import Navbar from './Navbar'
export default {
    name: "App",
    components: {
        Navbar
    }
}
</script>

<style scoped>

</style>
