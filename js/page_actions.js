
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