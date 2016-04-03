<?php


$ministrid= array(
		array('nimi'=>'Taavi Rõivas', 'amet'=>'peaminister', 'email'=>'peaminister@riigikantselei.ee', 'pilt'=>'https://valitsus.ee/sites/default/files/content-editors/pictures/ministrid/Ministrid2014/roivas.jpg'),
        array('nimi'=>'Jevgeni Ossinovski', 'amet'=>'tervise- ja tööminister', 'email'=>'jevgeni.ossinovski@sm.ee', 'pilt'=>'https://valitsus.ee/sites/default/files/content-editors/pictures/ministrid/ossinovski_15_1.jpg'),
        array('nimi'=>'Jürgen Ligi', 'amet'=>'haridus- ja teadusminister', 'email'=>'minister@hm.ee', 'pilt'=>'https://valitsus.ee/sites/default/files/contacts/photos/jyrgen_ligi_sm.jpg'),
        array('nimi'=>'Marina Kaljurand', 'amet'=>'välisminister', 'email'=>'marina.kaljurand@mfa.ee', 'pilt'=>'https://valitsus.ee/sites/default/files/content-editors/pictures2/marina_kaljurand_web.jpg'),
        array('nimi'=>'Hannes Hanso', 'amet'=>'kaitseminister', 'email'=>'hannes.hanso@kaitseministeerium.ee', 'pilt'=>'https://valitsus.ee/sites/default/files/content-editors/pictures/ministrid/hanso15_1.jpg'),
);

foreach ($ministrid as $minister) {
    include("ministrid.html");
}


?>