<?php
include "inc/dbcon.php";
$output = '';
$result = mysqli_query($conn, "select * from course where class = '".$_POST['id']."' order by course_id desc ");
while ($rowresult = mysqli_fetch_assoc($result))
{
   $output .= '<option value="'.$rowresult['course_id '].'">'.$rowresult['course_name'].'</option>';

}
echo $output;
?>