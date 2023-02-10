<script>
    (function($) {

        "use strict";


        // Setup CSRF In Ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        setBGImage();

        // Set BG Image Js
        function setBGImage() {
            $(".bg-img").parent().addClass('bg-size');
            $('.bg-img').each(function() {
                var el = $(this),
                    src = el.attr('src'),
                    parent = el.parent();
                var height = $(this).height();
                var width = $(this).width();
                parent.css({
                    'background-image': 'url(' + src + ')',
                    'background-size': height > 100 && width > 100 ? 'inherit' : 'cover',
                    'background-position': 'center',
                    'display': 'block'
                });

                el.hide();
            });
        }

        // Toggle swich 
        $(document).on('change', '#is_approved', function() {
            let status = $(this).prop('checked') == true ? 1 : 0;
            var id = this.value;
            var url = '{{ route('admin.comment.update', ":id " ) }}',
            url =  url.replace(":id", id);
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    is_approved : status,
                    _method: 'PUT'
                },
                success: function(data) {
                    //   
                }
            });
            
        });
        // Add Shortcode Plugin
        tinymce.PluginManager.add('shortcodes', function(editor, url) {
            var toggleState = false;
            editor.ui.registry.addMenuButton('shortcodes', {
                icon: 'sourcecode',
                text: 'Shortcodes',
                fetch: function(callback) {
                    var items = [{
                            type: 'menuitem',
                            text: 'Home Banner',
                            onAction: function() {
                                editor.insertContent(
                                    '&nbsp;<p>[section name="home"][/section]</p>'
                                );
                            }
                        },
                        {
                            type: 'menuitem',
                            text: 'About',
                            onAction: function() {
                                editor.insertContent(
                                    '&nbsp;<p>[section name="about"][/section]</p>'
                                );
                            }
                        },
                        {
                            type: 'menuitem',
                            text: 'Features',
                            onAction: function() {
                                editor.insertContent(
                                    '&nbsp;<p>[section name="feature"][/section]</p>'
                                );
                            }
                        },
                        {
                            type: 'menuitem',
                            text: 'How It Work',
                            onAction: function() {
                                editor.insertContent(
                                    '&nbsp;<p>[section name="how-it-work"][/section]</p>'
                                );
                            }
                        },
                        {
                            type: 'menuitem',
                            text: 'Screenshots',
                            onAction: function() {
                                editor.insertContent(
                                    '&nbsp;<p>[section name="screenshots"][/section]</p>'
                                );
                            }
                        },
                        {
                            type: 'menuitem',
                            text: 'Team',
                            onAction: function() {
                                editor.insertContent(
                                    '&nbsp;<p>[section name="team"][/section]</p>'
                                );
                            }
                        },
                        {
                            type: 'menuitem',
                            text: 'Pricing Plan',
                            onAction: function() {
                                editor.insertContent(
                                    '&nbsp;<p>[section name="pricing-plan"][/section]</p>'
                                );
                            }
                        },
                        {
                            type: 'menuitem',
                            text: 'Testimonial',
                            onAction: function() {
                                editor.insertContent(
                                    '&nbsp;<p>[section name="testimonial"][/section]</p>'
                                );
                            }
                        },
                        {
                            type: 'menuitem',
                            text: 'FAQ',
                            onAction: function() {
                                editor.insertContent(
                                    '&nbsp;<p>[section name="faq"][/section]</p>'
                                );
                            }
                        },
                        {
                            type: 'menuitem',
                            text: 'Recent Blog',
                            onAction: function() {
                                editor.insertContent(
                                    '&nbsp;<p>[section name="recent-blog"][/section]</p>'
                                );
                            }
                        },
                        {
                            type: 'menuitem',
                            text: 'Download',
                            onAction: function() {
                                editor.insertContent(
                                    '&nbsp;<p>[section name="download"][/section]</p>'
                                );
                            }
                        },
                        {
                            type: 'menuitem',
                            text: 'Contact',
                            onAction: function() {
                                editor.insertContent(
                                    '&nbsp;<p>[section name="contact"][/section]</p>'
                                );
                            }
                        },
                    ];
                    callback(items);
                }
            });
        });

        // Tinymce Editor
        tinymce.init({
            selector: 'textarea.content',
            height: 300,
            plugins: [
                'shortcodes',
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste imagetools wordcount fullscreen media table textpattern visualblocks'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | shortcodes | link image | media | fullscreen | visualblocks',
            menubar: 'tools | table | view',
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function() {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                };
                input.click();
            },
            images_upload_handler: function(blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open("POST", "{{ route('admin.media.store') }}");
                xhr.setRequestHeader("X-CSRF-Token", $('meta[name="csrf-token"]').attr('content'));
                xhr.onload = function() {
                    var json;
                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);
                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                    success(json.location);
                };
                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            }
        });

        // Upload File Using Dropzone
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone(".dropzone", {
            maxFilesize: 3, // 3 mb
            acceptedFiles: ".jpeg,.jpg,.png",
            uploadMultiple: false,
        });

        // Title => Slug
        $(document).on('keyup change', 'input.title', function() {
            var slug = slugify($(this).val());
            $('input.slug').val(slug);
            $('.seo-slug').text(slug);
        });

        // Convert To Slug
        function slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-') // Replace spaces with -
                .replace(/[^\w\-]+/g, '') // Remove all non-word chars
                .replace(/\-\-+/g, '-') // Replace multiple - with single -
                .replace(/^-+/, '') // Trim - from start of text
                .replace(/-+$/, ''); // Trim - from end of text
        }

        // Select 2 Dropdown
        $(".select-2").select2();

        // Select Permission
        $(document).on('click', '.select-all-permission', function() {
            $('.module_' + this.value).prop('checked', this.checked ? true : false);
        });

        // SEO Snipped
        $(document).on('keyup change', 'input[name="title"], input[name="meta_title"]', function() {
            if (!$(this).val())
                $('.snippet-preview').hide();
            else
                $('.snippet-preview').show();
            $('.seo-title').text($(this).val());
            $('input[name="meta_title"]').val($(this).val());
        });

        $(document).on('keyup change',
            'textarea[name="description"], textarea[name="excerpt"], textarea[name="meta_description"]',
            function() {
                $('.seo-description').text($(this).val());
                $('textarea[name="meta_description"]').val($(this).val());
            });

        // Select Home page
        $(document).on('change', '.select_home_page', function() {
            $(".select2-hidden-accessible").attr('disabled', false);
            if ($(this).val() == 'post') {
                $(".select2-hidden-accessible").attr('disabled', true);
            }
        });

        // Media Manager
        let Media = {
            data: [],
            selectedFiles: [],
            values: [],
            multiple: false,
            select_id: null
        }

        $(document).ready(function() {
            $.ajax({
                type: 'GET',
                url: "{{ route('admin.media.ajax') }}",
                dataType: 'json',
                success: function(res) {
                    $('.selected-file').each(function() {
                        var input_val = $('input[name="' + $(this).attr('name') +
                            '"].selected-file').val();
                        Media.values = input_val ? input_val.split(',').map(
                            Number) : [];
                        Media.select_id = $(this).attr('name');
                        Media.data = res;
                        Media.selectedFiles = Media.data.filter(function(obj) {
                            return (Media.values.includes(obj.id))
                        });
                        selectedMedia();
                    })
                },
                error: function(error) {
                    console.log(error)
                }
            });
        });

        // Get All Media Files
        $(document).on('click', '.media-manager', function() {
            Media.select_id = this.id;
            Media.multiple = $(this).attr('multiple') !== undefined ? true : false;
            $('#mediaModel').modal('show');
            var input_val = $('input[name="' + Media.select_id + '"].selected-file').val();
            Media.values = input_val ? input_val.split(',').map(Number) : [],
                media();
        });

        // Search Media Files
        $(document).on('keyup', '#search-image', function(e) {
            e.preventDefault();
            media();
        });

        // Filter Media
        $(document).on('change', '#sortby-image', function(e) {
            e.preventDefault();
            media();
        });

        // Select Media Files
        $(document).on('click', '.select-file', function() {


            if (!$(this).hasClass('select') && !Media.multiple)
                $('.select-file').removeClass('select');

            $(this).toggleClass('select');

            var id = parseInt($(this).attr('data-file-id'));

            if (Media.multiple) {
                var index = Media.values.indexOf(id);
                if (index !== -1)
                    Media.values.splice(index, 1);
                else
                    Media.values.push(id)
            } else {
                if ($(this).hasClass('select'))
                    Media.values = [id];
                else
                    Media.values = [];
            }

            $('input[name="' + Media.select_id + '"].selected-file').val(Media.values.join(','));

            Media.selectedFiles = Media.data.filter(function(obj) {
                return (Media.values.includes(obj.id))
            });
            if (Media.selectedFiles.length >= 0) {
                $('.selected-count').text(Media.selectedFiles.length + ' File Selected');
            }

        });


        // Clear all selected images
        $(document).on('click', '.clear', function() {

            $('.select-file').removeClass('select');

            var id = parseInt(Media.values);

            var data = Media.values.length;

            if (Media.multiple) {
                var index = Media.values.indexOf(id);
                if (index !== -1)
                    Media.values.splice(index, data);
                else
                    Media.values.push(id)
            } else {
                if ($(this).hasClass('select'))
                    Media.values = [id];
                else
                    Media.values = [];
            }

            $('input[name="' + Media.select_id + '"].selected-file').val(Media.values.join(','));

            Media.selectedFiles = Media.data.filter(function(obj) {
                return (Media.values.includes(obj.id))
            });

            if (Media.selectedFiles.length >= 0) {
                $('.selected-count').text(Media.selectedFiles.length + ' File Selected');
            }

        });


        // Add Media File
        $(document).on('click', '.select-media', function() {
            selectedMedia();
        });

        // Remove Media File
        $(document).on('click', '.remove-file', function() {

            Media.select_id = $(this).attr('select');

            var input_val = $('input[name="' + Media.select_id + '"].selected-file').val();
            Media.values = input_val ? input_val.split(',').map(Number) : [];

            var id = parseInt($(this).attr('data-file-id'));
            var index = Media.values.indexOf(id);
            if (index !== -1)
                Media.values.splice(index, 1);

            $('input[name="' + Media.select_id + '"].selected-file').val(Media.values.join(','));

            Media.selectedFiles = Media.data.filter(function(obj) {
                return (Media.values.includes(obj.id))
            });

            selectedMedia();

        });

        // Get Selected File
        function selectedMedia() {
            var html = '';
            Media.selectedFiles.forEach((data) => {
                html += '<div class="col-2"><div class="card mb-0 ratio3_2">';
                html += '<div class="img-part b_size_content"><img src="{{ url('/') }}/' + data.url +'" class="card-img-top bg-img" alt="..."></div>';
                html += '<div class="dropdown custom-dropdown">';
                html += '<a href="javascript:void(0)">';
                html += '<i class="remove-icon ti-trash remove-file" select="' + Media.select_id +
                    '" data-file-id="' + data.id + '"></i>';
                html += '</a>';
                html += '</div>';
                html += '<div class="card-body">';
                html += '<h5 class="card-title mb-0">' + data.original_file_name + '</h5><h6>' +
                    data.size +
                    ' {{ __('KB') }}</h6>';
                html += '</div>';
                html += '</div></div>';
            })

            $('.selected-media').each(function() {
                if ($(this).attr('select') == Media.select_id) {
                    $(this).html(html);
                }
            })
            setBGImage();
        }

        function media() {
            $.ajax({
                type: 'GET',
                url: "{{ route('admin.media.ajax') }}",
                dataType: 'json',
                data: {
                    'term': $('#search-image').val() ? $('#search-image').val() : '',
                    'sort': $('#sortby-image').val() ? $('#sortby-image').val() : ''
                },
                success: function(res) {
                    var html = '';
                    Media.data = res;
                    if (Media.data.length) {
                        Media.data.forEach((data) => {
                            let select_class = Media.values.includes(data.id) ?
                                'select-file select' : 'select-file';
                            html += '<div class="col-2">';
                            html += '<div class="card ratio3_2 modal-card">';

                            html += '<div class="dropdown right-dropdown">';
                            html +=
                                '<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">';
                            html +=
                                '<i class="fa fa-ellipsis-h" aria-hidden="true"></i>';
                            html += '</button>';
                            html +=
                                '<ul class="dropdown-menu option-dropdown" aria-labelledby="dropdownMenuButton1">';
                            html += '<li>';
                            html += '<a href="{{ url('/') }}/' + data.url +'" download class="list-box">';
                            html += '<i class="fa fa-download" aria-hidden="true"></i>';
                            html += '<span>Download</span>';
                            html += '</a>';
                            html += '</li>';
                            html += '<li>';
                            html +=
                                '<a  href="javascript:void(0)" class="list-box btnDelete" id="btnDelete' +
                                data.id + '">';
                            html += '<i class="fa fa-trash-o" aria-hidden="true"></i>';
                            html += '<span>Delete</span>';
                            html += '</a>';
                            html += '</li>';
                            html += '</ul>';
                            html += '</div>';

                            html += '<div id ="select-class" class="' +
                                select_class + '" data-file-id="' + data.id + '">';
                            html +=
                                '<div class="img-part bg-size-contain"><img src="{{ url('/') }}/' + data.url +'" class="card-img-top bg-img" alt="...">';
                            html += '<div class="card-body">';
                            html += '<h5 class="card-title mb-0">' + data
                                .original_file_name + '</h5><h6>' + data.size +
                                ' {{ __('KB') }}</h6>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div></div>';
                        });
                    } else {
                        html += '<p>No Files</p>';
                    }
                    $('.media-files').html(html);
                    setBGImage();
                    if (Media.selectedFiles.length >= 0) {
                        $('.selected-count').text(Media.selectedFiles.length + ' File Selected');
                    }
                },
                error: function(error) {
                    console.log('Get all error', error)
                }
            });
        }

        $(document).on('click', '.btnDelete', function(e) {
            e.preventDefault();
            let id = this.id.substring(9);
            let url = "{{ route('admin.media.destroy', '') }}" + "/" + id;
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    _method: 'DELETE',
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    media();
                },
            });

        });

        $(document).on('click', '.upload-image', function(e) {
            e.preventDefault();
            $(".btn-add").hide();
            $(".clear").hide();
            $(".selected-count").hide();
        });

        $(document).on('click', '.select_image', function(e) {
            e.preventDefault();
            $(".btn-add").show();
            $(".clear").show();
            $(".selected-count").show();
            media();
        });

        // loader
        $(window).on('load', function() {
            setTimeout(function() {
                $('.jstree-loader').fadeOut('slow');
                $('#treeBasic').show();
            }, 500);
            $('.jstree-loader').remove('slow');
        });



        //Remove unnecessary Title in Table Checkbox        
        if (document.querySelector(".title")) {
            document.querySelector(".title").removeAttribute("title")
        }


        //Select All Rows btn
        let rowIds = [];
        $(document).on('click', '#select-all-rows', function(e) {
            $(".checkable").prop('checked', $(this).prop('checked'));
            var ischecked = $(this).is(':checked');
            if (ischecked) {
                rowIds = [];
                $('input[type=checkbox]').prop('checked', 'checked');
                selectAllRows();

            } else {
                $('input[type=checkbox]').prop('checked', '');
                unselectAllRows();
            }
            $('#disable-select').prop('checked', '');
            deleteConfirmationBtn()
        });


        function selectAllRows() {
            $("input:checkbox[name=row]:checked").each(function() {
                rowIds.push($(this).val());
            });
        }


        function unselectAllRows() {
            $("input:checkbox[name=row]").each(function() {
                var val = $(this).val();
                rowIds.splice(rowIds.indexOf(val), 1);
            });
            rowIds = [];
        }


        function deleteConfirmationBtn() {
            if (rowIds.length > 0) {
                $('.deleteConfirmationBtn').show();
                $('#count-selected-rows').html(' ' + rowIds.length);
            } else {
                $('.deleteConfirmationBtn').hide();
            }
        }

        //Row Checkbox Change event
        $(document).on('change', '.rowClass', function(e) {
            let id = $(this).val();
            if ($(this).is(':checked')) {
                rowIds.push(id);
                selectRows();
            } else {
                removeA(rowIds, id);
                unselectRows();
            }
            deleteConfirmationBtn();
        });


        function removeA(array) {
            var element, argument = arguments,
                length = argument.length,
                index;
            while (length > 1 && array.length) {
                element = argument[--length];
                while ((index = array.indexOf(element)) !== -1) {
                    array.splice(index, 1);
                }
            }
            return array;
        }

        function unselectRows() {
            var totalSelectedRows = $('input:checkbox[name=row]:checked').length;
            var totalRows = $('input:checkbox[name=row]').length;
            $('#select-all-rows').prop('checked', '');

        }

        function selectRows() {
            $.each(rowIds, function(index, value) {
                $('#rowId' + value).prop("checked", true);
            });

            var totalSelectedRows = $('input:checkbox[name=row]:checked').length;
            var totalRows = $('input:checkbox[name=row]').length;

            if (totalSelectedRows === totalRows) {
                if (totalSelectedRows === 0 && totalRows === 0) {
                    $('#selectAllRows').html(``);
                } else {
                    $('input[type=checkbox]').prop('checked', 'checked');
                }
            }
            $('#disable-select').prop('checked', '');
        }


        $(document).on('click', '#cancelModalBtn', function(e) {
            $("#deleteConfirmationModal").modal("hide");
        })


        $(document).on('click', '#confirm-DeleteRows', function(e) {
            e.preventDefault();

            let url = $('.deleteConfirmationBtn').data('url');

            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    _method: 'DELETE',
                    id: rowIds,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $("#deleteConfirmationModal").modal("hide");
                    window.location.reload();
                },
            });
        });


        // Delete Confirmation Btn
        $(document).on('click', '.deleteConfirmationBtn', function(e) {
            e.preventDefault();
            if (rowIds.length > 0) {
                $("#deleteConfirmationModal").modal("show");
            } else {
                alert("Please select atleast one checkbox");
            }
        });

        // switch submit        
        $('.toggle-class').change(function() {
            let status = $(this).prop('checked') == true ? 1 : 0;
            var switch_name = this.name;
            $.ajax({
                type: "POST",
                url: '{{ route('admin.theme.update') }}',
                data: {
                    _method: 'PUT',
                    [switch_name]: status,
                },
                success: function(data) {
                    //   
                }
            });
        })

        // get color code
        $(document).on('change', '#color-box', function(e) {
            e.preventDefault();
            $('#primary_color').val(this.value);
        });
        $(document).on('change', '#color-box-2', function(e) {
            e.preventDefault();
            $('#secondary_color').val(this.value);
        });

        // reset the color
        $(document).on('click', '.reset_icon', function(e) {
            e.preventDefault();
            $('#primary_color').val("#5f57ea");
            $('#color-box').val("#5f57ea");
        });
        $(document).on('click', '.reset_icon_2', function(e) {
            e.preventDefault();
            $('#secondary_color').val("#9647db");
            $('#color-box-2').val("#9647db");
        });

    })(jQuery);
</script>
