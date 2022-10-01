<?php 
    require_once "include/header.php";
?>


<?php 
    require_once "include/header.php";
?>
<html>
<body>
<style>
{background-color:whitesmoke;
}{
width:50%;
height:10%;
border:1px;
border-radius:05px;
padding:8px 15px 8px 15px;
margin: 10px 0px 15px 0px;
box-shadow:1px 1px 2px 1px grey;</style>
</html>
<?php 
 
//  database connection
require_once "../connection.php";

$sql = "SELECT * FROM employee";
$result = mysqli_query($conn , $sql);

$i = 1;
$you = "";


?>

<style>
table, th, td {
  border: 1px solid black;
  padding: 15px;
}
table {
  border-spacing: 10px;
}
</style>

<div class="container bg-white shadow">
    <div class="py-4 mt-5"> 
    <div class='text-center pb-2'><h4>Manage Employees</h4></div>
    <table style="width:100%" class="table-hover text-center ">
    <tr class="bg-dark">
        <th>S.No.</th>
        <th>Employee Id</th>
        <th>Name</th>
        <th>Email</th> 
        <th>Gender</th>
        <th>Date of Birth</th>
        <th>Age</th>
        <th>Action</th>
    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $name= $rows["name"];
            $email= $rows["email"];
            $dob = $rows["dob"];
            $gender = $rows["gender"];
            $id = $rows["id"];
            if($gender == "" ){
                $gender = "Not Defined";
            } 
            ?>
        <tr>
        <td><?php echo "{$i}."; ?></td>
        <td><?php echo $id; ?></td>
        <td> <?php echo $name ; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $gender; ?></td>
        <td><?php echo $dob; ?></td>
        <td><?php if( $dob != "Not Defined"){  
                                                    $date1=date_create($dob);
                                                    $date2=date_create("now");
                                                    $diff=date_diff($date1,$date2);
                                                    echo $diff->format("%y Years"); }?> 
        <td>  <?php 
                $edit_icon = "<a href='edit-employee.php?id= {$id}' class='btn-sm btn-primary float-right ml-3 '> <span ><i class='fa fa-edit '></i></span> </a>";
                $delete_icon = " <a href='delete-employee.php?id={$id}' id='bin' class='btn-sm btn-primary float-right'> <span ><i class='fa fa-trash '></i></span> </a>";
                echo $edit_icon . $delete_icon;
             ?> 
        </td>

      
        

    <?php 
            $i++;
            }
        }else{
            echo "<script>
            $(document).ready( function(){
                $('#showModal').modal('show');
                $('#linkBtn').attr('href', 'add-employee.php');
                $('#linkBtn').text('Add Employee');
                $('#addMsg').text('No Employees Found!');
                $('#closeBtn').text('Remind Me Later!');
            })
         </script>
         ";
        }
    ?>
     </tr>
    </table>
    </div>
</div>
</body>

<?php 
    require_once "include/footer.php";
?>

<?php 
    require_once "include/footer.php";
?>