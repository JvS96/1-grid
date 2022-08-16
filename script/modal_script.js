// Get the modal
var list_modal = document.getElementById("issue_module");

// Get the button that opens the modal
var list_btn = document.getElementById("list_issue");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
list_btn.onclick = function() {
    list_modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    list_modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == list_modal) {
        list_modal.style.display = "none";
    }
}