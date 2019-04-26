<?php
  // var_dump($this->_dataArr);
    $time =  $this->_dataArr['list'][0]['dt_txt'];

    $timeArr = explode(" ", $time);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather App</title>
    <link rel="stylesheet" href="/public/css/styleView.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

</head>
<body>
<div class="screen">
    <!--<div style="position: absolute ; height: 100% ; width: 100% ;background-color: black;opacity:.5 "></div> &lt;!&ndash; overlay &ndash;&gt;-->
    <div class="container">
        <h1 class="cityHead" > <?= $this->_dataArr['city']['name'] ?> Current Weather  </h1>
        <div class="card">
            <div class="part1">
                <h1> <?= $this->_dataArr['city']['name'] ?> City</h1>
                <h4> <?= $this->_dataArr['city']['country'] ?> </h4>
                <div class="info">
                    <p class="temp" ><?= round($this->_dataArr['list'][0]['main']['temp']) ?>&#x2103;</p>
                    <div class="time">
                        <p ><?= $timeArr[1] ?></p>
                        <span > <?= date("l") ?> . <?= $timeArr[0] ?></span>
                    </div>

                </div>
            </div>
            <div class="part2">
                <img src="/public/photo/icon.png">
                <h1 class="weatherStatue"><?= $this->_dataArr['list'][0]['weather'][0]['main']?></h1>
                <uL>
                    <li>Max temp <span><?= round($this->_dataArr['list'][0]['main']['temp_max']) ?>&#x2103;</span></li>
                    <li>Min temp<span><?= round($this->_dataArr['list'][0]['main']['temp_min']) ?>&#x2103;</span></li>
                    <li>Weather<span><?= $this->_dataArr['list'][0]['weather'][0]['description']?></span></li>
                    <li>Humidity<span><?= $this->_dataArr['list'][0]['main']['humidity']?> %</span></li>
                    <li>Wind speed<span><?= $this->_dataArr['list'][0]['wind']['speed']?> KM/S</span></li>
                </uL>
            </div>
        </div>
        <p style="color: azure ; text-align: center ; font-weight: bold ">&copy; 2018 All Right Reserved | Designed By Mahmoud Ahmed</p>
    </div>
    <div class="link">
        <a href="/"  ><span>Go To Enter City </span></a>
    </div>


</div>


<script src="/public/js/jquery-3.2.1.min.js"></script>
<script src="/public/js/script.js"></script>
</body>
</html>