
<?php


// Connect to MySQL
$link = mysql_connect( 'localhost', 'root', '' );
if ( !$link ) {
  die( 'Could not connect: ' . mysql_error() );
}

// Select the data base
$db = mysql_select_db( 'mangalam_crm', $link );
if ( !$db ) {
  die ( 'Error selecting database \'mangalam_crm\' : ' . mysql_error() );
}


	$from_date = date("Y-m-d");
	$to_date = date("Y-m-d");

	if(isset($_REQUEST['from']) && $_REQUEST['from'] !=''){
		$from_date = $_REQUEST['from'];
	}

	if(isset($_REQUEST['to']) && $_REQUEST['to'] !=''){
		$to_date = $_REQUEST['to'];
	}
  // Fetch the data
  $query = "SELECT count(count) as value, date(created) as days FROM `visitor_count` 
  where created BETWEEN '".$from_date." 00:00:00' AND '".$to_date." 23:59:59' group by days ORDER BY days ASC";
  $result = mysql_query( $query );

  // All good?
  if ( !$result ) {
    // Nope
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die( $message );
  }

  // Print out rows
  $prefix = '';
  echo "[\n";
  while ( $row = mysql_fetch_assoc( $result ) ) {
    echo $prefix . " {\n";
    echo '  "category": "' . $row['days'] . '",' . "\n";
    echo '  "value1": ' . $row['value'] . "\n";
    //echo '  "value1": ' . $row['value'] . '' . "\n";
    echo " }";
    $prefix = ",\n";
  }
  echo "\n]";




// Close the connection
mysql_close($link);
?>

