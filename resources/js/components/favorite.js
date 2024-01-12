// export function addFavorite() {
//     document.addEventListener("DOMContentLoaded", (event) => {
//         const svgElements = document.querySelectorAll(".add-favorite");
//         svgElements.forEach((svgElement) => {
//             svgElement.addEventListener("click", () => {
//                 if (svgElement.style.fill === "#ffd700") {
//                     svgElement.style.fill = "#97AABD"; // Remplacez par la couleur de base
//                 } else {
//                     svgElement.style.fill = "#ffd700";
//                 }
//                 let toggleEvent = new ToggleEvent();
//             });
//         });
//     });
// }

export function addFavorite() {
    document.addEventListener("DOMContentLoaded", (event) => {
        const svgElements = document.querySelectorAll(".add-favorite");
        svgElements.forEach((svgElement) => {
            svgElement.addEventListener("click", () => {
                let style = window.getComputedStyle(svgElement);
                let fill = style.getPropertyValue("fill");
                if (fill === "rgb(255, 215, 0)") {
                    // #ffd700 en RGB
                    svgElement.setAttribute("fill", "#97AABD"); // Remplacez par la couleur de base
                } else {
                    svgElement.setAttribute("fill", "#ffd700");
                }
                let toggleEvent = new ToggleEvent();
            });
        });
    });
}
