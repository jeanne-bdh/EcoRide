function filterNotes () {
    const containerSelect = document.getElementById('select-container');

    if (containerSelect) {
        containerSelect.addEventListener('click', function () {
            this.classList.toggle('open');
        });

        containerSelect.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                this.click();
            }
        });
    }
}

document.addEventListener("DOMContentLoaded", () => {
    filterNotes();
});
