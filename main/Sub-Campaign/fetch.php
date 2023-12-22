<?php
include '../../connect2.php';
session_start();
if(isset($_SESSION["admin"])) {
  $user=$_SESSION["admin"];
}
if (isset($_GET['user'])) {
       $user= $_GET['user'];}
$limit = '15';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}
 $query = "
SELECT * FROM subcampaign sb
LEFT JOIN campaign c on c.Campaign_Id = sb.SubCampign_CampaigID
";

if($_POST['query'] != '')
{
  $query .= '
 where  student_name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" '
  ;
}
$query .= 'ORDER BY SubCampign_name   ';
$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';
$statement = $con->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $con->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();
$i = 1;
$output = '

<label>Total Records - '.$total_data.'</label>
<table  class="mb-0 table table-hover" >  <tr>
         <thead>
            <tr>
               <th class="text-center">#</th>
               <th >Name</th>
                <th class="text-center">Parent Campaign Name</th>
                <th class="text-center">Status</th>
                <th class="text-center">Description</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>>
';
if($total_data > 0)
{
  foreach($result as $row)
  {
    $output .= '
      <tr>
            <th  class="text-center">'.$i++.'</th>
              <td class="td-name text-left">'.$row["SubCampign_name"].'</td>
              <td class="td-name text-left"><a href="../campaign/details.php?ID='.$row['Campaign_Id'].'&user='.$user.'">'.$row["Campaign_Name"].'</td>
              <td class="td-name text-left">'.$row["SubCampign_active"].'</td>
              <td class="td-name text-left">'.$row["SubCampign_Desc"].'</td>
               <td class="text-center" >  
            <a href="../Sub-Campaign/details.php?ID='.$row['SubCampign_Id'].'&user='.$user.'" class="mb-2 mr-3 btn-icon btn-icon-only btn btn-outline-success" title="details"><i class="pe-7s-box1 btn-icon-wrapper"> </i></a>
            <a href="../Sub-Campaign/downloads.php?ID='.$row['SubCampign_Id'].'&user='.$user.'" class="mb-2 mr-3 btn-icon btn-icon-only btn btn-outline-info" title="print"><i class="pe-7s-print btn-icon-wrapper"> </i></a>
            <a href="../Sub-Campaign/edit.php?ID='.$row['SubCampign_Id'].'&user='.$user.'" class="mb-2 mr-3 btn-icon btn-icon-only btn btn-outline-danger" title="edit"><i class="pe-7s-edit btn-icon-wrapper"> </i></a>
          </td>
                       ';
                        }
                   $output .= '
      </tr>
    ';
$output .= '
</table>
<br />
<div align="center">
  <ul class="pagination">
';
$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';
 }

else
{
  $output .= '
  <tr>
    <td colspan="2" align="center">No Data Found</td>
  </tr>
  ';
}

echo $output;

?>
 