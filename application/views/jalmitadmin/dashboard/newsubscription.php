  
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">New Subscription</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Subscription</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row justify-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form method="get"> 
                        <div class="form-group">
                            <label for="mobileno">Mobile No</label>
                            <input type="text" class="form-control" value="<?php echo @$_GET['mobileno'];?>" name="mobileno" pattern="[789][0-9]{9}" id="mobileno" placeholder="Enter Mobile No" required>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary">Process</button>
                        </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if(@$_GET['mobileno']){?>
        <div class="row">
          <div class="col-12 text-right p-3">
             <button class="btn btn-primary add_subscription_form_btn">Add Subscription Form</button>
             <?php if(isset($subscriptions)){?>
              <a href="<?php echo site_url('subscription/printview?mobileno=')?><?php echo $_GET["mobileno"];?>"class="print_btn btn btn-primary"><i class="fa fa-print"></i> Print</a>
             <?php }  ?>
          </div>
        </div>
        <?php }?>
        
        <div class="add_subscription_form" style="display:none;">
          <?php if(!isset($subscriptions)){?>
            <form id="add_new_subscripatiob_form_Data" method="post">
              <div class="card">
                  <div class="card-body">
                    <div class="row"> 

                      <div class="col-lg-6 col-12">
                          <div class="form-group">
                            <label for="name">નામ</label>
                            <input type="text" class="form-control"  name="name" id="name" placeholder="નામ" required>
                          </div>
                      </div>

                      <div class="col-lg-6 col-12">
                          <div class="form-group">
                            <label for="mobile_no">મોબઈલ નંબર </label>
                            <input type="text" class="form-control" pattern="[789][0-9]{9}" value="<?php echo @$_GET['mobileno'];?>" name="mobile_no" id="mobile_no" placeholder="મોબઈલ નંબર" <?php if($_GET['mobileno']){ echo ''; }?> required>
                          </div>
                      </div>

                      <div class="col-lg-12 col-12">
                          <div class="form-group">
                            <label for="address">સરનામું</label>
                            <textarea class="form-control"  name="address" id="address" placeholder="સરનામું" required></textarea>
                          </div>
                      </div>
                      
                      <div class="col-lg-4 col-12">
                          <div class="form-group">
                            <label for="gam">ગામ</label>
                            <select class="form-control" name="gam" id="gam" required>
                              <option value="">ગેમ પસંદ કરો</option>
                              <option value="સેંદરડા" <?php if(@$user->gam == 'સેંદરડા'){ echo 'selected'; }?>>સેંદરડા</option>
                            </select>
                          </div>
                      </div>

                      <div class="col-lg-4 col-12">
                          <div class="form-group">
                            <label for="no_of_child_std">અભ્યાસ કરતા બાળકોની સંખ્યા</label>
                            <input type="number" class="form-control"  name="no_of_child_std" id="no_of_child_std" placeholder="અભ્યાસ કરતા બાળકોની સંખ્યા" required>
                          </div>
                      </div>

                      <div class="col-lg-4 col-12">
                          <div class="form-group">
                            <label for="submit_result">જમા કરાવેલા પરિણામ</label>
                            <input type="number" class="form-control"  name="submit_result" id="submit_result" placeholder="જમા કરાવેલા પરિણામ" required>
                          </div>
                      </div>

                      <div class="col-lg-6 col-12">
                          <div class="form-group">
                            <label for="notebook">આપેલી નોટબુક</label>
                            <input type="number" class="form-control"  name="notebook" id="notebook" placeholder="આપેલી નોટબુક" required>
                          </div>
                      </div>

                      <div class="col-lg-6 col-12">
                          <div class="form-group">
                            <label for="total_member">કુલ સભ્ય</label>
                            <input type="number" class="form-control"  name="total_member" id="total_member" placeholder="કુલ સભ્ય" required>
                          </div>
                      </div>

                      <div class="col-lg-12 col-12">
                        <div class="total_member_of_list"></div>
                      </div>

                      <?php if(isset($type_pay_list)){ 
                        foreach($type_pay_list as $key => $pay_list){

                          $label = '';
                          if($key == 0){
                            $label = 'varshik_lavajam';
                          }
                          if($key == 1){
                            $label = 'danbhet';
                          }
                          if($key == 2){
                            $label = 'notebook';
                          }
                          if($key == 3){
                            $label = 'any';
                          }
                      ?>
                      <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label for="list_<?php echo $key;?>"><?php echo  $pay_list->name; ?></label>
                            <input type="text" class="form-control"  name="pay_list[<?php echo  $label; ?>]" id="list_<?php echo $key;?>" placeholder="Amount">
                          </div>
                        </div>
                      <?php }}?>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="col-lg-6 col-12">
                        <button class="btn btn-success save_sub_btn">SAVE</button>
                      </div>
                  </div>
              </div>
            </form>
          <?php }else{ ?>
            <form id="updated_data" method="post">
              <div class="card">
                  <div class="card-body">
                    <div class="row"> 

                      <?php if(isset($type_pay_list)){ 
                        foreach($type_pay_list as $key => $pay_list){

                          $label = '';
                          if($key == 0){
                            $label = 'varshik_lavajam';
                          }
                          if($key == 1){
                            $label = 'danbhet';
                          }
                          if($key == 2){
                            $label = 'notebook';
                          }
                          if($key == 3){
                            $label = 'any';
                          }
                      ?>
                      <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label for="list_<?php echo $key;?>"><?php echo  $pay_list->name; ?></label>
                            <input type="text" class="form-control"  name="pay_list[<?php echo  $pay_list->name; ?>]" id="list_<?php echo $key;?>" placeholder="Amount">
                          </div>
                        </div>
                      <?php }}?>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="col-lg-6 col-12">
                        <button class="btn btn-success save_sub_btn">SAVE</button>
                      </div>
                  </div>
              </div>
            </form>
            
          <?php } ?>
        </div>

        <?php if(isset($subscriptions)){ ?>
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Subscription <b><?php echo $user->name;?></b> - <b><?php echo $user->gam;?></b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="subscription-table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Date</th>
                    <th>Type of Pay</th>
                    <th>Amoount</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                
                  <?php if(isset($subscriptions)){
                    $i=1;
                    foreach ($subscriptions as $key => $subscription) {
                  ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo date('d-m-Y',strtotime($subscription->created_at)); ?></td>
                    <td><?php echo get_field('type_pay_list',array('id' =>$subscription->type_pay),'name')->name; ?></td>
                    <td><?php echo '૱'.$subscription->total_amount; ?></td>
                    <td><span><i class="fa fa-print"></i></span></td>
                  </tr>
                  <?php 
                       $i++;
                    } }?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sr No</th>
                    <th>Date</th>
                    <th>Type of Pay</th>
                    <th>Amoount</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <?php } ?>
        <!-- /.row -->    

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<style>
  .add_subscription_form.add_subscription_form_active {display: block !important;}
</style>
  <script>
    $(".add_subscription_form_btn").on("click", function(){
      if($(this).hasClass('active')){
          $(this).removeClass('active');
          $(this).text('Add Subscription Form');
          $('.add_subscription_form').removeClass('add_subscription_form_active');
      }else{
          $(this).addClass('active');
          $(this).text('Hide Subscription Form');
          $('.add_subscription_form').toggleClass('add_subscription_form_active');
      }
  });

$(".add_subscription_form #add_new_subscripatiob_form_Data").submit(function(e){
  e.preventDefault(); 
  $(".save_sub_btn").prop("disabled", true);
  var form = $(this);
  $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>'+'index.php/member/submit_subscription',
        data: form.serialize(),
        dataType: "json",
        success: function(data)
        {
          if(data.status == 200){
              toastr.success(data.response);
              setTimeout(function(){ location.reload(); },300);
          }
        }
    });
});


$(".add_subscription_form #updated_data").submit(function(e){
  e.preventDefault(); 
  var data = $("#updated_data").serializeArray();
  var valid = false;
  $(data).each(function(key,value){

      if(value.value != ''){
        valid = true;
      }
  });
 if(valid == true){
   var mobileno = "<?php echo @$_GET['mobileno'];?>";
    var form = $(this);
    $.ajax({
          type: "POST",
          url: '<?php echo base_url() ?>'+'index.php/member/update_subscription',
          data: form.serialize() + '&mobileno=' + mobileno,
          dataType: "json",
          success: function(data)
          {
            if(data.status == 200){
              toastr.success(data.response);
              setTimeout(function(){ location.reload(); },300);
            }
          }
      });
 }else{
  toastr.error('Please fill any Amount of Subscription');
 }
});

$("#total_member").on("keyup", function(){
   var total = $(this).val();
   var html = '';

   if(total > 0){
    html +='<div class="card">';
    html += '<div class="card-body">';
    $('.total_member_of_list').empty();
    for(var i=1;i<=total;i++){
    
      html += '<div class="row">';
        html += '<div class="col-8">';
          html += '<div class="form-group">';
            html += '<label for="sabhy_name">સભ્ય નામ</label>';
            html += '<input  onkeyup="language_tra(this);" type="text" data-id="save_sabhy_name_'+i+'" class="form-control" name="sabhy['+i+'][name]" id="sabhy_name" placeholder="સભ્ય નામ" required="">';
          html += '</div>';
        html += '</div>';
        html += '<div class="col-4">';
          html += '<div class="form-group">';
            html += '<label for="sabhy_edu">સભ્યનો અભ્યાસ</label>';
            html += '<input onkeyup="language_tra(this);" type="text" data-id="save_sabhy_edu_'+i+'" class="form-control" name="sabhy['+i+'][edu]" id="sabhy_edu" placeholder="સભ્યનો અભ્યાસ" required="">';
          html += '</div>';
        html += '</div>';
      html += '</div>';
    }
    html += '</div>';
    html += '</div>';
   }
   $('.total_member_of_list').html(html);
});

function view_print_popup(){

}
</script>