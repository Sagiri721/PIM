
function LoadBookFromId() {
    
    let id = document.getElementById("bookId").value;
    let collection = document.getElementById("category").value;

    let bookLink = apiURL + "/" + id;

    BookDetails(bookLink, "actions/add_book.php?collection=" + collection);
}

function RemoveItem(itemID) {

    const element = document.getElementById(itemID);
    element.remove();
}

function updateRow(row){

    const tableRow = document.getElementById(row.toString());

    const read = tableRow.querySelectorAll("label>input")[0].checked;
    const bought = tableRow.querySelectorAll("label>input")[1].checked;

    const id = tableRow.querySelectorAll("td")[0].innerText;

    const collection = tableRow.querySelectorAll("select")[0].value;
    const myScroll = tableRow.offsetTop;

    $.ajax({
        url: "actions/update_book.php?isRead=" + read + "&isBought=" + bought + "&collection=" + collection + "&id=" + id,
        type: "Get",
        async: true,
        success: function(data) { 

            // Reload page and scroll
            window.location.reload();
            tableRow.offsetTop = myScroll;
        },
        error: function (xhr, exception) {

            alert("Erro ao atualizar: " + xhr.status + " " + exception);
            window.location.reload();
            tableRow.offsetTop = myScroll;
        }
    });
}