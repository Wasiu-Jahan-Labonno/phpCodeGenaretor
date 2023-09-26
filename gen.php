<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $arrayName = $_POST['array_name'];
    $fileName = $_POST['file_name'] . ".php"; // User-specified file name with .php extension

    // Predefined PHP code template
    $predefinedCode = '<?php
        // Define an empty array
		$'.$arrayName.' = array();
		';
    	$arrayBuilderCode = '$%s["%s"] = $_POST["%s"];
		';
    /* '?>'; */

	$array_keys = ["whichApp", "name"];

    // Replace the placeholders in the predefined code
	foreach($array_keys as $k=>$v) {
		$predefinedCode .= sprintf($arrayBuilderCode, $arrayName, $v, $v);
	};

	$fullCode = $predefinedCode.'
	?>';

    // Write the combined code to the generated PHP file
    file_put_contents($fileName, $fullCode);

    echo "<p>PHP code has been saved to the file: <a href='$fileName' download>$fileName</a></p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Code Generator</title>
</head>
<body>
    <h1>PHP Code Generator</h1>

    <form method="post">
        <label for="file_name">File Name (without .php extension):</label><br>
        <input type="text" name="file_name" id="file_name" required><br>

        <label for="array_name">Array Key:</label><br>
        <input type="text" name="array_name" id="array_name" required><br>

        <button type="submit">Generate PHP File</button>
    </form>
</body>
</html>
