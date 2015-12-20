
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			
                        
                        <ul class="list-group">
                            <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?=__('Members')?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index'), array('class' => '')); ?></li>
                        <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"  ): ?>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add'), array('class' => '')); ?></li>
                        <?php endif ?>
                    </ul>
                </div>
             
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
                        <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"  ): ?>
                        <li class="list-group-item"><?php echo $this->Html->link(__('Edit Lesson'), array('action' => 'edit', $lesson['Lesson']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Lesson'), array('action' => 'delete', $lesson['Lesson']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $lesson['Lesson']['id'])); ?> </li>
                <?php endif ?>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Lessons'), array('action' => 'index'), array('class' => '')); ?> </li>
                <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"  ): ?>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Lesson'), array('action' => 'add'), array('class' => '')); ?> </li>
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
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="lessons view">

			<h2><?php  echo __('Lesson'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($lesson['Lesson']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Member'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($lesson['Member']['first_name'] . " " . $lesson['Member']['last_name'], array('controller' => 'members', 'action' => 'view', $lesson['Member']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($lesson['Lesson']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Date'); ?></strong></td>
		<td>
			<?php echo h($lesson['Lesson']['date']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Fee Amount'); ?></strong></td>
		<td>
			<?php echo h($lesson['Lesson']['fee_amount']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Annee'); ?></strong></td>
		<td>
			<?php echo h($category['Category']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cours choisi'); ?></strong></td>
		<td>
			<?php echo h($lesson['Subcategory']['name']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
