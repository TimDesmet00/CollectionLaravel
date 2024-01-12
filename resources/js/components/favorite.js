export function addFavorite() {
    document.addEventListener("DOMContentLoaded", (event) => {
        const svgElements = document.querySelectorAll(".add-favorite");
        svgElements.forEach((svgElement) => {
            svgElement.addEventListener("click", () => {
                svgElement.style.fill = "#ff0000";
                ToggleEvent();
            });
        });
    });
}
