<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
use app\modules\base\models\Usuario;
use yii\bootstrap\Alert;

AppAsset::register($this);

$menu     = [];
$hotlinks = [
    "Início" => Url::home()
];

if( !Yii::$app->user->isGuest )
{

    switch( Yii::$app->user->identity->papel_id )
    {
        case Usuario::PAPEL_ADMINISTRADOR:
            $menu = [
                "Portal administrativo" => Url::toRoute("/base/default")
            ];

            $hotlinks = $hotlinks + [
                "Portal administrativo" => Url::toRoute("/base/default")
            ];

            break;

        case Usuario::PAPEL_PRODUTOR:
            $menu = [
                "Meu perfil"   => Url::toRoute("/base/produtor/view"),
                "Meus pedidos" => Url::toRoute("/loja/pedido"),
                "Criar oferta" => Url::toRoute("/loja/oferta/create")
            ];

            $hotlinks = $hotlinks + [
                "Meu perfil"   => Url::toRoute("/base/produtor/view"),
                "Meus pedidos" => Url::toRoute("/loja/pedido"),
                "Criar oferta" => Url::toRoute("/loja/oferta/create"),
            ];

            break;


        case Usuario::PAPEL_CONSUMIDOR:
            $menu = [
                "Meu perfil"   => Url::toRoute("consumidor/view"),
                "Meus pedidos" => Url::toRoute("pedido/index")
            ];

            $hotlinks = $hotlinks + [
                "Meu perfil"   => Url::toRoute("consumidor/view"),
                "Meus pedidos" => Url::toRoute("pedido/index")
            ];

            break;

        default:
    }
}
else
{
    $menu = [
        "Entrar" => Url::toRoute([ '/base/default/login'])
    ];
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8" />
        <?= Html::csrfMetaTags() ?>

        <title><?= Html::encode(Yii::$app->name) ?></title>

        <?php $this->head() ?>
        <link rel="stylesheet" href="css/modules/base/main.css" type="text/css" />
        <link rel="stylesheet" href="css/modules/loja/main.css" type="text/css" />
    </head>
    <body>
        <?php $this->beginBody() ?>
        <header>
            <div class="menu-controller row-left">
                <h1><?= Html::encode(Yii::$app->name) ?></h1>
            </div>

            <div class="row-right navigation">
                <?php foreach( $hotlinks as $label => $link ): ?>
                    <a href="<?= $link ?>"><?= Html::encode($label) ?></a>
                <?php endforeach ?>

                |

                <?php if( !Yii::$app->user->isGuest ): ?>
                    <p>Oi, <strong><?= Yii::$app->user->identity->pessoa->nome ?></strong>. <a href="<?= Url::toRoute([ '/base/default/logout']) ?>" data-method="post">Sair?</a></p>
                <?php else: ?>
                    <a href="<?= Url::toRoute([ '/base/default/login']) ?>" data-method="post">Entrar</a></p>
                <?php endif; ?>

            </div>

            <nav class="menu">
                <ul>
                    <?php foreach( $menu as $label => $link ): ?>
                        <li><a href="<?= $link ?>"><?= Html::encode($label) ?></a></li>
                    <?php endforeach ?>
                </ul>
            </nav>
        </header>

        <section>
            <?php if( Yii::$app->session->hasFlash('success') ): ?>
                <?php Alert::begin([ "options" => [ "class" => "alert-success"]]); ?>
                <?= Yii::$app->session->getFlash('success') ?>
                <?php Alert::end(); ?>
            <?php endif; ?>

            <?php if( Yii::$app->session->hasFlash('error') ): ?>
                <?php Alert::begin([ "options" => [ "class" => "alert-danger"]]); ?>
                <?= Yii::$app->session->getFlash('error') ?>
                <?php Alert::end(); ?>
            <?php endif; ?>

            <?= $content ?>
        </section>

        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function () {
                // Cria o handler para o menu
                document.querySelector(".menu-controller").addEventListener("click", function () {
                    this.classList.toggle("menu-controller-active");
                    this.parentElement.classList.toggle("menu-active");
                });

            });
        </script>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
