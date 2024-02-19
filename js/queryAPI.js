
const apiURL = "https://www.googleapis.com/books/v1/volumes";
const recommendedDisplayCount = 8;

const UpdateSearchBoxCompletion = (resultList, prompt="null") => {
    
    const completeBox = document.getElementById("complete-box");
    
    // Trim results array
    if (resultList.totalItems == 0){

        completeBox.innerHTML = "<b>Nenhum resultado encontrado ao pesquisar '" + prompt + "'</b>";
        return;
    }else if (resultList.totalItems > recommendedDisplayCount)
        resultList.items = resultList.items.slice(0, recommendedDisplayCount);

    const dataConvert = resultList.items.map(
        item => `
        <button type="button" onclick="BookDetails('${item.selfLink}')" class="no-style item">
            ${item.volumeInfo.title} (${item.volumeInfo.publishedDate})<br> 
            <em>
                ${
                    item.volumeInfo.authors == undefined ? 
                    "Autor desconhecido" : item.volumeInfo.authors.join(", ")
                }
            </em>
        </button>
        <hr>
        `
        ).join("");
    
        completeBox.innerHTML = `<b>A mostrar ${recommendedDisplayCount} de ${resultList.totalItems} resultados encontrados!</b> <br />` + dataConvert;

    }

const MakeGetAPICall = (link, async, callback) => {

    $.ajax({
        url: link,
        dataType: "json",
        type: "Get",
        async: async,
        success: function(data) { callback(data) }
    });
}

function GetResultsOfQuery(){

    const queryPrompt = document.getElementById("prompt").value.replace(" ", "+");

    if (queryPrompt.trim() == ""){

        const completeBox = document.getElementById("complete-box");
        completeBox.innerHTML = "";
        return;
    }

    MakeGetAPICall(apiURL + `?q=${queryPrompt}`, true, function(data) { UpdateSearchBoxCompletion(data, queryPrompt) });
}

function BookDetails(selflink, action="book_preview.php") {

    MakeGetAPICall(selflink, false, function(data) {

        var tempForm = document.createElement("form");
        tempForm.className = "hidden";

        tempForm.target = "_blank";
        tempForm.method = "POST";
        tempForm.action = action;

        document.body.appendChild(tempForm);

        // Add all the information
        function recurse(obj, origin) {
            for (const key in obj) {
                let value = obj[key];
                if(value != undefined) {
                    if (value && typeof value === 'object') {
                        recurse(value, key, origin + "/" + key);
                    } else {
                        
                        const input = document.createElement("input")
                        input.type = typeof value;
                        input.name = origin + "/" + key;
                        input.value = value;

                        tempForm.appendChild(input);
                    }
                }
            }
        }
        recurse(data, "");

        tempForm.submit();
        tempForm.remove();
    });
}