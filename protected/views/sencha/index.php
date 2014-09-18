<?php
if(isset($_GET['Province']))			
echo NJSON::encode($data);
else if(isset($_GET['District']))
echo NJSON::encode($data);
else
echo NJSON::encode($data);
?>