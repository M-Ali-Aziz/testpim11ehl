<?php
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */
$this->extend('default.html.php');
?>

<?php if($this->editmode) : ?>
<style>
table, table td, table th {border:none}
.pimcore_block_button_up .pimcore_block_button_down, .pimcore_open_link_button {display:none !important;}
.pimcore_open_link_button {display:none !important;}
#pimcore_editable_rightAreablock .pimcore_area_edit_button,
#pimcore_editable_mainAreablock .pimcore_area_edit_button {z-index: 9999;}
.x-window .pimcore_tag_input {border: 1px solid #dedbd9;}
.info {font-weight:700;margin:0;}
.margins {margin:8px 0 0 0;}
.embed-responsive {z-index:1;}
.pimcore_area_entry {margin-bottom: 40px!important;}
.main{overflow:visible;}
.pimcore_area_buttons {display: block;visibility: visible !important;}
</style>
<?php endif; ?>

<?php echo $this->areablock('mainAreablock', [
    "allowed"=> ["partner-universities"],
    "toolbar"=> 0,
]); ?>

