const typeWriter = document.getElementById('typewriter-text');
const text = 'Welcome!';

typeWriter.innerHTML = text;
typeWriter.style.setProperty('--characters', text.length);