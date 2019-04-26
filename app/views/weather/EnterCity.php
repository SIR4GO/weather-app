<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather App</title>
    <link rel="stylesheet" href="/public/css/styleFormView.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


</head>
<body>

<div class="screen">
    <div class="overlay">
        <div class="container">
            <h1 id='header' > Enter Your town   </h1>
            <div class="card">
                <form method="post">
                    <input id="input1" type="text" name="city" placeholder="Enter City">
                    <input id= "input2" class="sub" placeholder="show" type="submit" name="submit" value="Show" >
                </form>
            </div>
        </div>
    </div>

</div>


<script src="/public/js/jquery-3.2.1.min.js"></script>
<script src="/public/js/script.js"></script>

</body>
</html>