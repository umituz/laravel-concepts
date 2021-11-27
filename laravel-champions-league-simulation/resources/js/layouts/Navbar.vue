<template>
    <div>
        <b-navbar toggleable="lg" type="dark" variant="info">
            <b-navbar-brand>
                <router-link :to="{ name:'homepage' }" tag="a" class="noLink">
                    MonteCarlo
                </router-link>
            </b-navbar-brand>
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <b-nav-item>
                        <router-link :to="{ name:'clubs' }" tag="li">
                            Futbol Takımları
                        </router-link>
                    </b-nav-item>
                    <b-nav-item>
                        <router-link :to="{ name:'fixtures' }" tag="li">
                            Fikstür
                        </router-link>
                    </b-nav-item>
                    <b-nav-item @click="generate()">
                        Yeni Sezon
                    </b-nav-item>
                </b-navbar-nav>

            </b-collapse>
        </b-navbar>
    </div>
</template>

<script>
export default {
    name: "Navbar",
    methods: {
        generate() {
            axios.post('/api/generate')
                .then((response) => {
                    this.$store.dispatch('setClubs', response.data.clubs);
                    this.$store.dispatch('setFixture', response.data.fixtures);
                    location.reload();
                })
                .catch((error) => console.log(error))
        }
    }
}
</script>

<style scoped>
.noLink {
    text-decoration: none;
    color: white
}
</style>
