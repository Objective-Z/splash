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
								var humidity = conditions.RelativeHumidity;
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
			else{
				$(".img").toggle(".blue");
			}
			
			if (parseInt(temp.Value) <= 60){
				$(".temp").toggle(".blue");
			}
			else if ((parseInt(temp.Value) > 60) && (parseInt(temp.Value) <= 70)){
				$(".temp").toggle(".green");
			}
			else{
				$(".temp").toggle(".red");
			}
			
			});