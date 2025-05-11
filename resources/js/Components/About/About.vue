<template>
    <v-sheet class="d-flex flex-column justify-center align-center rounded-xl black w-100">
        <div class="d-flex flex-column justify-center align-center w-66">
            <div class="text-h3 pb-7 alegreya-sc-regular">
                <span class="text-grey">Почему именно&nbsp;</span>
                <span class="text-white">мы?</span>
            </div>
            <div class="d-flex flex-row text-white montserrat-400">
                <div class="w-33">
                    <div class="container h-50"><p>01</p>Библиотека готовых лабораторных работ, соответствующих учебным программам СПО.</div>
                    <div class="container h-50"><p>02</p>Настраивайте параметры экспериментов под свои учебные задачи и требования.</div>
                </div>
                <div class="w-66">
                    <div class="container h-25">
                        <p>03</p>
                        Доступ 24/7 с любого устройства — обучение не ограничено временем и местом
                    </div>
                    <div class="d-flex flex-row h-75">
                        <v-img src="imageAbout.png" class="container w-33" cover></v-img>
                        <div class="container w-50"><p>04</p>Проводите химические опыты в безопасной виртуальной среде с реалистичной физикой и химией.</div>
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
    
    .container{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin: 5px;
        padding: 15px;
        border-radius: 20px;
        border-width: 2px;
        border-style: solid;
        border-color: white;
        opacity: 1;
    }

    .montserrat-400{
        font-size: 20px;
    }
</style>