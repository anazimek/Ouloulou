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
        <nav class="collapse navbar-collapse bs-navbar-collapse " role="navigation" style="width: 100%">
            <h1 style="width: 20%; display: inline-block">VosgesTimes</h1>
            <ul class="nav navbar-nav" style="float: right">
                <li><?= $this->Html->link(__('Accueil'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actualité<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'add']) ?>">Nouveau Post</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Utilisateurs<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= $this->Url->build(['controller' => 'Intranet', 'action' => 'logout']) ?>">Déconnexion</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Annonces<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= $this->Url->build(['controller' => 'Ads', 'action' => 'index']) ?>">Annonces</a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Ads', 'action' => 'add']) ?>">Nouvelle Annonces</a></li>

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


<body style="background-color:DarkGray">
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <h3><?= __('Utilisateurs') ?></h3>
            </div>
            <?php foreach ($users as $user): ?>
                <div class="col-md-2 text-center well">
                    <!--<?= $this->Html->image($user->profil_picture, ['width' => '100px', 'height' => '100px', 'style' => 'border-radius:30%']); ?>-->
                    <?= $this->Html->image( $user->profil_picture, ['width' => '100px', 'height' => '100px', 'style' => 'border-radius:30%']); ?>
                    <h4>
                        <?= h($user->first_name) ?><br>
                        <?= h($user->last_name) ?>
                    </h4>
                    <a class="btn btn-info"
                       href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view', $user->id]) ?>">Voir Profil</a>
                </div>


            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>

