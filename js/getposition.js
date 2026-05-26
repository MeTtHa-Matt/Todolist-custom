async function initAvancementSlider(taskId) {
  const response = await fetch(`../includes/getavancement.php?id=${taskId}`);
  const result = await response.json();

  const slider = document.getElementById('avancement-slider');
  const badge = document.getElementById('percent-badge');
  const bubble = document.getElementById('bubble');

  function getColor(val) {
    return val < 33 ? '#dc3545' : val < 66 ? '#fd7e14' : '#198754';
  }

  function updateSlider(val) {
    val = parseInt(val);
    const color = getColor(val);

    badge.textContent = val + '%';
    badge.style.background = color + '22';
    badge.style.color = color;
    badge.style.borderColor = color + '55';

    slider.style.setProperty(
      'background',
      `linear-gradient(to right, ${color} ${val}%, #dee2e6 ${val}%)`,
      'important'
    );
    slider.style.color = color;

    const thumbW = 20;
    const trackW = slider.offsetWidth;
    const pos = thumbW / 2 + (val / 100) * (trackW - thumbW);
    bubble.style.left = pos + 'px';
    bubble.textContent = val + '%';
    bubble.style.setProperty('--bubble-color', color);
  }

  const initVal = result.etat_d_avancement;
  slider.value = initVal;
  updateSlider(initVal);

  slider.removeEventListener('input', slider._handler);
  slider._handler = () => updateSlider(slider.value);
  slider.addEventListener('input', slider._handler);

  window.removeEventListener('resize', slider._resizeHandler);
  slider._resizeHandler = () => updateSlider(slider.value);
  window.addEventListener('resize', slider._resizeHandler);
}