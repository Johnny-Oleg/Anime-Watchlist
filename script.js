const $checkboxes = document.querySelectorAll('input[type="checkbox"]');

$checkboxes.forEach(box => box.addEventListener('click', () => box.parentNode.submit()));

const clock = () => {
  const date = new Date();
  const time = document.querySelector('.time');
  time.innerHTML = `&nbsp; ${date.toLocaleTimeString()}`;
}

const timer = setInterval(() => clock(), 1000);