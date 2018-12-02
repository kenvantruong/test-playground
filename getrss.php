<?php

        $html = "";
        $url = "https://answers.yahoo.com/rss/allq?filter=intl&tab=popular";
        $xml = simplexml_load_file($url);
        for($i = 0; $i < 1; $i++){
            
        # Set Variables from RSS
        $description = $xml->channel->item[$i]->description;

        # HTML Format
        $html .= "
        <div>
        </ hr>
            <h5>
            $description
            </h5>
        </div>
        ";
        
        }


        
        echo $html;
        ?>
