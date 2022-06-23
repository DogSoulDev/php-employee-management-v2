<!-- This is the error view that you should show when the request was wrong -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>OH NO NOT THE 404, no just an error page !!!!!!</h1>
    <?
    if (isset($e)) {
        print_r('Error connecting: ' . $e->getMessage());
    }
    ?>
</body>

</html>