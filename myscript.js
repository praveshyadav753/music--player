const volIcon = document.getElementById('vol_icon');
const volBar = document.querySelector('.vol_bar');
const volDot = document.getElementById('vol_dot');
const volInput = document.getElementById('vol');

// Add event listener to volume input range
volInput.addEventListener('input', () => {
  // Set volume bar width based on input value
  volBar.style.width = `${volInput.value}%`;

  // Move volume dot to match input value
  volDot.style.left = `${volInput.value}%`;

  // Set volume icon based on input value
  if (volInput.value >= 70) {
    volIcon.className = 'bi bi-volume-up-fill';
  } else if (volInput.value >= 30) {
    volIcon.className = 'bi bi-volume-down-fill';
  } else {
    volIcon.className = 'bi bi-volume-mute-fill';
  }
});
