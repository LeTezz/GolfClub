
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">



            <ul class="list-group">
                
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?= __('Members') ?>
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"): ?>
                            <li class="list-group-item"><?php echo $this->Html->link(__('Edit Member'), array('action' => 'edit', $member['Member']['id']), array('class' => '')); ?> </li>
                            <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Member'), array('action' => 'delete', $member['Member']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $member['Member']['id'])); ?> </li>
                            <?php endif ?>
                            <li class="list-group-item"><?php echo $this->Html->link(__('List Members'), array('action' => 'index'), array('class' => '')); ?> </li>
                            <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"): ?>
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Member'), array('action' => 'add'), array('class' => '')); ?> </li>
                            <?php endif ?>
                        </ul>
                    </div>
                

                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?= __('Clubs') ?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Clubs'), array('controller' => 'clubs', 'action' => 'index'), array('class' => '')); ?></li>
                        <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"): ?>
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Club'), array('controller' => 'clubs', 'action' => 'add'), array('class' => '')); ?></li>
                        <?php endif ?>
                    </ul>
                </div>

                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?= __('Lessons') ?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Lessons'), array('controller' => 'lessons', 'action' => 'index'), array('class' => '')); ?></li>
                        <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"): ?>
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Lesson'), array('controller' => 'lessons', 'action' => 'add'), array('class' => '')); ?></li>
                        <?php endif ?>
                    </ul>
                </div>

                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?= __('Lockers') ?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Lockers'), array('controller' => 'lockers', 'action' => 'index'), array('class' => '')); ?></li>
                        <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"): ?>
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Locker'), array('controller' => 'lockers', 'action' => 'add'), array('class' => '')); ?></li> 
                        <?php endif ?>
                    </ul>
                </div>
                <?php if ($this->Session->read('Auth.User.role') == "admin"): ?>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?= __('Users') ?>
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?></li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?></li> 
                        </ul>
                    </div>
                <?php endif ?>

            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="members view">

            <h2><?php echo __('Member'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Club'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($member['Club']['name'], array('controller' => 'clubs', 'action' => 'view', $member['Club']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('First Name'); ?></strong></td>
                            <td>
                                <?php echo h($member['Member']['first_name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Last Name'); ?></strong></td>
                            <td>
                                <?php echo h($member['Member']['last_name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Phone'); ?></strong></td>
                            <td>
                                <?php echo h($member['Member']['phone']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
                            <td>
                                <?php echo h($member['Member']['email']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Address'); ?></strong></td>
                            <td>
                                <?php echo h($member['Member']['address']); ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Related Lessons'); ?></h3>

            <?php if (!empty($member['Lesson'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                   
                                <th><?php echo __('Name'); ?></th>
                                <th><?php echo __('Date'); ?></th>
                                <th><?php echo __('Fee Amount'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($member['Lesson'] as $lesson):
                                ?>
                                <tr>
                                    
                                    <td><?php echo $lesson['name']; ?></td>
                                    <td><?php echo $lesson['date']; ?></td>
                                    <td><?php echo $lesson['fee_amount']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'lessons', 'action' => 'view', $lesson['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"): ?>
                                            <?php echo $this->Html->link(__('Edit'), array('controller' => 'lessons', 'action' => 'edit', $lesson['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                            <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'lessons', 'action' => 'delete', $lesson['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $lesson['id'])); ?>
        <?php endif ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

<?php endif; ?>

<?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"  ): ?>
            <div class="actions">
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Lesson'), array('controller' => 'lessons', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->
        <?php endif ?>


        <div class="related">

            <h3><?php echo __('Related Lockers'); ?></h3>

<?php if (!empty($member['Locker'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                
                                <th><?php echo __('Location'); ?></th>
                                <th><?php echo __('Rental Amount'); ?></th>
                                <th><?php echo __('Details'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($member['Locker'] as $locker):
                                ?>
                                <tr>
                                    
                                    <td><?php echo $locker['location']; ?></td>
                                    <td><?php echo $locker['rental_amount']; ?></td>
                                    <td><?php echo $locker['details']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'lockers', 'action' => 'view', $locker['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"): ?>
                                            <?php echo $this->Html->link(__('Edit'), array('controller' => 'lockers', 'action' => 'edit', $locker['id']), array('class' => 'btn btn-default btn-xs')); ?>
            <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'lockers', 'action' => 'delete', $locker['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $locker['id'])); ?>
                                <?php endif ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

<?php endif; ?>
               

              <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"  ): ?>
            <div class="actions">
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Locker'), array('controller' => 'lockers', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->
        <br><br>
        <?php endif ?>
         <?php if ($member['Member']['member_image']) echo $this->Html->image($member['Member']['member_image'], array('escape' => false, 'height' => '250px'));?>
 
        


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
