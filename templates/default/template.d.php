<?php
defined('BEXEC')or die('No direct access!');
use Brilliant\http\BRequest;
use Brilliant\html\BHTML;
use Brilliant\CMS\BLang;
use Brilliant\CMS\BBreadcrumbsGeneral;
use Application\BRouter;

$printversion=BRequest::GetInt('printversion');
$bhtml=BHTML::getInstance();
$bhtml->add_meta('viewport','width=device-width, initial-scale=0.35, maximum-scale=1, user-scalable=yes');
$brouter=BRouter::getInstance();
if((defined('DEBUG_SITENOINDEX'))&&(DEBUG_SITENOINDEX)){
	$bhtml->add_meta('robots','NOINDEX, NOFOLLOW');
	}
$bhtml->addJS('','
	window.roothostname="'.BHOSTNAME.'";
	');
$bhtml->useFramework('jquery');
$bhtml->useFramework('brilliant');
$bhtml->addCSS(URL_STATIC.'css/main.css?v=1.0.5');
$bhtml->add_meta('','text/html; charset=utf-8','Content-Type');

$canonical=array();
$canonical['href']='//'.$brouter->generateURLmain('',false);
$canonical['rel']='canonical';
$bhtml->add_link($canonical);
$url_main='//'.$brouter->generateUrl('mainpage',BLang::$langcode,array('view'=>'mainpage'));


$col_left=($this->countcomponents('leftcolumn')>0);
$col_right=($this->countcomponents('rightcolumn')>0);
$clspref='';
if($col_left)
	$clspref.='l';
if($col_right)
	$clspref.='r';
$clspref.='c-';

$now=new DateTime();
$currentdatestr=BLang::_('DAYOFWEEK'.$now->format('N')).', ';//Понеділок,
$currentdatestr.=$now->format('d').' ';//01 
$currentdatestr.=BLang::_('MONTH_GENITIVE'.$now->format('n')).' ';//Січня
$currentdatestr.=$now->format('Y');//01 
//$currentdatestr=', 11 січня 2016';
?>
<!DOCTYPE html>
<html<?php echo($printversion?' class="printversion"':''); ?>>
	<head>
		<?php $bhtml->out_head();?>
		<?php if($printversion): ?>
			<script>
				window.print();
			</script>
		<?php endif; ?>
	</head>
<body lang="<?php echo(BLang::$langcode_web) ?>" itemscope itemtype="http://schema.org/WebPage">
        <a name="top"></a>
        <div class="bodycontainer">
        <?php
        $now = new DateTime();
        $nowMonth = (int)$now->format('m');
        $nowDay = (int)$now->format('d');
        //From 15th december to 15th January
        if((($nowMonth==12)&&($nowDay>15))||(($nowMonth==1)&&($nowDay<20))){
	        $wheaderclasses.=' girlanda';
        	}
        ?>
            <div class="wwrapper header<?php echo $wheaderclasses; ?>">
                <a href="/" class="logo"></a>
                {{position:menu}}
            </div>
        </div>




</body></html>

