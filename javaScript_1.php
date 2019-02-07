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

    <!-- Check checkbox -->
    <p>
        <input type="checkbox" id="cb_1" name="cb_1">ภาษา HTML
        <input type="checkbox" id="cb_2" name="cb_2">ภาษา CSS
    </p>
    <p>
        <input type="button" id="btn_check" onclick="testCheckbox()" value="getCheckboxById">
    </p>
</body>
</html>