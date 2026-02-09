function Tournee(){

this.arret="";
this.init();
}

Tournee.prototype.allowDrop=function(ev) {
    ev.preventDefault();
}

Tournee.prototype.drag=function(ev) {
     ev.dataTransfer.setData('text/plain', ev.target.id);
	 console.log(ev.target.id);
}

Tournee.prototype.drop=function(ev) {
	console.log("drop");
	if (ev.target.innerHTML =="Vide")
		{
		//ev.target.classList.remove('drag-over');
		const id = ev.dataTransfer.getData('text/plain');
		const draggable = document.getElementById(id);
		ev.target.innerHTML ="";
		ev.target.style.background="red";
		ev.target.appendChild(draggable);
		var tb_el=this.tbrendu;
		for (var i=1; i<=this.taille; i++)
			{
			if (tb_el.rows[1].cells[i].innerHTML==draggable.outerHTML) 
				{
				draggable.name=i
				}
			}
		}
	var LastCelulle = document.getElementById('parcours').getElementsByTagName("tr")[0].getElementsByTagName("td").length;
	console.log(LastCelulle);
	for (var i=0; i<LastCelulle-1;i++)
		{
		console.log("contenu: "+document.getElementById('parcours').getElementsByTagName('tr')[1].cells[i+1].innerHTML);
		
		if (document.getElementById('parcours').getElementsByTagName('tr')[1].cells[i+1].innerHTML=="") 
			{
			document.getElementById('parcours').getElementsByTagName('tr')[1].cells[i+1].innerHTML="Vide";
			document.getElementById('parcours').getElementsByTagName('tr')[1].cells[i+1].style.background="green";
			}
		}

}


Tournee.prototype.fetchAsync= async function(url) {
		  let response = await fetch(url);
		  let data = await response.json();
		  arrets=JSON.parse(JSON.stringify(data));
		 
		  return arrets;
		}



Tournee.prototype.init=function(){
		this.tbrendu=document.createElement("table");
		this.tbrendu.className="tbrendu";
		this.tbrendu.id="parcours";
		document.querySelector(".plateau").appendChild(this.tbrendu);
		const doc = document.getElementById("container");
		var url="http://127.0.0.1/transport/api/arrets.php";
		console.log(url);
		this.fetchAsync(url).then( arrets =>
			{
			console.log(arrets);
			this.taille=arrets.length
			for(var i=0;i<2;i++)
				{
				var wor=this.tbrendu.insertRow(0);
				for(var j=0;j<=this.taille;j++)
					{
					var cel=wor.insertCell();
					if (j==0)
						{
						if (i==1) cel.innerHTML="N°";
						else 
							{
							cel.innerHTML="Arret";
							}
						}
					if (j>=1)
						{
						if (i==1) cel.innerHTML=j;
						else 
							{
							cel.innerHTML="Vide";
							cel.style.background="green";
							cel.ondrop=this.drop.bind(this);
							cel.ondragover=this.allowDrop.bind(this);
							}
						}
					}
			}
			for (var i=0; i<this.taille; i++)
				{
				var x = document.createElement("INPUT");
				x.id=arrets[i];
				x.name=arrets[i];
				x.value=arrets[i];
				x.setAttribute("size",x.value.length)
				x.setAttribute("draggable","true");
				x.setAttribute("readonly","true");
				x.ondragstart=this.drag.bind(this);
				doc.appendChild(x);
				}
			});
		}


window.onload = (event) => {
		console.log('La page est complètement chargée');
		var tournee=new Tournee();
		}

function clearResult(){
		location.reload();
		}