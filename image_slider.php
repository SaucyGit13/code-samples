<?php defined('C5_EXECUTE') or die("Access Denied.");
$navigationTypeText = ($navigationType == 0) ? 'arrows' : 'pages';
$c = Page::getCurrentPage();
if ($c->isEditMode()) { ?>
    <div class="ccm-edit-mode-disabled-item" style="<?php echo isset($width) ? "width: $width;" : '' ?><?php echo isset($height) ? "height: $height;" : '' ?>">
        <div style="padding: 40px 0px 40px 0px"><?php echo t('Image Slider disabled in edit mode.')?></div>
    </div>
<?php  } else { ?>
    <?php ob_start();?>
    <script>
        $(document).ready(function(){
            $(function () {
                $("#ccm-image-slider-<?php echo $bID ?>").responsiveSlides({
                    prevText: "",   // String: Text for the "previous" button
                    nextText: "",
                    <?php if($navigationType == 0) { ?>
                    nav:true,
                    <?php } else { ?>
                    pager: true,
                    <?php } ?>
                    <?php if ($timeout) { echo "timeout: $timeout,"; } ?>
                    <?php if ($speed) { echo "speed: $speed,"; } ?>
                    <?php if ($pause) { echo "pause: true,"; } ?>
                    <?php if ($noAnimate) { echo "auto: false,"; } ?>
                });
            });
        });
    </script>
    <?php
    $script = ob_get_clean();
    $this->addFooterItem($script);
    ?>

    <div class="ccm-image-slider-container ccm-block-image-slider-<?php echo $navigationTypeText?>" >
        <div class="ccm-image-slider">
            <div class="ccm-image-slider-inner fullsize">

                <?php if(count($rows) > 0) { ?>
                    <ul class="rslides" id="ccm-image-slider-<?php echo $bID ?>">
                        <?php
                        $imageHelper = Core::make('helper/image');
                        foreach($rows as $row) {
                        $f = File::getByID($row['fID']);
                        $img = $imageHelper->getThumbnail($f, 1300, 655);
                        ?>
                        <li style="background-image:url(<?php echo $img->src; ?>);">
                            <?php if($row['linkURL']) { ?>
                                <a href="<?php echo $row['linkURL'] ?>" class="mega-link-overlay"></a>
                            <?php } ?>
                            <?php
                            ?>
                            <div class="caption">
                                <div class="container">
                                    <div class="row">
                                        <div class="copy text-center col-sm-8 col-sm-offset-2">
                                            <?php echo $row['description'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                <?php } else { ?>
                    <div class="ccm-image-slider-placeholder">
                        <p><?php echo t('No Slides Entered.'); ?></p>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
<?php } ?>
