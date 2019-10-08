<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'AdminUser/add_edit'?>" method="post">
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="status"> Email</label>
          <input type="text" name="MAILPSEUDO" value="<?php echo isset($userData->MAILPSEUDO)?$userData->MAILPSEUDO:'';?>" class="form-control" placeholder="Email">    
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">DATE_DEB</label>
          <input type="text" name="DATE_DEB" class="datepicker form-control" data-date-format="mm/dd/yyyy" value="<?php echo isset($userData->DATE_DEB)?$userData->DATE_DEB:'';?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">DATE_FIN</label>
          <input type="text" name="DATE_FIN" class="datepicker form-control" data-date-format="mm/dd/yyyy" value="<?php echo isset($userData->DATE_FIN)?$userData->DATE_FIN:'';?>">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <input type="checkbox" name="uADMINISTRATEUR" <?php echo ($userData->uADMINISTRATEUR =="O") ? 'checked': '';?>>
          <label for="uADMINISTRATEUR">USERADMIN</label>
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <input type="checkbox" name="ADMINISTRATEUR" <?php echo ($userData->ADMINISTRATEUR =="O") ? 'checked': '';?>>
          <label for="ADMINISTRATEUR">ADMIN</label>
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <input type="checkbox" name="BENEFICIAIRE" <?php echo ($userData->BENEFICIAIRE =="O") ? 'checked': '';?>>
          <label for="BENEFICIAIRE">BENEF</label>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <input type="checkbox" name="GESTIONNAIRE" <?php echo ($userData->GESTIONNAIRE =="O") ? 'checked': '';?>>
          <label for="ADMINISTRATEUR">GESTION</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Address1</label>
          <input type="text" name="ADR1" value="<?php echo isset($userData->ADR1)?$userData->ADR1:'';?>" class="form-control" placeholder="Address1">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Address2</label>
          <input type="text" name="ADR2" value="<?php echo isset($userData->ADR2)?$userData->ADR2:'';?>" class="form-control" placeholder="Address2">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Address3</label>
          <input type="text" name="ADR3" value="<?php echo isset($userData->ADR3)?$userData->ADR3:'';?>" class="form-control" placeholder="Address3">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Address4</label>
          <input type="text" name="ADR4" value="<?php echo isset($userData->ID_ADR3)?$userData->ADR4:'';?>" class="form-control" placeholder="Address4">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Address5</label>
          <input type="text" name="ADR5" value="<?php echo isset($userData->ID_ADR3)?$userData->ADR5:'';?>" class="form-control" placeholder="Address5">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Address6</label>
          <input type="text" name="ADR6" value="<?php echo isset($userData->ID_ADR3)?$userData->ADR6:'';?>" class="form-control" placeholder="Address6">
        </div>
      </div>
      <div class="col-md-10">
        <div class="form-group">
          <label for="">Website</label>
          <input type="text" name="AD_WEB" id="AD_WEB" value="<?php echo isset($userData->AD_WEB)?$userData->AD_WEB:'';?>" class="form-control" placeholder="Website URL">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <input type="button" name="webVisit" id="webVisit" class="btn btn-success wdt-bg" onclick ="visitWeb()" value="Visit"/>
        </div>
      </div>
      <div class="col-md-10">
        <div class="form-group">
          <label for="">Logo</label>
          <input type="text" id="AD_LOGO" name="AD_LOGO" value="<?php echo isset($userData->AD_LOGO)?$userData->AD_LOGO:'';?>" class="form-control" placeholder="Logo URL">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <input type="button" name="logoVisit" id="logoVisit" class="btn btn-success wdt-bg" onclick ="visitLogo()" value="Visit"/>
        </div>
      </div>
     
  </div>
  <input type="hidden"  name="ID_ENTITE_OFF" value="<?php echo isset($userData->ID_ENTITE_OFF)?$userData->ID_ENTITE_OFF:'';?>"/>
  <input type="hidden"  name="ID_ENTITE" value="<?php echo isset($userData->ID_ENTITE)?$userData->ID_ENTITE:'';?>"/>
  <?php if(!empty($userData->ID)){?>
  <input type="hidden"  name="ID" value="<?php echo isset($userData->ID)?$userData->ID:'';?>">
  <div class="box-footer sub-btn-wdt">
    <button type="submit" name="edit" value="edit" class="btn btn-success wdt-bg">Update</button>
  </div>
  <!-- /.box-body -->
  <?php }else{?>
  <div class="box-footer sub-btn-wdt">
    <button type="submit" name="add" value="add" class="btn btn-success wdt-bg">Add</button>
  </div>
  <?php }?>

</form>

<script>
  function addProtocol(url) {
    var prefix = 'http';
    if (url.substr(0, prefix.length) !== prefix)
    {
      url = prefix + "://" + url;
    }
    return url;
  }
  function visitLogo () {
    var logoUrl = $('input#AD_LOGO').val();
    logoUrl = addProtocol(logoUrl);
    window.open(logoUrl);

  }
  function visitWeb () {
    var webUrl = $('input#AD_WEB').val();
    webUrl = addProtocol(webUrl);
    window.open(webUrl, '_blank');
  }

  $('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
      startDate: '-3d'
  });
</script>