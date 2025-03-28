export default class FormProfil {

    constructor(id) {
        this.id = id;
        this.form = document.getElementById(this.id);
        this.formdata = new FormData(this.form);
        this.answers = new Array();
    }

    getDiv(id) {
        return document.getElementById(id).parentNode;
    }

    getElement() {
        return document.querySelector('.form-select');
    }

    getCarInfos() {
        return document.querySelector(".car-infos-container");
    }

    getPreferencesInfos() {
        return document.getElementById("preferences-container");
    }

    maskChamp() {
        this.getCarInfos().style.display = "none";
        this.getPreferencesInfos().style.display = "none";
    }

    showChamp() {
        this.getCarInfos().style.display = "block";
        this.getPreferencesInfos().style.display = "block";
    }

    isSelected(id, value, action, otherAction) {
        this.formdata = new FormData(this.form);
        if (this.formdata.get(id) == value) {
            action();
        }
        else {
            otherAction();
        }
    }

    getAnswers() {
        this.formdata = new FormData(this.form);
        this.formdata.forEach((value, key) => {
            this.answers.push([key, value]);
        })
        return this.answers;
    }

    showAnswers() {
        let chaine = "Récapitulatif de vos réponses :\n\n";
        for (let ligne of this.getAnswers()) {
            chaine += `${ligne[0]} : ${ligne[1]}\n`;
        }
        alert(chaine);
    }
}