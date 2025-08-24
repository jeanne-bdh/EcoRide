let nombre = Math.floor(Math.random() * 1000)+1
let formData = new FormData();
formData.append('email', `${nombre}@test.fr`);

fetch('http://127.0.0.1:5433', {
    method: 'POST',
    body: formData
});