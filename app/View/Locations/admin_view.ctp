<div class="box">
    <div class="box-header">
        <h3 class="box-title">Location Detail</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
           <tr>
                <td><?php echo __('Location Name'); ?></td>
                <td>
                    <?php echo h($location['Location']['location_name']); ?>
                    
                </td>
          </tr>
          

           <tr>
               <td valign="top"><?php echo __('Created'); ?></td>
                <td>
                   <?php echo h($location['Location']['created']); ?>
                </td>
           </tr>
           
        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->