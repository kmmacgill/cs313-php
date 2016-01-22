<?php

echo $_POST{"name"} . "<br />";
echo $_POST{"email"} . "<br />";
echo $_POST{"major"} . "<br />";

foreach($_POST['places'] as $item) {
	if ($item == 'NA') {
		echo "North America (IS AWESOME)" . "<br />";
		}
	if ($item == 'SA') {
		echo "South America (IS kind of AWESOME)" . "<br />";
		}
	if ($item == 'EU') {
		echo "Europe (ISn't that AWESOME)" . "<br />";
		}
	if ($item == 'AS') {
		echo "Asia (HAS AWESOME GAME SHOWS)" . "<br />";
		}
	if ($item == 'AU') {
		echo "Australia (AWESOME DEALDLY CREATURES)" . "<br />";
		}
	if ($item == 'AF') {
		echo "Africa (HAS AWESOME WILDLIFE)" . "<br />";
		}
	if ($item == 'AN') {
		echo "Antartica (IS AWESOME AT BEING COLD)" . "<br />";
		}
}

echo $_POST{"comments"} . "<br />";

?>