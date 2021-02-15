const $checkboxes = document.querySelectorAll('input[type="checkbox"]');

$checkboxes.forEach(box => box.addEventListener('click', () => box.parentNode.submit()));