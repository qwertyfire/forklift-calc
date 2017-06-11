<html ng-app="countryApp">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="qStyles.css">


        <title>Calculate Bags of Cement on a Pallet</title>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.1/angular.min.js"></script>
        <script>
            var countryApp = angular.module('countryApp', []);
            countryApp.controller('GuessNumber', function ($scope) {


                $scope.bgWeightOptions = [5, 10, 15, 20, 25, 30, 35, 40, 45, 50];
                $scope.pltWeightOptions = [5, 10, 15, 20, 25, 30, 35, 40, 45, 50];

                $scope.numberBags = Math.floor((Math.random() * 100) + 1);
                $scope.bagWeight = $scope.bgWeightOptions[Math.floor(Math.random() * $scope.bgWeightOptions.length)];
                $scope.palletWeight = $scope.pltWeightOptions[Math.floor(Math.random() * $scope.pltWeightOptions.length)];

                $scope.correctAnswer = ($scope.numberBags * $scope.bagWeight) + $scope.palletWeight;

                $scope.randomQuestion = function () {
                    $scope.numberBags = Math.floor((Math.random() * 100) + 1);
                    $scope.bagWeight = $scope.bgWeightOptions[Math.floor(Math.random() * $scope.bgWeightOptions.length)];
                    $scope.palletWeight = $scope.pltWeightOptions[Math.floor(Math.random() * $scope.pltWeightOptions.length)];
                    $scope.correctAnswer = ($scope.numberBags * $scope.bagWeight) + $scope.palletWeight;
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
                <li><a class="active" href="/calc/bags">Bags</a></li>
                <li><a href="/calc/boxes">Boxs</a></li>
                <li><a href="/calc/drums">Drums</a></li>
            </ul>

            <h2>The load to be moved is bags of cement on a pallet.</h2>
            <img src ="http://previews.123rf.com/images/mipan/mipan1402/mipan140200005/26041006-Forklift-with-cement-sacks-Stock-Photo-cement.jpg" style = "max-width: 500px;width: 100%;">
            <ul>
                <li><strong>{{numberBags}}</strong> bags on a pallet</li>
                <li>Each bag weighs <strong>{{bagWeight}} kg</strong></li>
                <li>The pallet weighs <strong>{{palletWeight}} kg</strong></li>
            </ul>
            <h2>What is the combined weight of the cement bags and the pallet?</h2>  

            <div class="div-color-dark">
                <form ng-submit="checkAnswer()">
                    <label><strong>Your Answer in kg</strong></label>
                    <input type="number" ng-model="inputAnswer">

                    <input type="submit" value="Check Answer">

                    <h3 style = "width: 100%;text-align: center;" ng-model="answerResponse"><strong>{{answerResponse}}</strong></h3>
                </form>
            </div>
            <button ng-show = "answerBtn" class = "button btn-blue" ng-click="showLongSolution()" style = "max-width: 500px;width: 100%;">Show Correct Answer</button>
            <button class = "button btn-black" ng-click="randomQuestion()" style = "max-width: 500px;width: 100%;">Randomize Values</button>
            <div ng-show = "answerSection">
                <h2 ng-model="correctAnswer">The Correct Answer is: {{correctAnswer}} kg</h2>  
                <p><strong>Step 1 - Calculate the total weight of the bags</strong></p>
                <p>Number of bags <strong>times</strong> the weight of each bag = Total weight of all bags</p>
                <p>{{numberBags}} x {{bagWeight}} = {{numberBags * bagWeight}} </p>
                <p><strong>Step 2 - Add the weight of the pallet to the total weight of the bags</strong></p>
                <p>Total weight of all bags <strong>plus</strong> the weight of the pallet <strong>=</strong> Total combined weight of cement bags and the pallet</p>
                <p>{{numberBags * bagWeight}} + {{palletWeight}} = {{numberBags * bagWeight + palletWeight}}</p>
            </div>
        </div>
    </body>
</html>