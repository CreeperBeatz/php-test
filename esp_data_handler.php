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
        $air_temp = $_POST["AirTemperature"];
        $air_hum = $_POST["AirHumidity"];
        $soil_moist = $_POST["SoilMoisture"];
        $light = $_POST["Light"];

        if ($api_key == $_POST["ApiKey"] && $air_hum != null 
        && $air_temp != null && $soil_moist != null && $light!=null) {

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