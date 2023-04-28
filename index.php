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
  #URL Response formatting
  $data = json_decode($json, true);

 #Getting Reverse text
 $invertedData = array();

foreach ($data as $key => $value) {
    if ($key == 'results') {
        $invertedResults = array();
        foreach ($value as $result) {
            $invertedResult = array();
            foreach ($result as $subKey => $subValue) {
                $invertedResult[strrev($subKey)] = strrev($subValue);
            }
            $invertedResults[] = $invertedResult;
        }
        $invertedData['stluser'] = $invertedResults;
    } else {
        $invertedData[strrev($key)] = $value;
    }
}
unset($invertedData['pageNum'], $invertedData['totalNumPages'], $invertedData['found']);

    $reversed_text = strrev($json);
}
?>

<form method="post" action="">
<label for="URLorg" class="form-label">URL:</label>

<textarea name="text" rows="10" cols="50"></textarea>
  <br>
  <button type="submit" name="submit" style="background-color:Chartreuse;">Query</button>
  <br>
  <label for="URLrespo" class="form-label">URL RESPONSE:</label>		
  <textarea name="response_text" rows="10" cols="50"><?php echo json_encode($data, JSON_PRETTY_PRINT); ?></textarea>
  <br>
  <br>
  <label for="InvertUrl" class="form-label">INVERTED URL RESPONSE:</label>
  <textarea name="reversed_text" rows="10" cols="50"><?php echo json_encode($invertedData, JSON_PRETTY_PRINT); ?></textarea>

</form>