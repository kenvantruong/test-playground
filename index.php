<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/mains.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title"></h1>
                <nav>
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">

                <article>
                <header>
                       
                    </header>

                    <section>
                        <!-- RSS entries go here -->
                    </section>

                </article>

            <!-- Display Content -->
                <aside>
                    <h3>Preview</h3>
                    <div id="rssOutput">Feed data goes here</div>
                </aside>
            </div> <!-- #main -->
       </div> <!-- #main-container -->
       
       <form>

</form>
        
<section style='display: flex; flex-direction: row;' >
        <?php
        $html = "";
        $url = "https://answers.yahoo.com/rss/allq?filter=intl&tab=popular";
        $xml = simplexml_load_file($url);
        for($i = 0; $i < 5; $i++){
            
        # Set Variables from RSS
        $title = $xml->channel->item[$i]->title;
        $title = str_replace("[ Politics ]","",$title);
        $title = str_replace("Open Question :","",$title);
        $link = $xml->channel->item[$i]->link;
        $updated = $xml->channel->item[$i]->pubDate;
        $description = $xml->channel->item[$i]->description;


        # Variable for UID
        $id = $xml->channel->item[$i]->guid;
        $id = str_replace("https://answers.yahoo.com/question/index?qid=","",$id);

            
        // --------------------------------
        # Date & Time Converter -> (Month/Day/Year AM/PM)
        $date = $updated;
        $changedDate = date('m/d/Y h:i a', strtotime($date));
        
        # Random seed
        // $seed = rand(111111,999999);

        # XML Section
        $html .= "
        <a href='$link' target='_blank' onclick='changeColor(\"$id\");'>
            <div id='colorChange' onmouseover='showPreview(\"$id\");' style='border: 1px solid silver;padding: 5px;cursor: pointer; max-width: 251px; padding: 5px; margin: 5px; text-align: center; box-shadow: 7px 11px 5px 0px rgba(125,120,125,1); ' >
                
                    <h6>$changedDate</h6>
                    <h4>$title</h4>
                    <span id='$id' style='display: none; '>$description</span>
                
            </div>
            </a>
        ";
    
        }


        echo $html;
        ?>
     </section>


     <!------- # JAVASCRIPT ------->
     <script>
    function showPreview(id) {
        document.getElementById("rssOutput").innerHTML = document.getElementById(id).innerHTML;
    }

    function changeColor(id) {
        document.getElementById(id).parentNode.style.backgroundColor = "lightGrey";
    }
    </script>




// <!------------------ FOOTER ------------------>
        <div class="footer-container">
            <footer class="wrapper">
                <h3></h3>
            </footer>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/main.js"></script>

    </body>
</html>
