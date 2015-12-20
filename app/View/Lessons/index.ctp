
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
                <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"  ): ?>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?=__('Lessons')?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Lesson'), array('controller' => 'lessons', 'action' => 'add'), array('class' => '')); ?></li> 
                    </ul>
                </div>
                <?php endif ?>

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
                <?php if ($this->Session->read('Auth.User.role') == "admin" ): ?>
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

		<div class="lessons index">
		
			<h2><?php echo __('Lessons'); ?></h2>
			
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('name'); ?></th>
							<th><?php echo $this->Paginator->sort('member_id'); ?></th>
							<?php if ($this->Session->read('Auth.User.active')): ?>
							<th><?php echo $this->Paginator->sort('date'); ?></th>
							<th><?php echo $this->Paginator->sort('fee_amount'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
                                                        <?php endif ?>
						</tr>
					</thead>
					<tbody>
<?php foreach ($lessons as $lesson): ?>
	<tr>
		<td><?php echo h($lesson['Lesson']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($lesson['Member']['first_name'] . " " . $lesson['Member']['last_name'], array('controller' => 'members', 'action' => 'view', $lesson['Member']['id'])); ?>
		</td>
		<?php if ($this->Session->read('Auth.User.active')): ?>
		<td><?php echo h($lesson['Lesson']['date']); ?>&nbsp;</td>
		<td><?php echo h($lesson['Lesson']['fee_amount']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $lesson['Lesson']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                    <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "manager"  ): ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $lesson['Lesson']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $lesson['Lesson']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $lesson['Lesson']['id'])); ?>
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