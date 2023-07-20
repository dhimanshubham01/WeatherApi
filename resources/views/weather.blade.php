<?php
    $ststus="";
     $arrCity=["delhi","shimla"];
    // if (isset($_POST['search'])) {
    //     $city = $_POST['city'];
    //     array_push($arrCity,$city);
    //     $result = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=$city&appid=f78cb4a4caaa773f8452215202f94087");
    //     $result = json_decode($result, true);    
    //     $ststus="yes";
    //     print_r($arrCity);
        
    // }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="php" href="1.php">
        <title>Weather Api 2</title>
        <style>
            *{
                font-family: sans-serif;
            }
            body{
                height: 100vh;
                background-color: #265C4B;
            }
            .clr{
                width: 100%;
                height: 100%;
                text-align: center;   
                margin-top: 10vh;
                
            }
            .div2{
                margin: 15%;
                background-color: #8FC1B5;
                display:flex;
                
            }
            .size{
                border-radius: 10px;
                background-color:#8FC1B5;
                height:5vh;
                width:60px;
            }
            h1{
                padding-right: 35px;
            }
            #error{
                padding-left        : "100px";
                text-align          : "center";
                margin-top          : 35vh;
                padding-right       : 4vw;
                background-color    : #4F709C;
                color               : #FE0000;
            }
        </style>
    </head>
    <body> 
        <div class = "clr">
                <h1>Weather Api</h1>
                <div style = "margin-top: 10vh;">
                    <form action = "/index/login/check/weather" method = "post">
                        @csrf
                        <input list = "cities" name = "city" placeholder = "e.g.Delhi" style = "height:5vh;">
                        <!-- <input type="text" name="city" > -->
                        <datalist id = "cities">
                            <?php foreach($arrCity as $like){ ?><option value = <?php echo $like; ?>><?php echo $like;} ?></option> 
                        </datalist>
                        <button name = "search" class = "size"><b>search</b></button>
                        
                    </form>
                </div>
                @isset($error)
                    <div id = "error">
                        <b><h2>{{$error}}</h2><b>
                    </div>
                @endisset
                <div class = "div2">
                    
                    @isset($status) 
                        <div style = "width: 50%;color:#146551;">
                            <h2>temp</h2>
                            <h2>city</h2>
                            <h2>Wind speed</h2>
                            <!-- <h2>tap to favorate</h2> -->
                        </div>
                        <div style = "width: 50%;">
                            <h2>
                                <?php echo round($result['main']['temp'] - 273.15) ?>*
                            </h2>
                            <h2>
                                <?php echo $result['name'] ?>
                            </h2>
                            <h2>
                                <?php echo $result['wind']['speed'] ?>
                            </h2>
                        </div>
                    
                    @endisset 
                </div>
        </div>
    </body>
</html>