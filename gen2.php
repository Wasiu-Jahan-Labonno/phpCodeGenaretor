<!DOCTYPE html>
<html>
<head>
    <title>PHP Code Generator</title>
</head>
<body>
    <h1>PHP Code Generator</h1>

    <form method="post">
        <label for="input">Enter File Name and Data (comma-separated):</label><br>
        <input type="text" id="input" name="input" required><br><br>
               <label for="array_name">Array Key:</label><br>
        <input type="text" name="array_name" id="array_name" required><br>

        <input type="submit" name="generate" value="Generate PHP Code">
    </form>

    <?php
    if (isset($_POST['generate'])) {
        $input = $_POST['input'];
        $arrayName = $_POST['array_name'];
    
     /*    // Split the input into file name and data
        list($filename, $dataString) = explode(',', $input, 2);

        $filename = trim($filename);
        $data = explode(',', $dataString); */
       for ($arrayName=0 ; $arrayName< 5; $arrayName++) {
        
          }

        $filename = $filename . '.php';

        // Define a PHP template with a placeholder for data
        $phpTemplate = '<?php
          $dataArray = [%s];
          $dataArray = [%s];
          $dataArray = [%s];

          print_r($dataArray);
          ?>';

        // Convert the data array to a string for insertion into the template
        $dataString = implode(', ', array_map(function ($item) {
            return "'$item'";
        }, $data));

        // Insert the data string into the template
        $phpCode = sprintf($phpTemplate, $dataString);

        file_put_contents($filename, $phpCode);

        echo "PHP code has been generated and saved as '$filename'";
    }
    ?>

</body>
</html>