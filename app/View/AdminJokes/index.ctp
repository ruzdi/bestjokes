<div class="jokes index">
    <h2><?php echo __('Jokes'); ?></h2>
    <table  class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                
            </tr>
            <tr>
                <td colspan="7">
                    <?php echo $this->Paginator->prev('<' . __('prev'), array(), null, array('class' => 'prev disabled', 'title' => '< prev')); ?>&nbsp;&nbsp;
                    <?php echo $this->Paginator->numbers(); ?>&nbsp;&nbsp;
                    <?php echo $this->Paginator->next(__('next') . '>', array(), null, array('class' => 'next disabled', 'title' => 'next >')); ?>
                    <a href="<?php echo $this->webroot.'admin/jokes-add' ?>" class="btn btn-primary pull-right" >Adding A Joke</a>
                </td>
            </tr>
            <tr class="sortinglist">
                <th class="span1"><?php echo $this->Paginator->sort('id'); ?></th>
                <th class="span2"><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('content'); ?></th>
                <th class="span1"><?php echo $this->Paginator->sort('user_id'); ?></th>
                <th class="span2"><?php echo $this->Paginator->sort('update_date'); ?></th>
                <th class="span2"><?php echo $this->Paginator->sort('create_date'); ?></th>
                <th class="actions span1"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jokes as $joke): 
                $content = (strlen($joke['Joke']['content'])>100)? substr($joke['Joke']['content'],0,100)."...":$joke['Joke']['content'];
                ?>
                <tr>
                    <td><?php echo h($joke['Joke']['id']); ?>&nbsp;</td>
                    <td><?php echo h($joke['Joke']['title']); ?>&nbsp;</td>
                    <td><?php echo h($content); ?>&nbsp;</td>
                    <td><?php echo h($joke['User']['user']); ?>&nbsp;</td>			
                    <td><?php echo h(date("M j, Y, g:i a", strtotime($joke['Joke']['update_date']))); ?>&nbsp;</td>
                    <td><?php echo h(date("M j, Y, g:i a", strtotime($joke['Joke']['create_date']))); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__(''), array('action' => 'view', $joke['Joke']['id']), array('class' => 'icon-eye-open', 'title' => __('view'))); ?>
                        <?php echo $this->Html->link(__(''), array('action' => 'edit', $joke['Joke']['id']), array('class' => 'icon-pencil', 'title' => __('edit'))); ?>
                        <?php echo $this->Form->postLink(__(''), array('action' => 'delete', $joke['Joke']['id']), array('class' => 'icon-trash', 'title' => __('delete')), __('Are you sure you want to delete # %s?', $joke['Joke']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7">
                    <?php echo $this->Paginator->prev('<' . __('prev'), array(), null, array('class' => 'prev disabled', 'title' => '< prev')); ?>&nbsp;&nbsp;
                    <?php echo $this->Paginator->numbers(); ?>&nbsp;&nbsp;
                    <?php echo $this->Paginator->next(__('next') . '>', array(), null, array('class' => 'next disabled', 'title' => 'next >')); ?>
                    <a href="<?php echo $this->webroot.'admin/jokes-add' ?>" class="btn btn-primary pull-right" >Adding A Joke</a>
                </td>
            </tr>

        </tfoot>
    </table>

</div>
