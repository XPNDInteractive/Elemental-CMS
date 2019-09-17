onMenuClick();
//editorDragAndDrop();

editor();
pageEditor();
addContentField();
onFieldTypeChange();
onSelectMedia();
onSelectGalleryItem();
onfieldSave();
onPostImageSelect();
onPostSave();

function onMenuClick(){
    var menu = document.querySelector(".btn-menu");
    var sidebar = document.querySelector(".sidebar");

    menu.addEventListener("click", function(){
        if(sidebar.classList.contains("d-none")){
            sidebar.classList.remove('d-none');
            sidebar.style.width = "100%";
        }

        else{
            sidebar.classList.add('d-none');
            sidebar.style.width = "250px";
        }
       
    })
}

var errors = document.querySelector(".input-errors");

if(errors !== null){
    $("#" + errors.id).modal('show');
}




function postAjax(url, data, success) {
    var params = typeof data == 'string' ? data : Object.keys(data).map(
            function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
        ).join('&');

    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('POST', url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState>3 && xhr.status==200) { success(xhr.responseText); }
    };
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(params);
    return xhr;
}




function editorDragAndDrop(){
    var editor = document.querySelector('.editor');
    var draggables = document.querySelectorAll(".drag");

    for(i = 0; i < draggables.length; i++){
        draggables[i].id = "drag-" + i;
        draggables[i].addEventListener("dragstart", function(event){
            
            event.dataTransfer.setData("text", "<p>josh is cool</p>");
        });
    }

    editor.addEventListener('dragover', function(){
        event.preventDefault();
    })
   
    editor.addEventListener("drop", function(ev){
       
        console.log("dropped");
        var data = ev.dataTransfer.getData("text");
        
        ev.target.appendChild(document.getElementById(data));
    })

}



function addContentField(){
    var btn = document.querySelector(".btn-add-field");

    if(btn !== null){
        btn.addEventListener("click", function(){
            console.log("clicked");
            var fields = document.querySelector(".content-fields");
            var field = document.querySelectorAll(".content-field");
            var cloned = field[0].cloneNode(true);
            cloned.style.display = "block";
            fields.appendChild(cloned);
        });
    }
}

$('#customFile').on('change',function(){
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
});


function pageEditor(){
    let containers = document.querySelectorAll('.page-editor');
    
    if(containers.length > 0){
        for(i =0; i < containers.length; i++){
            new Quill(containers[i], { theme: 'snow'});
        }
    }
}

function onFieldTypeChange(){
    $(document).on("change", ".field-type-selector", function(){
        var me = $(this).siblings()[6];
        var pe = $(this).siblings()[5];
        var ql= $(this).siblings()[4];

        if(this.value == "media"){
            $(me).css('display', 'flex');
            $(pe).hide();
            $(ql).hide();
        }

        if(this.value == "text"){
            $(me).hide();
            $(pe).show();
            $(ql).show();
        }
      
    })
}


function onSelectMedia(){
    $(document).on('click','button.select-media', function(){
        var gallery = $(this).next().next();
        console.log(gallery);
        if(gallery.css("display") == "none"){
            gallery.css('display', "flex");
        }

        else{
            gallery.hide();
        }
            
        
    });
}

function onSelectGalleryItem(){
    $(document).on('click', 'img.gallery-item', function(){
        var kids =$(this).parent().parent().children();

        //console.log(kids);
        
        for(i = 0; i < kids.length; i++){
            console.log(kids[i]);
            $(kids[i].children[0]).css("outline", "none");
        }
        
        $(this).css("outline", "red 3px solid");
        $(this).parent().parent().hide();
        console.log( $(this).parent().parent().parent().children());
        $(this).parent().parent().parent().children()[0].src = this.src;
        $(this).parent().parent().parent().children()[1].value = this.src;
    })
}

function onfieldSave(){
    $(".field-save").on("submit", function () {
        var hvalue = $('.ql-editor').html();
        if(hvalue == "<p><br></p>"){
            hvalue = "";
        }

        $(this).append("<textarea name='field-content' style='display:none'>"+hvalue+"</textarea>");
    });
}

function onPostImageSelect(){
    $(document).on("click", ".post-images .post-image .img-thumbnail", function(){
        $(".post-images .post-image .img-thumbnail").css("outline", "none");
        $(this).css("outline", "red 2px solid");
        $(".post-featured-image").attr('src', this.src);
        $(".post-image-placeholder i").hide();
        console.log($(".post-image"));
        $("input.post-image").val($(this).attr("data-id"));
        
    })
}

function onPostSave(){
    $(".post-save").on("submit", function () {
        var hvalue = $('.ql-editor').html();
        if(hvalue == "<p><br></p>"){
            hvalue = "";
        }

        $(this).append("<textarea name='content' style='display:none'>"+hvalue+"</textarea>");
    });
}

function editor(){
    ClassicEditor
        .create( document.querySelector( 'textarea.content-editor' ) )
        .catch( error => {
            console.error( error ); });

}


