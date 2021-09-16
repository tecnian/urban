function delete_item(id,tbl,param)
{
    var msg;
    msg = app_lang['desea_eliminar_elemento'];
    
    if (window.confirm(msg))
    {
        document.location = 'server/delete.php?id=' + id + '&tbl=' + tbl;
        if (param)
        {
            document.location = 'server/delete.php?id=' + id + '&tbl=' + tbl + '&param=' + param;
        }
    }
    
}


function delete_items(form_name)
{
    var form = document.forms[form_name];
    var status = false;

    for (i = 0; i < form.elements.length; i++)
    {
        if (form.elements[i].checked)
        {
            status = true;
        }
    }

    if (status)
    {
        var msg;
        msg = app_lang['desea_eliminar_registros'];

        if (window.confirm(msg))
        {
            form.method = 'post';
            form.submit();
        }
    }
    else
    {
        alert(app_lang['no_elementos_seleccionados']);
    }
}

function select_items(form_name, status)
{
    var form = document.forms[form_name];

    for (i = 0; i < form.elements.length; i++)
    {
        if (form.elements[i].type == 'checkbox')
        {
            if (!form.elements[i].disabled)
            {
                form.elements[i].checked = status;
            }
        }
    }
}

function delete_file(page, field)
{
    if (window.confirm(app_lang['desea_eliminar_fichero']))
    {
        document.location = page + '&fld=' + field;
    }
}

function send_password(form_name)
{
    var form = document.forms[form_name];
    
    form.submit();
}

function disable_password(form_name, status)
{
    var form = document.forms[form_name];

    if (form['password'])
    {
        form['password'].disabled = status;
    }
}

/*function remember_password(form_name)
{
    var form = document.forms[form_name];
    var login = form['login'].value;

    if (login == '')
    {
        alert('Introduzca el email');
    }
    else
    {
        form.submit();
    }
}*/


function activate_menu(treeview,treemenu)
{
    $("#treeview_" + treeview + ' a.side-menu__item').addClass('active');
    $("#treeview_" + treeview + " .treeview-menu .treemenu_" + treemenu + ' a').addClass('active');        
    
    $("#treeview_" + treeview + ' a.side-menu__item').trigger('click');
}

function check_login()
{
    var ok = true;
                            
    $('.form-required').each(function() {
                                
        $(this).parent('div').removeClass('has-error');
                                
        if ($(this).val() == '')
        {
            $(this).parent('div').addClass('has-error');  
                                    
            ok = false;
        }

    });
    
    return ok;
}

$(document).ready(function() {

    $("table.dataTable .check_box#all_items").click(function() {

        var checked = $(this).is(':checked');
        
        select_items('formGrid',checked);

    });

    $(".taula #btn_delete").click(function() {

        delete_items('formGrid');

    });

    /*$("table.dataTable #btn_add").click(function() {

        var link = $(this).attr('data-link');

        document.location = link;

    });*/

    $("#btn_back").click(function() {

        var link = $(this).attr('data-link');

        document.location = link;

    });
    
    $("#adm_lang").change(function() {

        var link_lang = $(this).val();

        document.location = link_lang;

    });
    
    
});