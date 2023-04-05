<?php
require_once 'config.php';

$sql = "SELECT * FROM example";
$result = $conn->query($sql);
$arr_data = [];
if ($result->num_rows > 0) {
   $arr_data = $result->fetch_all(MYSQLI_ASSOC);
}

?>

<html>

<head>
   <title>Datatables</title>
   <script src="https://code.jquery.com/jquery-3.6.4.min.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.2/css/fixedHeader.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.2.2/css/fixedColumns.dataTables.min.css">
   <link rel="stylesheet" href="style.css">
   <style>
      body {
         font-family: calibri;
         color: #4e7480;
      }
   </style>
</head>

<body>
   <div class="container">
      <div>
         Toggle column: <a class="toggle-vis" data-column="0">Results ID</a> - <a class="toggle-vis" data-column="1">Horse Record ID</a> - <a class="toggle-vis" data-column="2">Horse</a> - <a class="toggle-vis" data-column="3">Year</a> - <a class="toggle-vis" data-column="4">Show Name</a> - <a class="toggle-vis" data-column="5">Class</a> - <a class="toggle-vis" data-column="6">Age</a> - <a class="toggle-vis" data-column="7">Rider</a> - <a class="toggle-vis" data-column="8">Owner</a> - <a class="toggle-vis" data-column="9">Score</a> - <a class="toggle-vis" data-column="10">Place</a> - <a class="toggle-vis" data-column="11">Earned</a> - <a class="toggle-vis" data-column="12">ASSN</a> - <a class="toggle-vis" data-column="13">Sire</a> - <a class="toggle-vis" data-column="14">Dam</a> - <a class="toggle-vis" data-column="15">Breeder</a> - <a class="toggle-vis" data-column="16">YF</a> - <a class="toggle-vis" data-column="17">Color</a> - <a class="toggle-vis" data-column="18">Sex</a> - <a class="toggle-vis" data-column="19">Breed</a> - <a class="toggle-vis" data-column="20">Horse ID</a>
      </div>
      <table id="contact-detail" class="display" cellspacing="0" width="100%">
         <thead>
            <tr>
               <th>Results ID</th>
               <th>Horse Record ID</th>
               <th>Horse</th>
               <th>Year</th>
               <th>Show Name</th>
               <th>Class</th>
               <th>Age</th>
               <th>Rider</th>
               <th>Owner</th>
               <th>Score</th>
               <th>Place</th>
               <th>Earned</th>
               <th>ASSN</th>
               <th>Sire</th>
               <th>Dam</th>
               <th>Breeder</th>
               <th>YF</th>
               <th>Color</th>
               <th>Sex</th>
               <th>Breed</th>
               <th>Horse ID</th>
            </tr>
         </thead>
         <tbody>
            <?php if (!empty($arr_data)) { ?>
               <?php foreach ($arr_data as $row_data) { ?>
                  <tr>
                     <td data-field="resultsid"><?= $row_data['resultsid'] ?></td>
                     <td data-field="horserecordid"><?= $row_data['horserecordid'] ?></td>
                     <td data-field="horse"><?= $row_data['horse'] ?></td>
                     <td data-field="yr"><?= $row_data['yr'] ?></td>
                     <td data-field="showname"><?= $row_data['showname'] ?></td>
                     <td data-field="class"><?= $row_data['class'] ?></td>
                     <td data-field="age"><?= $row_data['age'] ?></td>
                     <td data-field="rider"><?= $row_data['rider'] ?></td>
                     <td data-field="owner"><?= $row_data['owner'] ?></td>
                     <td data-field="score"><?= $row_data['score'] ?></td>
                     <td data-field="place"><?= $row_data['place'] ?></td>
                     <td data-field="earned"><?= $row_data['earned'] ?></td>
                     <td data-field="assn"><?= $row_data['assn'] ?></td>
                     <td data-field="sire"><?= $row_data['sire'] ?></td>
                     <td data-field="dam"><?= $row_data['dam'] ?></td>
                     <td data-field="breeder"><?= $row_data['breeder'] ?></td>
                     <td data-field="yf"><?= $row_data['yf'] ?></td>
                     <td data-field="color"><?= $row_data['color'] ?></td>
                     <td data-field="sex"><?= $row_data['sex'] ?></td>
                     <td data-field="breed"><?= $row_data['breed'] ?></td>
                     <td data-field="horseid"><?= $row_data['horseid'] ?></td>
                  </tr>
               <?php } ?>

            <?php } ?>
         </tbody>
      </table>
   </div>
</body>
<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js" type="text/javascript"></script>

<script>
   $(document).ready(function() {
      let table = $('#contact-detail').DataTable({
         'dom': 'Rlfrtip',
         fixedHeader: true,
         fixedColumns: true,
         "autoWidth": false,
      });

      $('table th').resizable({
         handles: 'e',
         stop: function(e, ui) {
            $(this).width(ui.size.width);
         }
      });

      $('a.toggle-vis').on('click', function(e) {
         e.preventDefault();

         // Get the column API object
         var column = table.column($(this).attr('data-column'));

         // Toggle the visibility
         column.visible(!column.visible());
      });
   });
</script>
<script src="script.js?ver=<?= time() ?>" type="text/javascript"></script>

</html>