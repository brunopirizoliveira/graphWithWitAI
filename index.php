<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReportAI</title>
</head>
<body>

    <h4>Digite o que deseja e após, clique em enviar</h4>    
    <input type="text" placeholder="Exemplo: Acenda a luz" name="phrase" id="phrase">
    <button name="send" id="send">Enviar</button>

    <script>

        bt  = document.querySelector('#send');
        ph = document.querySelector('#phrase');

        bt.addEventListener('click', function() {
            sendToWitApi(ph.value)
        });

        function sendToWitApi(value)
        {
            var link = 'execute.php?q=' + value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', link);
            xhr.send(null);

            xhr.onreadystatechange = function () {
                var DONE = 4;
                var OK = 200;
                if (xhr.readyState === DONE) {
                    if (xhr.status === OK) {
                        console.log(xhr.responseText);
                        console.dir(xhr);                        
                    } else {
                        console.log('Error: ' + xhr.status);
                    }
                }
            };
        }

    </script>

</body>
</html>
