"use strict";

window.onload = function()
{

   var myButton = document.getElementById("jsbutton");
   if (myButton != null)
   {
//alert("setting myButton");

      myButton.onclick = javascriptfunction;
   }

   var loadButton = document.getElementById("reload");
   if (loadButton != null)
   {

      loadButton.onclick = loadClick;
   }
};


function javascriptfunction()
{
   alert("Are you sure you want to give raise? This action cannot be undone.");
   return true;
}

function loadClick()
{

//alert("calling loadClick");

   var flowers = new XMLHttpRequest();

   flowers.open("GET", "ajax.txt", false);
   flowers.send(null);

   var outputTextArea = document.getElementById("putfile");

   if (flowers.status == 200)
   {
      outputTextArea.value = flowers.responseText;
   }
   else
   {
      outputTextArea.value = "Error fetching text of ajax.txt: \n" +
      flowers.status + " - " + flowers.statusText;
   }
}


