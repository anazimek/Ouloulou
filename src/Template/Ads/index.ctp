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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actualité<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'add']) ?>">Nouveau Post</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Utilisateurs<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'Index']) ?>">Liste des Utilisateurs</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Annonces<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= $this->Url->build(['controller' => 'Ads', 'action' => 'add']) ?>">Nouvelle Annonce</a></li>

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
                <h3><?= __('Annonces') ?></h3>
            </div>
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
                    <div class="col-md-2 text-center well" style="min-height: 320px;">
                            <?= $this->Html->image('ad/'.$ads->picture_url, ['width' => '110px', 'height' => '110px', 'style' => 'border-radius:30%']); ?>
                            <h4><?= h($ads->ads_name) ?></h4>
                            <p>type d'Offre: <?= h($typeads) ?></p>
                            <p>Prix: <?= $this->Number->format($ads->price) ?>€</p>
                        <a class="btn btn-info" style=""
                           href="<?= $this->Url->build(['controller' => 'Ads', 'action' => 'view', $ads->id]) ?>">
                            <i class="glyphicon glyphicon-search"></i> Voir l'Annonce</a>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('précédent')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('suivant') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>

