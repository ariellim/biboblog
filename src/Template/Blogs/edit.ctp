<?php
$this->assign('title','Edit Blog Entry');
?>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?= $this->Form->create($blog) ?>
                <fieldset>
                    <legend><?= __('Edit Blog') ?></legend>
                    <div class="form-group"><?= $this->Form->input('title',['class'=>'form-control']) ?></div>
                    <div class="form-group"><?= $this->Form->input('slug',['class'=>'form-control']) ?></div>
                    <div class="form-group"><?= $this->Form->input('content',['class'=>'form-control']) ?></div>
                    <div class="form-group"><?= $this->Form->input('user_id',['options' => $users,'class'=>'form-control']) ?></div>
                </fieldset>
                <?= $this->Form->button(__('Submit'),['class'=>'btn btn-sm btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>