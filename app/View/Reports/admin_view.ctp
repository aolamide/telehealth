<div class="box">
    <div class="box-header">
        <h3 class="box-title">Contact Request Detail</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
           <tr>
                <td><?php echo __('First Name'); ?></td>
                <td>
                    <?php echo h($report['Report']['first_name']); ?>
                    
                </td>
          </tr>
          <tr>
                <td><?php echo __('Last Name'); ?></td>
                <td>
                    <?php echo h($report['Report']['last_name']); ?>
                </td>
          </tr>
           <tr>
               <td><?php echo __('User Email'); ?></td>
                <td>
                   <?php echo h($report['Report']['user_email']); ?> 
                </td>
           </tr>
            <tr>
               <td><?php echo __('Phone'); ?></td>
                <td>
                	<?php echo h($report['Report']['phone']); ?>
                </td>
           </tr>
           <tr>
               <td valign="top"><?php echo __('Detail'); ?></td>
                <td>
                	<?php echo h($report['Report']['detail']); ?>
                </td>
           </tr>
           
           
        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->
