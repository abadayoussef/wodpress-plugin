
<div class="container-fluid">
    <?php
    global $wpdb;
    require_once plugin_dir_path(__FILE__) . '../../includes/class-abadata-activator.php';
        $rows = $wpdb->get_results("SELECT * FROM ".  Abadata_Activator::abadaData_table() ,ARRAY_A);
    ?>

    <h1><?php echo $rows[0]["title"]?></h1>
    <p class="bg-light" style="font-size: 1.5em;"><?php echo $rows[0]["description"]?></p>
    <p class="text-success" style="font-size: 1.2em;"><?php echo ucfirst($rows[0]["version"])?></p>
</div>