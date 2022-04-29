<h2>使用陣列來做月曆</h2>
<!-- 先用陣列計算出需要多少格數 -->
<!-- 再來製作出表格 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>線上月曆</title>
    <style>
        table{
            border-collapse: collapse;
            font-family: '標楷體';
        }
        table td{
            padding: 20px;
            text-align: center;
            border: 1px solid lightgrey;
        }
        .top{
            background-color: lightgoldenrodyellow;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
    $month=5;
    


    ?>
    <table>
        <tr>
            <td class="top">日</td>
            <td class="top">一</td>
            <td class="top">二</td>
            <td class="top">三</td>
            <td class="top">四</td>
            <td class="top">五</td>
            <td class="top">六</td>
        </tr>
        <?php 
        
        $firstDay=date("Y-").$month."-1";
        $firstWeekday=date("w",strtotime($firstDay));
        $monthDays=date("t",strtotime($firstDay));
        $lastDay=date("Y-").$month."-".$monthDays;
        $today=date("Y-m-d");

        /* 先設定一個空陣列 */
        /* 再用for迴圈去運算出當月所有日期 */
        $dateHouse=[];
        for($i=0;$i<$monthDays;$i++){
            $date=date("Y-m-d",strtotime("+$i days",strtotime($firstDay)));
            $dateHouse[]=$date;
        }
        
        echo "<pre>";
        print_r($dateHouse);
        echo "</pre>";

        echo $month."月份";
        echo "<br>";
        echo "第一天是".$firstDay;
        echo "<br>";
        echo "第一天是星期".$firstWeekday;
        echo "<br>";
        echo "最後一天是".$lastDay;
        echo "<br>";
        echo "當月天數共".$monthDays."天";
        echo "<br>";

        for($i=0;$i<6;$i++){
            echo "<tr>";
            for($j=0;$j<7;$j++){
                $d=$i*7+($j+1)-$firstWeekday-1;
                
                if($d>=0 && $d<$monthDays){ 
                    $fs=strtotime($firstDay);
                    $shiftd=strtotime("+$d days",$fs);
                    $date=date("j",$shiftd);
                    $w=date("w",$shiftd);
                    if($w==0 || $w==6){
                        echo "<td style='color:red'>";
                    }else{
                        echo "<td>";
                    }
                    echo $date;
                    echo "</td>";
                }else{
                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>