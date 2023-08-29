<form method="post" action="">
<select method="post" name="areasel" onchange="this.form.submit()"> 
<option value="Choose one">Choose one</option>
<option value="Complete Airframe">Complete Airframe</option>
<option value="Armstrong Siddeley">Armstrong Siddeley</option>
<option value="Something">Something</option>
</select>
</form>
<?php
if(isset($_POST["areasel"]))
{
$type=$_POST["areasel"];
echo "<BR>Do some SQL stuff using :".$type;
}
