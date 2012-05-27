<div class="jokes index">
    <h2><?php echo __('Jokes'); ?></h2>
    <table  class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <td colspan="7"><a href="<?php echo $this->webroot.'admin/jokes-add' ?>" class="btn btn-primary pull-right" >Adding A Joke</a></td>
            </tr>
            <tr>
                <td class="pageing-prev">
                    <?php echo $this->Paginator->prev('<' . __('prev'), array(), null, array('class' => 'prev disabled label label-info', 'title' => '< prev')); ?>
                </td>
                <td colspan="5"  class="pageing-text"><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total'))); ?></td> 
                <td class="pageing-next">
                    <?php echo $this->Paginator->next(__('next') . '>', array(), null, array('class' => 'next disabled label label-info', 'title' => 'next >')); ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('content'); ?></th>
                <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                <th><?php echo $this->Paginator->sort('update_date'); ?></th>
                <th><?php echo $this->Paginator->sort('create_date'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jokes as $joke): ?>
                <tr>
                    <td><?php echo h($joke['Joke']['id']); ?>&nbsp;</td>
                    <td><?php echo h($joke['Joke']['title']); ?>&nbsp;</td>
                    <td><?php echo h($joke['Joke']['content']); ?>&nbsp;</td>
                    <td><?php echo h($joke['User']['user']); ?>&nbsp;</td>			
                    <td><?php echo h($joke['Joke']['update_date']); ?>&nbsp;</td>
                    <td><?php echo h($joke['Joke']['create_date']); ?>&nbsp;</td>
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
                <td class="pageing-prev">
                    <?php echo $this->Paginator->prev('<' . __('prev'), array(), null, array('class' => 'prev disabled label label-info', 'title' => '< prev')); ?>
                </td>
                <td colspan="5"  class="pageing-text"><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total'))); ?></td> 
                <td class="pageing-next">
                    <?php echo $this->Paginator->next(__('next') . '>', array(), null, array('class' => 'next disabled label label-info', 'title' => 'next >')); ?>
                </td>
            </tr>

        </tfoot>
    </table>

</div>
