<style>
body {background-color: powderblue;}
h1   {color: blue;}
p    {color: red;}
textarea {
    display: block;
    margin-left: 150;
    margin-right: 150;
}
</style>
<?php
$json="" ;
$reversed_text="" ;

if(isset($_POST['submit'])) {
  $text = $_POST['text'];
  $json = file_get_contents($_POST['text']);
  $obj = json_decode($json);
#Fixing output alignment
#  foreach($obj as $key=>$value){
 #   echo $key . " => " . $value . "<br>";
#	echo strrev($key);
#	}
	#Reverse text
  $reversed_text = strrev($json);
}
?>

<form method="post" action="">
<label for="URLorg" class="form-label">URL:</label>

<textarea name="text" rows="4" cols="50"></textarea>
  <br>
  <button type="submit" name="submit" style="background-color:Chartreuse;">Query</button>
  <br>
  <label for="URLrespo" class="form-label">URL RESPONSE:</label>
  <textarea name="response_text" rows="4" cols="50"><?php echo $json; ?></textarea>
  <br>
  <br>
  <label for="InvertUrl" class="form-label">INVERTED URL RESPONSE:</label>
  <textarea name="reversed_text" rows="4" cols="50"><?php echo $reversed_text; ?></textarea>

</form>