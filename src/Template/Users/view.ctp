







<nav class="navbar navbar-default">
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
                <h1  style="width: 20%; display: inline-block">VosgesTimes</h1>
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
                            <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">Liste des Utilisateurs</a></li>
                            <li><a href="<?= $this->Url->build(['controller' => 'Intranet', 'action' => 'logout']) ?>">Déconnexion</a></li>

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
</nav>

</header><!-- /.navbar -->
</div><!-- /.container -->

<body style="background-color:DarkGray">
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="well well-lg" style="background-color: #428bca; border-color: #428bca">
                    <?= $this->Html->image($user->profil_picture, ['width' => '200px', 'height' => '200px', 'style' =>'background-color:white','border-radius:30%']); ?>

                <h1 style="color: white">
                    <?= h($user->first_name) ?><br>
                    <?= h($user->last_name) ?>
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="users view col-md-4 text-center">
            <div class="panel panel-primary">
                <div class="panel-heading 1"  >
                    <h4><i class="glyphicon glyphicon-list-alt"></i> <?= __('Infos') ?></h4>
                    <?php
                    if ($autoriser) {
                    ?>
                    <a
                        class="btn btn-info"
                        href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'edit', $user->id]) ?>">
                        <i class="glyphicon glyphicon-edit"></i> Editer</a>
                    <a class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Supprimer</a>
                    <?php } ?>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Email') ?></th>
                            <td><?= h($user->email) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Ville') ?></th>
                            <td><?= h($user->city) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Emploi') ?></th>
                            <td><?= h($user->work) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Etudes') ?></th>
                            <td><?= h($user->study) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Passions') ?></th>
                            <td><?= h($user->hobbie) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Linkedin') ?></th>
                            <td><?= h($user->linkedin_link) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Site Web') ?></th>
                            <td><?= h($user->website_link) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Anniversaire') ?></th>
                            <td><?= h($user->birthday) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Description') ?></th>
                            <td style="color: black"><?= $this->Text->autoParagraph(h($user->description)); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="related">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                       <h4><i class="glyphicon glyphicon-camera"></i> <?= __('Photos') ?></h4>
                    </div>
                    <?php if (!empty($user->user_images)): ?>
                        <table style="border: 1px solid black">
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('User Id') ?></th>
                                <th><?= __('Description') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($user->user_images as $userImages): ?>
                                <tr>
                                    <td><?= h($userImages->id) ?></td>
                                    <td><?= h($userImages->user_id) ?></td>
                                    <td><?= h($userImages->description) ?></td>
                                    <td><?= h($userImages->created) ?></td>
                                    <td><?= h($userImages->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'UserImages', 'action' => 'view', $userImages->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'UserImages', 'action' => 'edit', $userImages->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserImages', 'action' => 'delete', $userImages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userImages->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
            <div class="related">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4><i class="glyphicon glyphicon-file"></i> <?= __('Annonces') ?></h4>
                        <a class="btn btn-info"
                           href="<?= $this->Url->build(['controller' => 'Ads', 'action' => 'add']) ?>">
                            <i class="glyphicon glyphicon-plus"></i> Nouvelle Annonce</a>

                        <a class="btn btn-info"
                           href="<?= $this->Url->build(['controller' => 'Ads', 'action' => 'index']) ?>">
                            <i class="glyphicon glyphicon-search"></i> Annonces</a>
                    </div>
                    <?php if (!empty($user->ads)): ?>
                        <?php foreach ($user->ads as $ads): ?>
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
                            <div
                                style="display: inline-block; margin-left: 1%; margin-right: 1%; border: 1px solid gainsboro; width: 45%; border-radius: 3%">
                                <?= $this->Html->image('ad/'.$ads->picture_url, ['width' => '50px', 'height' => '50px', 'style' => 'border-radius:30%']); ?>
                                <h5><?= h($ads->ads_name) ?></h5>
                                <p>type d'Offre: <?= h($typeads) ?></p>
                                <p>Prix: <?= h($ads->price) ?>€</p>
                                <a class="btn btn-info"
                                   href="<?= $this->Url->build(['controller' => 'Ads', 'action' => 'view', $ads->id]) ?>">
                                    <i class="glyphicon glyphicon-search"></i> Voir l'Annonce</a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="related ">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="text-center"><i class="glyphicon glyphicon-list"></i> <?= __('Actualités') ?></h4>
                    </div>
                    <br>
                    <?php if (!empty($user->articles)): ?>
                        <?php foreach ($user->articles as $articles): ?>
                            <div class="row">
                                <div class="col-md-10 col-lg-offset-1 well" style="border: 1px solid gainsboro">
                                    <?= $this->Html->image($user->profil_picture, ['width' => '50px', 'height' => '50px', 'style' => 'border-radius:30%']); ?>
                                    <h4 style="display: inline-block"><?= h($user->first_name) ?> <?= h($user->last_name) ?></h4>
                                    <p class="text-center"
                                       style="color: black; font-weight: 900"><?= h($articles->description) ?></p>
                                    <p class="text-center"><?= h($articles->image) ?></p>
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
                                       href="<?= $this->Url->build(['controller' => 'Comments', 'action' => 'add']) ?>">
                                        <i class="glyphicon glyphicon-pencil"></i> Nouveau Commentaire</a>
                                    <a href="#" class="glyphicon glyphicon-ok" style="margin-left: 20%"></a>
                                    <a href="#" class="glyphicon glyphicon-remove" style="margin-left: 20%"></a>
                                    <!--<p><?= $this->Html->link(__('Edit'), ['controller' => 'Articles', 'action' => 'edit', $articles->id]) ?></p>-->
                                    <!--<p><?= $this->Form->postLink(__('Delete'), ['controller' => 'Articles', 'action' => 'delete', $articles->id], ['confirm' => __('Êtes-vous sûre de vouloir supprimer # {0}?', $articles->id)]) ?></p>-->
                                </div>
                            </div>
                        <?php endforeach; ?>

                    <?php endif; ?>

                    <!--<?php if (!empty($user->comments)): ?>
        <?php foreach ($user->comments as $comments): ?>
        <div class="row">
            <div class="col-md-10 col-lg-offset-1" style="background-color:dimgray; border: 1px solid black">
                <img src="https://support.apple.com/library/content/dam/edam/applecare/images/en_US/il/ios9-photos-app-icon-for-wrap.png" style="height: 20px; width: 20px">
                <p style="color: white; display: inline-block"><?= h($user->first_name) ?> <?= h($user->last_name) ?></p>
                <p style="color: black; font-weight: 450"><?= h($comments->description) ?></p>
                </div>
            </div>
            <?php endforeach; ?>

        <?php endif; ?>-->

                </div>
                <!--<div class="related">
                <div style="background-color: grey; color: white; border: 1px solid black">
                    <h4><?= __('Related User Messages') ?></h4>
                </div>
                <?php if (!empty($user->user_messages)): ?>
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Message') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->user_messages as $userMessages): ?>
                            <tr>
                                <td><?= h($userMessages->id) ?></td>
                                <td><?= h($userMessages->user_id) ?></td>
                                <td><?= h($userMessages->message) ?></td>
                                <td><?= h($userMessages->created) ?></td>
                                <td><?= h($userMessages->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'UserMessages', 'action' => 'view', $userMessages->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserMessages', 'action' => 'edit', $userMessages->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserMessages', 'action' => 'delete', $userMessages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userMessages->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>-->
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function(){
        $(".1").click(function(){
            $(".panel-body").animate({
                height: 'toggle'
            });
        });
    });
</script>