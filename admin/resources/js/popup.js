function popup() {
    w2popup.open({
        title     : 'Book Details',
        body      : '<div class="w2ui-centered">Book Details</div>',
        buttons   : '<button class="btn" onclick="w2popup.close();">Close</button> ',

        width     : 500,
        height    : 300,
        overflow  : 'hidden',
        color     : '#333',
        speed     : '0.3',
        opacity   : '0.8',
        modal     : true,
        showClose : true,
        showMax   : true,
        onOpen    : function (event) { console.log('open'); },
        onClose   : function (event) { console.log('close'); },
        onMax     : function (event) { console.log('max'); },
        onMin     : function (event) { console.log('min'); },
        onKeydown : function (event) { console.log('keydown'); }
    });
}
