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
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation" style="width: 100%">
            <h1 style="width: 20%; display: inline-block">VosgesTimes</h1>
            <ul class="nav navbar-nav" style="float: right">
                <li><?= $this->Html->link(__('Accueil'), ['action' => 'index']) ?></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Actualité <span class="caret"></span></a>
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
<div class="container-fluide">
    <div class="row">
        <div class="col-md-3">
            <div class="profil">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="text-center"><i class="glyphicon glyphicon-cog"></i> <?= __('Profil') ?></h4>
                    </div>
                    <br>
                    <div class="text-center">
                            <?= $this->Html->link(__('Voir mon Profil'), ['controller' => 'Users', 'action' => 'view', $this->request->session()->read('Auth.User.id')],[ 'class' => 'btn btn-success']); ?>
                            <br>
                            <?= $this->Html->link(__('Déconnexion'), ['controller' => 'Intranet', 'action' => 'logout'],[ 'class' => 'btn btn-info']); ?>
                            <br>
                            <?= $this->Html->link(__('Editer mon Profil'), ['controller' => 'Users', 'action' => 'edit', $this->request->session()->read('Auth.User.id')],[ 'class' => 'btn btn-warning']); ?>
                            <br>
                            <?= $this->Html->link(__('Supprimer mon Profil'), ['controller' => 'Users', 'action' => 'delete', $this->request->session()->read('Auth.User.id')],[ 'class' => 'btn btn-danger']); ?>
                    </div>
                    <br>
                </div>
            </div>
            <div class="annonces">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="text-center"><i class="glyphicon glyphicon-home"></i> <?= __('Boutiques') ?></h4>
                        <a class="btn btn-info btn-xs" style="margin-left: 4%"
                           href="#">
                            <i class="glyphicon glyphicon-plus"></i> Nouvelle boutique</a>

                        <a class="btn btn-info btn-xs"
                           href="#">
                            <i class="glyphicon glyphicon-search "></i> Boutiques</a>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="articles">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="text-center"><i class="glyphicon glyphicon-list"></i> <?= __('Actualité') ?></h4>
                    </div>
                    <br>
                    <?php foreach ($articles as $articles): ?>
                        <div class="row">
                            <div class="col-md-10 col-lg-offset-1 well"
                                 style=" border: 1px solid gainsboro">

                                <?= $this->Html->image($articles->user->profil_picture, ['width' => '50px', 'height' => '50px', 'style' => 'border-radius:30%']); ?>

                                <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view', $articles->user_id]) ?>"
                                   style="display: inline-block; font-weight: 600; font-size: 17px; color: black"><?= h($articles->user->last_name) ?> <?= h($articles->user->first_name) ?></a>

                                <p class="text-center"
                                   style="color: black; font-weight: 900"><?= h($articles->description) ?></p>
                                <p class="text-center"
                                   style="color: black; font-weight: 900"><?= h($articles->image) ?></p>
                                <?php if ($articles->video_link != NULL) {?>
                                <p class="text-center">
                                    <iframe width="420" height="250" frameborder="0"
                                            src="<?= h($articles->video_link) ?>">
                                    </iframe>
                                </p>
                                <?php }?>

                                <a class="btn btn-info"
                                   href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'view', $articles->id]) ?>">
                                    <i class="glyphicon glyphicon-search"></i> Voir le Post</a>
                                <a class="btn btn-info"
                                   href="<?= $this->Url->build(['controller' => 'Comments', 'action' => 'add',$articles->id]) ?>">
                                    <i class="glyphicon glyphicon-pencil"></i> Nouveau Commentaire</a>
                                <a href="#" class="glyphicon glyphicon-ok" style="margin-left: 10%"></a>
                                <a href="#" class="glyphicon glyphicon-remove" style="margin-left: 10%"></a>
                            </div>
                        </div><br>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="annonces">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="text-center"><i class="glyphicon glyphicon-file"></i> <?= __('Dernières Annonces') ?>
                        </h4>
                        <a class="btn btn-info btn-xs" style="margin-left: 4%"
                           href="<?= $this->Url->build(['controller' => 'Ads', 'action' => 'add']) ?>">
                            <i class="glyphicon glyphicon-plus"></i> Nouvelle annonce</a>

                        <a class="btn btn-info btn-xs"
                           href="<?= $this->Url->build(['controller' => 'Ads', 'action' => 'index']) ?>">
                            <i class="glyphicon glyphicon-search"></i> Annonces</a>
                    </div>
                    <br>
                    <?php foreach ($ads as $ads): ?>
                        <?php switch ($ads->type_ad_id) {
                            case 1:
                                $typeads = "Emploi";
                                break;
                            case 2:
                                $typeads = "Véhicules";
                                break;
                            case 3:
                                $typeads = "Immobiler";
                                break;
                            case 4:
                                $typeads = "Vacances";
                                break;
                            case 5:
                                $typeads = "Multimédia";
                                break;
                            case 6:
                                $typeads = "Loisirs";
                                break;
                            case 7:
                                $typeads = "Matériel Professionnel";
                                break;
                            case 8:
                                $typeads = "Services";
                                break;
                            case 9:
                                $typeads = "Maison";
                                break;
                            case 10:
                                $typeads = "Autres";
                                break;
                        } ?>
                        <div class="row">
                            <div class="col-md-10 col-lg-offset-1 ">
                                <div class="text-center well well-sm"
                                     style="display: inline-block; margin-left: 10%; margin-right: 1%; border: 1px solid gainsboro; width: 80%">
                                    <?= $this->Html->image('ad/' . $ads->picture_url, ['width' => '50px', 'height' => '50px', 'style' => 'border-radius:30%']); ?>
                                    <h5><?= h($ads->ads_name) ?></h5>
                                    <p style="font-weight: 300">Type d'Offre: <?= h($typeads) ?></p>
                                    <p style="font-weight: 300">Prix: <?= h($ads->price) ?>€</p>
                                    <a class="btn btn-info"
                                       href="<?= $this->Url->build(['controller' => 'Ads', 'action' => 'view', $ads->id]) ?>">
                                        <i class="glyphicon glyphicon-search"></i> Voir l'Annonce</a>
                                </div>
                            </div>
                        </div><br>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>