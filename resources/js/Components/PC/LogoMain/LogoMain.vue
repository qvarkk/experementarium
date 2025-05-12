<template>
    <div class="d-flex flex-column justify-center pb-12 w-66 mt-8">
        <v-sheet class="text-h1 alegreya-sc-regular">
            <div class="virtual">
                <div>Виртуальная</div>
                <div class="border-t-md"></div>
            </div>
            <div>
                <div class="text-right" >химическая</div>
                <div class="border-t-md"></div>
            </div>
            <div>лаборатория</div>
        </v-sheet>
        <v-sheet @click="$inertia.get('/game')" class="right-0 mt-8 d-flex flex-row justify-end align-center cursor-pointer">
            <div class="text-h5 pr-8 montserrat-400">Демо-версия</div>
            <svg width="90" height="90" viewBox="0 0 90 90" fill="none">
                <circle cx="45" cy="45" r="43.5" stroke="black" stroke-width="3"/>
                <path d="M55.5458 32.8543C55.4654 32.0298 54.7318 31.4266 53.9072 31.5071L40.4711 32.8181C39.6465 32.8985 39.0434 33.6322 39.1238 34.4567C39.2043 35.2812 39.9379 35.8844 40.7624 35.8039L52.7057 34.6386L53.871 46.5819C53.9514 47.4064 54.6851 48.0096 55.5096 47.9291C56.3341 47.8487 56.9373 47.115 56.8568 46.2905L55.5458 32.8543ZM35 56.173L36.1586 57.1256L55.2116 33.9526L54.0529 33L52.8943 32.0474L33.8414 55.2203L35 56.173Z" fill="black"/>
            </svg>
        </v-sheet>
    </div>
</template>

<style scoped>
    .virtual{
        margin-left: 20%;
    }
</style>