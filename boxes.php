<html ng-app="countryApp">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="qStyles.css">


        <title>Calculate Box's on a Pallet</title>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.1/angular.min.js"></script>
        <script>
            var countryApp = angular.module('countryApp', []);
            countryApp.controller('GuessNumber', function ($scope) {


                $scope.bxgWeightOptions = [5, 10, 15, 20, 25, 30, 35, 40, 45, 50];
                $scope.pltWeightOptions = [5, 10, 15, 20, 25, 30, 35, 40, 45, 50];

                $scope.boxesPerLayer = Math.floor((Math.random() * 10) + 1);
                $scope.numberLayers = Math.floor((Math.random() * 6) + 1);
                $scope.boxWeight = $scope.bxgWeightOptions[Math.floor(Math.random() * $scope.bxgWeightOptions.length)];
                $scope.palletWeight = $scope.pltWeightOptions[Math.floor(Math.random() * $scope.pltWeightOptions.length)];

                $scope.correctAnswer = ($scope.boxesPerLayer * $scope.numberLayers * $scope.boxWeight) + $scope.palletWeight;

                $scope.randomQuestion = function () {
                    $scope.boxesPerLayer = Math.floor((Math.random() * 10) + 1);
                    $scope.numberLayers = Math.floor((Math.random() * 6) + 1);
                    $scope.boxWeight = $scope.bxgWeightOptions[Math.floor(Math.random() * $scope.bxgWeightOptions.length)];
                    $scope.palletWeight = $scope.pltWeightOptions[Math.floor(Math.random() * $scope.pltWeightOptions.length)];
                    $scope.correctAnswer = ($scope.boxesPerLayer * $scope.numberLayers * $scope.boxWeight) + $scope.palletWeight;

                    $scope.inputAnswer = '';
                    $scope.answerResponse = '';
                    $scope.answerSection = false;
                    $scope.answerBtn = false;
                };
                $scope.checkAnswer = function () {
                    $scope.answerBtn = true;
                    if ($scope.inputAnswer == $scope.correctAnswer) {
                        $scope.answerResponse = $scope.inputAnswer + " kg is Correct!";
                        $scope.inputAnswer = '';
                        //                     answer is correct   
                    }
                    else {
                        $scope.answerResponse = $scope.inputAnswer + " kg is Incorrect!";
                        $scope.inputAnswer = '';
//                        answer is not correct
                    }
                };

                $scope.showLongSolution = function () {
//                    shows and hides the long answer
                    $scope.answerSection = !$scope.answerSection;
                };
                $scope.showLongSolutionAnswer = function () {
                    $scope.answerBtn = !$scope.answerBtn;
                }
            });
        </script>
    </head>
    <body ng-controller="GuessNumber">

        <div class = "div-color centered" style = "max-width: 500px; width: auto;">

            <ul class ="nav">
                <li><a  href="/calc/bags">Bags</a></li>
                <li><a class="active" href="/calc/boxes">Boxs</a></li>
                <li><a href="/calc/drums">Drums</a></li>
            </ul>

            <h2>You are required to move a load consisting of boxes that are stacked on a pallet.</h2>
            <img src ="https://www.colourbox.com/preview/11618187-3d-white-people-stock-boy-stacking-boxes.jpg" style = "max-width: 500px;width: 100%;">
            <ul>
                <li>There are <strong>{{boxesPerLayer}}</strong> boxes per layer</li>
                <li>There are <strong>{{numberLayers}}</strong> layers on the pallet</li>
                <li>Each box weighs <strong>{{boxWeight}} kg</strong></li>
                <li>The pallet weighs <strong>{{palletWeight}} kg</strong></li>
            </ul>
            <h2>What is the combined weight of the boxes and the pallet?</h2>  

            <div class="div-color-dark">
                <form ng-submit="checkAnswer()">
                    <label><strong>Your Answer in kg</strong></label>
                    <input type="number"  ng-model="inputAnswer">

                    <input type="submit" value="Check Answer">

                    <h3 style = "width: 100%;text-align: center;" ng-model="answerResponse"><strong>{{answerResponse}}</strong></h3>
                </form>
            </div>
            <button ng-show = "answerBtn" class = "button btn-blue" ng-click="showLongSolution()" style = "max-width: 500px;width: 100%;">Show Correct Answer</button>
            <button class = "button btn-black" ng-click="randomQuestion()" style = "max-width: 500px;width: 100%;">Randomize Values</button>
            <div ng-show = "answerSection">
                <h2 ng-model="correctAnswer">The Correct Answer is: {{correctAnswer}} kg</h2>  
                <p><strong>Step 1 - Calculate the total number of boxes</strong></p>
                <p>Number of boxes per layer <strong>times</strong> the number of layers = Total number of boxes</p>
                <p>{{boxesPerLayer}} x {{numberLayers}} = {{boxesPerLayer * numberLayers}}</p>

                <p><strong>Step 2 - Calculate the total weight of the boxes</strong></p>
                <p>Number of boxes <strong>times</strong> the weight of each box = Total weight of all boxes</p>
                <p>{{boxesPerLayer * numberLayers}} x {{boxWeight}} = {{boxesPerLayer * numberLayers * boxWeight}}</p>

                <p><strong>Step 3 - Add the weight of the pallet to the total weight of the boxes</strong></p>
                <p>Total weight of all boxes <strong>plus</strong> the weight of the pallet <strong>=</strong> Total combined weight of the boxes and the pallet</p>
                <p>{{boxesPerLayer * numberLayers * boxWeight}} + {{palletWeight}} = {{boxesPerLayer * numberLayers * boxWeight + palletWeight}}</p>

            </div>
        </div>
    </body>
</html>