<div class="jokes index">
    
    <div class="row">
        <div class="span10 offset1  box_shadow box_round sortinglist">
            <div class="span1 label label-info">Sort Jokes</div>
            <div class="span2"><?php echo $this->Paginator->sort('title'); ?></div>
            <div class="span2"><?php echo $this->Paginator->sort('content'); ?></div>        
            <div class="span2"><?php echo $this->Paginator->sort('update_date'); ?></div>
            <div class="span2"><?php echo $this->Paginator->sort('create_date'); ?></div>        
        </div>
    </div>

    <?php $totalJokes = count($jokes); $counter = 0; foreach ($jokes as $joke): ?>
        <?php if($counter%3 == 0): ?>
        <div class="row">
        <?php endif; ?>
            <div class="span4">
                <h2><?php echo $joke['Joke']['title']; ?></h2>
                <p><?php echo $joke['Joke']['content']; ?></p>
                <p>Created By <span class="label label-info" ><?php echo $joke['User']['user']; ?></span></p>
                <p>Created At <span class="label label-info" ><?php echo date("D M j, Y, g:i a", strtotime($joke['Joke']['create_date'])); ?></span></p>
            </div>
        <?php $counter++; if(($counter%3 == 0) || ($totalJokes == $counter)): ?>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>
    
    <div class="row">
        <div class="offset3 span6">
            <div class="mypagination box_shadow box_round">
                <?php echo $this->Paginator->prev('<' . __('prev'), array(), null, array('class' => 'prev disabled', 'title' => '< prev')); ?>&nbsp;&nbsp;
                <?php echo $this->Paginator->numbers(); ?>&nbsp;&nbsp;
                <?php echo $this->Paginator->next(__('next') . '>', array(), null, array('class' => 'next disabled', 'title' => 'next >')); ?>
            </div>
        </div>
    </div>

</div>
