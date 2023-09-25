<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $arrayName = $_POST['array_name'];
  
    $fileName = $_POST['file_name'] . ".php"; // User-specified file name with .php extension

    // Predefined PHP code template
    $predefinedCode = '<?php
        // Define an empty array
        $data = array();

       

                get the dataset for apps
    *****/
        
        $data = array();
        
        $data["whichApp"] = $_POST["whichApp"];
		$data["whatName"] = $_POST["whatName"];
		$data["whatDetail"] = $_POST["whatDetail"];
		$data["whichDir"] = $_POST["whichDir"];
		$data["whichTables"] = $_POST["whichTables"];
		$data["whoCan"] = $_POST["whoCan"];
		$data["whichSession"] = " ";
		$data["whichVersion"] = "1.0.1";
		$data["whenUpdated"] = time();
		$data["whoAre"] = $_SESSION["whoIs"];
		$data["whichCat"] = $_POST["whichCat"];
		$data["whatStatus"] = "1";  /***** Note: Draft Initiated *****/
		$data["whenTo"] = time();
		
	/*****
	    prepare the record for apps
	*****/
	/* 
	    $%s = array();
	    
	    $%s["whichApp"] = $app->id();
	    $%s["whatName"] = $data["whatName"];
	    $%s["whichDir"] = $data["whichDir"];
	    $%s["whichTables"] = $data["whichTables"];
	    $%s["whoCan"] = $data["whoCan"];
	    $%s["whichSession"] = $data["whichSession"];
	    $%s["whatDetail"] = $data["whatDetail"];
	    $%s["whichVersion"] = $data["whichVersion"];
	    $%s["whenUpdated"] = $data["whenUpdated"];
	    $%s["whoAre"] = $data["whoAre"];
		$%s["whichCat"] = $data["whichCat"];
	    $%s["whatStatus"] = $data["whatStatus"];
	    $%s["whichExtras"] = " ";
	    $%s["whenTo"] = $data["whenTo"];
	    
	/*****
	    insert the record into apps
	*****/
	    
	    $success = $table->insertInto( "apps", $%s );
	    
	/*****
	    prepare the record for appLog
	*****/
	
	    $%sLog = array();
	    
	    $%sLog["whichAppLog"] = $table->nextKey( "appLog" );
	    $%sLog["whichApp"] = $%s["whichApp"];
	    $%sLog["whoIs"] = $_SESSION["whoIs"];
	    $%sLog["whatStatus"] = $%s["whatStatus"];
	    $%sLog["whenTo"] = time();
		
	/*****
	    insert the record into appLog
	*****/
	
	    $success = $table->insertInto( "appLog", $%sLog );

	/*****
	    initiate an app from zipped file
	*****/

        $success = $app->initiate( $%s );

	
	/*****
    	prepare the responses
	*****/
	
	    $list = array();
	    
	    $list["whichCod"] = "App Created";
	    $list["whichApp"] = $%s["whichApp"];
	    
	/*****
    	reply now
	*****/
	
		$gateway->response( json_encode( $list));
		return;
        

        // Display the array
        print_r($data); */
   
    ?>';

    // Replace the placeholders in the predefined code
    $fullCode = sprintf($predefinedCode, $arrayName);

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


       <!--  <label for="array_value">Array Value:</label><br>
        <input type="text" name="array_value" id="array_value" required><br> -->

        <button type="submit">Generate PHP File</button>
    </form>
</body>
</html>
