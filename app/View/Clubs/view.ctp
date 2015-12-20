
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
                        <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $club['Club']['user_id']  ): ?>
                        <li class="list-group-item"><?php echo $this->Html->link(__('Edit Club'), array('action' => 'edit', $club['Club']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Club'), array('action' => 'delete', $club['Club']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $club['Club']['id'])); ?> </li>
                <?php endif ?>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Clubs'), array('action' => 'index'), array('class' => '')); ?> </li>
                <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"  ): ?>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Club'), array('action' => 'add'), array('class' => '')); ?> </li>
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
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="clubs view">

			<h2><?php  echo __('Club'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($club['Club']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Year Established'); ?></strong></td>
		<td>
			<?php echo h($club['Club']['year_established']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Address'); ?></strong></td>
		<td>
			<?php echo h($club['Club']['address']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Details'); ?></strong></td>
		<td>
			<?php echo h($club['Club']['details']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Related Lockers'); ?></h3>
				
				<?php if (!empty($club['Locker'])): ?>
					
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
										foreach ($club['Locker'] as $locker): ?>
		<tr>
			
			<td><?php echo $locker['location']; ?></td>
			<td><?php echo $locker['rental_amount']; ?></td>
			<td><?php echo $locker['details']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'lockers', 'action' => 'view', $locker['id']), array('class' => 'btn btn-default btn-xs')); ?>
                            <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"  ): ?>
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
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Locker'), array('controller' => 'lockers', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->
                        <?php endif ?>

					
			<div class="related">

				<h3><?php echo __('Related Members'); ?></h3>
				
				<?php if (!empty($club['Member'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Address'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($club['Member'] as $member): ?>
		<tr>
			
			<td><?php echo $member['first_name']; ?></td>
			<td><?php echo $member['last_name']; ?></td>
			<td><?php echo $member['phone']; ?></td>
			<td><?php echo $member['email']; ?></td>
			<td><?php echo $member['address']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'members', 'action' => 'view', $member['id']), array('class' => 'btn btn-default btn-xs')); ?>
                            <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"  ): ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'members', 'action' => 'edit', $member['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'members', 'action' => 'delete', $member['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $member['id'])); ?>
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
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Member'), array('controller' => 'members', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->
                        <?php endif ?>

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
