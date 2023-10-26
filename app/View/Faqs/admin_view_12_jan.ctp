<div class="box">
    <div class="box-header">
        <h3 class="box-title">Faq Detail</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
            <tr>
                <td style="width:15%;"><?php echo __('Question'); ?></td>
                <td><?php echo stripslashes($faq['Faq']['title']); ?></td>
            </tr>
          
            <tr>
                <td><?php echo __('Answer'); ?></td>
                <td><?php echo stripslashes($faq['Faq']['content']); ?></td>
            </tr>
             <tr>
                <td><?php echo __('Status'); ?></td>
                <td><?php 
                    if($faq['Faq']['status'] == 1){
                    echo "<font color=green>Active</font>";
                    }else{
                    echo "<font color=red>Inactive</font>";
                    }			
                 ?></td>
                 
            </tr>
             <tr>
                <td><?php echo __('Created Date'); ?></td>
                <td><?php echo date("d-m-Y",strtotime($faq['Faq']['created'])); ?></td>
            </trFaq        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->
