<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>線上月曆</title>
    <style>
        .table{
            width:560px;
            height:560px;
            /* border:1px solid green; */
            display:flex;
            flex-wrap:wrap;
            align-content: baseline;
            margin-left:1px;
            margin-top:1px;
        }

        .table div{
            display:inline-block;
            width:80px;
            height:80px;
            border:1px solid #999;
            box-sizing: border-box;
            margin-left:-1px;
            margin-top:-1px;
        }
        .table div.header{
            background:black;
            color:white;
            height: 32px;;
        }
        .weekend{
            background:pink;
        }
        .workday{
            background:white;
        }
        .today{
            background:lightseagreen;
        }
    </style>
</head>
<body>
    <h1>使用陣列來做月曆</h1>
<?php
$month=2;


$firstDay=date("Y-").$month."-1";
$firstWeekday=date("w",strtotime($firstDay));
$monthDays=date("t",strtotime($firstDay));
$lastDay=date("Y-").$month."-".$monthDays;
$today=date("Y-m-d");
$lastWeekday=date("w",strtotime($lastDay));
$dateHouse=[];

for($i=0;$i<$firstWeekday;$i++){
    $dateHouse[]="";
}

for($i=0;$i<$monthDays;$i++){
    $date=date("Y-m-d",strtotime("+$i days",strtotime($firstDay)));
    $dateHouse[]=$date;
}

for($i=0;$i<(6-$lastWeekday);$i++){
    $dateHouse[]="";
}

?>

<div class="table">
<div class='header'>日</div>
<div class='header'>一</div>
<div class='header'>二</div>
<div class='header'>三</div>
<div class='header'>四</div>
<div class='header'>五</div>
<div class='header'>六</div>
<?php
foreach($dateHouse as $k => $day){
    $hol=($k%7==0 || $k%7==6)?'weekend':"";
    
    if(!empty($day)){
        $dayFormat=date("j",strtotime($day));
        echo "<div class='{$hol}'>{$dayFormat}</div>";
    }else{
        echo "<div class='{$hol}'></div>";

    }
}

?>
</div>



</body>
</html>