<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

header("X-XSS-Protection: 1; mode=block");
header("X-Frame-Options: SAMEORIGIN");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("REGISTRO DE SOLICITUD DE NO CONFORMIDAD Y ACCION CORRECTIVA"); } else { echo strip_tags("ACTUALIZACION DE SOLICITUD DE NO CONFORMIDAD Y ACCION CORRECTIVA"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
  var sc_css_status_pwd_box = '<?php echo $this->Ini->Css_status_pwd_box; ?>';
  var sc_css_status_pwd_text = '<?php echo $this->Ini->Css_status_pwd_text; ?>';
 </SCRIPT>
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
<input type="hidden" id="sc-mobile-lock" value='true' />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/viewerjs/viewer.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/viewerjs/viewer.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<style type="text/css">
.sc-button-image.disabled {
	opacity: 0.25
}
.sc-button-image.disabled img {
	cursor: default !important
}
</style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<?php
$miniCalendarFA = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_fecha_apertura button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecha_cierre button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecha_compro button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fehca_real button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_iso_no_conformidad/form_iso_no_conformidad_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_iso_no_conformidad_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
<?php

include_once('form_iso_no_conformidad_jquery.php');

?>
var applicationKeys = "";
applicationKeys += "ctrl+shift+right";
applicationKeys += ",";
applicationKeys += "ctrl+shift+left";
applicationKeys += ",";
applicationKeys += "ctrl+right";
applicationKeys += ",";
applicationKeys += "ctrl+left";
applicationKeys += ",";
applicationKeys += "alt+q";
applicationKeys += ",";
applicationKeys += "escape";
applicationKeys += ",";
applicationKeys += "ctrl+enter";
applicationKeys += ",";
applicationKeys += "ctrl+s";
applicationKeys += ",";
applicationKeys += "ctrl+delete";
applicationKeys += ",";
applicationKeys += "f1";
applicationKeys += ",";
applicationKeys += "ctrl+shift+c";

var hotkeyList = "";

function execHotKey(e, h) {
    var hotkey_fired = false;
  switch (true) {
    case (["ctrl+shift+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_fim");
      break;
    case (["ctrl+shift+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ini");
      break;
    case (["ctrl+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ava");
      break;
    case (["ctrl+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ret");
      break;
    case (["alt+q"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_sai");
      break;
    case (["escape"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_cnl");
      break;
    case (["ctrl+enter"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_inc");
      break;
    case (["ctrl+s"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_alt");
      break;
    case (["ctrl+delete"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_exc");
      break;
    case (["f1"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_webh");
      break;
    case (["ctrl+shift+c"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_copy");
      break;
    default:
      return true;
  }
  if (hotkey_fired) {
        e.preventDefault();
        return false;
    } else {
        return true;
    }
}
</script>

<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys.inc.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys_setup.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
<script type="text/javascript">

function process_hotkeys(hotkey)
{
  if (hotkey == "sys_format_fim") {
    if (typeof scBtnFn_sys_format_fim !== "undefined" && typeof scBtnFn_sys_format_fim === "function") {
      scBtnFn_sys_format_fim();
        return true;
    }
  }
  if (hotkey == "sys_format_ini") {
    if (typeof scBtnFn_sys_format_ini !== "undefined" && typeof scBtnFn_sys_format_ini === "function") {
      scBtnFn_sys_format_ini();
        return true;
    }
  }
  if (hotkey == "sys_format_ava") {
    if (typeof scBtnFn_sys_format_ava !== "undefined" && typeof scBtnFn_sys_format_ava === "function") {
      scBtnFn_sys_format_ava();
        return true;
    }
  }
  if (hotkey == "sys_format_ret") {
    if (typeof scBtnFn_sys_format_ret !== "undefined" && typeof scBtnFn_sys_format_ret === "function") {
      scBtnFn_sys_format_ret();
        return true;
    }
  }
  if (hotkey == "sys_format_sai") {
    if (typeof scBtnFn_sys_format_sai !== "undefined" && typeof scBtnFn_sys_format_sai === "function") {
      scBtnFn_sys_format_sai();
        return true;
    }
  }
  if (hotkey == "sys_format_cnl") {
    if (typeof scBtnFn_sys_format_cnl !== "undefined" && typeof scBtnFn_sys_format_cnl === "function") {
      scBtnFn_sys_format_cnl();
        return true;
    }
  }
  if (hotkey == "sys_format_inc") {
    if (typeof scBtnFn_sys_format_inc !== "undefined" && typeof scBtnFn_sys_format_inc === "function") {
      scBtnFn_sys_format_inc();
        return true;
    }
  }
  if (hotkey == "sys_format_alt") {
    if (typeof scBtnFn_sys_format_alt !== "undefined" && typeof scBtnFn_sys_format_alt === "function") {
      scBtnFn_sys_format_alt();
        return true;
    }
  }
  if (hotkey == "sys_format_exc") {
    if (typeof scBtnFn_sys_format_exc !== "undefined" && typeof scBtnFn_sys_format_exc === "function") {
      scBtnFn_sys_format_exc();
        return true;
    }
  }
  if (hotkey == "sys_format_webh") {
    if (typeof scBtnFn_sys_format_webh !== "undefined" && typeof scBtnFn_sys_format_webh === "function") {
      scBtnFn_sys_format_webh();
        return true;
    }
  }
  if (hotkey == "sys_format_copy") {
    if (typeof scBtnFn_sys_format_copy !== "undefined" && typeof scBtnFn_sys_format_copy === "function") {
      scBtnFn_sys_format_copy();
        return true;
    }
  }
    return false;
}

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $("#hidden_bloco_0,#hidden_bloco_1,#hidden_bloco_2,#hidden_bloco_3,#hidden_bloco_4,#hidden_bloco_5").each(function() {
   $(this.rows[0]).bind("click", {block: this}, toggleBlock)
                  .mouseover(function() { $(this).css("cursor", "pointer"); })
                  .mouseout(function() { $(this).css("cursor", ""); });
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
     if ($('#t').length>0) {
         scQuickSearchKeyUp('t', null);
     }
     $("#fast_search_f0_t").select2({
        containerCssClass: 'scGridQuickSearchDivResult',
        dropdownCssClass: 'scGridQuickSearchDivDropdown',
        placeholder: '<?php echo $this->Ini->Nm_lang['lang_srch_all_fields'] ?>',
    });
     $("#cond_fast_search_f0_t").select2({
        containerCssClass: 'scGridQuickSearchDivResult',
        dropdownCssClass: 'scGridQuickSearchDivDropdown',
        minimumResultsForSearch: -1
    });
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchKeyUp(sPos, e) {
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
       else
       {
           $('#SC_fast_search_submit_'+sPos).show();
       }
     }
   }
   function nm_gp_submit_qsearch(pos)
   {
        nm_move('fast_search', pos);
   }
   function nm_gp_open_qsearch_div(pos)
   {
        if($('#SC_fast_search_dropdown_' + pos).hasClass('fa-caret-down'))
        {
            if(($('#quicksearchph_' + pos).offset().top+$('#id_qs_div_' + pos).height()+10) >= $(document).height())
            {
                $('#id_qs_div_' + pos).offset({top:($('#quicksearchph_' + pos).offset().top-($('#quicksearchph_' + pos).height()/2)-$('#id_qs_div_' + pos).height()-4)});
            }

            nm_gp_open_qsearch_div_store_temp(pos);
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-down').addClass('fa-caret-up');
        }
        else
        {
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-up').addClass('fa-caret-down');
        }
        $('#id_qs_div_' + pos).toggle();
   }

   var tmp_qs_arr_fields = [], tmp_qs_arr_cond = "";
   function nm_gp_open_qsearch_div_store_temp(pos)
   {
        tmp_qs_arr_fields = [], tmp_qs_str_cond = "";

        if($('#fast_search_f0_' + pos).prop('type') == 'select-multiple')
        {
            tmp_qs_arr_fields = $('#fast_search_f0_' + pos).val();
        }
        else
        {
            tmp_qs_arr_fields.push($('#fast_search_f0_' + pos).val());
        }

        tmp_qs_str_cond = $('#cond_fast_search_f0_' + pos).val();
   }

   function nm_gp_cancel_qsearch_div_store_temp(pos)
   {
        $('#fast_search_f0_' + pos).val('');
        $("#fast_search_f0_" + pos + " option").prop('selected', false);
        for(it=0; it<tmp_qs_arr_fields.length; it++)
        {
            $("#fast_search_f0_" + pos + " option[value='"+ tmp_qs_arr_fields[it] +"']").prop('selected', true);
        }
        $("#fast_search_f0_" + pos).change();
        tmp_qs_arr_fields = [];

        $('#cond_fast_search_f0_' + pos).val(tmp_qs_str_cond);
        $('#cond_fast_search_f0_' + pos).change();
        tmp_qs_str_cond = "";

        nm_gp_open_qsearch_div(pos);
   } if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
    "hidden_bloco_0": true,
    "hidden_bloco_1": true,
    "hidden_bloco_2": true,
    "hidden_bloco_3": true,
    "hidden_bloco_4": true,
    "hidden_bloco_5": true
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_iso_no_conformidad_js0.php");
?>
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
var scInsertFieldWithErrors = new Array();
<?php
foreach ($this->NM_ajax_info['fieldsWithErrors'] as $insertFieldName) {
?>
scInsertFieldWithErrors.push("<?php echo $insertFieldName; ?>");
<?php
}
?>
$(function() {
	scAjaxError_markFieldList(scInsertFieldWithErrors);
});
 </script>
<form  name="F1" method="post" 
               action="./" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_iso_no_conformidad'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_iso_no_conformidad'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage scFormToastMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<?php
if ($this->record_insert_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
?>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="60%">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['maximized']))
  {
?>
<tr><td>
   <TABLE width="100%" class="scFormHeader">
    <TR align="center">
     <TD style="padding: 0px">
      <TABLE style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%">
       <TR align="center" valign="middle">
        <TD align="left" rowspan="2" class="scFormHeaderFont">
          
        </TD>
        <TD class="scFormHeaderFont">
          <?php if ($this->nmgp_opcao == "novo") { echo "REGISTRO DE SOLICITUD DE NO CONFORMIDAD Y ACCION CORRECTIVA"; } else { echo "ACTUALIZACION DE SOLICITUD DE NO CONFORMIDAD Y ACCION CORRECTIVA"; } ?>
        </TD>
       </TR>
       <TR align="right" valign="middle">
        <TD class="scFormHeaderFont">
          <?php echo date($this->dateDefaultFormat()); ?>
        </TD>
       </TR>
      </TABLE>
     </TD>
    </TR>
   </TABLE></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['fast_search'][2] : "";
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <span id="quicksearchph_t" class="scFormToolbarInput" style='display: inline-block; vertical-align: inherit'>
              <span>
                  <input type="text" id="SC_fast_search_t" class="scFormToolbarInputText" style="border-width: 0px;;" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">&nbsp;
                  <i id='SC_fast_search_dropdown_t' style='cursor: pointer;' class='fas fa-caret-down' onclick="nm_gp_open_qsearch_div('t');"></i>
                  <img id="SC_fast_search_submit_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search ?>" onclick="nm_gp_submit_qsearch('t');">
                  <img style="display: <?php echo $stateSearchIconClose ?>" class='css_toolbar_obj_qs_search_img' id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean ?>" onclick="document.getElementById('SC_fast_search_t').value = '__Clear_Fast__'; nm_move('fast_search', 't');">
              </span>
                  <div id='id_qs_div_t' class='scGridQuickSearchDivMoldura' style='display:none; position:absolute;'>
                                  <div>
                                      <span >
                                        <p class='scGridQuickSearchDivLabel'><?php echo $this->Ini->Nm_lang['lang_btns_clmn'] ?></span></p>
          <select id='fast_search_f0_t' multiple=multiple  class="scFormToolbarInput" style="vertical-align: middle;" name="nmgp_fast_search_t" onChange="change_fast_t = 'CH';">
<?php 
          $SC_Label_atu['SC_all_Cmp'] = $this->Ini->Nm_lang['lang_srch_all_fields']; 
          $SC_Label_atu['iniciador'] = (isset($this->nm_new_label['iniciador'])) ? $this->nm_new_label['iniciador'] : 'Iniciador'; 
          $SC_Label_atu['aut_int_ext'] = (isset($this->nm_new_label['aut_int_ext'])) ? $this->nm_new_label['aut_int_ext'] : 'Auditoria Externa/Interna'; 
          $SC_Label_atu['fecha_apertura'] = (isset($this->nm_new_label['fecha_apertura'])) ? $this->nm_new_label['fecha_apertura'] : 'Fecha de apertura'; 
          $SC_Label_atu['nombre_proceso'] = (isset($this->nm_new_label['nombre_proceso'])) ? $this->nm_new_label['nombre_proceso'] : 'Nombre proceso o faceta'; 
          $SC_Label_atu['proces'] = (isset($this->nm_new_label['proces'])) ? $this->nm_new_label['proces'] : 'Proceso'; 
          $SC_Label_atu['fecha_cierre'] = (isset($this->nm_new_label['fecha_cierre'])) ? $this->nm_new_label['fecha_cierre'] : 'Fecha de cierre'; 
          $SC_Label_atu['sac'] = (isset($this->nm_new_label['sac'])) ? $this->nm_new_label['sac'] : 'SAC#'; 
          $SC_Label_atu['acc_correc'] = (isset($this->nm_new_label['acc_correc'])) ? $this->nm_new_label['acc_correc'] : 'Acción Correctiva'; 
          $SC_Label_atu['numero_parte'] = (isset($this->nm_new_label['numero_parte'])) ? $this->nm_new_label['numero_parte'] : 'Numero de parte (si aplica)'; 
          $SC_Label_atu['clausula_iso'] = (isset($this->nm_new_label['clausula_iso'])) ? $this->nm_new_label['clausula_iso'] : 'CLAUSULA ISO 9001:2015'; 
          $SC_Label_atu['contencion'] = (isset($this->nm_new_label['contencion'])) ? $this->nm_new_label['contencion'] : 'CONTENCION'; 
          $SC_Label_atu['descrip_problema'] = (isset($this->nm_new_label['descrip_problema'])) ? $this->nm_new_label['descrip_problema'] : 'DESCRIPCION DEL PROBLEMA'; 
          $SC_Label_atu['causa_raiz'] = (isset($this->nm_new_label['causa_raiz'])) ? $this->nm_new_label['causa_raiz'] : 'CAUSA RAIZ'; 
          $SC_Label_atu['imp_acc_correc'] = (isset($this->nm_new_label['imp_acc_correc'])) ? $this->nm_new_label['imp_acc_correc'] : 'IMPLEMENTAR ACCIONES CORRECTIVAS'; 
          $SC_Label_atu['fecha_compro'] = (isset($this->nm_new_label['fecha_compro'])) ? $this->nm_new_label['fecha_compro'] : 'Fecha de compromiso'; 
          $SC_Label_atu['responsable'] = (isset($this->nm_new_label['responsable'])) ? $this->nm_new_label['responsable'] : 'Responsable'; 
          $SC_Label_atu['fehca_real'] = (isset($this->nm_new_label['fehca_real'])) ? $this->nm_new_label['fehca_real'] : 'Fehca real'; 
          foreach ($SC_Label_atu as $CMP => $LABEL)
          {
              if($CMP == 'SC_all_Cmp')
                  continue;
              $OPC_sel = ($CMP == $OPC_cmp) ? " selected" : "";
              echo "           <option value='" . $CMP . "'" . $OPC_sel . ">" . $LABEL . "</option>";
          }
?> 
          </select>
                                      </span>
                                      <span >
                                        <p class='scGridQuickSearchDivLabel'><?php echo $this->Ini->Nm_lang['lang_quck_srchcond'] ?></span></p>
          <select id='cond_fast_search_f0_t' class="scFormToolbarInput" style="vertical-align: middle;display:;" name="nmgp_cond_fast_search_t" onChange="change_fast_t = 'CH';">
<?php 
          $OPC_sel = ("qp" == $OPC_arg) ? " selected" : "";
           echo "           <option value='qp'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_like'] . "</option>";
          $OPC_sel = ("ii" == $OPC_arg) ? " selected" : "";
           echo "           <option value='ii'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_stts_with'] . "</option>";
          $OPC_sel = ("eq" == $OPC_arg) ? " selected" : "";
           echo "           <option value='eq'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_exac'] . "</option>";
          $OPC_sel = ("np" == $OPC_arg) ? " selected" : "";
           echo "           <option value='np'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_not_like'] . "</option>";
?> 
          </select>
                                      </span>
                                  </div>
                                  <div class='scGridQuickSearchDivToolbar'>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar_appdiv", "nm_gp_cancel_qsearch_div_store_temp('t')", "nm_gp_cancel_qsearch_div_store_temp('t')", "qs_cancel", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>
       <?php echo nmButtonOutput($this->arr_buttons, "bapply_appdiv", "nm_gp_submit_qsearch('t');", "nm_gp_submit_qsearch('t');", "qs_search", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>
                                  </div>
                               </div>          </span>  </div>
  <?php
      }
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Delete)", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="6" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>DETECCION<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['iniciador']))
    {
        $this->nm_new_label['iniciador'] = "Iniciador";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $iniciador = $this->iniciador;
   $sStyleHidden_iniciador = '';
   if (isset($this->nmgp_cmp_hidden['iniciador']) && $this->nmgp_cmp_hidden['iniciador'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['iniciador']);
       $sStyleHidden_iniciador = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_iniciador = 'display: none;';
   $sStyleReadInp_iniciador = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['iniciador']) && $this->nmgp_cmp_readonly['iniciador'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['iniciador']);
       $sStyleReadLab_iniciador = '';
       $sStyleReadInp_iniciador = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['iniciador']) && $this->nmgp_cmp_hidden['iniciador'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="iniciador" value="<?php echo $this->form_encode_input($iniciador) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_iniciador_label" id="hidden_field_label_iniciador" style="<?php echo $sStyleHidden_iniciador; ?>"><span id="id_label_iniciador"><?php echo $this->nm_new_label['iniciador']; ?></span></TD>
    <TD class="scFormDataOdd css_iniciador_line" id="hidden_field_data_iniciador" style="<?php echo $sStyleHidden_iniciador; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_iniciador_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["iniciador"]) &&  $this->nmgp_cmp_readonly["iniciador"] == "on") { 

 ?>
<input type="hidden" name="iniciador" value="<?php echo $this->form_encode_input($iniciador) . "\">" . $iniciador . ""; ?>
<?php } else { ?>
<span id="id_read_on_iniciador" class="sc-ui-readonly-iniciador css_iniciador_line" style="<?php echo $sStyleReadLab_iniciador; ?>"><?php echo $this->form_format_readonly("iniciador", $this->form_encode_input($this->iniciador)); ?></span><span id="id_read_off_iniciador" class="css_read_off_iniciador" style="white-space: nowrap;<?php echo $sStyleReadInp_iniciador; ?>">
 <input class="sc-js-input scFormObjectOdd css_iniciador_obj" style="" id="id_sc_field_iniciador" type=text name="iniciador" value="<?php echo $this->form_encode_input($iniciador) ?>"
 size=50 maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_iniciador_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_iniciador_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['aut_int_ext']))
   {
       $this->nm_new_label['aut_int_ext'] = "Auditoria Externa/Interna";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $aut_int_ext = $this->aut_int_ext;
   $sStyleHidden_aut_int_ext = '';
   if (isset($this->nmgp_cmp_hidden['aut_int_ext']) && $this->nmgp_cmp_hidden['aut_int_ext'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['aut_int_ext']);
       $sStyleHidden_aut_int_ext = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_aut_int_ext = 'display: none;';
   $sStyleReadInp_aut_int_ext = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['aut_int_ext']) && $this->nmgp_cmp_readonly['aut_int_ext'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['aut_int_ext']);
       $sStyleReadLab_aut_int_ext = '';
       $sStyleReadInp_aut_int_ext = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['aut_int_ext']) && $this->nmgp_cmp_hidden['aut_int_ext'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="aut_int_ext" value="<?php echo $this->form_encode_input($this->aut_int_ext) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->aut_int_ext_1 = explode(";", trim($this->aut_int_ext));
  } 
  else
  {
      if (empty($this->aut_int_ext))
      {
          $this->aut_int_ext_1= array(); 
          $this->aut_int_ext= "no";
      } 
      else
      {
          $this->aut_int_ext_1= $this->aut_int_ext; 
          $this->aut_int_ext= ""; 
          foreach ($this->aut_int_ext_1 as $cada_aut_int_ext)
          {
             if (!empty($aut_int_ext))
             {
                 $this->aut_int_ext.= ";"; 
             } 
             $this->aut_int_ext.= $cada_aut_int_ext; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_aut_int_ext_label" id="hidden_field_label_aut_int_ext" style="<?php echo $sStyleHidden_aut_int_ext; ?>"><span id="id_label_aut_int_ext"><?php echo $this->nm_new_label['aut_int_ext']; ?></span></TD>
    <TD class="scFormDataOdd css_aut_int_ext_line" id="hidden_field_data_aut_int_ext" style="<?php echo $sStyleHidden_aut_int_ext; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_aut_int_ext_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["aut_int_ext"]) &&  $this->nmgp_cmp_readonly["aut_int_ext"] == "on") { 

$aut_int_ext_look = "";
 if ($this->aut_int_ext == "yes") { $aut_int_ext_look .= "Auditoria Internet/Externa" ;} 
 if (empty($aut_int_ext_look)) { $aut_int_ext_look = $this->aut_int_ext; }
?>
<input type="hidden" name="aut_int_ext" value="<?php echo $this->form_encode_input($aut_int_ext) . "\">" . $aut_int_ext_look . ""; ?>
<?php } else { ?>

<?php

$aut_int_ext_look = "";
 if ($this->aut_int_ext == "yes") { $aut_int_ext_look .= "Auditoria Internet/Externa" ;} 
 if (empty($aut_int_ext_look)) { $aut_int_ext_look = $this->aut_int_ext; }
?>
<span id="id_read_on_aut_int_ext" class="css_aut_int_ext_line" style="<?php echo $sStyleReadLab_aut_int_ext; ?>"><?php echo $this->form_format_readonly("aut_int_ext", $this->form_encode_input($aut_int_ext_look)); ?></span><span id="id_read_off_aut_int_ext" class="css_read_off_aut_int_ext css_aut_int_ext_line" style="<?php echo $sStyleReadInp_aut_int_ext; ?>"><?php echo "<div id=\"idAjaxCheckbox_aut_int_ext\" style=\"display: inline-block\" class=\"css_aut_int_ext_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_aut_int_ext_line"><?php $tempOptionId = "id-opt-aut_int_ext" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-aut_int_ext sc-ui-checkbox-aut_int_ext" name="aut_int_ext[]" value="yes"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['Lookup_aut_int_ext'][] = 'yes'; ?>
<?php  if (in_array("yes", $this->aut_int_ext_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>">Auditoria Internet/Externa</label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_aut_int_ext_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_aut_int_ext_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fecha_apertura']))
    {
        $this->nm_new_label['fecha_apertura'] = "Fecha de apertura";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecha_apertura = $this->fecha_apertura;
   $sStyleHidden_fecha_apertura = '';
   if (isset($this->nmgp_cmp_hidden['fecha_apertura']) && $this->nmgp_cmp_hidden['fecha_apertura'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_apertura']);
       $sStyleHidden_fecha_apertura = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_apertura = 'display: none;';
   $sStyleReadInp_fecha_apertura = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_apertura']) && $this->nmgp_cmp_readonly['fecha_apertura'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_apertura']);
       $sStyleReadLab_fecha_apertura = '';
       $sStyleReadInp_fecha_apertura = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_apertura']) && $this->nmgp_cmp_hidden['fecha_apertura'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_apertura" value="<?php echo $this->form_encode_input($fecha_apertura) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecha_apertura_label" id="hidden_field_label_fecha_apertura" style="<?php echo $sStyleHidden_fecha_apertura; ?>"><span id="id_label_fecha_apertura"><?php echo $this->nm_new_label['fecha_apertura']; ?></span></TD>
    <TD class="scFormDataOdd css_fecha_apertura_line" id="hidden_field_data_fecha_apertura" style="<?php echo $sStyleHidden_fecha_apertura; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_apertura_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha_apertura"]) &&  $this->nmgp_cmp_readonly["fecha_apertura"] == "on") { 

 ?>
<input type="hidden" name="fecha_apertura" value="<?php echo $this->form_encode_input($fecha_apertura) . "\">" . $fecha_apertura . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecha_apertura" class="sc-ui-readonly-fecha_apertura css_fecha_apertura_line" style="<?php echo $sStyleReadLab_fecha_apertura; ?>"><?php echo $this->form_format_readonly("fecha_apertura", $this->form_encode_input($fecha_apertura)); ?></span><span id="id_read_off_fecha_apertura" class="css_read_off_fecha_apertura" style="white-space: nowrap;<?php echo $sStyleReadInp_fecha_apertura; ?>"><?php
$tmp_form_data = $this->field_config['fecha_apertura']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_fecha_apertura_obj" style="" id="id_sc_field_fecha_apertura" type=text name="fecha_apertura" value="<?php echo $this->form_encode_input($fecha_apertura) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecha_apertura']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha_apertura']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_apertura_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_apertura_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre_proceso']))
    {
        $this->nm_new_label['nombre_proceso'] = "Nombre proceso o faceta";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_proceso = $this->nombre_proceso;
   $sStyleHidden_nombre_proceso = '';
   if (isset($this->nmgp_cmp_hidden['nombre_proceso']) && $this->nmgp_cmp_hidden['nombre_proceso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_proceso']);
       $sStyleHidden_nombre_proceso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_proceso = 'display: none;';
   $sStyleReadInp_nombre_proceso = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre_proceso']) && $this->nmgp_cmp_readonly['nombre_proceso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_proceso']);
       $sStyleReadLab_nombre_proceso = '';
       $sStyleReadInp_nombre_proceso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_proceso']) && $this->nmgp_cmp_hidden['nombre_proceso'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_proceso" value="<?php echo $this->form_encode_input($nombre_proceso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nombre_proceso_label" id="hidden_field_label_nombre_proceso" style="<?php echo $sStyleHidden_nombre_proceso; ?>"><span id="id_label_nombre_proceso"><?php echo $this->nm_new_label['nombre_proceso']; ?></span></TD>
    <TD class="scFormDataOdd css_nombre_proceso_line" id="hidden_field_data_nombre_proceso" style="<?php echo $sStyleHidden_nombre_proceso; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_proceso_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_proceso"]) &&  $this->nmgp_cmp_readonly["nombre_proceso"] == "on") { 

 ?>
<input type="hidden" name="nombre_proceso" value="<?php echo $this->form_encode_input($nombre_proceso) . "\">" . $nombre_proceso . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_proceso" class="sc-ui-readonly-nombre_proceso css_nombre_proceso_line" style="<?php echo $sStyleReadLab_nombre_proceso; ?>"><?php echo $this->form_format_readonly("nombre_proceso", $this->form_encode_input($this->nombre_proceso)); ?></span><span id="id_read_off_nombre_proceso" class="css_read_off_nombre_proceso" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_proceso; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre_proceso_obj" style="" id="id_sc_field_nombre_proceso" type=text name="nombre_proceso" value="<?php echo $this->form_encode_input($nombre_proceso) ?>"
 size=50 maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_proceso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_proceso_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['proces']))
   {
       $this->nm_new_label['proces'] = "Proceso";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $proces = $this->proces;
   $sStyleHidden_proces = '';
   if (isset($this->nmgp_cmp_hidden['proces']) && $this->nmgp_cmp_hidden['proces'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['proces']);
       $sStyleHidden_proces = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_proces = 'display: none;';
   $sStyleReadInp_proces = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['proces']) && $this->nmgp_cmp_readonly['proces'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['proces']);
       $sStyleReadLab_proces = '';
       $sStyleReadInp_proces = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['proces']) && $this->nmgp_cmp_hidden['proces'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="proces" value="<?php echo $this->form_encode_input($this->proces) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->proces_1 = explode(";", trim($this->proces));
  } 
  else
  {
      if (empty($this->proces))
      {
          $this->proces_1= array(); 
          $this->proces= "no";
      } 
      else
      {
          $this->proces_1= $this->proces; 
          $this->proces= ""; 
          foreach ($this->proces_1 as $cada_proces)
          {
             if (!empty($proces))
             {
                 $this->proces.= ";"; 
             } 
             $this->proces.= $cada_proces; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_proces_label" id="hidden_field_label_proces" style="<?php echo $sStyleHidden_proces; ?>"><span id="id_label_proces"><?php echo $this->nm_new_label['proces']; ?></span></TD>
    <TD class="scFormDataOdd css_proces_line" id="hidden_field_data_proces" style="<?php echo $sStyleHidden_proces; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_proces_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["proces"]) &&  $this->nmgp_cmp_readonly["proces"] == "on") { 

$proces_look = "";
 if ($this->proces == "yes") { $proces_look .= "Proceso" ;} 
 if (empty($proces_look)) { $proces_look = $this->proces; }
?>
<input type="hidden" name="proces" value="<?php echo $this->form_encode_input($proces) . "\">" . $proces_look . ""; ?>
<?php } else { ?>

<?php

$proces_look = "";
 if ($this->proces == "yes") { $proces_look .= "Proceso" ;} 
 if (empty($proces_look)) { $proces_look = $this->proces; }
?>
<span id="id_read_on_proces" class="css_proces_line" style="<?php echo $sStyleReadLab_proces; ?>"><?php echo $this->form_format_readonly("proces", $this->form_encode_input($proces_look)); ?></span><span id="id_read_off_proces" class="css_read_off_proces css_proces_line" style="<?php echo $sStyleReadInp_proces; ?>"><?php echo "<div id=\"idAjaxCheckbox_proces\" style=\"display: inline-block\" class=\"css_proces_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_proces_line"><?php $tempOptionId = "id-opt-proces" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-proces sc-ui-checkbox-proces" name="proces[]" value="yes"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['Lookup_proces'][] = 'yes'; ?>
<?php  if (in_array("yes", $this->proces_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>">Proceso</label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_proces_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_proces_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fecha_cierre']))
    {
        $this->nm_new_label['fecha_cierre'] = "Fecha de cierre";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecha_cierre = $this->fecha_cierre;
   $sStyleHidden_fecha_cierre = '';
   if (isset($this->nmgp_cmp_hidden['fecha_cierre']) && $this->nmgp_cmp_hidden['fecha_cierre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_cierre']);
       $sStyleHidden_fecha_cierre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_cierre = 'display: none;';
   $sStyleReadInp_fecha_cierre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_cierre']) && $this->nmgp_cmp_readonly['fecha_cierre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_cierre']);
       $sStyleReadLab_fecha_cierre = '';
       $sStyleReadInp_fecha_cierre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_cierre']) && $this->nmgp_cmp_hidden['fecha_cierre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_cierre" value="<?php echo $this->form_encode_input($fecha_cierre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecha_cierre_label" id="hidden_field_label_fecha_cierre" style="<?php echo $sStyleHidden_fecha_cierre; ?>"><span id="id_label_fecha_cierre"><?php echo $this->nm_new_label['fecha_cierre']; ?></span></TD>
    <TD class="scFormDataOdd css_fecha_cierre_line" id="hidden_field_data_fecha_cierre" style="<?php echo $sStyleHidden_fecha_cierre; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_cierre_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha_cierre"]) &&  $this->nmgp_cmp_readonly["fecha_cierre"] == "on") { 

 ?>
<input type="hidden" name="fecha_cierre" value="<?php echo $this->form_encode_input($fecha_cierre) . "\">" . $fecha_cierre . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecha_cierre" class="sc-ui-readonly-fecha_cierre css_fecha_cierre_line" style="<?php echo $sStyleReadLab_fecha_cierre; ?>"><?php echo $this->form_format_readonly("fecha_cierre", $this->form_encode_input($fecha_cierre)); ?></span><span id="id_read_off_fecha_cierre" class="css_read_off_fecha_cierre" style="white-space: nowrap;<?php echo $sStyleReadInp_fecha_cierre; ?>"><?php
$tmp_form_data = $this->field_config['fecha_cierre']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_fecha_cierre_obj" style="" id="id_sc_field_fecha_cierre" type=text name="fecha_cierre" value="<?php echo $this->form_encode_input($fecha_cierre) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecha_cierre']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha_cierre']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_cierre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_cierre_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sac']))
    {
        $this->nm_new_label['sac'] = "SAC#";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sac = $this->sac;
   $sStyleHidden_sac = '';
   if (isset($this->nmgp_cmp_hidden['sac']) && $this->nmgp_cmp_hidden['sac'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sac']);
       $sStyleHidden_sac = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sac = 'display: none;';
   $sStyleReadInp_sac = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sac']) && $this->nmgp_cmp_readonly['sac'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sac']);
       $sStyleReadLab_sac = '';
       $sStyleReadInp_sac = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sac']) && $this->nmgp_cmp_hidden['sac'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sac" value="<?php echo $this->form_encode_input($sac) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sac_label" id="hidden_field_label_sac" style="<?php echo $sStyleHidden_sac; ?>"><span id="id_label_sac"><?php echo $this->nm_new_label['sac']; ?></span></TD>
    <TD class="scFormDataOdd css_sac_line" id="hidden_field_data_sac" style="<?php echo $sStyleHidden_sac; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sac_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sac"]) &&  $this->nmgp_cmp_readonly["sac"] == "on") { 

 ?>
<input type="hidden" name="sac" value="<?php echo $this->form_encode_input($sac) . "\">" . $sac . ""; ?>
<?php } else { ?>
<span id="id_read_on_sac" class="sc-ui-readonly-sac css_sac_line" style="<?php echo $sStyleReadLab_sac; ?>"><?php echo $this->form_format_readonly("sac", $this->form_encode_input($this->sac)); ?></span><span id="id_read_off_sac" class="css_read_off_sac" style="white-space: nowrap;<?php echo $sStyleReadInp_sac; ?>">
 <input class="sc-js-input scFormObjectOdd css_sac_obj" style="" id="id_sc_field_sac" type=text name="sac" value="<?php echo $this->form_encode_input($sac) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sac_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sac_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['acc_correc']))
   {
       $this->nm_new_label['acc_correc'] = "Acción Correctiva";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $acc_correc = $this->acc_correc;
   $sStyleHidden_acc_correc = '';
   if (isset($this->nmgp_cmp_hidden['acc_correc']) && $this->nmgp_cmp_hidden['acc_correc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['acc_correc']);
       $sStyleHidden_acc_correc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_acc_correc = 'display: none;';
   $sStyleReadInp_acc_correc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['acc_correc']) && $this->nmgp_cmp_readonly['acc_correc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['acc_correc']);
       $sStyleReadLab_acc_correc = '';
       $sStyleReadInp_acc_correc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['acc_correc']) && $this->nmgp_cmp_hidden['acc_correc'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="acc_correc" value="<?php echo $this->form_encode_input($this->acc_correc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->acc_correc_1 = explode(";", trim($this->acc_correc));
  } 
  else
  {
      if (empty($this->acc_correc))
      {
          $this->acc_correc_1= array(); 
          $this->acc_correc= "no";
      } 
      else
      {
          $this->acc_correc_1= $this->acc_correc; 
          $this->acc_correc= ""; 
          foreach ($this->acc_correc_1 as $cada_acc_correc)
          {
             if (!empty($acc_correc))
             {
                 $this->acc_correc.= ";"; 
             } 
             $this->acc_correc.= $cada_acc_correc; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_acc_correc_label" id="hidden_field_label_acc_correc" style="<?php echo $sStyleHidden_acc_correc; ?>"><span id="id_label_acc_correc"><?php echo $this->nm_new_label['acc_correc']; ?></span></TD>
    <TD class="scFormDataOdd css_acc_correc_line" id="hidden_field_data_acc_correc" style="<?php echo $sStyleHidden_acc_correc; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_acc_correc_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["acc_correc"]) &&  $this->nmgp_cmp_readonly["acc_correc"] == "on") { 

$acc_correc_look = "";
 if ($this->acc_correc == "yes") { $acc_correc_look .= "Acción Correctiva" ;} 
 if (empty($acc_correc_look)) { $acc_correc_look = $this->acc_correc; }
?>
<input type="hidden" name="acc_correc" value="<?php echo $this->form_encode_input($acc_correc) . "\">" . $acc_correc_look . ""; ?>
<?php } else { ?>

<?php

$acc_correc_look = "";
 if ($this->acc_correc == "yes") { $acc_correc_look .= "Acción Correctiva" ;} 
 if (empty($acc_correc_look)) { $acc_correc_look = $this->acc_correc; }
?>
<span id="id_read_on_acc_correc" class="css_acc_correc_line" style="<?php echo $sStyleReadLab_acc_correc; ?>"><?php echo $this->form_format_readonly("acc_correc", $this->form_encode_input($acc_correc_look)); ?></span><span id="id_read_off_acc_correc" class="css_read_off_acc_correc css_acc_correc_line" style="<?php echo $sStyleReadInp_acc_correc; ?>"><?php echo "<div id=\"idAjaxCheckbox_acc_correc\" style=\"display: inline-block\" class=\"css_acc_correc_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_acc_correc_line"><?php $tempOptionId = "id-opt-acc_correc" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-acc_correc sc-ui-checkbox-acc_correc" name="acc_correc[]" value="yes"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['Lookup_acc_correc'][] = 'yes'; ?>
<?php  if (in_array("yes", $this->acc_correc_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>">Acción Correctiva</label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_acc_correc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_acc_correc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['numero_parte']))
    {
        $this->nm_new_label['numero_parte'] = "Numero de parte (si aplica)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numero_parte = $this->numero_parte;
   $sStyleHidden_numero_parte = '';
   if (isset($this->nmgp_cmp_hidden['numero_parte']) && $this->nmgp_cmp_hidden['numero_parte'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numero_parte']);
       $sStyleHidden_numero_parte = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numero_parte = 'display: none;';
   $sStyleReadInp_numero_parte = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numero_parte']) && $this->nmgp_cmp_readonly['numero_parte'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numero_parte']);
       $sStyleReadLab_numero_parte = '';
       $sStyleReadInp_numero_parte = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numero_parte']) && $this->nmgp_cmp_hidden['numero_parte'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero_parte" value="<?php echo $this->form_encode_input($numero_parte) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_numero_parte_label" id="hidden_field_label_numero_parte" style="<?php echo $sStyleHidden_numero_parte; ?>"><span id="id_label_numero_parte"><?php echo $this->nm_new_label['numero_parte']; ?></span></TD>
    <TD class="scFormDataOdd css_numero_parte_line" id="hidden_field_data_numero_parte" style="<?php echo $sStyleHidden_numero_parte; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numero_parte_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numero_parte"]) &&  $this->nmgp_cmp_readonly["numero_parte"] == "on") { 

 ?>
<input type="hidden" name="numero_parte" value="<?php echo $this->form_encode_input($numero_parte) . "\">" . $numero_parte . ""; ?>
<?php } else { ?>
<span id="id_read_on_numero_parte" class="sc-ui-readonly-numero_parte css_numero_parte_line" style="<?php echo $sStyleReadLab_numero_parte; ?>"><?php echo $this->form_format_readonly("numero_parte", $this->form_encode_input($this->numero_parte)); ?></span><span id="id_read_off_numero_parte" class="css_read_off_numero_parte" style="white-space: nowrap;<?php echo $sStyleReadInp_numero_parte; ?>">
 <input class="sc-js-input scFormObjectOdd css_numero_parte_obj" style="" id="id_sc_field_numero_parte" type=text name="numero_parte" value="<?php echo $this->form_encode_input($numero_parte) ?>"
 size=50 maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numero_parte_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero_parte_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>CLAUSULA ISO 9001:2015<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['clausula_iso']))
    {
        $this->nm_new_label['clausula_iso'] = "CLAUSULA ISO 9001:2015";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $clausula_iso = $this->clausula_iso;
   $sStyleHidden_clausula_iso = '';
   if (isset($this->nmgp_cmp_hidden['clausula_iso']) && $this->nmgp_cmp_hidden['clausula_iso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['clausula_iso']);
       $sStyleHidden_clausula_iso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_clausula_iso = 'display: none;';
   $sStyleReadInp_clausula_iso = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['clausula_iso']) && $this->nmgp_cmp_readonly['clausula_iso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['clausula_iso']);
       $sStyleReadLab_clausula_iso = '';
       $sStyleReadInp_clausula_iso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['clausula_iso']) && $this->nmgp_cmp_hidden['clausula_iso'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="clausula_iso" value="<?php echo $this->form_encode_input($clausula_iso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_clausula_iso_label" id="hidden_field_label_clausula_iso" style="<?php echo $sStyleHidden_clausula_iso; ?>"><span id="id_label_clausula_iso"><?php echo $this->nm_new_label['clausula_iso']; ?></span></TD>
    <TD class="scFormDataOdd css_clausula_iso_line" id="hidden_field_data_clausula_iso" style="<?php echo $sStyleHidden_clausula_iso; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_clausula_iso_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["clausula_iso"]) &&  $this->nmgp_cmp_readonly["clausula_iso"] == "on") { 

 ?>
<input type="hidden" name="clausula_iso" value="<?php echo $this->form_encode_input($clausula_iso) . "\">" . $clausula_iso . ""; ?>
<?php } else { ?>
<span id="id_read_on_clausula_iso" class="sc-ui-readonly-clausula_iso css_clausula_iso_line" style="<?php echo $sStyleReadLab_clausula_iso; ?>"><?php echo $this->form_format_readonly("clausula_iso", $this->form_encode_input($this->clausula_iso)); ?></span><span id="id_read_off_clausula_iso" class="css_read_off_clausula_iso" style="white-space: nowrap;<?php echo $sStyleReadInp_clausula_iso; ?>">
 <input class="sc-js-input scFormObjectOdd css_clausula_iso_obj" style="" id="id_sc_field_clausula_iso" type=text name="clausula_iso" value="<?php echo $this->form_encode_input($clausula_iso) ?>"
 size=50 maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_clausula_iso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_clausula_iso_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf2\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>CONTENCION<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contencion']))
    {
        $this->nm_new_label['contencion'] = "CONTENCION";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contencion = $this->contencion;
   $sStyleHidden_contencion = '';
   if (isset($this->nmgp_cmp_hidden['contencion']) && $this->nmgp_cmp_hidden['contencion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contencion']);
       $sStyleHidden_contencion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contencion = 'display: none;';
   $sStyleReadInp_contencion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contencion']) && $this->nmgp_cmp_readonly['contencion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contencion']);
       $sStyleReadLab_contencion = '';
       $sStyleReadInp_contencion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contencion']) && $this->nmgp_cmp_hidden['contencion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contencion" value="<?php echo $this->form_encode_input($contencion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_contencion_label" id="hidden_field_label_contencion" style="<?php echo $sStyleHidden_contencion; ?>"><span id="id_label_contencion"><?php echo $this->nm_new_label['contencion']; ?></span></TD>
    <TD class="scFormDataOdd css_contencion_line" id="hidden_field_data_contencion" style="<?php echo $sStyleHidden_contencion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contencion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contencion"]) &&  $this->nmgp_cmp_readonly["contencion"] == "on") { 

 ?>
<input type="hidden" name="contencion" value="<?php echo $this->form_encode_input($contencion) . "\">" . $contencion . ""; ?>
<?php } else { ?>
<span id="id_read_on_contencion" class="sc-ui-readonly-contencion css_contencion_line" style="<?php echo $sStyleReadLab_contencion; ?>"><?php echo $this->form_format_readonly("contencion", $this->form_encode_input($this->contencion)); ?></span><span id="id_read_off_contencion" class="css_read_off_contencion" style="white-space: nowrap;<?php echo $sStyleReadInp_contencion; ?>">
 <input class="sc-js-input scFormObjectOdd css_contencion_obj" style="" id="id_sc_field_contencion" type=text name="contencion" value="<?php echo $this->form_encode_input($contencion) ?>"
 size=50 maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contencion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contencion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf3\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>DESCRIPCION DEL PROBLEMA<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descrip_problema']))
    {
        $this->nm_new_label['descrip_problema'] = "DESCRIPCION DEL PROBLEMA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descrip_problema = $this->descrip_problema;
   $sStyleHidden_descrip_problema = '';
   if (isset($this->nmgp_cmp_hidden['descrip_problema']) && $this->nmgp_cmp_hidden['descrip_problema'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descrip_problema']);
       $sStyleHidden_descrip_problema = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descrip_problema = 'display: none;';
   $sStyleReadInp_descrip_problema = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descrip_problema']) && $this->nmgp_cmp_readonly['descrip_problema'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descrip_problema']);
       $sStyleReadLab_descrip_problema = '';
       $sStyleReadInp_descrip_problema = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descrip_problema']) && $this->nmgp_cmp_hidden['descrip_problema'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descrip_problema" value="<?php echo $this->form_encode_input($descrip_problema) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_descrip_problema_label" id="hidden_field_label_descrip_problema" style="<?php echo $sStyleHidden_descrip_problema; ?>"><span id="id_label_descrip_problema"><?php echo $this->nm_new_label['descrip_problema']; ?></span></TD>
    <TD class="scFormDataOdd css_descrip_problema_line" id="hidden_field_data_descrip_problema" style="<?php echo $sStyleHidden_descrip_problema; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descrip_problema_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descrip_problema"]) &&  $this->nmgp_cmp_readonly["descrip_problema"] == "on") { 

 ?>
<input type="hidden" name="descrip_problema" value="<?php echo $this->form_encode_input($descrip_problema) . "\">" . $descrip_problema . ""; ?>
<?php } else { ?>
<span id="id_read_on_descrip_problema" class="sc-ui-readonly-descrip_problema css_descrip_problema_line" style="<?php echo $sStyleReadLab_descrip_problema; ?>"><?php echo $this->form_format_readonly("descrip_problema", $this->form_encode_input($this->descrip_problema)); ?></span><span id="id_read_off_descrip_problema" class="css_read_off_descrip_problema" style="white-space: nowrap;<?php echo $sStyleReadInp_descrip_problema; ?>">
 <input class="sc-js-input scFormObjectOdd css_descrip_problema_obj" style="" id="id_sc_field_descrip_problema" type=text name="descrip_problema" value="<?php echo $this->form_encode_input($descrip_problema) ?>"
 size=50 maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descrip_problema_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descrip_problema_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf4\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>CAUSA RAIZ<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['causa_raiz']))
    {
        $this->nm_new_label['causa_raiz'] = "CAUSA RAIZ";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $causa_raiz = $this->causa_raiz;
   $sStyleHidden_causa_raiz = '';
   if (isset($this->nmgp_cmp_hidden['causa_raiz']) && $this->nmgp_cmp_hidden['causa_raiz'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['causa_raiz']);
       $sStyleHidden_causa_raiz = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_causa_raiz = 'display: none;';
   $sStyleReadInp_causa_raiz = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['causa_raiz']) && $this->nmgp_cmp_readonly['causa_raiz'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['causa_raiz']);
       $sStyleReadLab_causa_raiz = '';
       $sStyleReadInp_causa_raiz = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['causa_raiz']) && $this->nmgp_cmp_hidden['causa_raiz'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="causa_raiz" value="<?php echo $this->form_encode_input($causa_raiz) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_causa_raiz_label" id="hidden_field_label_causa_raiz" style="<?php echo $sStyleHidden_causa_raiz; ?>"><span id="id_label_causa_raiz"><?php echo $this->nm_new_label['causa_raiz']; ?></span></TD>
    <TD class="scFormDataOdd css_causa_raiz_line" id="hidden_field_data_causa_raiz" style="<?php echo $sStyleHidden_causa_raiz; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_causa_raiz_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["causa_raiz"]) &&  $this->nmgp_cmp_readonly["causa_raiz"] == "on") { 

 ?>
<input type="hidden" name="causa_raiz" value="<?php echo $this->form_encode_input($causa_raiz) . "\">" . $causa_raiz . ""; ?>
<?php } else { ?>
<span id="id_read_on_causa_raiz" class="sc-ui-readonly-causa_raiz css_causa_raiz_line" style="<?php echo $sStyleReadLab_causa_raiz; ?>"><?php echo $this->form_format_readonly("causa_raiz", $this->form_encode_input($this->causa_raiz)); ?></span><span id="id_read_off_causa_raiz" class="css_read_off_causa_raiz" style="white-space: nowrap;<?php echo $sStyleReadInp_causa_raiz; ?>">
 <input class="sc-js-input scFormObjectOdd css_causa_raiz_obj" style="" id="id_sc_field_causa_raiz" type=text name="causa_raiz" value="<?php echo $this->form_encode_input($causa_raiz) ?>"
 size=50 maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_causa_raiz_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_causa_raiz_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_5"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_5"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="4" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf5\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>IMPLEMENTAR ACCIONES CORRECTIVAS<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['imp_acc_correc']))
    {
        $this->nm_new_label['imp_acc_correc'] = "IMPLEMENTAR ACCIONES CORRECTIVAS";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $imp_acc_correc = $this->imp_acc_correc;
   $sStyleHidden_imp_acc_correc = '';
   if (isset($this->nmgp_cmp_hidden['imp_acc_correc']) && $this->nmgp_cmp_hidden['imp_acc_correc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['imp_acc_correc']);
       $sStyleHidden_imp_acc_correc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_imp_acc_correc = 'display: none;';
   $sStyleReadInp_imp_acc_correc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['imp_acc_correc']) && $this->nmgp_cmp_readonly['imp_acc_correc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['imp_acc_correc']);
       $sStyleReadLab_imp_acc_correc = '';
       $sStyleReadInp_imp_acc_correc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['imp_acc_correc']) && $this->nmgp_cmp_hidden['imp_acc_correc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="imp_acc_correc" value="<?php echo $this->form_encode_input($imp_acc_correc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_imp_acc_correc_label" id="hidden_field_label_imp_acc_correc" style="<?php echo $sStyleHidden_imp_acc_correc; ?>"><span id="id_label_imp_acc_correc"><?php echo $this->nm_new_label['imp_acc_correc']; ?></span></TD>
    <TD class="scFormDataOdd css_imp_acc_correc_line" id="hidden_field_data_imp_acc_correc" style="<?php echo $sStyleHidden_imp_acc_correc; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_imp_acc_correc_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["imp_acc_correc"]) &&  $this->nmgp_cmp_readonly["imp_acc_correc"] == "on") { 

 ?>
<input type="hidden" name="imp_acc_correc" value="<?php echo $this->form_encode_input($imp_acc_correc) . "\">" . $imp_acc_correc . ""; ?>
<?php } else { ?>
<span id="id_read_on_imp_acc_correc" class="sc-ui-readonly-imp_acc_correc css_imp_acc_correc_line" style="<?php echo $sStyleReadLab_imp_acc_correc; ?>"><?php echo $this->form_format_readonly("imp_acc_correc", $this->form_encode_input($this->imp_acc_correc)); ?></span><span id="id_read_off_imp_acc_correc" class="css_read_off_imp_acc_correc" style="white-space: nowrap;<?php echo $sStyleReadInp_imp_acc_correc; ?>">
 <input class="sc-js-input scFormObjectOdd css_imp_acc_correc_obj" style="" id="id_sc_field_imp_acc_correc" type=text name="imp_acc_correc" value="<?php echo $this->form_encode_input($imp_acc_correc) ?>"
 size=50 maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_imp_acc_correc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_imp_acc_correc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fecha_compro']))
    {
        $this->nm_new_label['fecha_compro'] = "Fecha de compromiso";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecha_compro = $this->fecha_compro;
   $sStyleHidden_fecha_compro = '';
   if (isset($this->nmgp_cmp_hidden['fecha_compro']) && $this->nmgp_cmp_hidden['fecha_compro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_compro']);
       $sStyleHidden_fecha_compro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_compro = 'display: none;';
   $sStyleReadInp_fecha_compro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_compro']) && $this->nmgp_cmp_readonly['fecha_compro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_compro']);
       $sStyleReadLab_fecha_compro = '';
       $sStyleReadInp_fecha_compro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_compro']) && $this->nmgp_cmp_hidden['fecha_compro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_compro" value="<?php echo $this->form_encode_input($fecha_compro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecha_compro_label" id="hidden_field_label_fecha_compro" style="<?php echo $sStyleHidden_fecha_compro; ?>"><span id="id_label_fecha_compro"><?php echo $this->nm_new_label['fecha_compro']; ?></span></TD>
    <TD class="scFormDataOdd css_fecha_compro_line" id="hidden_field_data_fecha_compro" style="<?php echo $sStyleHidden_fecha_compro; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_compro_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha_compro"]) &&  $this->nmgp_cmp_readonly["fecha_compro"] == "on") { 

 ?>
<input type="hidden" name="fecha_compro" value="<?php echo $this->form_encode_input($fecha_compro) . "\">" . $fecha_compro . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecha_compro" class="sc-ui-readonly-fecha_compro css_fecha_compro_line" style="<?php echo $sStyleReadLab_fecha_compro; ?>"><?php echo $this->form_format_readonly("fecha_compro", $this->form_encode_input($fecha_compro)); ?></span><span id="id_read_off_fecha_compro" class="css_read_off_fecha_compro" style="white-space: nowrap;<?php echo $sStyleReadInp_fecha_compro; ?>"><?php
$tmp_form_data = $this->field_config['fecha_compro']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_fecha_compro_obj" style="" id="id_sc_field_fecha_compro" type=text name="fecha_compro" value="<?php echo $this->form_encode_input($fecha_compro) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecha_compro']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha_compro']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_compro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_compro_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['responsable']))
    {
        $this->nm_new_label['responsable'] = "Responsable";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $responsable = $this->responsable;
   $sStyleHidden_responsable = '';
   if (isset($this->nmgp_cmp_hidden['responsable']) && $this->nmgp_cmp_hidden['responsable'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['responsable']);
       $sStyleHidden_responsable = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_responsable = 'display: none;';
   $sStyleReadInp_responsable = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['responsable']) && $this->nmgp_cmp_readonly['responsable'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['responsable']);
       $sStyleReadLab_responsable = '';
       $sStyleReadInp_responsable = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['responsable']) && $this->nmgp_cmp_hidden['responsable'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="responsable" value="<?php echo $this->form_encode_input($responsable) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_responsable_label" id="hidden_field_label_responsable" style="<?php echo $sStyleHidden_responsable; ?>"><span id="id_label_responsable"><?php echo $this->nm_new_label['responsable']; ?></span></TD>
    <TD class="scFormDataOdd css_responsable_line" id="hidden_field_data_responsable" style="<?php echo $sStyleHidden_responsable; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_responsable_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["responsable"]) &&  $this->nmgp_cmp_readonly["responsable"] == "on") { 

 ?>
<input type="hidden" name="responsable" value="<?php echo $this->form_encode_input($responsable) . "\">" . $responsable . ""; ?>
<?php } else { ?>
<span id="id_read_on_responsable" class="sc-ui-readonly-responsable css_responsable_line" style="<?php echo $sStyleReadLab_responsable; ?>"><?php echo $this->form_format_readonly("responsable", $this->form_encode_input($this->responsable)); ?></span><span id="id_read_off_responsable" class="css_read_off_responsable" style="white-space: nowrap;<?php echo $sStyleReadInp_responsable; ?>">
 <input class="sc-js-input scFormObjectOdd css_responsable_obj" style="" id="id_sc_field_responsable" type=text name="responsable" value="<?php echo $this->form_encode_input($responsable) ?>"
 size=50 maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_responsable_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_responsable_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fehca_real']))
    {
        $this->nm_new_label['fehca_real'] = "Fehca real";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fehca_real = $this->fehca_real;
   $sStyleHidden_fehca_real = '';
   if (isset($this->nmgp_cmp_hidden['fehca_real']) && $this->nmgp_cmp_hidden['fehca_real'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fehca_real']);
       $sStyleHidden_fehca_real = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fehca_real = 'display: none;';
   $sStyleReadInp_fehca_real = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fehca_real']) && $this->nmgp_cmp_readonly['fehca_real'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fehca_real']);
       $sStyleReadLab_fehca_real = '';
       $sStyleReadInp_fehca_real = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fehca_real']) && $this->nmgp_cmp_hidden['fehca_real'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fehca_real" value="<?php echo $this->form_encode_input($fehca_real) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fehca_real_label" id="hidden_field_label_fehca_real" style="<?php echo $sStyleHidden_fehca_real; ?>"><span id="id_label_fehca_real"><?php echo $this->nm_new_label['fehca_real']; ?></span></TD>
    <TD class="scFormDataOdd css_fehca_real_line" id="hidden_field_data_fehca_real" style="<?php echo $sStyleHidden_fehca_real; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fehca_real_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fehca_real"]) &&  $this->nmgp_cmp_readonly["fehca_real"] == "on") { 

 ?>
<input type="hidden" name="fehca_real" value="<?php echo $this->form_encode_input($fehca_real) . "\">" . $fehca_real . ""; ?>
<?php } else { ?>
<span id="id_read_on_fehca_real" class="sc-ui-readonly-fehca_real css_fehca_real_line" style="<?php echo $sStyleReadLab_fehca_real; ?>"><?php echo $this->form_format_readonly("fehca_real", $this->form_encode_input($fehca_real)); ?></span><span id="id_read_off_fehca_real" class="css_read_off_fehca_real" style="white-space: nowrap;<?php echo $sStyleReadInp_fehca_real; ?>"><?php
$tmp_form_data = $this->field_config['fehca_real']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_fehca_real_obj" style="" id="id_sc_field_fehca_real" type=text name="fehca_real" value="<?php echo $this->form_encode_input($fehca_real) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fehca_real']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fehca_real']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fehca_real_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fehca_real_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['masterValue']);
?>
}
<?php
    }
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_iso_no_conformidad");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_iso_no_conformidad");
 parent.scAjaxDetailHeight("form_iso_no_conformidad", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_iso_no_conformidad", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_iso_no_conformidad", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
    $isToast   = isset($this->NM_ajax_info['displayMsgToast']) && $this->NM_ajax_info['displayMsgToast'] ? 'true' : 'false';
    $toastType = $isToast && isset($this->NM_ajax_info['displayMsgToastType']) ? $this->NM_ajax_info['displayMsgToastType'] : '';
?>
<script type="text/javascript">
_scAjaxShowMessage({title: scMsgDefTitle, message: "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: <?php echo $isToast ?>, toastPos: "", type: "<?php echo $toastType ?>"});
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
if ($this->nmgp_form_empty) {
?>
<script type="text/javascript">
scAjax_displayEmptyForm();
</script>
<?php
}
?>
<script type="text/javascript">
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-1").length && $("#sc_b_sai_t.sc-unique-btn-1").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-2").length && $("#sc_b_sai_t.sc-unique-btn-2").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_t.sc-unique-btn-4").length && $("#sc_b_new_t.sc-unique-btn-4").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-5").length && $("#sc_b_ins_t.sc-unique-btn-5").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-6").length && $("#sc_b_upd_t.sc-unique-btn-6").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-7").length && $("#sc_b_del_t.sc-unique-btn-7").is(":visible")) {
			nm_atualiza ('excluir');
			 return;
		}
	}
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_iso_no_conformidad']['buttonStatus'] = $this->nmgp_botoes;
?>
<script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
</script>
</body> 
</html> 
