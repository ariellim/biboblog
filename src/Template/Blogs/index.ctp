<?php
$this->assign('title','My Blog for Bibo');
$this->assign('description','A blog app for BIBO Test');
?>		
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <?php
            if($blogs->count()>0):
            ?>
            <?=($isloggedin?$this->Html->link('Add New Post',['action'=>'add'],['class'=>'btn btn-xs btn-primary pull-right']).'<div class="clearfix"></div>':'')?>
            <?php
                foreach($blogs as $blog):
            ?>
                <div class="post-preview">
                    <a href="<?=$this->Url->build(['controller'=>'Blogs','action'=>'view',$blog->slug])?>">
                        <h2 class="post-title">
                            <?=$blog->title?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?=substr($blog->content,0,100).'...'?>
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <?=$blog->user->first_name?> on <?=$blog->created->format('D, M d, Y h:i A')?></p>
                    <?=( $isloggedin ?
                            '<div class="clearfix"></div>'.
                            $this->Html->link('Edit',['action'=>'edit',$blog->id],['class'=>'btn']).
                            $this->Html->link('Delete',['action'=>'delete',$blog->id],['class'=>'btn'])
                            :'')
                    ?>
                </div>
                <hr>
            <?php
                endforeach;
            else:
            ?>
            <center>
            <h2>NO BLOG POSTS FOUND</h2>
            <p>
                <?=($isloggedin?$this->Html->link('Add New Post',['action'=>'add'],['class'=>'btn btn-xs btn-primary']):'Please revisit soon!')?>
            </p>
            </center>
            <?php
            endif;
            ?>
            </div>
        </div>
    </div>