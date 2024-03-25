<style>
    .calendar-heading {
        display: flex;
    justify-content: space-around;
}
a {
    text-decoration: none;
}


</style>
<?php
// include ('../config.php');
$username = $_SESSION['username'];
$email = $_SESSION['email'];
date_default_timezone_set('UTC');
$month = date('n');
$year = date('Y');
$today = date('d-n-Y');
if (isset($_GET['month'])) {
    $month = $_GET['month'];
}
if (isset($_GET['year'])) {
    $year = $_GET['year'];
}
$prev_month = $month - 1;
$prev_year = $year;
if ($prev_month == 0) {
    $prev_month = 12;
    $prev_year--;
}
$next_month = $month + 1;
$next_year = $year;
if ($next_month == 13) {
    $next_month = 1;
    $next_year++;
}
$num_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
$month_names = array(
    1 => 'January',2 => 'February',3 => 'March',4 => 'April',5 => 'May',6 => 'June',
    7 => 'July',8 => 'August',9 => 'September',10 => 'October',11 => 'November',12 => 'December'
);?>
<div class="container calendar-heading">
    <button class="btn btn-success" onclick="loadCalendar(<?php echo $prev_month ?>, <?php echo $prev_year ?>)"><b style="color:black;font-size:20px;"> &laquo; </b></button>&nbsp;&nbsp;&nbsp;
    <h4><?php echo $month_names[$month] . ' ' . $year ?></h4>&nbsp;&nbsp;&nbsp;
    <button class="btn btn-success" onclick="loadCalendar(<?php echo $next_month ?>, <?php echo $next_year ?>)"><b style="color:black;font-size: 20px;"> &raquo; </b></button>
</div><br>
<script>
    function loadCalendar(month, year) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("calendar-container").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "calendar.php?month=" + month + "&year=" + year, true);
        xhttp.send();
    }
</script>
<div class="container">
<?php
echo '<table style="width:90%;margin-left:40px;line-height:40px;"><tr style="background-color:#ccffff;line-height:40px; border:2px solid black;border-radius:10px;font-size: 20px;" class="text-center"><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th><th>Sun</th></tr>';
$day_count = 1;
echo '<tr class="text-center">';
for ($i = 0; $i < 7; $i++) {
    $day_of_week = date('N', strtotime($year.'-'.$month.'-01'));
    if ($i < $day_of_week - 1) {
        echo '<td></td>';
    } 
    else 
    {
        $date = "$year-$month-$day_count";
        $ff=mysqli_query($con,"SELECT * FROM `appointmenttb` where email='$email' and apptime='$date'");
        $rows=mysqli_fetch_assoc($ff);
        $date1 = strtotime($date);
        $date2 = strtotime(date('Y-m-d'));
        $class = '';
        if ($date1 < $date2 ) {
            $class = 'disabled';
        }        
        if($class == 'disabled')
        {
            if($rows['status']=='pending')
            {
            echo '<td><a style="color: red;font-size: 20px;" class="'.$class.'">'.$day_count.'</a></td>';
            }
            else if($rows['status']=='approved')
            {
                echo '<td><a style="color: #FF8000;font-size: 20px;" class="'.$class.'">'.$day_count.'</a></td>';
            }
            else if($rows['status']=='rejected')
            {
                echo '<td><a style="color:black;font-size: 20px;" class="'.$class.'">'.$day_count.'</a></td>';
            }
            else
            {
                echo '<td><a style="color: green;font-size: 20px;" class="'.$class.'">'.$day_count.'</a></td>';
            }
        }
        else
        {
            if($rows['status']=='pending')
            {
            echo '<td><a style="color: red;font-size: 20px;" title="your request for an appoinment is still pending kindly wait for the officer to respond" class="'.$class.'">'.$day_count.'</a></td>';
            }
            else if($rows['status']=='approved')
            {
                echo '<td><a style="color: #FF8000;font-size: 20px;" title="this date means that, your appoinment for this day has been approved by the admin, use view updates button for further updates " class="'.$class.'">'.$day_count.'</a></td>';
            }
            else if($rows['status']=='rejected')
            {
                echo '<td><a style="color:black;font-size: 20px;"  title="this date means that, your appoinment has been rejected "class="'.$class.'">'.$day_count.'</a></td>';
            }
            else
            {
                echo '<td><a style="font-size: 20px;" href="appoint.php?date='.$date.'" class="'.$class.'">'.$day_count.'</a></td>';
            }
            
        }
        $day_count++;
    }
}
echo '</tr>';
while ($day_count <= $num_days) {
    echo '<tr  class="text-center" style="">';
    for ($i = 0; $i < 7; $i++) {
        if ($day_count > $num_days) {
            break;
        }
        $date = "$year-$month-$day_count";
        $ff=mysqli_query($con,"SELECT * FROM `appointmenttb` where email='$email' and apptime='$date'");
        $rows=mysqli_fetch_assoc($ff);
        $date1 = strtotime($date);
        $date2 = strtotime(date('Y-m-d'));
        $class = '';
        if ($date1 < $date2 ) {
            $class = 'disabled';
        }        
        if($class == 'disabled')
        {
            if($rows['status']=='pending')
            {
            echo '<td><a style="color: red;font-size: 20px;" title="your request for an appoinment is still pending kindly wait for the officer to respond" class="'.$class.'">'.$day_count.'</a></td>';
            }
            else if($rows['status']=='approved')
            {
                echo '<td><a style="color: #FF8000;font-size: 20px;" title="this date means that, your appoinment for this day has been approved by the admin, use view updates button for further updates " class="'.$class.'">'.$day_count.'</a></td>';
            }
            else if($rows['status']=='rejected')
            {
                echo '<td><a style="color:black;font-size: 20px;" title="this date means that, your appoinment has been rejected " class="'.$class.'">'.$day_count.'</a></td>';
            }
            else
            {
                echo '<td><a style="color: green;font-size: 20px;" class="'.$class.'">'.$day_count.'</a></td>';
            }
        }
        else
        {
            if($rows['status']=='pending')
            {
            echo '<td><a style="color: red;font-size: 20px;" title="your request for an appoinment is still pending kindly wait for the officer to respond" class="'.$class.'">'.$day_count.'</a></td>';
            }
            else if($rows['status']=='approved')
            {
                echo '<td><a style="color: #FF8000;font-size: 20px;" title="this date means that, your appoinment for this day has been approved by the admin, use view updates button for further updates " class="'.$class.'">'.$day_count.'</a></td>';
            }
            else if($rows['status']=='rejected')
            {
                echo '<td><a style="color:black;font-size: 20px;" title="this date means that, your appoinment has been rejected " class="'.$class.'">'.$day_count.'</a></td>';
            }
            else
            {
                // echo $ss="SELECT * FROM tbl_appoint where requested_user='$user' and requested_date='$date'";
                echo '<td><a style="font-size: 20px;text-decoration: none;" href="appoint.php?date='.$date.'&username='.$username.'" class="'.$class.'">'.$day_count.'</a></td>';
            }
            
        }
        $day_count++;
    }
    echo '</tr>';
}
echo '</table>';
?>
</div>

