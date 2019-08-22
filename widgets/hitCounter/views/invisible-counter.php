<?php

?>
<script language="javascript" type="text/javascript"><!--
Cd=document;Cr="&"+Math.random();Cp="&s=1";
Cd.cookie="b=b";if(Cd.cookie)Cp+="&c=1";
Cp+="&t="+(new Date()).getTimezoneOffset();
if(self!=top)Cp+="&f=1";
//--></script>
<script language="javascript1.1" type="text/javascript"><!--
if(navigator.javaEnabled())Cp+="&j=1";
//--></script>
<script language="javascript1.2" type="text/javascript"><!--
if(typeof(screen)!='undefined')Cp+="&w="+screen.width+"&h="+
screen.height+"&d="+(screen.colorDepth?screen.colorDepth:screen.pixelDepth);
//--></script>
<script language="javascript" type="text/javascript"><!--
Cd.write("<img src='<?= $imgSrc; ?>?i=70754&g=0&x=2"+Cp+Cr+
"&r="+escape(Cd.referrer)+"&u="+escape(window.location.href)+
<?php //Counter type. By default set invisible ?>
"<?= $counterImgTypeParams; ?>'"+
" "+
<?php //Escaped string containing attributes image tag (style etc.) ?>
"<?= $clientImgOptions ?>/>");
//--></script>

