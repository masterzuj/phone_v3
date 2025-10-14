<form action="index.php" method="POST">
	<input type="text" name="topic" placeholder="Topic">
	<input type="submit">
</form>

<script>
	console.log("news");
</script>

<div style=' overflow-y: scroll; overflow-x: hidden; height: 730px; font-family: Courier New;'>
<?php
$feed_url = 'https://news.google.com/rss/search?q=news&hl=en&gl=EN&ceid=EN:en';

$topic = trim(htmlspecialchars($_POST["topic"]));

if(isset($topic) && $topic != ""){
	$feed_url = 'https://news.google.com/rss/search?q='.$topic.'&hl=en&gl=EN&ceid=EN:en';
}

$xml = simplexml_load_file($feed_url);

if ($xml) {
    foreach ($xml->channel->item as $item) {
        $title = $item->title;
        $link = $item->link;
        $description = $item->description;
        $pubDate = $item->pubDate;

        echo "<a href='" . $link . "' target='_blank'>" . $title . "</a><br/>";
       // echo "<p>" . $description . "</p>";
        echo "<small>" . date('d.m.Y H:i:s', strtotime($pubDate)) . "</small><br/><br/>";
    }
} else {
    echo "Fehler beim Laden des Feeds.";
}
?>
</div>