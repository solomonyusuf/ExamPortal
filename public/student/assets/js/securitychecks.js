//EXAM PAGE SECURITY
//1. Add an event listener to the document to listen for visibility changes
document.addEventListener('visibilitychange', function() {
    if (document.hidden) {
        //select the lock button and lock
        var lock = document.getElementById("myLock");
        lock.click();
        console.log('Page is now hidden');
    }
});
