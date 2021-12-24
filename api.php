<!DOCTYPE html>
<html>
    <head>
        <title>API</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    </head>

    <body>
        <script>
            let xhar = new XMLHttpRequest();
            xhar.open('GET', 'http://localhost/kuliah/REST_API_CI/index.php/Mahasiswa');
            xhar.send();
            xhar.onload=function() {
                var json = JSON.parse(xhar.responseText);
                var res = json;
                console.log(res);
            }
        </script>
    </body>
</html>