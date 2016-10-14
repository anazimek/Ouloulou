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
        <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
            <ul class="nav navbar-nav">

                <li><?= $this->Html->link(__('Accueil'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
                <li class="has-child"><a href="#">Utilisateurs</a>
                    <ul class="child-navigation">
                        <li><?= $this->Html->link(__('Utilisateurs'), ['controller' => 'Users','action' => 'index']) ?></li>

                    </ul>
                </li>
                <li class="has-child"><a href="#">Actutalité</a>
                    <ul class="child-navigation">
                        <li><?= $this->Html->link(__('Nouveau Post'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
                    </ul>
                </li>
                <li class="has-child"><a href="#">Annonces</a>
                    <ul class="child-navigation">
                        <li><?= $this->Html->link(__('Annonces'), ['action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('Nouvelle Annonce'), ['action' => 'add']) ?></li>
                        <li><?= $this->Html->link(__('Supprimer mon Annonce'), ['action' => 'delete', $ad->id]) ?></li>
            </ul>
                </li>
                <li class="has-child"><a href="#">Images</a>
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
                </li>

            </ul>
        </nav><!-- /.navbar collapse-->

    </header><!-- /.navbar -->
</div><!-- /.container -->

<body style="background-color: darkgray">
<div class="row"style="background-color: grey">
    <div class="users form col-md-6">
    <?= $this->Form->create($ad) ?>
    <fieldset>
        <legend style="color: white"><?= __('Editer Annonce') ?></legend>

        <div class="form-group" style="display: inline-block;">
            <label for="form-create-account-full-name"style="color: white">Intituler de l'Annonce:</label>
        <?= $this->Form->input('ads_name',['label' => false]);?>
            </div><br>
        <div class="form-group" style="display: inline-block;">
            <label for="form-create-account-full-name"style="color: white">Utilisateur:</label>
        <?= $this->Form->input('user_id', ['options' => $users ,'label' => false]);?>
            </div><br>
        <div class="form-group" style="display: inline-block;">
            <label for="form-create-account-full-name"style="color: white">Type d'Offre:</label>
        <?= $this->Form->input('type_ad_id', ['options' => $typeAds ,'label' => false]);?>
            </div><br>
        <div class="form-group" style="display: inline-block;">
            <label for="form-create-account-full-name"style="color: white">Description:</label>
        <?= $this->Form->input('description',['label' => false]);?>
            </div><br>
        </div>
    <div class="users form col-md-6">
        <legend style="color: white">.</legend>

        <div class="form-group" style="display: inline-block;">
            <label for="form-create-account-full-name"style="color: white">à Louer:</label>
        <?= $this->Form->input('for_rent',['label' => false]);?>
            </div><br>
        <div class="form-group" style="display: inline-block;">
            <label for="form-create-account-full-name"style="color: white">à Vendre:</label>
        <?= $this->Form->input('for_sale',['label' => false]);?>
            </div><br>
        <div class="form-group" style="display: inline-block;">
            <label for="form-create-account-full-name"style="color: white">Prix:</label>
        <?= $this->Form->input('price',['label' => false]);?>
            </div><br>
        <div class="form-group" style="display: inline-block;">
            <label for="form-create-account-full-name"style="color: white">Ville:</label>
        <?= $this->Form->input('town_id', ['options' => $towns ,'label' => false]);?>
        </div><br>

    </fieldset>
    <?= $this->Form->button(__('Envoyer')) ?>
    <?= $this->Form->end() ?>
</div>
</div>
</body>