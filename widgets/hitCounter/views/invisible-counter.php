<?php
/**
 * Counter view
 * -------------
 * 
 * Js vars
 * var Cd   - contains dom document.
 * var Cr   - counter random integer. Needed for generate unique src. So that the browser does not cache the picture  
 * var Cp   - counter query params
 * var Cn   - contains navigator
 * var Cn_c - Connection type detected by js
 * 
 * Query params:
 * param c      - flag. If cookei enabled = 1 or if not -not set.
 * param j      - flag. if java enabled =1 if not -not set.
 * param t      - time zone offset. For example, if your time zone is UTC+10 (Australian Eastern Standard Time), -600 will be returned. 
 * param tz     - Intl time zone
 * param i      - counter id
 * param u      - returns the href (URL) of the current page
 * param r      - returns referef href
 * param w      - screen width
 * param h      - screen height
 * param d      - The colorDepth property returns the bit depth of the color palette for displaying images (in bits per pixel)
 * param lg     - Language of the browser
 * param hl     - History size current session in this window
 * param td     - Detect toutch device
 * param ram    - Ram computer
 * 
 * 
 * -----------------
 * Expressions in js
 * -----------------
 * //Set eny cookie to be able to identify availability cookie in browser
 * Cd.cookie="dtct=abc";if(Cd.cookie)Cp+="&c=1";
 * 
 * //Find out if your browser has Java enabled:
 * if(Cn.javaEnabled())Cp+="&j=1";
 */
?>

<?php //Speed profiling ?>
<?php if(YII_DEBUG): ?>
<script language="javascript" type="text/javascript">console.time('hitCounter-' + '<?= $counterId; ?>')</script>
<?php endif; ?>

<script language="javascript" type="text/javascript"><!--
<?php

/* Define Variables*/

?>Cd=document;<?php
?>Cn=navigator;<?php
?>Cn_c=Cn.connection||Cn.mozConnection||Cn.webkitConnection;<?php

/* Build query params*/

?>Cr="&"+Math.random();<?php
?>Cd.cookie="dtct=abc";<?php

?>Cp="&hl="+history.length;<?php
?>Cp+="&t="+(new Date()).getTimezoneOffset();<?php
?>if(Cd.cookie)Cp+="&c=1";<?php
?>if(self!=top)Cp+="&f=1";<?php
?>if(Cn)Cp+="&lg="+Cn.language;<?php
?>if(Cn)Cp+="&cnt="+Cn_c.effectiveType;<?php
?>if(Cn)Cp+="&ram="+Cn.deviceMemory;<?php
?>if('ontouchstart' in window || Cn.msMaxTouchPoints)Cp+="&td=1";<?php
?>if(Intl)Cp+="&tz="+Intl.DateTimeFormat().resolvedOptions().timeZone;<?php
?>
//--></script><?php


?><script language="javascript1.1" type="text/javascript"><!--
if(Cn.javaEnabled())Cp+="&j=1";
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

<?php //Speed profiling ?>
<?php if(YII_DEBUG): ?>
<script language="javascript" type="text/javascript">console.timeEnd('hitCounter-' + '<?= $counterId; ?>');</script>
<?php endif; ?>
