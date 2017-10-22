<html>
<!--the angular.min.js file must be sourced on the top of any php or html scripts-->
<head>
    <!--This is the Angluar library, you need it to execute angular code, you can source it from other websites by using the link of the script, or you can download it and src it from you local drive-->
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <!--This is the file that contains our App and Controller that contain the codes we need, were sourcing it from our local drive-->
    <script src="crud.js"></script>
</head>

<body>
    <!--Declare the controller and app so that codes and functions from the App and controller get applied into that div exclusively -->
    <!-- ng-init will automatically trigger a function when the script is run no matter what -->
    <div ng-app="myapp" ng-controller="usercontroller" ng-init="displayData()">
        <!--This is the HTML script for the form -->
        <form>
            <label>First Name</label>
            <!--ng-model is the directive that defines this input field in the Angular controller, you'll see it as $scope.firstname-->
            <input type="text" name="first_name" ng-model="firstname">
            <br>
            <!--input type="submit" makes it a button that will execute the form's purpose, ng-click defines which function in the controller will be triggered if submit button was clicked. You'll see it as $scope.insertData = function() in the controller. FUNCTIONS WILL ALWAYS HAVE OPEN AND CLOSED BRACKETS AFTER THE NAME -->
            <input type="submit" name="btnInsert" ng-click="insertData()" value="{{btnName}}">
        </form>
        <br>
        <br>
        <table>
            <tr>
                <th>First Name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <!--Below is an HTML model of how we want the information to be displayed, The ng-repeat directive will multiply the HTML model to as many records of information as supplied inside the $scope.displayData = function(). It will repeat the information inside $scope.names-->
            <!--{{x.first_name}} is a variable for the information we want to display, we call this an ANGULAR EXPRESSION. We place it where we want the first names in our array of data to be placed, SQUIGGLY BRACKETS ARE ONLY USED ON HTML AND NOT INSIDE ANGULAR DIRECTIVES-->
            <tr ng-repeat="x in names">
                <td>{{x.first_name}}</td>
                <td>
                    <!--As we know before, ng-click triggers a function. For this button we are triggering a function that relies on two pieces of data from the names data pool. Think about it like a multivariable, and dual variable functions, dual variable functions like f(x)=x^2 includes values for x, f(x,z)= x^2 + z is a function that would includes values for x and z; if you dont have all the varibales you cannot properly calculate the function, similar to Angular. Since the data for the variables is dynamic, we use the angular expressions (variables). Also, since ng-click is an Angular directive, the angular expressions will not require squiggly brackets.-->
                    <button ng-click="updateData(x.id, x.first_name)">Update</button>
                </td>
                <td>
                    <button ng-click="deleteData(x.id)">Delete</button>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>