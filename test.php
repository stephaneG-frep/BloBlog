<?php


$fruits = ['banane', 'pomme', 'poire'];

foreach($fruits as $key => $value) { ?>
    
    <ul>
        <li> <?=$value; ?></li>
    </ul>
<?php } ?>