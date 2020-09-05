<?php
// $chap = "1";

// $sql = "select chapter,verse_count from chapter where chapter = :chap";


$sql = "select chapter,verse_count from chapter";
 $connection = new SQLite3('./admin/db/quran/Islam.db');
 if($connection) {
    //  $stmt = $connection->prepare($sql);
    //  $stmt->bindValue(':chap', $chap, SQLITE3_INTEGER);
    //  $rs = $stmt->execute();
    $rs =  $connection->query($sql);

     while($row = $rs->fetchArray(SQLITE3_ASSOC)){
        //http://www.quran.gov.bd/quran/arabic/1/1-5.png
        $x = $row['chapter'];
        for($i = 1; $i < ($row['verse_count']+1);$i++){
            // echo $row['chapter']." - ". $i."<br/>";
            // echo 'http://www.quran.gov.bd/quran/arabic/'.$row['chapter']."/".$row['chapter']."-".$i.".png <br/>";
            // copy('http://www.quran.gov.bd/quran/arabic/'.$row['chapter']."/".$row['chapter']."-".$i.".png", "/img"."/".$row['chapter']."-".$i.".png");
            copy('http://www.quran.gov.bd/quran/arabic/'.$row['chapter']."/".$row['chapter']."-".$i.".png", "img/".$row['chapter']." - ".$i.".png");
            // echo 'http://www.quran.gov.bd/quran/arabic/'.$row['chapter']."/".$row['chapter']."-".$i.".png <br/>";
        }
     }
 } 
 