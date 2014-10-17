<html>

<head>
  <title></title>
</head>

<body>

<?php

			// установить соединение с БД
			/*$name = iconv('UTF-8','Windows-1251', $_POST['us_name']);
			$pass = iconv('UTF-8','Windows-1251', $_POST['us_pass']);
			$pass = $name.$pass;*/
			
			try
			{
				$mMysqli = new mysqli('localhost', 'interseptor', 'Rtyuehe976', 'analiz');

			}
			catch(Exception $e)
			{
				if (mysqli_connect_errno())
				{
				    printf("Connect failed: %s\n", mysqli_connect_error());
				    exit();
				}
			}

            printf("Host information: %s\n", $mMysqli->host_info);

echo '<br>';
			

			
			$mMysqli->close();


$dbname = 'analiz';

    if (!mysql_connect('localhost', 'interseptor', 'Rtyuehe976')) {
        print 'Could not connect to mysql';
        exit;
    }

    $result = mysql_list_tables($dbname);
    
    if (!$result) {
        print "DB Error, could not list tables\n";
        print 'MySQL Error: ' . mysql_error();
        exit;
    }
    
    while ($row = mysql_fetch_row($result)) {
        echo '<p>Table: '.$row[0].'</p>';
    }

    mysql_free_result($result);


?>

</body>

</html>