<!DOCTYPE html>
<html>
<head>
  <title>PHP Code Generator</title>
</head>
<body>

  <h1>PHP Code Generator</h1>

  <form action="code_generator.php" method="post">
    <input type="text" name="array_name" placeholder="Array name">
    <textarea name="array_value" placeholder="Array value (separated by commas)"></textarea>
    <input type="text" name="file_name" placeholder="File name">
    <input type="submit" value="Generate">
  </form>

</body>
</html>


<?php
$arrayValue = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $arrayName = $_POST['array_name'];
    $arrayValue = $_POST['array_value'];
    $fileName = $_POST['file_name'] . ".php"; // User-specified file name with .php extension

    // Predefined PHP code template
    $predefinedCode = '<?php
    // Define an empty array
    $data = array();


    // Split the array value into an array
    $arrayValue = explode(",", $arrayValue);

    // Add the array elements to the data array
    foreach ($arrayValue as $item) {
      $data["%s"] = $item;
    }

    // Display the array
    print_r($data);

  ?>';

    // Replace the placeholders in the predefined code
    $fullCode = sprintf($predefinedCode, $arrayName, $arrayValue);

    // Write the combined code to the generated PHP file
    file_put_contents($fileName, $fullCode);

    echo "<p>PHP code has been saved to the file: <a href='$fileName' download>$fileName</a></p>";
    
}