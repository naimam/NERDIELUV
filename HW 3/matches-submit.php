<?php include("common1.php"); ?>

<h1>Matches for <?= $_GET["name"] ?></h1>
<div class='match'>
    <?php printMatches(); ?>
</div>

<?php include("common2.php"); ?>


<?php
function printMatches(){
   
    $logined = "";
    foreach (file("singles.txt", FILE_IGNORE_NEW_LINES) as $logined) {
        if ($_GET["name"] == explode(",", $logined)[0]) {
            break;
        }
    }

    foreach (file("singles.txt", FILE_IGNORE_NEW_LINES) as $matched) {
        if (
            explode(",", $matched)[0] != explode(",", $logined)[0]
            && explode(",", $matched)[1] != explode(",", $logined)[1]

            && explode(",", $matched)[2] >= explode(",", $logined)[5]
            && explode(",", $matched)[2] <= explode(",", $logined)[6]

            && explode(",", $matched)[4] == explode(",", $logined)[4]
        
            && (
                str_split(explode(",", $matched)[3])[0] == str_split(explode(",", $logined)[3])[0]
                || str_split(explode(",", $matched)[3])[1] == str_split(explode(",", $logined)[3])[1]
                || str_split(explode(",", $matched)[3])[2] == str_split(explode(",", $logined)[3])[2]
                || str_split(explode(",", $matched)[3])[3] == str_split(explode(",", $logined)[3])[3]
            )

        ) {
          
            ?>
            <p><img src='user.png' alt='icon'><?= explode(",", $matched)[0] ?></p>
            <ul>
                <li><strong>gender:</strong><?= explode(",", $matched)[1] ?></li>
                <li><strong>age:</strong><?= explode(",", $matched)[2] ?></li>
                <li><strong>type:</strong><?= explode(",", $matched)[3] ?></li>
                <li><strong>OS:</strong><?= explode(",", $matched)[4] ?></li>
            </ul>

        <?php }
    }
}

?>