<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Best Jokes</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Best Jokes" />
        <meta name="author" content="" />

        <!-- Le styles -->
        <link href="<?php echo $this->webroot; ?>css/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo $this->webroot; ?>css/bootstrap-responsive.css" rel="stylesheet" />

        <link href="<?php echo $this->webroot; ?>css/style.css" rel="stylesheet" />

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <link href="<?php echo $this->webroot; ?>css/style_ie.css" rel="stylesheet" />
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="assets/css/twitter-bootstrap/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $this->webroot; ?>images/ico/apple-touch-icon-144-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $this->webroot; ?>images/ico/apple-touch-icon-114-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $this->webroot; ?>images/ico/apple-touch-icon-72-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" href="<?php echo $this->webroot; ?>images/ico/apple-touch-icon-57-precomposed.png" />

    </head>

    <body>

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Best Jokes </a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li class="active"><a href="#">Home</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">

            <!-- Main hero unit for a primary marketing message or call to action -->
            <div class="hero-unit">
                <h1>Best Jokes!</h1>
                <p>Hello, Everyone! Welcome to best jokes.</p>                
            </div>

            <!-- Example row of columns -->
            <?php echo $content_for_layout; ?>
            
            <hr>

            <footer>
                <p> Copyright &copy; 2012 Artomus , All rights reserved</p>
            </footer>

        </div>  




        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
    <!--    <script src="<?php echo $this->webroot; ?>js/jquery.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-transition.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-alert.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-modal.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-dropdown.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-scrollspy.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-tab.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-tooltip.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-popover.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-button.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-collapse.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-carousel.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-typeahead.js"></script>-->

    </body>
</html>
