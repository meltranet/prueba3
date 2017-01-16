<?php sesRem(); sesIni(); ?>
<div>
	<span class="etiqueta" style="width:auto;">Nombre de Usuario:</span>
	<input name="cUsuario" type="text" class="txt" style="width:173px;" maxlength="40" value="<?php cMostrar($lcMelAccesoUsuario);?>">
</div>
<div style="padding-top:12px;">
   	<span class="etiqueta" style="width:auto;">Contraseña:</span>
	<input name="cContrasena" type="password" class="txt" style="width:173px;" maxlength="24">
</div>
<div style="padding-top:12px;">
   	<button type="submit" class="melSocio">Acceder</button>
</div>