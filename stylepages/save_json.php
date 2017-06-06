<?php
// Saving data from form in text file in JSON format
// From: http://coursesweb.net/php-mysql/

// check if all form data are submited, else output error message
if(isset($_POST['youname']) && isset($_POST['youemail']) && isset($_POST['studies']) && isset($_POST['civilstate'])) {
  // if form fields are empty, outputs message, else, gets their data
  if(empty($_POST['youname']) || empty($_POST['youemail']) || empty($_POST['studies']) || empty($_POST['civilstate'])) {
    echo 'All fields are required';
  }
  else {
    // adds form data into an array
    $formdata = array(
      'youname'=> $_POST['youname'],
      'youemail'=> $_POST['youemail'],
      'studies'=> $_POST['studies'],
      'civilstate'=> $_POST['civilstate']
    );

    // encodes the array into a string in JSON format (JSON_PRETTY_PRINT - uses whitespace in json-string, for human readable)
    $jsondata = json_encode($formdata, JSON_PRETTY_PRINT);

    // saves the json string in "formdata.txt" (in "dirdata" folder)
    // outputs error message if data cannot be saved
    if(file_put_contents('dirdata/formdata.txt', $jsondata)) echo 'Data successfully saved';
    else echo 'Unable to save data in "dirdata/formdata.txt"';
  }
}
else echo 'Form fields not submited';
?>