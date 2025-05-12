<template>
  <MainLayout>
    <div ref="unityContainer" class="unity-container">
      <canvas
        id="unity-canvas"
        ref="unityCanvas"
        tabindex="-1"
        :style="canvasStyle"
      ></canvas>
    </div>
  </MainLayout>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import MainLayout from '../Layouts/MainLayout.vue'

const unityContainer = ref(null)
const unityCanvas = ref(null)
const canvasStyle = ref({
  width: '100%',
  height: '100%',
  background: '#231f20',
  display: 'block'
})

let unityInstance = null
let originalWidth = 960 // Your game's original width
let originalHeight = 600 // Your game's original height

// Handle window resize
function handleResize() {
  if (!unityContainer.value || !unityCanvas.value) return

  const container = unityContainer.value
  const canvas = unityCanvas.value
  
  // Get available space
  const availableWidth = container.clientWidth
  const availableHeight = container.clientHeight
  
  // Calculate target dimensions while maintaining aspect ratio
  const targetRatio = originalWidth / originalHeight
  let width = availableWidth
  let height = width / targetRatio
  
  if (height > availableHeight) {
    height = availableHeight
    width = height * targetRatio
  }
  
  // Apply to canvas
  canvas.width = originalWidth
  canvas.height = originalHeight
  canvas.style.width = `${width}px`
  canvas.style.height = `${height}px`
  
  // Update Unity instance if available
  if (unityInstance) {
    unityInstance.SetFullscreen(0) // Reset fullscreen if needed
    unityInstance.Module.canvas.style.width = `${width}px`
    unityInstance.Module.canvas.style.height = `${height}px`
  }
}

onMounted(async () => {
  window.addEventListener('resize', handleResize)
  
  // Initialize Unity after container is mounted
  await loadUnity()
  handleResize() // Initial resize
})

onBeforeUnmount(() => {
  window.removeEventListener('resize', handleResize)
  if (unityInstance) {
    unityInstance.Quit()
  }
})

async function loadUnity() {
  try {
    await loadScript('/game-build/labzavr.loader.js')
    
    unityInstance = await createUnityInstance(
      unityCanvas.value,
      {
        dataUrl: '/game-build/labzavr.data.br',
        frameworkUrl: '/game-build/labzavr.framework.js.br',
        codeUrl: '/game-build/labzavr.wasm.br',
        // ... other config ...
      },
      (progress) => {
        console.log(`Loading: ${Math.round(progress * 100)}%`)
      }
    )
  } catch (error) {
    console.error('Unity initialization failed:', error)
  }
}

function loadScript(src) {
  return new Promise((resolve, reject) => {
    const script = document.createElement('script')
    script.src = src
    script.onload = resolve
    script.onerror = reject
    document.body.appendChild(script)
  })
}
</script>

<style scoped>
.unity-container {
  position: relative;
  width: 100vw;
  height: 100vh;
  overflow: hidden;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>