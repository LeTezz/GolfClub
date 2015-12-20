<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button><!-- /.navbar-toggle -->
		<?php echo $this->Html->Link(__('Curse, Le club de golf'), array(
                                             'controller' => 'members',
                                             'action' => 'index'
            ), array('class' => 'navbar-brand')); ?>
    </div><!-- /.navbar-header -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li class="active">
<?php if ($this->Session->check('Auth.User')) {
                    echo $this->Html->link(__("Hello ") . $this->Session->read('Auth.User.username'), array('controller' => 'users', 'action' => 'view', $this->Session->read('Auth.User.id')));
                    echo "</li><li>";
                    if ($this->Session->read('Auth.User.role') == "admin") {
                        echo $this->Html->link(__("add user"), array(
                            'controller' => 'users',
                            'action' => 'add'));
                    }echo "</li><li>";
                    echo $this->Html->link(__("Logout"), array(
                        'controller' => 'users',
                        'action' => 'logout'));
                    echo "</li><li>";

                    if (!$this->Session->read('Auth.User.active')) {
                        echo $this->Html->link(__('Renvoyer email'), array('controller' => 'users', 'action' => 'send_mail', $this->Session->read('Auth.User.email'), $this->Session->read('Auth.User.username'), $this->Session->read('Auth.User.id')));
                    }    
                } else {
                    echo $this->Html->link(__("Login"), array(
                        'controller' => 'users',
                        'action' => 'login')
                    );
                    echo "</li><li>";
                    echo $this->Html->link(__("Register"), array(
                        'controller' => 'users',
                        'action' => 'register')
                    );
                   echo "</li>";
                }
                echo "</li><li>";
                    echo $this->Html->link(__("A propos"), array(
                        'controller' => 'pages',
                        'action' => 'display' , 'index')
                    );
?></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?=__('Language')?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <?php echo $this->I18n->flagSwitcher(array(
                    'class' => 'languages',
                    'id' => 'language-switcher'
                    )); ?>
                </ul>
            </li>
            <?php 
        echo $this->Html->link( 
        $this->Html->image("dessinAnime2.svg", array('escape' => false, 'height' => '50px'))
        ,"http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "pages/index",array('escapeTitle' => false,'title' => 'Page About'));
?>
          
        </ul><!-- /.nav navbar-nav -->
    </div><!-- /.navbar-collapse -->
</nav><!-- /.navbar navbar-default -->