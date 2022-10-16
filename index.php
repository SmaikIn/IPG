<?php
require "config.php";
require "function.php";

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Страничка</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<style>
    .container {
        width: 1300px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .body_div {
        width: 700px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .input_row {
        width: 600px;
    }

    .input-group-text {
        width: 200px;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    input {
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    input:invalid {
        border-color: red;
    }

    input:valid {
        border-color: green;
    }

    select:invalid {
        border-color: red;
    }

    select:valid {
        border-color: green;
    }

    select {

        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .btn {
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<body>
<script>
    function cat_fun() {
        var formdata = new FormData();
        let data = document.getElementById("category").value;
        if (data === "") {
            document.getElementById("doctors").innerHTML = "<option value=''>Выберите Специальность</option>";
            return 0;
        }
        formdata.append("cat_fun", 1);
        formdata.append("category", data);
        var ajax = new XMLHttpRequest();
        ajax.addEventListener("load", complete_cat, false);
        ajax.open("POST", "function.php");
        ajax.send(formdata);

        function complete_cat(event) {
            document.getElementById("doctors").innerHTML = event.target.response;
            document.getElementById("date").value = 0;
            document.getElementById("time").innerHTML = "<option value=''>Выберите Дату</option>";
        }
    }

    function check_time() {
        var formdata = new FormData();
        let date = document.getElementById("date").value;
        let doctors = document.getElementById("doctors").value;
        if (date === "") {
            document.getElementById("time").innerHTML = "<option value=''>Выберите Дату</option>";
            return 0;
        }
        if (doctors === "") {
            document.getElementById("time").innerHTML = "<option value=''>Выберите Специалиста</option>";
            return 0;
        }
        formdata.append("check_time", 1)
        formdata.append("date", date);
        formdata.append("doctors", doctors);
        var ajax = new XMLHttpRequest();
        ajax.addEventListener("load", complete_time, false);
        ajax.open("POST", "function.php");
        ajax.send(formdata);

        function complete_time(event) {
            document.getElementById("time").innerHTML = event.target.response;
        }
    }

    function submit_form() {
        var message = true;
        message = validation();
        if (!message) {
            return false;
        }
        var formdata = new FormData();
        formdata.append("submit", 1)
        formdata.append("name", document.getElementById('name').value)
        formdata.append("category", document.getElementById('category').value)
        formdata.append("doctors", document.getElementById('doctors').value)
        formdata.append("date", document.getElementById('date').value)
        formdata.append("time", document.getElementById('time').value)
        var ajax = new XMLHttpRequest();
        ajax.addEventListener("load", complete_form, false);
        ajax.open("POST", "function.php");
        ajax.send(formdata);

        function complete_form(event) {
            alert(event.target.response);
            document.getElementById('name').value = "";
            document.getElementById('category').value = "";
            document.getElementById('doctors').innerHTML = "<option value=''>Выберите Специальность</option>";
            document.getElementById('date').value = "";
            document.getElementById('time').innerHTML = "<option value=''>Выберите Дату</option>";
            document.getElementById('email').value = "";
        }


    }

    function validation() {
        var message = true;
        let cnt = 0;
        if (document.getElementById('name').value === "") {
            message = false;
            cnt++;
        }
        if (document.getElementById('category') === "") {
            message = false;
            cnt++;
        }
        if (document.getElementById('doctors').value === "") {
            message = false;
            cnt++;
        }
        if (document.getElementById('date').value === "") {
            message = false;
            cnt++;
        }
        if (document.getElementById('time').value === "") {
            message = false;
            cnt++;
        }
        if (document.getElementById('email').value === "") {
            message = false;
            cnt++;
        }
        if (cnt > 0) {
            alert("Заполните поля выделенные красным");
        }
        return message;
    }


</script>
<div class="container mt-4">
    <div class="row border body_div">
        <div class="row">
            <h3>Форма записи пациента на приём</h3>
        </div>
        <br>
        <div class="row input_row">
            <div class="input-group">
                <span class="input-group-text">ФИО</span>
                <input type="text" class="form-control" id="name" name="name"
                       placeholder="Пример: Сергеев Николай Алексеевич"
                       required>
            </div>
        </div>
        <br>
        <br>
        <div class="row input_row">
            <div class="input-group">
                <span class="input-group-text">E-mail</span>
                <input type="text" class="form-control" id="email" name="email"
                       placeholder="Пример: example0123@mail.ru"
                       required>
            </div>
        </div>
        <br>
        <br>
        <div class="row input_row">
            <div class="input-group">
                <span class="input-group-text">Специалиность</span>
                <select class="form-select" id="category" name="category" required onchange="cat_fun()">
                    <option value="">Не выбрано</option>
                    <? list_cat($connect); ?>
                </select>
            </div>
        </div>
        <br>
        <br>
        <div class="row input_row">
            <div class="input-group">
                <span class="input-group-text">Врач</span>
                <select class="form-select" id="doctors" name="doctors" required>
                    <option value="">Выберите Специальность</option>
                </select>
            </div>
        </div>
        <br>
        <br>
        <div class="row input_row">
            <div class="input-group">
                <span class="input-group-text">Дата</span>
                <input class="form-control" id="date" name="date" type="date" min="<?= $today ?>" max="<?= $today_14 ?>"
                       required onchange="check_time()">
            </div>
        </div>
        <br>
        <br>
        <div class="row input_row">
            <div class="input-group">
                <span class="input-group-text">Время</span>
                <select class="form-select" id="time" name="time" required>
                    <option value="">Выберите Дату</option>
                </select>
            </div>
        </div>
        <br>
        <br>
        <div class="row input_row">
            <br>
            <button class="btn btn-success btn" onclick="submit_form()">Записаться на приём</button>
        </div>
    </div>
</div>
</body>

</html>