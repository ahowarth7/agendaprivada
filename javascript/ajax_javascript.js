var tagScript = '(?:<script.*?>)((\n|\r|.)*?)(?:<\/script>)';

String.prototype.evalScript = function() /*  Eval script fragment - @return String  */
{
   return (this.match(new RegExp(tagScript, 'img')) || []).evalScript();
};

String.prototype.stripScript = function() /*  strip script fragment - @return String  */
{
   return this.replace(new RegExp(tagScript, 'img'), '');
};

String.prototype.extractScript = function() /*  extract script fragment - @return String  */
{
   var matchAll = new RegExp(tagScript, 'img');
   return (this.match(matchAll) || []);
};

Array.prototype.evalScript = function(extracted) /*  Eval scripts - @return String*/
{
   var s=this.map(function(sr)
   {
      var sc=(sr.match(new RegExp(tagScript, 'im')) || ['', ''])[1];
      if(window.execScript)
      {
         window.execScript(sc);
      }
      else
      {
         window.setTimeout(sc,0);
      }
   });
   return true;
};

Array.prototype.map = function(fun) /*  Map array elements - @param {Function} fun - @return Function*/
{
   if(typeof fun!=="function"){return false;}
   var i = 0, l = this.length;
   for(i=0;i<l;i++)
   {
      fun(this[i]);
   }
   return true;
};
