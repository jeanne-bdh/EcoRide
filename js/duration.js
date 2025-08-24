function duration() {
    const timeDepartInput = document.getElementById("timeDepart");
    const timeArrivalInput = document.getElementById("timeArrival");
    const durationInput = document.getElementById("duration");

    if (!timeDepartInput || !timeArrivalInput || !durationInput) return;

    function calculateDuration() {
        const timeDepart = timeDepartInput.value;
        const timeArrival = timeArrivalInput.value;

        if (timeDepart && timeArrival) {
            const [h1, m1] = timeDepart.split(":").map(Number);
            const [h2, m2] = timeArrival.split(":").map(Number);

            const departMinutes = h1 * 60 + m1;
            const arrivalMinutes = h2 * 60 + m2;

            let duration = arrivalMinutes - departMinutes;

            const hours = Math.floor(duration / 60);
            const minutes = duration % 60;

            const formatDuration = `${hours}h${minutes.toString().padStart(2, '0')}`;

            durationInput.value = formatDuration;

            if (duration < 0) {
                durationInput.value = "";
            }
        }
    }

    timeDepartInput.addEventListener("change", calculateDuration);
    timeArrivalInput.addEventListener("change", calculateDuration);
}

document.addEventListener("DOMContentLoaded", () => {
    duration();
});