<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( empty( $id ) ) {
    exit;
}
$template_content = IO_Theme_Templates::get_template_content( $id, $in_theme );
?>

<div class="wrap">
    <h2><?php echo __( 'Edit Theme Template - ' ) . $id  ?></h2>

    <?php IO_Theme_Templates::show_message(); ?>

    <form id="edit_template" action="" method="post">
        <input type="hidden" name="data[id]" value="<?php echo $id ?>">
        <?php wp_nonce_field( 'save_template' . $id ) ?>


        <div id="poststuff">
            <div id="post-body" class="metabox-holder columns-2 not_bold">
                <div id="post-body-content">
                    <div id="titlediv">
                        <div id="titlewrap">
                        </div>
                    </div>
                    <div id="postdivrich" class="postarea wp-editor-expand">
                        <div class="postarea">

                        <?php
                            if ( false === $syntax_highlighting ) {
                                wp_editor( $template_content, 'data[content]', array(
                                        '_content_editor_dfw' => true,
                                        'drag_drop_upload' => true,
                                        'tabfocus_elements' => 'content-html,save-post',
                                        'editor_height' => 500,
                                        'tinymce' => 0,
                                ) );
                            } else {
                        ?>
                            <textarea cols="70" rows="25" name="data[content]" id="newcontent" aria-describedby="newcontent-description"><?php echo $template_content; ?></textarea>
                        <?php } ?>

                        </div>
                    </div>
                </div><!-- #post-body-content -->
                <div id="postbox-container-1" class="postbox-container">

                    <?php
                        do_meta_boxes( 'io-woocommerce-edit-template-publish', 'side', array( 'id' => $id, 'status' => $in_theme )  ) ;
                    ?>
                 </div>
            </div><!-- #post-body -->
        </div> <!-- #poststuff -->
    </form>
</div>