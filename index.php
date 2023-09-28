<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="./img/logo.jpg" />
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
        <title>Spotify</title>
    </head>

    <body>
        <div id="app">
            <header>
                <section class="container d-flex align-items-center">
                    <div>
                        <a href="./index.php">
                            <img src="./img/logo.png" alt="">
                        </a>
                    </div>
                </section>
            </header>
            <article class="d-flex justify-content-lg-center align-items-lg-center">
                <main class="ms_container d-flex flex-wrap">
                    <div class="card text-white text-center" v-for="(disc,index) in discs">
                        <img class="card-img-top mx-auto my-4" :src="disc.poster" alt="Card image cap">
                        <div class="card-body">
                            <h5>{{disc.title}}</h5>
                            <p class="card-title">{{disc.author}}</p>
                            <p class="card-text">{{disc.year}}</p>
                        </div>
                    </div>
                </main>
                <div class="hidden d-flex justify-content-center align-items-center" v-if="isClicked">
                    <i @click="isClicked = false" class="fa-regular fa-circle-xmark fa-shake"
                        style="color: #06e014;"></i>
                    <div class="card text-white text-center">
                        <img class="card-img-top mx-auto my-4" :src="cardSelected.poster" alt="Card image cap">
                        <div class="card-body">
                            <h5>{{cardSelected.title}}</h5>
                            <p class="card-title">{{cardSelected.author}}</p>
                            <p class="card-text">{{cardSelected.year}}</p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <script src="./js/script.js"></script>
    </body>

</html>