<?php
$this->assign('title','User Registration');
?>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                <div class="users form">
                <?= $this->Form->create($user) ?>
                    <fieldset>
                        <legend><?= __('Add User') ?></legend>
                        <div class="form-group"><?= $this->Form->input('username',['class'=>'form-control']) ?></div>
                        <div class="form-group"><?= $this->Form->input('password',['class'=>'form-control']) ?></div>
                        <div class="form-group"><?= $this->Form->input('email_address',['class'=>'form-control']) ?></div>
                        <div class="form-group"><?= $this->Form->input('first_name',['class'=>'form-control']) ?></div>
                        <div class="form-group"><?= $this->Form->input('last_name',['class'=>'form-control']) ?></div>
                   </fieldset>
                <?= $this->Form->button(__('Submit'),['class'=>'btn btn-sm btn-primary']); ?>
                <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
