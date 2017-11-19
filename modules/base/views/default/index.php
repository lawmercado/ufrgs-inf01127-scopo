<div class="base-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
	
	<div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Produtos</h2>

               <a class="btn btn-default" href="/web?r=base/produto">Produtos &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Categorias</h2>

                <a class="btn btn-default" href="/web?r=base/categoria">Categorias &raquo;</a></p>
            </div>
			
			<div class="col-lg-4">
                <h2>Produtores</h2>

                <a class="btn btn-default" href="/web?r=base/produtor">Produtores &raquo;</a></p>
            </div>
            
        </div>

    </div>
	
</div>
