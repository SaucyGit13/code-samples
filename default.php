<!DOCTYPE html>
<html>
    <head>
        <?php $this->inc('elements/head.php'); ?>
    </head>
    <body id="homepage">
        <div class="wrapper <?php echo $c->getPageWrapperClass()?>">
            <?php $this->inc('elements/header.php'); ?>
            <div class="main-homepage-image" data-parallax="scroll" data-image-src="<?php echo $this->getThemePath();?>/images/homepage-hero.jpg">
                <table>
                    <tr>
                        <td>
                            <span class="homepage-title">Bridging business potential with financial solutions.</span>
                            <span class="btn btn-primary homepage-down" data-scroll="#homepage-content" onclick="ga('send','event','button','click','homepage hero button',1);">How?&nbsp;&nbsp;<i class="fa fa-arrow-circle-down"></i></span>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="homepage-content" class="fabric">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <?php $a = new Area('Homepage Content'); $a->display($c); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->inc('elements/callouts.php'); ?>
            <div id="homepage-select">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <?php $a = new Area('Homepage Select'); $a->display($c); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->inc('elements/testimonial.php'); ?>
            <?php $this->inc('elements/footer.php'); ?>
        </div>
        <?php $this->inc('elements/base.php'); ?>
    </body>
</html>
