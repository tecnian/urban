//v2.1 -> set_array_params


function decimal_format(value)
{
    var pos = value.indexOf(",");
    var result;

    if (pos >- 1)
    {
       result = value.substring(0,pos) + "." + value.substring(pos + 1,value.length);
    }
    else
    {
       result = value;
    }

    return result;
}

function check_email(email)
{
    var is_ok = true;

    if(email.indexOf('@', 0) == -1 || email.indexOf('.', 0) == -1)
    {
        is_ok = false;
    }

    return is_ok;
}


function check_hour(valor)
{
    var ok = true;
    var hora1 = valor.split(":")[0];       
    var hora2 = valor.split(":")[1];
    
    if (isNaN(hora1))
    {
        ok = false;
    }
    if (parseInt(hora1) > 23 )
    {
        ok = false;
    }
    if (isNaN(hora2))
    {
        ok = false;
    }
    if (parseInt(hora2) > 59 )
    {
        ok = false;
    }

    return ok;
}

function check_date(fecha) {

        var bOk = true;
        var dia = fecha.split("/")[0];
        var mes = fecha.split("/")[1];
        var ano = fecha.split("/")[2];

	if ((dia == "") || (mes == "") || (ano == ""))
        {
            if ((dia == "") && (mes == "") && (ano == ""))
            {
                bOk = true;
            }
            else
            {
		bOk = false;
            }
	}
        else
        {
            if ((isNaN(dia)) || (isNaN(mes)) || (isNaN(ano)))
            {
		bOk = false;
            }
            if (mes > 12)
            {
            	bOk = false;
            }
            if ((dia > 31) || (dia > last_month_day(mes)))
            {
            	bOk = false;
            }
	}

	return bOk;
}

function last_month_day(mes)
{
	var nMes = parseInt(mes,10);
	var nRes = 0;

	switch (nMes) {
		case 1: nRes = 31; break;
		case 2: nRes = 28; break;
		case 3: nRes = 31; break;
		case 4: nRes = 30; break;
		case 5: nRes = 31; break;
		case 6: nRes = 30; break;
		case 7: nRes = 31; break;
		case 8: nRes = 31; break;
		case 9: nRes = 30; break;
		case 10: nRes = 31; break;
		case 11: nRes = 30; break;
		case 12: nRes = 31; break;
	}

	return nRes;
}

function hidden_email(user, domain)
{
   conector = "@";
   mail = user + conector + domain;
   document.write("<a href='mailto:" + mail + "'>" + mail + "</a>");

}

function no_back_button()
{
	
   window.location.hash = "no-back-button";
	
   window.location.hash = "Again-No-back-button" //chrome
	
   window.onhashchange = function(){window.location.hash="no-back-button";}
	
}


function set_array_params(str_params)
{
    var arr_params = new Array();
    var arr_key_val = new Array();
    var arr_aux = new Array();
    var str_aux = '';
    var n = 0;
    
    
    arr_params = str_params.split("&");
    
    for (var i = 0; i < arr_params.length; i++)
    {
        str_aux = arr_params[i];  
        
        arr_aux = str_aux.split("=");
        
        arr_key_val[n] = new Array();
        
        arr_key_val[n]['key'] = arr_aux[0];
        arr_key_val[n]['value'] = arr_aux[1];
        
        n++;
    }
    
    return(arr_key_val);
}
