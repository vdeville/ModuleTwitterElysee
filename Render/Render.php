<div class="container-fluid">
<?php


function twitter_it($text)
{
    $text= preg_replace("/@(\w+)/", '<a href="http://www.twitter.com/$1" target="_blank"> @$1 </a>', $text);
    $text= preg_replace("/\#(\w+)/", '<a href="https://twitter.com/search?q=$1" target="_blank"> #$1 </a>', $text);
    $text= preg_replace("/(^|[\n ])([\w]*?)((ht|f)tp(s)?:\/\/[\w]+[^ \,\"\n\r\t<;]*)/is", "$1$2<a href=\"$3\">$3</a>", $text);
    $text= preg_replace("/(^|[\n ])([\w]*?)((www|ftp)\.[^ \,\"\t\n\r<;]*)/is", "$1$2<a href=\"http://$3\" >$3 </a>", $text);
    return $text;
}

// Open JSON file and get the data
$content = file_get_contents("../Data/data.json");
$content = json_decode($content);

foreach($content as $x => $y):
//    echo $y->created_at . "    Date création <br />";
//    echo $y->id_tweet . "    ID du tweet <br />";
//    echo $y->text . "    Texte <br />";
//    echo $y->id_tweeter . "   ID Du tweeter <br />";
//    echo $y->name . "   Nom d'affichage <br />";
//    echo $y->screen_name . "    @arobase <br />";
//    echo $y->website_url . "   URL du site  <br />";
//    echo $y->media_id . "   ID Du media <br />";
//    echo $y->media_type . "  Media type <br />";
//    echo $y->media_url . "  Media url <br />";
//    echo $y->profil_image . "  Profil image <br />";
//    echo "<hr>";
    $date = $y->created_at; //DECLARATION VARIABLE DATA
    $jourDate = date("d", strtotime($date)); //JOUR
    $moisDate = date("m", strtotime($date)); //MOIS
    $heureDate = date("H", strtotime($date)); //HEURE
    $newDate = "Le ".$jourDate."/".$moisDate." à ".$heureDate." h"; //NEW FORAT (Le JOUR/MOIS à HEURE)
    ?>
    <div class="col-md-1 col-xs-1 col-lg-1 col-sm-1">
        <img class="img-responsive" src="<?php echo $y->profile_image; ?>">
    </div>
    <div class="col-md-11 col-xs-11 col-lg-11 col-sm-11">
        <div class="row">
            <div class="col-md-4 col-xs-4 col-lg-4 col-sm-4"><p><a target="_blank" href="https://twitter.com/intent/user?screen_name=<?php echo $y->screen_name;?>"><?php echo $y->name . "   @" . $y->screen_name; ?></a></p></div>
            <div class="col-md-offset-6 col-xs-offset-6 col-lg-offset-6 col-sm-offset-6 col-md-2 col-xs-2 col-lg-2 col-sm-2"><?php echo $newDate; ?></div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12"><?php echo twitter_it($y->text); ?></div>
        </div>
        <div class="row">
            <?php if($y->media_url){ ?>
                <a href="">Afficher la photo</a>
                <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                     <img class="img-responsive" src="<?php echo $y->media_url; ?>">
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                <ul class="tweet_share">
                    <li><a href="https://twitter.com/intent/retweet?tweet_id=<?php echo $y->id_tweet; ?>" target="_blank"><i class="fa fa-retweet" data-placement="bottom" data-toggle="tooltip" title="Retweeter" ></i></a></li>
                    <li><a href="https://twitter.com/intent/favorite?tweet_id=<?php echo $y->id_tweet; ?>" target="_blank"><i class="fa fa-star" data-placement="bottom" data-toggle="tooltip" title="Ajotuer aux favoris" ></i></a></li>
                    <li><a href="https://twitter.com/intent/tweet?in_reply_to=<?php echo $y->id_tweet; ?>" target="_blank"><i class="fa fa-reply" data-placement="bottom" data-toggle="tooltip" title="Répondre aux tweets" ></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <br />
    <?php
endforeach;
?>
</div>