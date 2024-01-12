export function addFavorite() {
    document.addEventListener("DOMContentLoaded", (event) => {
        const svgElements = document.querySelectorAll(".add-favorite");
        svgElements.forEach((svgElement) => {
            svgElement.addEventListener("click", () => {
                let style = window.getComputedStyle(svgElement);
                let fill = style.getPropertyValue("fill");
                let collectionId = svgElement.dataset.collectionId; // Ajoutez cette ligne

                if (fill === "rgb(255, 215, 0)") {
                    // #ffd700 en RGB
                    svgElement.setAttribute("fill", "#97AABD");

                    fetch(`/favorites/${collectionId}`, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content"),
                        },
                    });
                } else {
                    svgElement.setAttribute("fill", "#ffd700");

                    fetch(`/favorites/${collectionId}`, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content"),
                        },
                    });
                }
                // let toggleEvent = new ToggleEvent();
            });
        });
    });
}
