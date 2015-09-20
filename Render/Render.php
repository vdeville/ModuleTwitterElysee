<!-- Optional theme -->
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="styleModuleTwitter.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
<meta charset="UTF-8">
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
            <?php if($y->medial_url != ""){
                ?>
                <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                    <img class="img-responsive" src="<?php echo $y->media_url; ?>">
                </div>
            <?php } ?>
            <?php echo $y->media_url; ?>
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
    <br />
    <br /> <!-- Temporaire BR IS IN THE PLACE-->
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <?php
endforeach;
?>
    </div>
<div style="display: block;" id="tweet_<?php echo $y->id_tweeter; ?>" class="tweet block social twitter"
     data-id="<?php echo $y->id_tweeter; ?>">
    <div class="left">
        <img alt="" src="http://pbs.twimg.com/profile_images/461155610780639232/85wihRrQ.jpeg" width="35"
             height="35">
    </div>
    <div class="right block-content">
        <span class="name"><a title="Voir le compte Twitter de Philippe Nauche (nouvelle fenêtre)"
                              href="https://twitter.com/intent/user?screen_name=<?php echo $y->screen_name; ?>"
                              target="_blank">Philippe Nauche @PhilippeNauche</a></span>
        <div id="tweettext_<?php echo $y->id_tweet; ?>" class="tweet-text">
            <a class="twitter-atreply" title="Voir le compte Twitter de François Hollande (nouvelle fenêtre)"
               href="http://twitter.com/<?php echo $y->screen_name; ?>" rel="nofollow" target="_blank"
               data-screen-name="fhollande">@fhollande</a> <a class="twitter-atreply"
                                                              title="Voir le compte Twitter de Élysée (nouvelle fenêtre)"
                                                              href="http://twitter.com/Elysee" rel="nofollow"
                                                              target="_blank" data-screen-name="Elysee">@Elysee</a>
            répond aux journalistes à la centrale photovoltaïque de Gros-Chastang <a class="twitter-hashtag"
                                                                                     title="Voir les tweets sur #Corrèze (nouvelle fenêtre)"
                                                                                     href="http://twitter.com/#!/search?q=%23Corr%C3%A8ze"
                                                                                     rel="nofollow" target="_blank">#Corrèze</a>
            <a class="twitter-hashtag" title="Voir les tweets sur #directPR (nouvelle fenêtre)"
               href="http://twitter.com/#!/search?q=%23directPR" rel="nofollow" target="_blank">#directPR</a>
        </div>
        <div class="post">
            <!--            DATE DU TWEET QUI RENVOI SUR LE TWEET -->
            <a title="" href="https://twitter.com/<?php echo $y->screen_name . '/status/' . $y->id_tweet; ?>"
               target="_blank"><?php echo $y->created_at; ?></a></div>
        <?php if($y->medial_url != ""){
            ?>
            <div style="height: 193.5px;" class="media-wrapper" role="button" tabIndex="0">
                <img class="expendable" title="Cliquez sur cette photo pour la voir en entier"
                     alt="Cliquez sur cette photo pour la voir en entier" src="<?php echo $y->media_url; ?>">
            </div>
        <?php } ?>
        <div class="share twitter-share">
            <ul>
                <li class="first">
                    <a title="Répondre à ce tweet (nouvelle fenêtre)"
                       href="https://twitter.com/intent/tweet?in_reply_to=<?php echo $y->id_tweet; ?>&amp;related=fhollande,elysee,elysee_com"
                       target="_blank">
                        <img role="img" aria-describedby="tweettext_<?php echo $y->id_tweet; ?>"
                             alt="Répondre à ce tweet (nouvelle fenêtre)"
                             src="/elysee/images/blocks/pictos/tw_answer.svg" width="20" height="12">
                    </a>
                </li>
                <li>
                    <a title="Retweeter ce tweet (nouvelle fenêtre)"
                       href="https://twitter.com/intent/retweet?tweet_id=<?php echo $y->id_tweet; ?>&amp;related=fhollande,elysee,elysee_com"
                       target="_blank">
                        <img role="img" aria-describedby="tweettext_<?php echo $y->id_tweet; ?>"
                             alt="Retweeter ce tweet (nouvelle fenêtre)"
                             src="/elysee/images/blocks/pictos/tw_retweet.svg" width="22" height="14">
                    </a>
                    <span class="number"><span class="screenreader_visible">retweet</span></span>
                </li>
                <li class="last">
                    <a title="Ajouter ce tweet à ses favoris (nouvelle fenêtre)"
                       href="https://twitter.com/intent/favorite?tweet_id=<?php echo $y->id_tweet; ?>&amp;related=fhollande,elysee,elysee_com"
                       target="_blank">
                        <img role="img" aria-describedby="tweettext_<?php echo $y->id_tweet; ?>"
                             alt="Ajouter ce tweet à ses favoris (nouvelle fenêtre)"
                             src="/elysee/images/blocks/pictos/tw_star.svg" width="17" height="16">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>