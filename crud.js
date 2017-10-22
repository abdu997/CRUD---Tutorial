//Here is we declare the app
var app = angular.module("myapp", []);
    //Here is where declare the controller for the app, an app can have multiply controllers, and based on where the ng-controllers are declared on the html, the fucntions in a particular controller(HTML) will only be recoginzed  in that particular controller. The nice thing baout this is you can the same function names in different controllers, and they will be triggered from the controller that corresponds to them.
    //BEGINNERS READ THIS: fucntion($scope, $http) are the types of functions that can be used in this controller, stay safe and always declare them.
    app.controller("usercontroller", function($scope, $http) {
        //This is Create function in the CRUD process, here its declaring the btnName as "ADD"
        $scope.btnName = "ADD";
        //Javascript functions are basically arguments that contain commands on how the system should react if conditions in the argument are met.
        //For example, inserData() was triggered, if firstname field is null (empty or invalid) then give an alert (Alerts are the pop up boxes that come up),
        // else, means the first if condition was not met, so it skips the alert or whatever mini functions are in if statement.
        $scope.insertData = function() {
            if ($scope.firstname == null) {
                //If the alert you want is a text, use quotation marks, if it is a variable, do not use quotation marks.
                alert("First Name is required");
            } else {
                //This is one of the greatest advantages for using Angular. Angular includes AJAX HTTP. HTTP is 'Hyper Text Transfer Protocol' which allows us to transfer data in between files, which is an integral part of back end development. 
                //$http.post means we are pushing information into a different file, in this case its create.php. After the create.php we construct the JSON data array that will be sent to the php file. Recognise that we are using angular variables that define input fields in the HTML (ng-model)
                //The success after the JSON model, is what happens after the HTTP request is successful from the Angular part, the 'data' in success(function(data) is the information that is  relayed from create.php after the information was pushed. And the commands after the bracket, are commands we wish to carry out if the request was successful.
                $http.post(
                    "create.php", {
                        'firstname': $scope.firstname,
                        'btnName': $scope.btnName,
                        'id': $scope.id
                    }
                ).success(function(data) {
                    $scope.firstname = null;
                    $scope.btnName = "ADD";
                    $scope.displayData();
                });
            }
        }
        
        //Similar to $http.post, $http.get is grabbing information from another file, DATA CAN ONLY BE A STRING OR JSON DATA
        $scope.displayData = function() {
            $http.get("read.php")
                .success(function(data) {
                //As discussed before, success(function(data) gets the that read.php is responding with
                //We then equate it with scope We are using on the HTML 
                    $scope.names = data;
                });
        }
        //SetInterval is javascript function that will trigger a function on interval of time, here ive set it to 500 milliseconds
        //You would usually do this for displaydata like functions to keep relaying accurate and up to date data from read.php
        setInterval(function(){$scope.displayData();}, 500);
        
        //Remeber how a function would include multiple variables (from HTML), these variables are being relayed here as function(id, first_name), the names dont need to match whats on the HTML, it takes the values by order, so first variable will be replaced with id and so on so forth. 
        $scope.updateData = function(id, first_name) {
            $scope.id = id;
            $scope.firstname = first_name;
            $scope.btnName = "Update";
        }
        
        $scope.deleteData = function(id) {
            //Confirm is the same as alert, but will prompt the user with the option to go through with objective.
            if (confirm("Are you sure you want to delete this data?")) {
                $http.post("delete.php", {
                        'id': id
                    })
                    .success(function(data) {
                        $scope.displayData();
                    });
            } else {
                return false;
            }
        }
    });