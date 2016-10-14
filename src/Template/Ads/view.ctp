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
                        <li><a href="<?= $this->Url->build(['controller' => 'Ads', 'action' => 'edit', $ads->id]) ?>">Editer
                                mon Annonce</a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Ads', 'action' => 'delete', $ads->id]) ?>">Supprimer
                                mon Annonces</a></li>

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
<div class="panel panel-primary">
    <div class="panel-heading text-center">
        <h1 class="text-center" style="color: white"><?= h($ads->ads_name) ?></h1>
    </div>
        <div class="col-md-7 text-center well">
            <?= $this->Html->image('ad/'.$ads->picture_url, ['width' => '94%', 'height' => '500px']); ?>
        </div>
        <div class="ads view col-md-5 well" style="min-height: 540px; max-height: 540px">
            <p style="font-weight: 900"> Description:</p>
            <p style=" font-size: 18px; font-weight: 900"><?= h($ads->description); ?></p><br>

            <p style="font-weight: 900"> Vendeur:</p>
            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view', $ads->user_id]) ?>"
               style="display: inline-block; font-weight: 900; font-size: 20px; color: blue"><?= $users[0]['last_name']; ?> <?= $users[0]['first_name']; ?></a>
            <br>
            <br>
            <p style="font-weight: 900"> Type d'Offre:</p>
            <p style=" font-size: 18px; font-weight: 900"><?= $typeAds[0]['type_name'] ?></p><br>
            <div class="row">
                <div class="col-md-5">
                    <p style="font-weight: 900"> Ville:</p>
                    <p style=" font-size: 18px; font-weight: 900"><?= $Towns[0]['town_name'] ?></p><br>

                    <p style="font-weight: 900"> Prix:</p>
                    <p style=" font-size: 18px; font-weight: 900"><?= $this->Number->format($ads->price) ?>€</p>
                </div>
                <div class="col-md-5 text-center">
                    <p style="font-weight: 900"> à Louer:</p>
                    <p style=" font-size: 18px; font-weight: 900"><?= $ads->for_rent ? __('Oui') : __('Non'); ?></p><br>

                    <p style="font-weight: 900"> à Vendre:</p>
                    <p style=" font-size: 18px; font-weight: 900"><?= $ads->for_sale ? __('Oui') : __('Non'); ?></p><br>
                </div>
            </div>
        </div>
</div>
</body>