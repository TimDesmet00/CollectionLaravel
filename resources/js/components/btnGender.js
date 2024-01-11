export function addGenre() {
    document.getElementById("add-genre").addEventListener("click", () => {
        const genresDiv = document.createElement("div");
        const newSelect = document.createElement("select");
        newSelect.name = "genres[]";
        newSelect.multiple = true;

        const options = document.getElementById("genres").options;
        for (let i = 0; i < options.length; i++) {
            const newOption = document.createElement("option");
            newOption.value = options[i].value;
            newOption.text = options[i].text;
            newSelect.appendChild(newOption);
        }

        genresDiv.appendChild(newSelect);
        document.getElementById("add-genre").after(genresDiv);
    });
}
