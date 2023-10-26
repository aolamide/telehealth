
<div class="box">
    <div class="box-header">
        <h3 class="box-title">News Detail</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
           <tr>
                <td><?php echo __('Title'); ?></td>
                <td>
                    <?php echo h($news['News']['news_title']); ?>
                    
                </td>
          </tr>
          <tr>
                <td valign="top"><?php echo __('Description'); ?></td>
                <td>
                    <?php echo stripslashes($news['News']['news_content']); ?> 
                </td>
          </tr>
           <tr>
               <td><?php echo __('Image'); ?></td>
                <td>
                    <img src="<?php echo $base_url;?>files/news/<?php echo $news['News']['news_img'];?>" style="width:70px;" />
                    
                </td>
           </tr>
            <tr>
               <td><?php echo __('Post date'); ?></td>
                <td>
                    <?php echo date("d-m-Y", strtotime($news['News']['created'])); ?>
                    
                </td>
           </tr>
           <tr>
               <td><?php echo __('Status'); ?></td>
                <td>
           <?php 
			$status=array(1=> 'Active', 0 => 'Inactive');
			echo $status[$news['News']['status']]; ?>
			</td>
           </tr>
           
        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->

