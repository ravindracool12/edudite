<html class="no-js wf-roboto-n1-active wf-roboto-n3-active wf-roboto-n4-active wf-roboto-i4-active wf-roboto-n5-active wf-roboto-n7-active wf-active">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Edudite</title>
        <meta name="description" content="Edudite login page">
        <meta name="keywords" content="edudite">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">

        <!-- google fonts -->
        <script src="node_modules/webfontloader/webfontloader.js" type="text/javascript" async=""></script><script type="text/javascript">
            WebFontConfig = {
                google: { families: [ 'Roboto:100,300,400,400italic,500,700:latin' ] }
            };
            
        </script>

        <!-- Needs images, font... therefore can not be part of main.css -->
        <link rel="stylesheet" href="styles/loader.css">
        <link rel="stylesheet" href="vendors/material-design-icons/iconfont/material-icons.css">
        <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
        <!-- end Needs images -->

            
            <link rel="stylesheet" href="styles/main.css"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,400italic,500,700&amp;subset=latin" media="all">
        <link rel="stylesheet" href="styles/test.css">

    </head>


    <body  id="app" class="app ng-scope body-wide body-auth"  data-ng-class=" { 'layout-boxed': main.layout === 'boxed', 
                            'nav-collapsed-min': main.isMenuCollapsed
          } ">
        <!--[if lt IE 9]>
            <div class="lt-ie9-bg">
                <p class="browsehappy">You are using an <strong>outdated</strong> browser.</p>
                <p>Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            </div>
        <![endif]-->

        <div id="loader-container" style="display: none;"></div>

        <!-- ngInclude:  'app/layout/header.html'  --><header data-ng-include=" 'app/layout/header.html' " id="header" class="header-container ng-scope header-fixed bg-white" data-ng-class="{ 'header-fixed': main.fixedHeader,
                                  'bg-white': ['11','12','13','14','15','16','21'].indexOf(main.skin) >= 0,
                                  'bg-dark': main.skin === '31',
                                  'bg-primary': ['22','32'].indexOf(main.skin) >= 0,
                                  'bg-success': ['23','33'].indexOf(main.skin) >= 0,
                                  'bg-info': ['24','34'].indexOf(main.skin) >= 0,
                                  'bg-warning': ['25','35'].indexOf(main.skin) >= 0,
                                  'bg-danger': ['26','36'].indexOf(main.skin) >= 0
                 }" style=""><header class="top-header clearfix ng-scope">
    <div ui-preloader="" class="preloaderbar hide"><span class="bar"></span></div>

    <!-- Logo -->
    <div class="logo bg-primary" ng-class="{ 'bg-dark': ['11','31'].indexOf(main.skin) >= 0,
                     'bg-white': main.skin === '21',
                     'bg-primary': ['12','22','32'].indexOf(main.skin) >= 0,
                     'bg-success': ['13','23','33'].indexOf(main.skin) >= 0,
                     'bg-info': ['14','24','34'].indexOf(main.skin) >= 0,
                     'bg-warning': ['15','25','35'].indexOf(main.skin) >= 0,
                     'bg-danger': ['16','26','36'].indexOf(main.skin) >= 0 }">
        <a href="#!/">
            <span class="logo-icon material-icons">dashboard</span>
            <span class="logo-text ng-binding">EDUDITE</span>
        </a>
    </div>

    <!-- needs to be put after logo to make it work -->
    <div class="menu-button" toggle-off-canvas="">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </div>   
</header>
</header>

        <div class="main-container" data-ng-class="{ 'app-nav-horizontal': main.menu === 'horizontal' }">
            <!-- ngInclude:  'app/layout/sidebar.html'  -->

            <div id="content" class="content-container">
                <!-- uiView: --><section data-ui-view="" class="view-container animate-fade-up" style=""><div class="page-signin ng-scope" ng-controller="authCtrl">

    <div class="wrapper">
        <div class="main-body">
            <div class="body-inner">
                <div class="card bg-white">
                    <div class="card-content">

                        <section class="logo text-center">
                            <h1><a href="#!/" class="ng-binding">EDUDITE</a></h1>
                        </section>

                        <form class="form-horizontal ng-pristine ng-valid" method="POST" action="/login.php">
                            <fieldset>
                                <div class="form-group">
                                    <div class="ui-input-group">        
                                        <input type="text" required class="form-control">
                                        <span class="input-bar"></span>
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="ui-input-group">        
                                        <input type="password" required class="form-control">
                                        <span class="input-bar"></span>
                                        <label>Password</label>
                                    </div>
                                </div>
                            </fieldset>
                    </div>
                    <div class="card-action no-border text-right">
                    	<input type="submit" value="Sign in" name="login" class="color-primary" style="background: none;border: none;">
                    </div>
                </div>
                        </form>

                <div class="additional-info">
                    <a href="/register.php">Register</a>
                    <span class="divider-h"></span>
                    <a href="/forgotpassword.php">Forgot your password?</a>
                </div>

            </div>
        </div>

    </div>

</div></section>
            </div>

        </div>

        


        <script src="scripts/vendor.js"></script>


        <script src="scripts/ui.js"></script>


        <!-- <script src="scripts/app.js"></script> -->
    

</body></html>