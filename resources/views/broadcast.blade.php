<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laravel Reverb Test</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    <h1>Realtime Message</h1>

    <ul id="messages"></ul>

    <script>
        window.onload = function() {
            window.Echo
                .channel('channel-name')
                .listen('SimpleMessage', (e) => {
                    const li = document.createElement('li');
                    li.textContent = e.name;

                    document.getElementById('messages').appendChild(li);
                });
        };
    </script>




</body>

</html>
