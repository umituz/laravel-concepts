<template>
    <div>
        <b-card>
            <b-button variant="success" @click="playAllMatches()">
                Tüm Maçları Oyna
            </b-button>
        </b-card>
        <b-card :title="title(week)" :key="week" v-for="(groupedFixtures,week) in fixtures">
            <b-card-text>
                <b-table fixed striped hover :items="groupedFixtures" :fields="fields"></b-table>
            </b-card-text>
        </b-card>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
    name: "Fixture",
    data() {
        return {
            fields: [
                {
                    key: "home_club",
                    label: "Ev Sahibi Takım"
                },
                {
                    key: "home_club_goal",
                    label: "Ev Sahibi Takım Gol Sayısı "
                },
                {
                    key: "away_club_goal",
                    label: "Deplasman Takım Gol Sayısı"
                },
                {
                    key: "away_club",
                    label: "Deplasman Takım"
                },
                {
                    key: "created_at",
                    label: "Maç Tarihi"
                },

            ],
        }
    },
    computed: {
        ...mapGetters({
            fixtures: 'fixtures'
        })
    },
    created() {
        this.fetchFixture()
    },
    methods: {
        ...mapActions({getFixture: 'getFixture'}),
        fetchFixture() {
            return this.getFixture();
        },
        title(item) {
            return item + '. Hafta';
        },
        playAllMatches() {
            axios.post('/api/matches/all')
                .then((response) => {
                    location.reload()
                })
                .catch((error) => console.log(error))
        },
    }
}
</script>

<style scoped>

</style>
