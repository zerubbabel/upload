<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
set_time_limit(0);

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<title>Excel Data Conversion</title>

</head>
<body>

<h1>Excel to mySQL Automation</h1>

<?php
/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');

/** PHPExcel_IOFactory */
include 'PHPExcel/IOFactory.php';
$file=$_SESSION['file'];

//$inputFileType = 'Excel5';
	$inputFileType = 'Excel2007';
//	$inputFileType = 'Excel2003XML';
//	$inputFileType = 'OOCalc';
	//$inputFileType = 'Gnumeric';
$inputFileName = "upload/$file";

echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with a defined reader type of ',$inputFileType,'<br />';
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
echo 'Turning Formatting off for Load<br />';
$objReader->setReadDataOnly(true);
$objPHPExcel = $objReader->load($inputFileName);


echo '<hr />';

$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

$numColumns=count($sheetData);

if ($_GET["submit"]==1)
{
	$newdata=new array();
	for ($i=0;$i<$numColumns;$i++)
	{
		if (isset($_POST['select$i'])
		{
			$asize=count($newdata);
			//$newdata[$asize]=
		}
	}
}


//var_dump($sheetData);
//echo "<br>";
echo "<button class='btn btn-primary' id='selectall'>Select All</button>";
echo "&nbsp;&nbsp;";
echo "<button class='btn btn-danger' id='deselectall'>Deselect All</button>";

echo "<form method='post' action='readExcel.php?submit=1'>";

echo "<table class='table'>";
	echo "<center><tr>";
		echo "<th>";
			echo "Select To Add";
		echo "</th>";
		
		echo "<th>";
			echo "Name";
		echo "</th>";
		echo "<th>";
			echo "Institution";
		echo "</th>";
		echo "<th>";
			echo "Department";
		echo "</th>";
		echo "<th>";
			echo "Province";
		echo "</th>";
		echo "<th>";
			echo "Country";
		echo "</th>";
		echo "<th>";
			echo "Date";
		echo "</th>";
		echo "<th>";
			echo "Installments";
		echo "</th>";
		echo "<th>";
			echo "Total";
		echo "</th>";
		echo "<th>";
			echo "Program";
		echo "</th>";
		echo "<th>";
			echo "Title";
		echo "</th>";
		
	echo "</tr></center>";
for ($i=1;$i<=$numColumns;$i++)
{
	echo "<tr>";
		echo "<td>";
			echo "<input type='checkbox' id='select$i'>";
		echo "</td>";
		echo "<td>";
			$ab=$sheetData[$i]["A"];
			echo "<textarea>$ab</textarea>";
		echo "</td>";
		echo "<td>";
			$ab=$sheetData[$i]["B"];
			echo "<textarea >$ab</textarea>";
		echo "</td>";
		echo "<td>";
			$ab=$sheetData[$i]["C"];
			echo "<textarea >$ab</textarea>";
		echo "</td>";
		echo "<td>";
			$ab=$sheetData[$i]["D"];
			echo "<textarea >$ab</textarea>";
		echo "</td>";
		echo "<td>";
			$ab=$sheetData[$i]["E"];
			echo "<textarea >$ab</textarea>";
		echo "</td>";
		echo "<td>";
			$ab=$sheetData[$i]["F"];
			echo "<textarea >$ab</textarea>";
		echo "</td>";
		echo "<td>";
			$ab=$sheetData[$i]["G"];
			echo "<textarea >$ab</textarea>";
		echo "</td>";
		echo "<td>";
			$ab=$sheetData[$i]["H"];
			echo "<textarea >$ab</textarea>";
		echo "</td>";
		echo "<td>";
			$ab=$sheetData[$i]["I"];
			echo "<textarea >$ab</textarea>";
		echo "</td>";
		echo "<td>";
			$ab=$sheetData[$i]["J"];
			echo "<textarea >$ab</textarea>";
		echo "</td>";
		
	echo "</tr>";
}
echo "</table>";
echo "<input type='submit' class='btn btn-primary'>";
//echo "<a class='btn btn-primary' href='readExcel.php?submit=1'>Submit</a>";
echo "</form>";

?>
<script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script>
		$("#selectall").click(function () 
		{
			var num=<?php echo $numColumns; ?>;
			for (var i=0;i<num;i++)
			{
				$("#select"+i).attr('checked', true);
			}
		});
		$("#deselectall").click(function () 
		{
			var num=<?php echo $numColumns; ?>;
			for (var i=0;i<num;i++)
			{
				$("#select"+i).attr('checked', false);
			}
		});
		
	</script>
<body>
</html>