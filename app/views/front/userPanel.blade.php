@if(Auth::guest())
<div class="modal fade bs-modal-sm" tabindex="-1" id="passresetModal" role="dialog" aria-labelledby="accountmodel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{Local::get('close')}}</span></button>
        <h4 class="modal-title" id="myModalLabel">{{Local::get('myaccount')}} </h4>
      </div>
      <div class="modal-body">
        <div id="resetMessage"></div>
        
            <form id='passreset' action="{{action('RemindersController@postReset')}}" method="post" class="form-horizontal">
            <fieldset>
                 <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="email">{{Local::get('email')}}:</label>
              <div class="controls">
                <input required="" name="email" type="text" class="form-control" placeholder="example@example.com" class="input-medium" required="">
              </div>
            </div>       
            <!-- Text input-->
            <div class="control-group">
              <div class="controls">
                <input name="token" class="form-control" type="hidden" placeholder="JoeSixpack" class="input-large" value="{{Session::Get('resetToken')}}">
              </div>
            </div>

            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="password">{{Local::get('new_pass')}}:</label>
              <div class="controls">
                <input id="password" name="password" class="form-control" type="password" placeholder="********" class="input-large">

              </div>
            </div>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="password_confirm">{{Local::get('re_new_pass')}}:</label>
              <div class="controls">
                <input id="reenterpassword" class="form-control" name="password_confirmation" type="password" placeholder="********" class="input-large">
              </div>
            </div>
            
            <br/>
            <!-- Button -->
                <button id="resetsub" class="btn btn-success" type="submit">{{Local::Get('save')}}</button>
            </fieldset>
            </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="loginModel" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#signin" data-toggle="tab">{{Local::get('login')}}</a></li>
              <li class=""><a href="#signup" data-toggle="tab">{{Local::get('register')}}</a></li>
              <li><a href="#forgetPass" data-toggle="tab">{{Local::get('forgetPass')}}</a></li>
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="signin">
         <div id="loginmeg"></div>

            <form action="../user/login" id="login" method="post" class="form-horizontal">
            <fieldset>
            <!-- Sign In Form -->
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="email">{{Local::get('email')}}:</label>
              <div class="controls">
                <input required="" id="userid" name="email" type="text" class="form-control" placeholder="example@example.com" class="input-medium" required="">
              </div>
            </div>

            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="password">{{Local::get('password')}}:</label>
              <div class="controls">
                <input required="" id="passwordinput" name="password" class="form-control" type="password" placeholder="********" class="input-medium">
              </div>
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="control-group">
              <label class="control-label" for="rememberme"></label>
              <div class="controls">
                <label class="checkbox inline" for="rememberme-0">
                  <input type="checkbox" name="rememberme" id="rememberme-0" value="1">
                  {{Local::get('remember')}}
                </label>
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="signin"></label>
              <div class="controls">
                <button id="loginButton" name="signin" class="btn btn-success">{{Local::get('login')}}</button>
              </div>
            </div>
            </fieldset>
            </form>
        </div>
        <div class="tab-pane fade" id="signup">
        <div id="regmessage"></div>
            <form id='registerNew' action="user/register" method="post" class="form-horizontal">
            <fieldset>
            <!-- Sign Up Form -->
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="Email">{{Local::get('email')}}:</label>
              <div class="controls">
                <input id="Email" name="email" class="form-control" type="email" placeholder="JoeSixpack@sixpacksrus.com" class="input-large" required="">
              </div>
            </div>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="name">{{Local::get('name')}}:</label>
              <div class="controls">
                <input id="userid" name="name" class="form-control" type="text" placeholder="JoeSixpack" class="input-large" required="">
              </div>
            </div>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="password">{{Local::get('password')}}:</label>
              <div class="controls">
                <input id="password" name="password" class="form-control" type="password" placeholder="********" class="input-large" required="">
                <em></em>
              </div>
            </div>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="password_confirm">{{Local::get('re_pass')}}</label>
              <div class="controls">
                <input id="reenterpassword" class="form-control" name="password_confirmation" type="password" placeholder="********" class="input-large" required="">
              </div>
            </div>
            
            
            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <button id="regsub" class="btn btn-success" type="submit">{{Local::Get('register')}}</button>
              </div>
            </div>
            </fieldset>
            </form>
      </div>

      <!-- Forget Password -->
       <div class="tab-pane fade" id="forgetPass">
            <em>{{Local::get('password_mail')}}</em>
            <div id="forgetMessage"></div>
            <form action="{{ action('RemindersController@postRemind') }}" method="post" class="form-horizontal" id="forgetPasswordreset">
              <fieldset>


              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4" for="forgetPasswordLabel">{{Local::get('email')}}:</label><div class="col-md-8"></div>
                <div class="col-md-12">
                <input id="forgetPasswordLabel" name="email" placeholder="" class="form-control input-md" required="" type="email">
                  
                </div>
              </div>
              <!--Send Button-->
                <button type="submit" id="forgetButton" class="btn btn-success">{{Local::get('send')}}</button>
              </fieldset>
             </form>


       </div>
       <!-- ./Forget password -->
    </div>
      </div>
      <div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">{{Local::get('close')}}</button>
        </center>
      </div>
    </div>
  </div>
</div>

<!--- Form for redirection --> 
<form id="redirectPage" action="" method="get">
</form>
<script type="text/javascript">
var regmeg = $('#regmessage');
var loginmeg = $('#loginmeg');
var redirectPage = $('#redirectPage');
var forgetButton = $('#forgetButton');
      $('#registerNew').submit(function (ev) {
          ev.preventDefault();
          regmeg.html(' ');
          $('#regsub').toggleClass('disabled');
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (data) {
              if(data==1)
              {
                $('#registerNew').html("<div class='alert alert-success login-success'>{{Local::get('registerSuccess')}}.</div>");

              }
              else
              {
                $('#regsub').toggleClass('disabled');
                var ap = ("<div class='alert alert-danger login-danger'><ul>");
                $.each(data,function(index,value)
                {
                  ap = ap+"<li>"+value+"</li>";
                });
                ap = ap +"</ul></div>";
                regmeg.append(ap);
              }
            }
        });

        ev.preventDefault();
        pages.dataTable().fnDraw();
    });
    $('#login').submit(function(ev)
    {
      var loginButton = $('#loginButton');
      loginmeg.html('');
      ev.preventDefault();
      loginButton.toggleClass('disabled');
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (data) {
              if(data==1)
              {
                redirectPage.attr('action','../');
                redirectPage.submit();
              }
              else
              {
                loginButton.toggleClass('disabled');
                loginmeg.html('<div class="alert alert-danger login-danger">'+data+'</div>');
              }
            }
        });



    });
    $('#forgetPasswordreset').submit(function(ev)
    {
      ev.preventDefault();
      forgetButton.toggleClass('disabled');
      $('#forgetMessage').html('');
      $.ajax({
        type:$(this).attr('method'),
        url:$(this).attr('action'),
        data:$(this).serialize(),
        success: function(data){
          if(data.status == 1 )
            $('#forgetMessage').html("<div class='alert login-success'>"+data.message+"</div>")
          else
            {
              $('#forgetMessage').html("<div class='alert login-danger'>"+data.message+"</div>")
              forgetButton.toggleClass('disabled');
            }
        }
      })
    });
    $('#passreset').submit(function(ev)
    {
      ev.preventDefault();
      forgetButton.addClass('disabled');
      $('#resetMessage').html('');
      $.ajax({
        type:$(this).attr('method'),
        url:$(this).attr('action'),
        data:$(this).serialize(),
        success: function(data){
          if(data == 1 )

            $('#passreset').html("<div class='alert login-success'>{{Local::get('resetSuccess')}}</div>")
          else
            {
              $('#resetMessage').html("<div class='alert login-danger'>"+data+"</div>")
              forgetButton.toggleClass('disabled');
            }
        }
      })
    });
$(function(){
  if(0 != '{{ Session::has("resetToken")?1:0}}')
      $('#passresetModal').modal('show');
});
</script>
@else
<div class="modal fade" tabindex="-1" id="myaccountModel" role="dialog" aria-labelledby="accountmodel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{Local::get('close')}}</span></button>
        <h4 class="modal-title" id="myModalLabel">{{Local::get('myaccount')}} </h4>
      </div>
      <div class="modal-body">
        <div id="editMessage"></div>
        <em>{{Local::get('no_email_change')}}</em>
            <form id='editAcc' action="../user/edit" method="post" class="form-horizontal">
            <fieldset>
            <!-- Sign Up Form -->
            <!-- Text input-->
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="name">{{Local::get('name')}}:</label>
              <div class="controls">
                <input id="userid" name="name" class="form-control" type="text" placeholder="JoeSixpack" class="input-large" required="">
              </div>
            </div>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="password">{{Local::get('new_pass')}}:</label>
              <div class="controls">
                <input id="password" name="password" class="form-control" type="password" placeholder="********" class="input-large">
                <em>{{Local::get('password_change')}}</em>
              </div>
            </div>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="password_confirm">{{Local::get('re_new_pass')}}:</label>
              <div class="controls">
                <input id="reenterpassword" class="form-control" name="password_confirmation" type="password" placeholder="********" class="input-large">
              </div>
            </div>
            
            
            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <button id="editsub" class="btn btn-success" type="submit">{{Local::Get('save')}}</button>
              </div>
            </div>
            </fieldset>
            </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
        $('#editAcc').submit(function (ev) {
          ev.preventDefault();
          $('#editMessage').html('');
          $('#editsub').toggleClass('disabled');
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (data) {
              if(data==1)
              {
                $('#editsub').toggleClass('disabled');
                $('#editMessage').html("<div class='alert alert-success login-success'>{{Local::get('successUpdated')}}.</div>");

              }
              else
              {
                $('#editsub').toggleClass('disabled');
                var ap = ("<div class='alert alert-danger login-danger'><ul>");
                $.each(data,function(index,value)
                {
                  ap = ap+"<li>"+value+"</li>";
                });
                ap = ap +"</ul></div>";
                $('#editMessage').html(ap);
              }
            }
        });

        ev.preventDefault();

    });
</script>
@endif