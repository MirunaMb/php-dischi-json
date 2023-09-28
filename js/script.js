const { createApp } = Vue;

createApp({
    data() {
        return {
            discs: [],
        };
    },
    // Faccio la richiesta axios al caricamento
    mounted() {
        axios
            .get('http://localhost:8888/php-dischi-json/server.php').then(response => {
                this.discs = response.data;
                console.log(response.data)
            })
    }
}).mount('#app');