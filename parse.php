<?php
$parsefile     = $argv[1];

include('simple_html_dom.php');

$file		= file_get_contents($parsefile);
$pages 	= repaginate($file);

/*

foreach ($pages as $page) {
	foreach ($page->snippet as $item) {
	
		do_things();
		
	}
}




*/



die();

/*

$pages = get_total($url . $pagestring);


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

*/

function repaginate() {
	return true;
}
	
