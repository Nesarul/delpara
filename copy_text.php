<?php
    require_once('./inc/header.php');
?>
<script>
// https://www.alislam.org/quran/62/
// $.ajax({ url: ' https://www.alislam.org/quran/62', success: function(data) { alert(data); } });
var url="https://www.alislam.org/quran/62/";
  $.get(url).then(function(data){ alert(data); });
</script>