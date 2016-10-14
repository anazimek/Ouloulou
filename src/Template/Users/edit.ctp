<div class="container-fluid" style="background-color: white">
    <header class="navbar" id="top" role="banner">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation" style="width: 100%">
            <h1 style="width: 20%; display: inline-block">VosgesTimes</h1>
            <ul class="nav navbar-nav" style="float: right">

                <li><?= $this->Html->link(__('Accueil'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Actualité<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'add']) ?>">Nouveau
                                Post</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Utilisateurs<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">Liste des
                                Utilisateurs</a></li>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'delete', $user->id]) ?>">Supprimer
                                mon Profil</a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Intranet', 'action' => 'logout']) ?>">Déconnexion</a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Annonces<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'Ads', 'action' => 'index']) ?>">Annonces</a>
                        </li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Ads', 'action' => 'add']) ?>">Nouvelle
                                Annonce</a></li>
                    </ul>
                </li>

                <!--<li class="has-child"><a href="#">Images</a>
                    <ul class="child-navigation">
                        <li><?= $this->Html->link(__('Images'), ['controller' => 'UserImages', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('Nouvelle images'), ['controller' => 'UserImages', 'action' => 'add']) ?></li>
                    </ul>
                </li>
                <li class="has-child"><a href="#">Messages</a>
                    <ul class="child-navigation">
                        <li><?= $this->Html->link(__('Messages'), ['controller' => 'UserMessages', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('Nouveau messages'), ['controller' => 'UserMessages', 'action' => 'add']) ?></li>
                    </ul>
                </li>-->

            </ul>
        </nav><!-- /.navbar collapse-->

    </header><!-- /.navbar -->
</div><!-- /.container -->

<body style="background-color: darkgray">
<div class="container-fluid">
    <div class="row">
        <div class="users form col-md-6 col-lg-offset-3 text-center">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <legend style="color: white"><?= __('Editer mon compte') ?></legend>
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
                    <legend style="color: white">.</legend>
                    <div class="form-group" style="display: inline-block;">
                        <label for="form-create-account-full-name">Mot de passe:</label>
                        <?= $this->Form->input('password', ['label' => false]); ?>
                    </div>
                    <br>
                    <div class="form-group" style="display: inline-block;">
                        <label for="form-create-account-full-name">Sexe:</label>
                        <?= $this->Form->input('sexe_id', ['options' => $Sexes, 'label' => false]); ?>
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
                        <label for="form-create-account-full-name">Photo de Profil:</label>
                        <?= $this->Form->input('profil_picture', ['label' => false]); ?>
                    </div>
                    <br>
                    <div class="form-group" style="display: inline-block;">
                        <label for="form-create-account-full-name">Linkedin:</label>
                        <?= $this->Form->input('linkedin_link', ['label' => false]); ?>
                    </div>
                    <br>
                    <div class="form-group" style="display: inline-block;">
                        <label for="form-create-account-full-name">Site Web:</label>
                        <?= $this->Form->input('website_link', ['label' => false]); ?>
                    </div>
                    <br>
                    <div class="form-group" style="display: inline-block;">
                        <?= $this->Form->button(__('Envoyer')) ?>
                        <?= $this->Form->end() ?>
                    </div>

                </div>
        </div>
    </div>
</div>
</body>

