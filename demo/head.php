<link rel="icon" href="https://boychawin.com/B_images/logoboychawin.com.png" type="image/png" />

<link rel="stylesheet" href="./lib/jquery.fancybox.css" type="text/css" media="screen" />
<!-- fullcalendar -->
<link href='./fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='./fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<!-- bootstrap -->
<!--<link href="./lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">-->
<!-- boychawin.com -->
<!-- <link href="https://boychawin.com/_next/static/css/d14dc5e59bd60eaeb5ad.css" rel='stylesheet'> -->
<!-- jQuery -->
<script src="./lib/jquery/dist/jquery.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src='./lib/moment.min.js'></script>
<script src='./fullcalendar/fullcalendar.min.js'></script>
<script src='./lib/lang/th.js'></script>
<script src="./lib/jquery.fancybox.pack.js"></script>
<!--start data table-->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js" defer></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "aaSorting": [
                [0, 'desc']
            ],
            //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
        });
    });
</script>
<!-- end data table -->