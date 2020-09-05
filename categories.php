<?php
    require_once('./inc/header.php');
    // require_once('./admin/db/db.php');
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
        $conn_string = './admin/db/books/'.$_GET['book'].'.db';
        $section = $_GET['section'];
    }
    else
        return;
    
    $sql = "
    SELECT 
    a.c0hadithBengali       as bn,
    a.c2hadithArabic        as ar,
    a.c12chapter_bn         as cbn,
    a.c13chapter_ar         as car,
    a.c4note                as note,
    a.c5rabiNameBangla      as rabi,
    b.hadithNo              as hno,
    a.c14bn_explanation     as exp,
    b.id                    as id,
    b.sectionId             as sid 
    
    FROM
    content_fts_content     as a 
    
    LEFT JOIN 
    content                 as b 
    on 
    b.id = a.docid 
    
    WHERE 
    b.sectionId = :section;
    ";
    $connection = new SQLite3('./admin/db/books/hb_1.db');
    if($connection) {
        // $sql = "SELECT id,nameBengali,hadith_number FROM section";
        
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':section', $section, SQLITE3_INTEGER);
        $rs = $stmt->execute();
    } 
?>


<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <h2 class="text-center">
                <?php 
                    // echo $_GET['chap']; 
                ?>
            </h2>
            <h2 class="text-center">Dear Bangladesh</h2>
        </div>
        
        <div class="col-12">
           
            <?php while($row = $rs->fetchArray(SQLITE3_ASSOC)): ?>
            <div class="row content-bg my-3">
                <div class="col-12 p-0"><p class="hadith-no"><?php echo $row['id']; ?></p></div>
                
                <div class="col-sm-12 col-md-6 py-3">
                    <p class="arabic h-info mb-3" style="font-size:1.25rem">
                        <?php 
                            if($row['car'] != "")
                                echo $row['car'];
                            else
                                echo "باب";
                        ?>
                    </p>
                    <p class="arabic"><?php echo nl2br($row['ar']); ?></p>
                </div>
                
                <div class="col-sm-12 col-md-6 py-3 bn">
                    <p class="bengali h-info mb-3"><?php echo $row['cbn']; ?></p>
                    
                    <?php echo htmlspecialchars_decode($row['bn'],ENT_HTML5); ?>    

                    <?php if($row['note'] != ""): ?>
                        <div class="sec-note">
                            <p class="bengali"><?php echo $row['note']; ?></p>
                        </div>
                        
                    <?php else: endif; ?>
                </div>
                <?php if($row['exp'] != ""): ?>
                    <div class="exp">
                        <div class="col-12">
                            <?php echo htmlspecialchars_decode($row['exp'],ENT_HTML5); ?>
                        </div>
                    </div>
                <?php else: endif; ?>
            </div>
                <?php endwhile; ?>
        </div>
        
    </div>
</div>     

<script>
    $('hr').prevUntil('.h-info').css({'color':'#145A32','font-size':'1.20rem'});
</script>


<?php
    require_once('./inc/footer.php');
?>