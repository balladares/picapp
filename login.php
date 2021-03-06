<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cadastro de Usuário</title>
    
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<style type="text/css">
.vcenter {
    margin-top: 10%;
}

.full{
    width: 100%;
}

</style>

</head>

<body>
    
<div class="container">
    <div class="row vcenter">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="well text-center">
                <h1>Cadastro</h1>
                <hr>
                <form id="formLogin">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username"></input>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Senha"></input>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success full" id="btnLogar" >Login</button>
                    </div>
                    <div class="form-group msg-retorno">
                        
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>

</div>

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="scripts/async.js"></script>

</body>

</html

