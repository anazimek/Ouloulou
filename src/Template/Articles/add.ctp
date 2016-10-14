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
            <h1>VosgesTimes</h1>
            <ul class="nav navbar-nav">

                <li><?= $this->Html->link(__('Accueil'), ['action' => 'index']) ?></li>
                <li class="has-child"><a href="#">Option</a>
                    <ul class="child-navigation">
                        <li><?= $this->Html->link(__('Déconnexion'), ['controller' => 'Intranet', 'action' => 'logout']) ?></li>

                    </ul>
                </li>
                <!--<li class="has-child"><a href="#">Actutalité</a>
                    <ul class="child-navigation">
                        <li><?= $this->Html->link(__('Nouveau Post'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
                    </ul>
                </li>-->
                <li class="has-child"><a href="#">Annonces</a>
                    <ul class="child-navigation">
                        <li><?= $this->Html->link(__('Annonces'), ['controller' => 'Ads', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('Nouvelle Annonce'), ['controller' => 'Ads', 'action' => 'add']) ?></li>
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
<div class="row">
    <div class="articles col-md-8 col-lg-offset-2 text-center">
        <?= $this->Form->create($article) ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3><?= __('Ajouter un Post') ?></h3>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <label for="form-create-account-full-name">Description:</label>
                    <?= $this->Form->input('description', ['label' => false]); ?>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <label for="form-create-account-full-name">Image:</label>
                    <?= $this->Form->input('image', ['label' => false]); ?>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <label for="form-create-account-full-name">Lien Vidéo:</label>
                    <?= $this->Form->input('video_link', ['label' => false]); ?>
                </div>
                <br>
                <div class="form-group" style="display: inline-block;">
                    <?= $this->Form->button(__('Envoyer')) ?>
                    <?= $this->Form->end() ?>
                </div>


    </div>
</div>
</div>
</body>