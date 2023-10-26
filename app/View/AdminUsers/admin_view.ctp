<div class="box">
    <div class="box-header">
        <h3 class="box-title">Admin User Detail</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
            <tr>
                <td><?php echo __('Full Name'); ?></td>
                <td><?php echo h($adminUser['AdminUser']['full_name']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Mail Id'); ?></td>
                <td><?php echo h($adminUser['AdminUser']['mail_id']); ?></td>
            </tr>
             <tr>
                <td><?php echo __('User Id'); ?></td>
                <td><?php echo h($adminUser['AdminUser']['user_id']); ?></td>
            </tr>
             <tr>
                <td><?php echo __('Is Active ?'); ?></td>
                <td><?php 
                    if($adminUser['AdminUser']['is_active'] == 1){
                    echo "<font color=green>Yes</font>";
                    }else{
                    echo "<font color=red>No</font>";
                    }			
                 ?></td>
                 
            </tr>
             <tr>
                <td><?php echo __('Date'); ?></td>
                <td><?php echo h(date("d/m/Y",strtotime($adminUser['AdminUser']['created']))); ?></td>
            </tr>
        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->
