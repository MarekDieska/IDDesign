document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    window.startEdit = function(id) {
        const span = document.getElementById(`message-text-${id}`);
        const input = document.getElementById(`message-input-${id}`);

        span.classList.add('hidden');
        input.classList.remove('hidden');
        input.focus();
    };

    window.submitEdit = function(id) {
        const span = document.getElementById(`message-text-${id}`);
        const input = document.getElementById(`message-input-${id}`);
        const newValue = input.value;

        fetch(`/service-requests/${id}/update-message`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
            body: JSON.stringify({ message: newValue })
        })
            .then(response => {
                if (!response.ok) throw new Error('Chyba pri odpovedi zo servera');
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    span.textContent = newValue || '—';
                } else {
                    alert('Nepodarilo sa uložiť poznámku.');
                }
            })
            .catch(error => {
                console.error('Chyba:', error);
                alert('Nastala chyba pri ukladaní poznámky.');
            })
            .finally(() => {
                input.classList.add('hidden');
                span.classList.remove('hidden');
            });
    };

    window.confirmComplete = function(id) {
        if (confirm('Naozaj chceš dokončiť túto požiadavku?')) {
            fetch(`/service-requests/${id}/complete`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                }
            })
                .then(response => {
                    if (response.redirected) {
                        window.location.href = response.url;
                    } else {
                        alert('Záznam bol dokončený.');
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error('Chyba:', error);
                    alert('Nepodarilo sa dokončiť záznam.');
                });
        }
    };
});
