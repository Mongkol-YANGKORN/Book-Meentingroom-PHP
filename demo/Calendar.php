<?php
//Connect MSSQL
$serverName = 'localhost';
$userName = 'sa';
$userPassword = 'Hunterman1328!';
$dbName = 'meetings_room';

try {
    $conn = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die(print_r($e->getMessage()));
}

//Database
$data = array();

$meSQL = "SELECT * FROM Booked";

if ($meQuery = $conn->query($meSQL)) {

    /* fetch object array */
    while ($rs = $meQuery->fetch(PDO::FETCH_ASSOC)) {
        $data1 = array();
        $data2 = array();
        $data3 = array();
        $data3 = $rs['Event_End'];
        $data2 = $rs['Event_Start'];
        $data1 = $rs['ID_Booked'];
        $data[] = array(
            'title' => $data1,
            'start' => $data2,
            'end' => $data3
        );
    }

    /* free result set */
}


/*
$array = array(
            array('title'=> 'Long Event',
                    'start'=> '2015-02-07',
                    'end'=> '2015-02-10'),
            array('id'=> 999,
                    'title'=> 'Repeating Event',
                    'start'=> '2015-02-16T16:00:00')
         );
         */

?>

<script>
    $(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: '<?php echo date('Y-m-d'); ?>',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: <?php echo json_encode($data); ?>
        });

    });
</script>
<h3>ทดสอบ Fullcalendar</h2>


    <div id='calendar'></div>