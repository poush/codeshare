
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Codlax Script Installation | Step 1</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li class="active"><a href="#step-1">
                    <h4 class="list-group-item-heading">Step 1</h4>
                    <p class="list-group-item-text">Mysql Details</p>
                </a></li>
                <li class="disabled"><a href="#step-2">
                    <h4 class="list-group-item-heading">Step 2</h4>
                    <p class="list-group-item-text">Finish</p>
                </a></li>
            </ul>
        </div>
    </div>
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
        <div class="alert alert-danger">
            <strong>Please if possible set your domain document root to public folder inside root of the uploaded folder</strong>
        </div>
            <div class="col-md-12 well text-center">
                <h1> STEP 1</h1>
                <form class="form-horizontal" action="step3.php?update=<?php echo $_GET['update'] ?>" method="post">
                    <fieldset>

                    <!-- Form Name -->
                    <legend>Form Name</legend>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="user">Mysql User</label>  
                      <div class="col-md-6">
                      <input id="user" name="user" placeholder="user name" class="form-control input-md" required="" type="text">
                      <span class="help-block">Enter Username for mysql login</span>  
                      </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="password">Mysql User Password</label>
                      <div class="col-md-6">
                        <input id="password" name="password" placeholder="...." class="form-control input-md" required="" type="password">
                        <span class="help-block">Mysql User Password</span>
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="host">Mysql Host</label>  
                      <div class="col-md-6">
                      <input id="host" name="host" placeholder="localhost" class="form-control input-md" required="" type="text">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="database">Mysql Database</label>  
                      <div class="col-md-6">
                      <input id="database" name="database" placeholder="I am placeholding it ;)" class="form-control input-md" required="" type="text">
                        
                      </div>
                    </div>

                    </fieldset>

                <button type="submit" id="activate-step-2" class="btn btn-primary btn-lg">Step 2</button>
                </form>

            </div>
        </div>
    </div>
</div>
</body>
</html>
