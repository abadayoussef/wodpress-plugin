<div class="container">
    <h1>All the data</h1>
    <div class="mt-4">
    <table id="example" class="table table-hover" style="width:100%">
    <?php
                global $wpdb;
                require_once plugin_dir_path(__FILE__) . '../../includes/class-abadata-activator.php';
                 $all_abadata = $wpdb->get_results("SELECT * FROM ".  Abadata_Activator::abadaData_table() ." ORDER BY id desc" ,ARRAY_A);
                 if(count($all_abadata) > 0){
            ?>
            
        <thead>
            <tr class="bg-dark text-white">
                <th>ID</th>
                <th>Title</th>
                <th>Categoty</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            for($i = 0; $i < count($all_abadata); $i++){
            ?>
            <tr>
                <td><?php echo $all_abadata[$i]["id"]?></td>
                <td><?php echo $all_abadata[$i]["title"]?></td>
                <td><?php echo $all_abadata[$i]["category"]?></td>
                <td><?php echo $all_abadata[$i]["discription"]?></td>
            </tr>
            <?php }?>
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Categoty</th>
                <th>Description</th>
            </tr>
        </tfoot>
    </table>
                 <?php }else{ ?>
                    <h3>No data yet</h3>
                 <?php }?>
    </div>
</div>