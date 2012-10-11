#!/usr/bin/env php
<?php

/*
     Fetch: 
     
     Usage: php ./fetch.php YYYYMMDD
     
     Gets new-shitey-format Oireachtas debates HTML, 
     removes all markup that's not in #htmldata,
     appends all pages into one file,
     wraps pages in <page num="n"></page>,
     adds some newlines for legibility,
     saves as data/DALYYYYMMDD.html
     
     
     Some PHP functions chosen to avoid memory overload segfaults
     
*/

$parsedate     = $argv[1];
$page           = 1;

include('simple_html_dom.php');

$url            = "http://oireachtasdebates.oireachtas.ie/debates%20authoring/debateswebpack.nsf/takes/dail$parsedate";
$pagestring    = sprintf('%05d', $page);

$pages = get_total($url . $pagestring);

$file = fopen("data/DAL$parsedate.html", 'w');

while ($page < $pages) {
        $pagestring =  sprintf('%05d', $page);
        $current = file_get_html($url . $pagestring);
        // find span tags with id=htmldata
        foreach($current->find('span#htmldata') as $e) {
                fwrite($file,"<page num='$page'>\n");
                fwrite($file,str_replace("<!-- Snippet ","\n<!-- Snippet ",$e->innertext));
                fwrite($file,"\n</page>\n\n\n\n");
                unset ($e);
        }
        $page = $page +1;
        $current->clear();
        unset ($current);
}


fclose($file);



function get_total($url) {
        $data   = file_get_contents($url);
        $split1 = explode("</select> of ",$data);
        $split2 = explode("</span>",$split1[1]);
	unset ($data);
        return $split2[0];
}

