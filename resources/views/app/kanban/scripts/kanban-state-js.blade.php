<script>
    var kanbanData = [];
    let kanban_status;
    FilePond.registerPlugin(
        FilePondPluginFileEncode,
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
        FilePondPluginFileValidateSize)
    let file = FilePond.create(document.querySelector('#file_komen'))
    const file_task = FilePond.create(document.querySelector('#file_task'))
    file_task.setOptions({
        storeAsFile: true,
    });
    var list = document.querySelectorAll(
        '#kanban_1 .item_kanban, #kanban_2 .item_kanban, #kanban_3 .item_kanban, #kanban_4 .item_kanban');
    drake = dragula([kanban_1, kanban_2, kanban_3, kanban_4]).on('drop', function(el, container) {
        console.log(container.id)
        kanban_status = container.id
        var index = [].indexOf.call(el.parentNode.children, el);
      //   console.log(index + 1)
        $('#loading_board').fadeIn()

    }).on("dragend", function(el, target, src) {
        kanbanData = [];
    
        $("#"+kanban_status+" .item_kanban").each(function(idx, elem) {
            kanbanData.push($(elem).attr('id'));
        });

        console.log(kanbanData);
        updatePosition(kanbanData, kanban_status)
    });
        let pos_1 = document.querySelector('#kanban_1');
        let pos_2 = document.querySelector('#kanban_2');
        let pos_3 = document.querySelector('#kanban_3');
        let pos_4 = document.querySelector('#kanban_4');
        for (let i = 0; i < list.length; i++) {
            list[i].addEventListener('drag', function() {
                if (this.parentNode.id == 'kanban_2') {
                  pos_1.appendChild(this);
                } else if (this.parentNode.id == 'kanban_3') {
                  pos_3.appendChild(this);
                } else if (this.parentNode.id == 'kanban_4') {
                  pos_4.appendChild(this);
                } else {
                  pos_2.appendChild(this);
                }
            });
    }

    

    function updatePosition(kanbanData, kanban_status) {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                kanban: kanbanData,
                kanban_status: kanban_status,
            },
            url: @json(@route('kanban.update_position')),
            beforeSend: function() {},
            success: (response) => {
                setTimeout(function() {
                    $('#loading_board').fadeOut()
                }, 2000)
            },
            error: function(response) {
             
            }
        })

    }
</script>
