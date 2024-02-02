let isMinimized = false;
let offsetX, offsetY;
let initialWidth, initialHeight;

const dragBox = document.getElementById('dragBox');
const titleDebug = document.getElementById('titleDebug');
const dragText = document.getElementById('dragText');
const minimizedContent = document.getElementById('minimizedContent');
const minimizeButton = document.getElementById('minimizeButton');

// Menyimpan status minimize di local storage
document.addEventListener('DOMContentLoaded', () => {
  isMinimized = localStorage.getItem('isMinimized') === 'true';
  updateMinimizeState();
});

minimizeButton.addEventListener('pointerdown', toggleMinimize);

function toggleMinimize() {
  isMinimized = !isMinimized;
  // Menyimpan status minimize di local storage
  localStorage.setItem('isMinimized', isMinimized.toString());
  updateMinimizeState();
}

function updateMinimizeState() {
  if (isMinimized) {
    initialWidth = dragBox.offsetWidth;
    initialHeight = dragBox.offsetHeight;
    dragBox.style.width = 'fit-content';
    dragBox.style.height = 'fit-content';
    titleDebug.style.marginRight = '15px';
    dragText.style.display = 'none';
    minimizedContent.style.display = 'block';
    minimizedContent.innerHTML = "{{Freelanceku}}";
  } else {
    dragBox.style.width = `${initialWidth}px`;
    dragBox.style.height = `${initialHeight}px`;
    dragText.style.display = 'block';
    minimizedContent.style.display = 'none';
  }
}

dragBox.addEventListener('mousedown', startDrag);
dragBox.addEventListener('touchstart', startDrag);

function startDrag(e) {
  e.preventDefault();
  offsetX = (e.type === 'touchstart') ? e.touches[0].clientX - dragBox.getBoundingClientRect().left : e.clientX - dragBox.getBoundingClientRect().left;
  offsetY = (e.type === 'touchstart') ? e.touches[0].clientY - dragBox.getBoundingClientRect().top : e.clientY - dragBox.getBoundingClientRect().top;

  document.addEventListener('mousemove', drag);
  document.addEventListener('touchmove', drag);
  document.addEventListener('mouseup', stopDrag);
  document.addEventListener('touchend', stopDrag);
}

function drag(e) {
  const x = Math.min(
    Math.max((e.type === 'touchmove') ? e.touches[0].clientX - offsetX : e.clientX - offsetX, 0),
    window.innerWidth - dragBox.offsetWidth
  );
  const y = Math.min(
    Math.max((e.type === 'touchmove') ? e.touches[0].clientY - offsetY : e.clientY - offsetY, 0),
    window.innerHeight - dragBox.offsetHeight
  );

  dragBox.style.left = `${x}px`;
  dragBox.style.top = `${y}px`;
}

function stopDrag() {
  document.removeEventListener('mousemove', drag);
  document.removeEventListener('touchmove', drag);
  document.removeEventListener('mouseup', stopDrag);
  document.removeEventListener('touchend', stopDrag);
}
