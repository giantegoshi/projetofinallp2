<div class="error"><?php echo validation_errors(); ?></div>

<?php echo form_open($form_post_url, array('class'=>'input_form')); ?>

	<div class="row">

    <div class="form-group col-sm-10 ">
	    <label for="nome">Nome</label>
	    <input type="text" class="form-control" value="<?php echo set_value('nome'); ?>" 
	           name="nome" id="nome" placeholder=""/>
    </div></div>

    <div class="row"> 
    <input type="button" name="cancel" id="cancel_btn" class="btn btn-info col-sm-3 col-sm-offset-1" value="Cancelar"/>
    <input type="submit" name="submit" id="submit_btn" class="btn btn-primary col-sm-3 col-sm-offset-2" value="Enviar" /></div>
    
</form>