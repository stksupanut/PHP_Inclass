<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JavaScript 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="script/script.js" type="text/javascript"></script>
</head>
<script type="text/javaScript">
    document.write("Hello JavaScript")

    function hello() {
        var x = 20;
        var str = "ตัวเลข คือ ";
        alert(str + x);
    }
</script>
<body>
    <p>
        <button id="btn_hello" onclick="hello()">Hello</button>
    </p>

    <!-- Script Inline -->
    <p>
        <button id="btn_inline" onclick="javascript:alert('Hello JavaScript Inline!')">JS Inline</button>
    </p>

    <!-- External Script -->
    <p>
        <button id="btn_external" onclick="hello2()">External JS</button>
    </p>
    <br><br>

    <!-- 
        - ดึง element ที่ต้องการ
            document/node.getElementById("id") ดึงจาก id
            document/node.getElementByTagName("tagName") ดึงจาก Tag
        - ดึง element ที่ต้องการ
            document.createElement(nodeName)
            document.createTextNode(nodeValue)
        - การเพิ่ม หรือแทรก element ที่ต้องการ
            node.appendChild(newChild)
            node.removeChild(oldChild)
            node.InsertBefore(newChild, oldChild)
            node.replaceChild(newChild, oldChild)
     -->

    ชื่อ : <input type="text" id="txt_name" name="txt_name"><br>
    นามสกุล : <input type="text" id="txt_Surname" name="txt_Surname"><br>
    ผลลัพธ์ : <input type="text" id="txt_Result" name="txt_Result"><br>
    <input type="button" id="btn_result" onclick="testElement()" value="getElementById"><br><br><br>

    <!-- Check Checkbox -->
    <p>
        <input type="checkbox" id="cb_1" name="cb_1">ภาษา HTML
        <input type="checkbox" id="cb_2" name="cb_2">ภาษา CSS
    </p>
    <p>
        <input type="button" id="btn_check" onclick="testCheckbox()" value="getCheckboxById">
    </p>
    <br><br><br>

    <!-- Check Raio -->
    <div id="stuYear">
        <p>
            <input type="radio" id="rd_1" name="year" onclick="testRadio(stuYear)" value="ปี 1">ปี 1
            <input type="radio" id="rd_2" name="year" onclick="testRadio(stuYear)" value="ปี 2">ปี 2
            <input type="radio" id="rd_3" name="year" onclick="testRadio(stuYear)" value="ปี 3">ปี 3
            <input type="radio" id="rd_4" name="year" onclick="testRadio(stuYear)" value="ปี 4">ปี 4
        </p>
    </div>
    <!-- <input type="button" id="btn_radio" onclick="testRadio(stuYear)" value="getRadioById(stuYear)"> -->
    <br>
    <input type="text" id="txt_year">

    <!-- ยืนยัน -->
    <p></p>
    <form onsubmit="confirmSubmit()" name="form1">
        ชื่อ - นามสกุล : <input type="text" id="txt_name" name="txt_name"><br>
        <input type="submit" id="submit" name="submit" value="ยืนยัน" onclick="allLetter(document.form1.txt_name)">
    </form>

    <!-- ตรวจสอบ กรอกข้อมูลให้ครบทุกช่อง -->
    <p></p>
    <form onsubmit="return validForm(this)">
        <h4>ฟอร์มสมัครสมาชิก</h4>
        ชื่อ : <input type="text" id="txt1" name="name"><br>
        ที่อยู่ : <input type="text" id="txt2" name="address"><br>
        เบอร์โทร : <input type="text" id="txt3" name="telephone"><br>
        <input type="submit" id="submit2" name="submit2" value="บันทึก">
    </form>

    <!-- เลือกรายการใน dropdown list -->
    <p></p>
    <select id="moto" onchange="setSelect()">
        <option value="0">Honda</option>
        <option value="1">Yamaha</option>
        <option value="2">Kawasaki</option>
        <option value="3">Ducati</option>
        <option value="4">อื่นๆ</option>
    </select>
    <br>
    <input type="text" id="txt_moto" name="txt_moto">
</body>
</html>