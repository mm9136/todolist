<?php
$conn = new mysqli("localhost", "root", "", "tasks");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
$out = array('error' => false);
 
$crud = 'read';
$pageNumber = 1;
$pageSize = 4;
 
if(isset($_GET['crud'])){
    $crud = $_GET['crud'];
}
if(isset($_GET['pageNumber'])){
    $pageNumber = $_GET['pageNumber'];
}
if($crud == 'read'){
    $sql="SELECT * FROM tasks LIMIT ".($pageNumber-1)*$pageSize.",".$pageSize;
    $query = $conn->query($sql);
    $tasks = array();
 
    while($row = $query->fetch_array()){
        array_push($tasks, $row);
    }
 
    $out['tasks'] = $tasks;
}
 
if($crud == 'create'){
 
    $taskname = $_POST['taskname'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    if($taskname==''){
		$out['error']=true;
		$out['message']='Failed. All fields are required.';
	}
	elseif($name==''){
		$out['error']=true;
		$out['message']='Failed. All fields are required.';
	}
    elseif($description==''){
		$out['error']=true;
		$out['message']='Failed. All fields are required.';
	}
	else{
        $sql = "insert into tasks (taskname, name, description) values ('$taskname', '$name', '$description')";
        $query = $conn->query($sql);
        
        if($query){
            $out['message'] = "Task Added Successfully";
            // header('Location: ./index.php'); 
        }
        else{
            $out['error'] = true;
            $out['message'] = "Could not add Task";
        }
    } 
}

if($crud == 'update'){
 
    $id = $_POST['id'];
    $taskname = $_POST['taskname'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    if($taskname==''){
		$out['error']=true;
		$out['message']='Failed. All fields are required.';
	}
	elseif($name==''){
		$out['error']=true;
		$out['message']='Failed. All fields are required.';
	}
    elseif($description==''){
		$out['error']=true;
		$out['message']='Failed. All fields are required.';
	}
	else{
        $sql = "update tasks set taskname='$taskname', name='$name', description='$description' where id='$id'";
        $query = $conn->query($sql);
        
        if($query){
            $out['message'] = "Task Updated Successfully";
        }
        else{
            $out['error'] = true;
            $out['message'] = "Could not update Task";
        }
    } 
}


if($crud == 'delete'){
 
    $id = $_POST['id'];
 
    $sql = "delete from tasks where id='$id'";
    $query = $conn->query($sql);
 
    if($query){
        $out['message'] = "Task Deleted Successfully";
        // header('Location: ./index.php'); 
    }
    else{
        $out['error'] = true;
        $out['message'] = "Could not delete Task";
    }
     
}
 
 
$conn->close();
 
header("Content-type: application/json");
header("Refresh:2; url=index.php");
echo json_encode($out);
die();
?>