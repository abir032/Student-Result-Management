var form = document.getElementById('srform');

var npassword = document.getElementById('npassword');
var rpassword = document.getElementById('rpassword');

form.addEventListener("submit", (e) => {

    //alert('hello');
    //checkinput();
    if (!checkinput()) {
        e.preventDefault();
    } else return true;


});

function checkinput() {

    var npasswordvalue = npassword.value.trim();
    var rpasswordvalue = rpassword.value.trim();
    var npas = true;
    var rpas = true;
    var mpas = true;
    if (!passwordcheck(npasswordvalue)) {
        var textfield = document.getElementById("npassword").parentElement;
        npas = false;
        errormessage(textfield, 'password must be 10 to 20 charecter long and must have charecter,uppercase,lowercase & number');

    }
    if (!passwordcheck(rpasswordvalue)) {
        var textfield = document.getElementById("rpassword").parentElement;
        rpas = false;
        errormessage(textfield, 'password must be 10 to 20 charecter long and must have charecter,uppercase,lowercase & number');

    }


    if (npas && rpas) {
        return true;
    }
}



function passwordcheck(pass) {

    var len = pass.length;
    var strlowcnt = 0;
    var strupcnt = 0;
    var strnumcnt = 0;
    var strsccount = 0;

    if (len >= 5 && len <= 20) {

        for (var i = 0; i < len; i++) {
            if ((pass[i].charCodeAt(0) >= 32 && pass[i].charCodeAt(0) <= 47) || (pass[i].charCodeAt(0) >= 58 && pass[i].charCodeAt(0) <= 64) || (pass[i].charCodeAt(0) >= 91 && pass[i].charCodeAt(0) <= 96) || (pass[i].charCodeAt(0) >= 123 & pass[i].charCodeAt(0) <= 126)) {
                strsccount++;
            } else if (pass[i].charCodeAt(0) >= 97 && pass[i].charCodeAt(0) <= 122) {
                strlowcnt++;
            } else if (pass[i].charCodeAt(0) >= 65 && pass[i].charCodeAt(0) <= 90) {
                strupcnt++;
            } else if (pass[i].charCodeAt(0) >= 48 && pass[i].charCodeAt(0) <= 57) {
                strnumcnt++;
            }
        }


        if (strlowcnt >= 1 && strsccount >= 1 && strupcnt >= 1 && strnumcnt >= 1) {
            return true;
        } else {
            return false;
        }
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