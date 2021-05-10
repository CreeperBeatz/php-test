<html>
    <title>
    shia
    </title>

    <body>
    
        <form action="esp_data_handler_test.php" method = "post">
            Air Humidity: <input type = "number" step= "0.01" name="AirHumidity"><br>
            Air Temperature: <input type = "number" step= "0.01" name="AirTemperature"><br>
            Soil Moisture: <input type = "number" name="SoilMoisture"><br>
            Light intensity: <input type = "number" step= "0.01" name="Light"><br> 
            <input type = "submit">
        </form>
        <br>
        <?php

            $host = "localhost";
            $user = "php_esp";
            $password = "test123";
            $database = "esp_data_test";
            $table = "sensor_data";

            $api_key = "r23jo2";

            $mysqli = new mysqli($host, $user, $password, $database);

            if ($mysqli -> connect_errno) {
                    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                    exit();
            } else {

                //TODO improve against injection
                $air_hum = $_POST["AirHumidity"];
                $air_temp = $_POST["AirTemperature"];
                $soil_moist = $_POST["SoilMoisture"];
                $light = $_POST["Light"];

                if ($air_hum != null && $air_temp != null && $soil_moist != null && $light!=null) {
                   echo "Data grab succesful!<br>";


                    if($mysqli->query
                        ("INSERT INTO esp_data_test.sensor_data
                        (
                        air_humidity,
                        air_temperature,
                        soil_moisture,
                        light,
                        timestamp)
                        VALUES
                        (
                        $air_hum,
                        $air_temp,
                        $soil_moist,
                        $light,
                        curtime());") == TRUE) {
                            echo "New record created succesfully!";
                    } else {
                        echo  "Error: " . $mysqli -> error;
                    }

                }

                $mysqli->close();
            }
        ?>
    </body>
</html>