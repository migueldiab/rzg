dojo.require("dijit.Menu");
dojo.require("dijit._Calendar");
dojo.require("dijit.ColorPalette");
dojo.require("dijit.ProgressBar");
dojo.require("dijit.TitlePane");
dojo.require("dijit.Tooltip");
dojo.require("dijit.Tree");

// editor:
dojo.require("dijit.Editor"); 
dojo.require("dijit._editor.plugins.FontChoice");
dojo.require("dijit._editor.plugins.LinkDialog");

// dnd:
dojo.require("dojo.dnd.Source");

// various Form elemetns
dojo.require("dijit.form.CheckBox");
dojo.require("dijit.form.Textarea");
dojo.require("dijit.form.SimpleTextarea");
dojo.require("dijit.form.FilteringSelect");
dojo.require("dijit.form.TextBox");
dojo.require("dijit.form.DateTextBox"); 
dojo.require("dijit.form.TimeTextBox"); 
dojo.require("dijit.form.CurrencyTextBox"); 
dojo.require("dijit.form.Button");
dojo.require("dijit.InlineEditBox");
dojo.require("dijit.form.NumberSpinner");
dojo.require("dijit.form.Slider"); 

// layouts used in page
dojo.require("dijit.layout.AccordionContainer");
dojo.require("dijit.layout.ContentPane");
dojo.require("dijit.layout.TabContainer");
dojo.require("dijit.layout.BorderContainer");
dojo.require("dijit.Dialog");

// scan page for widgets and instantiate them
dojo.require("dojo.parser");  

// humm?    
dojo.require("dojo.date.locale");

// for the Tree
dojo.require("dojo.data.ItemFileReadStore");

// for the colorpalette
function setColor(color){
  var theSpan = dojo.byId("outputSpan");
  dojo.style(theSpan,"color",color); 
  theSpan.innerHTML = color;
}

// for the calendar
function myHandler(id,newValue){
  console.debug("onChange for id = " + id + ", value: " + newValue);
}

dojo.addOnLoad(function() {

  var start = new Date().getTime();
  dojo.parser.parse(dojo.byId('container')); 
  console.info("Total parse time: " + (new Date().getTime() - start) + "ms");

  dojo.byId('loaderInner').innerHTML += " listo.";
  setTimeout(function hideLoader(){
    var loader = dojo.byId('loader'); 
    dojo.fadeOut({ node: loader, duration:500,
      onEnd: function(){ 
        loader.style.display = "none"; 
      }
    }).play();
  }, 250);

  var strayGlobals = [];
  for(var i in window){
    if(!window.__globalList[i]){ strayGlobals.push(i); }
  }
  if(strayGlobals.length){
    console.warn("Stray globals: "+strayGlobals.join(", "));
  }
});

dojo.addOnLoad(function(){
  dojo.byId("backgroundArea").innerHTML = dojo.date.locale.format(new Date(2005, 11, 30), { selector: 'date' });
  var nineAm = new Date(0);
  nineAm.setHours(9);
  dojo.byId("timePicker").innerHTML = dojo.date.locale.format(nineAm, { selector: 'time' });
});
