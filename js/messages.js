window.addEventListener('DOMContentLoaded', () => {
    const messages = document.querySelectorAll('.success, .alert-container');

    if (messages.length > 0) {
        const onClick = () => {
            messages.forEach(messages => messages.remove());
            document.removeEventListener('click', onClick);
        };

        document.addEventListener('click', onClick);
    }
});