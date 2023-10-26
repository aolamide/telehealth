<div class="box">
    <div class="box-header">
        <h3 class="box-title">Service Type Detail</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
            <tr>
                <td style="width:15%;"><?php echo __('Service Name'); ?></td>
                <td><?php echo stripslashes($serviceType['ServiceType']['service_name']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Service Duration'); ?></td>
                <td><?php echo stripslashes($serviceType['ServiceType']['service_time']); ?> Min</td>
            </tr>
            <tr>
                <td><?php echo __('Description'); ?></td>
                <td><?php echo stripslashes($serviceType['ServiceType']['service_desc']); ?></td>
            </tr>
             <tr>
                <td><?php echo __('Status'); ?></td>
                <td><?php 
                    if($serviceType['ServiceType']['status'] == 1){
                    echo "<font color=green>Active</font>";
                    }else{
                    echo "<font color=red>Inactive</font>";
                    }			
                 ?></td>
                 
            </tr>
             <tr>
                <td><?php echo __('Created Date'); ?></td>
                <td><?php echo date("d-m-Y",strtotime($serviceType['ServiceType']['created'])); ?></td>
            </tr>
        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->
