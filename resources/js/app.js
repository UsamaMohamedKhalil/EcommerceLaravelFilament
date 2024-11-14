import './bootstrap';  // Ensure general setup is loaded first
import 'preline';  // Import Preline after bootstrap


document.addEventListener('livewire:navigated', () => { 
    window.HSstaticMethods.autoInit();
})



