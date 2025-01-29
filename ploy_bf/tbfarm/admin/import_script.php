<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="js/jquery.wallform.js"></script>
<script src="../datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script>
  $(function () {

    $('#table1').DataTable({
	"lengthMenu" : [[20,50,100, -1], [20,50,100,'All']],
	'ordering'    : false,
	'scrollX': true,
	"language": {
		"sProcessing": "กำลังดำเนินการ...",
		"sLengthMenu": "แสดง _MENU_ แถว",
		"sZeroRecords": "ไม่พบข้อมูล",
		"sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
		"sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
		"sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
		"sInfoPostFix": "",
		"sSearch": "ค้นหา ",
		"sUrl": "",
		"oPaginate": {
				"sFirst": "เิริ่มต้น",
				"sPrevious": "ก่อนหน้า",
				"sNext": "ถัดไป",
				"sLast": "สุดท้าย"
		}
	}
			 		
	})
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
	  'scrollX': true
    })
  })
</script>
<script src="bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

<script>
    $(function(){
        $("#demo").click(function(){ 
                $("div#show").show();
        }); 
        $("#demo2").click(function(){ 
                $("div#show_demo").hide();
        });         
    });
</script>









