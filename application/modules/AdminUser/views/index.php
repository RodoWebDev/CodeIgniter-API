<!-- page content -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper entitePage">
    <!-- Main content -->
    <section class="content">
      <?php if($this->session->flashdata("message")){?>
        <div class="alert alert-info alert-dismissible"  role="alert">      
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?php echo $this->session->flashdata("message")?>
        </div>
      <?php } ?>
      <!-- Default box -->
      <div class="box box-success" >
        <div class="box-header with-border">
          <h3 class="box-title">User List</h3>
          <div class="box-tools">
            <!-- <button type="button" class="btn-sm  btn btn-success modalButtonUser" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Add User</button> -->
          </div>
        </div>

        <div class="box-body" style="background: rgb(249, 250, 252);">
          <div class="row">
            <div class="col-lg-12" style="overflow:auto">
              <table id="example1" class="cell-border example1 table table-striped table1 delSelTable">
                <thead>
                  <tr>
                    <th><input type="checkbox" class="selAll"></th>
                    <th>MAILPSEUDO</th>
                    <th>DATE_DEB</th>
                    <th>DATE_FIN</th>
                    <th>USERADMIN</th>
                    <th class="center">ADMIN</th>
                    <th>BENEF</th>
                    <th>GESTION</th>
                    <th>ENTITE_OFF</th>
                    <th>ADR1</th>
                    <th>ADR2</th>
                    <th>ADR3</th>
                    <th>ADR4</th>
                    <th>ADR5</th>
                    <th>ADR6</th>
                    <th>AD_WEB</th>
                    <th>AD_LOGO</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
          <!-- /.box-body -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
<!-- Modal Crud Start-->
<div class="modal fade" id="nameModal_user" role="dialog">
  <div class="modal-dialog">
    <div class="box box-primary popup" >
      <div class="box-header with-border formsize">
        <h3 class="box-title">User Form</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <!-- /.box-header -->
      <div class="modal-body" style="padding: 0px 0px 0px 0px;"></div>
    </div>
  </div>
</div>
<!--End Modal Crud -->

<script>   
 $(document).ready(function() {  
    var url = '<?php echo base_url();?>';//$('.content-header').attr('rel');
    var table = $('#example1').DataTable({ 
          dom: 'lfBrtip',
          buttons: [
              'copy', 'excel', 'pdf', 'print'
          ],
          responsive: true,
          "processing": true,
          "serverSide": true,
          // "ajax": url+"AdminUser/dataTable",
          "ajax": url+"AdminUser/dataTable",
          "sPaginationType": "full_numbers",
          "language": {
            "search": "_INPUT_", 
            "searchPlaceholder": "Search",
            "paginate": {
                "next": '<i class="fa fa-angle-right"></i>',
                "previous": '<i class="fa fa-angle-left"></i>',
                "first": '<i class="fa fa-angle-double-left"></i>',
                "last": '<i class="fa fa-angle-double-right"></i>'
            }
          }, 
          
          "iDisplayLength": 10,
          "aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
      });
    
    setTimeout(function() {
      var add_width = $('.dataTables_filter').width()+$('.box-body .dt-buttons').width()+10;
      $('.table-date-range').css('right',add_width+'px');
        $('.dataTables_info').before('<button data-base-url="<?php echo base_url().'AdminUser/delete/'; ?>" rel="delSelTable" class="btn btn-default btn-sm delSelected pull-left btn-blk-del"> <i class="fa fa-trash"></i> </button><br><br>');  
    }, 300);

    $("button.closeTest, button.close").on("click", function (){});
  });
</script>
<!-- /page content -->