import "./bootstrap";
import { addGenre } from "./components/btnGender";
import { addFavorite } from "./components/favorite";

try {
    addGenre();
} catch (error) {
    console.error(
        "Une erreur s'est produite lors de l'exécution de addGenre:",
        error
    );
}

try {
    addFavorite();
} catch (error) {
    console.error(
        "Une erreur s'est produite lors de l'exécution de addFavorite:",
        error
    );
}
