<template>
    <MainLayout>
        <div id="unity-container" style="position: relative">
            <canvas
                id="unity-canvas"
                width="960"
                height="600"
                tabindex="-1"
                style="width: 960px; height: 600px; background: #231f20"
            ></canvas>
            <div id="unity-loading-bar" style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%)">
                <!-- Loading indicator content here -->
            </div>
        </div>
    </MainLayout>
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import MainLayout from "../Layouts/MainLayout.vue";

declare global {
    function createUnityInstance(canvas: HTMLElement, config: object): Promise<any>;
}

onMounted(async () => {
    const canvas = document.querySelector("#unity-canvas") as HTMLElement;
    const loadingBar = document.querySelector("#unity-loading-bar") as HTMLElement;
    
    if (!canvas) {
        console.error("Canvas element not found!");
        return;
    }

    try {
        // Load the Unity loader script dynamically
        await loadScript("game-build/labzavr.loader.js");
        
        const instance = await createUnityInstance(canvas, {
            dataUrl: "game-build/labzavr.data.br",
            frameworkUrl: "game-build/labzavr.framework.js.br",
            codeUrl: "game-build/labzavr.wasm.br",
            streamingAssetsUrl: "StreamingAssets",
            companyName: "ЛабЗавр",
            productName: "ЛабЗавр",
            productVersion: "0.1",
        });

        if (loadingBar) {
            loadingBar.style.display = "none";
        }
    } catch (error) {
        console.error("Failed to load Unity:", error);
    }
});

function loadScript(src: string): Promise<void> {
    return new Promise((resolve, reject) => {
        const script = document.createElement("script");
        script.src = src;
        script.onload = () => resolve();
        script.onerror = (err) => reject(err);
        document.body.appendChild(script);
    });
}
</script>
