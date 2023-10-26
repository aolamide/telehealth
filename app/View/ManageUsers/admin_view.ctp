<div class="box">
    <div class="box-header">
        <h3 class="box-title">User Detail</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
           <tr>
                <td><?php echo __('Name'); ?></td>
                <td>
                    <?php echo h($manageUser['ManageUser']['first_name']." ".$manageUser['ManageUser']['last_name']); ?>
                    
                </td>
          </tr>
          <tr>
                <td><?php echo __('Email'); ?></td>
                <td>
                    <?php echo h($manageUser['ManageUser']['email']); ?>  
                </td>
          </tr>
           <tr>
               <td><?php echo __('Telephone 1'); ?></td>
                <td>
                    <?php echo h($manageUser['ManageUser']['telephone1']); ?>
                    
                </td>
           </tr>
            <tr>
               <td><?php echo __('Telephone 2'); ?></td>
                <td>
                    <?php echo h($manageUser['ManageUser']['telephone2']); ?>
                    
                </td>
           </tr>
            <tr>
              <td><?php echo __('Telephone 3'); ?></td>
                <td>
                    <?php echo h($manageUser['ManageUser']['telephone3']); ?>
                    
                </td>
           </tr>
            <tr>
               <td><?php echo __('Telephone 4'); ?></td>
                <td>
                    <?php echo h($manageUser['ManageUser']['telephone4']); ?>
                    
                </td>
           </tr>
            <tr>
               <td><?php echo __('County'); ?></td>
                <td>
                    <?php echo $this->Custom->region_nm($manageUser['ManageUser']['country_id']); ?>
                    
                </td>
           </tr>
            <tr>
               <td><?php echo __('Locality'); ?></td>
                <td>
                    <?php echo $this->Custom->location_nm($manageUser['ManageUser']['locality_id']); ?>
                    
                </td>
           </tr> <tr>
               <td><?php echo __('Postal Code'); ?></td>
                <td>
                    <?php echo h($manageUser['ManageUser']['postal_code']); ?>
                    
                </td>
           </tr>
            <tr>
               <td><?php echo __('Other Add'); ?></td>
                <td>
                    <?php echo h($manageUser['ManageUser']['other_add']); ?>
                    
                </td>
           </tr>
            <tr>
               <td><?php echo __('User Type'); ?></td>
                <td>
                    <?php 
                    echo $this->Custom->user_type($manageUser['ManageUser']['user_type_id']); ?>
                    
                </td>
           </tr>
           <tr>
               <td><?php echo __('Promotion ads total credits'); ?></td>
                <td>
                    <?php if(count($userCredits)>0){echo $userCredits['UserTotalCredit']['credits']." RON";}else{echo "0 RON";}?>
                    
                </td>
           </tr>
           <tr>
               <td><?php echo __('Status'); ?></td>
                <td>
                    <?php 
                    $status=array('0'=>'Inactive','1'=>'Active');
                    echo h($status[$manageUser['ManageUser']['is_active']]); ?>
                    
                </td>

           </tr>
           <tr>
               <td><?php echo __('Last Login'); ?></td>
                <td>
                    <?php if($manageUser['ManageUser']['last_login']){
                        echo  date('d-m-Y',strtotime($manageUser['ManageUser']['last_login']));
                    } ?>
                    
                </td>
           </tr>
           <tr>
               <td><?php echo __('Reg Date'); ?></td>
                <td>
                    <?php echo date('d/m/Y',strtotime($manageUser['ManageUser']['created'])); ?>
                    
                </td>
           </tr>
           <tr>
               <td><?php echo __('Modified'); ?></td>
                <td>
                    <?php echo date('d/m/Y',strtotime($manageUser['ManageUser']['modified'])); ?>
                    
                </td>
           </tr>
           
        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->

