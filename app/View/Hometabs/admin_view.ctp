<div class="box">
    <div class="box-header">
        <h3 class="box-title">Home Tab Detail</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
           <tr>
                <td style="width:15%"><?php echo __('Title'); ?></td>
                <td>
                    <?php echo h($hometab['Hometab']['title']); ?>
                    
                </td>
          </tr>
          <tr>
                <td valign="top"><?php echo __('Description'); ?></td>
                <td>
                    <?php echo stripslashes($hometab['Hometab']['content']); ?> 
                </td>
          </tr>
           <tr>
               <td><?php echo __('Image'); ?></td>
                <td>
                <?php if($hometab['Hometab']['img']!= ''){?>
                    <img src="<?php echo $base_url;?>files/hometab/<?php echo $hometab['Hometab']['img'];?>" style="width:70px;" />
                    <?php }?>
                    
                </td>
           </tr>
            <tr>
               <td><?php echo __('Post date'); ?></td>
                <td>
                    <?php echo date("d-m-Y", strtotime($hometab['Hometab']['created'])); ?>
                    
                </td>
           </tr>
           <tr>
               <td><?php echo __('Status'); ?></td>
                <td>
           <?php 
			$status=array(1=> 'Active', 0 => 'Inactive');
			echo $status[$hometab['Hometab']['status']]; ?>
			</td>
           </tr>
           
        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->


