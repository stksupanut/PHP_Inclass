function hello2() {
    alert("External JS");
}

function testElement() {
    var name = document.getElementById("txt_name").value;
    var Surname = document.getElementById("txt_Surname").value;
    document.getElementById("txt_Result").value = name + " ♥ " + Surname;
}

function testCheckbox() {
    if (document.getElementById('cb_1').checked == false) {
        alert("HTML Unchecked");
    }
    if (document.getElementById('cb_2').checked == false) {
        alert("CSS Unchecked");        
    }
}