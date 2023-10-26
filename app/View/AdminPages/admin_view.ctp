<div class="box">
     <div class="box-header">
        <h3 class="box-title">Page Details</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
           <tr>
                <td><?php echo __('Page Name'); ?></td>
                <td><?php echo h($adminPage['AdminPage']['page_name']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Page Title'); ?></td>
                <td><?php echo $adminPage['AdminPage']['page_title']; ?></td>
            </tr>
            <tr>
                <td><?php echo __('Page Content'); ?></td>
                <td><?php echo $adminPage['AdminPage']['page_desc']; ?></td>
            </tr>
            <tr>
                <td><?php echo __('Short Content'); ?></td>
                <td><?php echo $adminPage['AdminPage']['sor_desc']; ?></td>
            </tr>
            <tr>
                <td><?php echo __('Meta Title'); ?></td>
                <td><?php echo h($adminPage['AdminPage']['meta_title']); ?></td>
            </tr>
             <tr>
                <td><?php echo __('Meta Desc'); ?></td>
                <td><?php echo h($adminPage['AdminPage']['meta_desc']); ?></td>
                </tr>
                  <tr>
                <td><?php echo __('Meta Keywords'); ?></td>
                <td><?php echo h($adminPage['AdminPage']['meta_keywords']); ?></td>
          
            </tr>
             <tr>
                <td><?php echo __('Is Active ?'); ?></td>
                <td><?php 
if($adminPage['AdminPage']['is_active'] == 1){
echo "<font color=green>Yes</font>";
}else{
echo "<font color=red>No</font>";
}			
 ?></td>
          
            </tr>
        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->

