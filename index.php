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
            'header'=> 'Cookie:'. $_SERVER['HTTP_COOKIE']."\r\n".
                        "User-agent: chrome"."\r\n",

            'ignore_errors' => true,

        )
    )
);
$str = file_get_contents("http://www.livescores.com/",false,$context);
$pq = phpQuery::newDocument($str);
$contents = $pq->find('.content');
echo $contents->html();
?>
</div>
<script
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>
</body>
</html>
