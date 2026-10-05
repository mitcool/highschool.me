{{--
    Section reordering and "add new section" for the article edit pages (facts hub, news explorer, press release).
    Expects #sections_list (items: .sortable-section > .section-preview + .section-body), #toggle_reorder,
    and the #type_modal section picker on the page.
--}}
<style>
    .drag-handle{
        display:none;
        cursor:move;
        color:rgb(120, 120, 120);
    }
    .section-preview{
        display:none;
        color:rgb(110, 110, 110);
        white-space:nowrap;
        overflow:hidden;
        text-overflow:ellipsis;
    }
    #sections_list.reordering .section-preview{
        display:block;
    }
    #sections_list.reordering .drag-handle{
        display:inline-block;
    }
    #sections_list.reordering .section-body{
        display:none;
    }
    #sections_list.reordering .sortable-section{
        cursor:move;
        background:rgb(248, 249, 250);
    }
    .sortable-ghost{
        opacity:0.4;
        background:rgb(232, 240, 250) !important;
    }
</style>

<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
<script>
    $(document).ready(function(){
        let new_section_count = 0;
        let $list = $('#sections_list');

        // CKEditor 4 renders into an iframe, which goes blank when moved in the DOM.
        // So dragging is only enabled in reorder mode, where every editor in the list is
        // destroyed (its HTML saved back into the textarea) and sections collapse to a preview.
        let sortable = new Sortable($list[0], {
            animation: 150,
            ghostClass: 'sortable-ghost',
            disabled: true
        });

        function destroyEditors($scope){
            $scope.find('textarea.ckeditor').each(function(){
                if(CKEDITOR.instances[this.id]){
                    CKEDITOR.instances[this.id].destroy();
                }
            });
        }

        function createEditors($scope){
            $scope.find('textarea.ckeditor').each(function(){
                if(!CKEDITOR.instances[this.id]){
                    CKEDITOR.replace(this.id);
                }
            });
        }

        function previewText($section){
            let $textarea = $section.find('textarea.ckeditor');
            if($textarea.length){
                return $('<div>').html($textarea.val()).text().trim() || '(empty)';
            }
            let $url = $section.find('input[type=url]');
            if($url.length){
                return $url.val() || '(no URL)';
            }
            let $file = $section.find('input[type=file]');
            if($file.length && $file[0].files.length){
                return $file[0].files[0].name;
            }
            let $img = $section.find('img');
            if($img.length){
                return $img.attr('src').split('/').pop();
            }
            return '(no file chosen)';
        }

        function isReordering(){
            return $list.hasClass('reordering');
        }

        function startReorder(){
            // Destroying an editor that is still initialising throws, so wait until all are ready
            let loading = Object.keys(CKEDITOR.instances).some(function(name){
                return CKEDITOR.instances[name].status !== 'ready';
            });
            if(loading){
                alert('The editors are still loading, please try again in a moment.');
                return;
            }
            destroyEditors($list);
            $list.find('.sortable-section').each(function(){
                $(this).find('.section-preview').text(previewText($(this)));
            });
            $list.addClass('reordering');
            sortable.option('disabled', false);
            $('#toggle_reorder').text('Done reordering').removeClass('btn-outline-secondary').addClass('btn-success');
        }

        function stopReorder(){
            sortable.option('disabled', true);
            $list.removeClass('reordering');
            createEditors($list);
            $('#toggle_reorder').text('Reorder sections').removeClass('btn-success').addClass('btn-outline-secondary');
        }

        $('#toggle_reorder').on('click', function(){
            isReordering() ? stopReorder() : startReorder();
        });

        // Leave reorder mode before the browser validates the form, so hidden required fields are visible again
        $list.closest('form').find('button:not([type=button])').on('click', function(){
            if(isReordering()){
                stopReorder();
            }
        });

        $(document).on('click', '.close-section', function(){
            let $section = $(this).closest('.section');
            destroyEditors($section);
            $section.remove();
        });

        $('.options').on('click', function(){
            $('.options').removeClass('selected-image');
            $(this).addClass('selected-image');
            $('#type').val($(this).attr('data-value'));
        });

        $('#add_section').on('click', function(){
            let type = $('#type').val();
            let ref = ++new_section_count;
            let title = '';
            let body = '';

            if(type == 1){
                title = 'Text section';
                body = `<textarea class="ckeditor" id="new-section-${ref}" name="new_sections[${ref}][content]"></textarea>`;
            }
            else if(type == 2){
                title = 'Image section';
                body = `<input type="file" name="new_sections[${ref}][file]" required>`;
            }
            else if(type == 5){
                title = 'Video section';
                body = `<label class="m-0 font-weight-bold">Video URL (YouTube, Vimeo or direct .mp4 link)</label>
                        <input type="url" class="form-control" name="new_sections[${ref}][content]" placeholder="https://www.youtube.com/watch?v=..." required />`;
            }
            else{
                alert('Please select a category first');
                return;
            }

            if(isReordering()){
                stopReorder();
            }

            $list.append(`<div class="section sortable-section">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-grip-vertical drag-handle mr-2"></i>${title} <span class="badge badge-info">new</span></h5>
                        <span style="font-size:30px;cursor:pointer" class="close-section">&times;</span>
                    </div>
                    <div class="section-preview"></div>
                    <div class="section-body">${body}</div>
                    <input type="hidden" name="new_sections[${ref}][type]" value="${type}">
                    <input type="hidden" name="order[]" value="new_${ref}">
                </div>`);

            if(type == 1){
                CKEDITOR.replace(`new-section-${ref}`);
            }

            $('#type_modal').modal('hide');
            $('.options').removeClass('selected-image');
            $('#type').val('');
        });
    });
</script>
