var string = " Online Flight Booking";
var str = string.split("");
var el = document.getElementById("str");
(function animate() {
    str.length > 0 ? (el.innerHTML += str.shift()) : clearTimeout(running);
    var running = setTimeout(animate, 90);
})();

function validate() {
    let name = document.getElementById("a").value;
    let number = document.getElementById("b").value;
    let ans = /^[0-9]{10}$/;
    let email = document.getElementById("c").value;
    let e = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let pwd = document.getElementById("d");
    let pass = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/;

    if (name == "") {
        alert("Name is empty");
        return false;
    } else if (!reg.test(name)) {
        alert("name should not be a number");
        return false;
    } else if (number == "") {
        alert("phone number is empty");
        return false;
    } else if (!ans.test(number)) {
        alert("phone number should have 10 digits");
        return false;
    } else if (!e.test(email)) {
        alert("Enter valid email address");
        return false;
    } else if (pwd === "") {
        alert("Enter password");
        return false;
    } else if (pass == "") {
        alert("Enter a valid password");
    } else {
        return true;
    }
}
