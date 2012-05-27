<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Best Jokes</title>
                
        <!-- All in one META pack -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="description" content="Best Jokes" />
        <meta http-equiv="keywords" content="Best Jokes" />
        <meta name="description" content="Best Jokes" />
        <meta name="copyright" content="Copyright (c) 2012 Artomus. All rights reserved." />
        <meta name="revisit-after" content="1 days" />
        <meta name="robots" content="index, follow" />
        <meta name="googlebot" content="index, follow" />
        <meta http-equiv="Content-Language" content="en" />
        <meta http-equiv="Content-Style-Type" content="text/css" />
        <meta http-equiv="Content-Script-Type" content="text/javascript" />
        <meta name="author" content="ruzdi" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />                     
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
        <!-- /All in one META pack -->        
        <link rel="canonical" href="http://bestjokes.artomus.com/" /> 

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
                    <a class="brand" href="#">Best Jokes Admin</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li class="dropdown active">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Best Jokes <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo $this->webroot; ?>admin/jokes">Best Jokes</a></li>
                                    <li><a href="<?php echo $this->webroot; ?>admin/jokes-add">Adding  A Joke</a></li>                                    
                                </ul>
                            </li>
                            <li class="pull-right"><a href="<?php echo $this->webroot; ?>admin/logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            
            <div class="row">
                <div class="span12">
                    <?php echo $this->Session->flash('welcome'); ?>
                    <?php echo $this->Session->flash('success'); ?>
                    <?php echo $this->Session->flash('warning'); ?>
                    <?php echo $this->Session->flash('error'); ?>   
                </div>
            </div>
            
            <div class="row">
                <div class="span12" >
                    <?php echo $content_for_layout; ?>
                </div>
            </div>
            
<!--            <div class="row">
                <div class="span12" >
                    < ?php echo $this->element('sql_dump'); ?>
                </div>
            </div>-->
            
            

        </div> <!-- /container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo $this->webroot; ?>js/jquery-1.7.2.min.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-dropdown.js"></script>

        <script src="<?php echo $this->webroot; ?>js/bootstrap-transition.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-alert.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-modal.js"></script>

        <script src="<?php echo $this->webroot; ?>js/bootstrap-scrollspy.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-tab.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-tooltip.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-popover.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-button.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-collapse.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-carousel.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap-typeahead.js"></script>

        <script src="<?php echo $this->webroot; ?>layouts/admin/js/admin.js"></script>


    </body>
</html>
