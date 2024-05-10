<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pepicase</title>
    <link rel="stylesheet" href="/pepicase/header-footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Tera:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/pepicase/fonts.css">
</head>
<body>
    <div>
        <form>
            <input type="text" name="name" placeholder="demo-name">
            <input type="text" name="age" placeholder="demo-age">
            <input type="submit" value="Go">
            <div id=""></div>
        </form>
        <div id="return"></div>
    </div>
    <script>
        var form = document.querySelector("form");
        form.querySelector("input[type='submit']").addEventListener("click", function(event) {
            event.preventDefault();
            var inputName = form.querySelector("input[name='name']").value;
            var inputAge = form.querySelector("input[name='age']").value;
            var data = 
            {
                name: inputName,
                age: inputAge
            };
            fetch("/pepicase/back-end/process-login.php",  
            {
                method: 'POST',
                headers: 
                    {
                        'Content-Type': 'application/json'
                    },

                body: JSON.stringify(data),
            })
            .then(response => response.text())
            .then(responseData => {
                document.querySelector("#return").innerText = responseData;
            })
            .catch(error => {
                console.error('Error:', error);
            });
});
    </script>
</body>
</html>