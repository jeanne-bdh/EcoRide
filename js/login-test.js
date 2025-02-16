const form = document.querySelector('.form-login');

form.addEventListener("submit", (e) => {
    e.preventDefault();

    const pseudoEmailInput = document.getElementById("inputPseudoEmailLogin").value;

    if(pseudoEmailInput === "") {
        console.log('Le champ Pseudo/Email est vide');
    } else {
        console.log('Le champ Pseudo/Email est rempli');
    }

});