<?php
/**
 * Counter view
 * -------------
 * 
 * Js vars
 * var Cd - contains dom document.
 * var Cr - counter random integer. Needed for generate unique src. So that the browser does not cache the picture  
 * var Cp - counter query params
 * var Cnv- contains navigator
 * 
 * Query params:
 * param c     - flag. If cookei enabled = 1 or if not -not set.
 * param j     - flag. if java enabled =1 if not -not set.
 * param t     - time zone offset. For example, if your time zone is UTC+10 (Australian Eastern Standard Time), -600 will be returned. 
 * param i     - counter id
 * param u     - returns the href (URL) of the current page
 * param r     - returns referef href
 * param w     - screen width
 * param h     - screen height
 * param d     - The colorDepth property returns the bit depth of the color palette for displaying images (in bits per pixel)
 * param lg    - Language of the browser
 * param hl    - History size current session in this window
 * param td    - Detect toutch device
 * param Cnv_con- Connection type detected by js
 * 
 * -----------------
 * Expressions in js
 * -----------------
 * //Set eny cookie to be able to identify availability cookie in browser
 * Cd.cookie="dtct=abc";if(Cd.cookie)Cp+="&c=1";
 * 
 * //Find out if your browser has Java enabled:
 * if(Cnv.javaEnabled())Cp+="&j=1";
 */
?>
<script language="javascript" type="text/javascript"><!--
Cd=document;Cnv=navigator;Cnv_con=Cnv.connection||Cnv.mozConnection||Cnv.webkitConnection;<?php
?>Cr="&"+Math.random();<?php
?>Cp="&hl="+history.length;<?php
?>Cd.cookie="dtct=abc";<?php
?>if(Cd.cookie)Cp+="&c=1";<?php
?>Cp+="&t="+(new Date()).getTimezoneOffset();<?php
?>if(self!=top)Cp+="&f=1";<?php
?>if(Cnv.language)Cp+="&lg="+Cnv.language;<?php
?>if('ontouchstart' in window || Cnv.msMaxTouchPoints)Cp+="&td=1";<?php
?>Cp+="&cnt="+Cnv_con.effectiveType;<?php
?>Cp+="&ram="+Cnv.deviceMemory;<?php
?>//--></script><?php


?><script language="javascript1.1" type="text/javascript"><!--
if(Cnv.javaEnabled())Cp+="&j=1";
//--></script><?php


?><script language="javascript1.2" type="text/javascript"><!--
if(typeof(screen)!='undefined')Cp+="&w="+screen.width+"&h="+
screen.height+"&d="+(screen.colorDepth?screen.colorDepth:screen.pixelDepth);
//--></script><?php


?><script language="javascript" type="text/javascript"><!--
Cd.write("<img src='<?= $imgSrc; ?>?i=<?= $counterId; ?>"+Cp+Cr+
"&r="+escape(Cd.referrer)+"&u="+escape(window.location.href)+<?php


//Counter type. By default it set to iCnvisible mode 
?>"&<?= $counterImgSrcQuery; ?>'"<?php


//Escaped string containing attributes image tag (style etc.) 
?>+"<?= $clientImgOptions ?>/>");
//--></script>

