<?php
if (isset($_POST['submit']))
{
				
$service_url = 'http://localhost:8081/student/load';
$curl = curl_init($service_url);
$curl_post_dat = array(
 'id'=> (int) $_POST['id1'] ,
 'name'=>$_POST['name1'],
 'niveau'=> $_POST['level1'],
 'classe'=> $_POST['class1'],
 'moy'=>$_POST['moy1']);
 $data_string = json_encode( $curl_post_dat );

curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);     
$result = curl_exec($curl);
ECHO "successfully added";	
}
?>






<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <!-- DataTables -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">

  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">



  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		
		<style>
*{margin:0px; padding:0px; font-family:Helvetica, Arial, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 26px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:16px;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 26px;
    border: none;
    cursor: pointer;
    width: 30%;
	font-size:20px;
}
button:hover {
    opacity: 0.8;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}
.avatar {
    width: 200px;
	height:200px;
    border-radius: 50%;
}

/* The Modal (background) */
.modal {
	display:none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

/* Modal Content Box */
.modal-content {
    background-color: #fefefe;
    margin: 4% auto 15% auto;
    border: 1px solid #888;
    width: 40%; 
	padding-bottom: 30px;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    animation: zoom 0.6s
}
@keyframes zoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Enicarthage Students</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Niveau</th>
                  <th>Class</th>
                  <th>Moy</th>
                </tr>
                </thead>
                <tbody>
<?php
$livre = json_decode(file_get_contents('http://localhost:8081/student/all'));
$level1 = json_decode(file_get_contents('http://localhost:8081/student/niveau/1'));
$level2 = json_decode(file_get_contents('http://localhost:8081/student/niveau/2'));
$level3 = json_decode(file_get_contents('http://localhost:8081/student/niveau/3'));

$k1=count($level1);
$k2=count($level2);
$k3=count($level3);
$k=count($livre);
for ($i=0 ;$i<count($livre) ;$i++)
{
	echo "<tr><td>" .$livre[$i]->id.	"</td>";
		echo"<td>" . $livre[$i]->name.	"</td>";
	echo "<td>" .$livre[$i]->niveau.	"</td>";

			echo "<td>" .$livre[$i]->classe.	"</td>";
			echo "<td>" .$livre[$i]->moy.	"</td></td>";

}
?>               

			
             
                </tbody>
                <tfoot>
                <tr>
                   <th>ID</th>
                  <th>Name</th>
                  <th>Niveau</th>
                  <th>Class</th>
                  <th>Moy</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          </div>
		  <div class="col-md-6">
           <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Degree level</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
   <div id="modal-wrapper" class="modal">
  
  <form class="modal-content animate" method="post">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <img src="1.png" alt="Avatar" class="avatar">
      <h1 style="text-align:center">Add student</h1>
    </div>

    <div class="container">
         <div class="form-group">
		 <label for="name1">id</label>
                <input class="form-control" id="id1"  name="id1"  type="text" placeholder="Default input" style="">
                </div>
				         <div class="form-group">
                  <label for="name1">Name</label>
                <input class="form-control" id="name1"  name="name1" type="text" placeholder="Default input" style="">
                </div>
        <div class="form-group">
                  <label for="name1">class</label>
                <input class="form-control" id="class1"  name="class1" type="text" placeholder="Default input">
                </div>
				 <div class="form-group">
                  <label for="name1">level</label>
                <input class="form-control" id="level1"  name="level1"  type="text" placeholder="Default input">
                </div>
				 <div class="form-group">
                  <label for="name1">moy</label>
                <input class="form-control" id="moy1" name="moy1"  type="text" placeholder="Default input">
                </div>
  <div class="box-footer" style="    width: 30%;">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>				
    </div>
    
  </form>
  
</div>
         
        <!-- /.col -->
		    <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $k ?></h3>

              <p>Students in ENICARTHAGE</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>

			
			
            <a href="#" onclick="document.getElementById('modal-wrapper').style.display='block'" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>  
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../bower_components/morris.js/morris.min.js"></script>

<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<script src="../../dist/js/demo.js"></script>
<script src="../../bower_components/raphael/raphael.min.js"></script>
<script>
// If user clicks anywhere outside of the modal, Modal will close
    "use strict";
   
   
   
var k1 = <?php echo $k1 ;?> ;
 var k2 = <?php echo $k2 ;?>;
var k3 = <?php echo $k3 ;?>;






 

    //DONUT CHART
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#3c8dbc", "#f56954","#f39c12"],
      data: [
        {label: "level 1 ", value: k1},
        {label: "level 2", value: k2},
		        {label: "level 3", value: k3},

      ],
      hideHover: 'auto'
    });


  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })

  
  
  
  })
</script>
</body>
</html>
