
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
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Lessons'), array('controller' => 'lessons', 'action' => 'index'), array('class' => '')); ?></li>
                        <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"  ): ?>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Lesson'), array('controller' => 'lessons', 'action' => 'add'), array('class' => '')); ?></li>
                        <?php endif ?>
                    </ul>
                </div>
                <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"  ): ?>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?=__('Lockers')?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        
                <li class="list-group-item"><?php echo $this->Html->link(__('New Locker'), array('controller' => 'lockers', 'action' => 'add'), array('class' => '')); ?></li> 
                    </ul>
                </div>
                <?php endif ?>
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
	
	<div id="page-content" class="col-sm-9">

		<div class="lockers index">
		
			<h2><?php echo __('Lockers'); ?></h2>
            
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
                                                        <?php if ($this->Session->read('Auth.User.active')): ?>
                                                        <th><?php echo $this->Paginator->sort('member_id'); ?></th>
							<th><?php echo $this->Paginator->sort('club_id'); ?></th>
							<th><?php echo $this->Paginator->sort('location'); ?></th>
                                                        <?php endif ?>
							<th><?php echo $this->Paginator->sort('rental_amount'); ?></th>
                                                        <?php if ($this->Session->read('Auth.User.active')): ?>
							<th class="actions"><?php echo __('Actions'); ?></th>
                                                        <?php endif ?>
						</tr>
					</thead>
					<tbody>
<?php foreach ($lockers as $locker): ?>
	<tr>
		<td><?php echo h($locker['Locker']['id']); ?>&nbsp;</td>
                <?php if ($this->Session->read('Auth.User.active')): ?>
                <td><?php 
                    foreach ($locker['Member'] as $member) { 
                        //echo h($event['Id']) . ' '; 
                        echo $this->Html->link($member['first_name'] . ' ' . $member['last_name'], array('controller' => 'members', 'action' => 'view', $member['id'])) . "&nbsp;";
                    } 
                    ?>
                    &nbsp;
                </td>
		<td>
			<?php echo $this->Html->link($locker['Club']['name'], array('controller' => 'clubs', 'action' => 'view', $locker['Club']['id'])); ?>
		</td>
		<td><?php echo h($locker['Locker']['location']); ?>&nbsp;</td>
                <?php endif ?>
		<td><?php echo h($locker['Locker']['rental_amount']); ?>&nbsp;</td>
                <?php if ($this->Session->read('Auth.User.active')): ?>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $locker['Locker']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                    <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"  ): ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $locker['Locker']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $locker['Locker']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $locker['Locker']['id'])); ?>
                    <?php endif ?>
		</td>
                <?php endif ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
			
			<p><small>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
				?>
			</small></p>

			<ul class="pagination">
				<?php
					echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
					echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
			</ul><!-- /.pagination -->
			
		</div><!-- /.index -->
	
	</div><!-- /#page-content .col-sm-9 -->
    

</div><!-- /#page-container .row-fluid -->