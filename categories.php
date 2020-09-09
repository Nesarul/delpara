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

<?php 
    // $rec = db::getInstance()->query("SELECT * FROM bukhari WHERE chapter=?",$params = array($_GET['cat']))->getResults(); 
    
    if(isset($_GET['book']) && isset($_GET['section'])){
        $conn_string = 'book_'.$_GET['book'];
        $section = $_GET['section'];
        $sec_name = "section_".$_GET['book'];
    }
    else
        return;
    // $rec = db::getInstance()->query("SELECT bn,ar, ch_bn, ch_ar, rabi_bn, note, hadithno, sectionid,explanation FROM ".$conn_string." WHERE sectionid=?",$param = array($section))->getResults();
    $rec = db::getInstance()->query("SELECT bn,ar, ch_bn, ch_ar, rabi_bn, note, hadithno, sectionid, explanation,".$sec_name.".name_ar AS sec_ar, ".$sec_name.".name_bn as sec_bn FROM ".$conn_string." LEFT JOIN ".$sec_name." ON ".$sec_name.".sec_id = ".$conn_string.".sectionid WHERE sectionid=?",$param = array($section))->getResults();

?>


<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <h2 class="text-center bengali"><?php echo '<span class="arabic">'.$rec[0]->sec_ar."</span><br/>".$rec[0]->sec_bn; ?></h2>
        </div>
        
        <div class="col-12">
           
            <?php foreach($rec as $key => $row): ?>
            <div class="row content-bg my-3">
                <div class="col-12 p-0"><p class="hadith-no"><?php echo $row->hadithno; ?></p></div>
                
                <div class="col-sm-12 col-md-6 py-3">
                    <p class="arabic h-info mb-3" style="font-size:1.25rem">
                        <?php 
                            if($row->ch_ar != "")
                                echo $row->ch_ar;
                            else
                                echo "باب";
                        ?>
                    </p>
                    <p class="arabic"><?php echo nl2br($row->ar); ?></p>
                </div>
                
                <div class="col-sm-12 col-md-6 py-3 bn">
                    <p class="bengali h-info mb-3"><?php echo $row->ch_bn; ?></p>
                    
                    <?php echo htmlspecialchars_decode($row->bn,ENT_HTML5); ?>    

                    <?php if($row->note != ""): ?>
                        <div class="sec-note">
                            <p class="bengali"><?php echo $row->note; ?></p>
                        </div>
                        
                    <?php else: endif; ?>
                </div>
                <?php if($row->explanation != ""): ?>
                    <div class="exp">
                        <div class="col-12">
                            <?php echo htmlspecialchars_decode($row->explanation,ENT_HTML5); ?>
                        </div>
                    </div>
                <?php else: endif; ?>
            </div>
                <?php endforeach; ?>
        </div>
        
    </div>
</div>     

<script>
    $('hr').prevUntil('.h-info').css({'color':'#145A32','font-size':'1.20rem'});
</script>


<?php
    require_once('./inc/footer.php');
?>