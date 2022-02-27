var form = document.getElementById('srform');
var quiz = document.getElementById('quiz');
var cwork = document.getElementById('cwork');
var mid1 = document.getElementById('mid1');
var mid2 = document.getElementById('mid2');
var final = document.getElementById('final');
form.addEventListener("submit", (e) => {


    //checkinput();
    if (!checkinput()) {
        e.preventDefault();
    } else return true;
});

function checkinput() {

    var quizvalue = quiz.value.trim();

    var cworkvalue = cwork.value.trim();

    var mid1value = mid1.value.trim();

    var mid2value = mid2.value.trim();

    var finalvalue = final.value.trim();


    var q = true;
    var c = true;
    var m1 = true;
    var m2 = true;
    var f = true;


    if (!checkmark(quizvalue)) {
        var textfield = document.getElementById("quiz").parentElement;
        q = false;
        errormessage(textfield, 'please input positive number');
    }
    if (!checkmark(cworkvalue)) {
        var textfield = document.getElementById("cwork").parentElement;
        c = false;
        errormessage(textfield, 'please input positive number');
    }
    if (!checkmark(mid1value)) {
        var textfield = document.getElementById("mid1").parentElement;
        m1 = false;
        errormessage(textfield, 'please input positive number');
    }
    if (!checkmark(mid2value)) {
        var textfield = document.getElementById("mid2").parentElement;
        m2 = false;
        errormessage(textfield, 'please input positive number');
    }
    if (!checkmark(finalvalue)) {
        var textfield = document.getElementById("final").parentElement;
        f = false;
        errormessage(textfield, 'please input positive number');
    }
    if (q && c && m1 && m2 && f) {
        return true;
    }
}

function checkmark(mark) {

    if (mark >= 0) {
        return true;
    } else {
        return false;
    }

}

function errormessage(textfield, message) {
    var small = textfield.querySelector('small');

    small.innerText = message;

    //console.log(textfield);
    textfield.className = "textfield error";
}