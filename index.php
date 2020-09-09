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
    // $rec = db::getInstance()->query("SELECT * FROM book_1")->getResults();
?>



<div class="container">
    <div class="row left-menu">
        <div class="col-sm-6 col-12 py-3">
            <h2 class="bengali" style="font-size:2.0rem">হাদীস গ্রন্থ সমূহ</h2>
            <div class="accordion" id="bukhari">
                <div class="card">
                    <div class="card-header" id="headingBukhari">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseBukhari" aria-expanded="true" aria-controls="collapseBukhari">
                                সহীহ বুখারী
                            </button>
                        </h2>
                    </div>

                    <div id="collapseBukhari" class="collapse" aria-labelledby="headingBukhari" data-parent="#bukhari">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <?php  
                                    $rec = db::getInstance()->query("SELECT sec_id, name_bn,hadith_number FROM section_1")->getResults();
                                    foreach($rec as $key => $row):
                                ?>
                                 <li class="menu-list">
                                    <a href="./categories.php?book=1&amp;section=<?php echo $row->sec_id; ?>"><?php echo $row->name_bn; ?> <span class="badge badge-dark"><?php echo $row->hadith_number; ?></span></a>
                                </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
        
                <div class="card">
                    <div class="card-header" id="headingMuslim">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseMuslim" aria-expanded="false" aria-controls="collapseMuslim">
                                সহীহ মুসলিম
                            </button>
                        </h2>
                    </div>
                    <div id="collapseMuslim" class="collapse" aria-labelledby="headingMuslim" data-parent="#bukhari">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <?php  
                                    $rec = db::getInstance()->query("SELECT sec_id, name_bn,hadith_number FROM section_2")->getResults();
                                    foreach($rec as $key => $row):
                                ?>
                                 <li class="menu-list">
                                    <a href="./categories.php?book=2&amp;section=<?php echo $row->sec_id; ?>"><?php echo $row->name_bn; ?> <span class="badge badge-dark"><?php echo $row->hadith_number; ?></span></a>
                                </li>
                                <?php endforeach ?>
                            </ul>                            
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTirmijee">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTirmijee" aria-expanded="false" aria-controls="collapseTirmijee">
                                জামি' আত তিরমিজি
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTirmijee" class="collapse" aria-labelledby="headingTirmijee" data-parent="#bukhari">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <?php  
                                    $rec = db::getInstance()->query("SELECT sec_id, name_bn,hadith_number FROM section_11")->getResults();
                                    foreach($rec as $key => $row):
                                ?>
                                 <li class="menu-list">
                                    <a href="./categories.php?book=11&amp;section=<?php echo $row->sec_id; ?>"><?php echo $row->name_bn; ?> <span class="badge badge-dark"><?php echo $row->hadith_number; ?></span></a>
                                </li>
                                <?php endforeach ?>
                            </ul> 
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingAbuDaud">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseAbuDaud" aria-expanded="false" aria-controls="collapseAbuDaud">
                                সুনানে আবু দাউদ
                            </button>
                        </h2>
                    </div>
                    <div id="collapseAbuDaud" class="collapse" aria-labelledby="headingAbuDaud" data-parent="#bukhari">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <?php  
                                    $rec = db::getInstance()->query("SELECT sec_id, name_bn,hadith_number FROM section_4")->getResults();
                                    foreach($rec as $key => $row):
                                ?>
                                 <li class="menu-list">
                                    <a href="./categories.php?book=4&amp;section=<?php echo $row->sec_id; ?>"><?php echo $row->name_bn; ?> <span class="badge badge-dark"><?php echo $row->hadith_number; ?></span></a>
                                </li>
                                <?php endforeach ?>
                            </ul> 
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingNasaai">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseNasaai" aria-expanded="false" aria-controls="collapseNasaai">
                                সুনানে নাসাই
                            </button>
                        </h2>
                    </div>
                    <div id="collapseNasaai" class="collapse" aria-labelledby="headingNasaai" data-parent="#bukhari">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <?php  
                                    $rec = db::getInstance()->query("SELECT sec_id, name_bn,hadith_number FROM section_6")->getResults();
                                    foreach($rec as $key => $row):
                                ?>
                                 <li class="menu-list">
                                    <a href="./categories.php?book=6&amp;section=<?php echo $row->sec_id; ?>"><?php echo $row->name_bn; ?> <span class="badge badge-dark"><?php echo $row->hadith_number; ?></span></a>
                                </li>
                                <?php endforeach ?>
                            </ul> 
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingMajah">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseMajah" aria-expanded="false" aria-controls="collapseMajah">
                                সুনানে ইবনে মাজাহ
                            </button>
                        </h2>
                    </div>
                    <div id="collapseMajah" class="collapse" aria-labelledby="headingMajah" data-parent="#bukhari">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <?php  
                                    $rec = db::getInstance()->query("SELECT sec_id, name_bn,hadith_number FROM section_9")->getResults();
                                    foreach($rec as $key => $row):
                                ?>
                                 <li class="menu-list">
                                    <a href="./categories.php?book=9&amp;section=<?php echo $row->sec_id; ?>"><?php echo $row->name_bn; ?> <span class="badge badge-dark"><?php echo $row->hadith_number; ?></span></a>
                                </li>
                                <?php endforeach ?>
                            </ul> 
                        </div>
                    </div>
                </div>
            </div>
            
        
        </div>
        <div class="col-sm-6 col-12 py-3 right-part">
            <h2 class="bengali" style="font-size:2.0rem">কুরআনুল কারীম </h2>
            <ul class="list-unstyled">
                <?php  
                    $connection = new SQLite3('./admin/db/quran/sna.db');
                    if($connection) {
                        $sql = "SELECT surahId,surahName,surahTotalAyaat FROM surah";
                        $rs = $connection->query($sql);
                    } 
                    while($row = $rs->fetchArray(SQLITE3_ASSOC)): 
                ?>
                    <li class="menu-list">
                        <?php  ?>
                        <a href="./quran.php?chap=<?php echo $row['surahId']; ?>" style="font-family:'alqalam', Arial, Helvetica, sans-serif"><?php echo $row['surahId']." - ".$row['surahName'] ?> <span class="badge badge-dark"><?php echo $row['surahTotalAyaat'] ?></span></a>
                    </li>
                <?php endwhile;?>
            </ul>
            
        </div>
    </div>
</div>     


<?php
    require_once('./inc/footer.php');
?>