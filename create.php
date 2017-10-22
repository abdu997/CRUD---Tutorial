<?php
//always include the connection variable, on the top of script if you wish to communicate with the database.
include("connect.php");
//The $data variable defines the data that is being recieved from the Angular
$data = json_decode(file_get_contents("php://input"));
//Similar to javascript functions, php uses the same philosophy and logic, where arguments use if, else and else if conditions
//Here we are setting the first condition to be count($data) > 0 which means if the amount of data is more than 0 then carry on with the function
if (count($data) > 0) {
    //This learnign technique is a bit unique for web dev, but you're going to have learn this backwards. $data->firstname means we are grabbing a string from the $data varibale where the key is 'firstname'.
    //mysqli_real_escape_string($connect is security a measure, we have to make sure the data the user is pushing is not a command that would alter the database. People can alter a database by pushing MySQL lines like the one below in $query 
    $first_name = mysqli_real_escape_string($connect, $data->firstname);
    $btn_name   = $data->btnName;
    
    if ($btn_name == "ADD") {
        //$query is MySQL query, INSERT INTO table name(the columns in table) VALUES(the varibales and strings that will placed into the columns, the get inserted respective to the order of columns in the bracket after the table name)
        $query = "INSERT INTO tbl_user(first_name) VALUES ('$first_name')";
        //mysqli_query($connect, $query) is the condtion where the $query was successful, While using mysqli you will have to also include the connection variable.
        if (mysqli_query($connect, $query)) {
            //echo is the information that will be relayed back to the angular as 'data'.
            echo "Data Inserted...";
        } else {
            echo 'Error';
        }
    }
    
    //Here it checks if the btnName string is equal to update, if it does statisfy that condition, then it will run and UPDATE script to update the record
    if ($btn_name == 'Update') {
        $id    = $data->id;
        //WHERE id = '$id', is checking the id of the record you are updating 
        $query = "UPDATE tbl_user SET first_name = '$first_name' WHERE id = '$id'";
        if (mysqli_query($connect, $query)) {
            echo 'Data Updated...';
        } else {
            echo 'Error';
        }
    }
}
?>  