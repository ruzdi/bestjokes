<div class="span8 jokes view">
    <?php echo $this->Form->create('Joke', array('class' => 'form-horizontal')); ?>
    <div class="control-group">
        <h2><?php echo __('View A Joke'); ?></h2>
        <table  class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <td colspan="7"><a href="<?php echo $this->webroot . 'admin/jokes' ?>" class="btn btn-primary pull-right" >Back TO Jokes</a></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th><?php echo __('Id'); ?></th>
                    <td><?php echo h($joke['Joke']['id']); ?>&nbsp;</td>
                </tr>
                <tr>
                    <th><?php echo __('Title'); ?></th>
                    <td><?php echo h($joke['Joke']['title']); ?>&nbsp;</td>
                </tr>
                <tr>
                    <th><?php echo __('Content'); ?></th>
                    <td><?php echo h($joke['Joke']['content']); ?>&nbsp;</td>
                </tr>
                <tr>
                    <th><?php echo __('User'); ?></th>
                    <td><?php echo h($joke['User']['user']); ?>&nbsp;</td>
                </tr>
                <tr>
                    <th><?php echo __('Update Date'); ?></th>
                    <td><?php echo h($joke['Joke']['update_date']); ?>&nbsp;</td>
                </tr>
                <tr>
                    <th><?php echo __('Create Date'); ?></th>
                    <td><?php echo h($joke['Joke']['create_date']); ?>&nbsp;</td>
                </tr>                
            </tbody>
        </table>

    </div>

</div>