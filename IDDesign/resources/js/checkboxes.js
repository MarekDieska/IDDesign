document.querySelector('#service-form')?.addEventListener('submit', function (e) {
    const checkboxes = this.querySelectorAll('input[type="checkbox"]');
    const isAnyChecked = Array.from(checkboxes).some(cb => cb.checked);

    if (!isAnyChecked) {
        e.preventDefault();
        alert('Prosím, vyberte aspoň jednu službu.');
    }
});
