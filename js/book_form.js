function updateLists() {

    const authorsList = document.getElementById("hA");
    const genreList = document.getElementById("hG");

    const realListA = document.getElementById("authors");
    const realListG = document.getElementById("categories");

    const elementsA = [...realListA.getElementsByTagName("li")].map(i => i.innerText.replace("Remover da lista", "").trim());
    const elementsG = [...realListG.getElementsByTagName("li")].map(i => i.innerText.replace("Remover da lista", "").trim());
    
    authorsList.value = elementsA.join("</>");
    genreList.value = elementsG.join("</>");
}

function removeItem(item){

    const i = document.getElementById(item.toString());
    i.remove();

    updateLists();
}

function addItem(func){

    const text = "Insira o nome do " + (func == 0 ? "Autor(a)" : "Género");
    const name = prompt(text);

    const listToAppend = document.getElementById(func == 0 ? "authors" : "categories").children[0];
    
    const newElement = document.createElement("li");
    const deleteButton = document.createElement("button");

    newElement.innerHTML = `${name} &emsp;`;
    newElement.id = (new Date()).getTime();
    
    deleteButton.type = "button";
    deleteButton.onclick = () => { removeItem(newElement.id); };
    deleteButton.innerText = "Remover da lista";

    newElement.appendChild(deleteButton);
    listToAppend.appendChild(newElement);

    updateLists();
}

updateLists();