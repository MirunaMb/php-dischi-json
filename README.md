# Guida di un Progetto Web Locale :

# Come fare la Configurazione di un Progetto Web Locale ?

1.Crea i file frontend:

- index.php
- cartella css -->> style.css
- cartella img --->> images

  2.Crea i file backend:

- cartella js --->> script.js //GESTISE L'APP VUE
- crea file json --->>dischi.json //DATI DA TRASFORMARE PER IL "SERVER PHP"
- crea file server.php

AGGIUNGI LE CDN CHE TI SERVONO NEL TUO FILE PADRE : index.php (in questo caso) :

<!-- AXIOS -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"
            integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- VUE JS -->

        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<!-- CSS -->

        <link rel="stylesheet" href="./css/style.css">

<!-- FONTAWESOME -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

# Come fare un Progetto Web Locale con un'Api creata da noi ?

1. Aggiungi un blocco di contenuto Vue.js: <div id="app"> all interno del file html,in questo caso index.php

2. Crea un'applicazione Vue.js:
   const { createApp } = Vue;

```java script
createApp({
    data() {
        return {
            discs: [],
            // isClicked: false,
            // cardSelected: {},
        };
    },
    // ...
}).mount('#app');
```

3. Recupera i dati dei dischi :

   Un esempio di JSON da dove andare a recuperare i dati (in questo caso dischi.json) :

```json
[
  {
    "title": "New Jersey",
    "author": "Bon Jovi",
    "year": 1988,
    "poster": "https://images-na.ssl-images-amazon.com/images/I/51sBr4IWDwL.jpg",
    "genre": "Rock"
  },
  {
    "title": "Live at Wembley 86",
    "author": "Queen",
    "year": 1992,
    "poster": "https://images-na.ssl-images-amazon.com/images/I/71g40mlbinL._SX355_.jpg",
    "genre": "Pop"
  }
]
```

4. Nel tuo server.php :

````php
// LEGGO IL JSON - che adesso sono stringhe,le metto in una variabile
$string_value = file_get_contents('./dischi.json');

// PRENDO LE STRINGHE E CON JSON_DECODE LE TRASFORMO IN ARRAY,e inglobo tutto in una variabile
//Metto true perche voglio ottenere un array associativo,per poter accedere piu facilmente all'array
$dischi_array = json_decode($string_value, true);

//  Invio come risposta JSON
header('Content-Type: application/json');
echo json_encode($results);
```<?

5. Una volta avuti i dati dell array, fai una richiesta axios nell tuo file java script ,che gestisce LA TUA APP.VUE (questo caso script.js) per raccogliere i dati ,inglobarli in una variabile per poi poterli riuscire a stampare questi dati sullo schermo.
```java script
 mounted() {
        axios
            .get('http://localhost:8888/php-dischi-json/server.php')
            // baseUrl :http://localhost:8888/
            // cartella dove sta il server: php-dischi-json/
            // nome del server locale : server.php
            // RIFORMULATO DIVERSAMENTE : http://localhost:porta/tuo_endpoint, dove porta è il numero di porta su cui è in ascolto il tuo server e tuo_endpoint è il percorso specifico per ottenere i dati dei dischi.
            .then(response => {
                this.discs = response.data.results;
            })
    },
````

6. Finalmente, puoi usare i dati dell array / oggetto e stampargli sullo schermo con un v-for :

```html
<main class="ms_container d-flex flex-wrap">
  <div class="card text-white text-center" v-for="(disc,index) in discs">
    <img
      class="card-img-top mx-auto my-4"
      :src="disc.poster"
      alt="Card image cap" />
    <div class="card-body">
      <h5>{{disc.title}}</h5>
      <p class="card-title">{{disc.author}}</p>
      <p class="card-text">{{disc.year}}</p>
    </div>
  </div>
</main>
```

Ecco alcuni dei problemi più comuni che le persone potrebbero incontrare durante la creazione di un progetto web locale utilizzando Vue.js e Axios, insieme a possibili soluzioni:

1. **CORS Error**: Potresti riscontrare problemi con le richieste AJAX a causa di errori di "Cross-Origin Resource Sharing" (CORS). Per risolvere questo problema in un ambiente di sviluppo locale, puoi disabilitare temporaneamente la protezione CORS nel tuo browser oppure utilizzare estensioni o plugin per gestire CORS. In un ambiente di produzione, dovresti configurare il server per consentire richieste da un dominio diverso.

2. **Endpoint errato o mancante**: Se le richieste Axios non restituiscono i dati attesi, potrebbe essere dovuto a un errore nell'URL dell'endpoint nel tuo server.php o nella richiesta Axios. Assicurati che l'URL sia corretto e che l'endpoint esista sul tuo server.

3. **Errore nell'installazione di Vue.js o Axios**: Se incontri problemi nell'installazione di Vue.js o Axios, assicurati di aver seguito correttamente le istruzioni di installazione. Puoi verificare la presenza di errori di sintassi nei tuoi file HTML o JavaScript. Inoltre, potresti dover gestire la sequenza corretta di inclusione delle librerie o utilizzare il comando npm per installarle.

4. **Errore nei dati JSON**: Se i dati JSON nel tuo file dischi.json sono formattati in modo errato, potresti non ottenere i risultati attesi. Assicurati che il tuo file JSON sia ben formato e rispetti la sintassi JSON corretta.

5. **Problemi di rete locale**: Assicurati che il tuo server locale (ad esempio, Apache o Nginx) sia in esecuzione correttamente e ascolti sulla porta specificata. Inoltre, verifica che il tuo server PHP funzioni correttamente.

6. **Errore nei file HTML, JavaScript o PHP**: Controlla attentamente i tuoi file HTML, JavaScript e PHP per eventuali errori di sintassi o refusi. Anche uno spazio extra o un errore di battitura possono causare problemi.

7. **Problemi con l'organizzazione del progetto**: Assicurati che i file e le directory siano organizzati correttamente nel tuo progetto. Se, ad esempio, i file di stile o le immagini non si trovano nelle directory corrette, potresti riscontrare problemi nel caricamento.

8. **Debugging delle richieste Axios**: Puoi utilizzare il browser o strumenti di sviluppo come Vue Devtools per esaminare le richieste e le risposte Axios. Questo ti aiuterà a individuare eventuali errori nelle richieste o nelle risposte.

Fornendo una sezione nel tuo tutorial che copre questi problemi comuni insieme alle soluzioni, aiuterai gli sviluppatori a risolvere facilmente le sfide che potrebbero incontrare durante la creazione del progetto web locale.
