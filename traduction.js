function traduire(langue) {
    var elements = document.querySelectorAll("p, h1, h2, h3, button, title, a, label, option");
    
    if (langue === "espagnol") {
        for (var i = 0; i < elements.length; i++) {
            var element = elements[i];
            var texte = element.getAttribute("text_esp");
            element.innerHTML = texte;
        }
    } else if (langue === "français") {
        for (var i = 0; i < elements.length; i++) {
            var element = elements[i];
            var texte = element.getAttribute("text_fr");
            element.innerHTML = texte;
        }
    }
}