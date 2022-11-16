(function($){var JITManager=new JITManager();function JITManager()
{var $this=this;$this.__construct=function()
{$this.registerClickEvents();}
$this.registerClickEvents=function(){$(document).on('mousedown',$this.handleMouseDown);}
$this.handleMouseDown=function(event){var clickedElement=$(event.target);if(clickedElement.is('a')&&clickedElement.hasClass(window.HighWayPro.classes.JIT)){clickedElement.attr('href',clickedElement.attr(window.HighWayPro.attributeNames.JIT));}}
$this.__construct();}})(jQuery);