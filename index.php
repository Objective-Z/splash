<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

    
    <script type="text/javascript" src="onClick.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="homepage.css"/>

<title>Splash</title>
</head>

<body>
	
	<!--<h2>Location Search Test</h2>
	<p>This is a test page</p>-->
    <div class="header">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li><a href="index.html" class="">HOME</a></li>
                </ul>
            </div>
        </nav>
    </div>
	<div class="container-fluid">	
		<div class="content">
			<div class="row">
                <!--first row-->
				<div class="col-xs col-md-2">
					<div class="entrance" id="">
						<div class="weather-input">
                            <div class="form-group">
				                <label for="input_location" class="sr-only">Enter Location</label>
				                <input id="awxSearchTextBox" class="form-control" name="input_location" placeholder="Enter location">
                            </div>
                            <div class="form-group">
				                <button id="awxSearchButton" type="submit" class="btn btn-info" name="submit_location">Submit</button>
                            </div>
						</div>
						<!--show weather-->
						<div class="weather">
                            <h4 class="temp" id="awxWeatherInfo"><span id="">Temperature</span>&#176</h4>
                            <span id="humidity">Humidity...</span>
						</div>
                    </div>
                    <div class="tips">
                        <!--tips to be added-->
                        <p class="tip" id="tip">When you’re out in the cold, your body’s “good” brown fat activates, which burns calories (the other type of fat, white fat, does not contribute to a calorie burn). Exercising when it’s hot doesn’t burn more calories, however.</p>
                    </div>
                </div>
                <!--second row-->
                <div class="col-xs col-md-10">
                        <div class="" id="">
                            <h2 id="heading">Stay Healthy</h2>
                        </div>
                        <form  action="index.php" method="post">
                            <div class="secondform" id="">
                                <div class="row">
                                    <!--column 1 for ...-->
                                    <div class="col-xs col-md-3">
                                        <p id="" class="subtitle" >Walking</p>
                                        <button type="button" class="walking" id="walking"><img class="blue" id="" src="walking.jpg" height="150" width="150"></button>
                                    </div>
                                    <!--column 2 for ...-->
                                    <div class="col-xs col-md-3">
                                        <p id="" class="subtitle">Running</p>
                                        <button type="button" class="walking"><img class="blue" id="" src="running.jpg" height="150" width="150"></button>
                                    </div>
                                    <!--column 3 for ...-->
                                    <div class="col-xs col-md-3">
                                        <p id="" class="subtitle">Cycling</p>
                                        <button type="button" class="walking"><img class="blue" id="" src="cycling.jpg" height="150" width="150"></button>
                                    </div>
                                    <!--column 4 for ...-->
                                    <div class="col-xs col-md-3">
                                        <p id="" class="subtitle">Kayaking</p>
                                        <button type="button" class="walking"><img class="blue" id="" src="kayaking.jpg" height="150" width="150"></button>
                                    </div>
                                    <hr />
                                    <!--new row to separate result with form-->
                                    <div class="row">
                                        <div class="col-xs col-md-5">
                                            <div class="form-input">
                                                <div class="form-group">
                                                    <label for="time">Distance</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="number" id="" name="time" placeholder="How far will you run?"><div class="input-group-addon">feet</div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="time">Time</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="number" id="" name="time" placeholder="How long will you run"><div class="input-group-addon">minutes</div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="weight">Weight</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="number" id="" name="weight" placeholder="How much do you weight"><div class="input-group-addon">pounds</div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="number" name="age" placeholder="age">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="number" name="heart" value="72" placeholder="heart rate">
                                                </div>
                                                <div class="form-group">
                                                    <select name="gender">
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-info">Calculate</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--php code-->
                                        <div class="col-xs col-md-5">
                                            <div class="form-input">
                                                <?php

                                                    if(isset($_POST['age'])||isset($_POST['weight'])||isset($_POST['time'])||isset($_POST['heart'])||isset($_POST['gender']))
                                                    {
                                                        $age = $_POST['age'];
                                                        $weight = $_POST['weight'];
                                                        $time = $_POST['time'];
                                                        $heart = $_POST['heart'];
                                                        $gender =$_POST['gender'];
                                                        $cal =0;

                                                        if (strcmp($gender, "male") == 0)
                                                        {

                                                            $cal = (0.2017 * $age - 0.09036 * $weight + 0.6309 * $heart - 55.0969) * $time / 4.184;
                                                        }
                                                        else{
                                                            $cal = (0.074 * $age - 0.05741 * $weight + 0.4472 * $heart - 20.4022) * $time / 4.184;
                                                        }
                                                        $cal = (int)$cal;
                                                        $water = ($weight / 2) + ($time * 12 / 30);
                                                        echo "<h1>Calories :"."$cal</h1>";
                                                        echo "<h1>Water :"."$water fl. oz</h1>";
                                                    }
                                                    else{
                                                        echo "<h1>Calories :"."--</h1>";
                                                        echo "<h1>Water :"."-- fl. oz</h1>";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
                
            </div>
        </div>
    <!--big javascript file be careful-->
    <script type="text/javascript">
    $(function () {
            var isMetric = false;
			/*if ($("#metric").attr("checked", "checked")){
				isMetric = true;
			}else{
				isMetric = false;
			}*/
			//$("#Metric").click(function(){
				//isMetric = true;
			//});
            var locationUrl = "";
            var currentConditionsUrl = "";
            // Visit http://apidev.accuweather.com/developers/languages for a list of supported languages
            var language = "en";
            // Contact AccuWeather to get an official key. They key in this
            // example is temporary and should NOT be used it in production.
            var apiKey = "PSUHackathon112016";   
            var awxClearMessages = function() {
                $("#awxLocationInfo").html("...");
                $("#awxLocationUrl").html("...");
                $("#awxWeatherInfo").html("...");
                $("#awxWeatherUrl").html("...");
            }
            var temp2=function(d,humidity){
                    var cold = "Its chilly today.  Wear a jacket.";
                    var warmh = "It's the perfect weather for an outdoor cardio exercise.  It is safest to perform these exercises when the humidity is below 75%.";
                    var warm = "Stay hidrated, don't perform strenuous activities outdoors."
                    var hot = "Be sure to drink plenty of water today.";
                    var a = d;
                        //alert(d);
                    //document.getElementById("tip").innerHTML =a;
                            if (a <= 60){
                                document.getElementById("tip").innerHTML = cold;
                                console.log(typeof(a));

                            }
                            else if ((a > 60) && (a < 75)){
                                if (humidity < 75){
                                    document.getElementById("tip").innerHTML = warmh;
                                }
                                else{
                                    document.getElementById("tip").innerHTML = warm;
                                }
                                
                            }
                            else{
                                document.getElementById("tip").innerHTML = hot;
                            }
            };
            // Searches for a city with the name specified in freeText.
            // freeText can be something like:
            //          new york
            //          new york, ny
            //          paris
            //          paris, france
            var awxCityLookUp = function (freeText) {
                awxClearMessages();
                locationUrl = "http://apidev.accuweather.com/locations/v1/search?q=" + freeText + "&apikey=" + apiKey;
                $.ajax({
                    type: "GET",
                    url: locationUrl,
                    dataType: "jsonp",
                    cache: true,                    // Use cache for better reponse times
                    jsonpCallback: "awxCallback",   // Prevent unique callback name for better reponse times
                    success: function (data) { awxCityLookUpFound(data); }
                });
            };
            
            // Displays what location(s) were found.
            var awxCityLookUpFound = function (data) {
                var msg, locationKey = null;
                $("#awxLocationUrl").html("<a href=" + encodeURI(locationUrl) + ">" + locationUrl + "</a>");
                if (data.length == 1) {
                    locationKey = data[0].Key;
                    msg = "One location found: <b>" + data[0].LocalizedName + "</b>. Key: " + locationKey;
                }
                else if(data.length == 0) {
                    msg = "No locations found."
                }
                else {
                    locationKey = data[0].Key;
                    msg = "Multiple locations found (" + data.length + "). Selecting the first one: " + 
                        "<b>" + data[0].LocalizedName + ", " + data[0].Country.ID + "</b>. Key: " + locationKey;
                }
                $("#awxLocationInfo").html(msg);
                if(locationKey != null) {
                    awxGetCurrentConditions(locationKey);
                }
                    
            };
            // Gets current conditions for the location.
            // For more info about Current Conditions API go to http://apidev.accuweather.com/developers/locations
            var awxGetCurrentConditions = function (locationKey) {
                currentConditionsUrl = "http://apidev.accuweather.com/currentconditions/v1/" + 
                    locationKey + ".json?language=" + language + "&apikey=" + apiKey + "&details=true";
                
                $.ajax({
                    type: "GET",
                    url: currentConditionsUrl,
                    dataType: "jsonp",
                    cache: true,                    // Use cache for better reponse times
                    jsonpCallback: "awxCallback",   // Prevent unique callback name for better reponse times
                    success: function (data) {
                            var html;
                            
                            if(data && data.length > 0) {
                                var conditions = data[0];
								
                                var temp = isMetric ? conditions.Temperature.Metric : conditions.Temperature.Imperial;
                                var c = temp.Value;
                                
								var humidity = conditions.RelativeHumidity;
                                temp2(c,humidity);
                                //temp2=temp.Value;
                                //alert(temp2);
                                html = conditions.WeatherText + ", " + temp.Value + " " + temp.Unit;
                                
								html2 = "Relative humidity: " + humidity + "%";
                            }
                            else {
                                html = "N/A";
								html2 = "N/A";
                            }
                        $("#awxWeatherInfo").html(html);
						$("#humidity").html(html2);
                        $("#awxWeatherUrl").html("<a href=" + currentConditionsUrl + ">" + currentConditionsUrl + "</a>");
                    }
                });
            };
            $("#awxSearchTextBox").keypress(function (e) {
                if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
                    var text = $("#awxSearchTextBox").val();
                    awxCityLookUp(text);
                    return false;
                } else {
                    return true;
                }
            });
            $("#awxSearchButton").click(function () {
                var text = $("#awxSearchTextBox").val();
                awxCityLookUp(text);
            });
			
			if (parseInt(humidity) >= 75){
				$(".img:nth-child(2)").toggle(".red");
				$(".img:nth-child(3)").toggle(".red");
			}
			else if(parseInt(humidity) < 75){
				$(".img").toggle(".blue");
			}
			
    

			
			});
        
        
        
    </script>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>