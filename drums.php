<html ng-app="countryApp">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="qStyles.css">


        <title>Calculate Drums on a Pallet</title>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.1/angular.min.js"></script>
        <script>
            var countryApp = angular.module('countryApp', []);
            countryApp.controller('GuessNumber', function ($scope) {

                $scope.pltWeightOptions = [5, 10, 15, 20, 25, 30, 35, 40, 45, 50];

                $scope.numberDrums = Math.floor((Math.random() * 4) + 1);
                $scope.drumWeight = Math.floor((Math.random() * 200) + 20);
                $scope.palletWeight = $scope.pltWeightOptions[Math.floor(Math.random() * $scope.pltWeightOptions.length)];

                $scope.correctAnswer = ($scope.numberDrums * $scope.drumWeight) + $scope.palletWeight;

                $scope.randomQuestion = function () {
                    $scope.numberDrums = Math.floor((Math.random() * 4) + 1);
                    $scope.drumWeight = Math.floor((Math.random() * 200) + 20);
                    $scope.palletWeight = $scope.pltWeightOptions[Math.floor(Math.random() * $scope.pltWeightOptions.length)];
                    $scope.correctAnswer = ($scope.numberDrums * $scope.drumWeight) + $scope.palletWeight;
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
                <li><a href="/calc/boxes">Boxs</a></li>
                <li><a class="active" href="/calc/drums">Drums</a></li>
            </ul>
            <h2>The load to be moved is pallet stacked with drums.</h2>
            <img src ="http://www.cargorestraintsystems.com.au/wp-content/uploads/2015/06/Palletising-Chemicals-in-Plastic-Drums-Cargo-Restraint-Systems-Pty-Ltd.jpg" style = "max-width: 500px;width: 100%;">
            <ul>
                <li><strong>{{numberDrums}}</strong> drums on a pallet</li>
                <li>Each drum weighs <strong>{{drumWeight}} kg</strong></li>
                <li>The pallet weighs <strong>{{palletWeight}} kg</strong></li>
            </ul>
            <h2>What is the combined weight of the drums and the pallet?</h2>  

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
                <p><strong>Step 1 - Calculate the total weight of the drums</strong></p>
                <p>Number of drums <strong>times</strong> the weight of each drum = Total weight of all drums</p>
                <p>{{numberDrums}} x {{drumWeight}} = {{numberDrums * drumWeight}} </p>

                <p><strong>Step 2 - Add the weight of the pallet to the total weight of the drums</strong></p>
                <p>Total weight of all drums <strong>plus</strong> the weight of the pallet <strong>=</strong> Total combined weight of the drums and the pallet</p>
                <p>{{numberDrums * drumWeight}} + {{palletWeight}} = {{numberDrums * drumWeight + palletWeight}}</p>
            </div>
        </div>
    </body>
</html>