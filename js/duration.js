document.addEventListener("DOMContentLoaded", function () {
    const timeDepartInput = document.getElementById("timeDepart");
    const timeArrivalInput = document.getElementById("timeArrival");
    const durationInput = document.getElementById("duration");

    function calculateDuration() {
        const timeDepart = timeDepartInput.value;
        const timeArrival = timeArrivalInput.value;

        if (timeDepart && timeArrival) {
            const [h1, m1] = timeDepart.split(":").map(Number);
            const [h2, m2] = timeArrival.split(":").map(Number);

            const departHeures = h1 + m1;
            const arrivalHeures = h2 + m2;

            let duration = arrivalHeures - departHeures;

            // On insère la durée (en heures décimales ou en minutes, à toi de choisir)
            durationInput.value = Math.round(duration); // minutes
        }
    }

    timeDepartInput.addEventListener("change", calculateDuration);
    timeArrivalInput.addEventListener("change", calculateDuration);
});