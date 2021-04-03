<?php
    require_once('./inc/header_bn.php');
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
    
    if(isset($_GET['surah']) && $_GET['tid']){
        $surah_id = $_GET['surah'];
        $tafsir = $_GET['tid'];
    }
    else
        return;
    $tafsir_ar = [1 => 'ibn_kathir','fathul_mazid','zakariya'];
    $rec = db::getInstance()->query("SELECT * FROM ".$tafsir_ar[$tafsir]." WHERE chapter=? limit 20",$param = array($surah_id))->getResults();
?>
<?php
    $file = 'resources/ibn_kathir/p1.pdf';
    $filename = 'resources/ibn_kathir/p1.pdf';
    header("Content-type: application/pdf"); 
    header('Content-disposition: inline; filename="'.$filename.'"');
    header('Content-Transfer-Encoding:binary');
    header('Accpt-Ranges: bytes');
    @readfile($file);
    // header("Content-Length: " . filesize ('resources/ibn_kathir/p1.pdf' ) ); 
    // header("Content-type: application/pdf"); 
    // header("Content-disposition: attachment; 
    // filename=".basename('theme/assets/pdf/ci.pdf'));
    // header("Content-disposition: inline;
    // filename=".basename('resources/ibn_kathir/p1.pdf'));
    // header('Expires: 0');
    // header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    // $filepath = readfile('resources/ibn_kathir/p1.pdf');
?>
<!-- <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="q-content p-3">
                ?php foreach($rec as $key => $row):?>
                <p class="arabic">?php echo $row->ar; ?></p>
                <p class="bengali">?php echo $row->bn_kaseer; ?></p>
                <p class="bengali">?php echo nl2br($row->kaseer_bn); ?></p>
                ?php endforeach; ?>
            </div>
        </div> 
    </div>
</div>      -->

<?php
    require_once('./inc/footer.php');
?>