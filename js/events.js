import FormProfil from "./form-profil.js";

const formProfil = new FormProfil('form-profil');
const selectElement = formProfil.getElement();

formProfil.maskChamp();

function selectProfilForm() {
    if (selectElement.value === '1') {
        formProfil.maskChamp();
    } else if (selectElement.value === '2' || selectElement.value === '3') {
        formProfil.showChamp();
    } else {
        formProfil.maskChamp();
    }
}

selectElement.addEventListener('change', selectProfilForm);

formProfil.form.addEventListener('submit', (e) => {
    e.preventDefault();
    formProfil.showAnswers();
});