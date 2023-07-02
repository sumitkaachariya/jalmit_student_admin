<?php
   $segment = $this->uri->segment(1);
?>
<?php if($user->role_id == 1 || $user->role_id == 2){ ?>
<li class="nav-item">
<a href="<?php echo site_url('users');?>" class="nav-link <?php  if($segment == 'users'){ echo 'active';}?>">
  <i class="nav-icon fas fa-users"></i>
  <p>
    Users
  </p>
</a>
</li>
<?php }?>
<?php if($user->role_id == 1 || $user->role_id == 2  || $user->role_id == 3){ ?>
<li class="nav-item">
<a href="<?php echo site_url('subscription');?>" class="nav-link <?php  if($segment == 'subscription'){ echo 'active';}?>">
  <i class="nav-icon fas fa-th"></i>
  <p>
    Subscription
  </p>
</a>
</li>
<?php }?>
<?php if($user->role_id == 1 || $user->role_id == 2){ ?>
<li class="nav-item">
<a href="<?php echo site_url('result');?>?edu_id=all" class="nav-link <?php  if($segment == 'result'){ echo 'active';}?>">
  <i class="nav-icon fas fa-list-alt"></i>
  <p>
    Result
  </p>
</a>
</li>
<?php }?>
<?php if($user->role_id == 1 || $user->role_id == 2){ ?>
<li class="nav-item">
<a href="<?php echo site_url('village');?>" class="nav-link <?php  if($segment == 'village'){ echo 'active';}?>">
  <i class="nav-icon fa-solid fa-house"></i>
  <p>
    List Village
  </p>
</a>
</li>
<?php }?>
<?php if($user->role_id == 1 || $user->role_id == 2){ ?>
<li class="nav-item">
<a href="<?php echo site_url('notebook');?>" class="nav-link <?php  if($segment == 'notebook'){ echo 'active';}?>">
  <i class="nav-icon fas fa-book"></i>
  <p>
    NoteBook
  </p>
</a>
</li>
<?php }?>
<?php if($user->role_id == 1 || $user->role_id == 2){ ?>
<li class="nav-item">
<a href="<?php echo site_url('settings');?>" class="nav-link <?php  if($segment == 'settings'){ echo 'active';}?>">
  <i class="nav-icon fas fa-cog"></i>
  <p>
    Settings
  </p>
</a>
</li>
<?php }?>