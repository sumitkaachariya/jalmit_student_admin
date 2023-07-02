  <?php 
    $gam_id = $this->input->get('gam_id');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo get_field('hrms_type_pay_list',array('id' =>@$_GET['id']),'name')->name?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item active"><?php echo get_field('hrms_type_pay_list',array('id' =>@$_GET['id']),'name')->name?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php if($user->role_id != 3){ ?>
        <form class="row">
            <div class="col-12">
              <label>Filter</label>
              <input type="hidden" name="id" value="<?php echo @$_GET['id'];?>"> 
            </div>
            <div class="col-lg-4 col-md-4 col-10">
                <div class="form-group">
                  <?php if(isset($gams)){?>
                    <select class="form-control" name="gam_id">
                      <option <?php if($gam_id == 'all'){ echo 'selected'; }?> value="all">All</option>
                      <?php foreach ($gams as $key => $gam) { ?>
                        <option <?php if($gam_id == $gam->id){ echo 'selected'; }?> value="<?php echo $gam->id;?>"><?php echo $gam->name;?></option>
                      <?php }?>
                    </select>
                  <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-2">
              <input type="submit" value="Filter" class="btn btn-primary">
            </div>
        </form>
      <?php }?>
        <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                    <table id="subscription-table" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                          <th>Member Name</th>
                          <th>Gam</th>
                          <th>Amount</th>
                          <th>Staff Name</th>
                      </tr>
                      </thead>
                      <tbody>
                      
                      <?php if(isset($get_all)){
                          foreach ($get_all as $key => $val) {
                           
                            if($gam_id == $val['gam_id']){
                      ?>
                      <tr>
                          <td><?php echo $val['member_name']; ?></td>
                          <td><?php echo $val['gam_name']; ?></td>
                          <td>₹ <?php echo $val['total_amount']; ?></td>
                          <td><?php echo $val['staff_name']; ?></td>
                      </tr>
                      <?php }elseif($gam_id == 'all'){ ?>
                        <tr>
                          <td><?php echo $val['member_name']; ?></td>
                          <td><?php echo $val['gam_name']; ?></td>
                          <td>₹ <?php echo $val['total_amount']; ?></td>
                          <td><?php echo $val['staff_name']; ?></td>
                      </tr>
                      <?php } } }?>
                      </tbody>
                      <tfoot>
                      <tr>
                          <th>Member Name</th>
                          <th>Gam</th>
                          <th>Amount</th>
                          <th>Staff Name</th>
                      </tr>
                      </tfoot>
                  </table>
                  </div>
               </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->