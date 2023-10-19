//EXAM PAGE SECURITY
const form = document.getElementById("step1");

//1. Function to check if a click is outside the form
function isClickOutsideForm(event) {
    return !form.contains(event.target);
}

// Event listener to submit the form when a click is detected outside the form
document.addEventListener("click", function (event) {
    if (isClickOutsideForm(event)) {
        form.submit();
    }
});

//2. Add an event listener to the document to listen for visibility changes
document.addEventListener('visibilitychange', function() {
    if (document.hidden) {
        //select the lock button and lock
        var lock = document.getElementById("myButton");
        lock.click();
        console.log('Page is now hidden');
    }
});
