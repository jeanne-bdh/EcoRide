export default class FormProfil {

    constructor(formId) {
        this.form = document.getElementById(formId);
        this.selectElement = this.form.querySelector('.form-select');
        this.carContainer = this.form.querySelector(".car-infos-container");
        this.containerInner = this.form.querySelector(".container-form-inner");
        this.preferencesContainer = this.form.querySelector("#preferences-container");
        this.init();
    }

    init() {
        this.hideFields();
        this.selectElement.addEventListener('change', () => this.toggleFields());
        this.form.addEventListener('submit', (e) => this.handleSubmit(e));
    }

    hideFields() {
        this.carContainer.classList.remove("show");
        this.preferencesContainer.classList.remove("show");
        this.containerInner.classList.remove("show");
    }

    showFields() {
        this.carContainer.classList.add("show");
        this.preferencesContainer.classList.add("show");
        this.containerInner.classList.add("show");
    }

    toggleFields() {
        const value = this.selectElement.value;
        if (value === '2' || value === '3') {
            this.showFields();
        } else {
            this.hideFields();
        }
    }

    getFormData() {
        return new FormData(this.form);
    }

    /*
    showAnswers() {
        const formData = this.getFormData();
        let result = "Récapitulatif de vos réponses :\n\n";
        for (let [key, value] of formData.entries()) {
            result += `${key} : ${value}\n`;
        }
        alert(result);
    }
    
    handleSubmit(event) {
            event.preventDefault();
            this.showAnswers();
        }*/
}