const { createApp } = Vue;

createApp({
    data() {
        return {
            discs: [],
            isClicked: false,
            cardSelected: {},
        };
    },
    mounted() {
        this.loadData(); // Carica i dati iniziali
    },
    methods: {
        loadData() {
            axios.get('http://localhost:8888/php-dischi-json/server.php')
                .then(response => {
                    this.discs = response.data.results;
                    console.log(response.data.results);
                })
                .catch(error => {
                    console.error('Errore nel caricamento dei dati:', error);
                });
        },
        showDetails(index) {
            this.isClicked = true;
            axios.get('http://localhost:8888/php-dischi-json/server.php', {
                params: {
                    choise: index
                }
            })
                .then(response => {
                    this.cardSelected = response.data.results;
                })
                .catch(error => {
                    console.error('Errore nel caricamento dei dettagli:', error);
                });
        },
    }
}).mount('#app');
