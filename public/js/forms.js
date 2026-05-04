document.getElementById("title").addEventListener("keyup", slugChange);

function slugChange() {
    title = document.getElementById("title").value;
    document.getElementById("slug").value = slug(title);
}

/* function slug(str) {
    var $slug = "";
    var trimmed = str.trim(str);
    $slug = trimmed
        .replace(/[^a-z0-9-]/gi, "-")
        .replace(/-+/g, "-")
        .replace(/^-|-$/g, "");
    return $slug.toLowerCase();
} */

function slug(str) {
    // Normaliza el texto para eliminar tildes y caracteres especiales
    let normalized = str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");

    let slug = normalized
        .replace(/ñ/g, "n") // Reemplazar ñ por n
        .replace(/[^a-z0-9\s-]/gi, "") // Eliminar caracteres no permitidos
        .replace(/\s+/g, "-") // Reemplazar espacios por guiones
        .replace(/-+/g, "-") // Reemplazar múltiples guiones por uno solo
        .replace(/^-|-$/g, ""); // Eliminar guiones al inicio y al final

    return slug.toLowerCase();
}

// Cambiar imagen al seleccionar un archivo
document.getElementById("file").addEventListener("change", cambiarImagen);

function cambiarImagen(event) {
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = function (e) {
        document.getElementById("picture").setAttribute("src", e.target.result);
    };

    reader.readAsDataURL(file);
}
