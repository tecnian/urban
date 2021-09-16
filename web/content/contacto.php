<form id="frmContacto">
    
    <div>
        <label><? echo $app_lang['nombre'] ?></label>
        <input type="text" id="nombre" name="nombre" placeholder="<? echo $app_lang['nombre'] ?>" class="form-required" />
    </div>
    <div>
        <label><? echo $app_lang['email'] ?></label>
        <input type="text" id="email" name="email" placeholder="<? echo $app_lang['email'] ?>" class="form-required form-email" />
    </div>
    <div>
        <label><? echo $app_lang['telefono'] ?></label>
        <input type="text" id="telefono" name="telefono" placeholder="<? echo $app_lang['telefono'] ?>" />
    </div>
    <div>
        <label><? echo $app_lang['comentarios'] ?></label>
        <textarea id="comentarios" name="comentarios" placeholder="<? echo $app_lang['comentarios'] ?>" class="form-required"></textarea>
    </div>
    <div>
        <input type="checkbox" id="acepto" name="acepto" value="1" />
        <label>Acepto los términos y condiciones</label>        
    </div>
    <br/><br/>
    <div>
        <button type="button" id="btn_send_contact"><? echo $app_lang['enviar'] ?></button>
    </div>
    <div>
        <div id="confirm_send"></div>            
    </div>
    
    <input type="hidden" id="email_check" name="email_check" value="1" />
    
</form>