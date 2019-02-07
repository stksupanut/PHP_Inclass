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

function testRadio(stuYear) {
    var stuYear = document.getElementsByName('year');
    var yearValue;
    for (var i = 0; i < stuYear.length; i++) {
        if (stuYear[i] .checked) {
            yearValue = stuYear[i].value;
        }
    }
    document.getElementById('txt_year').value = yearValue;
}

// แสดงข้อความยืนยันฟอร์ม
function confirmSubmit() {
    if (confirm('ยืนยันหรือไม่') == true) {
        return true;
    }else {
        return false;
    }
}

// ตรวจสอบกรอกข้อมูลให้ครบทุกช่อง
function validForm(frm) {
    for (var i = 0; i < frm.elements.length; i++) {
        if (frm.elements[i].value == "") {
            alert('กรุณากรอกข้อมูลให้ครบ !!');
            return true;
        }
    }
    return true;
}

// แสดงค่าใน Dropdown List
function setSelect() {
    var e = document.getElementById('moto');
    var strMoto = e.options[e.selectedIndex].value;
    alert(strMoto);
    
    var e = document.getElementById('moto');
    var strMoto = e.options[e.selectedIndex].text;
    alert(strMoto);

    document.getElementById('txt_moto').value = strMoto;
}