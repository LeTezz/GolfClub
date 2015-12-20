
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			
                        
                        <ul class="list-group">
                            <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?=__('Members')?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index'), array('class' => '')); ?></li> 
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add'), array('class' => '')); ?></li> 
                    </ul>
                </div>
             
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?=__('Clubs')?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Clubs'), array('controller' => 'clubs', 'action' => 'index'), array('class' => '')); ?></li> 
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Club'), array('controller' => 'clubs', 'action' => 'add'), array('class' => '')); ?></li> 
                    </ul>
                </div>

                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?=__('Lessons')?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Lessons'), array('controller' => 'lessons', 'action' => 'index'), array('class' => '')); ?></li> 
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Lesson'), array('controller' => 'lessons', 'action' => 'add'), array('class' => '')); ?></li> 
                    </ul>
                </div>

                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?=__('Lockers')?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        
          <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Locker.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Locker.id'))); ?></li>
				<li class="list-group-item"><?php echo $this->Html->link(__('List Lockers'), array('action' => 'index')); ?></li>
                                <li class="list-group-item"><?php echo $this->Html->link(__('New Locker'), array('controller' => 'lockers', 'action' => 'add'), array('class' => '')); ?></li>
                    </ul>
                </div>
                
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?=__('Users')?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?></li> 
                <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?></li> 
                    </ul>
                </div>
                
            </ul><!-- /.list-group -->
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Edit Locker'); ?></h2>

		<div class="lockers form">
		
			<?php echo $this->Form->create('Locker', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('club_id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('location', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('rental_amount', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('details', array('class' => 'form-control', 'id' => 'autocomplete')); ?>
					</div><!-- .form-group -->
					<div class="form-group">

                                                <?php echo $this->Form->input('Member', array(
                                                            
                                                            'type' => 'select',
                                                            'multiple' => 'checkbox'
                                                          ));?>
                </div><!-- .form-group -->

					<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->

<?php $this->Html->script('View/Lockers/edit', array('inline' => false)); ?>