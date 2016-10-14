<body style="background-color: darkgray">
<div class="row">
    <div class="users form col-md-8 col-lg-offset-2 text-center">
        <?= $this->Form->create($user, array('type' => 'file')); ?>
        <fieldset>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <legend style="color: white"><?= __('Créer un nouveau compte') ?></legend>
                </div>
                <div class="form-group" style="display: inline-block;">
                    <label for="form-create-account-full-name">Nom:</label>
                    <?= $this->Form->input('first_name', ['label' => false]); ?>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <label for="form-create-account-full-name">Prénom:</label>
                    <?= $this->Form->input('last_name', ['label' => false]); ?>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <label for="form-create-account-full-name">Nom d'Utilisateur:</label>
                    <?= $this->Form->input('username', ['label' => false]); ?>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <label for="form-create-account-full-name">Email:</label>
                    <?= $this->Form->input('email', ['label' => false]); ?>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <label for="form-create-account-full-name">Date de naissance:</label><br>
                    <?= $this->Form->text('birthday',['type' => 'date'] ); ?>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <label for="form-create-account-full-name">Ville:</label>
                    <?= $this->Form->input('city', ['label' => false]); ?>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <label for="form-create-account-full-name">Description:</label>
                    <?= $this->Form->input('description', ['label' => false]); ?>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <label for="form-create-account-full-name">Mot de passe:</label>
                    <?= $this->Form->input('password', ['label' => false]); ?>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <label for="form-create-account-full-name">Je suis:</label>
                    <?= $this->Form->input('sexe_id', ['label' => false, 'options' => $Sexes]); ?>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <label for="form-create-account-full-name">Emploi:</label>
                    <?= $this->Form->input('work', ['label' => false]); ?>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <label for="form-create-account-full-name">Etudes:</label>
                    <?= $this->Form->input('study', ['label' => false]); ?>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <label for="form-create-account-full-name">Passions:</label>
                    <?= $this->Form->input('hobbie', ['label' => false]); ?>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <label for="form-create-account-full-name">Linkedin:</label>
                    <?= $this->Form->input('linkedin_link', ['label' => false]); ?>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <label for="form-create-account-full-name">Site web:</label>
                    <?= $this->Form->input('website_link', ['label' => false]); ?>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <label for="form-create-account-full-name">Image de profil:</label>
                    <?= $this->Form->input('profil_picture', ['label' => false, 'type' => 'file']); ?>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <?= $this->Form->button(__('Envoyer')) ?>
                    <?= $this->Form->end() ?>
                </div>
        </fieldset>
    </div>
</div>
</div>
</body>