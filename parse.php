<?php
$parsefile     = $argv[1];

include('simple_html_dom.php');

$file		= file_get_contents($parsefile);
$pages          = repaginate($file);

/*

foreach ($pages as $page) {
	foreach ($page->snippet as $item) {
	
		do_things();
		
	}
}




*/



die();



/*

array (
        id              => 'com.kildarestreet/debate/2010-09-18a.1.0',  # last part is 'a' (revision) . section incremented from 0 for the day (or column #) . speech incremented from 0 within section
        nospeaker       => FALSE,                                       # Optional. Boolean. TRUE if procedural text, absent if not.
        colnum          => '100',                                       # Optional. Oir.ie column number. Numeric (string because never used except as string)
        time            => '12:01:00',                                  # Optional. Time in this format. Yes, using seconds is a bit OTT but there may be video one day
        speakerid       => 'com.kildarestreet/member/6',                # numeric part is *current* member_id from KildareStreet (not person_id, nor oir_personid)
        speakername     => 'Alan Shatter',                              # Name as it appears in the transcript
        speakeroffice   => 'The Minister for Justice',                  # Optional. Title in transcript as it was attached to this speech in the original source
        oral-qnum       => '',                                          # Optional. QNum from order paper
        url             => 'http://oireachtasdebates.oireachtas.ie',    # Optional. Full URL to original location of this speech, including anchor (please urlencode spaces)
        content         => '<p pid="a.1.0/1" qnum="0001/12">Sup?</p>'   # String. qnum attr is question ref if this is a question, else attr not present; 
                                                                        #    Content is >0 paragraphs, each with sequential pid values
*/



function make_speech($properties) {
        
        $speech = "";
        
        #Required attrs
        $attrs   = " id=\"" . $properties["id"] . "\" speakerid=\"" . $properties["speakerid"] . "\" speakername=\"" . $properties["speakername"] . "\"";

        #Optional attrs
        foreach (array('nospeaker','colnum','time','speakeroffice','oral-qnum','url') as $property) {
                if(isset($properties[$property])) {
                        attrs .= " $property=\"" . $properties[$property] . "\"";
                }
        }

        $speech  = "<speech $attrs >\n";
        $speech .= $properties["content"] . "\n";
        $speech .= "</speech>\n\n";
        
        return $speech;

}



function repaginate() {
	return true;
}
	
