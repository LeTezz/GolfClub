
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">
                
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?=__('Clubs')?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Clubs'), array('controller' => 'clubs', 'action' => 'index'), array('class' => '')); ?></li> 
                        <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"  ): ?>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Club'), array('controller' => 'clubs', 'action' => 'add'), array('class' => '')); ?></li>
                        <?php endif ?>
                    </ul>
                </div>

                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?=__('Lessons')?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Lessons'), array('controller' => 'lessons', 'action' => 'index'), array('class' => '')); ?></li>
                        <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"  ): ?>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Lesson'), array('controller' => 'lessons', 'action' => 'add'), array('class' => '')); ?></li>
                        <?php endif ?>
                    </ul>
                </div>

                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?=__('Lockers')?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Lockers'), array('controller' => 'lockers', 'action' => 'index'), array('class' => '')); ?></li>
                        <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"  ): ?>
                <li class="list-group-item"><?php echo $this->Html->link(__('New Locker'), array('controller' => 'lockers', 'action' => 'add'), array('class' => '')); ?></li> 
                <?php endif ?>
                    </ul>
                </div>
                <?php if ($this->Session->read('Auth.User.role') == "admin"): ?>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?=__('Users')?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?></li> 
                <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?></li> 
                    </ul>
                </div>
                <?php endif ?>
                
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->
    <br><br><br><br><br><br>
    <div class="container">
  <div class="jumbotron">
    <p style="text-align:center;"><?php echo $this->Html->image("dessinAnime.svg", array('escape' => false, 'height' => '500px'));?></p>
    <h1>À propos de Club de golf!</h1> 
    <br>
    <p>Dans Membres(Member), si vous modifier ou ajouter un membre vous pouvez y ajouter une image.</p>
    <p>Dans Lecons(Lesson), si vous modifier ou ajouter une lecons vous pouvez y voir les listes dynamiques.</p>
    <p>Dans Casiers(Locker), si vous modifier ou ajouter un casier vous pouvez y voir le auto-complete dans le champ détail. Les choix d'auto-complete sont des couleurs pusique c'est ce que je m'étais toujours dans détail.</p>
    <p>Les utilisateurs(visiteur) cree par Register sont de base pas active. Puisqu'il ne sont pas activé la vu index est presque vide et aucune action n'est disponible pour lui. Si l'utilisateur active sont compte avec email, il a ses droit et vue habituelle. Les utilisateurs(moderateur,admin) cree par admin sont toujours active car l'admin sais ce qu'il fait. </p>
    <p>Si l'on n'est pas connecté, on a les meme droit que visiteur sans active.</p>
    <a href="http://www.databaseanswers.org/data_models/golf_club_management/index.htm">Lien vers le model de base de donnée</a>
    
  </div>
  <img src="http://www.databaseanswers.org/data_models/golf_club_management/images/golf_club_management_dezign.gif">
  <p>Crée par Tristan Santerre.</p> 
  <p>Pour André Pilon.</p>
  <p>420-267 MO Développer un site Web et une application pour Internet.</p> 
  <p>Automne 2015, Collège Montmorency.</p> 
</div>
    

