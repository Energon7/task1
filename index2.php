<html>
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" media="screen" href="main_v1.0.56.css">
<style>
.row{
    margin-left:0;
    margin-right:0;
}
</style>
</head>
<body>
    <div class="container">
        <div class="col-md-6" style="margin:0 auto">
<?php
require_once("phpQuery.php");
$context = stream_context_create(
    array(
        'http' => array(
            'header'=> //'Cookie:'. $_SERVER['HTTP_COOKIE']."\r\n".
                        "User-agent: chrome"."\r\n",

            'ignore_errors' => true,

        )
    )
);
$str = file_get_contents("http://www.livescores.com",false,$context);
$pq = phpQuery::newDocument($str);
$teams = $pq->find('.ply');
$dates = $pq->find('.min');
$scores = $pq->find('.sco');
foreach($teams as $team){
    $all_teams[] = pq($team)->html();
}
foreach($dates as $date){
    $all_dates[] = pq($date)->html();
}
foreach($scores as $score){

    $all_scores[] = strip_tags(pq($score)->html());
}

for($i = 0;$i < count( $all_teams ); $i++){

  if($i%2 == 0){
          $team1[] = $all_teams[$i];
  }
  else{
    $team2[] = $all_teams[$i];
  }

}
for($i = 0; $i < count( $team1 ); $i++) {
  ?>
  <div class="row-gray even">
    <div class="min"><? echo $all_dates[$i]; ?></div>
    <div class="ply tright name"><? echo $team1[$i]; ?></div>
    <div class="sco"><? echo $all_scores[$i]; ?></div>
    <div class="ply name"><? echo $team2[$i]; ?></div>
  </div>
<? } ?>

</div>
<script
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>
</body>
</html>
