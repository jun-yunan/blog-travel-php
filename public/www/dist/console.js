function makeResizableDiv(e,t){let o=0,n=document.querySelector(e),s=document.querySelector(t),l=parseFloat(getComputedStyle(n,null).getPropertyValue("height").replace("px",""));function c(e){if("error-console-top"===s.id){let t=l-(e.pageY-o);t>30&&t<600&&(n.style.height=t+"px",sessionStorage.setItem("console_position",t+"px"))}}function i(){window.removeEventListener("mousemove",c)}s.addEventListener("mousedown",t=>{l=document.querySelector(e).clientHeight,o=t.pageY,t.preventDefault(),window.addEventListener("mousemove",c),window.addEventListener("mouseup",i)})}makeResizableDiv("div#console-div","div#error-console-top");let buttons=document.querySelectorAll("button.enable");buttons.forEach((e,t)=>{e.addEventListener("click",e=>{document.querySelectorAll("div.console-body-seccion").forEach(e=>{e.classList.remove("active")}),document.querySelectorAll("button.btn-console").forEach(e=>{e.classList.remove("active")});let t=e.srcElement.className;t=t.split(/ /)[2],document.getElementById(t).className+=" active",e.srcElement.className+=" active"})}),sessionStorage.getItem("console_position")&&(document.querySelector("div#console-div").style.height=sessionStorage.getItem("console_position"),document.querySelector("body").style.paddingBottom="30px");
