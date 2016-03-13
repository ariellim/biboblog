<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $this->fetch('title') ?></title>

    <!-- Bootstrap Core CSS -->
    <?= $this->Html->css('bootstrap.min.css') ?>

    <!-- Custom CSS -->
    <?= $this->Html->css('clean-blog.min.css') ?>

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=$this->Url->build('/')?>">BIBO Blog</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?=$this->Url->build('/')?>">Home</a>
                    </li>
                    <?php
                    if($isloggedin):
                    ?>
                    <li>
                        <a href="<?=$this->Url->build('/users/logout')?>">Logout</a>
                    </li>
                    <?php
                    else:
                    ?>
                    <li>
                        <a href="<?=$this->Url->build('/users/register')?>">Register</a>
                    </li>
                    <li>
                        <a href="<?=$this->Url->build('/users/login')?>">Login</a>
                    </li>
                    <?php
                    endif;
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('<?=$this->Url->build('/')?>img/<?=((!($this->request->params['action']=='view' && $this->request->params['controller']=='Blogs'))?'home':'post')?>-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1><?= $this->fetch('title') ?></h1>
                        <?php
                        if(!($this->request->params['action']=='view' && $this->request->params['controller']=='Blogs')):
                        ?>
                        <hr class="small">
                        <span class="subheading"><?= $this->fetch('description') ?></span>
                        <?php
                        else:
                        ?>
                        <span class="meta">Posted by <?=$this->fetch('author')?> on <?=$this->fetch('date_posted')?></span>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; ARIEL LIM - BIBO BLOG 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <?= $this->Html->script('jquery.js') ?>

    <!-- Bootstrap Core JavaScript -->
    <?= $this->Html->script('bootstrap.min.js') ?>

    <!-- Custom Theme JavaScript -->
    <?= $this->Html->script('clean-blog.min.js') ?>

</body>

</html>
