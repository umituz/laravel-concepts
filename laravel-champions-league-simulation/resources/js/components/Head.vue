<template>
    <div>
        <b-jumbotron :header="header" >
            <p>{{ description }}</p>
        </b-jumbotron>
    </div>
</template>

<script>
export default {
    name: "Head",
    data(){
        return {
            header:'Şampiyonlar Ligi',
            description:'Monte Carlo Simülasyonu kullanılarak 4 takımın puan durumu hesaplanmıştır.'
        }
    }
}
</script>

<style scoped>

</style>
