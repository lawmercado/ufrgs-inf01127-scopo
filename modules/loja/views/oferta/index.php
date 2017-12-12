<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $ofertas array */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Ofertas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oferta-index">
    <div class="search-area">
        <?php $form = ActiveForm::begin(); ?>
        
            <?= Html::textInput("pesquisa", "", ["placeholder" => "Insira o termo de busca"]) ?><?= Html::submitButton("Pesquisar", ["class" => "botao-inline"]) ?>
            
        <?php ActiveForm::end(); ?>
        <?php if(isset($_POST['pesquisa'])){
         echo '<span class="filtro-pesquisa badge badge-primary">'.$_POST['pesquisa'].'</span>';  
         
         
         $filtro = $_POST['pesquisa'];
        } else{
            $filtro = 'sem filtro';
        }
?>
        
    </div>    
    <div class="ofertas">
    <?php if(count($ofertas) > 0): ?>
        <?php foreach($ofertas as $oferta): ?>
            <?php mostraOferta($oferta, $filtro); ?>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhuma oferta cadastrada!</p>
    <?php endif; ?>
    </div>
    
    
    
</div>

<?php function mostraOferta($oferta, $filtro){
   
    if($filtro == 'sem filtro'){   
    
        echo '
        <div class="oferta">
            <div><img /></div>
            <p class="oferta-produto">'.$oferta->produto->categoria->descricao?>::<?= $oferta->produto->nome.'</p>
            <p class="oferta-quantidade">'.$oferta->quantidade.' Kg</p>
            <p class="oferta-preco">R$'.Yii::$app->formatter->asDecimal($oferta->preco) .' por Kg</p>
            <p class="oferta-local">'. $oferta->produtor->pessoa->cidade ?>, <?= $oferta->produtor->pessoa->estado.'</p>
            '.Html::a("Solicitar", Url::toRoute(["pedido/create", "oferta_id" => $oferta->oferta_id]), ["class" => "botao"]) .'
        </div>
        ';
    } else{
        if($filtro == $oferta->produto->nome || $filtro == $oferta->produto->categoria->descricao | $filtro == $oferta->produtor->pessoa->cidade || $filtro == $oferta->produtor->pessoa->estado){
            
            echo '
            <div class="oferta">
                <div><img /></div>
                <p class="oferta-produto">'.$oferta->produto->categoria->descricao?>::<?= $oferta->produto->nome.'</p>
                <p class="oferta-quantidade">'.$oferta->quantidade.' Kg</p>
                <p class="oferta-preco">R$'.Yii::$app->formatter->asDecimal($oferta->preco) .' por Kg</p>
                <p class="oferta-local">'. $oferta->produtor->pessoa->cidade ?>, <?= $oferta->produtor->pessoa->estado.'</p>
                '.Html::a("Solicitar", Url::toRoute(["pedido/create", "oferta_id" => $oferta->oferta_id]), ["class" => "botao"]) .'
            </div>
            ';              
        }
    }


    }?>


<?php function printaOferta(){
    
    if($filtro == 'Macho'){
        $filtro = 'M';
    } else if($filtro == 'Femea'){
        $filtro = 'F';
    }
    
    
    if( $filtro == $tipos[$montaria->tipo_id-1]['tipo'] ||
        $filtro == $montaria->sexo ||
        $filtro == $qualidades[$montaria->qualidade1_id-1]['qualidade'] ||
        $filtro == $qualidades[$montaria->qualidade2_id-1]['qualidade']
       ){
    
    
    
    echo '<div class="linha-mont">
            <div class="coluna-mont">
                <div class="id-mont">
                    ID: <span class="info-mont">'.$montaria->montaria_id.'
                </div>

                <div class="sexo-mont">
                    Sexo: <span class="info-mont">'.$montaria->sexo.'
                </div>  
            </div>

            <div class="coluna-mont">
                <div class="tipo-mont">
                    Tipo: <span class="info-mont">'.$tipos[$montaria->tipo_id-1]['tipo'].'</span>
                </div>

                <div class="pureza-mont">
                    Pureza: <span class="info-mont">'.$montaria->pureza.'</span>
                </div>  
            </div>

            <div class="coluna-mont">
                <div class="qualidade-mont">
                    Qualidade: <span class="info-mont">'.$qualidades[$montaria->qualidade1_id-1]['qualidade'].'</span>
                </div>';
    if(!($qualidades[$montaria->qualidade1_id-1]['qualidade'] == 'Normal' && $qualidades[$montaria->qualidade1_id-1]['qualidade'] == $qualidades[$montaria->qualidade2_id-1]['qualidade']) &&
          !($qualidades[$montaria->qualidade2_id-1]['qualidade'] == 'Normal' && $qualidades[$montaria->qualidade1_id-1]['qualidade'] != 'Normal')
            ){
        echo    '<div class="qualidade-mont">
                    Qualidade 2: <span class="info-mont">'.$qualidades[$montaria->qualidade2_id-1]['qualidade'].'</span>
                </div>';
        
    };
                      
    echo '</div>
        </div>';
       };
    
};

?>

