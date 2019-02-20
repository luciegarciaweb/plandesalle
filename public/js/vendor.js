/*!
  * $script.js JS loader & dependency manager
  * https://github.com/ded/script.js
  * (c) Dustin Diaz 2014 | License MIT
  */
(function(e,t){typeof module!="undefined"&&module.exports?module.exports=t():typeof define=="function"&&define.amd?define(t):this[e]=t()})("$script",function(){function p(e,t){for(var n=0,i=e.length;n<i;++n)if(!t(e[n]))return r;return 1}function d(e,t){p(e,function(e){return t(e),1})}function v(e,t,n){function g(e){return e.call?e():u[e]}function y(){if(!--h){u[o]=1,s&&s();for(var e in f)p(e.split("|"),g)&&!d(f[e],g)&&(f[e]=[])}}e=e[i]?e:[e];var r=t&&t.call,s=r?t:n,o=r?e.join(""):t,h=e.length;return setTimeout(function(){d(e,function t(e,n){if(e===null)return y();!n&&!/^https?:\/\//.test(e)&&c&&(e=e.indexOf(".js")===-1?c+e+".js":c+e);if(l[e])return o&&(a[o]=1),l[e]==2?y():setTimeout(function(){t(e,!0)},0);l[e]=1,o&&(a[o]=1),m(e,y)})},0),v}function m(n,r){var i=e.createElement("script"),u;i.onload=i.onerror=i[o]=function(){if(i[s]&&!/^c|loade/.test(i[s])||u)return;i.onload=i[o]=null,u=1,l[n]=2,r()},i.async=1,i.src=h?n+(n.indexOf("?")===-1?"?":"&")+h:n,t.insertBefore(i,t.lastChild)}var e=document,t=e.getElementsByTagName("head")[0],n="string",r=!1,i="push",s="readyState",o="onreadystatechange",u={},a={},f={},l={},c,h;return v.get=m,v.order=function(e,t,n){(function r(i){i=e.shift(),e.length?v(i,r):v(i,t,n)})()},v.path=function(e){c=e},v.urlArgs=function(e){h=e},v.ready=function(e,t,n){e=e[i]?e:[e];var r=[];return!d(e,function(e){u[e]||r[i](e)})&&p(e,function(e){return u[e]})?t():!function(e){f[e]=f[e]||[],f[e][i](t),n&&n(r)}(e.join("|")),v},v.done=function(e){v([null],e)},v})

// Production steps of ECMA-262, Edition 6, 22.1.2.1
// Référence : https://people.mozilla.org/~jorendorff/es6-draft.html#sec-array.from
if (!Array.from) {
  Array.from = (function () {
    var toStr = Object.prototype.toString;
    var isCallable = function (fn) { 
      return typeof fn === 'function' || toStr.call(fn) === '[object Function]';
    };
    var toInteger = function (value) { 
      var number = Number(value); 
      if (isNaN(number)) { return 0; }
      if (number === 0 || !isFinite(number)) { return number; }
      return (number > 0 ? 1 : -1) * Math.floor(Math.abs(number)); 
    };
    var maxSafeInteger = Math.pow(2, 53) - 1;
    var toLength = function (value) { 
      var len = toInteger(value);
      return Math.min(Math.max(len, 0), maxSafeInteger);
    }; 
  
    // La propriété length de la méthode vaut 1.
    return function from(arrayLike/*, mapFn, thisArg */) { 
      // 1. Soit C, la valeur this
      var C = this;
      
      // 2. Soit items le ToObject(arrayLike).
      var items = Object(arrayLike); 
      
      // 3. ReturnIfAbrupt(items).
      if (arrayLike == null) { 
        throw new TypeError("Array.from doit utiliser un objet semblable à un tableau - null ou undefined ne peuvent pas être utilisés");
      }
    
      // 4. Si mapfn est undefined, le mapping sera false.
      var mapFn = arguments.length > 1 ? arguments[1] : void undefined;
      var T;
      if (typeof mapFn !== 'undefined') {  
        // 5. sinon      
        // 5. a. si IsCallable(mapfn) est false, on lève une TypeError.
        if (!isCallable(mapFn)) { 
          throw new TypeError('Array.from: lorsqu il est utilisé le deuxième argument doit être une fonction'); 
        }
     
        // 5. b. si thisArg a été fourni, T sera thisArg ; sinon T sera undefined.
        if (arguments.length > 2) { 
          T = arguments[2];
        }
      }
    
      // 10. Soit lenValue pour Get(items, "length").
      // 11. Soit len pour ToLength(lenValue).
      var len = toLength(items.length);  
     
      // 13. Si IsConstructor(C) vaut true, alors
      // 13. a. Soit A le résultat de l'appel à la méthode interne [[Construct]] avec une liste en argument qui contient l'élément len.
      // 14. a. Sinon, soit A le résultat de ArrayCreate(len).
      var A = isCallable(C) ? Object(new C(len)) : new Array(len);
   
      // 16. Soit k égal à 0.
      var k = 0;  // 17. On répète tant que k < len… 
      var kValue;
      while (k < len) {
        kValue = items[k]; 
        if (mapFn) {
          A[k] = typeof T === 'undefined' ? mapFn(kValue, k) : mapFn.call(T, kValue, k); 
        } else {
          A[k] = kValue;
        }
        k += 1;
      }
      // 18. Soit putStatus égal à Put(A, "length", len, true).
      A.length = len;  // 20. On renvoie A.
      return A;
    };
  }());
}