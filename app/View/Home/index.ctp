<div class="jokes index">

    <?php $totalJokes = count($jokes); $counter = 0; foreach ($jokes as $joke): ?>
        <?php if($counter%3 == 0): ?>
        <div class="row">
        <?php endif; ?>
            <div class="span4">
                <h2><?php echo $joke['Joke']['title']; ?></h2>
                <p><?php echo $joke['Joke']['content']; ?></p>
                <p>Created By <span class="label label-info" ><?php echo $joke['User']['user']; ?></span></p>
                <p>Created At <span class="label label-info" ><?php echo $joke['Joke']['create_date']; ?></span></p>
            </div>
        <?php $counter++; if(($counter%3 == 0) || ($totalJokes == $counter)): ?>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>
    
    <div class="row">
        <div class="span12 paginator">
            <?php echo $this->Paginator->prev('<' . __('prev'), array(), null, array('class' => 'prev disabled label label-info', 'title' => '< prev')); ?>&nbsp;&nbsp;
            <?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total'))); ?>&nbsp;&nbsp;
            <?php echo $this->Paginator->next(__('next') . '>', array(), null, array('class' => 'next disabled label label-info', 'title' => 'next >')); ?>
        </div>
    </div>

</div>
