<?php

class grid_iso_no_conformidad_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Rtf_f);
          $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      else
      {
          $this->progress_bar_end();
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      if (isset($GLOBALS['nmgp_parms']) && !empty($GLOBALS['nmgp_parms'])) 
      { 
          $GLOBALS['nmgp_parms'] = str_replace("@aspass@", "'", $GLOBALS['nmgp_parms']);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $GLOBALS["nmgp_parms"]);
          $todo  = explode("?@?", $todox);
          foreach ($todo as $param)
          {
               $cadapar = explode("?#?", $param);
               if (1 < sizeof($cadapar))
               {
                   if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                   {
                       $cadapar[0] = substr($cadapar[0], 11);
                       $cadapar[1] = $_SESSION[$cadapar[1]];
                   }
                   if (isset($GLOBALS['sc_conv_var'][$cadapar[0]]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][$cadapar[0]];
                   }
                   elseif (isset($GLOBALS['sc_conv_var'][strtolower($cadapar[0])]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][strtolower($cadapar[0])];
                   }
                   nm_limpa_str_grid_iso_no_conformidad($cadapar[1]);
                   nm_protect_num_grid_iso_no_conformidad($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_iso_no_conformidad']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_iso_no_conformidad_total.class.php"); 
      $this->Tot      = new grid_iso_no_conformidad_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_iso_no_conformidad']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_iso_no_conformidad";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_iso_no_conformidad.rtf";
   }
   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }


   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_iso_no_conformidad']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_iso_no_conformidad']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_iso_no_conformidad']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->id = $Busca_temp['id']; 
          $tmp_pos = strpos($this->id, "##@@");
          if ($tmp_pos !== false && !is_array($this->id))
          {
              $this->id = substr($this->id, 0, $tmp_pos);
          }
          $this->iniciador = $Busca_temp['iniciador']; 
          $tmp_pos = strpos($this->iniciador, "##@@");
          if ($tmp_pos !== false && !is_array($this->iniciador))
          {
              $this->iniciador = substr($this->iniciador, 0, $tmp_pos);
          }
          $this->sac = $Busca_temp['sac']; 
          $tmp_pos = strpos($this->sac, "##@@");
          if ($tmp_pos !== false && !is_array($this->sac))
          {
              $this->sac = substr($this->sac, 0, $tmp_pos);
          }
          $this->nombre_proceso = $Busca_temp['nombre_proceso']; 
          $tmp_pos = strpos($this->nombre_proceso, "##@@");
          if ($tmp_pos !== false && !is_array($this->nombre_proceso))
          {
              $this->nombre_proceso = substr($this->nombre_proceso, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['iniciador'])) ? $this->New_label['iniciador'] : "Iniciador"; 
          if ($Cada_col == "iniciador" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sac'])) ? $this->New_label['sac'] : "Sac"; 
          if ($Cada_col == "sac" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nombre_proceso'])) ? $this->New_label['nombre_proceso'] : "Nombre Proceso"; 
          if ($Cada_col == "nombre_proceso" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_apertura'])) ? $this->New_label['fecha_apertura'] : "Fecha Apertura"; 
          if ($Cada_col == "fecha_apertura" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_cierre'])) ? $this->New_label['fecha_cierre'] : "Fecha Cierre"; 
          if ($Cada_col == "fecha_cierre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numero_parte'])) ? $this->New_label['numero_parte'] : "Numero Parte"; 
          if ($Cada_col == "numero_parte" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['clausula_iso'])) ? $this->New_label['clausula_iso'] : "Clausula Iso"; 
          if ($Cada_col == "clausula_iso" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['descrip_problema'])) ? $this->New_label['descrip_problema'] : "Descrip Problema"; 
          if ($Cada_col == "descrip_problema" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['contencion'])) ? $this->New_label['contencion'] : "Contencion"; 
          if ($Cada_col == "contencion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['causa_raiz'])) ? $this->New_label['causa_raiz'] : "Causa Raiz"; 
          if ($Cada_col == "causa_raiz" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['imp_acc_correc'])) ? $this->New_label['imp_acc_correc'] : "Imp Acc Correc"; 
          if ($Cada_col == "imp_acc_correc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['responsable'])) ? $this->New_label['responsable'] : "Responsable"; 
          if ($Cada_col == "responsable" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_compro'])) ? $this->New_label['fecha_compro'] : "Fecha Compro"; 
          if ($Cada_col == "fecha_compro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fehca_real'])) ? $this->New_label['fehca_real'] : "Fehca Real"; 
          if ($Cada_col == "fehca_real" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['id'])) ? $this->New_label['id'] : "Id"; 
          if ($Cada_col == "id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT iniciador, sac, nombre_proceso, str_replace (convert(char(10),fecha_apertura,102), '.', '-') + ' ' + convert(char(8),fecha_apertura,20), str_replace (convert(char(10),fecha_cierre,102), '.', '-') + ' ' + convert(char(8),fecha_cierre,20), numero_parte, clausula_iso, descrip_problema, contencion, causa_raiz, imp_acc_correc, responsable, str_replace (convert(char(10),fecha_compro,102), '.', '-') + ' ' + convert(char(8),fecha_compro,20), str_replace (convert(char(10),fehca_real,102), '.', '-') + ' ' + convert(char(8),fehca_real,20), id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT iniciador, sac, nombre_proceso, fecha_apertura, fecha_cierre, numero_parte, clausula_iso, descrip_problema, contencion, causa_raiz, imp_acc_correc, responsable, fecha_compro, fehca_real, id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT iniciador, sac, nombre_proceso, convert(char(23),fecha_apertura,121), convert(char(23),fecha_cierre,121), numero_parte, clausula_iso, descrip_problema, contencion, causa_raiz, imp_acc_correc, responsable, convert(char(23),fecha_compro,121), convert(char(23),fehca_real,121), id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT iniciador, sac, nombre_proceso, fecha_apertura, fecha_cierre, numero_parte, clausula_iso, descrip_problema, contencion, causa_raiz, imp_acc_correc, responsable, fecha_compro, fehca_real, id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT iniciador, sac, nombre_proceso, EXTEND(fecha_apertura, YEAR TO DAY), EXTEND(fecha_cierre, YEAR TO DAY), numero_parte, clausula_iso, descrip_problema, contencion, causa_raiz, imp_acc_correc, responsable, EXTEND(fecha_compro, YEAR TO DAY), EXTEND(fehca_real, YEAR TO DAY), id from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT iniciador, sac, nombre_proceso, fecha_apertura, fecha_cierre, numero_parte, clausula_iso, descrip_problema, contencion, causa_raiz, imp_acc_correc, responsable, fecha_compro, fehca_real, id from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select_count;
      $rt = $this->Db->Execute($nmgp_select_count);
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->count_ger = $rt->fields[0];
      $rt->Close();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Texto_tag .= "<tr>\r\n";
         $this->iniciador = $rs->fields[0] ;  
         $this->sac = $rs->fields[1] ;  
         $this->nombre_proceso = $rs->fields[2] ;  
         $this->fecha_apertura = $rs->fields[3] ;  
         $this->fecha_cierre = $rs->fields[4] ;  
         $this->numero_parte = $rs->fields[5] ;  
         $this->clausula_iso = $rs->fields[6] ;  
         $this->descrip_problema = $rs->fields[7] ;  
         $this->contencion = $rs->fields[8] ;  
         $this->causa_raiz = $rs->fields[9] ;  
         $this->imp_acc_correc = $rs->fields[10] ;  
         $this->responsable = $rs->fields[11] ;  
         $this->fecha_compro = $rs->fields[12] ;  
         $this->fehca_real = $rs->fields[13] ;  
         $this->id = $rs->fields[14] ;  
         $this->id = (string)$this->id;
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- iniciador
   function NM_export_iniciador()
   {
         $this->iniciador = html_entity_decode($this->iniciador, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->iniciador = strip_tags($this->iniciador);
         $this->iniciador = NM_charset_to_utf8($this->iniciador);
         $this->iniciador = str_replace('<', '&lt;', $this->iniciador);
         $this->iniciador = str_replace('>', '&gt;', $this->iniciador);
         $this->Texto_tag .= "<td>" . $this->iniciador . "</td>\r\n";
   }
   //----- sac
   function NM_export_sac()
   {
         $this->sac = html_entity_decode($this->sac, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sac = strip_tags($this->sac);
         $this->sac = NM_charset_to_utf8($this->sac);
         $this->sac = str_replace('<', '&lt;', $this->sac);
         $this->sac = str_replace('>', '&gt;', $this->sac);
         $this->Texto_tag .= "<td>" . $this->sac . "</td>\r\n";
   }
   //----- nombre_proceso
   function NM_export_nombre_proceso()
   {
         $this->nombre_proceso = html_entity_decode($this->nombre_proceso, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nombre_proceso = strip_tags($this->nombre_proceso);
         $this->nombre_proceso = NM_charset_to_utf8($this->nombre_proceso);
         $this->nombre_proceso = str_replace('<', '&lt;', $this->nombre_proceso);
         $this->nombre_proceso = str_replace('>', '&gt;', $this->nombre_proceso);
         $this->Texto_tag .= "<td>" . $this->nombre_proceso . "</td>\r\n";
   }
   //----- fecha_apertura
   function NM_export_fecha_apertura()
   {
             $conteudo_x =  $this->fecha_apertura;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_apertura, "YYYY-MM-DD  ");
                 $this->fecha_apertura = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->fecha_apertura = NM_charset_to_utf8($this->fecha_apertura);
         $this->fecha_apertura = str_replace('<', '&lt;', $this->fecha_apertura);
         $this->fecha_apertura = str_replace('>', '&gt;', $this->fecha_apertura);
         $this->Texto_tag .= "<td>" . $this->fecha_apertura . "</td>\r\n";
   }
   //----- fecha_cierre
   function NM_export_fecha_cierre()
   {
             $conteudo_x =  $this->fecha_cierre;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_cierre, "YYYY-MM-DD  ");
                 $this->fecha_cierre = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->fecha_cierre = NM_charset_to_utf8($this->fecha_cierre);
         $this->fecha_cierre = str_replace('<', '&lt;', $this->fecha_cierre);
         $this->fecha_cierre = str_replace('>', '&gt;', $this->fecha_cierre);
         $this->Texto_tag .= "<td>" . $this->fecha_cierre . "</td>\r\n";
   }
   //----- numero_parte
   function NM_export_numero_parte()
   {
         $this->numero_parte = html_entity_decode($this->numero_parte, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numero_parte = strip_tags($this->numero_parte);
         $this->numero_parte = NM_charset_to_utf8($this->numero_parte);
         $this->numero_parte = str_replace('<', '&lt;', $this->numero_parte);
         $this->numero_parte = str_replace('>', '&gt;', $this->numero_parte);
         $this->Texto_tag .= "<td>" . $this->numero_parte . "</td>\r\n";
   }
   //----- clausula_iso
   function NM_export_clausula_iso()
   {
         $this->clausula_iso = html_entity_decode($this->clausula_iso, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->clausula_iso = strip_tags($this->clausula_iso);
         $this->clausula_iso = NM_charset_to_utf8($this->clausula_iso);
         $this->clausula_iso = str_replace('<', '&lt;', $this->clausula_iso);
         $this->clausula_iso = str_replace('>', '&gt;', $this->clausula_iso);
         $this->Texto_tag .= "<td>" . $this->clausula_iso . "</td>\r\n";
   }
   //----- descrip_problema
   function NM_export_descrip_problema()
   {
         $this->descrip_problema = html_entity_decode($this->descrip_problema, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->descrip_problema = strip_tags($this->descrip_problema);
         $this->descrip_problema = NM_charset_to_utf8($this->descrip_problema);
         $this->descrip_problema = str_replace('<', '&lt;', $this->descrip_problema);
         $this->descrip_problema = str_replace('>', '&gt;', $this->descrip_problema);
         $this->Texto_tag .= "<td>" . $this->descrip_problema . "</td>\r\n";
   }
   //----- contencion
   function NM_export_contencion()
   {
         $this->contencion = html_entity_decode($this->contencion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->contencion = strip_tags($this->contencion);
         $this->contencion = NM_charset_to_utf8($this->contencion);
         $this->contencion = str_replace('<', '&lt;', $this->contencion);
         $this->contencion = str_replace('>', '&gt;', $this->contencion);
         $this->Texto_tag .= "<td>" . $this->contencion . "</td>\r\n";
   }
   //----- causa_raiz
   function NM_export_causa_raiz()
   {
         $this->causa_raiz = html_entity_decode($this->causa_raiz, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->causa_raiz = strip_tags($this->causa_raiz);
         $this->causa_raiz = NM_charset_to_utf8($this->causa_raiz);
         $this->causa_raiz = str_replace('<', '&lt;', $this->causa_raiz);
         $this->causa_raiz = str_replace('>', '&gt;', $this->causa_raiz);
         $this->Texto_tag .= "<td>" . $this->causa_raiz . "</td>\r\n";
   }
   //----- imp_acc_correc
   function NM_export_imp_acc_correc()
   {
         $this->imp_acc_correc = html_entity_decode($this->imp_acc_correc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->imp_acc_correc = strip_tags($this->imp_acc_correc);
         $this->imp_acc_correc = NM_charset_to_utf8($this->imp_acc_correc);
         $this->imp_acc_correc = str_replace('<', '&lt;', $this->imp_acc_correc);
         $this->imp_acc_correc = str_replace('>', '&gt;', $this->imp_acc_correc);
         $this->Texto_tag .= "<td>" . $this->imp_acc_correc . "</td>\r\n";
   }
   //----- responsable
   function NM_export_responsable()
   {
         $this->responsable = html_entity_decode($this->responsable, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->responsable = strip_tags($this->responsable);
         $this->responsable = NM_charset_to_utf8($this->responsable);
         $this->responsable = str_replace('<', '&lt;', $this->responsable);
         $this->responsable = str_replace('>', '&gt;', $this->responsable);
         $this->Texto_tag .= "<td>" . $this->responsable . "</td>\r\n";
   }
   //----- fecha_compro
   function NM_export_fecha_compro()
   {
             $conteudo_x =  $this->fecha_compro;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_compro, "YYYY-MM-DD  ");
                 $this->fecha_compro = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->fecha_compro = NM_charset_to_utf8($this->fecha_compro);
         $this->fecha_compro = str_replace('<', '&lt;', $this->fecha_compro);
         $this->fecha_compro = str_replace('>', '&gt;', $this->fecha_compro);
         $this->Texto_tag .= "<td>" . $this->fecha_compro . "</td>\r\n";
   }
   //----- fehca_real
   function NM_export_fehca_real()
   {
             $conteudo_x =  $this->fehca_real;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fehca_real, "YYYY-MM-DD  ");
                 $this->fehca_real = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->fehca_real = NM_charset_to_utf8($this->fehca_real);
         $this->fehca_real = str_replace('<', '&lt;', $this->fehca_real);
         $this->fehca_real = str_replace('>', '&gt;', $this->fehca_real);
         $this->Texto_tag .= "<td>" . $this->fehca_real . "</td>\r\n";
   }
   //----- id
   function NM_export_id()
   {
             nmgp_Form_Num_Val($this->id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->id = NM_charset_to_utf8($this->id);
         $this->id = str_replace('<', '&lt;', $this->id);
         $this->id = str_replace('>', '&gt;', $this->id);
         $this->Texto_tag .= "<td>" . $this->id . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $this->Rtf_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $rtf_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_iso_no_conformidad'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>SOLICITUD DE NO CONFORMIDAD Y ACCION CORRECTIVA :: RTF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
  <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
  <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
  <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
  <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
  <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">RTF</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_iso_no_conformidad_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_iso_no_conformidad"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
}

?>
