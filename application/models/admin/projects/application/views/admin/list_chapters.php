<!-- START BREADCRUMB -->
<ul class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li class="active">chapters</li>
</ul>
<!-- END BREADCRUMB -->
<!-- END PAGE TITLE -->
<?php if($this->session->flashdata('success') != "") : ?>                
  <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <?=$this->session->flashdata('success');?>
  </div>
<?php endif; ?>  
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

  <div class="row">
    <div class="col-md-12">

      <!-- START DATATABLE EXPORT -->
      <div class="panel panel-default">
        <div class="panel-heading">
        <div class="col-md-6 col-xs-6">
          <h2><span class="fa fa-list"></span> Chapters</h2>
        </div>
        <div class="col-md-6 col-xs-6">
          <h3 class="panel-title" style="float: right;"><a href="<?=base_url();?>admin/register/add_chapters" class="btn btn-success">Add</a></h3>
        </div>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
          <div id="wait" style="display:none;width:69px;height:89px;position:absolute;top:50%;left:50%;padding:2px; z-index:99999999"><img src='<?=base_url();?>assets/img/demo_wait.gif' width="64" height="64" /></div>
            <input type="hidden" id="atpagination" value="">
            <input type="hidden" id="paginationlength" value="">
            <table id="users" class="table datatable table-striped">

            <!-------- Search Form ---------->
            <form id="fees_form" name="search_fees" method="post" class="pull-right">
              <div class="col-md-3 col-md-offset-3" style="padding:0">
                  <input type="text" name="search_text_1" id="search_text_1" placeholder="Type keyword to search" class="input-sm form-control custom-input" style="margin-left:5px;">
              </div>

                <div class="col-md-2">
                  <select name="search_on_1" id="search_on_1" class="form-control input-sm custom-input">
                      <option value="1">CourseName</option>
                     <option value="2">SubjectName</option>
                      <option value="3">ChapterName</option>
                      <option value="4">Video ID</option>
                  </select>
                  <i class="fa fa-angle-down arrow-icon" id="arrow-icon"></i>
              </div>
              <div class="col-md-2">
                  <select name="search_at_1" id="search_at_1" class="input-sm form-control custom-input">
                      <option value="">Contains</option>
                      <option value="after">Starts with</option>
                      <option value="before">Ends with</option>
                  </select>
                  <i class="fa fa-angle-down arrow-icon" id="arrow-icon"></i>
              </div>

               <div class="col-md-2">
              <button type="button" id="search_user" class="btn btn-info margin_search" style=""><i class="fa fa-search icon-style"></i></button>
              <a class="btn btn-danger" style="display:none;" id="searchreset" href="<?php echo base_url('admin/register/chapters'); ?>"><li class="fa fa-minus icon-style"></li></a>
              <!-- <button type="button" id="download_user" data-id="exceldata" class="btn btn-info margin_search download" onclick="tableToExcel('users', 'W3C Example Table')"><i class="fa fa-download"></i></button> -->
              </div>
            </form> 
            <!-------- /Search Form ---------->

            </table>                                            
          </div>
        </div>
      </div>
      <!-- END DATATABLE EXPORT -->      
    </div>
  </div>
</div>         
<!-- END PAGE CONTENT WRAPPER -->
<script src="<?php echo base_url();?>assets/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/datatables/dataTables_custom.js" type="text/javascript"></script>
<!--Load JQuery-->
<script src="<?php echo base_url();?>assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/datatables/dataTables.bootstrap.min.js"></script>
<script>
    var dtabel;
    var search_text_1;
    var search_on_1;
    var search_at_1;
    var ispage;
    var url = '<?php echo base_url();?>';
    $(document).ready(function () {
        dtabel = $('#users').DataTable({
            "processing": true,
            "serverSide": true,
            //"bStateSave": true,
            "language": {
            "emptyTable": "No Records Found!",
        },
        dom: '<"html5buttons" B>lTgtp',
        buttons: [],
        "aLengthMenu": [10, 20, 50, 100],
        "destroy": true,
        "ajax": {
            "url": "<?php echo base_url('admin/register/all_chapters'); ?>",
            "type":"POST",
            beforeSend: function() {
              $("#wait").css("display", "block");
            },
            "data":function (d){
                d.search_text_1 = search_text_1;
                d.search_on_1 = search_on_1;
                d.search_at_1 = search_at_1;
            },
            "dataSrc": function ( jsondata ) {
                $("#wait").css("display", "none");
                return jsondata['data'];
            }
        },
        "columns": [
            { "title": "S.No", "name":"sno", "orderable": false, "data":"sno", "width":"0%" },
            { "title": "Actions", "name":"action", "orderable": false, "deafultContent":"", "data": "subject_id", "width":"0%", "class":"td_actionn"},
             { "title": "View Details", "name":"id", "orderable": false, "deafultContent":"", "data": "id", "width":"0%"},
             { "title": "On/Off", "name":"id","orderable": false, "data":"id", "width":"0%" },
             { "title": "ORDER", "name":"order","orderable": false, "data":"order", "width":"0%" },
             { "title": "Course Name", "name":"ename","orderable": false, "data":"ename", "width":"0%" },
        { "title": "subject Name", "name":"subject_name","orderable": false, "data":"subject_name", "width":"0%" },
             { "title": "Chapter Name", "name":"videochapter_name","orderable": false, "data":"videochapter_name", "width":"0%" },   
             { "title": "Video Name", "name":"video_name","orderable": false, "data":"video_name", "width":"0%" },          
              { "title": "Video ID", "name":"video_path","orderable": false,"deafultContent":"", "data":"video_path", "width":"0%" },

               { "title": "Total time", "name":"total_time","orderable": false, "data":"total_time", "width":"0%" },

                // { "title": "Chapter Topic Name", "name":"topic_name","orderable": false, "data":"topic_name", "width":"0%" },
                
                //  { "title": "Topic  time", "name":"start_time","orderable": false, "data":"start_time", "width":"0%" },

                //   { "title": "chapter slide images", "name":"slideimage","orderable": false,"deafultContent":"", "data":"slideimage", "width":"0%" },
                   { "title": "Video author Name", "name":"chapter_actorname","orderable": false, "data":"chapter_actorname","deafultContent":"", "width":"0%" },
              { "title": "video author Image", "name":"image","orderable": false,"deafultContent":"", "data":"image", "width":"0%" }, 
                
                  { "title": "Chapter Notes", "name":"notespdf","orderable": false,"deafultContent":"", "data":"notespdf", "width":"0%" },
                  { "title": "Free/paid ", "name":"free_or_paid","orderable": false, "data":"free_or_paid", "width":"0%" },
                
                   { "title": "Suggested Videos", "name":"suggested_videos","orderable": false, "data":"suggested_videos","deafultContent":"", "width":"0%" },
           

            { "title": "Created Date", "name":"created_on","orderable": false, "data":"created_on", "width":"0%" },     
             { "title": "Modified  Date", "name":"modified_on","orderable": false, "data":"modified_on", "width":"0%" },
        ],
        "fnCreatedRow": function(nRow, aData, iDataIndex) 
        {

           var status ='<a title="Click to View Chapter Details" href="'+url+'admin/register/chapter_details/'+aData['id']+'" class="btn btn-success btn-condensed">View</a>'; 
        $(nRow).find('td:eq(2)').html(status);
          if(aData['image']){
            var image = '<img src="'+url+aData['image']+'" height="50" width="50">';
          }
         
          $(nRow).find('td:eq(9)').html(image);

          if(aData['notespdf']){
            var notes = '<a href="'+url+aData['notespdf']+'" target="_blank" height="50" width="50">See notes</a>';
            // console.log(image);
          }
         
          $(nRow).find('td:eq(10)').html(notes);
            
          var action ='<a class="btn btn-warning btn-condensed" title="edit" href="'+url+'admin/register/edit_chapters/'+aData['id']+'"><i class="fa fa-edit"></i></a> <a onclick="return confirm('+"'Are you sure want to delete?'"+');" class="btn btn-danger btn-condensed" title="delete" href="'+url+'admin/register/delete_chapters/'+aData['id']+'"><i class="fa fa-trash"></i></a>';
          $(nRow).find('td:eq(1)').html(action);

           if(aData['status'] == "Active")
          {
            var status ='<a title="Click to Inactive" href="'+url+'admin/register/change_chapter_status/'+aData['id']+'/Inactive" class="btn btn-success btn-condensed">ON</a>';
          }
          else
          {
            var status ='<a title="Click to Active" href="'+url+'admin/register/change_chapter_status/'+aData['id']+'/Active" class="btn btn-danger btn-condensed">OFF</a>';
          }
          $(nRow).find('td:eq(3)').html(status);
        },
        "fnDrawCallback": function( oSettings ) {            
            var info = this.fnPagingInfo().iPage;
            $("#atpagination").val(info+1);
            $("td:empty").html("&nbsp;");
        },
    });
    $("#search_user").click(function(){
        if($("#search_text_1").val()!=""){
            $("#search_text_1").css('background', '#ffffff');
            setallvalues();
            dtabel.draw();
        }else{
         $("#search_text_1").css('background', '#ffb3b3');
         $("#search_text_1").focus();
                     return false;
        }
    });
});

function setallvalues(){
    search_text_1 = $("#search_text_1").val();
    search_on_1 = $("#search_on_1").val();
    search_at_1 = $("#search_at_1").val();
    var table = $('#users').DataTable();
    var info = table.page.info();
    $("#atpagination").val((info.page+1));
    if(search_text_1!=""){
        $("#searchreset").show();            
    }
    searchAstr = '';
}

function getpagenumber()
{
    return $("#atpagination").val() / $("#paginationlength").val();
}
</script>
