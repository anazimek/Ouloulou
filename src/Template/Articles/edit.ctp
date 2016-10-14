<div cclass="container-fluid" style="background-color: white">
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
                <li class="has-child"><a href="#">Actutalité</a>
                    <ul class="child-navigation">
                        <li><?= $this->Html->link(__('Nouveau Post'), ['action' => 'add']) ?></li>
                        <li><?= $this->Html->link(__('Supprimer ce Post'), ['action' => 'delete', $article->id]) ?></li>
                    </ul>
                </li>
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

<div class="articles form large-9 medium-8 columns content">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <legend><?= __('Edit Article') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('description');
            echo $this->Form->input('image');
            echo $this->Form->input('video_link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
