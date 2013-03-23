<?php

require 'rss.php';

$url = "http://project.petersever.in/rss/test.rss";
$url = "http://www.dr.dk/p4/fyn/feed/rss.xml";
//$url = "http://ekstrabladet.dk/rss2/?mode=normal";

$rss = new RSS($url);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        
        <title>RSS feed widget</title>
        
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width" />
        
        <link rel="stylesheet" href="rss.css" />

        <style>
            
        </style>

    </head>
    <body>
        <div id="bodycontainer">
            <h1>RSS feed widget</h1>
            
            
            <div id="rss-feed-widget">
                <div class="header">
                    <h1><?php echo $rss->title(); ?></h1>
                    <?php /*<p><a href="<?php echo $rss->link(); ?>" target="__blank"><?php echo $rss->link(); ?></a></p>
                    <p><?php echo $rss->description(); ?></p>  */ ?>
                </div>
                
                <div class="content">
                    <?php foreach ($rss->items(5) as $item): ?>
                    <div class="item">
                        <span class="date"><?php echo $item->date; ?></span><h2 class="title"><a href="<?php echo $item->link; ?>" target="__blank"><?php echo $item->title; ?></a></h2>
                        
                        <p class="desc"><?php echo $item->desc; ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="footer hide">
                    
                </div>
            </div>
          
        </div>
    </body>
</html>