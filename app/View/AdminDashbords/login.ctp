<div class="span6 admin-login form">
    <?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>
    <div class="control-group">
        <h2><?php echo __('Admin Login'); ?></h2>
        <?php echo $this->Form->input('user', array('label'=>__('Username'), 'class' => 'span3', 'placeholder'=> __('Username'))); ?> <br />
        <?php echo $this->Form->input('password', array('label'=>__('Password'),'class' => 'span3', 'placeholder'=> __('Password'))); ?> <br />        
        <?php echo $this->Form->button(__('Login'), array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
        <?php echo $this->Form->end(); ?>
    </div>

</div>