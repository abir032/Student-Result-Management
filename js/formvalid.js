var form = document.getElementById('srform');
var uname = document.getElementById('sname');
var email = document.getElementById('email');
var password = document.getElementById('password');
var dob = document.getElementById('date');
var pno = document.getElementById('Phone_no');
form.addEventListener("submit", (e) => {

    //alert('hello');
    //checkinput();
    if (!checkinput()) {
        e.preventDefault();
    } else return true;


});

function checkinput() {
    var username = uname.value.trim();
    var emailvalue = email.value.trim();
    var passwordvalue = password.value.trim();
    var dobvalue = dob.value.trim();
    var pnovalue = pno.value.trim();
    var u_n = true;
    var em = true;
    var pas = true;
    var d = true;
    var pn = true;

    if (!checkuser_name(username)) {
        var textfield = document.getElementById("sname").parentElement;
        u_n = false;
        errormessage(textfield, 'Username must be 10 to 30 charecter long and must have first and last name');

    }
    if (!emailcheck(emailvalue)) {
        var textfield = document.getElementById("email").parentElement;
        em = false;
        errormessage(textfield, 'invalid email format follow- example@std.ewubd.edu');
    }
    if (!passwordcheck(passwordvalue)) {
        var textfield = document.getElementById("password").parentElement;
        pas = false;
        errormessage(textfield, 'password must be 10 to 20 charecter long and must have charecter,uppercase,lowercase & number');

    }
    if (!dobcheck(dobvalue)) {
        var textfield = document.getElementById("date").parentElement;
        d = false;
        errormessage(textfield, 'date of birth must be valid');

    }
    if (!pnocheck(pnovalue)) {
        var textfield = document.getElementById("Phone_no").parentElement;
        pn = false;
        errormessage(textfield, 'Phone number must be valid');

    }
    if (u_n && em && pas && d && pn) {
        return true;
    }

}

function pnocheck(phone_no) {
    if (phone_no[0] == '+' && phone_no.length == 14) {
        if ((Number(phone_no[1]) == 8 && Number(phone_no[2]) == 8 && Number(phone_no[3]) == 0 && Number(phone_no[4]) == 1) && Number(phone_no[5]) == 7 || Number(phone_no[5]) == 9 || Number(phone_no[5]) == 6 || Number(phone_no[5]) == 3 || Number(phone_no[5]) == 4) {
            return true;

        } else { return false; }
    } else if (Number(phone_no[0]) == 0 && phone_no.length == 11) {

        if ((Number(phone_no[1]) == 0 && Number(phone_no[2]) == 1) && Number(phone_no[3]) == 7 || Number(phone_no[3]) == 9 || Number(phone_no[3]) == 6 || Number(phone_no[3]) == 3 || Number(phone_no[3]) == 4) {
            return true;

        } else {
            return false;

        }

    } else {
        return false;
    }

}

function dobcheck(dob) {
    var year = dob.slice(0, 4);
    //document.write(year);
    var d = new Date();
    var curr = d.getFullYear();
    if ((curr - year) <= 18) {
        return false;
    } else {
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




function emailcheck(email) {
    var len = email.length;

    var endp = len - 14;
    let end = email.slice(endp, len);
    if (end == "@std.ewubd.edu") {
        return true;
    } else {
        return false;
    }
}

function checkuser_name(username) {
    var check = false;
    var len = username.length;
    if (len >= 10 && len <= 30) {
        for (var i = 0; i < len; i++) {
            if (i > 2 && username[i] == ' ') {
                check = true;
            }
        }
        if (check != true) {
            return false;
        } else {
            return true;
        }
    } else return false;

}




function errormessage(textfield, message) {
    var small = textfield.querySelector('small');

    small.innerText = message;

    //console.log(textfield);
    textfield.className = "textfield error";

}