<div class="span8 jokes form">
    <?php echo $this->Form->create('Joke', array('class' => 'form-horizontal')); ?>
    <div class="control-group">
        <h2><?php echo __('Edit A Joke'); ?></h2>
        <?php echo $this->Form->input('id'); ?> <br />
        <?php echo $this->Form->input('title', array('class' => 'span6')); ?> <br />
        <?php echo $this->Form->input('content', array('class' => 'span6')); ?> <br />
        <?php echo $this->Form->button(__('Cancel'), array('type' => 'button', 'class' => 'btn btn-primary', 'onclick' => 'backToPreviousPage()')); ?>
        <?php echo $this->Form->button(__('Submit'), array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
        <?php echo $this->Form->end(); ?>
    </div>

</div>

<script type="text/javascript">
    var backToPreviousPage = function(){
        window.location = '<?php echo $this->webroot . 'admin/jokes'; ?>';
    }
</script>