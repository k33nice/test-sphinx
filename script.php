<?php
/*
*===============================================================================
* $ sudo vim /etc/sphinxsearch/sphinx.conf
* $ sudo indexer --all [--rotate]
* $ crontab -e
* @hourly /usr/bin/indexer --rotate --config /etc/sphinxsearch/sphinx.conf --all
* $ sudo vim /etc/default/sphinxsearch
* START=yes
* $ sudo service sphinxsearch start
*===============================================================================
*/


require('vendor/nilportugues/sphinx-search/src/NilPortugues/Sphinx/SphinxClient.php');


$cl = new NilPortugues\Sphinx\SphinxClient();
$cl->SetServer( "127.0.0.1", 9312 );


$cl->SetLimits(0,10000);
$search = 'Ноутбук Asus ROG';
$result = $cl->Query($search, 'SC_products');

if ( $result === false ) {
    echo "Query failed: " . $cl->GetLastError() . ".\n";
}
else {
    if ( $cl->GetLastWarning() ) {
        echo "WARNING: " . $cl->GetLastWarning();
    }

    if ( ! empty($result["matches"]) ) {
        foreach ( $result["matches"] as $product => $info ) {
            echo $product."\n";
        }
    }
}

exit;