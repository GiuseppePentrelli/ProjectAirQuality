// Logiche al caricamento del dom
window.addEventListener('DOMContentLoaded' , () => {


// Logiche per scoll navbar
const navbar = document.getElementById('navbar');
const helperBtn = document.getElementById('helperBtn');


window.addEventListener('scroll', () => { 

    if(window.scrollY > 50) { 

        navbar.classList.add('navScrolled');
        helperBtn.classList.add('visible');
    } else {
        navbar.classList.remove('navScrolled');
        helperBtn.classList.remove('visible')

    }
})

// Logiche per loader

    const loader = document.getElementById('loader');

    window.addEventListener('load', () => {
loader.style.transition = 'opacity 0.5s ease, visibility 0.5s ease';

loader.style.opacity =0;
loader.style.visibility= 'hidden';


    });

    /* Logiche Menu Accessibilità  */
    const dropdowns = document.querySelectorAll('.dropdown');
    const overlay = document.getElementById('helperOverlay'); 

    if (helperBtn && helperMenu) {
        helperBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            const isOpen = helperMenu.classList.contains('show');

            dropdowns.forEach(d => {
                d.classList.remove('show');
                const dm = d.querySelector('.dropdown-menu');
                if (dm) dm.classList.remove('show');
            });

            helperMenu.classList.toggle('show');
            if (overlay) overlay.style.display = isOpen ? 'none' : 'block';
        });
    }



    // FOCUS MODE
const toggleFocusBtn = document.getElementById('toggleFocus');
const focusOverlay = document.getElementById('focusOverlay');

toggleFocusBtn.addEventListener('click', () => {
  const isActive = focusOverlay.style.display === 'block';

  // Toggle overlay
  focusOverlay.style.display = isActive ? 'none' : 'block';

  // Toggle bottone visivo
  toggleFocusBtn.classList.toggle('active');


  // Chiudi tutti i dropdown
  const dropdowns = document.querySelectorAll('.dropdown');
  dropdowns.forEach(d => {
    d.classList.remove('show');
    const dm = d.querySelector('.dropdown-menu');
    if (dm) dm.classList.remove('show');
  });

  // Nascondi helper menu
  const helperMenu = document.getElementById('helperMenu');
  const helperOverlay = document.getElementById('helperOverlay');
  if (helperMenu) helperMenu.classList.remove('show');
  if (helperOverlay) helperOverlay.style.display = 'none';
});

    
// Scalabilità testo
let currentFontSize = 1; // 1rem = 100%

function setFontSize(size) {
  document.documentElement.style.fontSize = `${size}rem`;
}

document.getElementById('increaseFont').addEventListener('click', () => {
  // Limite massimo
  currentFontSize = Math.min(currentFontSize + 0.1, 1.2); 
  setFontSize(currentFontSize);
});

// Minimo
document.getElementById('decreaseFont').addEventListener('click', () => {
  currentFontSize = Math.max(currentFontSize - 0.1, 0.6); 
  setFontSize(currentFontSize);
});

document.getElementById('resetFont').addEventListener('click', () => {
  currentFontSize = 1;
  setFontSize(currentFontSize);
}); 
    
})

