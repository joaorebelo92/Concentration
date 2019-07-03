<!DOCTYPE html>
<html ng-app="mymodal">
    <head>
        <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet"></link>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script>
            $(function() {$( "#tabs" ).tabs();});
        </script>
        <title>Laravel</title>
    </head>
    <body>
        <div ng-controller="AppController">
            @{{word}}
            <div class="main_menu">
                @if(!Auth::guest())
                <div class="text-right" id="user" data-idUser="{{ Auth::user()->id }}">
                    <strong> {{ Auth::user()->nickname }} </strong>
                    <a href=" {{ url('auth/logout') }} ">
                        <button type="buton">Logout</button>
                    </a>
                </div>
                @endif
            </div>
            @yield('content')
            @yield('footer')
        </div>
        
        <?php if (isset($includeSocketIO)): ?>
            <script src="https://cdn.socket.io/socket.io-1.2.0.js"></script> 
        <?php endif; ?>

        <script>


            var serverUrl = 'grp08.dad:3000';
            var socket = io.connect(serverUrl);
            $('form').submit(function(){
                socket.emit('chat message', $('#m').val());
                $('#m').val('');
                return false;
            });



            

            var module = angular.module('mymodal', []);
            module.controller('AppController', ['$scope', function($scope) {
                $scope.games = [];
                $scope.word = "ola";

                socket.on('refreshGame', function(game){
                    $scope.games[game.gameId] = game;
                    $('#gameTable').append($('<p>').text($scope.games[game.gameId]));
                });

                socket.on('chat message', function(msg){
                    $('#messages').append($('<li>').text(msg));
                });

            /*
            $('form').submit(function(){
                socket.emit('startGame', $('#numberLine').val(),$('#numberCols').val(),$('#type').val());
                return false;
            });*/
            

                $scope.startGame = function() {
                    $scope.endGameMessage = '';
                    socket.emit("startGame", $('#numberLine').val(), 
                        $('#numberCols').val(), 
                        $('#user').attr("data-idUser"), 
                        $('#type').val());
                };
            }]);
        </script>
    </body>
</html>
