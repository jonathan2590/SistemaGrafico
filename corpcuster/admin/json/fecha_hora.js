function muestraObligatorio()
{
   try
   {
	divMensaje=document.getElementById("obligatorio");
	divMensaje.innerHTML="<font  color='#CC0000'>(*)</font> Indica que es un campo obligatorio de completar ";
   }
   catch(err)
   { }
}

function mostrarFecha()
{

var mydate=new Date()
var year=mydate.getYear()
if (year < 1000)
year+=1900
var day=mydate.getDay()
var month=mydate.getMonth()
var daym=mydate.getDate()
if (daym<10)
daym="0"+daym
var dayarray=new Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado")
var montharray=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre")
document.write("<small>"+dayarray[day]+" "+daym+" de "+montharray[month]+" de "+year+"</small>")

}

function fnc(){
/*****fecha****/
var mydate=new Date()
var year=mydate.getYear()
if (year < 1000)
year+=1900
var day=mydate.getDay()
var month=mydate.getMonth()
var daym=mydate.getDate()
if (daym<10)
daym="0"+daym
var dayarray=new Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado")
var montharray=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre")
fecha=dayarray[day]+" "+daym+" de "+montharray[month]+" de "+year;


/*****hora******/
var reloj=new Date();
var str="";

//para 12 horas
tipo="AM";
doce=reloj.getHours();
if(doce>12){
if(doce==13)doce=1;
else if(doce==14)doce=2;
else if(doce==15)doce=3;
else if(doce==16)doce=4;
else if(doce==17)doce=5;
else if(doce==18)doce=6;
else if(doce==19)doce=7;
else if(doce==20)doce=8;
else if(doce==21)doce=9;
else if(doce==22)doce=10;
else if(doce==23)doce=11;
tipo="PM";
}
else if(doce==0)doce=12;
else if(doce==12)tipo="PM";

mins=reloj.getMinutes();
if(mins<10)mins="0"+mins;

secs=reloj.getSeconds();
if(secs<10)secs="0"+secs;

str=doce+":"+mins+":"+secs+" "+tipo;
fechahora = "<font  color=black>" + fecha + " |  " + "</font>" + "<font  color=#4671b1>" + str + "</font>";
document.getElementById("reloj").innerHTML=fechahora;
setTimeout("fnc()",1000);
}