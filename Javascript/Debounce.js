
//Debounce will put a delay on calling the function you pass as an argument 20 = 20 milliseconds

function debounce(func, wait = 20, immediate = true) {

    var timeout;

    return function() {
        var context = this, args = arguments;
        var later = function() {
        timeout = null;
        if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };

}

// Example
window.addEventListener('scroll', debounce(functionName));