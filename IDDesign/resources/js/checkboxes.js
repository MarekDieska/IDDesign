
document.querySelector('form').addEventListener('submit', function (e) {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const isAnyChecked = Array.from(checkboxes).some(cb => cb.checked);

    if (!isAnyChecked) {
        e.preventDefault(); // Stop form submission
        alert('Prosím, vyberte aspoň jednu službu.');
    }
});
