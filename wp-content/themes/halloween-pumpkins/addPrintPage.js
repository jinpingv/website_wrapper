/* Add "Print page" link as an additional list item with an id of "printpage" on a list with ID "tipletsr". 
Original script by Patrick Lauke */

function addPrintPage() {
   if ((document.getElementById && document.createTextNode && document.createElement && document.appendChild) && (target = document.getElementById("tiplets"))) {
      var newListItem = document.createElement("li");
      newListItem.id = 'printpage'; // Give the list item an id to allow for styling
      var newLink = document.createElement("a");
      newLink.href="javascript:window.print();";
      var newLinkText = document.createTextNode("Print this page");
      newLink.appendChild(newLinkText);
      newListItem.appendChild(newLink);
      target.appendChild(newListItem);
   }
}

/* let's add the function to the onload handler of the page */
addEvent(window,'load',addPrintPage);


/* addEvent handler for IE and other browsers */
function addEvent(elm, evType, fn, useCapture)
// addEvent and removeEvent
// cross-browser event handling for IE5+,  NS6 and Mozilla
// By Scott Andrew
{
 if (elm.addEventListener){
   elm.addEventListener(evType, fn, useCapture);
   return true;
 } else if (elm.attachEvent){
   var r = elm.attachEvent("on"+evType, fn);
   return r;
 }
} 

