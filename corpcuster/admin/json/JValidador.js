
function fmen(texto)
{
//alert(texto);
}

function falert(texto)
{
alert(texto);
}

function solonumeros(e){
tecla_codigo = (document.all) ? e.keyCode : e.which;
if (tecla_codigo==8 || tecla_codigo==9){ return true};
/*para negativos patron =/[0-9\-]/;*/

patron =/[0-9]/;
tecla_valor = String.fromCharCode(tecla_codigo); 
return patron.test(tecla_valor); 
}

function sololetras(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8 || tecla==32 ) return true; //Tecla de retroceso (para poder borrar)
    patron =/[A-Za-z]/;
    te = String.fromCharCode(tecla);
    return patron.test(te); 
}  

function soloprecios(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8 || tecla==46 ){ return true}; //Tecla de retroceso (para poder borrar)
    patron =/[0-9\-]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
} 

function solodecimales(e, valor){
        tecla = (document.all) ? e.keyCode : e.which;
    te = String.fromCharCode(tecla);
    if (tecla == 45) { return false };
    if (tecla == 8 || tecla == 32) { return true }; //Tecla de retroceso (para poder borrar)
    patron = /[0-9\.]/;
    valor = valor + te.toString();
    /*Validar Si es numero*/
    if (isNaN(valor)) {
        return false;
    }
    /*Validar cantidad de decimales*/
    var separar = valor.toString().split('.');
    if (separar.length > 1) {
        if (separar[1].length > 2) {
            return false;
        }
    }
    return patron.test(valor);
}

function soloprecios2(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8 || tecla==44  ){ return true}; //Tecla de retroceso (para poder borrar)
    patron =/[0-9\-]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
} 

function validarFechacompleta(fecha) {
    var fec = fecha.split("/");
    return validarFecha(fec[0], fec[1], fec[2])
}

function validarfechas(fec1, fec2) {

    if (FechaEsCorrecto(fec1)) {
        return true;
    }

    if (FechaEsCorrecto(fec2)) {
        return true;
    }

    if (validarFechacompleta(fec1)) {
        return true;
    }

    if (validarFechacompleta(fec2)) {
        return true;
    }

    if (FechaMenor(fec1, fec2)) {
        return true;
    }

    return false;
}

//VALIDAR FECHAS
function validarFecha(dia, mes, anio) {
    var elMes = parseInt(mes);

    if (elMes > 12)
        return 1;
    // MES FEBRERO
    if (elMes == 2) {
        if (esBisiesto(anio)) {
            if (parseInt(dia) > 29) {
                return 1;
            }
            else
                return 0;
        }
        else {
            if (parseInt(dia) > 28) {
                return 1;
            }
            else
                return 0;
        }
    }
    //RESTO DE MESES

    if (elMes == 4 || elMes == 6 || elMes == 9 || elMes == 11) {
        if (parseInt(dia) > 30) {
            return 1;
        }
    } else {
    if (parseInt(dia) > 31) {
        return 1;
    }
    }
    return 0;

}
//*****************************************************************************************
// esBisiesto(anio)
//
// Determina si el año pasado com parámetro es o no bisiesto
//*****************************************************************************************
function esBisiesto(anio) {
    var BISIESTO;
    if (parseInt(anio) % 4 == 0) {
        if (parseInt(anio) % 100 == 0) {
            if (parseInt(anio) % 400 == 0) {
                BISIESTO = true;
            }
            else {
                BISIESTO = false;
            }
        }
        else {
            BISIESTO = true;
        }
    }
    else
        BISIESTO = false;

    return BISIESTO;
}

/*NUEVAS FUNCIONES*/
function FechaMenor(fec1, fec2) {
/*Fec1  fecha inicial */
 Afec1 = fec1.split("/");
 Afec2 = fec2.split("/");

 if (parseFloat(Afec1[2]) <= parseFloat(Afec2[2])) {

     if (parseFloat(Afec1[1]) <= parseFloat(Afec2[1])) {

         if (parseFloat(Afec1[0]) <= parseFloat(Afec2[0])) {
             return false;
         } else {return true;}
     } else {return true;}
 } else { return true; }
 return true;
}

function FechaMenor2(fec1, fec2) {
    /*Fec1  fecha inicial */
    Afec1 = fec1.split("/");
    Afec2 = fec2.split("/");

    if (parseFloat(Afec1[2]) <= parseFloat(Afec2[2])) {

        if (parseFloat(Afec1[1]) <= parseFloat(Afec2[1])) {

            if (parseFloat(Afec1[0]) <= parseFloat(Afec2[0])) {
                return false;
            } else { return true; }
        } else { return true; }
    } else { return true; }
    return true;
}


function FechaEsCorrecto(f) {
    /* la forma de verificar el formato es la que ya comentamos */
    re = /^[0-9][0-9]\/[0-9][0-9]\/[0-9][0-9][0-9][0-9]$/
    if (f.length == 0 || !re.exec(f)) {
        return true;
    }

    /* comprobamos que la fecha es válida */
    var d = new Date()
    /* la función tiene como entrada: año, mes, día */
    d.setFullYear(f.substring(6, 10),
	      f.substring(3, 5) - 1,
	      f.substring(0, 2))

    /* ¿el mes del objeto Date es el mes introducido por el usuario?
    OJO: getMonth() devuelve el número de mes del 0 al 11
 
   ¿el día del objeto Date es el día introducido por el usuario?
    OJO: getDate() devuelve el día del mes */
    if (d.getMonth() != f.substring(3, 5) - 1
	|| d.getDate() != f.substring(0, 2)) {
        return false;
    }
}

function ValidarFecha(dia, mes, anio) {
    var elMes = parseInt(mes);

    if (elMes > 12)
        return 1;
    // MES FEBRERO
    if (elMes == 2) {
        if (esBisiesto(anio)) {
            if (parseInt(dia) > 29) {
                return 1;
            }
            else
                return 0;
        }
        else {
            if (parseInt(dia) > 28) {
                return 1;
            }
            else
                return 0;
        }
    }
    //RESTO DE MESES

    if (elMes == 4 || elMes == 6 || elMes == 9 || elMes == 11) {
        if (parseInt(dia) > 30) {
            return 1;
        }
    } else {
        if (parseInt(dia) > 31) {
            return 1;
        }
    }
    return 0;

}
//*****************************************************************************************
// esBisiesto(anio)
//
// Determina si el año pasado com parámetro es o no bisiesto
//*****************************************************************************************
function IsBisiesto(anio) {
    var BISIESTO;
    if (parseInt(anio) % 4 == 0) {
        if (parseInt(anio) % 100 == 0) {
            if (parseInt(anio) % 400 == 0) {
                BISIESTO = true;
            }
            else {
                BISIESTO = false;
            }
        }
        else {
            BISIESTO = true;
        }
    }
    else
        BISIESTO = false;

    return BISIESTO;
}

function CompararFechas(fec1, fec2) {
    var fec = fec1.split("/");
    var fecn = fec2.split("/");
    initDate = new Date(fec[2], fec[1], fec[0]);
    endDate = new Date(fecn[2], fecn[1], fecn[0]);
    if (initDate - endDate > 0) {
        // este bloque se ejecuta en caso de no ser valido         
        return false; //si lo usaras para envio de formulario;
    }
    return true;
}

function CompararDiasFechas(fec1, fec2, tdias) {
    //    var fec = fec1.split("/");
    //    var fecn = fec2.split("/");
    //    initDate = new Date(fec[2], fec[1], fec[0]);
    //    endDate = new Date(fecn[2], fecn[1], fecn[0]);
    //    var diferencia = initDate.getTime() - endDate.getTime()
    //    var dias = Math.floor(diferencia / (1000 * 60 * 60 * 24))
    //    if (dias > tdias) {
    //        // este bloque se ejecuta en caso de no ser valido         
    //        return false; //si lo usaras para envio de formulario;
    //    }
    //    return true;
//    var fec = fec1.split("/");
//    var fecn = fec2.split("/");
//    initDate = new Date(fec[2], fec[1], fec[0]);
//    endDate = new Date(fecn[2], fecn[1], fecn[0]);
//    var diferencia = endDate.getTime() - initDate.getTime()
//    var dias = Math.floor(diferencia / (1000 * 60 * 60 * 24))
    var fecha1 = fec1.split("/");
    var fecha2 = fec2.split("/");

    var miFecha1 = new Date(fecha1[2], fecha1[1], fecha1[0])
    var miFecha2 = new Date(fecha2[2], fecha2[1], fecha2[0])

    var diferencia = miFecha1.getTime() - miFecha2.getTime()
    var dias = Math.floor(diferencia / (1000 * 60 * 60 * 24))
    
    if (dias > tdias) {
        // este bloque se ejecuta en caso de no ser valido         
        return true; //si lo usaras para envio de formulario;
    }
    return false;

}
