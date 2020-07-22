<?php
    require_once('./inc/header.php');
    require_once('./admin/db/db.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-0">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="./resources/images/slide-1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>নিশ্চয়ই আল্লাহ সর্ব বিষয়ে সর্ব শক্তিমান</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="./resources/images/slide-2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="./resources/images/slide-3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<?php $rec = db::getInstance()->query("SELECT * FROM bukhari WHERE chapter=?",$params = array($_GET['cat']))->getResults(); ?>
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <h2 class="text-center"><?php echo $_GET['chap']; ?></h2>
        </div>
        
        <div class="col-12">
            <?php foreach($rec as $key => $value): ?>
            <div class="row content-bg my-3">
                <div class="col-12 p-0"><p class="hadith-no"><?php echo $value->no; ?></p></div>
                
                <div class="col-sm-12 col-md-6 py-3">
                    <p class="arabic h-info mb-3" style="font-size:1.25rem"><?php echo $value->h_info_arabic_title; ?></p>
                    <p class="arabic"><?php echo nl2br($value->arabic); ?></p>
                </div>
                <div class="col-sm-12 col-md-6 py-3">
                    <p class="bengali h-info mb-3"><?php echo nl2br($value->h_info_bangla_title); ?></p>
                    <?php if($value->h_info_bangla != ""): ?>
                        <p class="bengali h-info-chap"><?php echo nl2br($value->h_info_bangla); ?></p>
                    <?php else: endif; ?>

                    <p class="bengali"><?php echo nl2br($value->bengali); ?></p>

                    <?php if($value->notes != ""): ?>
                        <div class="sec-note">
                            <!-- <p class="bengali">Notes:</p> -->
                            <p class="bengali"><?php echo nl2br($value->notes); ?></p>
                        </div>
                        
                    <?php else: endif; ?>
                </div>
                <?php if($value->explanation != ""): ?>
                    <div class="exp">
                        <div class="col-12">
                            <p class = "bengali"><?php echo nl2br($value->explanation); ?></p>
                        </div>
                    </div>
                <?php else: endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        
    </div>
</div>       
<?php
    require_once('./inc/footer.php');
?>