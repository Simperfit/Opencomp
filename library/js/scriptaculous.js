// script.aculo.us scriptaculous.js v1.8.3, Thu Oct 08 11:23:33 +0200 2009

// Copyright (c) 2005-2009 Thomas Fuchs (http://script.aculo.us, http://mir.aculo.us)
//
// Scriptaculous is freely distributable under the terms of the MIT license.
//
// Permission is hereby granted, free of charge, to any person obtaining
// a copy of this software and associated documentation files (the
// "Software"), to deal in the Software without restriction, including
// without limitation the rights to use, copy, modify, merge, publish,
// distribute, sublicense, and/or sell copies of the Software, and to
// permit persons to whom the Software is furnished to do so, subject to
// the following conditions:
//
// The above copyright notice and this permission notice shall be
// included in all copies or substantial portions of the Software.
//
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
// EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
// MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
// NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
// LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
// OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
// WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
//
// For details, see the script.aculo.us web site: http://script.aculo.us/

var Scriptaculous={Version:"1.8.3",require:function(b){try{document.write('<script type="text/javascript" src="'+b+'"><\/script>')}catch(c){var a=document.createElement("script");a.type="text/javascript";a.src=b;document.getElementsByTagName("head")[0].appendChild(a)}},REQUIRED_PROTOTYPE:"1.6.0.3",load:function(){function a(c){var d=c.replace(/_.*|\./g,"");d=parseInt(d+"0".times(4-d.length));return c.indexOf("_")>-1?d-1:d}if((typeof Prototype=="undefined")||(typeof Element=="undefined")||(typeof Element.Methods=="undefined")||(a(Prototype.Version)<a(Scriptaculous.REQUIRED_PROTOTYPE))){throw ("script.aculo.us requires the Prototype JavaScript framework >= "+Scriptaculous.REQUIRED_PROTOTYPE)}var b=/scriptaculous\.js(\?.*)?$/;$$("head script[src]").findAll(function(c){return c.src.match(b)}).each(function(d){var e=d.src.replace(b,""),c=d.src.match(/\?.*load=([a-z,]*)/);(c?c[1]:"builder,effects,dragdrop,controls,slider,sound").split(",").each(function(f){Scriptaculous.require(e+f+".js")})})}};Scriptaculous.load();
