<template>
    <div>
        <b-card>Toplam Kulüp Sayısı : {{ totalClub }}</b-card>
        <b-table striped hover :items="clubs" :fields="fields"></b-table>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'

export default {
    name: "Club",
    data() {
        return {
            fields: [
                {key: 'name', label:'Kulüp Adı'},
                {key: 'scored_goal',label:'Attığı Goller'},
                {key: 'conceded_goal', label:'Yediği Goller'},
                {key: 'point',label:'Puan'},
                {key: 'capability',label:'Kabiliyet Yüzdesi'},
                {key: 'created_at',label:'Oluşturulma Tarihi'},
            ]
        }
    },
    computed: {
        ...mapGetters({
            clubs: 'clubs',
            totalClub: 'totalClub'
        }),
    },
    created() {
        this.fetchClubs()
    },
    methods: {
        ...mapActions({getClubs: 'getClubs'}),
        fetchClubs() {
            return this.getClubs();
        }
    }
}
</script>

<style scoped>

</style>
