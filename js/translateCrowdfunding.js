/**
 * Guanyem translateCrowdfunding.js ver 1.0.0
 * Open-source and loving manufacture by GWT inc. (Guanyem Web Team)
 * Barcelona 2014
 *
 * For external (downloaded) scripts, please put them inside plugins.js :)
 */

var textsCrowdfunding = [
    {
        project: "prueba-completa",
        texts: [
        {ca:"Descripció curta del projecte.", es:"Descripción corta del proyecto."},
        {ca:"Descripció ben llarga del projecte, amb molta més informació.", es:"Descripción bien larga del proyecto, con mucha más información."},
        {ca:"Ajuda amb el que puguis a partir d'1€", es:"Ayuda con lo que puedas a partir de 1€"}]
    }
];



function translateCrowdfunding() {

    function translateElements(textsProject, elements) {
        var el = elements.length;
        var tpl = textsProject.length;
        for(var i = 0; i < el; ++i) {
            for(var j = 0; j < tpl; ++j) {
                if(elements[i].textContent === textsProject[j].ca) {
                    elements[i].textContent = textsProject[j].es;
                }
            }
        }
    }

    if(config.LANGUAGE.substr(0, 2) === "es") {
        //Translate only in Spanish.
        var project = window.location.href;
        var index = project.lastIndexOf("?");
        if (index > 0) {
            project = project.substring(0, index - 1);
        }
        index = project.lastIndexOf("/");
        if (index === project.length - 1) {
            project = project.substring(0, index);
        }
        index = project.lastIndexOf("/");
        project = project.substring(index + 1);

        var tcl = textsCrowdfunding.length;
        for (var i = 0; i < tcl; ++i) {
            var textsProject = textsCrowdfunding[i];
            if (textsProject.project === project) {
                //It's the project we need to translate, so go for it.
                //Order: P, H1, OPTION, A, DIV
                var elems = document.getElementsByTagName("p");
                translateElements(textsProject, elems);
                elems = document.getElementsByTagName("h1");
                translateElements(textsProject, elems);
                elems = document.getElementsByTagName("option");
                translateElements(textsProject, elems);
                elems = document.getElementsByTagName("a");
                translateElements(textsProject, elems);
                elems = document.getElementsByTagName("div");
                translateElements(textsProject, elems);
            }
        }
    }
}