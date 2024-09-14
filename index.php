<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax</title>
</head>
<body>
    <div class="blue x" ajax="Синий"></div>
    <div class="red x" ajax="Красный"></div>
    <div class="black x" ajax="Черный"></div>
    <div class="result"></div>
</body>
</html>

<script type="text/javascript">
    const dd = document
    let blocks = dd.querySelectorAll('.x')
    let url = 'ajax.php'

    function ajax (data, url, objectClass) {
        let param = 'data=' + data
        let request = XMLHttpRequest()
        request.open ('POST', url, true)
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        request.send(param)
        request.addEventListener('readystatechange', () => {
            if (request.readyState === 4 && request.status === 200) {
                dd.querySelector(objectClass).innerHTML = request.responseText
            }
        })
    }

for (let i = 0; i < blocks.length; i++) {
    let data = blocks[i].getAttribute('ajax')
    blocks[i].onclick = () => {
        ajax (data, url, '.result')
    }
}
</script>

<style type="text/css">
div {
    width: 100px;
    height: 100px;
    margin-top: 10px;
}

.blue {
    background: blue;
}
.red {
    background: red;
}
.black {
    background: black;
}

</style>