function airport() {
    let x = document.getElementById("air").value;

    let y = document.getElementById("abb").value;

    let st = document.getElementById("states").value;

    let xreg = /^[a-zA-Z]{2,15}$/;

    let abreg = /^[A-Z]^/;

    let yreg = /^[a-zA-Z]{2,15}$/;

    if (x == "") {
        alert("airport name field is empty");

        return false;
    } else if (!xreg.test(x)) {
        alert("enter a valid name");

        return false;
    } else if (y == "") {
        alert(
            "abbreviation field cannot be  empty and must in capital letter"
        );

        return false;
    }
    // else if (!yreg.test(x)) {
    //     alert("enter valid abbreviation ");

    //     return false;
    // }
    //  else if (!abreg.test(y)) {
    //     alert("abbreviation must be in capital letters");

    //     return false;
    // }
    else if (st === "") {
        alert("choose an option");

        return false;
    }
}

// airline add
function airline() {
    let x = document.getElementById("arln").value;

    let xreg = /^[a-zA-Z]{2,15}$/;

    if (x == "") {
        alert("name field is empty");

        return false;
    } else if (!xreg.test(x)) {
        alert("enter a valid name");

        return false;
    }
}

// add flight
function flight() {
    let x = document.getElementById("fly").value;

    let y = document.getElementById("seat").value;

    let xreg = /^[a-zA-Z]{2,15}$/;
    if (x == "") {
        alert("name field is empty");

        return false;
    } else if (!xreg.test(x)) {
        alert("enter a valid name");

        return false;
    } else if (y == "") {
        alert("enter the number of seats");

        return false;
    } else if (y < 0) {
        alert("enter valid number");

        return false;
    } else if (isNaN(y)) {
        alert("please enter the number");

        return false;
    }
}
//price
function price() {
    let bseat = document.getElementById("b").value;

    let eseat = document.getElementById("e").value;
    let brate = document.getElementById("br").value;

    let erate = document.getElementById("er").value;

    if (bseat == "") {
        alert("enter the number of business seats");

        return false;
    } else if (bseat < 0) {
        alert("enter valid number");

        return false;
    } else if (isNaN(bseat)) {
        alert("please enter the number");

        return false;
    }
    if (eseat == "") {
        alert("enter the number of economy seats");

        return false;
    } else if (eseat < 0) {
        alert("enter valid number");

        return false;
    } else if (isNaN(eseat)) {
        alert("please enter the number");

        return false;
    }

    if (brate == "") {
        alert("enter the number of business seats");

        return false;
    } else if (brate < 0) {
        alert("enter valid number");

        return false;
    } else if (isNaN(brate)) {
        alert("please enter the number");

        return false;
    }
    if (erate == "") {
        alert("enter the number of economy seats");

        return false;
    } else if (erate < 0) {
        alert("enter valid number");

        return false;
    } else if (isNaN(erate)) {
        alert("please enter the number");

        return false;
    }
}
//root
function root() {
    let x = document.getElementById("air").value;

    let y = document.getElementById("fly").value;
    let z = document.getElementById("date").value;
    let m = document.getElementById("time").value;

    if (x == "") {
        alert("airline field is empty");

        return false;
    } else if (!xreg.test(x)) {
        alert("enter a valid name");

        return false;
    } else if (y == "") {
        alert("enter the number of seats");

        return false;
    } else if (y < 0) {
        alert("enter valid number");

        return false;
    } else if (isNaN(y)) {
        alert("please enter the number");

        return false;
    }
}
