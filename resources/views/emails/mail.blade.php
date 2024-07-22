<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Message</title>
</head>

<body>
    <h1>Contact Message</h1>
    <p><strong>Full Name:</strong> {{ is_string($fullname) ? e($fullname) : '' }}</p>
    <p><strong>Surname:</strong> {{ is_string($surname) ? e($surname) : '' }}</p>
    <p><strong>Phone:</strong> {{ is_string($phone) ? e($phone) : '' }}</p>
    <p><strong>Email:</strong> {{ is_string($email) ? e($email) : '' }}</p>


    <p><strong>Message:</strong> {{ is_string($text) ? e($text) : 'N/A' }}</p>
</body>

</html>
