<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'AdminEntite/add_edit'?>" method="post">
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="status"> JETEPAY</label>
          <input type="text" name="ID_ENT_JETEPAY" value="<?php echo isset($entiteData->ID_ENT_JETEPAY)?$entiteData->ID_ENT_JETEPAY:'';?>" class="form-control" placeholder="Jetepay">    
        </div>
      </div>
    
      <div class="col-md-4">
        <div class="form-group">
          <input type="checkbox" name="ADMINISTRATEUR" <?php echo ($entiteData->ADMINISTRATEUR =="O") ? 'checked': '';?>>
          <label for="ADMINISTRATEUR">ADMINISTRATEUR</label>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <input type="checkbox" name="BENEFICIAIRE" <?php echo ($entiteData->BENEFICIAIRE =="O") ? 'checked': '';?>>
          <label for="BENEFICIAIRE">BENEFICIAIRE</label>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <input type="checkbox" name="GESTIONNAIRE" <?php echo ($entiteData->GESTIONNAIRE =="O") ? 'checked': '';?>>
          <label for="ADMINISTRATEUR">GESTIONNAIRE</label>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="">Address1</label>
          <input type="text" name="ID_ADR1" value="<?php echo isset($entiteData->ID_ADR1)?$entiteData->ID_ADR1:'';?>" class="form-control" placeholder="Address1">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Address2</label>
          <input type="text" name="ID_ADR2" value="<?php echo isset($entiteData->ID_ADR2)?$entiteData->ID_ADR2:'';?>" class="form-control" placeholder="Address2">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Address3</label>
          <input type="text" name="ADR3" value="<?php echo isset($entiteData->ID_ADR3)?$entiteData->ID_ADR3:'';?>" class="form-control" placeholder="Address3">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Address4</label>
          <input type="text" name="ADR4" value="<?php echo isset($entiteData->ID_ADR3)?$entiteData->ID_ADR4:'';?>" class="form-control" placeholder="Address4">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Address5</label>
          <input type="text" name="ADR5" value="<?php echo isset($entiteData->ID_ADR3)?$entiteData->ID_ADR5:'';?>" class="form-control" placeholder="Address5">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Address6</label>
          <input type="text" name="ADR6" value="<?php echo isset($entiteData->ID_ADR3)?$entiteData->ID_ADR6:'';?>" class="form-control" placeholder="Address6">
        </div>
      </div>
      <div class="col-md-10">
        <div class="form-group">
          <label for="">Website</label>
          <input type="text" name="AD_WEB" id="AD_WEB" value="<?php echo isset($entiteData->AD_WEB)?$entiteData->AD_WEB:'';?>" class="form-control" placeholder="Website URL">
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
          <input type="text" id="AD_LOGO" name="AD_LOGO" value="<?php echo isset($entiteData->AD_LOGO)?$entiteData->AD_LOGO:'';?>" class="form-control" placeholder="Logo URL">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <input type="button" name="logoVisit" id="logoVisit" class="btn btn-success wdt-bg" onclick ="visitLogo()" value="Visit"/>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">DATE_DEB</label>
          <input type="text" name="DATE_DEB" class="datepicker form-control" data-date-format="mm/dd/yyyy" value="<?php echo isset($entiteData->DATE_DEB)?$entiteData->DATE_DEB:'';?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">DATE_FIN</label>
          <input type="text" name="DATE_FIN" class="datepicker form-control" data-date-format="mm/dd/yyyy" value="<?php echo isset($entiteData->DATE_FIN)?$entiteData->DATE_FIN:'';?>">
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="">IBAN</label>
          <input type="text" name="BENE_IBAN" value="<?php echo isset($entiteData->BENE_IBAN)?$entiteData->BENE_IBAN:'';?>" class="form-control" placeholder="IBAN">
        </div>
      </div>

  </div>

  <?php if(!empty($entiteData->ID_ENTITE)){?>
  <input type="hidden"  name="ID_ENTITE" value="<?php echo isset($entiteData->ID_ENTITE)?$entiteData->ID_ENTITE:'';?>">
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