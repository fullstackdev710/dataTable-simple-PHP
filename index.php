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
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/jeffreydwalter/ColReorderWithResize@9ce30c640e394282c9e0df5787d54e5887bc8ecc/ColReorderWithResize.js"></script>

<script>
   $(document).ready(function() {
      let table = $('#contact-detail').DataTable({
         'dom': 'Rlfrtip',
         'colReorder': {
            'allowReorder': false
         },
         fixedHeader: true,
         fixedColumns: true,
         columnDefs: [{
               target: 2,
               visible: false,
            },
            {
               target: 3,
               visible: false,
            },
         ],
      });
   });
</script>
<script src="script.js?ver=<?= time() ?>" type="text/javascript"></script>

</html>