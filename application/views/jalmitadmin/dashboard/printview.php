<div class="lavajam_print">
  <div class="logo">
     <img width="600px" height="80px" src="<?php echo base_url('assets/image/fulllogo.png')?>">
  </div>

<style>
    body{margin:0;}
    table th{
        text-align:left;
    }
    @page { margin: 0px; }
    body { margin: 0px; }
    /* .amount_table, .amount_table th, .amount_table td{border: 1px solid black;} */
    .amount_table{border: 1px solid black;}
    .heading_table{width:100%; border-bottom:1px solid;margin-bottom:20px;}
    .informationn_table{border: 1px solid black;}

</style>
<div class="row">

    <table class="heading_table" cellpadding="5">
        <tr>
            <td><b>Date:</b></td>
            <td><b><?php echo date('d-m-y', strtotime($member_user->created_at));?></b></td>
            <td width="400px"></td>
            <td><b>Sr no:</b></td>
            <td><b><?php echo $member_user->id;?></b></td>
        </tr>
    </table>
    <div>
        <div  style="width: 100%; margin-bottom:30px;">
            <table cellpadding="8" cellspacing="0" class="informationn_table" width="100%">
            <tr>
                <th style="width:250px;background-color:#ddd;">Name</th>
                <td style="background-color:#ddd;">:</td>
                <td><?php echo $member_user->name;?></td>
            </tr>
            <tr>
                <th style="background-color:#ddd;">Address</th>
                <td style="background-color:#ddd;">:</td>
                <td><?php echo $member_user->address;?></td>
            </tr>
            <tr>
                <th style="background-color:#ddd;">Mobile No</th>
                <td style="background-color:#ddd;">:</td>
                <td><?php echo $member_user->mobileno;?></td>
            </tr>
            <tr>
                <th style="background-color:#ddd;">Gam</th>
                <td style="background-color:#ddd;">:</td>
                <td><?php echo $member_user->gam;?></td>
            </tr>
            <tr>
                <th style="background-color:#ddd;">Number of children studying</th>
                <td style="background-color:#ddd;">:</td>
                <td><?php echo $member_user->edu_no_of_child;?></td>
            </tr>
            <tr>
                <th style="background-color:#ddd;">Total Result</th>
                <td style="background-color:#ddd;">:</td>
                <td><?php echo $member_user->no_of_result;?></td>
            </tr>
            <tr>
                <th style="background-color:#ddd;">Total given book</th>
                <td style="background-color:#ddd;">:</td>
                <td><?php echo $member_user->pay_of_notebook;?></td>
            </tr>
            <tr>
                <th style="background-color:#ddd;">Total household members</th>
                <td style="background-color:#ddd;">:</td>
                <td><?php echo $member_user->no_of_home_person;?></td>
            </tr>
            </table>
        </div>
        <div style="height:230px;">
            <div style="float:left;width:40%;">
                <table cellpadding="5" cellspacing="0" class="amount_table" style="width:100%;" "border"="1px">
                    <tr>
                        <th style="background-color:#ddd;border-bottom:1px solid;width:150px;text-align:center;">Contents</th>
                        <th style="background-color:#ddd;border-bottom:1px solid;text-align:center;">Amount</sth>
                    </tr>
                    <tr>
                        <th style="background-color:#ddd;border-right:1px solid;">Annual Allowance</th>
                        <td><?php echo $amount['varshik_lavajam']; ?></td>
                    </tr>
                    <tr>
                        <th style="background-color:#ddd;border-right:1px solid;">Donation</th>
                        <td><?php echo $amount['danbhet']; ?></td>
                    </tr>
                    <tr>
                        <th style="background-color:#ddd;border-right:1px solid;">Notebook</th>
                        <td><?php echo $amount['notebook']; ?></td>
                    </tr>
                    <tr>
                        <th style="background-color:#ddd;border-right:1px solid;border-bottom:1px solid;">Other</th>
                        <td style="border-bottom:1px solid;"><?php echo $amount['other']; ?></td>
                    </tr>
                    <tr style="height:10px;background-color:#ddd;">
                        <td colspan="2"><div style="padding:10px;"></div></td>
                    </tr>
                    <tr>
                        <th style="background-color:#ddd;border-right:1px solid;border-top:1px solid;">Total Amount</th>
                        <td style="background-color:#ddd;border-right:1px solid;border-top:1px solid;"><b><?php echo array_sum($amount);?></b></td>
                    </tr>
                </table>
            </div>
            <div style="float:right;width:60%;">
                <div style="text-align:right;">
                    <table align="center" cellpadding="8" cellspacing="0" style="border:1px solid">
                        <tr><th style="text-align:center;width:250px;background-color:#ddd;border-bottom:1px solid">Name of Borrower</th></tr>
                        <tr><td style="text-align:center;"><?php echo $provided_user->name; ?></td></tr>
                    </table>
                </div>
                <div style="text-align:right;margin-top:30px;">
                    <table align="center" cellpadding="8" cellspacing="0" style="border:1px solid">
                        <tr><th style="text-align:center;width:250px;background-color:#ddd;border-bottom:1px solid">Remark</th></tr>
                        <tr><td style="text-align:left;">
                        <?php if($member_user->remark != null){ ?>
                            <?php echo $member_user->remark;?>
                        <?php } ?>
                        </td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

  
</div>

</div>


<style>
    body{margin:0;}
   .logo{ text-align:center;}
   .lavajam_print {
    margin: 10px;
    border: 5px #000;
    border-style: double;
}
.logo {
    text-align: center;
    border-bottom: 5px #000;
    border-style: double;
    border-top: none;
    border-left: none;
    border-right: none;
}


.table_row {
    display: flex;
    flex-wrap: wrap;
}
.table_row.heading .table_column{
  text-align:center;
}
.table_column {
    width: 100px;
    padding: 5px;
}
</style>