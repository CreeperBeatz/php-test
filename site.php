<html>
    <title> php test </title>

    <body>

        <form action = "site.php" method = "post">
            Student: <input type="text" name = "student">
            <input type = "submit">
        </form>
        <br>
        <?php 
            $test_array = array("Jim"=>"nigger", "Tom"=>"not nigger");
            echo $test_array[$_POST["student"]];
        ?>

    </body>
</html>