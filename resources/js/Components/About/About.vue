<script>

</script>

<template>
    <v-sheet class="w-100 d-flex aling-center justify-center rounded-xl black">
        <div class="h-100 w d-flex flex-column justify-center align-center">
            <div class="flex-row text-h3 alegreya-sc-regular">
                <span class="text-grey">Почему именно&nbsp;</span>
                <span class="text-white">мы?</span>
            </div>
            <div class="d-flex flex-row text-white h-50">
                <div class="w-35">
                    <div class="container h-50"><p>01</p>Библиотека готовых лабораторных работ, соответствующих учебным программам СПО.</div>
                    <div class="container h-50"><p>02</p>Настраивайте параметры экспериментов под свои учебные задачи и требования.</div>
                </div>
                <div class="w-75">
                    <div class="container">
                        <p>03</p>
                        Доступ 24/7 с любого устройства — обучение не ограничено временем и местом
                    </div>
                    <div class="d-flex h-100 flex-row">
                        <v-img src="imageAbout.png" class="img container" cover></v-img>
                        <div class="container w-50 h-75"><p>04</p>Проводите химические опыты в безопасной виртуальной среде с реалистичной физикой и химией.</div>
                    </div>
                </div>
            </div>
        </div>
        
    </v-sheet>
</template>

<style scoped>
    .black{
        background-color: black;
    }
    .w{
        width: 66%
    }
    .w-35{
        width: 35%
    }
    
    .img{
        flex: 1;
        min-height: 100%;
    }
    .container{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin: 1%;
        padding: 2%;
        border-radius: 20px;
        border-width: 2px;
        border-style: solid;
        border-color: white;
        opacity: 1;
        align-items: stretch;
    }

    .alegreya-sc-regular {
        font-family: "Alegreya SC", serif;
        font-weight: 400;
        font-style: normal;
    }
</style>