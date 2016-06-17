// iniciar data autocomplete
function autoComp_ini(jsonFlag,jsonPeti,valId,valDes)
{

    param="view="+jsonFlag;
    $.getJSON(jsonPeti+'.php?'+param,{format: "json"}, function(data)
    {
        availableTags2=[];

        for(i=0;i<data.length;i++)
        {
            availableTags2.push({key:data[i][valId],value:data[i][valDes]});
        }

        console.log(availableTags2);

        $( "#"+valDes ).autocomplete
        ({
            //source: availableTags2

            minLength: 0,
            source: availableTags2,
            focus: function( event, ui ) {
                $( "#"+valDes ).val( ui.item.value );
                return false;
            },

            select: function( event, ui ) {
                $( "#"+valDes ).val( ui.item.value );
                $( "#"+valId ).val( ui.item.key );
                return false;
            }
        });
    });
}