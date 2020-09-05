<?php
    require_once('./inc/header.php');
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
    if(isset($_GET['chap'])){
       $chap = $_GET['chap'];
    }
    else
        return;

    $sql = "
    SELECT surahId,ayatNumber,arabicText,bnText FROM aayaat WHERE surahId = :chap 
    ORDER BY ayatNumber ASC;
    ";
    
    $connection = new SQLite3('./admin/db/quran/sna.db');
    if($connection) {
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':chap', $chap, SQLITE3_INTEGER);
        $rs = $stmt->execute();
    } 
    
?>


<div class="container">
    <div class="row my-5">
        <div class="col-12  q-content px-5">
            <?php while($row = $rs->fetchArray(SQLITE3_ASSOC)): ?>
               
                <p class="q-arabic"><?php echo $row['arabicText'] ?></p>
                <p class="bengali bn-aya"><span class="aya"><?php echo $row['ayatNumber']." - "?></span><?php echo $row['bnText']; ?></p>

                <hr>
            <?php endwhile; ?>
        </div>
    </div>
    
</div>     

<script>
    // $('hr').prevUntil('.h-info').css({'color':'#145A32','font-size':'1.20rem'});
</script>


<?php
    require_once('./inc/footer.php');
?>