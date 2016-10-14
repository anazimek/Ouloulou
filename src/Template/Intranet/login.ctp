<body style="background-color: darkgray">
<div class="container">
    <div class=" col-md-8 col-lg-offset-2 text-center">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <legend style="color: white"><?= __('Se Connecter') ?></legend>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                    <?= $this->Form->create() ?>
                    <div class="form-group">
                        <?= $this->Form->input('username', ['label' => 'Nom Utilisateur']); ?>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <?= $this->Form->input('password', ['label' => 'Mot de passe :']); ?>
                    </div><!-- /.form-group -->
                    <div class="form-group clearfix">
                        <?= $this->Form->button(__('Se connecter')); ?>
                    </div><!-- /.form-group -->
                    <?= $this->Form->end(); ?>
                    <hr>
                </div>
            </div><!-- /.row -->
        </div>
    </div>
</div><!-- /.container -->
</body>