
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

function updateRow(row, id, amount=0){

    const tableRow = document.getElementById(row.toString());

    const read = tableRow.querySelectorAll("select")[0].value;
    const bought = tableRow.querySelectorAll("label>input")[0].checked;

    const collection = tableRow.querySelectorAll("select")[1].value;
    const myScroll = tableRow.offsetTop;

    $.ajax({
        url: "actions/update_book.php?isRead=" + read + "&isBought=" + bought + "&collection=" + collection + "&id=" + id + "&amount=" + amount,
        type: "Get",
        async: true,
        success: function(data) { 

            // Reload page and scroll
            window.location.reload();
            tableRow.offsetTop = myScroll;

            console.log(data);
        },
        error: function (xhr, exception) {

            alert("Erro ao atualizar: " + xhr.status + " " + exception);
            window.location.reload();
            tableRow.offsetTop = myScroll;
        }
    });
}

function deleteRow(id){

    const response = confirm("Deseja mesmo apagar este livro?");
    if (!response) return;

    $.ajax({
        url: "actions/delete_book.php?&id=" + id,
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