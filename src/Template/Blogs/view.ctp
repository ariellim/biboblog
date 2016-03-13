<?php
$this->assign('title',$blog->title);
$this->assign('author',$blog->user->first_name);
$this->assign('date_posted',$blog->created->format('D, M d, Y h:i A'));
?>		
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <?=$blog->content?>
                    <?=( $isloggedin ?
                            '<div class="clearfix"></div>'.
                            $this->Html->link('Edit',['action'=>'edit',$blog->id],['class'=>'btn']).
                            $this->Html->link('Delete',['action'=>'delete',$blog->id],['class'=>'btn'])
                            :'')
                    ?>
                    
                    <div class="related">
                        <h4><?= __('Related Comments') ?></h4>
                        <?= $this->Form->create(NULL,['url'=>'#end']) ?>
                        <fieldset>
                            <legend><?= __('Add Comment') ?></legend>
                            <div class="form-group"><?= $this->Form->input('content',['class'=>'form-control','label'=>'Comment']) ?></div>
                        </fieldset>
                        <?= $this->Form->button(__('Submit Comment'),['class'=>'btn btn-sm btn-default']) ?>
                        <?= $this->Form->end() ?>
                        
                        <?php if (!empty($blog->comments)): ?>
                            <?php foreach ($blog->comments as $comments): ?>
                            <p>
                                <?= h($comments->content) ?><br />
                                <small>Date: <?= h($comments->created->format('D, M d, Y h:i A')) ?></small>
                            </p>
                            <?php endforeach; ?>
                        <?php endif; ?>
                            <a name="end"></a>
                    </div>                    
                </div>
            </div>
        </div>
    </article>

