<div class="container-fluid-full">
    <div class="row-fluid">
        <div class="row-fluid">
            <div class="login-box">
                <div class="icons">
                    <a href="index.html"><i class="halflings-icon home"></i></a>
                    <a href="#"><i class="halflings-icon cog"></i></a>
                </div>

                @if(session('message'))
                    <div class="alert alert-danger">
                        <span>{{session('message')}}</span>
                    </div>
                    <?php Session::put('message', null); ?>
                @endif

                <h2>Login to your account</h2>
                <form class="form-horizontal" action="{{url('/admin-dashboard')}}" method="post">
                    {{csrf_field()}}
                    <fieldset>
                        <div class="input-prepend" title="Email">
                            <span class="add-on"><i class="halflings-icon user"></i></span>
                            <input class="input-large span10" name="admin_email"  type="text" placeholder="type email address"/>
                        </div>
                        <div class="clearfix"></div>

                        <div class="input-prepend" title="Password">
                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                            <input class="input-large span10" name="admin_password" id="password" type="password" placeholder="type password"/>
                        </div>
                        <div class="button-login">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="clearfix"></div>
                </form>
                <hr>
                <h3>Forgot Password?</h3>
                <p>
                    No problem, <a href="#">click here</a> to get a new password.
                </p>
            </div><!--/span-->
        </div><!--/row-->


        </div><!--/.fluid-container-->

    </div><!--/fluid-row-->
