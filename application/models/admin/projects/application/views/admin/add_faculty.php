<!-- START BREADCRUMB -->
<ul class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">faculty</a></li>
  <li class="active">Add faculty</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
  <div class="row">
    <div class="col-md-12">
      <?php 
      $attributes = array('class' => 'form-horizontal', 'id' => 'validation');
      echo form_open_multipart('admin/register/update_faculty', $attributes); 
      ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Add faculty</h2>            
          </div>
          <?php if($this->session->flashdata('success') != "") : ?>                
            <div class="alert alert-success" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <?=$this->session->flashdata('success');?>
            </div>
          <?php endif; ?>
          <div class="panel-body">

             <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Exams</label>
              <div class="col-md-6 col-xs-12">
                <select class="form-control" name="exam_id" id="exam_id" required>
                  <option value="">Select exams</option>
                  <?php
                  if(!empty($exams))
                  {
                    foreach($exams as $exam)
                    {
                      ?>
                      <option value="<?=$exam->id;?>"><?=$exam->name;?></option>
                      <?php
                    }
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="name" class="col-md-3 col-xs-12 control-label">Enter Name</label>
              <div class="col-md-6 col-xs-12">                
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                <input type="text" class="form-control" name="name" id="name" />
              </div>
            </div>

             <div class="form-group">
              <label for="title" class="col-md-3 col-xs-12 control-label">Enter Title</label>
              <div class="col-md-6 col-xs-12">                
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                <input type="text" class="form-control" name="title" id="title" />
              </div>
            </div>

              <div class="form-group">
              <label for="specialisation" class="col-md-3 col-xs-12 control-label">Enter Specialisation</label>
              <div class="col-md-6 col-xs-12">                
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                <input type="text" class="form-control" name="specialisation" id="specialisation" />
              </div>
            </div>


             <div class="form-group">
              <label for="image" class="col-md-3 col-xs-12 control-label">Enter Profile Image Path</label>
              <div class="col-md-6 col-xs-12">
                <div class="">
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control" name="profile_img" id="profile_img" />
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="title" class="col-md-3 col-xs-12 control-label">Enter Order</label>
              <div class="col-md-6 col-xs-12">                
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                <input type="text" class="form-control" name="order" id="order" />
              </div>
            </div>

          </div>
          <div class="panel-footer">
            <a href="<?=base_url();?>admin/register/faculty" class="btn btn-primary pull-right" style="margin-left:10px;">Cancel</a>    
            <button type="submit" class="btn btn-primary pull-right" id="btnSubmit">Submit</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- END PAGE CONTENT WRAPPER -->
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-validate-additional-methods.js"></script>
<script>
  $(document).ready(function() { //alert();
      $("#validation").validate({
         rules: {
            // simple rule, converted to {required:true}  
            name:
            {
              required : true,
            },          
             title: {
                 required : true,
             },
             specialisation:
             {
               required : true,
             },
             image:
             {
                required : true,
             }
          },
          submitHandler: function(form) {
              $("#btnSubmit").prop('disabled', true);
              form.submit();
          }
        });
  });
 
</script>
