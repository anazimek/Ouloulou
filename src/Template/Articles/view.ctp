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

                <li><?= $this->Html->link(__('Accueil'), ['action' => 'index']) ?></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Actualité<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'add']) ?>">Nouveau
                                Post</a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'edit', $article->id]) ?>">Editer mon
                                Post</a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'delete', $article->id]) ?>">Supprimer mon
                                Post</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Utilisateurs<span class="caret"></span></a>
                    <ul class="dropdown-menu">
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

<body style="background-color:DarkGray">
<div class="container-fluid">
<div class="row">
<div  class="col-md-8 col-lg-offset-2 well">
    <?php foreach ( $users as $user)?>
    <?= $this->Html->image($user->profil_picture,['width'=>'150px','height'=>'150px','style'=>'border-radius:30%']); ?>
    <a href="<?=$this->Url->build(['controller' => 'Users', 'action' => 'view',$article->user_id])?>" style="display: inline-block; font-weight: 600; font-size: 40px;  color: black"><?= h($user->last_name)?><?= h($user->first_name)?></a>
    <? endforeach; ?>
    <p class="text-center" style="color: black; font-weight: 900; font-size: 30px"><?= h($article->description) ?></p>
    <p><?= h($article->image) ?></p>
    <p><?= h($article->video_link) ?></p>
<br>
    <div class="related">
        <h4><?= __('Commentaires') ?></h4>
        <a class="btn btn-info"
           href="<?= $this->Url->build(['controller' => 'Comments', 'action' => 'add',$article->id]) ?>">
            <i class="glyphicon glyphicon-pencil"></i> Nouveau Commentaire</a>
        <?php if (!empty($article->comments)): ?>
            <?php foreach ($article->comments as $comments): ?>
                <div class="well">
                    <?php foreach ( $users as $user)?>
                    <?= $this->Html->image($user->profil_picture,['width'=>'50px','height'=>'50px','style'=>'border-radius:30%']); ?>
                    <a href="<?=$this->Url->build(['controller' => 'Users', 'action' => 'view',$comments->user_id])?>" style="display: inline-block; font-weight: 600; font-size: 17px; color: black"><?= h($user->last_name)?><?= h($user->first_name)?></a>
                    <? endforeach; ?>
                    <p class="text-center" style="color: black; font-weight: 700"><?= h($comments->description) ?></p>
                    <a class="btn btn-info"
                       href="<?= $this->Url->build(['controller' => 'Comments', 'action' => 'edit', $comments->id]) ?>">
                        <i class="glyphicon glyphicon-edit"></i> Modifier</a>
                    <a class="btn btn-danger"
                       href="<?= $this->Url->build(['controller' => 'Comments', 'action' => 'delete', $comments->id]) ?>">
                        <i class="glyphicon glyphicon-remove"></i> Supprimer</a>
                    <a href="#" class="glyphicon glyphicon-ok" style="margin-left: 10%"></a>
                    <a href="#" class="glyphicon glyphicon-remove"  style="margin-left: 10%"></a>

                </div><br>

            <?php endforeach; ?>

        <?php endif; ?>
    </div>
    </div>
</div>
</div>
</body>